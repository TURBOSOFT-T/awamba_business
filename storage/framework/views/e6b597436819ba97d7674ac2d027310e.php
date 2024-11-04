<?php $__env->startSection('titre', "Contact"); ?>
<?php $__env->startSection('body'); ?>
    <main>
        <!-- Start Contact Area -->
        <div class="axil-contact-page-area axil-section-gap">
            <div class="container">
                <div class="axil-contact-page">
                    <div class="row row--30">
                        <!-- Section d'information de contact -->
                        <div class="col-lg-4">
    <div class="contact-info-container">
        <div class="contact-info contact-box">
            <div class="icon">
                <i class="fas fa-phone"></i>
            </div>
            <h4>Contactez Nous</h4>
        </div>
        <p>Nous sommes disponible 24/7</p>
        <p>Phone: +237 697 501 425</p>
        <hr>
        <div class="contact-info contact-box">
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <h4>Écrivez Nous</h4>
        </div>
        <p>Remplissez le formulaire et nous vous contacterons en moins de 24 heures.</p>
        <p>Emails: awambabusiness@gmail.com</p>
    </div>
</div>


                        <!-- Section du formulaire de contact -->
                        <div class="col-lg-8">
                            <div class="contact-form-container">
                                <?php
                                $__split = function ($name, $params = []) {
                                    return [$name, $params];
                                };

                                [$__name, $__params] = $__split('Front.ContactForm');

                                $__html = app('livewire')->mount($__name, $__params, 'lw-1151013964-0', $__slots ?? [], get_defined_vars());

                                echo $__html;

                                unset($__html);
                                unset($__name);
                                unset($__params);
                                unset($__split);
                                if (isset($__slots)) unset($__slots);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact Area -->
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.fixe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
