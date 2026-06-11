<section class="auth-section container">

    <h2>Вход</h2>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <form action="index.php?action=doLogin" method="POST">
        <input type="email" name="email" class="auth-input" placeholder="Email" required>
        <input type="password" name="password" class="auth-input" placeholder="Пароль" required>
        <button type="submit" class="auth-btn">Войти</button>
    </form>
    <p>Нет аккаунта? <a href="index.php?action=register" class="auth-link">Зарегистрироваться</a></p>
</section>