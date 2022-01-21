@extends('include/template')

@php 
	$ci = get_instance();
@endphp

@section('style')

@endsection

@section('content')
<div class="container mt-5">
	<div class="alert alert-primary" role="alert">
	  Data berhasil disimpan !
	</div>
	<div class="mt-5 text-center">
		@php
			echo anchor('FormAjaxController', 'Kembali', ['class' => 'btn btn-outline-primary']);
		@endphp
	</div>
</div>
@endsection

@section('javascript')

@endsection