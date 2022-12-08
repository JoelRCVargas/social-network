@extends('dashboard.app')
@section('content-dashboard')
<div class="container">
  <form id="frm_fanpage" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="id_user" name="id_user" value="{{Auth::id()}}">
    <div class="form-group">
        <label for="cover">Foto de portada</label>
        <input type="file" class="form-control" id="cover" name="cover">
    </div>
    <div class="form-group">
        <label for="profile">Foto de perfil</label>
        <input type="file" class="form-control" id="profile" name="profile">
    </div>
    <div class="form-group">
      <label for="description">Descripcion</label>
      <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="profile">Dirección</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="form-group">
        <label for="profile">Sitio web</label>
        <input type="text" class="form-control" id="website" name="website">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    
    <input type ='submit' class="btn btn-primary btnSubmit"/>
    </form>
  </div>
@endsection
@section('scripts')
  <script>
    $('#frm_fanpage').on('submit', function (e) {
        $("btnSubmit").prop('disabled', true);
        if(e.isDefaultPrevented()){
            toastr.warning('Debe llenar los campos obligatorios');
        }else{
            e.preventDefault();
            var cons_ = '';
            if($('#method').val() == 0){
                cons_ = '{!! route('admin.formpage.create') !!}';
              
            }else{
                cons_ = '';
              
            }
            $.ajax({
                type: 'post',
                url : cons_,          
                data: new FormData(this),
                cache:false,
                contentType:false,
                processData:false,
                datatype: 'json',
                beforeSend: function() {
                },
                complete: function() {
                },
                success: function(response) {
                    alert(responser.success);
                },
                error: function(response) {
                    toastr.error(response.responseText);
                },
                finally: function(response){
                    $("input").prop('disabled', false);
                }
            })
        }
    });
  </script>
@endsection