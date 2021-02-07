/// get product sizes by color

$(".pro_color").on('click',  function (event) {
    let color = $("input[name='color']:checked").val();
    let product_id = $(this).data('product');
    let sizesDiv = $('.txt_radio');

    $.ajax({
        url: "/products/sizes/" + color ,
        method:'get',
        type: 'json',
        data:{color,product_id},
        success(response) {
            //console.log(response.pro_sizes)

            sizesDiv.empty();
            response.pro_sizes.forEach(size => {
                sizesDiv.append(`
<div class="rad_in">
<input type="radio" id="size-${size.size_id}" name="size" value="${size.size_id}">
<label class="" for="size-${size.size_id}" style="width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    font-size: 17px;
    display: inline-block;
    border: 1px solid #efefed;
    cursor: pointer;
    border-radius: 50%;
    color: #9c9c9c;
    font-weight: 100;
    text-transform: uppercase;">${size.size.size}</label></div>`);
            });
        },
        error(error) {
            console.log('error get sizes', error)
        }
    })




});
