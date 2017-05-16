<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="alert alert-warning">
        <span class="close" data-dismiss="alert">x</span>
        <strong>Warning!</strong> ANIMOSHI.COM is under construction and as such, all messages are public.
        Don't send anything you wouldn't want your mother to see! :^)
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>My Messages</h3></div>
                <a style="margin-left:30px;" href="/messages/create">New Message</a>
                    <?php echo $__env->make('messenger.partials.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->renderEach('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads'); ?>
                    <?php $__env->stopSection(); ?>
                </div>

            </div>
        </div>
    </div>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>