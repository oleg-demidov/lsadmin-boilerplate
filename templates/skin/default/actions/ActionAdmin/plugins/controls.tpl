
{if $oPlugin->getActive()}
	<a href="{$oPlugin->getDeactivateUrl()}" title="{$aLang.plugins_plugin_deactivate}" class="button">{$aLang.plugins_plugin_deactivate}</a>
{else}
	<a href="{$oPlugin->getActivateUrl()}" title="{$aLang.plugins_plugin_activate}" class="button button-primary">{$aLang.plugins_plugin_activate}</a>
{/if}
