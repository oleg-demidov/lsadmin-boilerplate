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
 * Работа с банами пользователей
 *
 */

class PluginAdmin_HookUserban extends Hook {

	public function RegisterHook() {
		$this->AddHook('engine_init_complete', 'EngineInitComplete', __CLASS__, -PHP_INT_MAX);	// наименьший приоритет, который можно установить
	}


	public function EngineInitComplete() {
		/*
		 * удалить старые записи банов
		 */
		$this->CheckOldBanRecords();
		/*
		 * если текущий пользователь попадает под условия бана - показать ему сообщение
		 */
		$this->CheckUserBan();
	}


	/**
	 * Проверка бана
	 */
	protected function CheckUserBan() {
		if ($oBan = $this->PluginAdmin_Users_IsThisUserBanned()) {
			/*
			 * пополнить статистику вызовов
			 */
			$this->AddBanStats($oBan);
			/*
			 * блокировать пользователя
			 */
			$this->ShowBanMessage($oBan);
		}
	}


	/**
	 * Показать сообщение о бане
	 *
	 * @param $oBan		объект бана
	 */
	protected function ShowBanMessage($oBan) {
		/*
		 * корректный код ответа - 403 (запрещено)
		 */
		header('HTTP/1.1 403');
		/*
		 * сообщение пользователю в зависимости от типа бана (временный или постоянный)
		 */
		if ($oBan->getTimeType() == PluginAdmin_ModuleUsers::BAN_TIME_TYPE_PERIOD) {
			$this->Message_AddError($this->Lang_Get('plugin.admin.bans.you_are_banned', array(
				'date_start' => $oBan->getDateStart(),
				'date_finish' => $oBan->getDateFinish(),
				'reason' => $oBan->getReasonForUser(),
			)), '403');
		} else {
			$this->Message_AddError($this->Lang_Get('plugin.admin.bans.permanently_banned', array(
				'reason' => $oBan->getReasonForUser(),
			)), '403');
		}
		/*
		 * независимо от типа блокировки (айпи или сущность пользователя) - авторизация запрещена
		 */
		$this->User_Logout();
		Router::Action('error');
	}


	/**
	 * Удалить старые записи банов
	 */
	protected function CheckOldBanRecords() {
		if (Config::Get('plugin.admin.auto_delete_old_ban_records')) {
			$this->PluginAdmin_Users_DeleteOldBanRecords();
		}
	}


	/**
	 * Добавить запись о срабатывании бана в статистику
	 *
	 * @param $oBan		объект бана
	 */
	protected function AddBanStats($oBan) {
		if (Config::Get('plugin.admin.gather_bans_running_stats')) {
			$this->PluginAdmin_Users_AddBanStat($oBan);
		}
	}

}

?>