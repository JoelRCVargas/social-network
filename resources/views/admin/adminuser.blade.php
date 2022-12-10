@extends('dashboard.app')
@section('content-dashboard')
    <div class="title-content mb-3">
        <h3 class="text-black title">Configurar informacion de Usuario</h3>
    </div>
    <div class="card">
        <div class="card-body">
        <input type="hidden"  id="method" value="0">
            <form id="frm_user" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="photo">Foto</label>
                    <input type="file" class="form-control" id="photo" name="photo" value="">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                </div>
                <button type="submit" class="edit btn btn-primary btn-sm">Guardar</button>
            </form>
        </div>
    </div>

    <div class="title-content mb-3">
        <h3 class="text-black title">Cambiar contraseña</h3>
    </div>
    <div class="card">
      <div class="card-body">
        <form id="frm_pwd" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="password">Contraseña antigua</label>
                        <input type="password" class="form-control" id="old_password" name="old_password"   value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Nueva contraseña</label>
                        <input type="password" class="form-control" id="new_password" name="new_password"  alt="strongPass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="">
                        <p><small>*La contraseña debe contener mas de 6 caracteres y al menos una mayuscula y numeros</small></p>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmar nueva contraseña</label>
                        <input type="password" class="form-control" id="r_password" name="r_password"  alt="strongPass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="">
                    </div>
                    
                    <button type="submit" class="edit btn btn-primary btn-sm">Guardar</button>
                </form>
    </div>
    </div>

    
      
  </form>
  </div>
</div>
@endsection
@section('scripts')
<script>
 
        //actualizar datos
        $('#frm_user').on('submit', function (e) {
            $("edit").prop('disabled', true);
            if(e.isDefaultPrevented()){
                toastr.warning('Debe llenar los campos obligatorios');
            }else{
                e.preventDefault();
                var cons_ = '';        
                    cons_ = '{!! route('admin.user.adminuserupdate') !!}';  
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
                      toastr.success('Se guardo satisfactoriamente.');
                    },
                    error: function(response) {
                        toastr.error('Ocurrio un error inesperado');
                    }
                })
            }
        });

        //update pwd
        $('#frm_pwd').on('submit', function (e) {
            
            if(e.isDefaultPrevented()){
                toastr.warning('Debe llenar los campos obligatorios');
            }else{
              e.preventDefault();
              let new_password = $("#new_password").val();
              $new_password => 'required|string|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/';
              let r_password = $("#r_password").val();
              if(new_password !== r_password){
                toastr.error("Las contraseñas no coinciden.");
                return
              }
                
              var  cons_ = '{!! route('admin.user.password.update') !!}';  
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
                      if(response == false || response == 'false'){
                        toastr.error('La contraseña antigua es incorrecta.');
                        return
                      }
                      toastr.success('Se guardo satisfactoriamente.');
                    },
                    error: function(response) {
                        toastr.error(response.responseText);
                    },
                    finally: function(response){
                        $("input").prop('disabled', false);
                    }
                });
            }
        });






















        

              
</script>
@endsection