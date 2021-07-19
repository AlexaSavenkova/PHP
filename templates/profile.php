<?php if (!$auth) : ?>
    <form method="post" action="/profile/signup/"><br><br>
        <p>Создать нового пользователя</p>
        <input type='text' name='login' placeholder='Логин'><br><br>
        <input type='password' name='pass' placeholder='Пароль'><br><br>
        <input type='password' name='pass_repeat' placeholder='Повторите пароль'><br><br>
        <input type='submit' name='send' value='Создать'>
    </form>
    <p><?= $message ?> </p>
<?php else : ?>
    <h2>Личный кабинет</h2>
    <p>Пользователь: <?= $user ?></p>
    Здесь будет информация о заказах и данные пользователя

<?php endif; ?>