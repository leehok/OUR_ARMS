<?php $request = app('Illuminate\Http\Request'); ?>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <div class="user-panel">
    <div class="pull-left image">
        <i class="fa fa-user-circle-o fa-3x"></i>
    </div>
    <div class="pull-left info">
        <h4 style="font-weight: bold;"><?php echo e(auth()->user()->name); ?></h4>
        
    </div>
</div>
        <ul class="sidebar-menu">
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Poppins', sans-serif;
                }
                .user-panel .image img {
        border-radius: 50%;
        max-width: 45px;
        max-height: 45px;
    }
    .user-panel .image i {
    color: #fff;
    }

    div.pull-left.info {
                  text-align: left;
                  width: 100%;
                }

                div.pull-left.image {
                  display: flex;
                  justify-content: left;
                  align-items: left;
                  width: 100%;
                  height: 60px;
                }
    .sidebar-menu li a {
        font-size: 16px; /* change the value as desired */
    }
            </style>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">


            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/')); ?>">
                    <i class="fa fa-home"></i>
                    <span class="title"><?php echo app('translator')->get('quickadmin.qa_dashboard'); ?></span>
                </a>
            </li>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title"><?php echo app('translator')->get('quickadmin.user-management.title'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                <li class="<?php echo e($request->segment(2) == 'roles' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.roles.index')); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                <?php echo app('translator')->get('quickadmin.roles.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                <li class="<?php echo e($request->segment(2) == 'users' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.users.index')); ?>">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                <?php echo app('translator')->get('quickadmin.users.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <li class="<?php echo e($request->segment(2) == 'logs' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.logs.index')); ?>">
                    <i class="fa fa-pencil"></i>
                    <span class="title">Activity Logs</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('folder_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'folders' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.folders.index')); ?>">
                    
                    <i class="fa fa-folder"></i>
                    <span class="title">Shared Drive</span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_access')): ?>
            <li class="<?php echo e($request->segment(2) == 'files' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.files.index')); ?>">
                <i class="fa fa-file"></i>
                    <span class="title">All Files</span>
                </a>
            </li>
            <?php endif; ?>

            

            <li class="<?php echo e($request->segment(1) == 'change_password' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('auth.change_password')); ?>">
                    <i class="fa fa-key"></i>
                    <span class="title"><?php echo app('translator')->get('quickadmin.qa_change_password'); ?></span>
                </a>
            </li>
            
            
        </ul>
        
    </section>

</aside>

<?php /**PATH C:\laragon\www\dev-ams\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>