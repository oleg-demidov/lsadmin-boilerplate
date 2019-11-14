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
 * --- Настройки конфига админки ---
 *
 * tip: за полным описанием и примерами следует смотреть конфиг "config_scheme_sandbox.php"
 *
 */
return array(
    /*
     * раздел "Баны"
     *
     * tip: ключ "bans" указывать не обязательно, здесь он нужен чтобы лоадер движка корректно загрузил два конфига (песочницы и реальных настроек),
     * 		т.к. ассоциативные массивы обьеденяются при загрузке.
     * 		В плагинах нужно указывать ключ для группы настроек только если группы настроек разделены на несколько файлов
     */
    'bans'     => array(
        'name'         => 'config_sections.bans.title',
        'allowed_keys' => array(
            'bans*',
        ),
    ),
    /*
     * раздел "каталог"
     */
    'catalog'  => array(
        'name'         => 'config_sections.catalog.title',
        'allowed_keys' => array(
            'catalog*',
        ),
    ),
    /*
     * раздел "настройки"
     */
    'settings' => array(
        'name'         => 'config_sections.settings.title',
        'allowed_keys' => array(
            'settings*',
        ),
    ),
    /*
     * раздел "пользователи"
     */
    'users'    => array(
        'name'         => 'config_sections.users.title',
        'allowed_keys' => array(
            'users*',
        ),
    ),
);