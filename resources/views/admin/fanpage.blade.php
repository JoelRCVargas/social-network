@extends('dashboard.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/layouts.css')}}">
@endsection
@section('content-dashboard')
<input type="hidden" id="follower-value" value="{{$follower}}">
<input type="hidden" id="token" value="{{$fanpage->token}}">
<input type="hidden" id="id_referred_user" value="{{$fanpage->id_user}}">
<div class="container">
<div class="profile-page tx-13">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="profile-header">
                <div class="cover">
                    <div class="gray-shade"></div>
                    <figure>
                        <img src="{{asset('assets/fanpage/'. $fanpage->cover)}}" class="img-fluid" alt="profile cover">
                    </figure>
                    <div class="cover-body d-flex justify-content-between align-items-center">
                        <div>
                            <img class="profile-pic" src="{{asset('assets/fanpage/'. $fanpage->profile)}}" alt="profile">
                            <span class="profile-name">{{$fanpage->name}}</span>
                        </div>
                        <div class="d-none d-md-block">
                            @if($fanpage->id_user != Auth::id())
                                <button class="btn btn-primary btn-icon-text btn-edit-profile" id="follower-action">
                                    @if($follower == 1)    
                                        Siguiendo
                                    @else
                                        Seguir
                                    @endif
                                </button>                                
                            @endif
                        </div>
                    </div>
                </div>
                <div class="header-links">
 
    </div>
    <div class="row profile-body mt-4">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">Sobre nosotros</label>
                        <p class="text-muted">{{$fanpage->description}}</p>
                    </div>
                    <!-- <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">Sobre nosotros</h6>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm mr-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-branch icon-sm mr-2">
                                        <line x1="6" y1="3" x2="6" y2="15"></line>
                                        <circle cx="18" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M18 9a9 9 0 0 1-9 9"></path>
                                    </svg> <span class="">Update</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-sm mr-2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg> <span class="">View all</span></a>
                            </div>
                        </div>
                    </div> -->
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">Dirección</label>
                        <p class="text-muted">{{$fanpage->address}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">Sitio web</label>
                        <p class="text-muted">{{$fanpage->website}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">Correo electronico</label>
                        <p class="text-muted">{{$fanpage->email}}</p>
                    </div>
                    <!-- <div class="mt-3 d-flex social-links">
                        <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github" data-toggle="tooltip" title="" data-original-title="github.com/nobleui">
                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                            </svg>
                        </a>
                        <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter" data-toggle="tooltip" title="" data-original-title="twitter.com/nobleui">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                            </svg>
                        </a>
                        <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram" data-toggle="tooltip" title="" data-original-title="instagram.com/nobleui">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="col-md-12">
                    @foreach($publications as $publication)
                    <div class="card rounded">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                                    <div class="ml-2">
                                        <p>{{$fanpage->name}}</p>
                                        <!-- <p class="tx-11 text-muted">5 min ago</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <p class="tx-14">{{$publication->description}}</p>
                            <img class="img-fluid" src="../../../assets/images/sample2.jpg" alt="">
                        </div>
                        <div class="card-footer">
                            <div class="d-flex post-actions">
                                <a href="javascript:;" class="d-flex align-items-center text-muted mr-4"
                                onclick="registerLike({{$publication->id}},'#like_{{$publication->id}}')" id="like_{{$publication->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart icon-md">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                    <p class="d-none d-md-block ml-2">{{ count($publication->likes)}}</p>
                                </a>
                                <a href="javascript:;" class="d-flex align-items-center text-muted mr-4" 
                                onclick="showComment('#publication_{{$publication->id}}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square icon-md">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <p class="d-none d-md-block ml-2"><span id="n_comments_{{$publication->id}}">{{ count($publication->comments)}}</span> comentarios</p>
                                </a>
                            </div>
                        </div>
                        <div class="card-commets" id="publication_{{$publication->id}}">
                            <div class="input-comment">
                                <input type="text" placeholder="Escribe un comentario..." name="description" 
                                id="input_comment_{{$publication->id}}" 
                                onkeyup="registerComment(event,'#input_comment_{{$publication->id}}',{{$publication->id}})">
                            </div>
                            <div id="body_comment_{{$publication->id}}">
                                @foreach($publication->comments as $comment)
                                    <div id="comment_{{$comment->id}}">
                                        <div class="content d-flex mb-2" >
                                            <img src="{{asset('assets/images/avtar/3.jpg')}}" alt="">
                                            <div class="comment-text">
                                                <h4 class="name-user">{{$comment->user->name}}</h4>
                                                <p class="description" contenteditable="false" 
                                                onkeyup="updateComment(event,{{$comment->id}},'#comment_{{$comment->id}} .description')">
                                                {{$comment->description}}</p>
                                            </div>
                                        </div>
                                        @if(Auth::user()->role == 3 || Auth::id() == $comment->id_user)
                                            <div class="d-flex options">
                                                <p class="option_edit_{{$comment->id}}"
                                                onclick="prepareComment('#comment_{{$comment->id}} .description')">Editar</p>
                                                <p class="option_delete_{{$comment->id}}" 
                                                onclick="deleteComment({{$comment->id}},'#comment_{{$comment->id}}',{{$publication->id}})">Eliminar</p>
                                            </div>
                                        @endif 
                                    </div> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
    </div>
</div>
</div>
@endsection
@section('scripts')
    <script>
        $('#follower-action').on('click', function (e) {
            let token = $('#token').val();
            let follower_value = $('#follower-value').val();
            let id_referred_user = $('#id_referred_user').val();
            if(e.isDefaultPrevented()){
                toastr.warning('Debe llenar los campos obligatorios');
            }else{
                e.preventDefault();
                var cons_ = '';
                if(follower_value == 0){
                    cons_ = '{!! route('admin.fanpage.follower.create') !!}';
                }
                $.ajax({
                    type: 'post',
                    url : cons_,          
                    data: {
                        _token      : '{{ csrf_token() }}',
                        token  : token,
                        id_referred_user : id_referred_user
                    },
                    datatype: 'json',
                    beforeSend: function() {
                    },
                    complete: function() {
                    },
                    success: function(response) {
                        $('#follower-action').text('Siguiendo');
                        toast.success(response.success);
                    },
                    error: function(response) {
                        toastr.error(response.error);
                    }
                })
            }
        });

        function registerComment(e,element,id){
            if ($("#input_comment_"+id+":focus") && (e.keyCode === 13)) {
                let cons_ = '{!! route('comment.create') !!}';
                var count =  parseInt($("#n_comments_"+id).text());
                $.ajax({
                    type: 'post',
                    url : cons_,          
                    data: {
                            _token : '{{ csrf_token() }}',
                            description : $(element).val(),
                            publication_id : id,
                            id_user : '{{Auth::id()}}'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                    },
                    complete: function() {
                    },
                    success: function(response) {
                        $("#n_comments_"+id).text(count + 1);
                        $("#body_comment_" + id)
                        .prepend('<div id="comment_'+response['id']+'">'+
                                    '<div class="content d-flex mb-2">'+
                                        '<img src="{{asset("assets/images/avtar/3.jpg")}}" alt="">'+
                                        '<div class="comment-text">'+
                                            '<h4 class="name-user">'+'{{Auth::user()->name}}'+'</h4>'+
                                            '<p class="description" contenteditable="false" onkeyup="updateComment(event,'+response['id']+',`#comment_'+response['id']+' .description`)">'+$(element).val()+'</p>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="d-flex options">'+
                                        '<p class="option_edit_'+response['id']+'"'+
                                        'onclick="prepareComment(`#comment_'+response['id']+' .description`)">Editar</p>'+
                                        '<p class="option_delete_'+response['id']+'"'+
                                        'onclick="deleteComment('+response['id']+',`#comment_'+response['id']+'`,'+response['publication_id']+')">Eliminar</p>'+
                                    '</div>'+
                                '</div>');
                        toastr.success("Comentario enviado.");
                        console.log(response['id']);
                        $(element).val('');
                    },
                    error: function(response) {
                        toastr.error('Ocurrio un error inesperado.');
                    }
                });
            }
        }

        function showComment(element){
            if($(element).hasClass('show')){
                $(element).removeClass('show');
                return
            }
            $(element).addClass('show');
        }

        function deleteComment(id,element,id_publication){
            var count =  parseInt($(element + " .n_comments").text());
            var count =  parseInt($("#n_comments_"+id_publication).text());
            $.confirm({
                icon: 'fa fa-question',
                theme: 'modern',
                animation: 'scale',
                title: '¿Está seguro de eliminar este comentario?',
                content: '<div>Esté registro se eliminará permanentemente.</div>',
                buttons: {
                    Confirmar: function () {
                        $.ajax({
                            type: 'post',
                            url: '{{route('comment.delete')}}',
                            data: {
                                _token : '{{ csrf_token() }}',
                                id : id
                            },
                            dataType: 'json',
                            beforeSend: function() {
                            },
                            complete: function() {
                            },
                            success: function(response) {
                                $(element).remove();
                                $("#n_comments_"+id_publication).text(count - 1);
                                toastr.success("Comentario eliminado correctamente.");
                            },
                            error: function(response) {
                                toastr.error(response);
                            }
                        });
                    },
                    Cancelar: function () {
                    
                    }
                }
            });  
        }

        function prepareComment(element){
            let input = $(element).attr('contenteditable');
            if(input == 'true'){
                $(element).attr('contenteditable','false');
                $(element).removeClass('focus');
                return
            }
            $(element).attr('contenteditable','true');
            $(element).addClass('focus');
            $(element).focus();
        }

        function updateComment(e,id,element){
            if ($(element+":focus") && (e.keyCode === 13)) {
                $(element).attr('contenteditable','false');
                let cons_ = '{!! route('comment.update') !!}';
                let value = $(element).text();
                $.ajax({
                    type: 'post',
                    url : cons_,          
                    data: {
                            _token : '{{ csrf_token() }}',
                            description : value,
                            id : id
                    },
                    dataType: 'json',
                    beforeSend: function() {
                    },
                    complete: function() {
                    },
                    success: function(response) {
                        toastr.success("Comentario actualizado correctamente.");
                        $(element).text(value.trim());
                        $(element).removeClass('focus');
                        },
                    error: function(response) {
                        toastr.error('Ocurrio un error inesperado.');
                    }
                });
            }
        }

        function registerLike(id,element){
             let cons_ = '{!! route('like.create') !!}';
             var count =  parseInt($(element + " > p").text());
                $.ajax({
                    type: 'post',
                    url : cons_,          
                    data: {
                            _token : '{{ csrf_token() }}',
                            publication_id : id
                    },
                    dataType: 'json',
                    beforeSend: function() {
                    },
                    complete: function() {
                    },
                    success: function(response) {
                        if(response == true || response == 'true'){
                            $(element+" svg path").css('fill','red');
                            $(element+" svg path").css('stroke','red');
                            $(element + " > p").text(count + 1);
                            toastr.success('Me gusta enviado');
                            return
                        }
                        $(element + "> p").text(count - 1);
                        $(element+" svg path").css('fill','#fff');
                        $(element+" svg path").css('stroke','currentColor');
                    },
                    error: function(response) {
                        toastr.error('Ocurrio un error inesperado.');
                    }
                });
        }

        function liked(){
            $publications = <?php echo json_encode($publications); ?>;
            $user = '{!! Auth::id() !!}'
            $.each( $publications, function(index,$publication){
                let objIndex = $publication['likes'].findIndex((obj => obj.user_id == $user));
                if (objIndex != -1) {
                    let publication_id = $publication['likes'][objIndex]['publication_id'];
                    let element = $("#like_" + publication_id+" svg path");
                    element.css('fill','red');
                    element.css('stroke','red');
                }
            });
            //console.log($publications['likes']);
        }

        $(document).ready( function () {
            liked();
        });

    </script>
@endsection
