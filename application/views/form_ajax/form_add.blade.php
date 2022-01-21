@php
  echo form_open($form_action, ['class' => 'formData'])
@endphp
  <div class="mb-3">
    <label for="nama_kategori" class="form-label">Nama Kategori</label>
    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="@php
      echo set_value('nama_kategori')
    @endphp" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <div class="pesan">
      
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary save_button">Submit</button>
@php
  echo form_close();
@endphp

<script>
$(document).ready(function(e) {

    $('.formData').submit(function(e){
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            cache: false,
            beforeSend: function(){
              $('.save_button').attr('disabled', 'disabled');
              $('.save_button').html('<i class="fa fa-spin fa-spinner"></i> Sedang diproses');

            },
            complete: function(){
                $('.save_button').removeAttr('disabled');
                $('.save_button').html('Submit');
            },
            error: function(e){
                Swal.fire(
                  'Error !',
                  e,
                  'error'
                )
            },
            success: function(data){

                if (data.validasi) {
                    $('.pesan').fadeIn();
                    $('.pesan').html(data.validasi);
                }
                if (data.sukses) {
                  $('.formData').hide();
                  $('#loading_registrations').show();
                  setTimeout(function(){

                    window.location.href = "{{ base_url() }}FormAjaxController/sukses";
                    
                  }, 500);
                    
                }
            }
        })

        return false;
        
    });

});
</script>