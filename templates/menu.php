<?php if (!$auth) : ?>

    <form method="post" action="/auth/login/">
        <input type='text' name='login' placeholder='Логин'>
        <input type='password' name='pass' placeholder='Пароль'>
        <input type='submit' name='send' value='Войти'>
        <a href="/profile/">Или зарегистрироваться</a>
    </form>
    <br>
<?php else : ?>
    Добро пожаловать, <?= $user ?> ! <a href="/auth/logout/">Выход</a><br><br>
<?php endif; ?>

<a href="/">Главная</a>
<a href="/catalog/">Каталог</a>
<a href="/feedback/">Отзывы</a>
<a href="/profile/">Личный кабинет</a>
<a href="/basket/">Корзина (<span id="count"><?= $count ?></span>)</a>
<?php if (is_admin()) : ?>
    <a href="/admin/">Заказы</a>
    <a href="/users/">Пользователи</a>
<?php endif; ?>
<br><br><br>