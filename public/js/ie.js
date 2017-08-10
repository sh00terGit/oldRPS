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
    
    $('#form').hide(400);
    $('#'+ id +'').hide();
    $.ajax({
        url: '/admin/deleteAjax',
        cache: false,
        data: 'id='+ id
    });

}

// getting news data via AJAX
function selectAjax(id) {
    document.getElementById('form').hidden = false;
    document.getElementById('form').style.display = 'block';
    document.getElementById("form").reset();
    document.getElementById("list").innerHTML = '';
    document.getElementById("upload-list").innerHTML = '';
    var id = id;
   
    $.ajax({
        url: '/admin/selectAjax',
        dataType: 'json',
        cache: false,
        data: 'id='+ id,
        complete: function(data) {
            var response = jQuery.parseJSON(data.responseText);
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
                $(div).addClass('col-sm-6');

                div.innerHTML = ['<li class="file-list" id=img_'+ image[i].id + '><div class="js_file_remove file_remove" onClick="removeImage(' + image[i].id + ')"></div></li>'].join(''); //добавляем все новые файлы в список на клиенте
                document.getElementById('list').insertBefore(div, null);
                
                var div1 = document.createElement('div');

                div1.innerHTML = ['<img class="thumb" style="width:200px;height:160px;"src="', image[i].path,
                    '" />  '].join('');

                document.getElementById('img_' + image[i].id).appendChild(div1);
            }
            
            
        },
         error: function (error) {
                  alert('error; ' + eval(error));
              }
              
              
    });


}


// getting news data via AJAX
function selectMenuAjax(id) {
    document.getElementById('form').hidden = false;
    document.getElementById('form').style.display = 'block';
    document.getElementById("form").reset();
    document.getElementById("list").innerHTML = '';
    document.getElementById("upload-list").innerHTML = '';
    var id = id;
   
    $.ajax({
        url: '/admin/selectMenuAjax',
        dataType: 'json',
        cache: false,
        data: 'id='+ id,
        complete: function(data) {
            var response = jQuery.parseJSON(data.responseText);
            document.getElementById("title").value = response.title;
            document.getElementById("text").value = response.text;
            document.getElementById("id").value = response.id;
            document.getElementById("date").value = response.date;
            document.getElementById("type").value = 'update';
            document.getElementById("submitButton").disabled = false;
            var image = response.image;
            for (var i = 0; i < image.length; i++) {
                var div = document.createElement('div');
                $(div).addClass('col-sm-6');

                div.innerHTML = ['<li class="file-list" id="img_' + image[i].id + '"><div class="js_file_remove file_remove" onClick="removeMenuImage(' + image[i].id + ')"></div></li>'].join(''); //добавляем все новые файлы в список на клиенте
                document.getElementById('list').insertBefore(div, null);

                var div1 = document.createElement('div');
                div1.innerHTML = ['<img class="thumb" style="width:200px;height:160px;"src="', image[i].path,
                    '" />  '].join('');

                document.getElementById('img_' + image[i].id).appendChild(div1);
            }
            
            
        },
         error: function (error) {
                  alert('error; ' + eval(error));
              }
              
              
    });


}



function removeImage(id) {
    $.ajax({
        url: '/admin/deleteImageAjax',
        cache: false,
        data: 'id='+ id
    });
}



    $(document).on('click', '.js_file_remove', function () {
        var list_item = $(this).closest('li');
        $(list_item).remove();
        console.log('remove');
    });
    
    

function removeMenuImage(id) {
    $.ajax({
        url: '/admin/deleteMenuImageAjax',
        cache: false,
        data: 'id='+ id
    });
}



    $(document).on('click', '.js_file_remove', function () {
        var list_item = $(this).closest('li');
        $(list_item).remove();
        console.log('remove');
    });