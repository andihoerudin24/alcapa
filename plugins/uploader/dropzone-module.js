Dropzone.autoDiscover = false;
$('.upload-multiplefile').each(function()
{
    var filename;
    var fileserver;
    var foldername = $(this).data('foldername');
    var foldercode = $(this).data('code');
    var iduser = $(this).data('iduser');
    var accept = $(this).data('accept');
    var size = $(this).data('size');
    var fileupload = $(this).data('fileupload');
    var fileupload = fileupload.split(",");
    var filetotal = 0;
    var mockFile;
    $(this).dropzone({
        url: base_url+'temporary/uploadmultiplefile/'+foldername+'/'+foldercode,
        method:'post',
        paramName:'file',
        maxFiles: 6,
        maxFilesize: size,
        addRemoveLinks:true,
        dictRemoveFile: '<button class="btn btn-sm btn-block btn-danger fontsize-smallest mt-2">Hapus File</button>',
        acceptedFiles: accept,
        accept: function(file, done) {
            var thumbnail;
            switch (file.type) {
                case 'application/pdf':
                thumbnail = $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image');
                thumbnail.css('background', 'url('+base_url+'img/icon/pdf.png');
                $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image img').attr("src",base_url+'img/icon/pdf.png');
                done();
                break;
                case 'application/msword':
                case 'application/doc':
                case 'application/docx':
                case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                thumbnail = $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image');
                thumbnail.css('background', 'url('+base_url+'img/icon/doc.png');
                $('.dropzone[data-foldername="'+foldername+'"] .dz-preview.dz-file-preview .dz-image img').attr("src",base_url+'img/icon/doc.png');
                done();
                break;
                case 'image/jpeg':
                case 'image/jpg':
                case 'image/png':
                done();
                break;
            }
        },
        init: function() {
            this.on('maxfilesexceeded', function(file) {
                this.removeAllFiles();
                this.addFile(file);
            });
            this.on('error', function(file,resp) {
                if(resp != 'You can not upload any more files.')
                {
                    this.removeFile(file);
                    $('.upload-filetotal-'+foldername).siblings('.invalid-feedback').html('File tidak dapat diunggah<br>Mohon coba file lain');
                }
            });
            this.on('sending', function(file, xhr, formData){
                filename = Math.random().toString(36).substring(7);
                formData.append('filename',filename);
            });
            this.on('success', function(file,response) {
                filename = response.filename;
                fileserver = response.fileserver;
                filetotal = filetotal+1;
                $('.upload-filetotal-'+foldername).val(filetotal);
                var file_type;
                switch (file.type) {
                    case 'application/pdf':
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case 'application/doc':
                    case 'application/msword':
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                    case 'application/docx':
                    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                    $('.preview-file-'+foldername).html('<a target="_blank" href="'+base_url+'assets/'+foldername+'/'+foldercode+'/temp/'+filename+'.'+file_type+'" class="text-decoration-none">'+
                        '<button type="button" class="btn btn-outline-dark btn-block mt-2 btn-sm">Lihat Preview</button>'+
                    '</a>');
                    break;
                }
                $(file.previewTemplate).append('<button type="button" data-filenameupload="'+fileserver+'" class="btn btn-sm btn-primary btn-image-main btn-block mt-2" style="font-size: 0.75em;">Jadikan Foto Utama</button>');
                $(file.previewTemplate).append('<div data-filenameupload="'+fileserver+'" class="mt-2 status-image-main font-weight-bold d-none" style="font-size: 0.75em;">Foto Utama</div>');
                $(file.previewTemplate).append('<span class="server-name d-none">'+filename+'</span>');
                $(file.previewTemplate).append('<span class="server-file d-none">'+filename+'.'+file_type+'</span>');
                $('.data-file-'+foldername).append('<input type="hidden" class="file-'+filename+'" name="image[]" value="'+fileserver+'">');
                $('.upload-filetotal-'+foldername).addClass('valid');
                $('.upload-filetotal-'+foldername).removeClass('is-invalid');
                main_photo();
            });
            this.on('removedfile', function(file){
                var server_name = $(file.previewTemplate).children('.server-name').text();
                var server_file = $(file.previewTemplate).children('.server-file').text();
                filetotal = filetotal-1;
                $('.upload-filetotal-'+foldername).val(filetotal);
                $('.preview-file-'+foldername).html('');
                $('.upload-filetotal-'+foldername).siblings('.invalid-feedback').html('Minimal 1 foto diunggah');
                $.ajax({
                    url: base_url+'temporary/removefiletemp',
                    type: 'POST',
                    data: {
                        'file': server_file,
                        'type': foldername,
                        'foldercode': foldercode,
                        'id_user': iduser,
                    }
                });
                $('.file-'+server_name).remove();
                if(filetotal == 0)
                {
                    $('.upload-filetotal-'+foldername).addClass('is-invalid');
                    $('.upload-filetotal-'+foldername).removeClass('valid');
                }
            });
            if(fileupload != '')
            {
                var filenameupload;

                for (i = 0; i < fileupload.length; i++) {
                    filenameupload = fileupload[i].substr(0,fileupload[i].lastIndexOf("."));
                    mockFile = {name: fileupload[i], accepted: true};
                    this.emit('addedfile', mockFile);
                    if($("input[name='main_image']").val() == fileupload[i])
                    {
                        var check_main_button = 'd-none';
                        var check_main_status = '';
                    }
                    else
                    {
                        var check_main_button = '';
                        var check_main_status = 'd-none';
                    }
                    $(mockFile.previewTemplate).append('<button type="button" data-filenameupload="'+fileupload[i]+'" class="btn btn-sm btn-primary btn-image-main btn-block '+check_main_button+' mt-2" style="font-size: 0.75em;">Jadikan Foto Utama</button>');
                    $(mockFile.previewTemplate).append('<div data-filenameupload="'+fileupload[i]+'" class="mt-2 status-image-main font-weight-bold '+check_main_status+'" style="font-size: 0.75em;">Foto Utama</div>');
                    $(mockFile.previewTemplate).append('<span class="server-name d-none">'+filenameupload+'</span>');
                    $(mockFile.previewTemplate).append('<span class="server-file d-none">'+fileupload[i]+'</span>');
                    if(accept == 'application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf')
                    {
                        var extension = fileupload[i].substr(fileupload[i].lastIndexOf(".") + 1);
                        if(extension == 'doc' || extension == 'docx')
                        {
                            this.emit('thumbnail', mockFile,base_url+'img/icon/doc.png');
                        }
                        else
                        {
                            this.emit('thumbnail', mockFile,base_url+'img/icon/pdf.png');
                        }
                    }
                    else
                    {
                        this.emit('thumbnail', mockFile,base_url+'assets/'+foldername+'/'+foldercode+'/crop/'+fileupload[i]);
                    }
                    this.emit('complete', mockFile);
                    $(this.element).find('.dz-size').remove();
                    this.files.push(mockFile);
                }
                main_photo();
            }
        },
    });
});


function main_photo()
{
    $(".btn-image-main").click(function(){
        main_choose = $(this).data('filenameupload');
        $(".btn-image-main").removeClass('d-none');
        $(".status-image-main").addClass('d-none');
        $(".status-image-main[data-filenameupload='"+main_choose+"']").removeClass('d-none');
        $(".btn-image-main[data-filenameupload='"+main_choose+"']").addClass('d-none');
        $("input[name='main_image']").val(main_choose);
    });    
}