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
 * Работа с тикетами
 *
 */

class PluginAdmin_HookTickets extends Hook {


	public function RegisterHook() {
		/*
		 * добавить ссылку для жалобы на пользователя в его профиле
		 */
		$this->AddHook('template_profile_sidebar_menu_item_last', 'AddClaimLink');
	}


	public function AddClaimLink() {
		return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'actions/ActionTickets/claims/add_link.tpl');
	}
	
}

?>