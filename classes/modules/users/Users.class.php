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
 * @author PSNet <light.feel@gmail.com>
 * 
 */

class PluginAdmin_ModuleUsers extends Module {

	/*
	 * типы правила бана
	 */
	const BAN_BLOCK_TYPE_USER_ID = 1;
	const BAN_BLOCK_TYPE_IP = 2;
	const BAN_BLOCK_TYPE_IP_RANGE = 4;

	/*
	 * типы времени бана (постоянный и на период)
	 */
	const BAN_TIME_TYPE_PERMANENT = 1;
	const BAN_TIME_TYPE_PERIOD = 2;

	protected $oMapper = null;

	/*
	 * направление сортировки по-умолчанию (если она не задана или некорректна)
	 */
	protected $sSortingWayByDefault = 'desc';

	/*
	 * корректные направления сортировки
	 * (не менять порядок!)
	 */
	protected $aSortingOrderWays = array('desc', 'asc');


	public function Init() {
		$this->oMapper = Engine::GetMapper(__CLASS__);
	}


	/**
	 * Возвращает список пользователей по фильтру
	 *
	 * @param array 	$aFilter		Фильтр
	 * @param array 	$aOrder			Сортировка
	 * @param int 		$iCurrPage		Номер страницы
	 * @param int 		$iPerPage		Количество элментов на страницу
	 * @param array 	$aAllowData		Список типо данных для подгрузки к пользователям
	 * @return array('collection'=>array,'count'=>int)
	 */
	public function GetUsersByFilter($aFilter = array(), $aOrder = array(), $iCurrPage = 1, $iPerPage = PHP_INT_MAX, $aAllowData = null) {
		if (is_null ($aAllowData)) {
			$aAllowData = array ('session');
		}
		$sOrder = $this -> GetCorrectSortingOrder(
			$aOrder,
			Config::Get('plugin.admin.correct_sorting_order_for_users'),
			Config::Get('plugin.admin.default_sorting_order_for_users')
		);
		$mData = $this -> oMapper -> GetUsersByFilter($aFilter, $sOrder, $iCurrPage, $iPerPage);

		$mData['collection'] = $this -> User_GetUsersAdditionalData($mData['collection'], $aAllowData);
		return $mData;
	}


	/**
	 * Проверяет корректность сортировки и возращает часть sql запроса для сортировки
	 *
	 * @param array $aOrder						поля, по которым нужно сортировать вывод пользователей
	 * 											(array('login' => 'desc', 'rating' => 'desc'))
	 * @param array $aCorrectSortingOrderList	список разрешенных сортировок
	 * @param       $sSortingOrderByDefault		строка сортировки по-умолчанию
	 * @return string							часть sql запроса
	 */
	protected function GetCorrectSortingOrder($aOrder = array (), $aCorrectSortingOrderList = array(), $sSortingOrderByDefault) {
		$sOrder = '';
		foreach($aOrder as $sRow => $sDir) {
			if (!in_array($sRow, $aCorrectSortingOrderList)) {
				unset($aOrder[$sRow]);
			} elseif (in_array($sDir, $this -> aSortingOrderWays)) {
				$sOrder .= " {$sRow} {$sDir},";
			}
		}
		$sOrder = rtrim($sOrder, ',');
		if (empty($sOrder)) {
			$sOrder = $sSortingOrderByDefault;
		}
		return $sOrder;
	}


	/**
	 * Получить сортировку наоборот
	 *
	 * @param $sWay			текущий тип сортировки
	 * @return string		противоположный
	 */
	public function GetReversedOrderDirection ($sWay) {
		if ($sDefaultWay = $this->GetDefaultOrderDirectionIfIncorrect($sWay) !== $sWay) return $sDefaultWay;
		return $this -> aSortingOrderWays[(int) ($sWay == $this->sSortingWayByDefault)];
	}


	/**
	 * Получить сортировку по-умолчанию, если она не задана или некорректна
	 *
	 * @param $sWay			текущий тип сортировки
	 * @return string		текущий или по-умолчанию (если не корректен)
	 */
	public function GetDefaultOrderDirectionIfIncorrect ($sWay) {
		if (!in_array($sWay, $this -> aSortingOrderWays)) return $this->sSortingWayByDefault;
		return $sWay;
	}


	/**
	 * Установить количество пользователей на странице
	 *
	 * @param $iPerPage		количество
	 */
	public function ChangeUsersPerPage ($iPerPage) {
		/*
		 * установить количество пользователей на странице
		 */
		$aData = array(
			'user' => array(
				'per_page' => $iPerPage,
			)
		);
		$this->PluginAdmin_Settings_SaveConfigByKey('admin', $aData);
	}


	/**
	 * Получить статистическую информацию о том, за что, как и сколько раз голосовал пользователь
	 *
	 * @param $oUser		объект пользователя
	 * @return array		ассоциативный массив голосований за обьекты
	 */
	public function GetUserVotingStats ($oUser) {
		$sCacheKey = 'get_user_voting_stats_' . $oUser->getId();
		if (($aData = $this->Cache_Get($sCacheKey)) === false) {
			$aData = $this->CalcUserVotingStats($oUser);
			$this->Cache_Set($aData, $sCacheKey, array(
				'vote_update_topic',
				'vote_update_comment',
				'vote_update_blog',
				'vote_update_user'
			), 60 * 30);			// reset every 30 min
		}
		return $aData;
	}


	/**
	 * Рассчитать статистику голосования пользователя
	 *
	 * @param $oUser		объект пользователя
	 * @return array
	 */
	protected function CalcUserVotingStats ($oUser) {
		/*
		 * заполнить значениями по-умолчанию
		 */
		$aVotingStats = array(
			'topic' => array('plus' => 0, 'minus' => 0),
			'comment' => array('plus' => 0, 'minus' => 0),
			'blog' => array('plus' => 0, 'minus' => 0),
			'user' => array('plus' => 0, 'minus' => 0),
		);
		$aResult = $this->oMapper->GetUserVotingStats ($oUser->getId());
		/*
		 * собрать данные в удобном виде
		 */
		foreach ($aResult as $aData) {
			$aVotingStats[$aData['target_type']][$aData['vote_direction'] == '1' ? 'plus' : 'minus'] = $aData['count'];
		}
		return $aVotingStats;
	}


	/**
	 * Получить списки голосований пользователя по фильтру
	 *
	 * @param     	$oUser			объект пользователя
	 * @param     	$aFilter		фильтр
	 * @param		$aOrder			сортировка
	 * @param int 	$iPage			номер страницы
	 * @param int 	$iPerPage		результатов на страницу
	 * @return mixed				коллекция и количество
	 */
	public function GetUserVotingByFilter ($oUser, $aFilter, $aOrder = array(), $iPage = 1, $iPerPage = PHP_INT_MAX) {
		$sCacheKey = 'get_user_voting_list_' . implode('_', array($oUser->getId(), serialize($aFilter), serialize($aOrder), $iPage, $iPerPage));
		if (($aData = $this->Cache_Get($sCacheKey)) === false) {
			$aData = $this->oMapper->GetUserVotingListByFilter(
				$oUser->getId(),
				$this->BuildFilterForVotingList($aFilter),
				$this->GetCorrectSortingOrder(
					$aOrder,
					Config::Get('plugin.admin.correct_sorting_order_for_votes'),
					Config::Get('plugin.admin.default_sorting_order_for_votes')
				),
				$iPage,
				$iPerPage
			);
			$this->Cache_Set($aData, $sCacheKey, array(
				'vote_update_topic',
				'vote_update_comment',
				'vote_update_blog',
				'vote_update_user'
			), 60 * 30);			// reset every 30 min
		}
		return $aData;
	}


	/**
	 * Построить фильтр для запроса списка голосований пользователя
	 *
	 * @param $aFilter			фильтр
	 * @return string			строка sql запроса
	 */
	protected function BuildFilterForVotingList ($aFilter) {
		$sWhere = '';
		if (isset($aFilter['type']) and $aFilter['type']) {
			$sWhere .= ' AND `target_type` = "' . $aFilter['type'] . '"';
		}
		if (isset($aFilter['direction']) and $aFilter['direction']) {
			$sWhere .= ' AND `vote_direction` = ' . ($aFilter['direction'] == 'plus' ? '1' : '-1');
		}
		return $sWhere;
	}


	/**
	 * Для списка голосов получить обьект и задать новые универсализированные параметры (заголовок и ссылку на сам обьект)
	 *
	 * @param array $aVotingList	массив голосов
	 * @throws Exception
	 */
	public function GetTargetObjectsFromVotingList($aVotingList) {
		foreach($aVotingList as $oVote) {
			switch ($oVote->getTargetType()) {
				case 'topic':
					if ($oTopic = $this->Topic_GetTopicById($oVote->getTargetId())) {
						$oVote->setTargetTitle($oTopic->getTitle());
						$oVote->setTargetFullUrl($oTopic->getUrl());
					}
					break;
				case 'blog':
					if ($oBlog = $this->Blog_GetBlogById($oVote->getTargetId())) {
						$oVote->setTargetTitle($oBlog->getTitle());
						$oVote->setTargetFullUrl($oBlog->getUrlFull());
					}
					break;
				case 'user':
					if ($oUser = $this->User_GetUserById($oVote->getTargetId())) {
						$oVote->setTargetTitle($oUser->getLogin());
						$oVote->setTargetFullUrl($oUser->getUserWebPath());
					}
					break;
				case 'comment':
					if ($oComment = $this->Comment_GetCommentById($oVote->getTargetId())) {
						$oVote->setTargetTitle($oComment->getText());
						/*
						 * пока только для топиков
						 */
						if ($oComment->getTargetType() == 'topic') {
							$oVote->setTargetFullUrl($oComment->getTarget()->getUrl() . 'comment' . $oComment->getId());
						}
					}
					break;
				default:
					throw new Exception('Admin: error: unsupported target type: "' . $oVote->getTargetType() . '"');
					break;
			}
		}
	}


	public function AddBanRecord ($oBan) {
		// todo: cache
		return $this->oMapper->AddBanRecord ($oBan);
	}


}

?>