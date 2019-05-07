
<div class="blockform">
<form class="regform" action="/reg/login" method="POST">
    <fieldset>
        <legend><h2>Вход</h2></legend>
        <p>Электронная почта</p>
        <input class="inputform" type="text" name="mail" placeholder="Электронная почта" required>
        <p>Пароль</p>
        <input class="inputform" type="password" name="pass" placeholder="Пароль" required>
        <br>
        <input class="totalbtn" type="submit" value="Войти" name="log">
    </fieldset>
</form>
<form class="regform" action="/reg/newuser/" method="POST">
    <fieldset>
        <legend><h2>Новый пользователь</h2></legend>
        <p>Логин </p>
        <input class="inputform" type="text" name="user" placeholder="Логин" required>
        <p>Пароль</p>
        <input class="inputform" type="password" name="passuser" placeholder="Пароль" required>
        <p>Электронная почта</p>
        <input class="inputform" type="email" name="mailuser" placeholder="E-Mail" required>
        <br>
        <input class="totalbtn" type="submit" value="Зарегистрировать" name="reg">
    </fieldset>
</form>
</div>
