<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(url('/admin/home')); ?>" class="logo" style="font-size: 20px;">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }
        </style>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <img src="<?php echo e(asset('import/assets/img/logo-csu.png')); ?>" height="50px" width="50px" alt="site’s logo">
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">OUR-ARMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title"><?php echo app('translator')->get('quickadmin.qa_logout'); ?></span>
                </a>
            </li>
        </ul>
    </nav>
</header>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    
    .main-header .navbar-right {
        float: right;
        padding-right: 20px;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
<?php /**PATH C:\laragon\www\dev-ams\resources\views/partials/topbar.blade.php ENDPATH**/ ?>