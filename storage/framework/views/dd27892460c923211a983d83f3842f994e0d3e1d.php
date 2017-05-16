<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>My Messages</h3></div>
                <h1 style="margin-left:20px;"><?php echo e($thread->subject); ?></h1>
                <?php echo $__env->renderEach('messenger.partials.messages', $thread->messages, 'message'); ?>
                <div class="panel panel-default">
                    <div class="row" style="margin-left:20px;margin-right:20px;">
                <?php echo $__env->make('messenger.partials.form-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                </div>
                <?php $__env->stopSection(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>