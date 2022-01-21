

<?php 
	$ci = get_instance();
?>

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
	<div class="alert alert-primary" role="alert">
	  Data berhasil disimpan !
	</div>
	<div class="mt-5 text-center">
		<?php
			echo anchor('FormAjaxController', 'Kembali', ['class' => 'btn btn-outline-primary']);
		?>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('include/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\ci_pilihdata\application\views/form_ajax/form_success.blade.php ENDPATH**/ ?>