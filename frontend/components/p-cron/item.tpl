{**
 * Cron item
 *}

{$component = 'p-cron-item'}
{component_define_params params=[ 'item' ]}

<tr id="cron-item-{$item->getId()}">
    <td>
        {$item->getTitleWithLang()}<br/>
        {$item->getMethod()}
    </td>
    <td>{$item->getPlugin()}</td>
    <td>{$item->getPeriodRun()}</td>
    <td>{$item->getCountRun()}</td>
    <td>{date_format date=$item->getDateRunLast() format='j F Y <\b\r/> H:i:s'}</td>
    <td>
        {if $item->getState() == ModuleCron::TASK_STATE_ACTIVE}
            да
        {else}
            нет
        {/if}
    </td>
    <td class="ta-r">
        <a href="#" class="fa fa-play" title="Запустить сейчас" onclick="return ls.admin_cron.runTask({$item->getId()});"></a>
        <a href="{router page='admin/utils/cron/update'}{$item->getId()}/" class="fa fa-edit" title="{lang 'common.edit'}"></a>
        <a href="{router page='admin/utils/cron/remove'}{$item->getId()}/?security_ls_key={$LIVESTREET_SECURITY_KEY}" class="fa fa-trash-o js-confirm-remove" title="{lang 'common.remove'}"></a>
    </td>
</tr>