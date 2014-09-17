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

/**
 * Русский языковой файл
 */
 
return array(
	
	/*
	 * Общие
	 */
	'title' => 'Админка для LiveStreet CMS',
	'current' => 'текущее',
	'on_page' => 'На странице',
	'delete' => 'Удалить',
	'edit' => 'Изменить',
	'from' => 'с',
	'to' => 'по',
	'show' => 'Показать',
	'show_more' => 'Показать еще',
	'reset_zoom' => 'Сбросить зум',
	'reset_zoom_tip' => 'Показать 1 к 1',
	'save' => 'Сохранить',
	'add' => 'Добавить',
	'controls' => 'Управление',
	'search' => 'Поиск',
	'word_or' => 'или',
	'attention' => 'Внимание',

	/*
	 * Ошибки
	 */
	'errors' => array(
		/*
		 * Общие
		 */
		'you_are_not_admin' => 'Вы не администратор',
		'plugin_need_to_be_activated' => 'Плагин должен быть активированым для редактирования настроек',
		'wrong_description_key' => 'Ключ <b>%%key%%</b> в описании настроек указывает на несуществующий параметр конфига. Этот параметр пропущен',
		'wrong_config_name' => 'Неверный ключ имени плагина',
		'request_was_not_sent' => 'Запрос на сохранение не получен (не нажата кнопка)',
		'wrong_parameter_value' => 'Неверное значение для параметра <b>%%key%%</b>. ',
		'unknown_parameter' => 'Передан параметр <b>%%key%%</b>, описание которого нет',
		'unknown_parameter_type' => 'Неизвестный тип параметра',
		'disallowed_parameter_value' => 'Это значение для параметра <b>%%key%%</b> недопустимо. ',
		'disallowed_settings_by_inheriting_plugin' => 'Набор данных значений для параметров запрещен для сохранения: ',
		'some_fields_are_incorrect' => 'В некоторых полях указаны неверные значения',
		
		/*
		 * Ошибки встроенных валидаторов
		 */
		'validator' => array(
			/*
			 * Ошибки встроенного валидатора массивов
			 */
			'validate_array_must_be_array' => 'Поле %%field%% должно быть массивом',
			'validate_array_too_small' => 'Массив %%field%% слишком маленький (минимально допустимо %%min_items%% элементов)',
			'validate_array_too_big' => 'Массив %%field%% слишком большой (максимально допустимо %%max_items%% элементов)',
			'validate_array_value_is_not_allowed' => 'В массиве %%field%% не должно быть значения "%%val%%"',
			'validate_array_value_is_not_correct' => 'Для массива %%field%% значение "%%val%%" не является корректным',

			/*
			 * Ошибки встроенного валидатора перечисления
			 */
			'validate_enum_value_type_is_not_correct' => 'В перечислении %%field%% указан некорректный тип данных',
			'validate_enum_value_is_not_allowed' => 'В перечислении %%field%% значение "%%val%%" не является разрешенным',
		),

		/*
		 * Ошибки активации шаблона
		 */
		'skin'=>array(
			'activation_version_error' => 'Для работы шаблона необходимо ядро LiveStreet версии не ниже <b>%%version%%</b>',
			'activation_requires_error' => 'Для работы шаблона необходим активированный плагин <b>%%plugin%%</b>',
			'unknown_skin' => 'Неизвестный шаблон',
			'xml_dont_tells_anything_about_this_theme' => 'В xml файле текущего шаблона нет никаких сведений об этой теме',
		),
		/*
		 * Ошибки банов
		 */
		'bans' => array(
			'wrong_ban_id' => 'Неверный id бана',
			'unknown_rule_sign' => 'Неверное правило поиска пользователя',
			'unknown_ban_timing_rule' => 'Неверный интервал времени бана %%type%%. Должен быть "unlimited", "period" или "days"',
			'incorrect_period_from' => 'Неверная дата старта (должна быть в формате ГГГГ-ММ-ДД ЧЧ:ММ:СС)',
			'period_from_must_be_gte_current_day' => 'Неверная дата старта: должна быть не меньше текущего дня',
			'incorrect_period_to' => 'Неверная дата финиша (должна быть в формате ГГГГ-ММ-ДД ЧЧ:ММ:СС)',
			'period_to_must_be_greater_than_from' => 'Дата финиша должна быть больше даты начала',
			'incorrect_days_count' => 'Неверно указано количество дней для бана',
			'incorrect_user_id' => 'Неверный id пользователя или пользователя с таким id не существует',
			'incorrect_admins_action_type' => 'Некорректная операция с админами',
			'delete_admin_rights_first' => 'Этот пользователь - администратор. Удалите права админа у пользователя сначала',
			'this_user_id_blocked_for_bans' => 'Этого пользователя нельзя банить - его ид занесен в список запрещенных ид к блокировке',
			'you_are_tried_to_ban_yourself' => 'Вы пытались забанить самого себя - вы попали под одно из условий бана',
		),
		/*
		 * Ошибки статистики пользователей
		 */
		'stats' => array(
			'wrong_date_range' => 'Неверный диапазон дат: дата финиша должна быть больше даты начала',
			'wrong_dates' => 'Неверный формат дат: даты должны быть в формате ГГГГ-ММ-ДД или ГГГГ-ММ-ДД ЧЧ:ММ:СС',
		),
		/*
		 * Ошибки главной страницы
		 */
		'index' => array(
			'empty_activity_filter' => 'Не выбраны типы объектов для показа последней активности',
		),
		/*
		 * Ошибки утилит
		 */
		'utils' => array(
			'unknown_check_n_repair_action' => 'Неизвестная команда для утилит раздела проверки и восстановления',
			'unknown_reset_n_clear_action' => 'Неизвестная команда для утилит раздела сброса и очистки',
		),
		/*
		 * Ошибки списка плагинов
		 */
		'plugins' => array(
			'unknown_action' => 'Неизвестное действие над плагином',
			'unknown_filter_type' => 'Неизвестный фильтр для списка плагинов',
			'plugin_not_found' => 'Плагин не найден',
			'plugin_code_is_wrong' => 'Плагин <b>%%code%%</b> не был добавлен в список т.к. имеет некорректный код (директорию),
			вам следует уточнить у его автора как должна называться директория с плагином',
			'plugin_code_is_wrong_but_found_correct' => 'Плагин <b>%%code%%</b> не был добавлен в список т.к. имеет некорректный код (директорию),
			возможно его директорию следует переименовать в <b>%%new_dir%%</b>',
			'wrong_xml_file' => 'У плагина <b>%%code%%</b> поврежден xml файл',
		),
		/*
		 * Ошибки редактирования пользователя
		 */
		'profile_edit' => array(
			'wrong_user_id' => 'Пользователь с таким id не найден',
			'disallowed_value' => 'Не разрешенное значение',
			'unknown_action_type' => 'Неизвестное действие над пользователем',
			'login_has_unsupported_symbols' => 'В новом логине есть недопустимые символы',
			'login_already_exists' => 'Этот логин уже занят',
			'mail_is_incorrect' => 'Почта введена неверно',
			'mail_already_exists' => 'Эта почта уже занята',
			'password_is_too_weak' => 'Этот пароль слишком простой',
			'wrong_number' => 'Некорректное число',
		),
		/*
		 * Ошибки проверки файлов на некорректную кодировку
		 */
		'encoding_check' => array(
			'unreadable_file' => 'Нет возможности прочесть файл <b>%%file%%</b>',
			'file_cant_be_read' => 'Файл <b>%%file%%</b> не удалось открыть для чтения',
			'utf8_bom_encoding_detected' => 'В файлах, указанных ниже (<b>%%count%%</b> шт.), найдена некорректная кодировка UTF-8 BOM,
			которая может вызывать разные проблемы при работе с движком, нужно открыть указанные файлы и изменить их кодировку на "UTF-8 <i>БЕЗ</i> BOM" т.е. просто "UTF-8":
			<br /><br />
			',
			'utf8_bom_file' => 'Файл',
		),
		/*
		 * ошибки соединения с каталогом
		 */
		'catalog' => array(
			'connect_error' => 'Ошибка соединения с каталогом',
			'no_curl_found' => 'Расширение cURL не установлено на вашем сервере. Для работы с каталогом дополнений LiveStreet CMS необходимо наличие этого расширения.
			Обратитесь в службу поддержки хостинга для подробностей по этому расширению.',
		),
		/*
		 * ошибки жалоб на пользователя
		 */
		'complaints' => array(
			'not_found' => 'Жалоба не найдена',
		),
		/*
		 * ошибки дополнительных полей
		 */
		'properties' => array(
			'not_removed' => 'Произошла ошибка при удалении',
		),

	),
	
	/*
	 * Уведомления
	 */
	'notices' => array(
		/*
		 * шаблон
		 */
		'template_changed' => 'Шаблон изменён',
		'template_preview_turned_off' => 'Предпросмотр шаблона отключен',
		'theme_changed' => 'Тема изменёна',

		/*
		 * главная страница админки
		 */
		'index' => array(
			'no_results' => 'По данному фильтру нет событий',
		),
		/*
		 * комментарии
		 */
		'comments' => array(
			'comment_deleted' => 'Комментарий удален',
		),
		/*
		 * плагины
		 */
		'plugins' => array(
			'activate' => 'Плагин активирован',
			'deactivate' => 'Плагин деактивирован',
			'remove' => 'Плагин удален',
			'apply_update' => 'Плагин обновлен',
			'reset_catalog_cache_done' => 'Список плагинов обновлен',
		),
		/*
		 * настройки
		 */
		'settings' => array(
			'saved' => 'Настройки успешно сохранены',
		),
		/*
		 * баны
		 */
		'bans' => array(
			'updated' => 'Бан обновлен',
			'deleted' => 'Бан удален',
		),
		/*
		 * администраторы
		 */
		'admins' => array(
			'add' => 'Права администратора добавлены',
			'delete' => 'Права администратора удалены',
		),
		/*
		 * пользователи
		 */
		'users' => array(
			'content_deleted' => 'Удаление контента пользователя завершено',
			'activated' => 'Пользователь активирован',
		),
		/*
		 * утилиты
		 */
		'utils' => array(
			/*
			 * Проверка и восстановление
			 */
			'check_n_repair' => array(
				/*
				 * работа с таблицами
				 */
				'tables' => array(
					'checking_comments_done' => 'Проверка и очистка таблиц комментариев и всех связанных данных заверешена',
					'checking_stream_done' => 'Проверка и очистка активности (стрима) от ссылок на некорректные записи заверешена',
					'checking_votings_done' => 'Проверка и очистка голосований от ссылок на некорректные записи заверешена',
					'checking_favourites_done' => 'Проверка и очистка избранного пользователей от ссылок на некорректные записи заверешена',
				),
				/*
				 * работа с файлами
				 */
				'files' => array(
					'checking_encoding_done' => 'Проверка кодировки файлов успешно завершена',
				),
			),
			/*
			 * Сброс и очистка
			 */
			'reset_n_clear' => array(
				/*
				 * сброс данных
				 */
				'datareset' => array(
					'bans_stats_cleared' => 'Статистика срабатываний банов очищена',
					'old_ban_records_deleted' => 'Удаление старых банов завершено',
					'reset_all_ls_cache_done' => 'Кеш движка сброшен',
				),
			),

		),
		/*
		 * профиль пользователя
		 */
		'user_profile_edit' => array(
			'updated' => 'Правки внесены',
		),
		/*
		 * изменение количества элементов на страницу
		 */
		'items_per_page' => array(
			'value_changed' => 'Значение изменено',
		),
		/*
		 * жалобы
		 */
		'complaints' => array(
			'answer_sent' => 'Ответ отправлен',
			'deleted' => 'Жалоба удалена',
		),
		/*
		 * дополнительные поля
		 */
		'properties' => array(
			'remove_done' => 'Удаление завершено',
		),
	),
	
	/*
	 * Шаблоны
	 */
	'skin' => array(
		'title' => 'Шаблоны',
		'use_skin' => 'Включить',
		'preview_skin' => 'Предпросмотр',
		'current_skin' => 'Включен сейчас',
		
		'this_is_preview' => 'Для вас включен предпросмотр шаблона "<b>%%name%%</b>". Откройте главную страницу сайта и рассмотрите шаблон.',
		'turn_off_preview' => 'Выключить',
		'change_theme' => 'Изменить тему',

		'author' => 'Автор',
		'homepage' => 'Сайт',
		'version' => 'Версия',
		'description' => 'Описание',
		'themes' => 'Темы',

	),

	/*
	 * Пользователи
	 */
	'users' => array(
		'title' => 'Пользователи',
		/*
		 * поиск по
		 */
		'search_allowed_in' => array(
			'id' => 'id',
			'mail' => 'почте',
			'password' => 'хеше пароля',
			'ip_register' => 'ip регистрации',
			'activate' => 'активирован ли',
			'activate_key' => 'ключе активации',
			'profile_sex' => 'стать',
			'login' => 'логин',
			'profile_name' => 'имени профиля',
			'session_ip_last' => 'ip последнего входа',
		),
		/*
		 * текстовки для поиска по полям с ограниченным набором возможных вводимых значений
		 */
		'restricted_values' => array(
			/*
			 * активен
			 */
			'activate' => array(
				1 => 'Да',
				0 => 'Нет',
			),
			/*
			 * стать
			 */
			'profile_sex' => array(
				'man' => 'Мужской',
				'woman' => 'Женский',
				'other' => 'Ещё в идентификации себя',
			),
		),
		'search' => 'Поиск',
		/*
		 * заголовок таблицы списка пользователей
		 */
		'table_header' => array(
			/*
			 * выпадающий список
			 */
			'name' => 'Имя',
			'id' => 'id',
			'login' => 'Логин',
			'profile_name' => 'ФИО',
			'mail' => 'Почта',

			'birth' => 'ДР',
			/*
			 * выпадающий список
			 */
			'reg_and_last_visit' => 'Регистрация и визит',
			'reg' => 'Дата регистрации',
			'last_visit' => 'Дата последнего визита',
			/*
			 * выпадающий список
			 */
			'ip' => 'IP-адрес',
			'user_ip_register' => 'IP регистрации',
			'session_ip_last' => 'Последний IP сессии',
			/*
			 * выпадающий список
			 */
			'rating_and_skill' => 'Рейтинг и сила',
			'user_rating' => 'Рейтинг',
			'user_skill' => 'Сила',

		),
		'admin' => 'Администратор',
		'banned' => 'Забаненный',
		/*
		 * списки голосов
		 */
		'votes' => array(
			'title' => 'Списки голосов пользователя за',
			'no_votes' => 'Пользователь не голосовал в выбранном направлении',
			'votes_type' => array(
				'topic' => 'топики',
				'blog' => 'блоги',
				'user' => 'других пользователей',
				'comment' => 'комментарии',
			),
			/*
			 * заголовок таблицы списка голосов
			 */
			'table_header' => array(
				'target_id' => 'id объекта',
				'vote_direction' => 'направление',
				'vote_value' => 'прирост',
				'vote_date' => 'дата голосования',
				'vote_ip' => 'ip-адрес',
				'target_object' => 'объект',
			),
			'back_to_user_profile_page' => '&larr; Назад на страницу данных пользователя',
			/*
			 * кнопки на странице списка голосов
			 */
			'voting_list' => array(
				'all' => 'Все',
				'plus' => 'Положительные',
				'minus' => 'Отрицательные',
				'abstain' => 'Нейтральные',
			),
		),
		/*
		 * страница данных о пользователе (профиль пользователя в админке)
		 */
		'profile' => array(
			/*
			 * верхнее меню и контекстное
			 */
			'top_bar' => array(
				'msg' => 'Сообщение',
				'admin_delete' => 'Удалить из админов',
				'admin_add' => 'В администраторы',
				'user_delete' => 'Удалить контент пользователя',
				'ban' => 'Блокировать',
				'activate' => 'Активировать',
			),
			/*
			 * стандартные ссылки
			 */
			'middle_bar' => array(
				'profile' => 'Профиль',
				'publications' => 'Публикации',
				'activity' => 'Активность',
				'friends' => 'Друзья',
				'wall' => 'Стена',
				'fav' => 'Избранное',
			),
			'user_no' => 'Пользователь №',
			/*
			 * редактируемая информация
			 */
			'info' => array(
				'resume' => 'Досье',

				'login' => 'Логин',
				'profile_name' => 'Имя',
				'mail' => 'Почта',
				'sex' => 'Пол',
				'birthday' => 'Дата рождения',
				'living' => 'Откуда',
				'reg_date' => 'Зарегистрирован',
				'ip' => 'IP',
				'last_visit' => 'Последний визит',
				'search_this_ip' => 'Искать с этим IP',
				'stats_title' => 'Статистика',
				'created' => 'Создал',
				'topics' => 'топиков',
				'comments' => 'комментариев',
				'blogs' => 'блогов',
				'fav' => 'В избранном',
				'reads' => 'Читает',
				'has' => 'Имеет',
				'friends' => 'друзей',
				/*
				 * голоса пользователя
				 */
				'votings_title' => 'Как голосовал',
				'votings' => array(
					'topic' => 'За топики',
					'comment' => 'За комментарии',
					'blog' => 'За блоги',
					'user' => 'За юзеров',
				),
				/*
				 * направление голосов
				 */
				'votings_direction' => array(
					'plus' => '<i class="icon-stats-up"></i>',
					'minus' => '<i class="icon-stats-down"></i>',
					'abstain' => '&mdash',
				),
			),

		),
		/*
		 * удаление пользователя и его данных
		 */
		'deleteuser' => array(
			'title' => 'Удаление пользователя',
			'back_to_profile' => '&larr; Вернуться в профиль пользователя',
			'delete_user_itself' => 'Удалить самого пользователя?',

			'delete_user_info' => 'В зависимости от размера БД данный процесс может занять продолжительное время.
			При удалении будут последовательно чиститься все таблицы.
			<br /><br />
			Если установить флажок, расположенный ниже, то также будет удален из БД и сам пользователь вместе с его личным блогом
			(в противном случае у пользователя останется пустой личный блог).',
		),
		/*
		 * стать пользователя
		 */
		'sex' => array(
			'man' => 'мужской',
			'woman' => 'женский',
			'other' => 'не скажу'
		),
		/*
		 * инлайн редактирование данных профиля
		 */
		'profile_edit' => array(
			'rating' => 'Рейтинг',
			'skill' => 'Сила',
			'password' => 'Пароль',
			'about_user' => 'О себе',
			'no_profile_name' => 'имя не указано',
		),
		/*
		 * Жалобы на пользователей
		 */
		'complaints' => array(
			'title' => 'Жалобы на пользователей',
			/*
			 * список
			 */
			'list' => array(
				/*
				 * заголовок таблицы
				 */
				'table_header' => array(
					'id' => 'id',
					'target_user_id' => 'На кого',
					'user_id' => 'От кого',
					'type' => 'Тип',
					'text' => 'Текст',
					'date_add' => 'Добавлена',
					'state' => 'Статус',
				),
				/*
				 * фильтр
				 */
				'filter' => array(
					'state' => array(
						null => 'Все',
						1 => 'Новые',
						2 => 'Приняты',
					),
				),
				/*
				 * статусы жалоб
				 */
				'state' => array(
					'1' => 'Новая',
					'2' => 'Принята',
				),
				'empty' => 'Жалоб на пользователей нет',
			),
			/*
			 * просмотр одной
			 */
			'view' => array(
				'title' => 'Жалоба',
				'answer' => array(
					'type_note' => 'Кому ответить (не обязательно)',
					/*
					 * типы ответов
					 */
					'types' => array(
						'user' => 'Тому, кто отправил жалобу (%%login%%)',
						'target_user' => 'На кого жалоба поступила (%%login%%)',
					),
					'text_note' => 'Ответить',
					'default_text' => 'Ваше обращение рассмотрено, спасибо',
					'button' => 'Ответить',
				),
			),
			/*
			 * письмо
			 */
			'mail' => array(
				'title' => 'Рассмотр жалоб',
			),
		),

	),

	/*
	 * Список банов
	 */
	'bans' => array(
		'title' => 'Список банов',
		/*
		 * добавление бана
		 */
		'add' => array(
			'title' => 'Запретить вход на сайт для пользователя',
			'user_sign' => 'Идентификация пользователя',
			'user_sign_info' => 'Введите id (1091), логин (userlogin) или почту (user@mail.com) зарегистрированного пользователя или
			ip-адрес (192.168.0.10) или диапазон ip-адресов (192.168.0.10 - 192.168.0.100) для блокировки',
			'secondary_rule' => 'Дополнительно забанить по айпи',
			'secondary_rule_info' => 'Введите ip-адрес пользователя (позволяет объеденить два условия в одно правило), не обязательно',

			'restriction_title' => 'Тип ограничения пользования сайтом',
			'restriction_types' => array(
				'1' => 'Полный бан (без доступа к контенту сайта)',
				'2' => 'Read only бан (есть возможность читать сайт, без возможности что либо публиковать, комментировать и т.п.)',
			),

			'ban_time_title' => 'Срок действия бана',
			/*
			 * описания и имена временных периодов блокировки
			 */
			'ban_timing' => array(
				'unlimited' => 'Пожизненно',
				'unlimited_info' => 'Пользователь с указанными данными не сможет войти на сайт никогда.
				Следует применять данный метод в случае если указанный пользователь - бот и рассылает спам.
				Примечание: у некоторых пользователей айпи адрес не статичен.',
				'period' => 'На период времени',
				'period_info' => 'Пользователь не сможет получить доступ к сайту на период времени',
				'period_info2' => 'По прошествии указанного времени пользователь автоматически сможет получить доступ к сайту.',
				'days' => 'На количество дней',
				'days_left' => 'дней',
				'days_info' => 'Пользователь не сможет получить доступ к сайту на указанное количество дней начиная с текущего',
			),
			'comments' => 'Комментарии',
			'reason' => 'Причина',
			'reason_tip' => 'Укажите причину блокировки, которая будет видна пользователю (если нужно)',
			'comment' => 'Заметка',
			'comment_for_yourself_tip' => 'Укажите заметку для себя (видна только администраторам на странице списка банов)',

		),
		'back_to_list' => '&larr; Назад к списку банов',
		/*
		 * заголовок таблицы списка банов
		 */
		'table_header' => array(
			'block_rule' => 'Пользователь / IP',
			'block_type' => 'Тип блокировки',
			'user_id' => 'id юзера',
			'ip' => 'ip',
			'ip_start' => 'с ip',
			'ip_finish' => 'по ip',

			'restriction_type' => 'Тип ограничения пользования сайтом',

			'time_type' => 'Тип времени блокировки',
			'date_start' => 'Дата начала',
			'date_finish' => 'Дата окончания',

			'add_date' => 'Добавлен',
			'edit_date' => 'Отредактирован',

			'reason_for_user' => 'Причина',
			'comment' => 'Комментарий для себя',
		),
		/*
		 * сообщения пользователю при бане
		 */
		'messages' => array(
			'full_ban' => array(
				'permanently_banned' => 'Вам запрещен доступ к сайту навсегда. Причина: <i>%%reason%%</i>.',
				'banned_for_period' => 'Вам запрещен доступ к сайту с <b>%%date_start%%</b> по <b>%%date_finish%%</b>. Причина: <i>%%reason%%</i>.',
			),
			'readonly_ban' => array(
				'permanently_banned' => 'Вы переведены в режим "только чтение" навсегда. Причина: <i>%%reason%%</i>.',
				'banned_for_period' => 'Вы переведены в режим "только чтение" с <b>%%date_start%%</b> по <b>%%date_finish%%</b>. Причина: <i>%%reason%%</i>.',
			),
		),
		/*
		 * аякс проверка правила для бана на корректность
		 */
		'user_sign_check' => array(
			'wrong_rule' => 'Правило не распознано',
			'user' => 'Пользователь <b>%%login%%</b> (id = <b>%%id%%</b>, почта = <b>%%mail%%</b>, ip регистрации = <b>%%reg_ip%%</b>, ip последнего входа = <b>%%session_ip%%</b>)',
			'ip' => 'IP-адрес',
			'ip_range' => 'Диапазон IP-адресов',
		),
		'add_ban' => 'Добавить бан',
		/*
		 * фильтр по банам
		 */
		'filter' => array(
			/*
			 * фильтр по типу ограничений банов
			 */
			'restriction' => array(
				'all' => 'Все',
				'full' => 'Полный бан',
				'readonly' => 'Read only бан',
			),
			/*
			 * фильтр по типу временного интервала банов
			 */
			'time' => array(
				'all' => 'Все',
				'permanent' => 'Постоянные',
				'period' => 'На период',
			),
		),
		/*
		 * список
		 */
		'list' => array(
			'restriction_types' => array(
				'1' => 'Полный бан (без доступа к контенту сайта)',
				'2' => 'Read only бан (есть возможность читать сайт, без возможности что либо публиковать)',
			),
			'block_type' => array(
				'user' => 'пользователь',
				'ip' => 'ip',
				'ip_range' => 'диапазон ip',
			),
			'time_type' => array(
				'permanent' => 'постоянный',
				'period' => 'период',
			),
			'no_bans' => 'Забаненых пользователей пока нет',
			'current_date_on_server' => 'Текущая дата и время на сервере',
			'this_ban_triggered' => 'Данный бан сработал (заблокировал пользователя) %%count%% раз',
		),
		'user_is_banned' => 'Этот пользователь в данный момент забанен. Причина:',
		/*
		 * страница информации бана
		 */
		'view' => array(
			'title' => 'Информация про бан',

		),
		'more_info' => 'Подробнее',

	),

	/*
	 * Статистика пользователей
	 */
	'users_stats' => array(
		'title' => 'Статистика по пользователям',
		'users' => 'пользователей',
		'registrations' => 'Регистрации',
		/*
		 * график гендерного распределения
		 */
		'gender_stats' => 'Гендерное распределение',
		'percent_from_all' => '% от всех',
		'sex_other' => 'Пол не указан',
		'sex_man' => 'Мужчины',
		'sex_woman' => 'Женщины',
		/*
		 * блок активности
		 */
		'activity' => 'Активность',
		'activity_active' => 'Активные',
		'activity_passive' => 'Заблудившиеся',
		'good_users' => 'Позитивные',
		'bad_users' => 'Негативные',
		/*
		 * график возрастного распределения
		 */
		'age_stats' => 'Возрастное распределение',
		'need_more_data' => 'У вас очень мало пользователей либо сайт ещё слишком молод чтобы показать красивый график.',
		/*
		 * график статистики проживаний
		 */
		'countries' => 'Страны',
		'and_text' => 'и',
		'cities' => 'города',
	),

	/*
	 * Главная страница
	 */
	'index' => array(
		'title' => 'Статистика',
		/*
		 * верхняя планка основной информации
		 */
		'users' => 'пользователей',
		'registrations' => 'регистраций',
		'topics' => 'топиков',
		'blogs' => 'блогов',
		'comments' => 'комментариев',
		/*
		 * для пункта "регистрации" верхней планки
		 */
		'new_users_for_week' => 'больше новых пользователей по сравнению с прошлой неделей на',
		'less_users_for_week' => 'меньше новых пользователей по сравнению с прошлой неделей на',
		/*
		 * блок активности
		 */
		'activity' => 'Активность',
		'activity_type' => array(
			'add_wall' => 'Записи на стене',
			'add_topic' => 'Новые топики',
			'add_comment' => 'Новые комментарии',
			'add_blog' => 'Новые блоги',
			'vote_topic' => 'Голосование за топик',
			'vote_comment' => 'Голосование за комментарий',
			'vote_blog' => 'Голосование за блог',
			'vote_user' => 'Голосование за пользователя',
			'add_friend' => 'Добавление в друзья',
			'join_blog' => 'Вход в блог',
		),
		'with_all_checkboxes' => 'Со всеми',
		/*
		 * блок информации о новом контенте
		 */
		'new_items' => 'Добавилось',
		'new_topics' => 'Топиков',
		'new_comments' => 'Комментариев',
		'new_blogs' => 'Блогов',
		'new_users' => 'Регистраций',
		'new_items_for_period' => 'новых по сравнению с прошлым аналогичным периодом стало больше на',
		'less_items_for_period' => 'новых по сравнению с прошлым аналогичным периодом стало меньше на',

		'new_topics_info' => 'новых топиков в выбранном периоде',
		'new_comments_info' => 'новых комментариев в выбранном периоде',
		'new_blogs_info' => 'новых блогов в выбранном периоде',
		'new_users_info' => 'новых пользователей в выбранном периоде',

		/*
		 * обновления
		 */
		'updates' => array(
			/*
			 * плагинов
			 */
			'plugins' => array(
				'title' => 'Плагины',
				'no_updates' => 'Обновлений нет',
				'there_are_n_updates' => 'Есть %%count%% обновления',
			),
			/*
			 * жалобы на пользователей
			 */
			'complaints' => array(
				'title' => 'Пользователи',
				'no_complaints' => 'Новых жалоб нет',
				'there_are_n_complaints' => '%%count%% жалобы',
			),
		),

	),

	/*
	 * Графики
	 */
	'graph' => array(
		'show_type' => 'Отображать',
		/*
		 * типы данных для графика
		 */
		'graph_type' => array(
			'registrations' => 'Регистрации',
			'topics' => 'Новые топики',
			'comments' => 'Комментарии',
			'votings' => 'Голосования',
		),
		'show_period' => 'Период',
		/*
		 * предустановленные интервалы для графика
		 */
		'period_bar' => array(
			'today' => 'Сегодня',
			'yesterday' => 'Вчера',
			'week' => 'Неделя',
			'month' => 'Месяц',
		),
		/*
		 * таблица с данными графика
		 */
		'values_in_table' => 'Значения таблицей',
		'date' => 'Дата',
		'count' => 'Количество',
	),

	/*
	 * Работа с комментариями
	 */
	'comments' => array(
		'full_deleting' => 'Полное удаление',
		/*
		 * страница удаления комментария
		 */
		'delete' => array(
			'title' => 'Удалить коментарий',

			'delete_info' => 'Данный комментарий будет полностью удален из БД без возможности восстановления,
			также будут удалены все дочерние ответы на него от других пользователей т.е. вся ветка комментариев.
			<br /><br />
			Также будут удалены все связанные данные (голоса за комментарии, избранное пользователей и т.п.)',
		),

	),

	/*
	 * Утилиты
	 */
	'utils' => array(
		/*
		 * Проверка и восстановление
		 */
		'check_n_repair' => array(
			'title' => 'Утилиты: проверка и восстановление',
			/*
			 * чистка таблиц
			 */
			'tables' => array(
				'title' => 'Проверка таблиц',

				'info' => 'Данный раздел позволяет проверить таблицы БД и очистить их от поврежденных связей и несуществующих значений,
				которые могли появиться при разных ситуациях, например, от старых версий LiveStreet или от использования не очень качественных плагинов.
				Этот процесс может занять некоторое время, рекомендуется его проводить в момент,
				когда нагрузка на сайт минимальна, также необходимо сделать бэкап перед проведением этой операции.',
				'repair_comments' => 'Проверить и очистить таблицы комментариев от поврежденных связей',
				'clean_stream' => 'Очистить активность (стрим) от записей, указывающих на несуществующие данные',
				'clean_votings' => 'Удалить все голосования, указывающие на несуществующие объекты',
				'clean_favourites' => 'Очистить записи избранного и тегов для избранного, указывающие на несуществующие объекты',
			),
			/*
			 * проверка кодировки файлов
			 */
			'files' => array(
				'title' => 'Проверка файлов',

				'info' => 'Данный раздел позволяет проверить наиболее часто редактируемые файлы сайта в поисках кодировки,
				которая крайне не рекомендована для использования - UTF-8 BOM. Все такие файлы будут показаны списком.
				Сам список файлов (маски путей и расширения файлов) задаются в конфиге админки в config/encoding_checking_dirs.php',
				'check_encoding' => 'Проверить кодировку наиболее часто редактируемых файлов',
			),
		),
		/*
		 * Сброс и очистка
		 */
		'reset_n_clear' => array(
			'title' => 'Утилиты: сброс и очистка',
			/*
			 * сброс данных
			 */
			'datareset' => array(
				'title' => 'Сброс данных',

				'info' => 'Данный раздел позволяет выполнить очистку указанных данных',
				'resetallbansstats' => 'Сбросить статистику срабатываний банов пользователей',
				'deleteoldbanrecords' => 'Удалить старые записи банов, дата окончания которых уже прошла',
				'resetalllscache' => 'Сбросить весь кеш движка (данные, компилированные шаблоны, сжатые CSS и JS файлы) + кеш браузера пользователя',
			),
		),
		/*
		 * Планировщик cron
		 */
		'cron' => array(
			'title' => 'Список задач планировщика',
			'instruction' => 'Внимание! Для работы планировшика нужно на вашем сервере добавить скрипт <b>%%path%%</b> в cron с запуском 1 раз в 5 минут.
				Крон необходимо добавить от имени пользователя, под которым работает ваш веб-сервер. Это позволит избежат проблем с правами.
				За подробностями работы с cron обратитесь к вашему системного администратору или хостеру.
			',
		),

	),

	/*
	 * Плагины
	 */
	'plugins' => array(
		/*
		 * список
		 */
		'list' => array(
			/*
			 * заголовок для каждого раздела
			 */
			'titles' => array(
				null => 'Все плагины',
				'activated' => 'Активные плагины',
				'deactivated' => 'Не активные плагины',
				'updates' => 'Обновления для плагинов',
			),
			'activate' => 'Активировать',
			'deactivate' => 'Отключить',
			'remove' => 'Удалить',
			'apply_update' => 'Обновить',
			'settings_tip' => 'Управление плагином с помощью его внутреннего интерфейса',
			'config' => 'Конфигурация',
			'config_tip' => 'Управление конфигом плагина',
			'new_version_avaible' => 'У этого плагина есть обновление - версия',
		),
		/*
		 * надписи для каждого раздела плагинов, если нет данных
		 */
		'no_plugins' => array(
			null => 'Установленных плагинов нет',
			'activated' => 'Нету включенных плагинов',
			'deactivated' => 'Нету не активных плагинов',
			'updates' => 'Обновлений для плагинов нет',
		),
		/*
		 * фильтр
		 */
		'menu' => array(
			'filter' => array(
				'all' => 'Все',
				'activated' => 'Активные',
				'deactivated' => 'Не активные',
				'updates' => 'Обновления',
			),
			'install_plugin' => 'Установить плагин',
		),
		/*
		 * инструкции по установке
		 */
		'instructions' => array(
			'title' => 'Инструкции по установке плагина',
			'description' => 'Автор этого плагина добавил к плагину инструкцию по установке. Внимательно прочитайте её ниже.',
			'controls' => array(
				'activate' => 'Инструкции прочитаны, активировать плагин',
				'dont_activate' => 'Нет, не активировать сейчас',
			),
		),
		'back_to_list' => 'Назад к списку плагинов',
		/*
		 * кнопка на тулбаре
		 */
		'updates_exists_button' => 'Есть %%count%% обновлений для плагинов',
		/*
		 * установка плагинов (каталог)
		 */
		'install' => array(
			'title' => 'Установка дополнений',
			'go_to_list' => 'Перейти к установленным плагинам',
			/*
			 * справка
			 */
			'tip_button' => 'Справка',
			'tip' => 'Важно помнить следующие моменты:
				<br /><br />
				На данный момент все операции с платными плагинами (обновления, покупка) осуществляются ТОЛЬКО через официальный каталог LiveStreet CMS.
				Админка не спрашивает вашего пароля от учетной записи каталога LiveStreet CMS, не требует покупать плагины через себя или осуществлять любые другие платные операции
				пока не указано иного в официальном каталоге LiveStreet CMS.
				<br /><br />
				Если вы видите запрос на имя пользователя и/или пароль от своей учетной записи в каталоге или призыв к платежным операциям в админке - возможно,
				что это работа установленного недобросовестного стороннего плагина или внедренного вредоносного кода в нем.
				Чтобы избежать подобных ситуаций - устанавливайте плагины только из проверенного источника - официального каталога дополнений LiveStreet CMS.
				<br /><br />
				<b>Резюмируя</b>: все платежные операции производятся через официальный каталог плагинов LiveStreet CMS.
			',
			/*
			 * фильтр в меню
			 */
			'filter' => array(
				/*
				 * тип плагинов
				 */
				'type' => array(
					null => 'Все',
					2 => 'Платные',
					1 => 'Бесплатные',
				),
				/*
				 * типы сортировок
				 */
				'sorting' => array(
					'new' => 'Новые сверху',
					'review' => 'По отзывам',
					'update' => 'По дате обновления',
					'download' => 'По количеству загрузок',
					'buy' => 'По количеству покупок',
					'price' => 'По цене',
				),
				/*
				 * версии
				 */
				'versions' => array(
					null => 'Все',
					3 => '0.4.2',
					1 => '0.5.1',
					2 => '1.0.3',
				),
				/*
				 * секция
				 */
				'sections' => array(
					null => 'Все',
					3 => 'SEO',
					14 => 'Админка',
					18 => 'Безопасность',
					12 => 'Блоги',
					2 => 'Блоки',
					16 => 'Голосование',
					17 => 'Интеграция',
					4 => 'Комментарии',
					10 => 'Коммерция',
					9 => 'Медиа',
					8 => 'Оформление',
					15 => 'Пользователи',
					11 => 'Разное',
					1 => 'Разработка',
					5 => 'Редактор',
					7 => 'Рейтинг',
					6 => 'Топики',
					13 => 'Юзабилити',
				),
			),
			'reviews_declension' => 'отзыв;отзыва;отзывов',
			'rubles' => 'руб.',
			'update' => 'Обновить',
			'no_addons' => 'Нет дополнений',

		),

	),
	
	/*
	 * Настройки
	 */
	'settings' => array(
		/*
		 * заголовки
		 */
		'titles' => array(
			'main_config' => 'Конфигурация сайта',
			'plugin_config' => 'Настройки плагина',
			'current_skin' => 'Текущий активный шаблон',
			'skin_config' => 'Другие доступные шаблоны',
		),

		'no_settings_for_this_plugin' => 'У этого плагина нет настроек или его автор не добавил возможность их редактирования',
		/*
		 * разделы настроек
		 */
		'section' => array(
			'description' => 'Описание',
		),
	
	),

	/*
	 * Пагинация
	 */
	'pagination' => array(
		'prev' => 'Предыдущая',
		'next' => 'Следующая',
	),

	/*
	 * Приветствия
	 */
	'hello' => array(
		'title' => 'Приветствие',
		'first_run' => 'Это ваше первое знакомство с админкой для LiveStreet CMS. Будем надеяться, что она вам понравится и работа с ней будет удобной.
		С уважением, команда разработчиков LiveStreet CMS',
		'last_visit' => 'Последний раз заходили в админку',
		'last_visit_ip_not_match_current' => 'Предыдущий вход в админку был выполнен из другого ip - <b>%%last_ip%%</b>, ваш текущий ip - <b>%%current_ip%%</b>.'

	),


	/*
	 *
	 * --- Описания для конфига ---
	 *
	 */

	/*
	 * Описание каждого параметра конфига для отображения в настройках админки
	 */
	'config_parameters' => array(
		/*
		 * раздел "песочница" (тестовые настройки для проверки работы настроек)
		 */
		'sandbox' => array(
			/*
			 * Пример для параметра целочисленного типа
			 */
			'items_count' => array(
				'name' => 'Имя для параметра целочисленного типа',
				'description' => 'Описание для параметра целочисленного типа',
			),
			/*
			 * Пример для параметра строкового типа
			 */
			'title' => array(
				'name' => 'Имя для параметра строкового типа',
				'description' => 'Описание для параметра строкового типа',
			),
			/*
			 * Пример для ещё одного параметра строкового типа
			 */
			'title2' => array(
				'name' => 'Имя для ещё одного параметра строкового типа',
				'description' => 'Описание для ещё одного параметра строкового типа с вводом через селект',
			),
			/*
			 * Пример для параметра булевого типа
			 */
			'enabled' => array(
				'name' => 'Имя для параметра булевого типа',
				'description' => 'Описание для параметра булевого типа',
			),
			/*
			 * Пример для параметра плавающего типа
			 */
			'min_rating' => array(
				'name' => 'Имя для параметра плавающего типа',
				'description' => 'Описание для параметра плавающего типа',
			),
			/*
			 * Пример для параметра-массива
			 */
			'list' => array(
				'name' => 'Имя для параметра-массива',
				'description' => 'Описание для параметра-массива',
			),
			/*
			 * Пример для ещё одного параметра-массива
			 */
			'list2' => array(
				'name' => 'Имя для параметра-массива с вводом через текстовое поле',
				'description' => 'Описание для второго параметра-массива',
			),
		),

		/*
		 * раздел "баны"
		 */
		'bans' => array(
			'gather_bans_running_stats' => array(
				'name' => 'Статистика для банов',
				'description' => 'Собирать статистику по срабатываниям банов',
			),
		),
		/*
		 * раздел настроек каталога
		 */
		'catalog' => array(
			'updates' => array(
				'allow_plugin_updates_checking' => array(
					'name' => 'Проверка обновлений плагинов',
					'description' => 'Проверять наличие новых версий плагинов в каталоге',
				),
				'show_updates_count_in_toolbar' => array(
					'name' => 'Обновления в тулбаре',
					'description' => 'Добавить кнопку в тулбар с количеством обновлений плагинов',
				),
			),
		),
		/*
		 * настройки настроек
		 */
		'settings' => array(
			'admin_save_form_ajax_use' => array(
				'name' => 'Сохранение настроек через аякс',
				'description' => 'Использовать ли аякс при отправке формы с настройками',
			),
			'show_section_keys' => array(
				'name' => 'Вывод ключей разделов',
				'description' => 'Нужно ли выводить ключи раздела настроек на странице настроек движка или плагина',
			),
		),
		/*
		 * пользователи
		 */
		'users' => array(
			'min_user_age_difference_to_show_users_age_stats' => array(
				'name' => 'Минимальный корректный возраст пользователя для сбора статистики',
				'description' => 'Минимальный корректный возраст пользователя, чтобы учитывать такую запись в показе статистики пользователей в графике возрастного распределения',
			),
		),

	),
	/*
	 * Описание разделов конфига
	 */
	'config_sections' => array(
		/*
		 * описание раздела "песочница" (тестовые настройки для проверки работы настроек)
		 */
		'sandbox' => array(
			'title' => 'Песочница',
			'description' => 'Этот раздел содержит тестовые настройки, которые не влияют на работу админки и
			нужны для демонстрации возможностей управления конфигами плагинов для разработчиков. Здесь показаны основные варианты отображения разных типов данных конфигов,
			пример схемы такого раздела можно посмотреть в конфиге админки в файле <b>config/config_scheme_sandbox.php</b>'
		),
		/*
		 * раздел "баны"
		 */
		'bans' => array(
			'title' => 'Баны',
		),
		/*
		 * раздел "каталог"
		 */
		'catalog' => array(
			'title' => 'Каталог дополнений',
		),
		/*
		 * раздел "настройки"
		 */
		'settings' => array(
			'title' => 'Обработка настроек',
		),
		/*
		 * раздел "пользователи"
		 */
		'users' => array(
			'title' => 'Пользователи',
		),
	),

);

?>