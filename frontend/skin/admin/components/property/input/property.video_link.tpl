{$value = $property->getValue()}

{component 'admin:field' template='text'
    name    = "property[{$property->getId()}]"
    value   = $value->getValueVarchar()
    note    = $property->getDescription()
    label   = $property->getTitle()}

{component 'admin:property' template='input.property.video-modal' value=$value}

<p class="ls-mb-20">
    <a href="#" class="ls-link-dotted js-modal-toggle-default" data-lsmodaltoggle-modal="modal-property-type-video-{$value->getId()}">{lang 'property.video.watch'}</a>
</p>