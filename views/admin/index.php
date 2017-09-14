<ul id="nav" class="nav nav-tabs">
    <li><a href="/admin/editNews">Новости</a></li>
    <li><a href="/admin/editMenu">Меню</a></li>
  <li><a href="/stat/">Статистика</a></li>
</ul>
 

<div id="ajax-content">This is default text, which will be replaced</div>

<!--загружаем здесь скрипт датапикера чтобы не было дубликатов после аякса , при дубликатов датапикер не работает-->

<script src="/public/js/jquery-ui.datepicker.js"></script>

<!--загружаем html редактор -->
<script src="/public/js/jhtmlArea/jHtmlArea-0.8.js"></script>
<link rel="stylesheet" href="/public/js/jhtmlArea/jHtmlArea.css">


<script>
$(document).ready(function() {
    $("#nav li a").click(function() {
        $("#nav li").removeClass('active');
        $(this).parent().addClass('active');        
        $.ajax({url: this.href,cache:false,success: function(html) {
            $("#ajax-content").empty().append(html); 
            
            }
    });
    return false;
    });
    
    
     $("#ajax-content").empty().append("<h1>Загрузка ....</h1>");
    $.ajax({ url: '/admin/editNews',cache:false, success: function(html) {
            $('#nav li a[href="/admin/editNews"]').parent().addClass('active');  // start page News add active class to li
            $("#ajax-content").empty().append(html);
            
    }
    });
    
    
   
});</script>