<?php

$config = array();

// Подключение ресурсов шаблона
$config['assets']['template'] = [
    'js' => array(
        
    ),

    // Подключение стилей шаблона
    'css' => array(
        
        ),
    'img' => [
        "logo" => "___path.plugin.admin.template___/assets/images/logo.png",
        "favicon" => "___path.plugin.admin.template___/assets/images/favicon.ico",
        'default_avatar' => "___path.plugin.admin.template___/assets/images/avatars/avatar_male_100x100crop.png",
    ]
];  

$config['components'] = [

//    
//    //Компоненты шаблона
//    'dropdown', 
//    'form', 
//    'pagination', 
//    'nav', 
//    'ajax',
//    'icon', 
//    'autocomplete',
//    'popover',
//    'text', 
//    'button'
];



return $config;
