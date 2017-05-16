<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-9">
            <div class="panel panel-default" style="margin-left:20px;margin-right:20px;">
                <div class="panel-heading"><h3>Create Message</h3></div>
                    <form action="<?php echo e(route('messages.store')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                            <!-- Subject Form Input -->
                            <div style="margin-left:20px;margin-right:20px;" class="form-group">
                                <label class="control-label">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                       value="<?php echo e(old('subject')); ?>">
                            </div>
                            <!-- Message Form Input -->
                            <div style="margin-left:20px;margin-right:20px;" class="form-group">
                                <label class="control-label">Message</label>
                                <textarea name="message" class="form-control"><?php echo e(old('message')); ?></textarea>
                            </div>
                            <?php if($users->count() > 0): ?>
                                <div style="margin-left:20px;" class="checkbox">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label title="<?php echo e($user->name); ?>"><input type="checkbox" name="recipients[]"
                                                                                value="<?php echo e($user->id); ?>"><?php echo $user->name; ?></label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            <!-- Submit Form Input -->
                            <div  style="margin-left:20px;margin-right:20px;" class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                    </form>
             </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>