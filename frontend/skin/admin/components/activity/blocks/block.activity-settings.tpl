{**
 * Блок настройки ленты активности
 *}

{component 'admin:block'
    mods     = 'activity-settings'
    title    = {lang 'activity.settings.title'}
    content  = {component 'activity' template='settings' typesActive=$typesActive types=$types}}