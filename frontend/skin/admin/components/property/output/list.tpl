{component_define_params params=[ 'properties' ]}

{if $properties}
    <div class="ls-property-list">
        {foreach $properties as $property}
            {component 'admin:property' template='output.item' property=$property}
        {/foreach}
    </div>
{/if}