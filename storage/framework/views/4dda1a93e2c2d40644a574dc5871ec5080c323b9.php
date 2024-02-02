

<style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    
}
    </style>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
<?php $__env->startSection('content'); ?>

	<b><h3 class="page-title"><?php echo app('translator')->get('quickadmin.qa_change_password'); ?></b></h3>

	<?php if(session('success')): ?>
		<!-- If password successfully show message -->
		<div class="row">
			<div class="alert alert-success">
				<?php echo e(session('success')); ?>

			</div>
		</div>
	<?php else: ?>
		<?php echo Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]); ?>

		<!-- If no success message in flash session show change password form  -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo app('translator')->get('quickadmin.qa_edit'); ?>
			</div>

			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 form-group">
						<?php echo Form::label('current_password', trans('quickadmin.qa_current_password'), ['class' => 'control-label']); ?>

						<?php echo Form::password('current_password', ['class' => 'form-control', 'placeholder' => '']); ?>

						<p class="help-block"></p>
						<?php if($errors->has('current_password')): ?>
							<p class="help-block">
								<?php echo e($errors->first('current_password')); ?>

							</p>
						<?php endif; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 form-group">
						<?php echo Form::label('new_password', trans('quickadmin.qa_new_password'), ['class' => 'control-label']); ?>

						<?php echo Form::password('new_password', ['class' => 'form-control', 'placeholder' => '']); ?>

						<p class="help-block"></p>
						<?php if($errors->has('new_password')): ?>
							<p class="help-block">
								<?php echo e($errors->first('new_password')); ?>

							</p>
						<?php endif; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 form-group">
						<?php echo Form::label('new_password_confirmation', trans('quickadmin.qa_password_confirm'), ['class' => 'control-label']); ?>

						<?php echo Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => '']); ?>

						<p class="help-block"></p>
						<?php if($errors->has('new_password_confirmation')): ?>
							<p class="help-block">
								<?php echo e($errors->first('new_password_confirmation')); ?>

							</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<?php echo Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']); ?>

		<?php echo Form::close(); ?>

	<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dev-ams\resources\views/auth/change_password.blade.php ENDPATH**/ ?>