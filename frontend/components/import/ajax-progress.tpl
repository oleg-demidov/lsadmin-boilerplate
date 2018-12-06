<div class="js-ajax-progress">
    {component "info-list" 
        title="Прогресс" 
        list = [
            [ label => 'Процент', content => "0%", classes => "js-precent"],
            [ label => 'Статус', content => "...", classes => "js-mess"]
        ]}
        {component "details" title="Подробно" classes = "js-log js-details-default" content="..."}
</div>

