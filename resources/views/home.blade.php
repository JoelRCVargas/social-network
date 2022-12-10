@extends('dashboard.app')
@section('content-dashboard')
<div class="container-fluid dashboard-default-sec">
    <div class="row mb-4">
        <div class="col-xl-12 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-md-6 box-col-6 des-xl-50">
                    <div class="card profile-greeting">
                        <div class="card-header">
                            <div class="header-top">
                                <div class="setting-list bg-primary position-unset">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-white"><i class="icon-settings"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center p-t-0">
                            <h3 class="font-light">Bienvenido, {{ Auth::user()->name }}!!</h3>
                            <p>Panel principal para administración de datos suministrados por simpatizantes a su
                                red.<br>

                                <br>


                            </p>
                            <button class="btn btn-light">Mi Candidato App</button>
                        </div>
                        <div class="confetti">
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard"
                                    data-clipboard-target="#profile-greeting" title="Copy"><i
                                        class="icofont icofont-copy-alt"></i></button>
                                <pre><code class="language-html" id="profile-greeting">                                     &lt;div class="card profile-greeting"&gt; 
                        &lt;div class="card-header"&gt;
                          &lt;div class="header-top"&gt;
                            &lt;div class="setting-list bg-primary"&gt;
                              &lt;ul class="list-unstyled setting-option"&gt;
                                &lt;li&gt;&lt;div class="setting-white"&gt;&lt;i class="icon-settings"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
                              &lt;/ul&gt;
                            &lt;/div&gt;
                          &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class="card-body text-center"&gt;
                          &lt;h3 class="font-light"&gt;Wellcome Back, John!!&lt;/h3&gt;
                          &lt;p&gt;Lorem ipsum is simply dummy text of the printing and typesetting industry.Lorem ipsum has been&lt;/p&gt;
                          &lt;button class="btn btn-light"&gt;Update &lt;/button&gt;
                        &lt;/div&gt;
                      &lt;/div&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-user"></i>
                            </div>
                            <h5>{{$users}}</h5>
                            <p>Usuarios</p><a class="btn-arrow arrow-primary" href="javascript:void(0)"><i
                                    class="toprightarrow-primary fa fa-arrow-up me-2"></i>{{$users}} </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-users"></i>
                            </div>
                            <h5>{{$ref}}</h5>
                            <p>Mis referidos</p><a class="btn-arrow arrow-primary" href="javascript:void(0)"><i
                                    class="toprightarrow-primary fa fa-arrow-up me-2"></i>{{$ref}} </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h5>{{$publications}}</h5>
                            <p>Mis publicaciones</p><a class="btn-arrow arrow-primary" href="javascript:void(0)"><i
                                    class="toprightarrow-primary fa fa-arrow-up me-2"></i>{{$publications}} </a>
                            <div class="parrten">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fas fa-file"></i>
                            </div>
                            <h5>{{$fanpage}}</h5>
                            <p>Mis fanpages</p><a class="btn-arrow arrow-secondary" href="javascript:void(0)"><i
                                    class="toprightarrow-secondary fa fa-arrow-up me-2"></i>{{$fanpage}} </a>
                            <div class="parrten">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid dashboard-default-sec">
            <div class="row">
                <div class="col-xl-5 box-col-12 des-xl-100">
                    <div class="row">
                        <div class="container">
                            <div class="header-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-6">

                                        <div class="card card-stats mb-2 mb-xl-0">
                                            <div class="card-body">
                                                <div>
                                                    <div class="card-header border-0">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h3 class="mb-0">Usuarios</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive p-2">
                                                        <!-- Projects table -->
                                                        <table id="table" class="table align-items-center table-flush">
                                                            <thead class="thead-light">
                                                                <tr>

                                                                    <th scope="col">Nombre</th>
                                                                    <th scope="col">Rol</th>
                                                                    <th scope="col">photo</th>

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

                    </div>
                </div>
                <div class="col-xl-7 box-col-12 des-xl-100 dashboard-sec">
                    <div class="card income-card">
                        <div class="card-header">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Fanpages</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive p-2">
                                <!-- Projects table -->
                                <table id="tablef" class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>

                                            <th scope="col">Portada</th>

                                            <th scope="col">descripcion</th>

                                            <th scope="col">sitio web</th>
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
    $(document).ready(function () {
        _list(); //Llama a la funcion listado
        _listf(); //Llama a la funcion listado
    });

    //Funcion para listar registros
    let _list = function () {
        let _table = $('#table').DataTable({
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
                'url': '{{route('admin.user.list')}}',
                'data': function (d) {
                    d._token = '{{ csrf_token() }}';
                    d.name = $('#search').val();
                }
            },
            "columns": [

                { data: "name" },

                { data: 'role' },
                {
                    data: "photo",
                    render: function (data, type, full, meta) {
                        return "<div class='container-img' style='width: 100px;'><img src='{{URL::to('/')}}/assets/user/" + data + "' width='70' class='thumbnail'><div/>";
                    },
                    roderable: false
                },

            ],

        });
        return _table;
    }


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
                'url': '{{route('home.user.listf')}}',
                'data': function (d) {
                    d._token = '{{ csrf_token() }}';
                    d.name = $('#search').val();
                }
            },
            "columns": [

                {
                    data: "cover",
                    render: function (data, type, full, meta) {
                        return "<div class='container-img' style='width: 100px;'><img src='{{URL::to('/')}}/assets/fanpage/" + data + "' width='70' class='thumbnail'><div/>";
                    },
                    roderable: false
                },

                { data: "description" },

                { data: 'website' },



            ],

        });
        return _tablef;
    }
</script>
@endsection