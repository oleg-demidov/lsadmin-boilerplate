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
$assets = require __DIR__ . '/assets.php';

$bans = require __DIR__ . '/bans.php';

$utils = require __DIR__ . '/encoding_checking_dirs.php';

$config_scheme = require __DIR__ . '/config_scheme.php';

$config_sections = require __DIR__ . '/config_sections.php';

$settings = require __DIR__ . '/settings.php';

$users = require __DIR__ . '/users.php';

$config = array();
/*
 * количество событий по-умолчанию для ленты последней активности главной страницы админки
 */
$config['dashboard']['stream']['count_default'] = 5;

/*
 * список значений количества элементов на страницу в выпадающем списке
 */
$config['pagination']['values_for_select_elements_on_page'] = array(10, 30, 100);        // range(5, 100, 5)

/*
 * макс. количество точек на графике (фильтрует подписи по оси х)
 */
$config['stats']['max_points_on_graph'] = 10;

/*
 * роутер
 */
$config['$root$']['router']['page']['admin'] = 'PluginAdmin_ActionAdmin';

/*
 * таблицы
 */
$config['$root$']['db']['table']['users_ban'] = '___db.table.prefix___admin_users_ban';

/**
 * Список компонентов для админки
 */
$config['components'] = array(
    // Базовые компоненты
    'admin:css-reset', 'admin:css-helpers', 'admin:typography', 'admin:forms', 'admin:grid', 'admin:ls-vendor', 'admin:ls-core', 'admin:ls-component', 'admin:lightbox',
    'admin:slider', 'admin:details', 'admin:alert', 'admin:dropdown', 'admin:button', 'admin:block', 'admin:confirm',
    'admin:nav', 'admin:tooltip', 'admin:tabs', 'admin:modal', 'admin:table', 'admin:text', 'admin:uploader', 'admin:email', 'admin:field', 'admin:pagination',
    'admin:editor', 'admin:more', 'admin:crop', 'admin:performance', 'admin:toolbar', 'admin:actionbar', 'admin:badge',
    'admin:autocomplete', 'admin:icon', 'admin:item', 'admin:highlighter', 'admin:jumbotron', 'admin:notification', 'admin:blankslate', 'admin:info-list',

    // Компоненты админки
    'admin:p-plugin', 'admin:p-skin', 'admin:p-settings', 'admin:p-actionbar', 'admin:p-cron', 'admin:p-property', 'admin:p-topic', 'admin:p-category', 'admin:p-optimization',
    'admin:p-form', 'admin:p-rbac', 'admin:p-user', 'admin:p-menu', 'admin:p-dashboard', 'admin:p-graph', 'admin:p-userbar', 'admin:import',

    // Компоненты LS CMS
    'admin:note', 'admin:icons-contact', 'admin:toolbar-scrollup', 'admin:toolbar-scrollnav',
    'admin:media', 'admin:property', 'admin:content', 'admin:activity', 'tinymce', 'bs-button'
);

$config['assets'] = $assets;

$config['bans'] = $bans;

$config['utils'] = $utils;

$config['$config_scheme$'] = $config_scheme;

$config['$config_sections$'] = $config_sections;

$config['settings'] = $settings;

$config['users'] = $users;

return $config;