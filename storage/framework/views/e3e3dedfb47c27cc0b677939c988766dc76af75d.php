<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <b><h3 class="page-title"><?php echo app('translator')->get('quickadmin.folders.title'); ?></b></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_create')): ?>
        <p>
            <a href="<?php echo e(route('admin.folders.create')); ?>" class="btn btn-success"><?php echo app('translator')->get('quickadmin.qa_add_new'); ?></a>

            <?php if(!is_null(Auth::getUser()->role_id) && config('quickadmin.can_see_all_records_role_id') == Auth::getUser()->role_id): ?>
                <?php if(Session::get('Folder.filter', 'all') == 'my'): ?>
                    <a href="?filter=all" class="btn btn-default">Show all records</a>
                <?php else: ?>
                    <a href="?filter=my" class="btn btn-default">Filter my records</a>
                <?php endif; ?>
            <?php endif; ?>
        </p>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?>
        <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.folders.index')); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo app('translator')->get('quickadmin.qa_all'); ?></a></li>
            |
            <li><a href="<?php echo e(route('admin.folders.index')); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->get('quickadmin.qa_trash'); ?></a></li>
        </ul>
        </p>
    <?php endif; ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table id="myTable" class="table table-bordered table-striped <?php echo e(count($folders) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>">
                <thead>
                <tr>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?>
                        <?php if( request('show_deleted') != 1 ): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th><?php endif; ?>
                    <?php endif; ?>

                    <th><?php echo app('translator')->get('quickadmin.folders.fields.name'); ?></th>
                    <th><?php echo app('translator')->get('quickadmin.folders.fields.created-by'); ?></th>
                    <?php if( request('show_deleted') == 1 ): ?>
                        <th>Actions</th>
                    <?php else: ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
                </thead>

                <tbody>
                <?php if(count($folders) > 0): ?>
                    <?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($folder->id); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?>
                                <?php if( request('show_deleted') != 1 ): ?>
                                    <td></td><?php endif; ?>
                            <?php endif; ?>

                            <td field-key='name'>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_view')): ?>
                                    <a href="<?php echo e(route('admin.folders.show',[$folder->id])); ?>"><?php echo e($folder->name); ?></a></td>
                            <td field-key='username'>
                                <?php echo e($folder->username); ?>

                            </td>
                            <?php endif; ?>
                            <?php if( request('show_deleted') == 1 ): ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?>
                                        <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.folders.restore', $folder->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?>
                                        <?php echo Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.folders.perma_del', $folder->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            <?php else: ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_edit')): ?>
                                        <a href="<?php echo e(route('admin.folders.edit',[$folder->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->get('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?>
                                        <?php echo Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.folders.destroy', $folder->id])); ?>

                                        <?php echo Form::submit(trans('quickadmin.qa_delete'), array(
                                                                        'class' => 'btn btn-xs btn-danger',
                                                                        'disabled' => auth()->id() == $folder->created_by_id ? false : true,
                                                                        )); ?>

                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7"><?php echo app('translator')->get('quickadmin.qa_no_entries_in_table'); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        $(document).ready(function () {
//            var table = $('#myTable_Wrapper').DataTable();
//console.log(table);
//            table.button( '.dt-button' ).remove();
        })
    </script>
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_delete')): ?>
                <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.folders.mass_destroy')); ?>'; <?php endif; ?>
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dev-ams\resources\views/admin/folders/index.blade.php ENDPATH**/ ?>