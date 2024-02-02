<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <b><h3 class="page-title">Activity Logs</b></h3>
    

    


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($logs) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                <tr>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
                        <?php if( request('show_deleted') != 1 ): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th><?php endif; ?>
                    <?php endif; ?>
                    
                    <th>Type</th>
                    <th>Filename / Folder Name</th>
                    <th>Created By</th>
                    <th>Date & Time</th>
                    
                    

                    
                </tr>
                </thead>

                <tbody>

                <?php if(count($logs) > 0): ?>
                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($file->id); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_delete')): ?>
                                <?php if( request('show_deleted') != 1 ): ?>
                                    <td></td><?php endif; ?>
                            <?php endif; ?>
                            <td field-key='filename'><?php echo e($file->type); ?></td>
                            <td field-key='folder'><?php echo e($file->file_folder_name); ?></td>
                            <td field-key='created_by'><?php echo e($file->created_by); ?></td>
                            <td field-key='created_at'><?php echo e($file->created_at); ?></td>
                            
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dev-ams\resources\views/admin/logs/index.blade.php ENDPATH**/ ?>