

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Profile Search</h3></div>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="panel-body">
                    <h4 style="margin-right:30px;"><a href="/profiles/<?php echo e($u->id); ?>"><img
                                style="max-width:100px;max-height:100px;"
                         src="<?php echo e(asset('storage/app/images/')); ?>/<?php echo e($u->profilepic); ?>"></a>
                    <a href="/profiles/<?php echo e($u->id); ?>"><?php echo e($u->name); ?></a></h4>
                </div>
                <div class="divider"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Trending</h3></div>

                <div class="panel-body">
                    No anime here :c
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>