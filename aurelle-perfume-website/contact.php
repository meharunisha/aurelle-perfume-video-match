<?php
$pageTitle = 'Contact';
$currentPage = 'contact';
$bodyClass = 'inner-page contact-page';
$submitted = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    if ($name === '') $errors[] = 'Please enter your name.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email address.';
    if ($message === '') $errors[] = 'Please tell us how we can assist.';
    $submitted = empty($errors);
}
require __DIR__ . '/includes/header.php';
?>
<section class="contact-layout">
    <div class="container-fluid px-0"><div class="row g-0 min-vh-100">
        <div class="col-lg-5 contact-panel"><div class="contact-panel-inner"><p class="eyebrow">PRIVATE ASSISTANCE</p><h1>Let us help you find the right atmosphere.</h1><p>For fragrance consultations, gifting and order assistance, write to the maison.</p><div class="contact-details"><a href="mailto:concierge@aurelle.example">concierge@aurelle.example</a><a href="tel:+914455501870">+91 44 5550 1870</a><span>Chennai · India</span></div></div></div>
        <div class="col-lg-7 contact-form-wrap"><div class="contact-form-inner">
            <?php if ($submitted): ?><div class="success-state"><i class="bi bi-check2-circle"></i><h2>Thank you, <?= htmlspecialchars($name) ?>.</h2><p>Your note has been received. A fragrance advisor will reply shortly.</p><a href="index.php" class="btn-luxury btn-luxury-dark">Return home</a></div>
            <?php else: ?>
                <p class="section-index">CONTACT THE MAISON</p>
                <?php if ($errors): ?><div class="alert alert-danger"><?php foreach($errors as $error): ?><div><?= htmlspecialchars($error) ?></div><?php endforeach; ?></div><?php endif; ?>
                <form method="post" class="luxury-form" novalidate>
                    <div class="row g-4"><div class="col-md-6"><label for="name">Name</label><input id="name" name="name" type="text" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required></div><div class="col-md-6"><label for="email">Email</label><input id="email" name="email" type="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required></div><div class="col-md-6"><label for="phone">Phone</label><input id="phone" name="phone" type="tel" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"></div><div class="col-md-6"><label for="reason">Reason</label><select id="reason" name="reason"><option>Fragrance consultation</option><option>Order assistance</option><option>Gifting</option><option>Press & partnerships</option></select></div><div class="col-12"><label for="message">Message</label><textarea id="message" name="message" rows="5" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea></div></div><button class="btn-luxury btn-luxury-dark mt-4" type="submit">Send enquiry <i class="bi bi-arrow-right"></i></button>
                </form>
            <?php endif; ?>
        </div></div>
    </div></div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
