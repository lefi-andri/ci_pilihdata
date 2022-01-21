@extends('include/template')

@php 
	$ci = get_instance();
@endphp

@section('style')

@endsection

@section('content')
<div class="container mt-5">
	<div align="center" id="loading_registrations">
	  <img src="{{ base_url() }}assets/img/ajax/ajax-loading-gif-1.gif" alt="">
	</div>
	<div id="content">
		
	</div>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
	$('#loading_registrations').hide();
	var id = 0;
	$.ajax({
        type: "post",
        url: "{{ base_url() }}FormAjaxController/load_form",
        data: "id="+id,
        dataType: "html",
        success: function (response) {
            $('#content').empty();
            $('#content').append(response);
        }
    });
});
</script>
@endsection