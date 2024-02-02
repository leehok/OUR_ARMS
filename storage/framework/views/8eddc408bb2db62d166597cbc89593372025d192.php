

<?php $__env->startSection('content'); ?>
<style>
		body{
			background-image: url('https://img.freepik.com/free-vector/background-gradient-green-tones_23-2148360340.jpg');
			background-repeat: no-repeat;
  			background-attachment: fixed;
  			background-size: 100% 100%;
		}
        * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
	
}
	</style>
<div class="row h-100 w-100" style="justify-content:center;display:flex" id="login-box">
    <div class="col-md-5">
        <div class="panel panel-default">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

        <center>
            <img src="<?php echo e(asset('import/assets/img/logo-csu.png')); ?>" height="50px" width="50px" alt="sites logo">
        </center>
            <div class="panel-heading text-center">Office of the University Registrar Automated Records Management System</div>
            
            <div class="panel-body">
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> <?php echo app('translator')->get('quickadmin.qa_there_were_problems_with_input'); ?>:
                    <br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <form class="form-horizontal"
                      role="form"
                      method="POST"
                      action="<?php echo e(url('login')); ?>">
                    <input type="hidden"
                           name="_token"
                           value="<?php echo e(csrf_token()); ?>">

                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo app('translator')->get('quickadmin.qa_email'); ?></label>

                        <div class="col-md-6">
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   value="<?php echo e(old('email')); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo app('translator')->get('quickadmin.qa_password'); ?></label>

                        <div class="col-md-6">
                            <input type="password"
                                   class="form-control"
                                   name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="<?php echo e(route('auth.password.reset')); ?>"><?php echo app('translator')->get('quickadmin.qa_forgot_password'); ?></a>
                            <br>
                            <a href="<?php echo e(route('auth.register')); ?>"><?php echo app('translator')->get('quickadmin.qa_registration'); ?></a>
                        </div>
                    </div>


                    <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <label>
            <input type="checkbox" name="remember"> <?php echo app('translator')->get('quickadmin.qa_remember_me'); ?>
        </label>
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary" style="margin-right: 15px;"><?php echo app('translator')->get('quickadmin.qa_login'); ?></button>
        <a href="<?php echo e(url('/homepage')); ?>" class="btn btn-primary">Back</a>
    </div>
</div>


                    

                </form>
            </div>
        </div>
    </div>
    <p>
    <div id="credits">Caraga State University<br/>Designed by <a href="http://www.carsu.edu.ph/" target="_blank"> <span style="color:white">CCIS RESEARCHERS</span></a>.</div>  
 
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dev-ams\resources\views/auth/login.blade.php ENDPATH**/ ?>