{**
 * Вывод дополнительных полей для ввода данных на странице создания нового объекта
 *}

{component_define_params params=[ 'properties' ]}

{foreach $properties as $property}
    {component 'admin:property' template='input.item' property=$property}
{/foreach}