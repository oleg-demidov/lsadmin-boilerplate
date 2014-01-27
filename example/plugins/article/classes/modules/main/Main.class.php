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
 * @author Maxim Mzhelskiy <rus.engine@gmail.com>
 *
 */

class PluginArticle_ModuleMain extends ModuleORM {

	/**
	 * Возвращает тип для дополнительных полей
	 *
	 * @return string
	 */
	public function GetPropertyTargetType() {
		return Config::Get('plugin.article.property_target_type');
	}

	/**
	 * Возвращет список статей по тегу. Используется функционал дополнительных полей
	 *
	 * @param string $sTag
	 * @param int $iCurrPage
	 * @param int $iPerPage
	 *
	 * @return array('collection'=>array(),'count'=>int)
	 */
	public function GetArticleItemsByTag($sTag,$iCurrPage,$iPerPage) {
		// TODO: необходимо получить свойство(поле) с тегами
		$iPropertyId=1;
		$aResult=$this->Property_GetTargetsByTag($iPropertyId,$sTag,$iCurrPage,$iPerPage);
		if ($aResult['collection']) {
			$aResult['collection']=$this->GetArticleItemsByFilter(array('id in'=>$aResult['collection'],'#order'=>array('FIELD:id'=>$aResult['collection'])));
		}
		return $aResult;
	}
}