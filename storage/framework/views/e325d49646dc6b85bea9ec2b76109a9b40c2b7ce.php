

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <!-- Main Profile Content -->
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Rules</h3></div>
                <div class="panel-body">
                    <div class="user-information">
                        <h4>1. You will not upload, post, discuss, request, or link
                            to anything that violates local or United States law.</h4>
                        <h4>2. You will immediately cease and not
                            continue to access the site if you are under the age of 18.</h4>
                        <h4>3. The quality of posts is extremely important to this community. Contributors
                            are encouraged to provide high-quality images and informative comments.</h4>
                        <h4>4. No spamming or flooding of any kind. No intentionally evading spam or post filters.</h4>
                        <h4>5. The use of scrapers, bots, or other automated posting or downloading scripts is prohibited.
                            Users may also not post from proxies, VPNs, or Tor exit nodes.</h4>
                        <h4>6. Do not upload images containing additional
                            data such as embedded sounds, documents, archives, etc.</h4>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>