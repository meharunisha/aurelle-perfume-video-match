</main>

<footer class="site-footer">
    <div class="container-fluid px-3 px-lg-5">
        <div class="footer-top row gy-5 align-items-start">
            <div class="col-lg-5">
                <div class="footer-wordmark">AURELLE</div>
                <p class="footer-intro">Fragrance composed as atmosphere—precise, intimate and made to remain in memory.</p>
            </div>
            <div class="col-6 col-lg-2 offset-lg-1">
                <h2 class="footer-title">Explore</h2>
                <a href="collection.php">Collection</a>
                <a href="story.php">Our Story</a>
                <a href="journal.php">Journal</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="col-6 col-lg-2">
                <h2 class="footer-title">Assistance</h2>
                <a href="#">Delivery & Returns</a>
                <a href="#">Care Guide</a>
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
            </div>
            <div class="col-lg-2">
                <h2 class="footer-title">Follow</h2>
                <div class="footer-social d-flex gap-3">
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between gap-2">
            <span>© <?= date('Y') ?> Aurelle Maison de Parfum</span>
            <span>Designed for a slower sense of luxury.</span>
        </div>
    </div>
</footer>

<div class="cursor-dot" aria-hidden="true"></div>
<div class="cursor-ring" aria-hidden="true"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lenis@1.1.20/dist/lenis.min.js"></script>
<script src="assets/js/main.js"></script>
<?php if (($currentPage ?? '') === 'home'): ?>
<script src="assets/js/home-premium.js"></script>
<?php endif; ?>
</body>
</html>
