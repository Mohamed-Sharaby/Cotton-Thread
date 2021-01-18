$(document).ready(function () {

/********* Add To Cart Badge Counter ***************/
    var itemCount = parseInt($("#itemCount").text());
    $('.add-to-cart').click(function () {
        itemCount++;
        $('#itemCount').html(itemCount).css('display', 'block');
    });
    
});
