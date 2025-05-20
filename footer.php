<footer class="ftl-footer">
    <section class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <!-- Logo & Description -->
                    <div class="col col-lg-6 text-center-mobile text-lg-start">
                        <?php dynamic_sidebar('footer-about'); ?>
                    </div>

                    <!-- Newsletter Subscription -->
                    <div class="col col-lg-6 col-center-mobile"
                        style="display: flex; align-self: center; justify-content: end;">
                        <?php dynamic_sidebar('footer-social'); ?>
                    </div>
                    <div class="empty-space"></div>
                    <!-- Address Sections -->
                    <div class="col col-md-6 col-lg-3 text-center-mobile text-lg-start">
                        <div class="col-center-mobile">
                            <?php dynamic_sidebar('footer-address-1'); ?>
                        </div>
                    </div>

                    <div class="col col-md-6 col-lg-3 text-center-mobile text-lg-start">
                        <div class="col-center-mobile">
                            <?php dynamic_sidebar('footer-address-2'); ?>
                        </div>
                    </div>

                    <!-- Support Links -->
                    <div class="col col-md-6 col-lg-3 text-center-mobile">
                        <div class="col-center-mobile">
                            <?php dynamic_sidebar('footer-quick-links'); ?>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="col col-md-6 col-lg-3 text-center-mobile text-lg-start">
                        <div class="col-center-mobile">
                            <?php dynamic_sidebar('footer-contact'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                <p><?= date('Y'); ?> © Copyright <b>Flowthermolab</b>. All Rights Reserved | Powered by <a
                        href="https://webtreeonline.com" target="_blank">webtree</a></p>
            </div>
        </div>
    </section>
</footer>