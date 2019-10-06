{**
 * Cron item
 *}

{$component = 'import'}
{component_define_params params=[ 'key', 'replaceKeys' ]}

<div class="ls-grid-row ls-mt-10">
    <div class="ls-grid-col ls-grid-col-6">
        <b>{$key}</b>{component "admin:field.hidden" value=$key name='keys[]'}
    </div>
    <div class="ls-grid-col ls-grid-col-6">
        {component "admin:field.select" items=$replaceKeys name='replace[]' selectedValue=$key}
    </div>
</div>