<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>


<body class="hold-transition skin-blue sidebar-mini">

<div id="wrapper">

<?php echo $__env->make('partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" > 
        <!-- Main content -->
        <section class="content">
            <?php if(isset($siteTitle)): ?>
                <h3 class="page-title">
                    <?php echo e($siteTitle); ?>

                </h3>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">

                    <?php if(Session::has('message')): ?>
                        <div class="alert alert-info">
                            <p><?php echo e(Session::get('message')); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($errors->count() > 0): ?>
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>

                </div>
            </div>
        </section>
    </div>
    
    <style>
.site-footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #f8f9fa;
    padding: 20px 0;
}
.site-footer p {
    margin: 0;
}
.site-footer a {
    color: #666;
    text-decoration: none;
}
.site-footer .left {
    text-align: left;
}
.site-footer .right {
    text-align: right;
}
</style>

<footer class="site-footer" style="background-color:#f5f5f5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 left">
                    <p><a href="https://www.carsu.edu.ph/?q=registrars-page/about-office"><img alt="" src="<?php echo e(asset('import/assets/img/logo-csu.png')); ?>" style="height:26px; width:26px" /></a> <a href="https://www.facebook.com/ourcsu">OUR-ARMS</a>. All Rights Reserved.</p>
                </div>
                <div class="col-sm-12 col-md-6 right">
                    <p><a href="#">Privacy Policy</a> | <a href="#">Terms and Conditions</a> | <a href="#">Cookies Policy</a></p>
                </div>
            </div>
        </div>
    </footer>

<?php echo Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']); ?>

<button type="submit">Logout</button>
<?php echo Form::close(); ?>


<?php echo $__env->make('partials.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH C:\laragon\www\dev-ams\resources\views/layouts/app.blade.php ENDPATH**/ ?>