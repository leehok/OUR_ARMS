<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .h-100{
            height:calc(100%);
        }
        #login-box{
            width:100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
        .w-100{
            width:100% !important;
        }
    </style>
</head>

<body class="page-header-fixed">


    <div class="container-fluid h-100">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    <?php echo $__env->make('partials.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH C:\laragon\www\dev-ams\resources\views/layouts/auth.blade.php ENDPATH**/ ?>