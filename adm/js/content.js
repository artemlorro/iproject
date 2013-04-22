$(document).ready(function() {
	$('.datepicker').glDatePicker({
		zIndex: 100,
		onChange: function(target, newDate) {
			var month = (newDate.getMonth() + 1);
			month = month < 10 ? '0' + month : month;
			target.val(
				newDate.getDate() + "." +
				month + "." +
				newDate.getFullYear()
			);
		}
	});

    $('textarea.editor').ckeditor({
	    toolbar:
	    [
		    ['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
		    ['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
		    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		    ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
		    '/',
		    ['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
		    ['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote','-','NumberedList','BulletedList'],
		    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
		    ['Link','Unlink','Anchor'],
		    ['Image','Flash','Table','Rule','Smiley','SpecialChar','PageBreak']
//		    ['Style','FontFormat','FontName','FontSize'],
//		    ['TextColor','BGColor'],
//		    ['FitWindow','ShowBlocks','-','About']
	    ]
    });

    if ($('#editForm')) $('#editForm').ajaxForm({
        dataType: "json",
        success: function(data) {
            if (data) {
                if (data.type == "error") {
                    showMessage('warning', data.data);
                }
                if (data.type == "ok") {
                    showMessage('success', 'Данные успешно внесены в базу!');
                }
                $("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0}, 1100);
            }
        }
    });
});

function move(url) {
    $.getJSON(url, false, function(data) {
        if (data && data.type == 'ok') {
            window.location.reload();
        }
    });
}

function deleteRow(url) {
    $.getJSON(url, false, function(data) {
        if (data && data.type == 'ok') {
            window.location.reload();
        }
    });
}

function createUploadButton(div_id, url, key)
{
	var uploader = new AjaxUpload(div_id, {
		action: url,
		name: 'uploadfile',
		data: {},
		responseType: "json",
		onChange: function(file, extension) {},
		onSubmit: function(file, extension) {
			if (! (extension && /^(jpg|png|jpeg|gif)$/i.test(extension))){
				ok('Загрузка данного формата файла запрещена!');
				return false;
			}
		},
		onComplete: function(file, response) {
			if (response && response.type == 'ok') {
				addImageBlock(key, response.data.preview);
//				$('#edit_' + key).val(response.data.value);
				checkCountImages(key);
			}
		}
	});
	return uploader;
}

function deleteImage(key, url, ob) {
	if (confirm('Вы уверены, что хотите удалить выбранный файл?')) {
		$.getJSON(url, false, function(data) {
			if (data && data.type == 'ok') {
				$('#edit_' + key).val(data.context);
				$(ob).parent().remove();
				checkCountImages(key);
			}
		});
	}
}

function addImageBlock(key, file) {
    var delUrl = '/admin/content/deleteimage/model/' + MODEL_NAME + '/key/' + key + '/id/' + ROW_ID + '/file/' + file.filename + '/';
    var html = '<div class="image"><img src="' + file.url + '"/><br/><a href="##" onclick="deleteImage(\'' + key + '\', \'' + delUrl + '\', this);">удалить</a></div>';
    $('#' + key + '_images').prepend(html);
}

function checkCountImages(key) {
    var count = parseInt($('#' + key + '_count').val());
    var countImages = parseInt($('#' + key + '_images div.image').length);
    if (count <= countImages) $('#button-images-' + key).hide();
    else $('#button-images-' + key).show();
}

function checkCountFiles(key) {
    var count = parseInt($('#' + key + '_count').val());
    var countImages = parseInt($('#' + key + '_files div.file').length);
    if (count <= countImages) $('#button-files-' + key).hide();
    else $('#button-files-' + key).show();
}

function addFileBlock(key, file) {
    var delUrl = '/admin/content/deletefile/model/' + MODEL_NAME + '/key/' + key + '/id/' + ROW_ID + '/file/' + file.filename + '/';
    var getUrl = '/admin/content/getfile/model/' + MODEL_NAME + '/key/' + key + '/id/' + ROW_ID + '/file/' + file.filename + '/';
    var html = '<div class="file">' + file.name + ' &nbsp;&nbsp;<a href="' + getUrl + '" target="_blank">скачать</a>&nbsp;|&nbsp;<a href="##" onclick="deleteFile(\'' + key + '\', \'' + delUrl + '\', this);">удалить</a></div>';
    $('#' + key + '_files').prepend(html);
}

function deleteFile(key, url, ob) {
    $.getJSON(url, false, function(data) {
        if (data && data.type == 'ok') {
            $('#edit_' + key).val(data.context);
            $(ob).parent().remove();
            checkCountFiles(key);
        }
    });
}

function swfUploaderInit(key, uploadUrl) {
    $('#' + key + '_swfupload-control').swfupload({
        upload_url: uploadUrl,
        file_post_name: 'uploadfile',
        file_size_limit : "8024",
        file_types : "*.jpg;*.png;*.gif",
        file_types_description : "Image files",
        file_upload_limit : 100,
        flash_url : "/js/admin/swfupload/swfupload.swf",
        button_image_url : '/js/admin/swfupload/wdp_buttons_upload_114x29.png',
        button_width : 114,
        button_height : 29,
        button_placeholder : $('#' + key + '_button')[0],
        debug: false
    })
            .bind('fileQueued', function(event, file) {
        var listitem = '<li id="' + file.id + '" >' +
                'Файл: <em>' + file.name + '</em> (' + Math.round(file.size / 1024) + ' KB) <span class="progressvalue" ></span>' +
                '<div class="progressbar" ><div class="progress" ></div></div>' +
                '<p class="status" >Pending</p>' +
                '<span class="cancel" >&nbsp;</span>' +
                '</li>';
        $('#' + key + '_log').append(listitem);
        $('li#' + file.id + ' .cancel').bind('click', function() {
            var swfu = $.swfupload.getInstance('#' + key + '_swfupload-control');
            swfu.cancelUpload(file.id);
            $('li#' + file.id).slideUp('fast');
        });
        // start the upload since it's queued
        $(this).swfupload('startUpload');
    })
            .bind('fileQueueError', function(event, file, errorCode, message) {
        ok('Size of the file ' + file.name + ' is greater than limit');
    })
            .bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued) {
        //$('#queuestatus').text('Файлов выбрано: '+numFilesSelected+' / В очереди: '+numFilesQueued);
    })
            .bind('uploadStart', function(event, file) {
        $('#' + key + '_log li#' + file.id).find('p.status').text('Загрузка...');
        $('#' + key + '_log li#' + file.id).find('span.progressvalue').text('0%');
        $('#' + key + '_log li#' + file.id).find('span.cancel').hide();
    })
            .bind('uploadProgress', function(event, file, bytesLoaded) {
        //Show Progress
        var percentage = Math.round((bytesLoaded / file.size) * 100);
        $('#' + key + '_log li#' + file.id).find('div.progress').css('width', percentage + '%');
        $('#' + key + '_log li#' + file.id).find('span.progressvalue').text(percentage + '%');
    })
            .bind('uploadSuccess', function(event, file, serverData) {
        var item = $('#' + key + '_log li#' + file.id);
        item.find('div.progress').css('width', '100%');
        item.find('span.progressvalue').text('100%');
        if (serverData) {
//			console.log(serverData);
            serverData = eval("(" + serverData + ")");
            if (serverData.type == 'ok') {
                item.addClass('success').find('p.status').html('Файл загружен!');
                addImageBlock(key, serverData.message.preview);
                $('#edit_' + key).val(serverData.message.value);
                $(item).fadeOut(3000);
                checkCountImages(key);
            }
            if (serverData.type == 'error') {
                item.addClass('success').find('p.status').html(serverData.message);
            }
        }
        //var pathtofile='<a href="uploads/'+file.name+'" target="_blank" >view &raquo;</a>';
    })
            .bind('uploadComplete', function(event, file) {
        // upload has completed, try the next one in the queue
        $(this).swfupload('startUpload');
    })
    checkCountImages(key);
}

function swfFileUploaderInit(key, uploadUrl) {
    $('#' + key + '_swfupload-control').swfupload({
        upload_url: uploadUrl,
        file_post_name: 'uploadfile',
        file_size_limit : "40240",
        file_types : "*.jpg;*.png;*.gif;*.pdf;*.doc;*.txt;*.xls;*.csv;*.rar;*.zip;*.docx;*.xlsx",
        file_types_description : "Files",
        file_upload_limit : 100,
        flash_url : "/js/admin/swfupload/swfupload.swf",
        button_image_url : '/js/admin/swfupload/wdp_buttons_upload_114x29.png',
        button_width : 114,
        button_height : 29,
        button_placeholder : $('#' + key + '_button')[0],
        debug: false
    })
            .bind('fileQueued', function(event, file) {
        var listitem = '<li id="' + file.id + '" >' +
                'Файл: <em>' + file.name + '</em> (' + Math.round(file.size / 1024) + ' KB) <span class="progressvalue" ></span>' +
                '<div class="progressbar" ><div class="progress" ></div></div>' +
                '<p class="status" >Pending</p>' +
                '<span class="cancel" >&nbsp;</span>' +
                '</li>';
        $('#' + key + '_log').append(listitem);
        $('li#' + file.id + ' .cancel').bind('click', function() {
            var swfu = $.swfupload.getInstance('#' + key + '_swfupload-control');
            swfu.cancelUpload(file.id);
            $('li#' + file.id).slideUp('fast');
        });
        // start the upload since it's queued
        $(this).swfupload('startUpload');
    })
            .bind('fileQueueError', function(event, file, errorCode, message) {
        ok('Size of the file ' + file.name + ' is greater than limit');
    })
            .bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued) {
        //$('#queuestatus').text('Файлов выбрано: '+numFilesSelected+' / В очереди: '+numFilesQueued);
    })
            .bind('uploadStart', function(event, file) {
        $('#' + key + '_log li#' + file.id).find('p.status').text('Загрузка...');
        $('#' + key + '_log li#' + file.id).find('span.progressvalue').text('0%');
        $('#' + key + '_log li#' + file.id).find('span.cancel').hide();
    })
            .bind('uploadProgress', function(event, file, bytesLoaded) {
        //Show Progress
        var percentage = Math.round((bytesLoaded / file.size) * 100);
        $('#' + key + '_log li#' + file.id).find('div.progress').css('width', percentage + '%');
        $('#' + key + '_log li#' + file.id).find('span.progressvalue').text(percentage + '%');
    })
            .bind('uploadSuccess', function(event, file, serverData) {
        var item = $('#' + key + '_log li#' + file.id);
        item.find('div.progress').css('width', '100%');
        item.find('span.progressvalue').text('100%');
        if (serverData) {
//			console.log(serverData);
            serverData = eval("(" + serverData + ")");
            if (serverData.type == 'ok') {
                item.addClass('success').find('p.status').html('Файл загружен!');
                addFileBlock(key, serverData.message.file);
                $('#edit_' + key).val(serverData.message.value);
                $(item).fadeOut(3000);
                checkCountFiles(key);
            }
            if (serverData.type == 'error') {
                item.addClass('success').find('p.status').html(serverData.message);
            }
        }
        //var pathtofile='<a href="uploads/'+file.name+'" target="_blank" >view &raquo;</a>';
    })
            .bind('uploadComplete', function(event, file) {
        // upload has completed, try the next one in the queue
        $(this).swfupload('startUpload');
    })
    checkCountFiles(key);
}

// info notice success warning
function showMessage(type, message) {
	var html = '<p class="message ' +
		(type == 'success' ? 'green-gradient' : 'red-gradient') +
		'">' +
		'<a href="#" title="Закрыть сообщение" class="close">✕</a>' +
		'<span class="block-arrow"><span></span></span>' +
		message +
		'</p>';
	$('#editForm').prepend(html);
}

function deleteRowAndMove(urldelete, urlmove) {
	$.getJSON(urldelete, false, function(data) {
		if (data && data.type == 'ok') {
			window.location.href = urlmove;
		}
	});
}