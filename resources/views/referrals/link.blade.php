@extends('dashboard.app')
@section('content-dashboard')
    <div class="container">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-12 col-lg-6">
                    <div class="title-content mb-3">
                        <h3 class="text-black">Mi link de referido__</h3>
                    </div>
                    <div class="card card-stats p-3 mb-xl-0">
                        <div class="card-body">
                            <div class="card shadow">
                                <div class="frm_link">
                                    <div class="form-group w-100 d-flex mb-0 p-3">
                                        <input id="input-link" class="input-link w-100" type="text" disabled>
                                        <button type="button" class="btn btn-primary" onclick="copyToClipboard('#input-link')">Copiar</button>
                                    </div>
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
        $(document).ready( function () {
            let value = window.location.hostname + '/register?token' + '{{Auth::user()->token}}';
            var $temp = $(".input-link").val(value);
        });
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).val()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
@endsection