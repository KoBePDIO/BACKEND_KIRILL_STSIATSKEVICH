
<!-- ГАЛЕРЕЯ (необязательно, но оставим) -->
<section class="simple-gallery container">
    <div class="simple-grid">
        <div class="square-card"><img src="public/image/bank/1.png"></div>
        <div class="square-card"><img src="public/image/bank/2.png"></div>
        <div class="square-card"><img src="public/image/bank/3.png"></div>
        <div class="square-card"><img src="public/image/bank/4.png"></div>
        <div class="square-card"><img src="public/image/bank/5.png"></div>
        <div class="square-card"><img src="public/image/bank/6.png"></div>
        <div class="square-card"><img src="public/image/bank/7.png"></div>
    </div>
</section>

<!-- HERO БАННЕР (статика) -->
<section class="hero-section container">
    <div class="hero-content">
        <div class="price-block"><span class="current-price">250 ₽/шт</span></div>
        <h1>Корнишоны<br>«Кубаночка»</h1>
        <span class="subtitle">(1-3 см) 680 г. 1/8</span>
        <p>Корнишоны "Кубаночка" настоящая находка. Огурчики упругие, довольно плотные, очень хрустящие. Рассол в меру пряный с низким содержанием уксуса. Отлично влияют на пищеварение, повышают аппетит. Среди составляющих огурцов есть калий, который необходим для нормальной работоспособности мышц сердца и почек.</p>
        <div class="hero-actions">
               <a href="index.php?action=cart"
           class="cart-link catalog-cart-link">
            Корзина (<?= array_sum($_SESSION['cart'] ?? []) ?>)
        </a>
            <a href="#" class="btn-outline">Подробнее</a>
        </div>
    </div>
    <div class="hero-image-slider">
        <div class="circle-showcase"><img src="public/image/cornish.png" alt="Корнишоны" class="main-product-img"></div>
        <div class="side-icons"><div class="icon-circle"><i class="fa-solid fa-shopping-bag"></i><span class="badge">2</span></div><div class="icon-circle"><i class="fa-regular fa-file-alt"></i></div><div class="icon-circle"><i class="fa-regular fa-user"></i></div></div>
    </div>
</section>


<section class="popular-categories catalog-section container">

    <div class="section-header catalog-header">
        <h2 class="catalog-title">Каталог продукции</h2>
    </div>

    <div class="filters catalog-filters">

        <form method="GET" action="index.php" class="sort-form filter-form-box">
            <input type="hidden" name="action" value="home">
            <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">

            <label class="filter-label">Сортировка:</label>

            <select name="sort"
                    class="filter-select catalog-select"
                    onchange="this.form.submit()">
                <option value="id_asc" <?= $sort == 'id_asc' ? 'selected' : '' ?>>По умолчанию</option>
                <option value="price_asc" <?= $sort == 'price_asc' ? 'selected' : '' ?>>Цена ↑</option>
                <option value="price_desc" <?= $sort == 'price_desc' ? 'selected' : '' ?>>Цена ↓</option>
                <option value="name_asc" <?= $sort == 'name_asc' ? 'selected' : '' ?>>Название А-Я</option>
            </select>
        </form>

        <form method="GET" action="index.php" class="filter-form filter-form-box">
            <input type="hidden" name="action" value="home">
            <input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>">
            <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">

            <label class="filter-label">Категория:</label>

            <select name="category"
                    class="filter-select catalog-select"
                    onchange="this.form.submit()">
                <option value="">Все</option>

                <?php foreach ($categories as $cat): ?>
                    <option value="<?= htmlspecialchars($cat) ?>"
                            <?= $category == $cat ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>

        <form method="GET" action="index.php" class="search-form filter-form-box">

            <input type="hidden" name="action" value="home">
            <input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>">
            <input type="hidden" name="category" value="<?= htmlspecialchars($category) ?>">

            <input type="text"
                   name="search"
                   class="search-input catalog-search-input"
                   placeholder="Поиск по названию..."
                   value="<?= htmlspecialchars($search) ?>">

            <button type="submit"
                    class="search-btn catalog-search-btn">
                <i class="fa-solid fa-search"></i>
            </button>
        </form>

        <a href="index.php?action=cart"
           class="cart-link catalog-cart-link">
            Корзина (<?= array_sum($_SESSION['cart'] ?? []) ?>)
        </a>

    </div>

    <div class="category-grid catalog-grid">

        <?php if (empty($products)): ?>

            <p class="empty-products catalog-empty">
                Товары не найдены.
            </p>

        <?php else: ?>

            <?php foreach ($products as $product): ?>
            
                <div class="category-card product-card">

                    <img src="public/image/<?= $product['image'] ?>"
                         alt="<?= htmlspecialchars($product['name']) ?>"
                         class="product-image product-card-image">

                    <div class="product-card-body">

                        <h3 class="product-title product-card-title">
                            <?= htmlspecialchars($product['name']) ?>
                        </h3>

                        <p class="price product-card-price">
                            <?= number_format($product['price'], 0, '.', ' ') ?> ₽
                        </p>

                        <p class="desc product-card-desc">
                            <?= mb_substr($product['description'], 0, 80) ?>...
                        </p>

                        <a href="index.php?action=add&id=<?= $product['id'] ?>"
                           class="btn-cart product-card-btn">
                            В корзину
                        </a>

                    </div>

                </div>
                    
            <?php endforeach; ?>

        <?php endif; ?>

    </div>

    <?php if ($totalPages > 1): ?>

        <div class="pagination catalog-pagination">

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                <a href="?action=home&page=<?= $i ?>&sort=<?= urlencode($sort) ?>&category=<?= urlencode($category) ?>&search=<?= urlencode($search) ?>"
                   class="pagination-link <?= $i == $page ? 'active' : '' ?>">
                    <?= $i ?>
                </a>

            <?php endfor; ?>

        </div>

    <?php endif; ?>

</section>
<!-- АКЦИОННЫЕ ТОВАРЫ (статичный блок) -->
<section class="promo-items container">
    <div class="section-header"><h2>Акционные товары</h2><a href="#" class="view-all">Смотреть все</a></div>
    <div class="promo-content">
        <div class="promo-text">
            <h3>Малина свежемороженая</h3>
            <p>Малина - очень вкусная и ароматная ягода. Она обладает жаропонижающим и противовоспалительным эффектом, богата железом, медью и витаминами А, Е, РР, В2. На производстве используется технология шоковой заморозки, что позволяет сохранить вкус, аромат и пользу свежих ягод. В свежем виде эта ягода - настоящее лакомство. Кроме того с ней можно готовить различные десерты и пироги.</p>
            <div class="promo-pricing"><span class="current-price">250 ₽/кг</span><span class="old-price">350 ₽/кг</span></div>
           
            <div class="slider-controls"><button class="arrow-btn"><i class="fa-solid fa-arrow-left"></i></button><div class="dots"><span class="dot active"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span></div><button class="arrow-btn green"><i class="fa-solid fa-arrow-right"></i></button></div>
        </div>
        <div class="promo-image"><img src="public/image/malina.jpg" alt="Малина"></div>
    </div>
</section>

<!-- О КОМПАНИИ -->
<section class="about-section container">
    <div class="about-flex">
        <div class="about-text"><h2>О компании</h2><p>Ясность нашей позиции очевидна: укрепление и развитие внутренней структуры обеспечивает широкому кругу (специалистов) участие в формировании модели развития. Экономическая повестка сегодняшнего дня прекрасно подходит для реализации экономической целесообразности принимаемых решений. Как принято считать, предприниматели в сети интернет формируют глобальную экономическую сеть и при этом - разоблачены!</p></div>
        <div class="about-features"><div class="feature-card"><i class="fa-solid fa-tags"></i><span>Оптовые цены</span></div><div class="feature-card"><i class="fa-solid fa-truck"></i><span>Доставка по городу<br>и краю</span></div><div class="feature-card"><i class="fa-regular fa-gem"></i><span>15 лет на рынке</span></div></div>
    </div>
</section>

<!-- НОВОСТИ (из БД) -->
<section class="news-section container">
    <div class="section-header"><h2>Новости</h2><a href="#" class="view-all">Все новости</a></div>
    <div class="news-grid">
        <?php foreach ($news as $item): ?>
            <div class="news-card">
                <img src="public/image/<?= $item['image'] ?>" alt="<?= $item['title'] ?>" onerror="console.log('Ошибка загрузки: public/image/<?= $item['image'] ?>')">
                <div class="news-date"><?= date('d.m.Y', strtotime($item['created_at'])) ?></div>
                <h4><?= $item['title'] ?></h4>
            </div>
        <?php endforeach; ?>
    </div>
</section>