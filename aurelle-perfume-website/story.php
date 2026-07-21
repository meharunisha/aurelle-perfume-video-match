<?php
$pageTitle = 'Our Story';
$currentPage = 'story';
$bodyClass = 'inner-page story-page';
require __DIR__ . '/includes/header.php';
?>
<section class="inner-hero story-hero">
    <div class="story-hero-bottle"><img src="assets/images/bottle-amber.svg" alt="Aurelle perfume bottle"></div>
    <div class="container-fluid px-3 px-lg-5 position-relative z-2">
        <div class="row align-items-end min-vh-100 pb-5">
            <div class="col-lg-8"><p class="eyebrow reveal-up">OUR STORY</p><h1 class="inner-title text-light"><span>Made between precision</span><br><em>and instinct.</em></h1></div>
            <div class="col-lg-3 offset-lg-1"><p class="body-large text-light opacity-75 reveal-up">Aurelle began with one question: can luxury feel quieter and still be unforgettable?</p></div>
        </div>
    </div>
</section>
<section class="section-space bg-ivory">
    <div class="container-fluid px-3 px-lg-5">
        <div class="row g-5"><div class="col-lg-3"><p class="section-index">01 / BEGINNING</p></div><div class="col-lg-8 offset-lg-1"><h2 class="manifesto-copy split-words">We did not set out to make more perfume. We set out to make fragrance feel personal again.</h2></div></div>
    </div>
</section>
<section class="process-section section-space">
    <div class="container-fluid px-3 px-lg-5">
        <?php $steps=[['01','Source','Materials are selected for texture, provenance and the emotion they carry.'],['02','Compose','Accords are built in layers, then edited until every note has a reason to remain.'],['03','Rest','Each concentrate matures for twelve weeks so the composition can settle into balance.'],['04','Finish','Small batches are filtered, bottled and checked by hand before leaving the atelier.']]; ?>
        <?php foreach($steps as $step): ?>
            <div class="process-row row align-items-center g-4"><div class="col-2 col-lg-1"><span><?= $step[0] ?></span></div><div class="col-10 col-lg-4"><h3><?= $step[1] ?></h3></div><div class="col-lg-5 offset-lg-1"><p><?= $step[2] ?></p></div></div>
        <?php endforeach; ?>
    </div>
</section>
<section class="values-band section-space"><div class="container-fluid px-3 px-lg-5"><div class="row g-4"><div class="col-md-4"><h3>Clarity</h3><p>Every material is legible. Complexity never becomes clutter.</p></div><div class="col-md-4"><h3>Patience</h3><p>Time is treated as an ingredient, not a production delay.</p></div><div class="col-md-4"><h3>Intimacy</h3><p>A fragrance should live with the wearer rather than perform over them.</p></div></div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
