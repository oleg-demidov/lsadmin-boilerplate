<?php
/**
 * LiveStreet CMS
 * Copyright © 2013 OOO "ЛС-СОФТ"
 *
 * ------------------------------------------------------
 *
 * Official site: www.livestreetcms.com
 * Contact e-mail: office@livestreetcms.com
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * ------------------------------------------------------
 *
 * @link http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author Serge Pustovit (PSNet) <light.feel@gmail.com>
 *
 */
/*
 *
 * Работа с настройками плагинов
 *
 */

class PluginAdmin_ActionAdmin_EventSettings extends Event
{

    /**
     * Показать настройки плагина
     *
     * @return bool
     */
    public function EventShowPluginSettings()
    {
        $this->SetTemplateAction('settings/list');
        /*
         * корректно ли имя конфига
         */
        if (!$sConfigName = $this->getParam(1) or !is_string($sConfigName)) {
            $this->Message_AddError($this->Lang_Get('plugin.admin.errors.wrong_config_name'), $this->Lang_Get('common.error.error'));
            return false;
        }
        /*
         * активирован ли этот плагин
         */
        if (!$this->PluginAdmin_Settings_CheckPluginCodeIsActive($sConfigName)) {
            $this->Message_AddError($this->Lang_Get('plugin.admin.errors.plugin_need_to_be_activated'),
                $this->Lang_Get('common.error.error'));
            return false;
        }
        /*
         * получить разделы и их настройки
         */
        $aSections = $this->PluginAdmin_Settings_GetPluginSectionsAndItsSettings($sConfigName);
        $this->Viewer_Assign('aSections', $aSections);
        $this->Viewer_Assign('sConfigName', $sConfigName);
        $this->Viewer_Assign('oPlugin', $this->PluginAdmin_Plugins_GetPluginByCode($sConfigName));

        $this->Viewer_Assign('sAdminSettingsFormSystemId', PluginAdmin_ModuleSettings::ADMIN_SETTINGS_FORM_SYSTEM_ID);
        $this->Viewer_Assign('sAdminSystemConfigId', ModuleStorage::DEFAULT_KEY_NAME);

        $this->Lang_AddLangJs(array('plugin.admin.errors.some_fields_are_incorrect'));
    }


    /**
     * Сохранить настройки (запрос может быть выполнен обычным способом так и через аякс, в зависимости от настройки соответствующего параметра в конфиге админки)
     *
     * @return mixed
     */
    public function EventSaveConfig()
    {
        /*
         * получить тип ответа на запрос сохранения настроек
         */
        if ($bAjax = isAjaxRequest()) {
            $this->Viewer_SetResponseAjax('json');
        }

        $this->Security_ValidateSendForm();
        /*
         * если была нажата кнопка
         */
        if (isPost('submit_save_settings')) {
            /*
             * успешно ли сохранение настроек
             */
            $bResult = $this->SaveSettings();
            /*
             * если успешно
             */
            if ($bResult) {
                /*
                 * вывести сообщение для аякса сразу, иначе - отложить сообщение в сессию
                 */
                $this->Message_AddNotice($this->Lang('notices.settings.saved'), '', !$bAjax);
            }
            /*
             * если это аякс - загрузить весь набор ошибок для показа на форме
             */
            if ($bAjax) {
                /*
                 * через специальный метод админки
                 */
                $this->Viewer_AssignAjax('aParamErrors', $this->Message_GetParamsErrors());
            }
        } else {
            $this->Message_AddError($this->Lang_Get('plugin.admin.errors.request_was_not_sent'),
                $this->Lang_Get('common.error.error'));
        }
        /*
         * если это обычный запрос - сделать редирект
         */
        if (!$bAjax) {
            return $this->RedirectToReferer();
        }
    }


    /*
     *
     * --- Хелперы ---
     *
     */

    /**
     * Выполнить сохранение настроек
     *
     * @return bool
     */
    protected function SaveSettings()
    {
        /*
         * корректно ли имя конфига
         */
        if (!$sConfigName = $this->getParam(1) or !is_string($sConfigName)) {
            $this->Message_AddError($this->Lang_Get('plugin.admin.errors.wrong_config_name'), $this->Lang_Get('common.error.error'));
            return false;
        }
        /*
         * является ли набор настроек настройками движка или это активированный плагин
         */
        if ($sConfigName != ModuleStorage::DEFAULT_KEY_NAME and !$this->PluginAdmin_Settings_CheckPluginCodeIsActive($sConfigName)) {
            $this->Message_AddError($this->Lang_Get('plugin.admin.errors.plugin_need_to_be_activated'),
                $this->Lang_Get('common.error.error'));
            return false;
        }
        /*
         * получение всех параметров, их валидация и сверка с описанием структуры и запись в отдельную инстанцию конфига
         */
        if (!$this->PluginAdmin_Settings_ParsePOSTDataIntoSeparateConfigInstance($sConfigName)) {
            /*
             * список ошибок уже создан с помощью специального метода модуля Message при проверке и будет передан пользователю вызывающим методом
             */
            return false;
        }
        /*
         * сохранить все настройки плагина в БД
         */
        $this->PluginAdmin_Settings_SaveConfigByKey($sConfigName);
        return true;
    }


    /*
     *
     * --- Настройки движка ---
     *
     */

    /**
     * Получить системные настройки ядра по имени группы
     *
     * @param $sGroupName            имя группы, как она записана в конфиге групп
     * @return bool
     */
    protected function ShowSystemSettings($sGroupName)
    {
        $this->SetTemplateAction('settings/list');
        /*
         * данные разделов группы
         */
        $aSectionsInfo = $this->aCoreSettingsGroups[$sGroupName];
        /*
         * это настройки ядра
         */
        $sConfigName = ModuleStorage::DEFAULT_KEY_NAME;
        $aSections = $this->PluginAdmin_Settings_GetSectionsAndItsSettings($aSectionsInfo, $sConfigName);

        $this->Viewer_Assign('aSections', $aSections);
        $this->Viewer_Assign('sConfigName', $sConfigName);
        $this->Viewer_Assign('sGroupName', $sGroupName);

        $this->Viewer_Assign('sAdminSettingsFormSystemId', PluginAdmin_ModuleSettings::ADMIN_SETTINGS_FORM_SYSTEM_ID);
        $this->Viewer_Assign('sAdminSystemConfigId', ModuleStorage::DEFAULT_KEY_NAME);

        $this->Lang_AddLangJs(array('plugin.admin.errors.some_fields_are_incorrect'));
    }


    /**
     * Этот магический метод показывает настройки для каждой, заданной в конфиге админки, группы
     *
     * @param $sName
     * @param $aArgs
     * @return bool|mixed
     * @throws Exception
     */
    public function __call($sName, $aArgs)
    {
        /*
         * если это вызов для показа системных настроек ядра
         */
        if (strpos($sName, $this->sCallbackMethodToShowSystemSettings) !== false) {
            /*
             * пробуем получить имя группы настроек как оно должно быть записано в конфиге
             */
            $sGroupName = strtolower(str_replace($this->sCallbackMethodToShowSystemSettings, '', $sName));
            /*
             * если такая группа настроек существует
             */
            if (isset($this->aCoreSettingsGroups[$sGroupName])) {
                return $this->ShowSystemSettings($sGroupName);
            }
            /*
             * это сообщение не будет никогда показано при текущих настройках, но пусть будет для отладки
             */
            throw new Exception('Admin: error: there is no settings group name as "' . $sGroupName . '"');
        }
        /*
         * это обращение к ядру
         */
        return parent::__call($sName, $aArgs);
    }


    /*
     *
     * --- SEO ---
     *
     */

//    public function EventSeo()
//    {
//        $aSeoSettingsGroups = Config::Get(PluginAdmin_ModuleSettings::SEO_CONFIG_GROUPS_KEY);
//        $sConfigName = ModuleStorage::DEFAULT_KEY_NAME;
//        $aSections = $this->PluginAdmin_Settings_GetSectionsAndItsSettings($aSeoSettingsGroups, $sConfigName);
//
//        $this->SetTemplateAction('settings/seo');
//        $this->Viewer_Assign('aSections', $aSections);
//        $this->Viewer_Assign('sConfigName', 'seo');
//        $this->Viewer_Assign('sAdminSettingsFormSystemId', PluginAdmin_ModuleSettings::ADMIN_SETTINGS_FORM_SYSTEM_ID);
//    }
//
//    public function SaveSettingsSeo()
//    {
//        /*
//         * корректно ли имя конфига
//         */
//        if (!$sConfigName = $this->getParam(0) or !is_string($sConfigName)) {
//            $this->Message_AddError($this->Lang_Get('plugin.admin.errors.wrong_config_name'), $this->Lang_Get('common.error.error'));
//            return false;
//        }
//        /*
//         * получение всех параметров, их валидация и сверка с описанием структуры и запись в отдельную инстанцию конфига
//         */
//        if (!$this->PluginAdmin_Settings_ParsePOSTDataIntoSeparateConfigInstance($sConfigName)) {
//            /*
//             * список ошибок уже создан с помощью специального метода модуля Message при проверке и будет передан пользователю вызывающим методом
//             */
//            return false;
//        }
//        /*
//         * сохранить все настройки плагина в БД
//         */
//        $this->PluginAdmin_Settings_SaveConfigByKey($sConfigName);
//        return true;
//    }

}