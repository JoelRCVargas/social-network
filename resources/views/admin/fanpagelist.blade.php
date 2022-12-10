@extends('dashboard.app')
@section('content-dashboard')

<input type="hidden" value="0" id="method">
        <div class="modal fade" data-toggle="validator" id="modalEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="frm_fanpage" class="modal-body" enctype="multipart/form-data">
                       {{csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">

                            <label class="form-control-label" for="name">{{ __('Nombre fanpage') }}</label>
                            <input type="text" name="name" id="name" class="form-control" required autofocus>

                            <label class="form-control-label" for="description">{{ __('Descripcion') }}</label>
                            <input type="text" name="description" id="description" class="form-control" required autofocus>

                            <label class="form-control-label" for="address">{{ __('Direccion') }}</label>
                            <input type="text" name="address" id="address" class="form-control" required autofocus>
                            
                            <label class="form-control-label" for="website">{{ __('Sitio web') }}</label>
                            <input type="text" name="website" id="website" class="form-control" required autofocus>

                            <label class="form-control-label" for="email">{{ __('Email') }}</label>
                            <input type="text" name="email" id="email" class="form-control" required autofocus>

                            <label class="form-control-label" for="cover">{{ __('Foto de portada') }}</label>
                            <input type="file" name="cover" id="cover" class="form-control"  autofocus>

                            <label class="form-control-label" for="profile">{{ __('Foto de perfil') }}</label>
                            <input type="file" name="profile" id="profile" class="form-control"  autofocus>
            
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="btnAdd">Guardar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>


    <div class="container">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-12 col-lg-6">
                    <div class="title-content mb-3">
                        <h3 class="text-black">Mis fanpages</h3>
                    </div>
                    <div class="card card-stats mb-2 mb-xl-0">
                        <div class="card-body">
                            <div class="card shadow">
                                <div class="card-header border-0">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="mb-0">Lista </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive p-2">
                                    <!-- Projects table -->
                                    <table id="table" class="table align-items-center table-flush" >
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Portada</th>
                                                <th scope="col">Perfil</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Dirección</th>
                                                <th scope="col">Sitio web</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Publicaciones</th>
                                                <th scope="col">Compartir</th>
                                                <th scope="col">Ver</th>
                                                <th scope="col">Opciones</th>
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
            </div>
        </div>
       
    </div>

@endsection
@section('scripts')
<script>
        //Llena la tabla al cargar la pagina
        $(document).ready( function () {
            _list(); //Llama a la funcion listado
        });

        //Funcion para listar registros
        let _list = function () {
            let _table = $('#table').DataTable({
                "order": [[ 0, "asc" ]],
                'language': {
                    'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
                },
                'processing': true,
                'serverSide': true,
                'retrieve': true,
                'paging': false,
                'columnDefs': [
                    {'max-width': '320px', 'targets': 'my-column'}
                ],
                'ajax': {
                    'type': 'get',
                    'url' : '{{route('admin.fanpage.list')}}',
                    'data': function(d) {
                        d._token = '{{ csrf_token() }}';
                        d.name = $('#search').val();
                    }
                },
                "columns": [
                    { data: "id" },
                    { data: "name" },
                    { data: "cover",
                        render:function(data,type,full,meta){
                            return "<div class='container-img' style='width: 100px;'><img src='{{URL::to('/')}}/assets/fanpage/"+data+"' width='70' class='thumbnail'><div/>";
                        },
                        roderable:false
                    },
                    { data: "profile",
                        render:function(data,type,full,meta){
                            return "<div class='container-img' style='width: 100px;'><img src='{{URL::to('/')}}/assets/fanpage/"+data+"' width='70' class='thumbnail'><div/>";
                        },
                        roderable:false
                    },
                    { data: "description",
                        render:function(data,type,full,meta){
                            return "<div class='description-table' style='width:120px'>"+data+"<div/>";
                        },
                        roderable:false
                    },
                    { data: "address",
                        render:function(data,type,full,meta){
                            return "<div class='description-table' style='width:120px'>"+data+"<div/>";
                        },
                        roderable:false 
                    },
                    {data:'website'},
                    { data: 'email' },
                    { data: "id",
                        render:function(data,type,full,meta){
                            return "<a class='btn btn-primary' href='{{URL::to('/')}}/admin/publication/fanpage?id="+data+"'>Publicaciones<a/>";
                        },
                        roderable:false
                    },
                    { data: "link",
                        render:function(data,type,full,meta){
                            return "<button type='button' url='{{URL::to('/')}}"+data+"{{Auth::id()}}"+"&nickname={{Auth::user()->name}}"+"' class='btn btn-primary shared'>Compartir</abutton>";
                        },
                        roderable:false
                    },
                    { data: "id",
                        render:function(data,type,full,meta){
                            return "<a class='btn btn-primary' target='_blank' href='{{URL::to('/')}}/fanpage/"+data+"/"+full.name+"'><i class='fa fa-eye'></a>";
                        },
                        roderable:false
                    },
                    { data: "id",
                        render:function(data,type,full,meta){
                            return "<div class='description-table'>"+data+"<div/>";
                        },
                        roderable:false
                    },
                ],
                    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        $(nRow).find('td:eq(11)').html('<div class="d-flex">' +
                            '<button type="button" class="edit btn btn-primary btn-sm" id="btnAdd"  data-toggle="modal" data-target="#modalEdit"><i class="fa fa-edit"></i></button>' +
                            '<button type="button" class="delete btn btn-danger btn-sm ml-2" ><i class="fa fa-trash"></i></button></div>');
                    }
            });
            return _table;
            }

            
   //Obtener registros, para el formulario
            $('#table').on( 'click', '.edit', function () {
                var data = _list().row( $(this).parents('tr') ).data();
                
                if(data == undefined) {
                    let table = _list();
                    table = $("#table").DataTable();
                    data = table.row( $(this).parents('tr') ).data();
                    
                }
                $("#id").val(data['id']);

                $.post('{{route('admin.fanpage.prepare')}}',
                    'id=' + data['id'] +
                    '&_token=' + '{{ csrf_token() }}', function(response) {
                        $('#description').val(response['description']);
                        $('#name').val(response['name']);
                        $('#address').val(response['address']);
                        $('#website').val(response['website']);
                        $('#email').val(response["email"]);
                        $('#modalEdit').modal('show');
                        $('#cover').val(null);
                        $('#method').val('1'); 
                    }, 'json');
                $("html, body").animate({ scrollTop: 0 }, 600);
            });
            

              //Registrar
              $('#btnAdd').on( 'click', function (){
                clearData();
            $('#method').val('0');
            });

            $('#frm_fanpage').on('submit', function (e) {
                $("btnSubmit").prop('disabled', true);
                if(e.isDefaultPrevented()){
                    toastr.warning('Debe llenar los campos obligatorios');
                }else{
                    e.preventDefault();
                    var cons_ = '';
                    if($)
                    if($('#method').val() == 0){
                        cons_ = '{!! route('admin.formpage.create') !!}';
                       
                    }else{
                        cons_ = '{!! route('admin.fanpage.update') !!}';
                       
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
                            $("#table").DataTable().ajax.reload();
                            $('#modalRegister').modal('hide');
                            toastr.success('Se grabó satisfactoriamente el cliente');
                        },
                        error: function(response) {
                            toastr.error(response.responseText);
                            $('#save').removeAttr('disabled');
                        },
                        finally: function(response){
                            $("input").prop('disabled', false);
                        }
                    }) 
                }
            });

             //Eliminar
             $('#table').on('click','.delete', function () {
                var data = _list().row( $(this).parents('tr') ).data();
                if(data == undefined) {
                    let table = _list();
                    table = $("#table").DataTable();
                    data = table.row( $(this).parents('tr') ).data();
                }
                $("#id").val(data['id']);

                     $.confirm({
                         icon: 'fa fa-question',
                         theme: 'modern',
                         animation: 'scale',
                         title: '¿Está seguro de eliminar este registro?',
                         content: '<div>Esté registro se eliminará permanentemente.</div>',
                         buttons: {
                         Confirmar: function () {
                            $.ajax({
                                type: 'get',
                                url: '{{route('admin.fanpage.delete')}}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    id: $('#id').val()
                                },
                                dataType: 'json',
                                beforeSend: function() {

                                },
                                complete: function() {

                                },

                                success: function(response) {
                                    if(response == true) {
                                        $("#table").DataTable().ajax.reload();
                                        toastr.success('Se eliminó satisfactoriamente.');
                                    }  else {
                                        toastr.error('No puede eleminar un paquete ya que sigue activo para uno o mas personas.');
                                    }

                                },
                                error: function(response) {
                                    toastr.error('Ocurrio un error inesperado!');
                                }
                            });
                         },
                        Cancelar: function () {
                
                        }
                    }

                });

            });
        $('#table').on( 'click', '.shared', function () {
            var data = _list().row($(this).parents('tr')).data();
            var link = '{{URL::to('/')}}' + data['link'] + '{{Auth::id()}}' + '&nickname=' + '{{Auth::user()->name}}';
            var domParse = new DOMParser().parseFromString(link,"text/html");
            var parseLink = domParse.documentElement.textContent;
            //Copy
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(parseLink).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success('Link copiado satisfactoriamente.');
        });
    </script>}
    <!-- Limpiar formulario -->
@endsection
