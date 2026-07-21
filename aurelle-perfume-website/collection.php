<?php
$pageTitle = 'The Collection';
$currentPage = 'collection';
$bodyClass = 'inner-page collection-page';
require __DIR__ . '/includes/header.php';
?>
<section class="inner-hero">
    <div class="container-fluid px-3 px-lg-5">
        <div class="row align-items-end min-vh-75 pb-5">
            <div class="col-lg-8">
                <p class="eyebrow reveal-up">THE AURELLE COLLECTION</p>
                <h1 class="inner-title"><span>Choose the mood</span><br><em>that stays.</em></h1>
            </div>
            <div class="col-lg-3 offset-lg-1"><p class="body-large reveal-up">Six modern extrait de parfums, each composed as a complete atmosphere.</p></div>
        </div>
    </div>
</section>
<section class="collection-grid-section section-space bg-ivory">
    <div class="container-fluid px-3 px-lg-5">
        <div class="collection-filter d-flex flex-wrap gap-2 mb-5" role="group" aria-label="Filter fragrances">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="Floral">Floral</button>
            <button class="filter-btn" data-filter="Woody">Woody</button>
            <button class="filter-btn" data-filter="Fresh">Fresh</button>
            <button class="filter-btn" data-filter="Amber">Amber</button>
        </div>
        <div class="row g-3 g-xl-4" id="productGrid">
            <?php foreach ($products as $index => $product): ?>
                <div class="col-sm-6 col-lg-4 product-filter-item" data-family="<?= htmlspecialchars($product['family']) ?>">
                    <article class="product-card reveal-card" id="<?= htmlspecialchars($product['slug']) ?>" style="--card-accent:<?= htmlspecialchars($product['accent']) ?>">
                        <div class="product-card-media">
                            <span class="product-number"><?= str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                            <button class="card-arrow add-bag" type="button" aria-label="Add <?= htmlspecialchars($product['name']) ?> to bag"><i class="bi bi-plus-lg"></i></button>
                        </div>
                        <div class="product-card-info"><div><p><?= htmlspecialchars(strtoupper($product['family'])) ?></p><h3><?= htmlspecialchars($product['name']) ?></h3></div><strong><?= htmlspecialchars($product['price']) ?></strong></div>
                        <p class="product-card-notes"><?= htmlspecialchars(implode(' · ', $product['notes'])) ?></p>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="consultation-cta section-space text-center">
    <div class="container"><p class="eyebrow">NOT SURE WHERE TO BEGIN?</p><h2 class="display-heading">Meet your fragrance,<br><em>not a trend.</em></h2><a href="contact.php" class="btn-luxury btn-luxury-dark mt-4">Book a consultation</a></div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
