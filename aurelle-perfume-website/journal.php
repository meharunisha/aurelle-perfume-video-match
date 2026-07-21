<?php
$pageTitle = 'Journal';
$currentPage = 'journal';
$bodyClass = 'inner-page journal-page';
require __DIR__ . '/includes/header.php';
?>
<section class="inner-hero journal-hero"><div class="container-fluid px-3 px-lg-5"><div class="row align-items-end min-vh-75 pb-5"><div class="col-lg-8"><p class="eyebrow reveal-up">THE AURELLE JOURNAL</p><h1 class="inner-title"><span>Notes on scent,</span><br><em>material and ritual.</em></h1></div></div></div></section>
<section class="section-space bg-ivory"><div class="container-fluid px-3 px-lg-5"><div class="row g-4">
<?php foreach(array_merge($journalPosts,$journalPosts) as $index=>$post): ?><div class="col-md-6 col-xl-4"><article class="journal-card reveal-card"><div class="journal-visual journal-visual-<?= ($index%3)+1 ?>"><span><?= str_pad((string)($index+1),2,'0',STR_PAD_LEFT) ?></span></div><div class="journal-meta"><span><?= htmlspecialchars($post['category']) ?></span><span><?= htmlspecialchars($post['date']) ?></span></div><h3><?= htmlspecialchars($post['title']) ?></h3><p><?= htmlspecialchars($post['excerpt']) ?></p><a href="#"><i class="bi bi-arrow-right"></i></a></article></div><?php endforeach; ?>
</div></div></section>
<?php require __DIR__ . '/includes/footer.php'; ?>
