@extends('dashboard.app')
@section('content-dashboard')
    <div class="container">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-12 col-lg-6">
                    <div class="title-content mb-3">
                        <h3 class="text-black">Mis referidos__</h3>
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
                                                <th scope="col">#</th>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">Correo</th>
                                                <th scope="col">Token</th>
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
                    'url' : '{{route('referrals.list')}}',
                    'data': function(d) {
                        d._token = '{{ csrf_token() }}';
                        d.name = $('#search').val();
                    }
                },
                "columns": [
                    { data: "id" },
                    { data: "name" },
                    { data: "email" },
                    { data: "token",
                        render:function(data,type,full,meta){
                            return "<div class='description-table'>"+data+"<div/>";
                        },
                        roderable:false
                    }
                ] 
            });
            return _table;
            }
    </script>
@endsection