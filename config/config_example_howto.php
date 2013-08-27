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

/*
 *
 * Пример параметров всех типов для конфига и их описание для управления через админку
 * Данный файл является примером и создан в обучающих целях и не нужен для работы админки.
 *
 */

/*
 *	FAQ: 1. Сначала нужно записать параметры как обычно
 */

$config['test']['subarr'] = 3;					// integer
$config['moredata'] = 'param2';					// string
$config['some_param'] = true;					// bool
$config['users']['min_rating'] = 0.1;			// float

/*
 * Массивы
 */

$config['sitemap'] = array(
		'cache_lifetime' => 60 * 60 * 24,
		'sitemap_priority' => '0.8',
);

$config['setup_rules']['one'] = array(1, 2, 3);

/*
 *	FAQ: 2. Потом нужно указать описание структуры для каждого параметра в специальном массиве, которым управляет админка
 */

/*
 * Описание настроек плагина
 */
$config['$config_scheme$'] = array(

	/*
	 * todo: delete (TEMP TEST)
	 */
	'user.per_page' => array(
		'type' => 'integer',															// integer, string, array, boolean, float
		'name' => 'config_parameters.test.subarr.name',									// отображаемое имя параметра, ключ языкового файла
		'description' => '',
		'validator' => array(					// валидация(если нужна), существующие типы валидаторов ядра
			'type' => 'Number',					// Boolean, Compare, Date, Email, Number, Regexp, Required, String, Tags, Type, Url, Array (special validator)
			'params' => array(					// параметры, которые будут переданы в валидатор
				'min' => 1,
				'max' => 100,
				'integerOnly' => true,
				'allowEmpty' => false,
			),
		),
	),
	/*
	 * todo: delete (TEMP TEST)
	 */
	'bans.per_page' => array(
		'type' => 'integer',															// integer, string, array, boolean, float
		'name' => 'config_parameters.test.subarr.name',									// отображаемое имя параметра, ключ языкового файла
		'description' => '',
		'validator' => array(					// валидация(если нужна), существующие типы валидаторов ядра
			'type' => 'Number',					// Boolean, Compare, Date, Email, Number, Regexp, Required, String, Tags, Type, Url, Array (special validator)
			'params' => array(					// параметры, которые будут переданы в валидатор
				'min' => 1,
				'max' => 100,
				'integerOnly' => true,
				'allowEmpty' => false,
			),
		),
	),





	/*
	 * Пример для параметра целочисленного типа
	 */
	'test.subarr' => array(
		'type' => 'integer',															// integer, string, array, boolean, float
		'name' => 'config_parameters.test.subarr.name',									// отображаемое имя параметра, ключ языкового файла
		'description' => 'config_parameters.test.subarr.description',					// отображаемое описание параметра, ключ языкового файла
		'validator' => array(				// валидация (если нужна), существующие типы валидаторов ядра
			'type' => 'Number',				// Boolean, Compare, Date, Email, Number, Regexp, Required, String, Tags, Type, Url, Array (special validator)
			'params' => array(				// параметры, которые будут переданы в валидатор
				'min' => 1,
				'max' => 100,
				'integerOnly' => true,
				'allowEmpty' => false,
			),
		),
	),
	
	/*
	 * Пример для параметра строкового типа
	 */
	'moredata' => array(
		'type' => 'string',																// integer, string, array, boolean, float
		'name' => 'config_parameters.moredata.name',									// отображаемое имя параметра, ключ языкового файла
		'description' => 'config_parameters.moredata.description',						// отображаемое описание параметра, ключ языкового файла
		'validator' => array(					// валидация(если нужна), существующие типы валидаторов ядра
			'type' => 'String',					// Boolean, Compare, Date, Email, Number, Regexp, Required, String, Tags, Type, Url, Array (special validator)
			'params' => array(					// параметры, которые будут переданы в валидатор
				'min' => 2,
				'max' => 50,
				//'is' => 30,               	// Конкретное значение длины строки
				'allowEmpty' => false,      	// Допускать или нет пустое значение
			),
		),
	),

	/*
	 * Пример для параметра булевого типа
	 */
	'some_param' => array(
		'type' => 'boolean',															// integer, string, array, boolean, float
		'name' => 'config_parameters.some_param.name',									// отображаемое имя параметра, ключ языкового файла
		'description' => 'config_parameters.some_param.description',					// отображаемое описание параметра, ключ языкового файла
		'validator' => array(					// валидация(если нужна), существующие типы валидаторов ядра
			'type' => 'Boolean',				// Boolean, Compare, Date, Email, Number, Regexp, Required, String, Tags, Type, Url, Array (special validator)
			'params' => array(),
		),
	),
	
	/*
	 * Пример для параметра плавающего типа
	 */
	'users.min_rating' => array(
		'type' => 'float',																// integer, string, array, boolean, float
		'name' => 'config_parameters.users.min_rating.name',							// отображаемое имя параметра, ключ языкового файла
		'description' => 'config_parameters.users.min_rating.description',				// отображаемое описание параметра, ключ языкового файла
		'validator' => array(					// валидация(если нужна), существующие типы валидаторов ядра
			'type' => 'Number',					// Boolean, Compare, Date, Email, Number, Regexp, Required, String, Tags, Type, Url, Array (special validator)
			'params' => array(					// параметры, которые будут переданы в валидатор
				'min' => 0,
				'max' => 100,
				'integerOnly' => false,
				'allowEmpty' => false,
			),
		),
	),
	
	/*
	 * Массивы
	 */

	/*
	 * Пример для параметра от массива
	 */
	'sitemap.cache_lifetime' => array(
		'type' => 'integer',															// integer, string, array, boolean, float
		'name' => 'config_parameters.sitemap.cache_lifetime.name',						// отображаемое имя параметра, ключ языкового файла
		'description' => 'config_parameters.sitemap.cache_lifetime.description',		// отображаемое описание параметра, ключ языкового файла
		'validator' => array(					// валидация(если нужна), существующие типы валидаторов ядра
			'type' => 'Number',					// Boolean, Compare, Date, Email, Number, Regexp, Required, String, Tags, Type, Url, Array (special validator)
			'params' => array(					// параметры, которые будут переданы в валидатор
				'min' => 0,
				'max' => 1000000,
				'integerOnly' => true,
				'allowEmpty' => false,
			),
		),
	),
	
	/*
	 * Пример для параметра от массива
	 */
	'sitemap.sitemap_priority' => array(
		'type' => 'string',																// integer, string, array, boolean, float
		'name' => 'config_parameters.sitemap.sitemap_priority.name',					// отображаемое имя параметра, ключ языкового файла
		'description' => 'config_parameters.sitemap.sitemap_priority.description',		// отображаемое описание параметра, ключ языкового файла
		'validator' => array(					// валидация(если нужна), существующие типы валидаторов ядра
			'type' => 'String',					// Boolean, Compare, Date, Email, Number, Regexp, Required, String, Tags, Type, Url, Array (special validator)
			'params' => array(					// параметры, которые будут переданы в валидатор
				'min' => 2,
				'max' => 100,
			),
		),
	),
	
	
	/*
	 * Пример для параметра-массива
	 */
	'setup_rules.one' => array(
		'type' => 'array',																// integer, string, array, boolean, float
		'name' => 'config_parameters.setup_rules.one.name',								// отображаемое имя параметра, ключ языкового файла
		'description' => 'config_parameters.setup_rules.one.description',				// отображаемое описание параметра, ключ языкового файла
		'show_as_php_array' => false,	 // выводить как обычный массив, иначе будет показан селект на основе данных валидатора(enum или поле ввода)
		'validator' => array(						// валидация(если нужна), существующие типы валидаторов ядра
			'type' => 'Array',						// Boolean, Compare, Date, Email, Number, Regexp, Required, String, Tags, Type, Url, Array (special validator)
			'params' => array(						// параметры, которые будут переданы в валидатор
				'min_items' => 2,					// мин. количество элементов в массиве
				'max_items' => 10,					// макс. количество элементов в массиве
				'enum' => array(					// перечисление разрешенных элементов массива
					1, 2, 3, 4, 5, 6, 7, 8, 9, 10
				),
				'allowEmpty' => false,
				/*
				 * И/ИЛИ
				 */
				'item_validator' => array(			// валидатор каждого элемента массива как отдельного элемента
					'type' => 'Number',			 	// Boolean, Compare, Date, Email, Number, Regexp, Required, String, Tags, Type, Url, Array (special validator)
					'params' => array(				// параметры, которые будут переданы в валидатор
						'min' => 0,
						'max' => 100,
						'integerOnly' => true,
						'allowEmpty' => false,
					),
				),
			),
		),
	),
	
);	// /$config_scheme$

return $config;

?>