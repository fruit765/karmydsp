
$(document).ready(function(){

    $('.filter .sort').click(function(){

        $(this).toggleClass('open');
    });

    $('.filter .sort .sort-item').click(function(){

        $('.filter .sort .sort-item').removeClass('active');

        $(this).addClass('active');

        setFilters($('.filter .sort .sort-item.active'), $('.filter .count .count-item.active'), 1);
    });

    $('.filter .count .count-item').click(function(){

        $('.filter .count .count-item').removeClass('active');

        $(this).addClass('active');

        setFilters($('.filter .sort .sort-item.active'), $('.filter .count .count-item.active'), 1);
    });

    $('.pagination').on('click', '.item', function(){

        if (!$(this).hasClass('current')) {

            var numPage = $(this).text();

            setFilters($('.filter .sort .sort-item.active'), $('.filter .count .count-item.active'), numPage);
        }
    });

    function setFilters($sort, $count, numPage){

        var sortType = $sort.attr('sort-type');

        var countPostsOnPage = $count.text();

        var $elements = $('.catalog-block .item');

        var catId = $sort.parents('.filter').attr('cat-id');

        $.ajax({

            type: 'POST',
            url: myAjax.url,
            data: {

                action: 'filter_counts',
                sort_type: sortType,
                count_posts_on_page: countPostsOnPage,
                num_page: numPage,
                cat_id: catId,
            },
            success: function(response) { 

                if (response) {

                    response = response.replace(/(\r\n)|\r|\n/g, '');

                    if (response && response != -1 && response != 0) {

                        $('html, body').stop().animate(

                            {
                                
                                scrollTop: 0
                            },
                
                            {
                
                                duration: 10,
                
                                easing: 'easeOutSine',
                
                                queue: false,
                            }
                        );

                        $('.catalog-block').html('');

                        $('.pagination').html('');

                        response = JSON.parse(response);

                        var cards = response['cards'];

                        var pagination = response['pagination'];

                        cards.forEach(function(item){

                            $('.catalog-block').append(item);
                        });

                        pagination.forEach(function(item){

                            $('.pagination').append(item);
                        });

                        if ($('.pagination').html() === '') {

                            $('.pagination').css('padding-bottom', '0');
                        }
                        else {

                            $('.pagination').css('padding-bottom', '20px');
                        }

                        correctLastElement();

                        setHeight();
                    }
                }
            }    
        });
    }
});