{**
 * Список пользователей
 *}

{extends file="{$aTemplatePathPlugin.admin}layouts/layout.base.tpl"}

{block 'layout_page_title'}
    {$aLang.plugin.admin.users.import.title} 
{/block}

{block 'layout_content'}
    <hr>
    <h2>Настройки полей</h2>
    
    {$replaceKeys = [
        [value => 'skip', text => $aLang.plugin.admin.users.import.field.when_dublicate.values.skip]
    ]}
    {foreach $aFields as $field}
        {$replaceKeys[] = [value => $field, text => $field]}
    {/foreach}

    
    <form action="{router page="admin/users/import_process"}">
        {foreach $aRowHeader as $key}
            {component "admin:import.item" key=$key replaceKeys=$replaceKeys}
        {/foreach}

        <h2>Настройки импорта</h2>
        <div class="ls-grid-row ls-mt-10">
            <div class="ls-grid-col ls-grid-col-6">
                {$aLang.plugin.admin.users.import.field.when_dublicate.label}
            </div>
            <div class="ls-grid-col ls-grid-col-6">
                {component "admin:field.select" items=[
                        [text => $aLang.plugin.admin.users.import.field.when_dublicate.values.skip, value => 'skip'],
                        [text => $aLang.plugin.admin.users.import.field.when_dublicate.values.update, value => 'update']
                    ] 
                name='when_dublicate'}
            </div>
        </div>
        <div class="ls-grid-row ls-mt-10">
            <div class="ls-grid-col ls-grid-col-12">
                {component "admin:field.checkbox" label=$aLang.plugin.admin.users.import.field.activate.label name="activate" checked=true}
            </div>
        </div>
        
        {component "button" type="submit" text=$aLang.common.save mods="primary" classes="ls-mt-10"}
    </form>
{/block}