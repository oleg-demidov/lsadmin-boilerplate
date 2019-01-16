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
 * Модуль, который будет удалять контент из БД при удалении пользователя
 *
 * Специфика удаления контента такова, что нужно удалить большое количество данных из БД при помощи простых однотипных методов,
 * поэтому не хочется создавать кучу почти одинаковых модулей для каждого типа данных (активность, избранное и т.п.) с похожими методами удаления контента.
 * Данный модуль призван дать универсальный интерфейс для удаления данных из БД.
 */

class PluginAdmin_ModuleDeletecontent extends Module
{

    private $oMapper = null;

    


    public function Init()
    {
        $this->oMapper = Engine::GetMapper(__CLASS__);
    }


   
    /*
     *
     * --- Работа с флагом проверки внешних ключей ---
     *
     */

    /**
     * Установить новое значение для флага проверки внешних связей с предварительной проверкой установленного типа таблиц
     *
     * @param $iValue        значение флага
     */
    protected function ChangeForeignKeysCheckingTo($iValue)
    {
        /*
         * только если тип таблиц InnoDB
         */
        if (Config::Get('db.tables.engine') == 'InnoDB') {
            $this->oMapper->SetForeignKeysChecking($iValue);
        }
    }


    /**
     * Выключить проверку внешних ключей
     */
    public function DisableForeignKeysChecking()
    {
        $this->ChangeForeignKeysCheckingTo(0);
    }


    /**
     * Включить проверку внешних ключей
     */
    public function EnableForeignKeysChecking()
    {
        $this->ChangeForeignKeysCheckingTo(1);
    }



    public function DeleteMessages($oUser) {
        $this->Talk_DeleteMessageItemsByFilter([
            'user_id' => $oUser->getId()
        ]);
        
        $this->Talk_DeleteMessageItemsByFilter([
            'target_id' => $oUser->getId(),
            'target_type' => 'user'
        ]);
    }
    

    public function DeleteVotes($oUser) {
        $this->Rating_DeleteVoteItemsByFilter([
            'target_id' => $oUser->getId(),
            'target_type' => 'user'
        ]);
    }
    
    public function DeleteMedia($oUser) {
        
        $aMedias = $this->Media_GetMediaItemsByFilter([
            'user_id' => $oUser->getId(),
            '#index-from' => 'id'
        ]);
        
        foreach ($aMedias as $oMedia) {
            $oMedia->Delete();
        }
        
        $this->Media_DeleteTargetItemsByFilter([
            'media_id in' => array_keys($aMedias)?array_keys($aMedias):[0],
        ]);
    }
}

?>