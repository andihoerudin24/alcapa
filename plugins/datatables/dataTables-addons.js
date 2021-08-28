$(".popup-small").on("click",function(){
    $("#popup-small .modal-body").html('');
    var dataURL = $(this).attr("data-href");
    $("#popup-small .modal-body").load(dataURL,function(){
        $("#popup-small").modal({show:true});
    });
});

$(".popup-medium").on("click",function(){
    $("#popup-medium .modal-body").html('');
    var dataURL = $(this).attr("data-href");
    $("#popup-medium .modal-body").load(dataURL,function(){
        $("#popup-medium").modal({show:true});
    });
});

$(".popup-large").on("click",function(){
    $("#popup-large .modal-body").html('');
    var dataURL = $(this).attr("data-href");
    $("#popup-large .modal-body").load(dataURL,function(){
        $("#popup-large").modal({show:true});
    });
});


$(".checkbox-data").on("click",function(){
    $(this).attr('checked', 'checked');
});