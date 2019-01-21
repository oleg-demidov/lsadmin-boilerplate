{**
 * Строковый тип
 *}

{extends 'component@admin:field.textarea'}

{block 'field_options' append}
    {component_define_params params=[ 'parameter', 'key', 'formid' ]}

    {$label = $parameter->getName()}
    {$note = $parameter->getDescription()}
    {$value = $parameter->getValue()|escape}
{/block}

{block 'field_input' prepend}
{*    {component 'admin:field' template='textarea' name=$name value=$formid}*}
{/block}
