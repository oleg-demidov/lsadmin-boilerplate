{extends file="{$aTemplatePathPlugin.admin}/layout.base.tpl"}

{block name='layout_content'}
	<h2 class="title mb20">
		{$aLang.plugin.admin.bans.title}
	</h2>

	<div class="top-controls mb-20">
		<a class="button button-primary" href="{router page='admin/users/bans/add'}">Добавить бан</a>
	</div>

	<table class="table table-sorting">
		<thead>
			<tr>
				<th class="checked">
					<label>
						<input type="checkbox" name="checked[]" value="1" />
						&darr;																			{* todo: select menu *}
					</label>
				</th>
				<th class="avatar"></th>
				{include file="{$aTemplatePathPlugin.admin}actions/ActionAdmin/users/sorting_cell.tpl"
					sCellClassName='name'
					sSortingOrder='u.user_login'
					sLinkHtml=$aLang.plugin.admin.users.table_header.name
					sBaseUrl=$sFullPagePathToEvent
				}
				{include file="{$aTemplatePathPlugin.admin}actions/ActionAdmin/users/sorting_cell.tpl"
					sCellClassName='birth'
					sSortingOrder='u.user_profile_birthday'
					sLinkHtml=$aLang.plugin.admin.users.table_header.birth
					sBaseUrl=$sFullPagePathToEvent
				}
				{include file="{$aTemplatePathPlugin.admin}actions/ActionAdmin/users/sorting_cell.tpl"
					sCellClassName='visitandreg'
					sSortingOrder='s.session_date_last'
					sLinkHtml=$aLang.plugin.admin.users.table_header.reg_and_last_visit
					sBaseUrl=$sFullPagePathToEvent
				}
				{include file="{$aTemplatePathPlugin.admin}actions/ActionAdmin/users/sorting_cell.tpl"
					sCellClassName='ips'
					sSortingOrder='s.session_ip_last'
					sLinkHtml=$aLang.plugin.admin.users.table_header.ip
					sBaseUrl=$sFullPagePathToEvent
				}
				{include file="{$aTemplatePathPlugin.admin}actions/ActionAdmin/users/sorting_cell.tpl"
					sCellClassName='rating'
					sSortingOrder='u.user_rating'
					sLinkHtml=$aLang.plugin.admin.users.table_header.rating_and_skill
					sBaseUrl=$sFullPagePathToEvent
				}
				<th class="controls"></th>
			</tr>
		</thead>

		<tbody>
			{foreach from=$aUsers item=oUser name=UserCycle}
				{assign var="oSession" value=$oUser->getSession()}
				<tr class="{if $smarty.foreach.UserCycle.iteration % 2 == 0}second{/if}">
					<td class="checked">
						<input type="checkbox" name="checked[]" value="1" />
					</td>
					<td class="avatar">
						<a href="{router page='admin'}users/profile/{$oUser->getId()}"><img src="{$oUser->getProfileAvatarPath(48)}" alt="avatar" class="avatar" /></a>
						{if $oUser->isOnline()}
							<div class="user-is-online"
								 title="{if $oUser->isOnline()}{$aLang.user_status_online}{else}{$aLang.user_status_offline}{/if}"></div>
						{/if}
					</td>
					<td class="name">
						<div class="name {if !$oUser->getProfileName()}no-realname{/if}">
							<p class="username word-wrap">
								<a href="{router page='admin'}users/profile/{$oUser->getId()}">{$oUser->getLogin()}</a>
								{if $oUser->isAdministrator()}
									<i class="icon-user" title="Admin"></i>
								{/if}
							</p>
							{if $oUser->getProfileName()}
								<p class="realname">{$oUser->getProfileName()}</p>
							{/if}
							<p class="mail">{$oUser->getMail()}</p>
						</div>
					</td>
					<td class="birth">
						{if $oUser->getProfileBirthday()}
							{date_format date=$oUser->getProfileBirthday() format="j.m.Y" notz=true}
						{/if}
					</td>
					<td class="visitandreg">
						<p title="reg date">
							{date_format date=$oUser->getDateRegister() format="d.m.Y"},
							<span>{date_format date=$oUser->getDateRegister() format="H:i"}</span>
						</p>
						{if $oSession}
							<p title="date last">
								{date_format date=$oSession->getDateLast() format="d.m.Y"},
								<span>{date_format date=$oSession->getDateLast() format="H:i"}</span>
							</p>
						{/if}
					</td>
					<td class="ips">
						<p title="reg ip">{$oUser->getIpRegister()}</p>
						{if $oSession}
							{* <p title="sess ip create">{$oSession->getIpCreate()}</p> *}
							<p title="sess ip last">{$oSession->getIpLast()}</p>
						{/if}
					</td>
					<td class="ratings">
						<p class="rating {if $oUser->getRating() < 0}negative{/if}">
							{$oUser->getRating()}
						</p>
						<p class="skill">
							{$oUser->getSkill()}
						</p>
					</td>
					<td class="controls">
						{* <p></p>  TODO *}
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>


	<div class="OnPageSelect">
		<form action="{router page='admin'}users/ajax-on-page/" method="post" enctype="application/x-www-form-urlencoded" id="admin_onpage">
			<input type="hidden" name="security_ls_key" value="{$LIVESTREET_SECURITY_KEY}" />
			{$aLang.plugin.admin.users.on_page}
			<select name="onpage" class="width-50">
				{foreach from=range(5,100,5) item=iVal}
					<option value="{$iVal}" {if $iVal==$oConfig->GetValue('plugin.admin.user.per_page')}selected="selected"{/if}>{$iVal}</option>
				{/foreach}
			</select>
		</form>
	</div>

	{include file="{$aTemplatePathPlugin.admin}/pagination.tpl" aPaging=$aPaging}
		
{/block}