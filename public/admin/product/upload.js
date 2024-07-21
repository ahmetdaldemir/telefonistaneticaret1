$(document).ready(function() {

    // enable fileuploader plugin
    $('input[name="files"]').fileuploader({
        changeInput: '<div class="fileuploader-input">' +
            '<div class="fileuploader-input-inner">' +
            '<div class="fileuploader-icon-main"></div>' +
            '<h3 class="fileuploader-input-caption"><span>${captions.feedback}</span></h3>' +
            '<p>${captions.or}</p>' +
            '<button type="button" class="fileuploader-input-button"><span>${captions.button}</span></button>' +
            '</div>' +
            '</div>',
        theme: 'dragdrop',
        upload: {
            url: '',
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            start: true,
            synchron: true,
            beforeSend: function(item, listEl, parentEl, newInputEl, inputEl) {
                item.upload.url = inputEl.attr('data-upload-url');
                item.upload.data._token = inputEl.attr('data-upload-token');
            },
            onSuccess: function(result, item) {
                var data = {};

                try {
                    data = JSON.parse(result);
                } catch (e) {
                    data.hasWarnings = true;
                }

                // if success
                if (data.isSuccess && data.files[0]) {
                    item.name = data.files[0].name;
                    item.html.find('.column-title > div:first-child').text(data.files[0].name).attr('title', data.files[0].name);
                    item.html.find('.column-actions > .fileuploader-action-selected').attr('data-title', data.files[0].name);
                }

                // if warnings
                if (data.hasWarnings) {
                    for (var warning in data.warnings) {
                        alert(data.warnings[warning]);
                    }

                    item.html.removeClass('upload-successful').addClass('upload-failed');
                    // go out from success function by calling onError function
                    // in this case we have a animation there
                    // you can also response in PHP with 404
                    return this.onError ? this.onError(item) : null;
                }

                item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');
                setTimeout(function() {
                    item.html.find('.progress-bar2').fadeOut(400);
                }, 400);
            },
            onError: function(item) {
                var progressBar = item.html.find('.progress-bar2');

                if(progressBar.length) {
                    progressBar.find('span').html(0 + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(0 + "%");
                    item.html.find('.progress-bar2').fadeOut(400);
                }

                item.upload.status != 'cancelled' && item.html.find('.fileuploader-action-retry').length == 0 ? item.html.find('.column-actions').prepend(
                    '<button type="button" class="fileuploader-action fileuploader-action-retry" title="Retry"><i class="fileuploader-icon-retry"></i></button>'
                ) : null;
            },
            onProgress: function(data, item) {
                var progressBar = item.html.find('.progress-bar2');

                if(progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('span').html(data.percentage + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
            },
            afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                console.log(listEl);
            },
            listInput: function(item, listEl, parentEl, newInputEl, inputEl) {
                console.log(item);
            },
            onComplete: null,
        },
        onRemove: function(item, listEl, parentEl, newInputEl, inputEl) {
            $.post('ajax_remove_file', {
                _token: inputEl.attr('data-upload-token'),
                file: item.name,
            });
        },
        onSelected: function(item, listEl, parentEl, newInputEl, inputEl) {
            console.log(item);
        },
        onListInput: function(item, listEl, parentEl, newInputEl, inputEl) {
            var Id  = localStorage.getItem('setImageDataId');
            if (item.length > 0)
            {
                const jsonString = JSON.stringify(items);
                localStorage.setItem(Id,jsonString);
                $('body').find('input#'+Id).val(jsonString);

            }
        },
        captions: $.extend(true, {}, $.fn.fileuploader.languages['tr'], {
            feedback: 'Görsellerinizi yüklemek için seçin veya sürükleyip bırakın',
            feedback2: 'Görsel formatının PNG, JPG veya JPEG ve boyutunun minimum 860x574 olması gerekir.',
            drop: 'Buraya Sürükleyiniz',
            or: 'veya',
            button: 'Dosya Seçiniz',
        }),
    });

    
    $('body').on('click','.fileuploader-action-selected',function (e) {
        var title = $(this).data('title');
        var Id  = localStorage.getItem('setImageDataId');
        $('body').find('#'+Id).html('<img src="/storage/product/'+title+'">');
        $('#uploadModal').modal('hide');
    })
});