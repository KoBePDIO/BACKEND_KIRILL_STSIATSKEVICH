<section class="auth-section container">
    <h2>Регистрация</h2>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <form action="index.php?action=doRegister" method="POST">
        <input type="text" name="fullname" class="auth-input" placeholder="Полное имя" required>
        <input type="email" name="email" class="auth-input" placeholder="Email" required>
        <input type="password" name="password" class="auth-input" placeholder="Пароль" required>
        <input type="password" name="confirm_password" class="auth-input" placeholder="Подтвердите пароль" required>
        <button type="submit" class="auth-btn">Зарегистрироваться</button>
    </form>
    <p>Уже есть аккаунт? <a href="index.php?action=login" class="auth-link">Войти</a></p>
</section>