{**
 * Список пользователей
 *}

{extends file="{$aTemplatePathPlugin.admin}layouts/layout.base.tpl"}

{block 'layout_page_title'}
    {$aLang.plugin.admin.users.import.title} 
{/block}

{block 'layout_content'}
    <hr>
    <h2>Загрузите Exel файл</h2>
    {component "admin:p-form"
        action = {router page="admin/users/import_settings"}
        attributes = [enctype => "multipart/form-data"]
        submit = ['text' => $aLang.common.send]
        form=[
            [  field => 'file', label => $aLang.admin.users.import.field.file.label, name => 'file' ]
    ]}
{/block}