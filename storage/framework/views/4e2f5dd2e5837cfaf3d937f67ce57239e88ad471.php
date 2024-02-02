<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <b><h3 class="page-title"><?php echo app('translator')->get('quickadmin.files.title'); ?></b></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_create')): ?>
        <p>

            <?php if(Auth::getUser()->role_id == 2 && $userFilesCount >= 5): ?>
                <a href="<?php echo e(route('admin.files.create')); ?>" class="btn btn-success disabled"><?php echo app('translator')->get('quickadmin.qa_add_new'); ?></a>
                
            <?php else: ?>
                <a href="<?php echo e(route('admin.files.create')); ?>" class="btn btn-success"><?php echo app('translator')->get('quickadmin.qa_add_new'); ?></a>
            <?php endif; ?>
            <?php if(!is_null(Auth::getUser()->role_id) && config('quickadmin.can_see_all_records_role_id') == Auth::getUser()->role_id): ?>
                <?php if(Session::get('File.filter', 'all') == 'my'): ?>
                    <a href="?filter=all" class="btn btn-default">Show all records</a>
                <?php else: ?>
                    <a href="?filter=my" class="btn btn-default">Filter my records</a>
                <?php endif; ?>
            <?php endif; ?>
        </p>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
        <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.files.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo app('translator')->get('quickadmin.qa_all'); ?></a></li>
            |
            <li><a href="<?php echo e(route('admin.files.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->get('quickadmin.qa_trash'); ?></a></li>
        </ul>
        </p>
    <?php endif; ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($files) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                <tr>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
                        <?php if( request('show_deleted') != 1 ): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th><?php endif; ?>
                    <?php endif; ?>
                    
                    <th>Filename</th>
                    <th>Description</th>
                    <th>Folder</th>
                    <th>Created By</th>
                    
                    

                    <?php if( request('show_deleted') == 1 ): ?>
                        <th>Actions</th>
                    <?php else: ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
                </thead>

                <tbody>

                <?php if(count($files) > 0): ?>
                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($file->id); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
                                <?php if( request('show_deleted') != 1 ): ?>
                                    <td></td><?php endif; ?>
                            <?php endif; ?>
                            <td field-key='filename'> <?php $__currentLoopData = $file->getMedia('filename'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="form-group">
                                        <a href="<?php echo e(url('/admin/' . $file->uuid . '/download')); ?>" target="_blank"><?php echo e($media->name); ?></a>
                                    </p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                            <td field-key='description'><?php echo e($file->description); ?></td>
                            <td field-key='folder'><?php echo e($file->foldername); ?></td>
                            <td field-key='created_by'><?php echo e($file->username); ?></td>
                            <?php if( request('show_deleted') == 1 ): ?>
                                <td>
                                    <?php if(Auth::getUser()->role_id == 2 && $userFilesCount >= 5): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
                                            <?php echo Form::open(array(
            'style' => 'display: inline-block;',
            'method' => 'DELETE',
            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
            'route' => ['admin.files.perma_del', $file->id])); ?>

                                            <?php echo Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                    <?php else: ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
                                        <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.files.restore', $file->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
                                        <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.files.perma_del', $file->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                        <?php endif; ?>
                                </td>

                            <?php else: ?>
                                <td>
                                    <a href="<?php echo e(url('/admin/' . $file->uuid . '/download')); ?>" class="btn btn-xs btn-success">Download</a>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
                                        <?php echo Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.files.destroy', $file->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_delete'), array(
                                                        'class' => 'btn btn-xs btn-danger',
                                                        'disabled' => auth()->id() == $file->created_by_id ? false : true,
                                                        )); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9"><?php echo app('translator')->get('quickadmin.qa_no_entries_in_table'); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
                <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.files.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dev-ams\resources\views/admin/files/index.blade.php ENDPATH**/ ?>