<section class="cart-section container">
    <h1>Корзина</h1>
    <?php if (isset($_SESSION['order_success']) && $_SESSION['order_success']): ?>
        <div class="alert success">✅ Заказ оформлен! Спасибо за покупку.</div>
        <?php unset($_SESSION['order_success']); ?>
    <?php endif; ?>
    <?php if (empty($cartItems)): ?>
        <p>Корзина пуста. <a href="index.php?action=home">Перейти в каталог</a></p>
    <?php else: ?>
        <table class="cart-table">
            <tr><th>Товар</th><th>Цена</th><th>Кол-во</th><th>Сумма</th><th></th></tr>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><?= $item['product']['name'] ?></td>
                    <td><?= number_format($item['product']['price'], 0, '.', ' ') ?> ₽</td>
                    <td>
                        <form action="index.php" method="GET" style="display:inline;">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" value="<?= $item['product']['id'] ?>">
                            <input type="number" name="qty" value="<?= $item['quantity'] ?>" min="1" style="width:60px;">
                            <button type="submit">Обновить</button>
                        </form>
                    </td>
                    <td><?= number_format($item['sum'], 0, '.', ' ') ?> ₽</td>
                    <td><a href="index.php?action=remove&id=<?= $item['product']['id'] ?>" class="remove">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="cart-total">
            <strong>Итого: <?= number_format($total, 0, '.', ' ') ?> ₽</strong>
            <a href="index.php?action=checkout" class="btn-checkout">Оформить заказ</a>
        </div>
    <?php endif; ?>
</section>