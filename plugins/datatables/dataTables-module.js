function updateDataTableSelectAllCtrl(table){
	var $table             = table.table().node();
	var $chkbox_all        = $('tbody input[type="checkbox"].checkbox-unique', $table);
	var $chkbox_checked    = $('tbody input[type="checkbox"].checkbox-unique:checked', $table);
	var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

	if($chkbox_checked.length === 0){
		chkbox_select_all.checked = false;
		if('indeterminate' in chkbox_select_all) {
			chkbox_select_all.indeterminate = false;
		}
	}
	else if ($chkbox_checked.length === $chkbox_all.length){
		chkbox_select_all.checked = true;
		if('indeterminate' in chkbox_select_all) {
			chkbox_select_all.indeterminate = false;
		}

	}
	else{
		chkbox_select_all.checked = true;
		if('indeterminate' in chkbox_select_all) {
			chkbox_select_all.indeterminate = true;
		}
	}
}

$(document).ready(function () {
	var data_text_center = $("#table-data").data("text-center");
	var data_order = $("#table-data").data("order");
	var data_link = $("#table-data").data("link");
	var data_search = $("#table-data").data("search");


	var rows_selected = [];
	var table = $('#table-data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"paging": true,
		"lengthChange": true,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": true,
		"stripeClasses":['stripe1','stripe2'],
		"ajax": {
			"url": base_url+data_link,
			"type": "POST",
            "data": function(data){
            	if($('.table-where').length){
            		data.filter_where = $('.table-where').serialize();
            	}
            	if($('.table-like').length){
            		data.filter_like = $('.table-like').serialize();
            	}
            	if($('.table-count').length){
            		data.filter_count = $('.table-count').serialize();
            	}
            }
		},
		'columnDefs': [{
			'targets': 0,
			'searchable': false,
			'orderable': false,
			'width': '1%',
			'className': 'dt-body-center',
			'render': function (data, type, full, meta){
				return '<input type="checkbox" class="checkbox-unique">';
			}
		},{ 
            "targets": data_order,
            "orderable": false
        },{
            "targets": data_text_center,
            "className": "text-center",
        }],
		'rowCallback': function(row, data, dataIndex){
			var rowId = data[0];
			if($.inArray(rowId, rows_selected) !== -1) {
				$(row).find('input[type="checkbox"].checkbox-unique').prop('checked', true);
				$(row).addClass('selected');
			}
			$('.table-total-data').html(table.rows().count());
		},
	    "language": {
	    	"emptyTable": "Belum ada data",
	    	"lengthMenu": "Tampilkan _MENU_ data",
	    	"info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
	   		"infoEmpty": "",
		    "paginate": {
		        "first":      '<i class="os-icon os-icon-chevrons-left"></i>',
		        "last":       '<i class="os-icon os-icon-chevrons-right"></i>',
		        "next":       '<i class="os-icon os-icon-chevron-right"></i>',
		        "previous":   '<i class="os-icon os-icon-chevron-left"></i>',
		    },
		    "searchPlaceholder": data_search,
		    "zeroRecords":    "Data tidak ditemukan",
		    "infoFiltered":   "",
		    "search": '<i class="las la-search"></i>'
	    }
	});

	$('#table-data tbody').on('click', 'input[type="checkbox"]', function(e) {
		var $row = $(this).closest('tr');
		var data = table.row($row).data();
		var rowId = data[0];
		var index = $.inArray(rowId, rows_selected);
		if(this.checked && index === -1){
			rows_selected.push(rowId);
		} 
		else if (!this.checked && index !== -1){
			rows_selected.splice(index, 1);
		}

		if(this.checked){
			$row.addClass('selected');
		} 
		else{
			$row.removeClass('selected');
		}
		updateDataTableSelectAllCtrl(table);
		if(rows_selected.length > 0){
			$(".row-select").fadeIn("3000").removeClass("d-none");
			$(".row-select strong").text(rows_selected.length);
			$("input[name=array_id]").val(rows_selected);
		}
		else{
			$(".row-select").fadeOut("3000");
		}
		e.stopPropagation();
	});

	$('thead input[name="select_all"]', table.table().container()).on('click', function(e){
		if(this.checked){
			$('#table-data tbody input[type="checkbox"].checkbox-unique:not(:checked)').trigger('click');
		} 
		else {
			$('#table-data tbody input[type="checkbox"].checkbox-unique:checked').trigger('click');
		}
		e.stopPropagation();
	});

	table.on('draw', function(){
		var table_select = document.getElementById('table-select');
		if(table_select == null){
			$(".display.table").parent().prepend('<div id="table-select" class="row-select fontsize-smaller mt-3 ml-2 border p-3 d-none">'+
				'<strong>2</strong> data terpilih'+
				'<button class="btn btn-outline-danger btn-hover btn-delete btn-rounded fontsize-smallest ml-3" data-toggle="modal" data-target="#delete-form"><span>Hapus</span><small class="btn-loader d-none"></small></button>'+
			'</div>');
			updateDataTableSelectAllCtrl(table);
		}
	    $.getScript(base_url+'plugins/datatables/dataTables-addons.js', function(){
	    });
	});

	$(".input-filter-select").change(function(){
		table.ajax.reload();
	});

	$(".input-filter-text").keyup(function(){
		table.ajax.reload();
	});
});