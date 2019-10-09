<div class="js-ajax-progress">
    {component "admininfo-list" 
        title="Прогресс" 
        list = [
            [ label => 'Процент', content => "0%", classes => "js-precent"],
            [ label => 'Статус', content => "...", classes => "js-mess"]
        ]}
        {component "admindetails" title="Подробно" classes = "js-log js-details-default" content="..."}
</div>

