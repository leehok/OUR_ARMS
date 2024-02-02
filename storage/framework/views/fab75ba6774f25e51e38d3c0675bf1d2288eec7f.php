

<?php $__env->startSection('content'); ?>
<?php if(request()->has('folder_id')): ?>
    <h3 class="page-title"><?php echo e($folder->name .' > '. ' New Sub Folder'); ?></h3>
<?php else: ?>
    <h3 class="page-title"><?php echo app('translator')->get('quickadmin.folders.title'); ?></h3>
<?php endif; ?>
    
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.folders.store']]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('quickadmin.qa_create'); ?>
        </div>
        
        <div class="panel-body">
            <input type="hidden" name="folder_id" value="<?php echo e(request()->query('folder_id')); ?>">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('name', trans('quickadmin.folders.fields.name').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('name')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('name')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dev-ams\resources\views/admin/folders/create.blade.php ENDPATH**/ ?>