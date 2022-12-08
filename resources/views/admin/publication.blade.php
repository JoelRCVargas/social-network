@extends('dashboard.app')
@section('content-dashboard')
    <div class="container">+
    <input type="hidden"  id="method" value="0">
    <form id="frm_publication" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id_publication" name="id" value="">
        <input type="hidden" id="id_fanpage" name="id_fanpage" value="{{$id_fanpage}}">
        <div class="form-group">
            <label for="email">Description</label>
            <textarea id="description" cols="30" rows="10" name="description"></textarea>
        </div>    
        <input type ='submit' class="btn btn-primary btnSubmit"/>
        </form>
    </div>
    
    <div class="container">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-12 col-lg-6">
                    <div class="title-content mb-3">
                        <h3 class="text-black">Mis publicaciones</h3>
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
                                                <th scope="col">id</th>
                                                <th scope="col">image</th>
                                                <th scope="col">descripcion</th>                                                                                         
                                                <th scope="col">opciones</th>
                                           
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

        //Obtener registros, para el formulario
        $('#table').on( 'click', '.edit', function () {
                        var data = _list().row( $(this).parents('tr') ).data();
                        
                        if(data == undefined) {
                            let table = _list();
                            table = $("#table").DataTable();
                            data = table.row( $(this).parents('tr') ).data();
                            
                        }
                        $("#id").val(data['id']);

                        $.post('{{route('admin.publication.prepare')}}',
                            'id=' + data['id'] +
                            '&_token=' + '{{ csrf_token() }}', function(response) {
                                $('#image').val(null);
                                $('#description').val(response['description']);
                                $('#id_publication').val(response['id']);
                                $('#method').val('1'); 
                            }, 'json');
                        $("html, body").animate({ scrollTop: 0 }, 600);
                    });
                    

        $('#frm_publication').on('submit', function (e) {
            $("btnSubmit").prop('disabled', true);
            if(e.isDefaultPrevented()){
                toastr.warning('Debe llenar los campos obligatorios');
            }else{
                e.preventDefault();
                var cons_ = '';
                if($('#method').val() == 0){
                    cons_ = '{!! route('admin.publication.create') !!}';
                
                }else{
                    cons_ = '{!! route('admin.publication.update') !!}';
                
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
                        toastr.success('Se guardo satisfactoriamente.');
                        clearData();
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
                    'url' : '{{route('admin.publication.list')}}',
                    'data': function(d) {
                        d._token = '{{ csrf_token() }}';
                        d.id = $('#id_fanpage').val();
                    }
                },
                "columns": [
                    { data: "id" },
                    { data: "image",
                        render:function(data,type,full,meta){
                            return "<div class='container-img' style='max-width: 100px;'><img src={{URL::to('/')}}/assets/publication/"+data+" width='70' class='thumbnail'><div/>";
                        },
                        roderable:false
                    },     
                    { data: "description"},                  
                    { data: "id",
                        render:function(data,type,full,meta){
                            return "<div class='description-table'>"+data+"<div/>";
                        },
                        roderable:false
                    }, 
                           
                ],
                    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        $(nRow).find('td:eq(3)').html('' +
                            '<button type="button" class="edit btn btn-primary btn-sm" id="btnAdd"  data-toggle="modal" data-target="#modalEdit"><i class="fa fa-edit"></i></button>' +
                            '<button type="button" class="delete btn btn-danger btn-sm m-lg-2" ><i class="fa fa-trash"></i></button>');
                    }
            });
            return _table;
            }

                         //Eliminar
                         $('#table').on('click','.delete', function () {
                var data = _list().row( $(this).parents('tr') ).data();
                if(data == undefined) {
                    let table = _list();
                    table = $("#table").DataTable();
                    data = table.row( $(this).parents('tr') ).data();
                }
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
                                url: '{{route('admin.publication.delete')}}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    id: data['id']
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
        function clearData(){
            $('#description').val('');
            $('#method').val('0'); 
        }    
  </script>
@endsection

