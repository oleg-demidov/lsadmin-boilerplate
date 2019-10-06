<?php

/**
 * Управление списком подключаемых JS и CSS
 */
return[
    'js' => array(
        // Plugin scripts
        '___path.plugin.admin.server___/frontend/skin/___view.skin___/assets/js/init.js',
        // Vendor scripts
        '___path.plugin.admin.server___/frontend/skin/___view.skin___/assets/js/vendor/highcharts/highcharts.js',
    //    'assets/js/vendor/icheck/jquery.icheck.js'
    ),
    'css' => array(
        // Plugin style
        '___path.plugin.admin.server___/frontend/skin/___view.skin___/assets/css/base.css',
        '___path.plugin.admin.server___/frontend/skin/___view.skin___/assets/css/layout.css',
        // Vendor style
        '___path.plugin.admin.server___/frontend/skin/___view.skin___/assets/css/vendor/jquery.notifier.css',
        '___path.plugin.admin.server___/frontend/skin/___view.skin___/assets/css/vendor/icheck/skins/livestreet/minimal.css',
    ),
    'img' => [
        "favicon" => "___path.plugin.admin.server___/frontend/skin/___view.skin___/assets/images/favicon.ico",
        "logo" => "___path.plugin.admin.server___/frontend/skin/___view.skin___/assets/images/logo.png",
        'default_avatar' => "___path.plugin.admin.server___/frontend/skin/___view.skin___/assets/images/avatars/avatar_male_100x100crop.png",
    ]
    
];
