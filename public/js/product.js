$(function(){
    $(".detailbutton").click(function(){
        $('#productname').html($(this).data('name'));
        $('#productdetails').html($(this).data('details'));
        $('#productimage').attr("src", "/content/"+$(this).data('image'))
        $('#productprice').html("BDT "+$(this).data('price'));
        $('#productid').val($(this).data('id'));
        $('#productid').hide();
        $("#detail-modal").modal("show");

    });
});
