{**
 * Список пользователей на которых подписан текущий пользователь
 *
 * @param array $users
 *}

{component_define_params params=[ 'users' ]}

{component 'admin:user-list-add'
    users   = $users
    classes = 'js-activity-users'
    note    = $aLang.activity.users.note}