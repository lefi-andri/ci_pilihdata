@extends('include/template')

@php 
	$ci = get_instance();
@endphp

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="container mt-5">

@php
  echo form_open($form_action);
@endphp

  <div class="mb-3">
    <label for="" class="form-label">Nama Kategori</label>
    @php
      
      $data = array(
              'type'  => 'hidden',
              'name'  => 'id_kategori',
              'id'    => 'id_kategori',
              'value' => set_value('id_kategori')
      );

      echo form_input($data);

    @endphp
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Pilih Kategori" value="@php
        echo set_value('nama_kategori')
      @endphp" aria-label="" aria-describedby="button-addon2">
      <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-search" aria-hidden="true"></i> Pilih</button>
    </div>
    @php
      echo form_error('nama_kategori');
      echo form_error('id_kategori');
    @endphp
  </div>

  <div class="mb-3">
    <label for="isi_post" class="form-label">Post</label>
    @php
      echo form_error('isi_post');
    @endphp
    <input type="text" class="form-control" id="isi_post" name="isi_post" aria-describedby="postHelp" value="@php
      echo set_value('isi_post')
    @endphp">
    <div id="postHelp" class="form-text">Isi post</div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
@php
  echo form_close();
@endphp

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<div class="table-responsive">
    <table id="table" class="table table-bordered table-hover" cellspacing="0" width="100%">
      <thead class="bg-secondary text-white">
          <tr>
              <th>No.</th>
              <th>Nama kategori</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
</div>

      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
    table = $('#table').DataTable({ 

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "{{ base_url() }}DashboardController/ajax_list",
            "type": "POST",
            "data": function ( data ) {
            }
        },

        "columnDefs": [
        { 
            "targets": [ -1 ],
            "orderable": false,
        },
        ],

    });
});
$(document).ready(function() {
      $(document).on('click', '#select', function(){
        var id_kategori = $(this).data('id');
        var nama_kategori = $(this).data('name');

        $('#id_kategori').val(id_kategori);
        $('#nama_kategori').val(nama_kategori);
        $('#exampleModal').modal('hide');
      })
    });
</script>
@endsection