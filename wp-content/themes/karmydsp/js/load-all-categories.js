
$(document).ready(function(){

    $('#load-all-categories').click(function(){

        var self = this;

        var idCategories = [];

        $('.categories-container .item').each(function(){

            idCategories.push($(this).attr('id-category'));
        });

        idCategories = JSON.stringify(idCategories);

        $(this).addClass('load');

        $.ajax({

            type: 'POST',
            url: myAjax.url,
            data: {

                action: 'load_all_categories',
                id_categories: idCategories,
            },
            success:  function(response) { 

                $(self).removeClass('load');

                if (response) {

                    response = response.replace(/(\r\n)|\r|\n/g, '');

                    if (response && response != -1 && response != 0) {

                        var categories = JSON.parse(response);

                        categories.forEach(function(item){

                            $('.categories-container .items').css('margin-bottom', '0').append(item);

                            $('.categories-container .categories').css('padding-bottom', '60px');

                            $(self).remove();
                        });
                    }
                }
            }    
        });
    });
});