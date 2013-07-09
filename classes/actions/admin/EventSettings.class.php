<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*
*--------------------------------------------------------
*
*   Official site: www.livestreet.ru
*   Contact e-mail: rus.engine@gmail.com
*
*   GNU General Public License, version 2:
*   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
---------------------------------------------------------
*/

/*
		Работа с настройками плагинов
		
		by PSNet
		http://psnet.lookformp3.net
*/

class PluginAdmin_ActionAdmin_EventSettings extends Event {
	
	const ADMIN_SETTINGS_FORM_SYSTEM_ID = 'LS-Admin';												// Скрытый системный идентификатор данных о настройках из формы
	const ADMIN_TEMP_CONFIG_INSTANCE = 'temporary_instance';								// До момента сохранения настроек в БД они будут хранится здесь
	
	
	
	//
	// Показать настройки
	//
	public function EventShow () {
		$this -> Security_ValidateSendForm ();

		// Корректно ли имя конфига
		if (!$sConfigName = $this -> getParam (1) or !is_string ($sConfigName)) {
			$this -> Message_AddError ($this -> Lang_Get ('plugin.admin.Errors.Wrong_Config_Name'), $this -> Lang_Get ('error'));
			return false;
		}
		
		if ($sConfigName == PluginAdmin_ModuleSettings::SYSTEM_CONFIG_ID) {
			// Загрузить системный конфиг
			$aSettingsAll = $this -> GetConfigSettings ($sConfigName);
			$this -> Viewer_Assign ('aSettingsAll', $aSettingsAll);

		} else {
			// Загрузить конфиг плагина
			if (!$this -> PluginAdmin_Settings_CheckIfThisPluginIsActive ($sConfigName)) {
				$this -> Message_AddError ($this -> Lang_Get ('plugin.admin.Errors.Plugin_Need_To_Be_Activated'), $this -> Lang_Get ('error'));
				return false;
			}

			$aSettingsAll = $this -> GetConfigSettings ($sConfigName);
			$this -> Viewer_Assign ('aSettingsAll', $aSettingsAll);
		}

		$this -> Viewer_Assign ('sConfigName', $sConfigName);
		$this -> Viewer_Assign ('sAdminSettingsFormSystemId', self::ADMIN_SETTINGS_FORM_SYSTEM_ID);
		$this -> Viewer_Assign ('sAdminSystemConfigId', PluginAdmin_ModuleSettings::SYSTEM_CONFIG_ID);
	}

	

	protected function GetConfigSettings ($sConfigName) {
		// Получить описание настроек из конфига
		$aSettingsInfo = $this -> PluginAdmin_Settings_GetConfigSettingsSchemeInfo ($sConfigName);
		
		$aSettingsAll = array ();
		foreach ($aSettingsInfo as $sConfigKey => $aOneParamInfo) {
			// Получить текущее значение параметра
			if (($mValue = $this -> PluginAdmin_Settings_GetParameterValue ($sConfigName, $sConfigKey)) === null) {
				$this -> Message_AddError (
					$this -> Lang_Get ('plugin.admin.Errors.Wrong_Description_Key', array ('key' => $sConfigKey)),
					$this -> Lang_Get ('error')
				);
				continue;
			}
			
			// Получить текстовки имени и описания параметра из ключей
			$aOneParamInfo = $this -> PluginAdmin_Settings_ConvertLangKeysToTexts ($sConfigName, $aOneParamInfo);
			
			// Собрать данные параметра и получить сущность параметра
			$aParamData = array_merge ($aOneParamInfo, array (
				'key' => $sConfigKey,
				'value' => $mValue
			));
			$aSettingsAll [] = Engine::GetEntity ('PluginAdmin_ModuleSettings_EntitySettings', $aParamData);
		}
		
		return $aSettingsAll;
	}
	
	

	//
	// Сохранить настройки
	//
	public function EventSaveConfig () {
		$this -> Security_ValidateSendForm ();

		if (isPost ('submit_save_settings')) {
			// Корректно ли имя конфига
			if (!$sConfigName = $this -> getParam (1) or !is_string ($sConfigName)) {
				$this -> Message_AddError ($this -> Lang_Get ('plugin.admin.Errors.Wrong_Config_Name'), $this -> Lang_Get ('error'));
				return false;
			}

			// Получение всех параметров, их валидация и сверка с описанием структуры и запись в отдельную инстанцию конфига
			if ($this -> ParsePOSTDataIntoSeparateConfigInstance ($sConfigName)) {
				// Сохранить все настройки плагина в БД
				$this -> PluginAdmin_Settings_SaveConfig ($sConfigName, $this -> GetKeysData ($sConfigName));
				
				$this -> Message_AddNotice ('Ok', '', true);
			}
		}

		return Router::Location (
			Router::GetPath ('admin') . 'settings/plugin/' . $sConfigName . '/?security_ls_key=' . $this -> Security_SetSessionKey ()		// todo: rework
		);
	}
	
	
	
	//
	// Весь процесс получение настроек из формы
	//
	private function ParsePOSTDataIntoSeparateConfigInstance ($sConfigName) {
		// Получить описание настроек из конфига
		$aSettingsInfo = $this -> PluginAdmin_Settings_GetConfigSettingsSchemeInfo ($sConfigName);
		foreach ($_POST as $aPostRawData) {
			// Проверка это ли параметр настроек формы
			if (is_array ($aPostRawData) and count ($aPostRawData) == 3 and $aPostRawData [0] == self::ADMIN_SETTINGS_FORM_SYSTEM_ID) {
				//
				// Структура принимаемых данных:
				//
				// [0] - идентификатор приналежности значения к параметрам (всегда должен быть self::ADMIN_SETTINGS_FORM_SYSTEM_ID)
				// [1] - ключ параметра (как в конфиге)
				// [2] - значение параметра из формы
				//
				$sKey = $aPostRawData [1];
				$mValue = $aPostRawData [2];
				// Если существует запись в конфиге о таком параметре, который был передан
				if (array_key_exists ($sKey, $aSettingsInfo)) {
					$aParamInfo = $aSettingsInfo [$sKey];
					
					// Приведение значения к нужному типу
					$mValue = $this -> PluginAdmin_Settings_SwitchValueToType ($mValue, $aParamInfo ['type']);
					
					if (isset ($aParamInfo ['validator']) and !$this -> PluginAdmin_Settings_ValidateParameter ($aParamInfo ['validator'], $mValue)) {
						$this -> Message_AddError (
							$this -> Lang_Get ('plugin.admin.Errors.Wrong_Parameter_Value', array ('key' => $sKey)) .
								$this -> PluginAdmin_Settings_ValidatorGetLastError (),
							$this -> Lang_Get ('error'),
							true
						);
						return false;		// todo: review: return false or continue if wrong value for one parameter is set?
					}
					// Сохранить значение ключа
					$this -> SaveKeyValue ($sConfigName, $sKey, $mValue);
				} else {
					$this -> Message_AddError (
						$this -> Lang_Get ('plugin.admin.Errors.Unknown_Parameter', array ('key' => $sKey)),
						$this -> Lang_Get ('error'),
						true
					);
				}
			}
		}
		return true;
	}
	
	

	//
	// Сохранение данных одного ключа в временной инстанции конфига
	//
	private function SaveKeyValue ($sConfigName, $sKey, $mValue) {
		// Сохранить значение ключа в отдельной области видимости для дальнейшего получения списка настроек
		// Это очень удобно делать через отдельную инстанцию конфига - не нужно разбирать вручную ключи
		Config::Set ($this -> PluginAdmin_Settings_GetRealFullKey ($sConfigName) . $sKey, $mValue, self::ADMIN_TEMP_CONFIG_INSTANCE);
	}
	
	
	
	//
	// Получение всех данных ранее сохраненных ключей из временной инстанции
	//
	private function GetKeysData ($sConfigName) {
		// Все параметры из формы сохранены в отдельной инстанции конфига
		return Config::Get ($this -> PluginAdmin_Settings_GetRealFullKey ($sConfigName, false), self::ADMIN_TEMP_CONFIG_INSTANCE);
	}
	
	
}

?>