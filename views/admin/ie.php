<!--right half page-->
<div class="col-md-2 pull-right">
    <div class="form-group-lg">
        <label class="sr-only" for="year">Год:</label>&nbsp;
        <select  class="form-control" name="year" id="year" style="background-color:#E5E5E5; ">
            <?php foreach ($this->years as $key => $year) { ?>
                <option <?php echo '' . ($year != $this->currYear ? '' : 'selected') ?> value="<?= $year ?>"><?= $year ?></option>
            <?php } ?>
        </select>
    </div>
</div>


<div class="clearfix"></div>


<div class="container">
    <div class="row">        
        <a type="button"  class="btn btn-success"   onclick="viewAddForm()" ><span class="glyphicon glyphicon-plus " style="color:green;"></span> Добавить</a>
        <p></p> 
    </div>
    <div class="row">
        <div class="col-xs-12 col-lg-6" id="newsCol"> 
            <?php if ($this->news) { ?>
                <table id="newsTable"  class="table table-hover table-sm">
                    <tr>
                        <th>Новость</th>
                        <th>Дата публикования</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php foreach ($this->news as $news) : ?>
                        <tr id="<?= $news->getId() ?>">
                            <td><?= $news->getTitle() ?></td>
                            <td><?= $news->getDate() ?></td>
                            <!--<td> <a href="#" onclick="selectAjax(<?= $news->getId() ?>)"><span class="glyphicon glyphicon-edit" style="color:#ff9900;font-size: 20px;"></span>&nbsp;&nbsp;</a></td>-->
                            <td> <a href="#" type="button" class="btn btn-warning btn-sm" onclick="selectAjax(<?= $news->getId() ?>)">Редактировать</a></td>
            <!--                <td><a href="#" onclick="deleteAjax(<?= $news->getId() ?>)"><span class="glyphicon glyphicon-remove" style="color:red;font-size: 20px;"></span>&nbsp;&nbsp;</a></td>                -->
                            <td><a style="margin-left: 10px;"  type="button" class="btn btn-danger btn-sm" onclick="deleteAjax(<?= $news->getId() ?>)">Удалить</a></td>                
                        </tr>
                    <?php endforeach; ?>

                </table>
            <?php } ?>
        </div>
        <!-- /right half page-->

        <!--left half page-->
        <div class="col-sm-6" >

            <form id="form" hidden="true"  method="POST" action="/admin/saveAjax" enctype="multipart/form-data"   >        
                <input type="hidden" id="type" name="type" value="add">
                <input type="hidden" id="id" name="id" value="">

                <div class="form-group">
                    <label for="title" class="text-primary h5">Название</label>        
                    <input name="title" id ="title" type="text" size="100" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="title" class="text-primary h5">Текст</label>
                    <textarea  name="textArea" id='textArea' style="width:100%;height: 200px;"></textarea>
                    <textarea  name="text" id='text' style="display:none;"></textarea>
                </div>

                <div class="form-group">
                    <label for="date" class="text-primary h5">Дата публикации</label>
                    <input required="required"  name="date" id ="date" placeholder=" Выберите дату" class="form-control">
                </div> 
                <div>
                    <label class="text-primary h5">Загруженные файлы</label>
                    <div id='list'></div>
                </div>
                <input class="input-file btn btn-primary btn-file" type="file" id="file" name="file[]" data-title="документ"  accept="image">
                <!--Список файлов загруженных пользователем-->
                <ul class="js_file_list file-list" id='upload-list' >
                </ul>
                <!--<div class="clearfix"></div>-->

                <!-- кнопка для отправки формы-->
                <button type="submit" class="btn btn-primary form-control" id="submitButton" disabled="true">Cохранить</button> 

            </form> 
            <!--
                        <img src="/public/images/loader.gif" style="width: 100%; display: none;" id="img" />-->

        </div>

    </div>
    <div class="clearfix"></div>

    <!--/left half page-->
</div>

<script src="/public/js/ie.js"></script>
<script src="/public/js/datepicker.options.js"></script>
<link href="/public/css/jquery-ui.css" rel="stylesheet">


<style>
    .form-group input,.form-group textarea {
        background-color: #f9f9f9;
    }
    
    .input-file {
        display: block;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
    }

    .file-list {    
        width: 100%;
        list-style: none;
        padding-left: 0;
        margin-bottom: 10px;
    }

    .file-list li {
        float:left;
        position: relative;
        display: block;
        text-align: left;
        padding: 6px 0 8px;
        margin: 5px;

    }

    .file-list li:last-child {
        margin-bottom: 20px;
    }

    .file_remove {
        background: url("/public/images/icon/close.png") no-repeat center;
        cursor: pointer;
        width: 30px;
        height: 30px;
        position: absolute;
        right: 0;
        top: 0;
        z-index: 1;
    }

    .progress-bar {
        position: absolute;
        left: 0;
        bottom: 0;
        z-index: 0;
        background-color: green;
        height: 2px;
        transition: 0.3s ease;
        -ms-transition: 0.3s ease;
    }

</style>

<script>

                                $(document).on('change', '#year', function () {
                                    $.ajax({
                                        url: '/admin/yearchange ',
                                        data: 'year=' + $('#year').val(),
                                        complete: function (data) {
                                            $('#newsCol').html(data.responseText);
                                        }
                                    });
                                });
</script>





<script src="/public/js/test3/jHtmlArea-0.8.js"></script>


<link rel="stylesheet" href="/public/js/test3/jHtmlArea.css">
<script type="text/javascript">    
        $(function() {

//            $("#text").htmlarea(); // Initialize jHtmlArea's with all default values
            

        });
    </script>
    
        <style type="text/css">
        /* body { background: #ccc;} */
        div.jHtmlArea .ToolBar ul li a.custom_disk_button 
        {
            background: url(images/disk.png) no-repeat;
            background-position: 0 0;
        }
        
        div.jHtmlArea { 
            
            width:100%;
            border: solid 1px #ccc; }
    </style>


