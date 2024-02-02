

<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo e($folder->name); ?></h3>
    <p>

        <?php if(Auth::getUser()->role_id == 2 && $userFilesCount > 5): ?>
            <a href="<?php echo e(url('admin/files/create?folder_id=' . $folder->id)); ?>" class="btn btn-success disabled">Add file to this Folder</a>
            
        <?php else: ?>
            <a href="<?php echo e(url('admin/files/create?folder_id=' . $folder->id)); ?>" class="btn btn-success">Add New File to this Folder</a>
            
        <?php endif; ?>

        <a href="<?php echo e(url('admin/folders/create?folder_id=' . $folder->id)); ?>" class="btn btn-success">Add New Folder</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            Files
        </div>
        

        
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($files) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                <tr>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
                        <?php if( request('show_deleted') != 1 ): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th><?php endif; ?>
                    <?php endif; ?>

                    <th>Folder / Filename</th>
                    <th>Description</th>
                    <th>Folder</th>
                    <th>Created By</th>
                    <?php if( request('show_deleted') == 1 ): ?>

                    <?php else: ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
                </thead>

                <tbody>
                <?php if(count($subfolders) > 0): ?>
                    <?php $__currentLoopData = $subfolders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subfolder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($subfolder->id); ?>">
                            <td></td>

                            <td field-key='name'>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_view')): ?>
                                    <a href="<?php echo e(route('admin.folders.show',[$subfolder->id])); ?>"><?php echo e($subfolder->name); ?></a></td>
                            <td field-key='description'>
                                -
                            </td>
                            <td field-key='foldername'>
                                <?php echo e($folder->name); ?>

                            </td>
                            <td field-key='username'>
                                <?php echo e($subfolder->username); ?>

                            </td>
                            <?php endif; ?>
                            <?php if( request('show_deleted') == 1 ): ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?>
                                        <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.folders.restore', $subfolder->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?>
                                        <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.folders.perma_del', $subfolder->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            <?php else: ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_edit')): ?>
                                        <a href="<?php echo e(route('admin.folders.edit',[$subfolder->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->get('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?>
                                        <?php echo Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.folders.destroy', $subfolder->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_delete'), array(
                                                        'class' => 'btn btn-xs btn-danger',
                                                        'disabled' => auth()->id() == $subfolder->created_by_id ? false : true,
                                                        )); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
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
                            <td field-key='folder'><?php echo e($file->description); ?></td>
                            <td field-key='folder'><?php echo e($file->foldername); ?></td>
                            <td field-key='created_by'><?php echo e($file->username); ?></td>
                            <?php if( request('show_deleted') == 1 ): ?>
                                <td>
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
    
    

    <p>&nbsp;</p>

    <a href="<?php echo e(route('admin.folders.index')); ?>" class="btn btn-default"><?php echo app('translator')->get('quickadmin.qa_back_to_list'); ?></a>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dev-ams\resources\views/admin/folders/show.blade.php ENDPATH**/ ?>