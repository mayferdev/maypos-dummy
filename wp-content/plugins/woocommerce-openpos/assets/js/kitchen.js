(function ($) {
    $.extend({
        playSound: function () {
            return $(
                '<audio class="sound-player" autoplay="autoplay" style="display:none;">'
                + '<source src="' + arguments[0] + '" />'
                + '<embed src="' + arguments[0] + '" hidden="true" autostart="true" loop="false"/>'
                + '</audio>'
            ).appendTo('body');
        },
        stopSound: function () {
            $(".sound-player").remove();
        }
    });
})(jQuery);

(function($) {
    var total_item = 0;

    function getDataInit(callback){
        var time_data_url = data_url + '?t='+ Date.now();
        
        if($('body').hasClass('processing'))
        {
            callback();
        }else {
            $.ajax({
                url : time_data_url,
                type: 'post',
                dataType: 'json',
                data: {action: 'get_data',warehouse: data_warehouse_id,type: kitchen_type},
                beforeSend:function(){
                    $('body').addClass('processing');
                    
                },
                success: function(response){
                    $('#kitchen-table-body').empty();

                    var list_html = '';    
                    var _index = 1;
                    for(var i in response)
                    {
                        var template = ejs.compile(data_template, {});
                        var row_data = response[i];
                        row_data['index'] = _index;
                        var in_process = readied_items.indexOf(row_data['id']);
                        
                        if(in_process >= 0)
                        {
                            row_data['done'] = 'ready';
                        }
                        var html = template(row_data);
                        list_html += html;
                        _index++;
                    }
                    if(_index > total_item)
                    {
                        $('body').trigger('new-dish-come');
                    }
                    total_item = _index;
                    $('#kitchen-table-body').html(list_html);
                    
                    $('body').removeClass('processing');
                    callback();
                },
                error: function(){
                    $('body').removeClass('processing');
                    callback();
                }
            });
        }

    }
    function getData(){
        getDataInit(function(){

            setTimeout(function() {
                getData();
            }, 3000);

        });
    }

    $(document).ready(function(){

        $('select[name="kitchen_type"]').on('change',function(){
            window.location.href = $(this).val();
        });

        getData();

        $(document).on('click','.is_cook_ready',function(){
            var current = $(this);
            var ready_id = $(this).data('id');
            var time_data_url = data_url + '?t='+ Date.now();
            $.ajax({
                url : time_data_url,
                type: 'post',
                dataType: 'json',
                data: {action: 'update_ready',id: ready_id, type: kitchen_type},
                beforeSend:function(){
                    $('body').addClass('processing');
                    current.hide();
                },
                success: function(response){
                    $('body').removeClass('processing');
                    readied_items.push(ready_id);

                },
                error: function(){
                    $('body').removeClass('processing');
                }
            });
        });

        $(document).on('click','#refresh-kitchen',function(){
            var time_data_url = data_url + '?t='+ Date.now();
            $.ajax({
                url : time_data_url,
                type: 'post',
                dataType: 'json',
                data: {action: 'clear_data',warehouse: data_warehouse_id,type: kitchen_type},
                beforeSend:function(){
                    $('body').addClass('processing');
                },
                success: function(response){
                    $('body').removeClass('processing');
                },
                error: function(){
                    $('body').removeClass('processing');
                }
            });
        })

    });



}(jQuery));