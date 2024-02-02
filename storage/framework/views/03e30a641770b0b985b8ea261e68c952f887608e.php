

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .table-custom {
  margin: 20px auto;
  border: 1px solid #ccc;
  border-collapse: collapse;
  width: 100%;
  font-family: 'Poppins', sans-serif; /* Added custom font */
}

.table-custom th, 
.table-custom td {
  padding: 10px;
  border: 1px solid #ccc;
  text-align: center;
}

.table-custom th {
  background-color: #f2f2f2;
  font-weight: 700; /* Added bold font weight */
}

/* Added some responsive styles */
@media screen and (max-width: 768px) {
  .table-custom {
    font-size: 14px;
  }
}
@media screen and (max-width: 576px) {
  .table-custom {
    font-size: 12px;
  }
}
    
    
</style>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->get('Dashboard'); ?></div>

                <div class="panel-body text-center">
                    <img height="500" src="<?php echo e(asset('import/assets/img/logo-csu.png')); ?>">
                    <h2 class="text-center" style="margin-bottom: 100px;">Office of the University Registrar 
                        <br><b>Automated Records Management System</b></h2>
                    
                    
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dev-ams\resources\views/home.blade.php ENDPATH**/ ?>