/* 
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */




//function add a comment via AJAX
function commentMe(newsId) {
    url = BASEURL + "news/commentAjax";
    var request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        return;
    }

    var comment = document.getElementById("comment").value;
    var params = 'newsId=' + encodeURIComponent(newsId) + '&text=' + encodeURIComponent(comment);

    request.open('post', url, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(params);

    request.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                document.getElementById("comment").value = "";
                var commentBlock = document.getElementById("commentBlock");
                var div = document.createElement('div');
                div.setAttribute("class", "comment");
                div.innerText = comment;
                commentBlock.insertBefore(div, commentBlock.firstChild);
            }
        }
    }
}


function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '\''
    };

    return text.replace(/[&<>"']/g, function (m) {
        return map[m];
    });
}


// getting visible form
function viewAddForm() {
    var form = document.getElementById('form');
    form.hidden = false;
    form.style.display = 'block';
    form.reset();
    document.getElementById("submitButton").disabled = true;
    document.getElementById("type").value = 'add';
    document.getElementById("list").innerHTML = '';
    document.getElementById("upload-list").innerHTML = '';
    $('#textArea').val($('#text').val()).htmlarea('updateHtmlArea');
}


// delete news via AJAX
function deleteAjax(id) {
    document.getElementById('form').hidden = false;
    document.getElementById('form').style.display = 'none';
    url = BASEURL + "admin/deleteAjax";
    var elem = document.getElementById(id);
    var request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        return;
    }

    request.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                
               $.blockUI({
        message: $('div.growlUI'),
        fadeIn: 700,
        fadeOut: 700,
        timeout: 1000,
        showOverlay: false,
        centerY: false,
        css: {
            width: '100px',
            top: '10px',
            left: '',
            right: '10px',
            border: 'none',
            padding: '5px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .6,
            color: '#fff'
        }
    });
                elem.style.display = 'none';
            }
        } else if (request.status == 404) {
            alert("Ошибка: запрашиваемый скрипт не найден!");
        }
    }
    request.open('GET', url + "?id=" + id, true);
    request.send('');


}

// getting news data via AJAX
function selectAjax(id) {
    document.getElementById('form').hidden = false;
    document.getElementById('form').style.display = 'block';
    document.getElementById("form").reset();
    document.getElementById("list").innerHTML = '';
    document.getElementById("upload-list").innerHTML = '';

    url = BASEURL + "admin/selectAjax";
    var request;

    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        return;
    }

    request.onload = function () {

        if (this.status == 200) {

            response = JSON.parse(this.response);
            document.getElementById("form").style.visibility = 'visible';
            document.getElementById("title").value = response.title;
            document.getElementById("text").value = response.text;
            document.getElementById("id").value = response.id;
            document.getElementById("date").value = response.date;
            document.getElementById("type").value = 'update';
            document.getElementById("submitButton").disabled = false;
            $('#textArea').val($('#text').val()).htmlarea('updateHtmlArea');
            var image = response.image;
            for (var i = 0; i < image.length; i++) {
                var div = document.createElement('div');
                div.classList.add('col-sm-6');

                div.innerHTML = ['<li class="file-list" id="' + image[i].id + '"><div class="js_file_remove file_remove" onClick="removeImage(' + image[i].id + ')"></div></li>'].join(''); //добавляем все новые файлы в список на клиенте
                document.getElementById('list').insertBefore(div, null);

                var div1 = document.createElement('div');

                div1.innerHTML = ['<img class="thumb" style="width:200px;height:160px;"src="', image[i].path,
                    '" />  '].join('');

                document.getElementById(image[i].id).appendChild(div1);


            }


        } else if (this.status == 404) {
            alert("Ошибка: запрашиваемый скрипт не найден!");
        }
    }
    url =  url + "?id=" + id + "&noCache=" + (new Date().getTime());
    request.open('GET', url , true);
    request.setRequestHeader('Content-Type', 'application/json');
    request.send('');
}


function removeImage(id) {
    url = BASEURL + "admin/deleteImageAjax";
    var request;
    $.blockUI({
        message: $('div.growlUI'),
        fadeIn: 700,
        fadeOut: 700,
        timeout: 1000,
        showOverlay: false,
        centerY: false,
        css: {
            width: '100px',
            top: '10px',
            left: '',
            right: '10px',
            border: 'none',
            padding: '5px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .6,
            color: '#fff'
        }
    });
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        return;
    }

    request.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {

            }
        } else if (request.status == 404) {
            alert("Ошибка: запрашиваемый скрипт не найден!");
        }
    }
    request.open('GET', url + "?id=" + id, true);
    request.send('');


}





function submit_function(form) {
    var form = form; //текущая форма

    function formSend(formObject, form) {
        $.ajax({
            type: "POST",
            url: '/admin/saveAjax',
            dataType: 'json',
            contentType: false,
            processData: false,
            data: formObject,
            beforeSend: function () {
                $.blockUI({message: '<h1><img src="/public/images/loader.gif" /> Сохраняю...</h1>'});
            },
            complete: function (data) {
                $.unblockUI();
                $('#form').hide(500);
                $('#newsCol').html(data.responseText);
            }
        });

    }
    

    function formData_assembly(form) {
        var formSendAll = new FormData(), //создаем объект FormData
                form_arr = $(form).find(':input,select,textarea').serializeArray(); //собираем все данные с формы без файлов
 

        for (var i = 0; i < form_arr.length; i++) {
            if (form_arr[i].value.length > 0) { //перебераем массив с данными формы и проверяем на заполненность
               
                    formSendAll.append(form_arr[i].name, form_arr[i].value); //системные поля пересылаем отдельно от общей формы
   
            }
        }
      
        // file
        if ($(form).find('input[type=file]').hasClass('js_file_check')) { //проверяем есть ли input type file для пересылки
            var current_input = $(form).find('input[type=file]');
            if ($(current_input).val().length > 0) { //проверяем на заполненность
                $('.js_file_list li').each(function () {
                    var list_file_name = $(this).find('span').text();
                    for (var k = 0; k < $(current_input)[0].files.length; k++) {
                        if (list_file_name == $(current_input)[0].files[k].name) { //сверяем список выбранных файлов для загрузки
                            formSendAll.append($(current_input).attr('name'), $(current_input)[0].files[k]); // добавляем только те что остались в списке
                        }
                    }
                })
            }
        }
        formSend(formSendAll, form);
    }
    formData_assembly(form);
}
;
//file load
var reader;

function abortRead() {
    reader.abort();
}

function errorHandler(evt) {
    switch (evt.target.error.code) {
        case evt.target.error.NOT_FOUND_ERR:
            alert('File Not Found!');
            break;
        case evt.target.error.NOT_READABLE_ERR:
            alert('File is not readable');
            break;
        case evt.target.error.ABORT_ERR:
            break; // noop
        default:
            alert('An error occurred reading this file.');
    }
    ;
}

function handleFileSelect(evt) {
    document.getElementById("upload-list").innerHTML = '';
    var thisInput = $(this); //input type file для множественных загрузок
    for (var i = 0; i < thisInput[0].files.length; i++) { //перебираем все загруженные файлы и запускаем обработчик для каждого
        reader_file(thisInput[0].files[i]); //добавляем обработчик для каждого файла
    }
}

function reader_file(file) {
    var reader = new FileReader(),
            fileName = file.name;
    reader.onerror = errorHandler; //функция для обработки ошибок
    $('.js_file_list').append('<li id=' + fileName + '><span>' + fileName + '</span><div class="js_file_remove file_remove"></div><div class="progress-bar js_progress_bar"></div></li>'); //добавляем все новые файлы в список на клиенте
    reader.onabort = function (e) {
        alert('File read cancelled');
    };
    reader.onload = function (e) { //событие успешного окончания загрузки
//

        var div = document.createElement('div');

        div.innerHTML = ['<img class="thumb" style="width:auto;height:160px;" src="', e.target.result,
            '" />  '].join('');

        document.getElementById(fileName).appendChild(div);
//        document.getElementById('list').insertBefore(div, null);

    }



    reader.onprogress = function (event) { // вывод процентной полосы загрузки
        if (event.lengthComputable) {
            var percent = parseInt(((event.loaded / event.total) * 100), 10);
            $('.js_progress_bar').css('width', percent + '%');
        }
    }
    reader.readAsDataURL(file);

}

function checkFile() {
    var inputs = document.getElementsByClassName('js_file_check');
    for (var i = 0; i < inputs.length; i++) {
        $(inputs[i]).on('change', handleFileSelect);
    }
}


checkFile();


$('.js_btn_submit').click(function (e) {
    e.preventDefault();
    var current_form = $(this).closest('form');
    submit_function(current_form);
});
$(document).on('click', '.js_file_remove', function () {
    var list_item = $(this).closest('li');
    $(list_item).remove();
});


$(document).on('change', '#file', function () {
    document.getElementById("submitButton").disabled = false;
});
