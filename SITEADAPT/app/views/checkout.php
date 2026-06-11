<section class="checkout-section container">

    <h1 class="checkout-title">Оформление заказа</h1>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert error checkout-alert">
            Ошибка. Попробуйте ещё раз.
        </div>
    <?php endif; ?>

    <form action="index.php?action=place_order"
          method="POST"
          class="checkout-form">

        <input type="text"
               name="name"
               placeholder="Ваше имя"
               required
               class="checkout-input">

        <input type="email"
               name="email"
               placeholder="Email"
               required
               class="checkout-input">

        <input type="tel"
               name="phone"
               placeholder="Телефон"
               required
               class="checkout-input">

        <textarea name="address"
                  placeholder="Адрес доставки"
                  required
                  class="checkout-textarea"></textarea>

        <button type="submit"
                class="checkout-btn">
            Подтвердить заказ
        </button>

    </form>

</section>