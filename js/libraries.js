/* == POPOVER == */
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
/* == #POPOVER == */

/* == INPUT == */
$('input.validate').keyup(function(){
	var validate = $(this).attr('name');
    $.ajax({
    type: 'POST',
    data: {
    	type: $(this).data('validate'),
    	value: $(this).val()
    },
    url: base_url+$(this).data('validate'),
    cache: false,
    success: function(data){
        if(data == 'success')
        {
        	$('input[name="'+validate+'"]').addClass('valid');
        	$('input[name="'+validate+'"]').removeClass('is-invalid');
        }
        else
        {
        	$('input[name="'+validate+'"]').removeClass('valid');
	        $('input[name="'+validate+'"]').addClass('is-invalid');
        }
    }
    });
});

$('select.validate').change(function(){
    var validate = $(this).attr('name');
    $.ajax({
    type: 'POST',
    data: {
        type: $(this).data('validate'),
        value: $(this).val()
    },
    url: base_url+$(this).data('validate'),
    cache: false,
    success: function(data){
        if(data == 'success')
        {
            $('select[name="'+validate+'"]').addClass('valid');
            $('select[name="'+validate+'"]').removeClass('is-invalid');
            $('.invalid-feedback[data-name="'+validate+'"]').removeClass('d-block');
            $('.invalid-feedback[data-name="'+validate+'"]').addClass('d-hide');
            $('.invalid-feedback[data-name="'+validate+'"]').parent().find('.bootstrap-select').removeClass('invalid');
        }
        else
        {
            $('select[name="'+validate+'"]').removeClass('valid');
            $('select[name="'+validate+'"]').addClass('is-invalid');
            $('.invalid-feedback[data-name="'+validate+'"]').addClass('d-block');
            $('.invalid-feedback[data-name="'+validate+'"]').removeClass('d-hide');
            $('.invalid-feedback[data-name="'+$(item).attr('name')+'"]').parent().find('.bootstrap-select').addClass('invalid');
        }
    }
    });
});

$('textarea.validate').keyup(function(){
    var validate = $(this).attr('name');
    $.ajax({
    type: 'POST',
    data: {
        type: $(this).data('validate'),
        value: $(this).val()
    },
    url: base_url+$(this).data('validate'),
    cache: false,
    success: function(data){
        if(data == 'success')
        {
            $('textarea[name="'+validate+'"]').addClass('valid');
            $('textarea[name="'+validate+'"]').removeClass('is-invalid');
        }
        else
        {
            $('textarea[name="'+validate+'"]').removeClass('valid');
            $('textarea[name="'+validate+'"]').addClass('is-invalid');
        }
    }
    });
});

$('.btn-action').click(function() {
	event.preventDefault();
	var form = $(this).closest('form');
	var formclass = '.'+$(this).closest('form').attr('class');
	var input = $(formclass).find($('.validate')).length;
	var input_check = 0;
	$(formclass+' .validate').each(function(index,item){
	    $.ajax({
	    type: 'POST',
	    data: {
	    	type: $(item).data('validate'),
	    	value: $(item).val()
	    },
	    url: base_url+$(item).data('validate'),
	    cache: false,
	    success: function(data){
	        if(data == 'success')
	        {
				input_check++;
				if(input_check == input)
				{
					form.submit();
				}
	        }
	        else
	        {
                $('.invalid-feedback[data-name="'+$(item).attr('name')+'"]').addClass('d-block');
                $('.invalid-feedback[data-name="'+$(item).attr('name')+'"]').parent().find('.select2-selection--multiple').addClass('invalid');
	        	$(item).addClass('is-invalid');
	        }
	    }
	    });
	});
});

$('.passconf').keyup(function(){
    $('input[name="passconf"]').removeData('validate');
    $('input[name="passconf"]').removeAttr('data-validate');    
    var password = $('input[name="user_password"]').val();
    var password_conf = $('input[name="passconf"]').val();
    if(password != password_conf || password_conf == '')
    {
        $('input[name="passconf"]').addClass('is-invalid');
        $('input[name="passconf"]').removeClass('valid');
        $('input[name="passconf"]').addClass('validate');
    }
    else
    {
        $('input[name="passconf"]').addClass('valid');
        $('input[name="passconf"]').removeClass('is-invalid');
        $('input[name="passconf"]').removeClass('validate');
        $('input[name="passconf"]').removeData('validate');
        $('input[name="passconf"]').removeAttr('data-validate');
    }
});

if ($(".input-numeric")[0]){
    var input_number = new AutoNumeric.multiple('.input-numeric', {
        decimalCharacter : ",",
        decimalPlaces: 0,
        digitGroupSeparator : "."
    });
}

if ($(".input-float")[0]){
    var input_number = new AutoNumeric.multiple('.input-float', {
        decimalCharacter : ",",
        digitGroupSeparator : "."
    });
}

$('.inputmax').keyup(function(){
    var inputlength = $(this).val().length;
    $(this).parent().find('.inputmax-count').text(inputlength);
});
/* == #INPUT == */

/* == MODAL == */
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
/* == #MODAL == */

/* == FAB == */
$('.btn-group-fab').on('click', '.btn', function() {
$('.btn-group-fab').toggleClass('active');
});
$('has-tooltip').tooltip();
/* == #FAB == */