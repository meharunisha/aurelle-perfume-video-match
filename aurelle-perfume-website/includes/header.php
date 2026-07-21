<?php
require_once __DIR__ . '/config.php';
$pageTitle = $pageTitle ?? $siteName;
$currentPage = $currentPage ?? 'home';
$bodyClass = $bodyClass ?? '';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#11100e">
    <meta name="description" content="Aurelle premium fragrance house - modern perfume compositions created with rare ingredients and quiet craftsmanship.">
    <title><?= htmlspecialchars($pageTitle) ?> | <?= htmlspecialchars($siteName) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap-fallback.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php if ($currentPage === 'home'): ?>
    <link rel="stylesheet" href="assets/css/home-premium.css">
    <?php endif; ?>
</head>
<body class="<?= htmlspecialchars($bodyClass) ?>" data-page="<?= htmlspecialchars($currentPage) ?>">

<div class="site-loader" id="siteLoader" aria-live="polite" aria-label="Loading website">
    <div class="loader-aura" aria-hidden="true"></div>
    <div class="loader-inner">
        <div class="loader-brand-row">
            <div>
                <div class="loader-brand">AURELLE<span>.</span></div>
                <div class="loader-subbrand">MAISON DE PARFUM</div>
            </div>
            <div class="loader-percent"><span id="loaderPercent">0</span>%</div>
        </div>
        <div class="loader-track"><span id="loaderBar"></span></div>
        <div class="loader-meta"><span>BOTANICAL EXTRAITS</span><span>LOADING THE EXPERIENCE</span></div>
    </div>
</div>

<div class="scroll-progress" aria-hidden="true"><span id="scrollProgress"></span></div>

<header class="site-header fixed-top" id="siteHeader">
    <nav class="navbar navbar-expand-lg" aria-label="Primary navigation">
        <div class="container-fluid px-3 px-lg-5">
            <a class="navbar-brand brand-lockup" href="index.php" aria-label="Aurelle home">
                <span class="brand-name">AURELLE</span>
                <span class="brand-tag">MAISON DE PARFUM</span>
            </a>

            <button class="navbar-toggler menu-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-label="Open menu">
                <span></span><span></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center d-none d-lg-flex">
                <ul class="navbar-nav nav-luxury gap-xl-4">
                    <li class="nav-item"><a class="nav-link <?= $currentPage === 'home' ? 'active' : '' ?>" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?= $currentPage === 'collection' ? 'active' : '' ?>" href="collection.php">Collection</a></li>
                    <li class="nav-item"><a class="nav-link <?= $currentPage === 'story' ? 'active' : '' ?>" href="story.php">Our Story</a></li>
                    <li class="nav-item"><a class="nav-link <?= $currentPage === 'journal' ? 'active' : '' ?>" href="journal.php">Journal</a></li>
                    <li class="nav-item"><a class="nav-link <?= $currentPage === 'contact' ? 'active' : '' ?>" href="contact.php">Contact</a></li>
                </ul>
            </div>

            <div class="header-actions d-flex align-items-center gap-2">
                <button class="icon-btn d-none d-sm-inline-flex" type="button" aria-label="Search"><i class="bi bi-search"></i></button>
                <a class="icon-btn" href="collection.php" aria-label="Shopping bag"><i class="bi bi-bag"></i><span class="bag-count">0</span></a>
            </div>
        </div>
    </nav>
</header>

<div class="offcanvas offcanvas-end mobile-nav" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header px-4 pt-4">
        <div id="mobileMenuLabel" class="brand-lockup">
            <span class="brand-name">AURELLE</span>
            <span class="brand-tag">MAISON DE PARFUM</span>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column px-4 pb-4">
        <nav class="mobile-links my-auto">
            <a class="<?= $currentPage === 'home' ? 'active' : '' ?>" href="index.php"><span>01</span> Home</a>
            <a class="<?= $currentPage === 'collection' ? 'active' : '' ?>" href="collection.php"><span>02</span> Collection</a>
            <a class="<?= $currentPage === 'story' ? 'active' : '' ?>" href="story.php"><span>03</span> Our Story</a>
            <a class="<?= $currentPage === 'journal' ? 'active' : '' ?>" href="journal.php"><span>04</span> Journal</a>
            <a class="<?= $currentPage === 'contact' ? 'active' : '' ?>" href="contact.php"><span>05</span> Contact</a>
        </nav>
        <div class="mobile-nav-footer">
            <p>Private consultations<br>Monday–Saturday, 10:00–19:00</p>
            <div class="d-flex gap-3"><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a><a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a></div>
        </div>
    </div>
</div>

<main>
