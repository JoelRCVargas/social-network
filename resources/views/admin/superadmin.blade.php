@extends('dashboard.app')
@section('content-dashboard')
<div class="container">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-12 col-lg-6">
                    <div class="title-content mb-3">
                        <h3 class="text-black">Mis fanpages </h3>
                    </div>
                    <div class="card card-stats mb-2 mb-xl-0">
                        <div class="card-body">
                            <div class="card shadow">
                                <div class="table-responsive p-2">
                                    <!-- Projects table -->
                                    <table id="tablef" class="table align-items-center table-flush" >
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Id</th>
                                              
                                                <th scope="col">Portada</th>
                                               
                                                <th scope="col">Descripción</th>
                                              
                                                <th scope="col">Sitio web</th>
                                                
                                             
                                            
                                             
                                              
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
         $(document).ready(function () {
        
        _listf(); //Llama a la funcion listado
    });

    //Funcion para listar registros
    let _listf = function () {
        let _tablef = $('#tablef').DataTable({
            "order": [[0, "asc"]],
            'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
            },
            'processing': true,
            'serverSide': true,
            'retrieve': true,
            'paging': false,
            'columnDefs': [
                { 'max-width': '320px', 'targets': 'my-column' }
            ],
            'ajax': {
                'type': 'get',
                'url': '{{route('admin.fanpage.superadlist')}}',
                'data': function (d) {
                    d._token = '{{ csrf_token() }}';
                    d.name = $('#search').val();
                }
            },
            "columns": [
                { data: 'id' },
                {
                    data: "cover",
                    render: function (data, type, full, meta) {
                        return "<div class='container-img' style='width: 100px;'><img src='{{URL::to('/')}}/assets/fanpage/" + data + "' width='70' class='thumbnail'><div/>";
                    },
                    roderable: false
                },

               
                { data: 'description' },
                { data: 'website' },
                

            ],

        });
        return _tablef;
    }

</script>
 

@endsection 