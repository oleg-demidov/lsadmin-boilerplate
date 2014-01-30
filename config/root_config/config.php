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
 * Дополнительный конфиг движка, содержащий схему и список групп
 *
 */

return array(
	/*
	 * --- Списки групп настроек главного конфига движка и принадлежащих им разделов и их параметров ---
	 *
	 * Для каждой группы указывается как минимум один раздел, в котором указываются ключи:
	 *
	 * 		"name" 				относительный ключ языкового файла для названия раздела группы
	 * 		"allowed_keys"		первые символы разрешенных параметров (ключей)
	 * 		"excluded_keys" 	начала параметров, которые необходимо исключить из группы (правило работает после списка разрешенных, исключаемое подмножество)
	 */
	'$config_groups$' => array(

		'main' => array(
			array(
				'name' => 'Общие',
				'allowed_keys' => array(
					'view.name',
					'view.description',
					'view.keywords',
					'general.admin_mail',
					'general.close',
					'general.reg.invite',
					'general.reg.activation',
					'general.login.captcha',
					'module.user.captcha_use_registration',
				),
			),
		),

		'blog' => array(
			array(
				'name' => 'Блоги',
				'allowed_keys' => array(
					'module.blog.category_allow',
					'module.blog.category_only_children',
					'module.blog.category_allow_empty',
					'module.blog.per_page',
					'module.blog.users_per_page',
					'module.blog.personal_good',
					'module.blog.collective_good',
					'module.blog.index_good',
				),
			),
			array(
				'name' => 'Права доступа блогов',
				'allowed_keys' => array(
					'module.blog.category_only_admin',
					'acl.create.blog.rating',
					'acl.vote.blog.rating',
				),
			),
			array(
				'name' => 'Топики',
				'allowed_keys' => array(
					'module.topic.new_time',
					'module.topic.per_page',
					'module.topic.max_length',
					'module.topic.allow_empty_tags',
				),
			),
			array(
				'name' => 'Права доступа топиков',
				'allowed_keys' => array(
					'acl.create.topic.limit_time',
					'acl.create.topic.limit_time_rating',
					'acl.create.topic.limit_rating',
					'acl.vote.topic.rating',
					'acl.vote.topic.limit_time',
				),
			),
			array(
				'name' => 'Комментарии',
				'allowed_keys' => array(
					'module.comment.per_page',
					'module.comment.bad',
					'module.comment.max_tree',
					'module.comment.use_nested',
					'module.comment.nested_per_page',
					'module.comment.nested_page_reverse',
				),
			),
			array(
				'name' => 'Права доступов комментариев',
				'allowed_keys' => array(
					'acl.create.comment.rating',
					'acl.create.comment.limit_time',
					'acl.create.comment.limit_time_rating',
					'acl.vote.comment.rating',
					'acl.vote.comment.limit_time',
				),
			),
		),


		/*
		 * группа настроек
		 * tip: имя группы идентично её урлу и не может быть "plugin" и "save" - эти эвенты зарегистрированы для показа настроек плагинов и сохранения настроек соответственно
		 */
		'view' => array(
			array(
				/*
				 * раздел "view" на странице настроек для группы с кодом "view"
				 * tip: ключ, указывающий на текстовку
				 */
				'name' => 'config_sections.view.view',
				/*
				 * начала параметров, разрешенных для показа в этой группе
				 */
				'allowed_keys' => array(
					'view.name',
				),
				/*
				 * начала параметров, которые необходимо исключить из раздела (правило работает после списка разрешенных)
				 */
				'excluded_keys' => array(),
			),
			array(
				/*
				 * раздел "metas" на странице настроек для группы с кодом "view"
				 */
				'name' => 'config_sections.view.metas',
				'allowed_keys' => array(
					'view.description',
					'view.keywords',
					'seo.description_words_count',
				),
			),
			array(
				'name' => 'config_sections.view.editor',
				'allowed_keys' => array(
					'view.wysiwyg',
					'view.noindex',
				),
			),
			array(
				'name' => 'config_sections.view.image',
				'allowed_keys' => array(
					'view.img_resize_width',
					'view.img_max_width',
					'view.img_max_height',
					'view.img_max_size_url',
				),
			),
		),


		'interface' => array(
/*			array(
				'name' => 'config_sections.interface.gen',
				'allowed_keys' => array(
					'lang',
				),
				'excluded_keys' => array(
					'lang.path',
				),
			),*/
			array(
				'name' => 'config_sections.interface.options',
				'allowed_keys' => array(
					'general.close',
					'general.reg.invite',
					'general.reg.activation',
					'general.login.captcha',
					'general.admin_mail',
				),
			),
			array(
				'name' => 'config_sections.interface.blocks',
				'allowed_keys' => array(
					'block.stream.row',
					'block.stream.show_tip',
					'block.blogs.row',
					'block.tags.tags_count',
					'block.tags.personal_tags_count',
				),
			),
			array(
				'name' => 'config_sections.interface.paging',
				'allowed_keys' => array(
					'pagination',
				),
			),

		),


		'system' => array(
			array(
				'name' => 'config_sections.system.smarty',
				'allowed_keys' => array(
					'smarty',
				),
			),
			array(
				'name' => 'config_sections.system.memcache',
				'allowed_keys' => array(
					'memcache',
				),
			),
		),


		'sysmail' => array(
			array(
				'name' => 'config_sections.sysmail.mail',
				'allowed_keys' => array(
					'sys.mail.type',
					'sys.mail.from_email',
					'sys.mail.from_name',
					'sys.mail.charset',
				),
			),
			array(
				'name' => 'config_sections.sysmail.smtp',
				'allowed_keys' => array(
					'sys.mail.smtp.',
				),
			),
			array(
				'name' => 'config_sections.sysmail.options',
				'allowed_keys' => array(
					'sys.mail.include_comment',
					'sys.mail.include_talk',
				),
			),
		),


		'acl' => array(
			array(
				'name' => 'config_sections.acl.blog',
				'allowed_keys' => array(
					'acl.create.blog.rating',
					'acl.vote.blog.rating',
				),
			),
			array(
				'name' => 'config_sections.acl.comment',
				'allowed_keys' => array(
					'acl.create.comment.rating',
					'acl.create.comment.limit_time',
					'acl.create.comment.limit_time_rating',
					'acl.vote.comment.rating',
					'acl.vote.comment.limit_time',
				),
			),
			array(
				'name' => 'config_sections.acl.topic',
				'allowed_keys' => array(
					'acl.create.topic.rating',
					'acl.create.topic.limit_time',
					'acl.create.topic.limit_time_rating',
					'acl.vote.topic.rating',
					'acl.vote.topic.limit_time',
				),
			),
			array(
				'name' => 'config_sections.acl.talk',
				'allowed_keys' => array(
					'acl.create.talk.limit_time',
					'acl.create.talk.limit_time_rating',
				),
			),
			array(
				'name' => 'config_sections.acl.talk_comment',
				'allowed_keys' => array(
					'acl.create.talk_comment.limit_time',
					'acl.create.talk_comment.limit_time_rating',
				),
			),
			array(
				'name' => 'config_sections.acl.wall',
				'allowed_keys' => array(
					'acl.create.wall.limit_time',
					'acl.create.wall.limit_time_rating',
				),
			),
			array(
				'name' => 'config_sections.acl.user',
				'allowed_keys' => array(
					'acl.vote.user.rating',
				),
			),
		),


		'moduleblog' => array(
			array(
				'name' => 'config_sections.moduleblog.moduleblog',
				'allowed_keys' => array(
					'module.blog.',
				),
			),
		),


		'moduletopic' => array(
			array(
				'name' => 'config_sections.moduletopic.moduletopic',
				'allowed_keys' => array(
					'module.topic.',
				),
			),
		),


		'moduleuser' => array(
			array(
				'name' => 'config_sections.moduleuser.moduleuser',
				'allowed_keys' => array(
					'module.user.',
				),
			),
		),


		'modulecomment' => array(
			array(
				'name' => 'config_sections.modulecomment.modulecomment',
				'allowed_keys' => array(
					'module.comment.',
				),
			),
		),


		'moduletalk' => array(
			array(
				'name' => 'config_sections.moduletalk.moduletalk',
				'allowed_keys' => array(
					'module.talk.',
				),
			),
		),


		'modulenotify' => array(
			array(
				'name' => 'config_sections.modulenotify.modulenotify',
				'allowed_keys' => array(
					'module.notify.',
				),
			),
		),


		'moduleimage' => array(
			array(
				'name' => 'config_sections.moduleimage.moduleimage',
				'allowed_keys' => array(
					'module.image.',
				),
				'excluded_keys' => array(
					'module.image.default.path.',
				),
			),
		),


		'modulewall' => array(
			array(
				'name' => 'config_sections.modulewall.modulewall',
				'allowed_keys' => array(
					'module.wall.',
				),
			),
		),


		'moduleother' => array(
			array(
				'name' => 'config_sections.moduleother.moduleother',
				'allowed_keys' => array(
					'module.security.',
					'module.userfeed.',
					'module.stream.',
					'module.ls.',
				),
			),
		),


		'compress' => array(
			array(
				'name' => 'config_sections.compress.compress',
				'allowed_keys' => array(
					'compress',
				),
			),
		),
	),


	/*
	 *
	 * --- Описание настроек главного конфига LiveStreet CMS ---
	 *
	 */
	'$config_scheme$' => array(
		'view.name' => array(
			'type' => 'string',
			'name' => 'config_parameters.view.name.name',
			'description' => 'config_parameters.view.name.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 2,
					'max' => 200,
					'allowEmpty' => false,
				),
			),
		),
		'view.description' => array(
			'type' => 'string',
			'name' => 'config_parameters.view.description.name',
			'description' => 'config_parameters.view.description.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 2,
					'max' => 1000,
					'allowEmpty' => false,
				),
			),
		),
		'view.keywords' => array(
			'type' => 'string',
			'name' => 'config_parameters.view.keywords.name',
			'description' => 'config_parameters.view.keywords.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 2,
					'max' => 500,
					'allowEmpty' => false,
				),
			),
		),
		'view.wysiwyg' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.view.wysiwyg.name',
			'description' => 'config_parameters.view.wysiwyg.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'view.noindex' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.view.noindex.name',
			'description' => 'config_parameters.view.noindex.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'view.img_resize_width' => array(
			'type' => 'integer',
			'name' => 'config_parameters.view.img_resize_width.name',
			'description' => 'config_parameters.view.img_resize_width.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 100,
					'max' => 5000,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'view.img_max_width' => array(
			'type' => 'integer',
			'name' => 'config_parameters.view.img_max_width.name',
			'description' => 'config_parameters.view.img_max_width.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 100,
					'max' => 5000,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'view.img_max_height' => array(
			'type' => 'integer',
			'name' => 'config_parameters.view.img_max_height.name',
			'description' => 'config_parameters.view.img_max_height.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 100,
					'max' => 5000,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'view.img_max_size_url' => array(
			'type' => 'integer',
			'name' => 'config_parameters.view.img_max_size_url.name',
			'description' => 'config_parameters.view.img_max_size_url.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 10,
					'max' => 7000,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'seo.description_words_count' => array(
			'type' => 'integer',
			'name' => 'config_parameters.seo.description_words_count.name',
			'description' => 'config_parameters.seo.description_words_count.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 5,
					'max' => 300,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'general.close' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.general.close.name',
			'description' => 'config_parameters.general.close.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'general.reg.invite' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.general.reg.invite.name',
			'description' => 'config_parameters.general.reg.invite.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'general.reg.activation' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.general.reg.activation.name',
			'description' => 'config_parameters.general.reg.activation.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'general.login.captcha' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.general.login.captcha.name',
			'description' => 'config_parameters.general.login.captcha.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'general.admin_mail' => array(
			'type' => 'string',
			'name' => 'config_parameters.general.admin_mail.name',
			'description' => 'config_parameters.general.admin_mail.description',
			'validator' => array(
				'type' => 'Email',
				'params' => array(
					'allowEmpty' => false,
				),
			),
		),
		'block.stream.row' => array(
			'type' => 'integer',
			'name' => 'config_parameters.block.stream.row.name',
			'description' => 'config_parameters.block.stream.row.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 3,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'block.stream.show_tip' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.block.stream.show_tip.name',
			'description' => 'config_parameters.block.stream.show_tip.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'block.blogs.row' => array(
			'type' => 'integer',
			'name' => 'config_parameters.block.blogs.row.name',
			'description' => 'config_parameters.block.blogs.row.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 3,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'block.tags.tags_count' => array(
			'type' => 'integer',
			'name' => 'config_parameters.block.tags.tags_count.name',
			'description' => 'config_parameters.block.tags.tags_count.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 5,
					'max' => 500,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'block.tags.personal_tags_count' => array(
			'type' => 'integer',
			'name' => 'config_parameters.block.tags.personal_tags_count.name',
			'description' => 'config_parameters.block.tags.personal_tags_count.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 5,
					'max' => 500,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'pagination.pages.count' => array(
			'type' => 'integer',
			'name' => 'config_parameters.pagination.pages.count.name',
			'description' => 'config_parameters.pagination.pages.count.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 3,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'smarty.compile_check' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.smarty.compile_check.name',
			'description' => 'config_parameters.smarty.compile_check.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'smarty.force_compile' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.smarty.force_compile.name',
			'description' => 'config_parameters.smarty.force_compile.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'sys.mail.type' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.mail.type.name',
			'description' => 'config_parameters.sys.mail.type.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 2,
					'max' => 12,
					'allowEmpty' => false,
				),
			),
		),
		'sys.mail.from_email' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.mail.from_email.name',
			'description' => 'config_parameters.sys.mail.from_email.description',
			'validator' => array(
				'type' => 'Email',
				'params' => array(
					'allowEmpty' => false,
				),
			),
		),
		'sys.mail.from_name' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.mail.from_name.name',
			'description' => 'config_parameters.sys.mail.from_name.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 2,
					'max' => 70,
					'allowEmpty' => false,
				),
			),
		),
		'sys.mail.charset' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.mail.charset.name',
			'description' => 'config_parameters.sys.mail.charset.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 2,
					'max' => 10,
					'allowEmpty' => false,
				),
			),
		),
		'sys.mail.smtp.host' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.mail.smtp.host.name',
			'description' => 'config_parameters.sys.mail.smtp.host.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 2,
					'max' => 100,
					'allowEmpty' => false,
				),
			),
		),
		'sys.mail.smtp.port' => array(
			'type' => 'integer',
			'name' => 'config_parameters.sys.mail.smtp.port.name',
			'description' => 'config_parameters.sys.mail.smtp.port.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 0,
					'max' => 65535,
					'allowEmpty' => false,
				),
			),
		),
		'sys.mail.smtp.user' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.mail.smtp.user.name',
			'description' => 'config_parameters.sys.mail.smtp.user.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 0,
					'max' => 50,
					'allowEmpty' => true,
				),
			),
		),
		'sys.mail.smtp.password' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.mail.smtp.password.name',
			'description' => 'config_parameters.sys.mail.smtp.password.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 0,
					'max' => 50,
					'allowEmpty' => true,
				),
			),
		),
		'sys.mail.smtp.secure' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.mail.smtp.secure.name',
			'description' => 'config_parameters.sys.mail.smtp.secure.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 0,
					'max' => 10,
					'allowEmpty' => true,
				),
			),
		),
		'sys.mail.smtp.auth' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.sys.mail.smtp.auth.name',
			'description' => 'config_parameters.sys.mail.smtp.auth.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'sys.mail.include_comment' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.sys.mail.include_comment.name',
			'description' => 'config_parameters.sys.mail.include_comment.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'sys.mail.include_talk' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.sys.mail.include_talk.name',
			'description' => 'config_parameters.sys.mail.include_talk.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),

		// ?
		'sys.cache.use' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.sys.cache.use.name',
			'description' => 'config_parameters.sys.cache.use.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'sys.cache.type' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.cache.type.name',
			'description' => 'config_parameters.sys.cache.type.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'sys.cache.dir' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.cache.dir.name',
			'description' => 'config_parameters.sys.cache.dir.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'sys.cache.prefix' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.cache.prefix.name',
			'description' => 'config_parameters.sys.cache.prefix.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'sys.cache.directory_level' => array(
			'type' => 'integer',
			'name' => 'config_parameters.sys.cache.directory_level.name',
			'description' => 'config_parameters.sys.cache.directory_level.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'sys.cache.solid' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.sys.cache.solid.name',
			'description' => 'config_parameters.sys.cache.solid.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'sys.logs.file' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.logs.file.name',
			'description' => 'config_parameters.sys.logs.file.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'sys.logs.sql_query' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.sys.logs.sql_query.name',
			'description' => 'config_parameters.sys.logs.sql_query.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'sys.logs.sql_query_file' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.logs.sql_query_file.name',
			'description' => 'config_parameters.sys.logs.sql_query_file.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'sys.logs.sql_error' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.sys.logs.sql_error.name',
			'description' => 'config_parameters.sys.logs.sql_error.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'sys.logs.sql_error_file' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.logs.sql_error_file.name',
			'description' => 'config_parameters.sys.logs.sql_error_file.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'sys.logs.cron' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.sys.logs.cron.name',
			'description' => 'config_parameters.sys.logs.cron.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'sys.logs.cron_file' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.logs.cron_file.name',
			'description' => 'config_parameters.sys.logs.cron_file.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'sys.logs.profiler' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.sys.logs.profiler.name',
			'description' => 'config_parameters.sys.logs.profiler.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'sys.logs.profiler_file' => array(
			'type' => 'string',
			'name' => 'config_parameters.sys.logs.profiler_file.name',
			'description' => 'config_parameters.sys.logs.profiler_file.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'sys.logs.hacker_console' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.sys.logs.hacker_console.name',
			'description' => 'config_parameters.sys.logs.hacker_console.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),

		'lang.current' => array(
			'type' => 'string',
			'name' => 'config_parameters.lang.current.name',
			'description' => 'config_parameters.lang.current.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'lang.default' => array(
			'type' => 'string',
			'name' => 'config_parameters.lang.default.name',
			'description' => 'config_parameters.lang.default.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),


		'acl.create.blog.rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.blog.rating.name',
			'description' => 'config_parameters.acl.create.blog.rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.comment.rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.comment.rating.name',
			'description' => 'config_parameters.acl.create.comment.rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.comment.limit_time' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.comment.limit_time.name',
			'description' => 'config_parameters.acl.create.comment.limit_time.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 0,
					'max' => 60*60*24,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.comment.limit_time_rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.comment.limit_time_rating.name',
			'description' => 'config_parameters.acl.create.comment.limit_time_rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.topic.limit_time' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.topic.limit_time.name',
			'description' => 'config_parameters.acl.create.topic.limit_time.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 0,
					'max' => 60*60*24,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.topic.limit_time_rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.topic.limit_time_rating.name',
			'description' => 'config_parameters.acl.create.topic.limit_time_rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.topic.limit_rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.topic.limit_rating.name',
			'description' => 'config_parameters.acl.create.topic.limit_rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.talk.limit_time' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.talk.limit_time.name',
			'description' => 'config_parameters.acl.create.talk.limit_time.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 0,
					'max' => 60*60*24,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.talk.limit_time_rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.talk.limit_time_rating.name',
			'description' => 'config_parameters.acl.create.talk.limit_time_rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.talk_comment.limit_time' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.talk_comment.limit_time.name',
			'description' => 'config_parameters.acl.create.talk_comment.limit_time.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 0,
					'max' => 60*60*24,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.talk_comment.limit_time_rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.talk_comment.limit_time_rating.name',
			'description' => 'config_parameters.acl.create.talk_comment.limit_time_rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.wall.limit_time' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.wall.limit_time.name',
			'description' => 'config_parameters.acl.create.wall.limit_time.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 0,
					'max' => 60*60*24,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.create.wall.limit_time_rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.create.wall.limit_time_rating.name',
			'description' => 'config_parameters.acl.create.wall.limit_time_rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.vote.comment.rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.vote.comment.rating.name',
			'description' => 'config_parameters.acl.vote.comment.rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.vote.blog.rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.vote.blog.rating.name',
			'description' => 'config_parameters.acl.vote.blog.rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.vote.topic.rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.vote.topic.rating.name',
			'description' => 'config_parameters.acl.vote.topic.rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.vote.user.rating' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.vote.user.rating.name',
			'description' => 'config_parameters.acl.vote.user.rating.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.vote.topic.limit_time' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.vote.topic.limit_time.name',
			'description' => 'config_parameters.acl.vote.topic.limit_time.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 0,
					'max' => 60*60*24*100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'acl.vote.comment.limit_time' => array(
			'type' => 'integer',
			'name' => 'config_parameters.acl.vote.comment.limit_time.name',
			'description' => 'config_parameters.acl.vote.comment.limit_time.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 0,
					'max' => 60*60*24*100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),

		'module.blog.per_page' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.blog.per_page.name',
			'description' => 'config_parameters.module.blog.per_page.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 5,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'module.blog.users_per_page' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.blog.users_per_page.name',
			'description' => 'config_parameters.module.blog.users_per_page.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => 5,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'module.blog.personal_good' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.blog.personal_good.name',
			'description' => 'config_parameters.module.blog.personal_good.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'module.blog.collective_good' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.blog.collective_good.name',
			'description' => 'config_parameters.module.blog.collective_good.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'module.blog.index_good' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.blog.index_good.name',
			'description' => 'config_parameters.module.blog.index_good.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
					'min' => -100,
					'max' => 100,
					'integerOnly' => true,
					'allowEmpty' => false,
				),
			),
		),
		'module.blog.encrypt' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.blog.encrypt.name',
			'description' => 'config_parameters.module.blog.encrypt.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
					'min' => 5,
					'max' => 100,
					'allowEmpty' => false,
				),
			),
		),
		'module.blog.avatar_size' => array(
			'type' => 'array',
			'name' => 'config_parameters.module.blog.avatar_size.name',
			'description' => 'config_parameters.module.blog.avatar_size.description',
			'validator' => array(
				'type' => 'Array',
				'params' => array(
					'min_items' => 1,
					'max_items' => 20,
					'item_validator' => array(
						'type' => 'Number',
						'params' => array(
							'min' => 0,
							'max' => 500,
							'integerOnly' => true,
							'allowEmpty' => false,
						),
					),
					'allowEmpty' => false,
				),
			),
		),
		'module.blog.category_allow' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.blog.category_allow.name',
			'description' => 'config_parameters.module.blog.category_allow.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'module.blog.category_only_admin' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.blog.category_only_admin.name',
			'description' => 'config_parameters.module.blog.category_only_admin.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'module.blog.category_only_children' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.blog.category_only_children.name',
			'description' => 'config_parameters.module.blog.category_only_children.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),
		'module.blog.category_allow_empty' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.blog.category_allow_empty.name',
			'description' => 'config_parameters.module.blog.category_allow_empty.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(),
			),
		),

		'module.topic.new_time' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.topic.new_time.name',
			'description' => 'config_parameters.module.topic.new_time.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.topic.per_page' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.topic.per_page.name',
			'description' => 'config_parameters.module.topic.per_page.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.topic.max_length' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.topic.max_length.name',
			'description' => 'config_parameters.module.topic.max_length.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.topic.link_max_length' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.topic.link_max_length.name',
			'description' => 'config_parameters.module.topic.link_max_length.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.topic.question_max_length' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.topic.question_max_length.name',
			'description' => 'config_parameters.module.topic.question_max_length.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.topic.allow_empty_tags' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.topic.allow_empty_tags.name',
			'description' => 'config_parameters.module.topic.allow_empty_tags.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.user.per_page' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.user.per_page.name',
			'description' => 'config_parameters.module.user.per_page.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.user.friend_on_profile' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.user.friend_on_profile.name',
			'description' => 'config_parameters.module.user.friend_on_profile.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.user.friend_notice.delete' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.user.friend_notice.delete.name',
			'description' => 'config_parameters.module.user.friend_notice.delete.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.user.friend_notice.accept' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.user.friend_notice.accept.name',
			'description' => 'config_parameters.module.user.friend_notice.accept.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.user.friend_notice.reject' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.user.friend_notice.reject.name',
			'description' => 'config_parameters.module.user.friend_notice.reject.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.user.avatar_size' => array(
			'type' => 'array',
			'name' => 'config_parameters.module.user.avatar_size.name',
			'description' => 'config_parameters.module.user.avatar_size.description',
			'validator' => array(
				'type' => 'Array',
				'params' => array(
				),
			),
		),
		'module.user.login.min_size' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.user.login.min_size.name',
			'description' => 'config_parameters.module.user.login.min_size.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.user.login.max_size' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.user.login.max_size.name',
			'description' => 'config_parameters.module.user.login.max_size.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.user.login.charset' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.user.login.charset.name',
			'description' => 'config_parameters.module.user.login.charset.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.user.time_active' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.user.time_active.name',
			'description' => 'config_parameters.module.user.time_active.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.user.usernote_text_max' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.user.usernote_text_max.name',
			'description' => 'config_parameters.module.user.usernote_text_max.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.user.usernote_per_page' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.user.usernote_per_page.name',
			'description' => 'config_parameters.module.user.usernote_per_page.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.user.userfield_max_identical' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.user.userfield_max_identical.name',
			'description' => 'config_parameters.module.user.userfield_max_identical.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.user.profile_photo_width' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.user.profile_photo_width.name',
			'description' => 'config_parameters.module.user.profile_photo_width.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.user.name_max' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.user.name_max.name',
			'description' => 'config_parameters.module.user.name_max.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.user.captcha_use_registration' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.user.captcha_use_registration.name',
			'description' => 'config_parameters.module.user.captcha_use_registration.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.comment.per_page' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.comment.per_page.name',
			'description' => 'config_parameters.module.comment.per_page.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.comment.bad' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.comment.bad.name',
			'description' => 'config_parameters.module.comment.bad.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.comment.max_tree' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.comment.max_tree.name',
			'description' => 'config_parameters.module.comment.max_tree.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.comment.use_nested' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.comment.use_nested.name',
			'description' => 'config_parameters.module.comment.use_nested.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.comment.nested_per_page' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.comment.nested_per_page.name',
			'description' => 'config_parameters.module.comment.nested_per_page.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.comment.nested_page_reverse' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.comment.nested_page_reverse.name',
			'description' => 'config_parameters.module.comment.nested_page_reverse.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.comment.favourite_target_allow' => array(
			'type' => 'array',
			'name' => 'config_parameters.module.comment.favourite_target_allow.name',
			'description' => 'config_parameters.module.comment.favourite_target_allow.description',
			'validator' => array(
				'type' => 'Array',
				'params' => array(
				),
			),
		),
		'module.talk.per_page' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.talk.per_page.name',
			'description' => 'config_parameters.module.talk.per_page.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.talk.encrypt' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.talk.encrypt.name',
			'description' => 'config_parameters.module.talk.encrypt.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.talk.max_users' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.talk.max_users.name',
			'description' => 'config_parameters.module.talk.max_users.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.lang.delete_undefined' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.lang.delete_undefined.name',
			'description' => 'config_parameters.module.lang.delete_undefined.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.notify.delayed' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.notify.delayed.name',
			'description' => 'config_parameters.module.notify.delayed.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.notify.insert_single' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.notify.insert_single.name',
			'description' => 'config_parameters.module.notify.insert_single.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.notify.per_process' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.notify.per_process.name',
			'description' => 'config_parameters.module.notify.per_process.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.notify.dir' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.notify.dir.name',
			'description' => 'config_parameters.module.notify.dir.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.notify.prefix' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.notify.prefix.name',
			'description' => 'config_parameters.module.notify.prefix.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_use' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.image.default.watermark_use.name',
			'description' => 'config_parameters.module.image.default.watermark_use.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_type' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.watermark_type.name',
			'description' => 'config_parameters.module.image.default.watermark_type.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_position' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.watermark_position.name',
			'description' => 'config_parameters.module.image.default.watermark_position.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_text' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.watermark_text.name',
			'description' => 'config_parameters.module.image.default.watermark_text.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_font' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.watermark_font.name',
			'description' => 'config_parameters.module.image.default.watermark_font.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_font_color' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.watermark_font_color.name',
			'description' => 'config_parameters.module.image.default.watermark_font_color.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_font_size' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.watermark_font_size.name',
			'description' => 'config_parameters.module.image.default.watermark_font_size.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_font_alfa' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.watermark_font_alfa.name',
			'description' => 'config_parameters.module.image.default.watermark_font_alfa.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_back_color' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.watermark_back_color.name',
			'description' => 'config_parameters.module.image.default.watermark_back_color.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_back_alfa' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.watermark_back_alfa.name',
			'description' => 'config_parameters.module.image.default.watermark_back_alfa.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_image' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.image.default.watermark_image.name',
			'description' => 'config_parameters.module.image.default.watermark_image.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_min_width' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.image.default.watermark_min_width.name',
			'description' => 'config_parameters.module.image.default.watermark_min_width.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.image.default.watermark_min_height' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.image.default.watermark_min_height.name',
			'description' => 'config_parameters.module.image.default.watermark_min_height.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.image.default.round_corner' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.image.default.round_corner.name',
			'description' => 'config_parameters.module.image.default.round_corner.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.image.default.round_corner_radius' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.round_corner_radius.name',
			'description' => 'config_parameters.module.image.default.round_corner_radius.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.round_corner_rate' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.round_corner_rate.name',
			'description' => 'config_parameters.module.image.default.round_corner_rate.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.path.watermarks' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.path.watermarks.name',
			'description' => 'config_parameters.module.image.default.path.watermarks.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.path.fonts' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.image.default.path.fonts.name',
			'description' => 'config_parameters.module.image.default.path.fonts.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.image.default.jpg_quality' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.image.default.jpg_quality.name',
			'description' => 'config_parameters.module.image.default.jpg_quality.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.image.foto.watermark_use' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.image.foto.watermark_use.name',
			'description' => 'config_parameters.module.image.foto.watermark_use.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.image.foto.round_corner' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.image.foto.round_corner.name',
			'description' => 'config_parameters.module.image.foto.round_corner.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.image.topic.watermark_use' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.image.topic.watermark_use.name',
			'description' => 'config_parameters.module.image.topic.watermark_use.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.image.topic.round_corner' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.image.topic.round_corner.name',
			'description' => 'config_parameters.module.image.topic.round_corner.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.security.hash' => array(
			'type' => 'string',
			'name' => 'config_parameters.module.security.hash.name',
			'description' => 'config_parameters.module.security.hash.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'module.userfeed.count_default' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.userfeed.count_default.name',
			'description' => 'config_parameters.module.userfeed.count_default.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.stream.count_default' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.stream.count_default.name',
			'description' => 'config_parameters.module.stream.count_default.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.stream.disable_vote_events' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.stream.disable_vote_events.name',
			'description' => 'config_parameters.module.stream.disable_vote_events.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.ls.send_general' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.ls.send_general.name',
			'description' => 'config_parameters.module.ls.send_general.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.ls.use_counter' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.module.ls.use_counter.name',
			'description' => 'config_parameters.module.ls.use_counter.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'module.wall.count_last_reply' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.wall.count_last_reply.name',
			'description' => 'config_parameters.module.wall.count_last_reply.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.wall.per_page' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.wall.per_page.name',
			'description' => 'config_parameters.module.wall.per_page.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.wall.text_max' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.wall.text_max.name',
			'description' => 'config_parameters.module.wall.text_max.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.wall.text_min' => array(
			'type' => 'integer',
			'name' => 'config_parameters.module.wall.text_min.name',
			'description' => 'config_parameters.module.wall.text_min.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'module.autoLoad' => array(
			'type' => 'array',
			'name' => 'config_parameters.module.autoLoad.name',
			'description' => 'config_parameters.module.autoLoad.description',
			'validator' => array(
				'type' => 'Array',
				'params' => array(
				),
			),
		),
		'memcache.compression' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.memcache.compression.name',
			'description' => 'config_parameters.memcache.compression.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
/*		'router.rewrite' => array(
			'type' => 'array',
			'name' => 'config_parameters.router.rewrite.name',
			'description' => 'config_parameters.router.rewrite.description',
			'validator' => array(
				'type' => 'Array',
				'params' => array(
				),
			),
		),
		'router.uri' => array(
			'type' => 'array',
			'name' => 'config_parameters.router.uri.name',
			'description' => 'config_parameters.router.uri.description',
			'validator' => array(
				'type' => 'Array',
				'params' => array(
				),
			),
		),*/
/*		'router.config.action_default' => array(
			'type' => 'string',
			'name' => 'config_parameters.router.config.action_default.name',
			'description' => 'config_parameters.router.config.action_default.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'router.config.action_not_found' => array(
			'type' => 'string',
			'name' => 'config_parameters.router.config.action_not_found.name',
			'description' => 'config_parameters.router.config.action_not_found.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),*/
		'compress.css.merge' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.compress.css.merge.name',
			'description' => 'config_parameters.compress.css.merge.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'compress.css.use' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.compress.css.use.name',
			'description' => 'config_parameters.compress.css.use.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'compress.css.case_properties' => array(
			'type' => 'integer',
			'name' => 'config_parameters.compress.css.case_properties.name',
			'description' => 'config_parameters.compress.css.case_properties.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'compress.css.merge_selectors' => array(
			'type' => 'integer',
			'name' => 'config_parameters.compress.css.merge_selectors.name',
			'description' => 'config_parameters.compress.css.merge_selectors.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'compress.css.optimise_shorthands' => array(
			'type' => 'integer',
			'name' => 'config_parameters.compress.css.optimise_shorthands.name',
			'description' => 'config_parameters.compress.css.optimise_shorthands.description',
			'validator' => array(
				'type' => 'Number',
				'params' => array(
				),
			),
		),
		'compress.css.remove_last_;' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.compress.css.remove_last_;.name',
			'description' => 'config_parameters.compress.css.remove_last_;.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'compress.css.css_level' => array(
			'type' => 'string',
			'name' => 'config_parameters.compress.css.css_level.name',
			'description' => 'config_parameters.compress.css.css_level.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'compress.css.template' => array(
			'type' => 'string',
			'name' => 'config_parameters.compress.css.template.name',
			'description' => 'config_parameters.compress.css.template.description',
			'validator' => array(
				'type' => 'String',
				'params' => array(
				),
			),
		),
		'compress.js.merge' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.compress.js.merge.name',
			'description' => 'config_parameters.compress.js.merge.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
		'compress.js.use' => array(
			'type' => 'boolean',
			'name' => 'config_parameters.compress.js.use.name',
			'description' => 'config_parameters.compress.js.use.description',
			'validator' => array(
				'type' => 'Boolean',
				'params' => array(
				),
			),
		),
	),
);

?>