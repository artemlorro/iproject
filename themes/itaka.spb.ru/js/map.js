/**
 * Created with JetBrains PhpStorm.
 * User: artem.lorro
 * Date: 18.03.13
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function(){

    $(".office_small").hover(
        function(){
            $(this).parent().addClass('map_round');
        },
        function(){
            $(this).parent().removeClass('map_round');
        }
    );

    $(".office_small").click(function(){
        $(this).next().toggle();
    });

    $(".office_big").click(function(){
        $(this).next().toggle();
    });

});