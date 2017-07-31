<div class="col-lg-offset-4 col-lg-4">
<div id="loginForm"  class="main"  style="display:block; text-align: center;">
    <h4 class="form-signin-heading">Вход в администраторскую панель</h4>
    <form role="form" method="POST">
        <div class="field">
            <label for="login">Пользователь</label>
            <input  type="text" name="login" id="login" required autofocus />
        </div>
        <div class="field">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" />
        </div>
        <div class="sub">
             <input type="submit" name="submit" value="Войти"  class="btn btn-primary"/>
        </div>

    </form>
</div>
</div>


<style>
.field {clear:both; text-align:right;}
label { padding-left: 20px;}
.sub { padding:20px 0 10px 0}
input {background-color: #e8e6e6}
</style>
