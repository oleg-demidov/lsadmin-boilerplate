
(function($) {
    "use strict";

    $.widget( "livestreet.lsProgress", $.livestreet.lsComponent, {
        options: {
            // Классы
            classes: {},
            // Селекторы
            selectors: {
                precent: ".js-precent .ls-info-list-item-content",
                mess: ".js-mess .ls-info-list-item-content",
                log:".js-log .ls-details-content"
            },
            // Ссылки
            urls: {
                import_start: null,
                buf: null,
                log: null
            },
            // Параметры отправляемые при каждом аякс запросе
            params: {
            },
            // Локализация
            i18n: {},
            // Элементы
            elements: {}
            
        },
        
        bufferId: null,

        /**
         * Конструктор
         *
         * @constructor
         * @private
         */
        _create: function () {
            this._super();
            
            this._load('import_start', {}, function(response){
                console.log(response);
                
            }.bind(this), {showProgress:false});
            
            setTimeout(this.progress.bind(this),1000);          
            
        },
        
        progress:function(){
           
            this._load('buf', {}, function(response){
                console.log(response)
                
                if(this.bufferId === null || this.bufferId !== response.id){
                    this.elements.precent.html( response.progress + '%' );
                    this.elements.mess.html( response.mess );
                    this.bufferId = response.id;
                }                
                $.ajax({
                    url: this.option('urls.log'),
                    complete:function(log){
                        console.log(log)
                        this.elements.log.html(  log.responseText  );
                    }.bind(this)
                })
                    
                if(response.status !== 'stop'){
                    setTimeout(this.progress.bind(this),500);
                }
            }.bind(this), {showProgress:false});
        }

        
    });
})(jQuery);
