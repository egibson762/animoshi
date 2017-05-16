

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <!-- Profile Picture -->
        <div class="col-xs-4 profile-picture">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Profile Picture</h3></div>
                <div class="panel-body">
                    <div style="text-align: center;">
                    <img style="max-width:100%;max-height:100%;margin:auto;" src="<?php echo e(asset('storage/app/images/')); ?>/<?php echo e($profile->profilepic); ?>">
                    </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- Main Profile Content -->
        <div class="col-xs-8 profile">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Username: <?php echo e($profileUser->name); ?></h3></div>

                <div class="panel-body">
                    <div class="user-information">
                        <h4>First Name: <?php echo e($profile->firstname); ?></h4>
                        <h4>Last Name: <?php echo e($profile->lastname); ?></h4>
                        <h4>Age: <?php echo e($profile->age); ?></h4>
                        <h4>Location: <?php echo e($profile->location); ?></h4>
                    </div>

                </div>
            </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>