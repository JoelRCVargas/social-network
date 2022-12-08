@extends('dashboard.app')
@section('content-dashboard')
    <div class="container">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-12 col-lg-6">
                    <div class="title-content mb-3">
                        <h3 class="text-black">Fanpages__</h3>
                    </div>
                    <div class="card card-stats mb-2 mb-xl-0">
                        <div class="card-body">
                            <div class="card shadow">
                                <div class="card-header border-0">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="mb-0">Todos mis fanpages que sigo </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive p-2">
                                    <!-- Projects table -->
                                    <table id="table" class="table align-items-center table-flush" >
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Perfil</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Compartir</th>
                                                <th scope="col">Pagina</th>
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
                        'url' : '{{route('user.fanpage.list')}}',
                        'data': function(d) {
                            d._token = '{{ csrf_token() }}';
                        }
                    },
                    "columns": [
                        { data: "name" },
                        { data: "profile",
                            render:function(data,type,full,meta){
                                return "<img src={{URL::to('/')}}/assets/fanpage/"+data+" width='90' class='thumbnail'>";
                            },
                            roderable:false 
                        },
                        { data: "description" },
                        { data: "link",
                            render:function(data,type,full,meta){
                                return "<button type='button' url='{{URL::to('/')}}"+data+"{{Auth::id()}}"+"&nickname={{Auth::user()->name}}"+"' class='btn btn-primary shared'>Compartir</abutton>";
                            },
                            roderable:false
                        },
                        { data: "id_fanpage",
                            render:function(data,type,full,meta){
                                return "<a class='btn btn-primary' href='{{URL::to('/')}}/fanpage/"+data+"'>Ver pagina</a>";
                            },
                            roderable:false
                        }
                    ] 
                });
                return _table;
            }
        //Obtener registros, para el formulario
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

    </script>
@endsection