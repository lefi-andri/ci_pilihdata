

<?php 
	$ci = get_instance();
?>

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
	<div align="center" id="loading_registrations">
	  <img src="<?php echo e(base_url()); ?>assets/img/ajax/ajax-loading-gif-1.gif" alt="">
	</div>
	<div id="content">
		
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
$(document).ready(function() {
	$('#loading_registrations').hide();
	var id = 0;
	$.ajax({
        type: "post",
        url: "<?php echo e(base_url()); ?>FormAjaxController/load_form",
        data: "id="+id,
        dataType: "html",
        success: function (response) {
            $('#content').empty();
            $('#content').append(response);
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('include/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\ci_pilihdata\application\views/form_ajax/index.blade.php ENDPATH**/ ?>