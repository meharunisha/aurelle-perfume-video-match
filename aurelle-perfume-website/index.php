<?php
$pageTitle = 'Organic Luxury Fragrance';
$currentPage = 'home';
$bodyClass = 'home-page premium-reference-home';
require __DIR__ . '/includes/header.php';

$heroSlides = [
    [
        'eyebrow' => '100% organic · cruelty free',
        'title' => "Nature's Organic\nFragrance",
        'description' => "Created with pure botanical extracts, our fragrances bring nature's most beautiful notes closer to your skin.",
        'product' => 'Ruby Passion',
        'family' => 'Rose · raspberry · amber',
        'image' => 'assets/images/bottle-rose.svg',
        'theme' => '#d10035',
        'themeDark' => '#7e001c',
        'themeSoft' => '#ff5877',
        'scene' => 'scene-ruby',
    ],
    [
        'eyebrow' => 'warm woods · slow luxury',
        'title' => "Earthy Notes,\nQuiet Confidence",
        'description' => 'Sandalwood, tobacco leaf and soft amber create a deep fragrance with a calm, elegant trail.',
        'product' => 'Santal Eclipse',
        'family' => 'Santal · cacao · suede',
        'image' => 'assets/images/bottle-amber.svg',
        'theme' => '#81502f',
        'themeDark' => '#3a2114',
        'themeSoft' => '#d49967',
        'scene' => 'scene-amber',
    ],
    [
        'eyebrow' => 'lavender bloom · modern musk',
        'title' => "Blue Bloom,\nSoftly Electric",
        'description' => 'Lavender, iris and mineral musk meet in a luminous composition made for vivid, modern days.',
        'product' => 'Blue Wave',
        'family' => 'Lavender · iris · clean musk',
        'image' => 'assets/images/bottle-iris.svg',
        'theme' => '#6658ff',
        'themeDark' => '#2f2789',
        'themeSoft' => '#aaa2ff',
        'scene' => 'scene-violet',
    ],
];

$bestsellers = [
    ['name' => 'Ruby Passion', 'family' => 'Velvet floral', 'price' => '$72.00', 'image' => 'assets/images/bottle-rose.svg', 'tone' => 'ruby'],
    ['name' => 'Santal Eclipse', 'family' => 'Amber woods', 'price' => '$84.00', 'image' => 'assets/images/bottle-amber.svg', 'tone' => 'amber'],
    ['name' => 'Blue Wave', 'family' => 'Aromatic floral', 'price' => '$64.00', 'image' => 'assets/images/bottle-iris.svg', 'tone' => 'violet'],
    ['name' => 'Cedar Rain', 'family' => 'Green woods', 'price' => '$78.00', 'image' => 'assets/images/bottle-green.svg', 'tone' => 'green'],
];

$moods = [
    ['title' => 'The Romantic', 'copy' => 'Rose petals, pear and warm skin musk.', 'image' => 'assets/images/bottle-rose.svg', 'class' => 'mood-romantic'],
    ['title' => 'The Dreamer', 'copy' => 'Iris, lavender and weightless white woods.', 'image' => 'assets/images/bottle-iris.svg', 'class' => 'mood-dreamer'],
    ['title' => 'The Nocturnal', 'copy' => 'Saffron, amber and smoked vanilla.', 'image' => 'assets/images/bottle-noir.svg', 'class' => 'mood-night'],
    ['title' => 'The Explorer', 'copy' => 'Sea salt, green fig and mineral cedar.', 'image' => 'assets/images/bottle-azure.svg', 'class' => 'mood-explorer'],
    ['title' => 'The Grounded', 'copy' => 'Juniper, vetiver and clean forest air.', 'image' => 'assets/images/bottle-green.svg', 'class' => 'mood-grounded'],
];
?>

<section class="video-match-hero" id="home" aria-label="Featured perfumes">
    <div class="hero-noise-layer" aria-hidden="true"></div>
    <div class="hero-big-orb" aria-hidden="true"></div>
    <div class="hero-floating-social" aria-label="Social links">
        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
        <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
    </div>

    <div class="container-fluid hero-shell px-3 px-md-4 px-xl-5">
        <div class="row align-items-center min-vh-100 gy-5">
            <div class="col-lg-6 col-xl-5 hero-copy-column">
                <div class="hero-copy-stack">
                    <?php foreach ($heroSlides as $index => $slide): ?>
                        <article class="hero-copy-panel <?= $index === 0 ? 'is-active' : '' ?>" data-hero-copy="<?= $index ?>">
                            <span class="hero-eyebrow"><?= htmlspecialchars($slide['eyebrow']) ?></span>
                            <h1>
                                <?php foreach (explode("\n", $slide['title']) as $line): ?>
                                    <span class="hero-line"><span><?= htmlspecialchars($line) ?></span></span>
                                <?php endforeach; ?>
                            </h1>
                            <p><?= htmlspecialchars($slide['description']) ?></p>
                            <div class="hero-actions d-flex flex-wrap gap-3">
                                <a href="collection.php" class="video-pill video-pill-light">Shop now</a>
                                <a href="story.php" class="video-pill video-pill-outline">Learn more</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <div class="hero-bottom-controls">
                    <button type="button" class="round-control" data-hero-prev aria-label="Previous perfume"><i class="bi bi-arrow-left"></i></button>
                    <div class="hero-count"><strong id="heroCurrent">01</strong><span>/</span><span>03</span></div>
                    <button type="button" class="round-control" data-hero-next aria-label="Next perfume"><i class="bi bi-arrow-right"></i></button>
                    <span class="hero-drag-label">Drag to discover</span>
                </div>
            </div>

            <div class="col-lg-6 col-xl-7 hero-product-column">
                <div class="hero-product-stage" data-hero-parallax>
                    <?php foreach ($heroSlides as $index => $slide): ?>
                        <div class="hero-product-scene <?= $index === 0 ? 'is-active' : '' ?> <?= htmlspecialchars($slide['scene']) ?>" data-hero-art="<?= $index ?>">
                            <div class="scene-glow"></div>
                            <div class="scene-arch"></div>
                            <div class="scene-pedestal"></div>
                            <span class="botanical botanical-a"></span>
                            <span class="botanical botanical-b"></span>
                            <span class="botanical botanical-c"></span>
                            <span class="botanical botanical-d"></span>
                            <span class="sparkle sparkle-a">✦</span>
                            <span class="sparkle sparkle-b">✦</span>
                            <img class="hero-main-bottle" src="<?= htmlspecialchars($slide['image']) ?>" alt="<?= htmlspecialchars($slide['product']) ?> perfume bottle">
                            <div class="hero-product-label">
                                <small><?= htmlspecialchars($slide['family']) ?></small>
                                <strong><?= htmlspecialchars($slide['product']) ?></strong>
                                <span>50 ml · extrait de parfum</span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="hero-product-selector" aria-label="Choose perfume">
                        <?php foreach ($heroSlides as $index => $slide): ?>
                            <button class="mini-bottle <?= $index === 0 ? 'is-active' : '' ?>" data-hero-index="<?= $index ?>" type="button" aria-label="Show <?= htmlspecialchars($slide['product']) ?>">
                                <img src="<?= htmlspecialchars($slide['image']) ?>" alt="">
                                <span><?= str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offer-ticker" aria-hidden="true">
        <div class="offer-ticker-track">
            <span>20% off your first order — code FRUITIVO20</span><i></i>
            <span>100% organic & cruelty-free</span><i></i>
            <span>New lavender blossom is here</span><i></i>
            <span>Hand-blended in small batches</span><i></i>
            <span>Free shipping on orders over $100</span><i></i>
            <span>20% off your first order — code FRUITIVO20</span><i></i>
        </div>
    </div>
</section>

<section class="bestseller-section section-video-space" id="bestsellers">
    <div class="container-fluid px-3 px-md-4 px-xl-5">
        <div class="section-title-row text-center">
            <span>Our icons</span>
            <h2>Our Bestsellers</h2>
            <p>Four signatures loved for their character, balance and lasting impression.</p>
        </div>

        <div class="row g-3 g-xl-4 bestseller-grid">
            <?php foreach ($bestsellers as $index => $product): ?>
                <div class="col-6 col-lg-3">
                    <article class="bestseller-card reveal-video" data-card-tone="<?= htmlspecialchars($product['tone']) ?>">
                        <div class="bestseller-bottle-wrap">
                            <span class="product-halo"></span>
                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?> perfume bottle">
                        </div>
                        <div class="bestseller-card-body">
                            <span><?= htmlspecialchars($product['family']) ?></span>
                            <h3><?= htmlspecialchars($product['name']) ?></h3>
                            <strong><?= htmlspecialchars($product['price']) ?></strong>
                            <button class="buy-now-button add-bag" type="button">Buy now</button>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <svg class="section-wave section-wave-light" viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true"><path d="M0 58C178 18 292 104 494 72c223-36 311-77 519-39 173 31 265 72 427 45v42H0Z"/></svg>
</section>

<section class="discovery-video-section section-video-space" id="discovery">
    <div class="container-fluid px-3 px-md-4 px-xl-5">
        <div class="section-title-row text-center section-title-dark">
            <span>Stories & rituals</span>
            <h2>Offers Worth Discovering</h2>
        </div>

        <div class="video-collage mt-5">
            <article class="collage-card collage-tall collage-red reveal-video">
                <div class="fashion-silhouette silhouette-one" aria-hidden="true"><span></span></div>
                <div class="collage-caption"><strong>20% Off First Order</strong><span>Code FRUITIVO20</span></div>
            </article>
            <article class="collage-card collage-wide collage-sky reveal-video">
                <div class="collage-copy"><small>BLUE WAVE</small><h3>A fresh perspective.</h3><p>Lavender, iris and the cool clarity of morning air.</p></div>
                <img src="assets/images/bottle-iris.svg" alt="Blue Wave fragrance">
            </article>
            <article class="collage-card collage-small collage-charcoal reveal-video">
                <div class="fashion-silhouette silhouette-two" aria-hidden="true"><span></span></div>
                <div class="collage-caption"><strong>After Dark</strong><span>Amber stories</span></div>
            </article>
            <article class="collage-card collage-small collage-sand reveal-video">
                <div class="fashion-silhouette silhouette-three" aria-hidden="true"><span></span></div>
                <img src="assets/images/bottle-amber.svg" alt="Santal Eclipse fragrance">
            </article>
            <article class="collage-card collage-wide collage-black reveal-video">
                <div class="collage-copy light"><small>RUBY PASSION</small><h3>Bold enough to remember.</h3><p>Rose, raspberry and velvet woods.</p></div>
                <img src="assets/images/bottle-rose.svg" alt="Ruby Passion fragrance">
            </article>
            <article class="collage-card collage-wide collage-violet reveal-video">
                <div class="collage-copy light"><small>THE NIGHT EDIT</small><h3>Fragrance after sunset.</h3></div>
                <div class="fashion-silhouette silhouette-four" aria-hidden="true"><span></span></div>
            </article>
            <article class="collage-card collage-small collage-coral reveal-video">
                <div class="fashion-silhouette silhouette-five" aria-hidden="true"><span></span></div>
                <img src="assets/images/bottle-rose.svg" alt="Ruby Passion fragrance">
            </article>
        </div>
    </div>
</section>

<section class="mood-video-section section-video-space" id="moods">
    <div class="mood-video-glow" aria-hidden="true"></div>
    <div class="container-fluid px-3 px-md-4 px-xl-5 position-relative">
        <div class="section-title-row text-center text-white">
            <span>Choose the atmosphere</span>
            <h2>Find Your Fragrance Mood</h2>
            <p>Drag through the collection and meet the scent that feels most like you.</p>
        </div>

        <div class="mood-video-track mt-5" data-drag-scroll>
            <?php foreach ($moods as $index => $mood): ?>
                <article class="mood-video-card <?= htmlspecialchars($mood['class']) ?>">
                    <span class="mood-number">0<?= $index + 1 ?></span>
                    <div class="mood-image-stage">
                        <div class="mood-face" aria-hidden="true"><span></span></div>
                        <img src="<?= htmlspecialchars($mood['image']) ?>" alt="<?= htmlspecialchars($mood['title']) ?> perfume">
                    </div>
                    <div class="mood-card-copy">
                        <h3><?= htmlspecialchars($mood['title']) ?></h3>
                        <p><?= htmlspecialchars($mood['copy']) ?></p>
                        <a href="collection.php">Explore mood <i class="bi bi-arrow-up-right"></i></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="story-video-section section-video-space">
    <div class="container-fluid px-3 px-md-4 px-xl-5">
        <div class="row align-items-center g-5 story-video-row">
            <div class="col-lg-6 order-2 order-lg-1">
                <span class="story-kicker">Consciously composed</span>
                <h2 class="story-video-title">Beautiful perfume.<br><em>Better choices.</em></h2>
                <p class="story-video-copy">We blend expressive naturals with modern perfumery to create memorable fragrances without unnecessary excess. Each bottle is made in small batches and wrapped with care.</p>
                <div class="story-stat-grid">
                    <div><strong>92%</strong><span>Naturally derived</span></div>
                    <div><strong>0%</strong><span>Animal testing</span></div>
                    <div><strong>50 ml</strong><span>Made to last</span></div>
                </div>
                <a href="story.php" class="video-pill video-pill-dark mt-4">Meet our atelier</a>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="story-image-composition reveal-video">
                    <div class="story-arch"></div>
                    <div class="story-profile" aria-hidden="true"><span></span></div>
                    <img src="assets/images/bottle-rose.svg" alt="Aurelle perfume bottle">
                    <span class="story-flower flower-one"></span>
                    <span class="story-flower flower-two"></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-video-section section-video-space">
    <div class="container-fluid px-3 px-md-4 px-xl-5">
        <div class="section-title-row text-center text-white">
            <span>Real scent stories</span>
            <h2>What Our Customers Say</h2>
        </div>

        <div class="row g-3 g-xl-4 mt-5">
            <?php
            $testimonials = [
                ['name' => 'Mira K.', 'city' => 'Chennai', 'quote' => 'Ruby Passion is rich, polished and surprisingly wearable. I receive compliments every time.', 'tone' => 't-red'],
                ['name' => 'Ananya R.', 'city' => 'Bengaluru', 'quote' => 'Blue Wave is clean and elegant without feeling ordinary. The bottle is beautiful too.', 'tone' => 't-violet'],
                ['name' => 'Rhea S.', 'city' => 'Mumbai', 'quote' => 'The discovery set helped me find my signature. Santal Eclipse develops beautifully over hours.', 'tone' => 't-amber'],
                ['name' => 'Nisha V.', 'city' => 'Hyderabad', 'quote' => 'Cedar Rain feels fresh, calm and expensive. The packaging experience was excellent.', 'tone' => 't-green'],
            ];
            foreach ($testimonials as $testimonial): ?>
                <div class="col-md-6 col-xl-3">
                    <article class="testimonial-video-card reveal-video <?= htmlspecialchars($testimonial['tone']) ?>">
                        <div class="testimonial-photo" aria-hidden="true"><span></span></div>
                        <div class="testimonial-stars">★★★★★</div>
                        <blockquote>“<?= htmlspecialchars($testimonial['quote']) ?>”</blockquote>
                        <div class="testimonial-name"><strong><?= htmlspecialchars($testimonial['name']) ?></strong><span><?= htmlspecialchars($testimonial['city']) ?></span></div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="final-offers-section section-video-space">
    <div class="container-fluid px-3 px-md-4 px-xl-5">
        <div class="row g-3 g-xl-4">
            <div class="col-lg-6">
                <article class="final-offer-card final-offer-light reveal-video">
                    <div class="final-offer-copy">
                        <span>New customer privilege</span>
                        <h2>Get Your First Scent for Less</h2>
                        <p>Enjoy 20% off your first order and receive two complimentary samples.</p>
                        <a href="collection.php" class="video-pill video-pill-dark">Shop now</a>
                    </div>
                    <div class="final-offer-art final-art-gold"><img src="assets/images/bottle-amber.svg" alt="Santal Eclipse perfume"></div>
                </article>
            </div>
            <div class="col-lg-6">
                <article class="final-offer-card final-offer-dark reveal-video">
                    <div class="final-offer-copy">
                        <span>Find your signature</span>
                        <h2>Try the Discovery Collection</h2>
                        <p>Five fragrances, one week of discovery and a credit toward your full bottle.</p>
                        <a href="collection.php" class="video-pill video-pill-light">Discover the set</a>
                    </div>
                    <div class="final-offer-art final-art-red"><img src="assets/images/bottle-rose.svg" alt="Ruby Passion perfume"></div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="video-newsletter-section">
    <svg class="newsletter-wave" viewBox="0 0 1440 140" preserveAspectRatio="none" aria-hidden="true"><path d="M0 78C195 19 370 128 615 78c236-48 371-76 580-30 97 21 171 44 245 31v61H0Z"/></svg>
    <div class="container-fluid px-3 px-md-4 px-xl-5 position-relative">
        <div class="row align-items-center gy-4">
            <div class="col-lg-7">
                <span>News from the fragrance room</span>
                <h2>Stay close to what comes next.</h2>
            </div>
            <div class="col-lg-5">
                <form class="video-newsletter-form" action="#" method="post" onsubmit="return false;">
                    <label class="visually-hidden" for="videoEmail">Email address</label>
                    <input id="videoEmail" type="email" placeholder="Your email address" required>
                    <button type="submit" aria-label="Subscribe"><i class="bi bi-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
