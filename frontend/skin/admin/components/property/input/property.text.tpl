{if $property->getParam( 'use_html' )}
    {component 'admin:editor'
        name            = "property[{$property->getId()}]"
        value           = $property->getValue()->getValueForForm()
        label           = $property->getTitle()
        escape          = false
        inputClasses    = 'js-editor-default' }

{else}
    {component 'admin:field' template='textarea'
        name  = "property[{$property->getId()}]"
        value = $property->getValue()->getValueForForm()
        rows  = 10
        escape          = false
        note  = $property->getDescription()
        label = $property->getTitle()}
{/if}