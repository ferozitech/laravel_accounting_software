@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-10">
                <div class="page-title-box">
                    <div class="float-right">
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create new Company</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card py-3">
                    <div class="card-body">
                        @if ($message = \Illuminate\Support\Facades\Session::get('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @elseif ($message = \Illuminate\Support\Facades\Session::get('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        {!! Form::open(array('route' => 'submitPage','id' => 'submitPage','class'=>'form-horizontal','files' => true)) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">Email</label>
                                    <input type="email" class="form-control" name="email" id="title" placeholder="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">website</label>
                                    <input type="text" class="form-control" name="website" id="website" placeholder="website">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">financial period from</label>
                                    <input type="text" class="form-control" name="financial_period_from" id="financial_period_from" placeholder="financial period from">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">financial period to</label>
                                    <input type="text" class="form-control" name="financial_period_to" id="financial_period_to" placeholder="financial period to">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">registration number</label>
                                    <input type="text" class="form-control" name="registration_number" id="registration_number" placeholder="registration number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">date of incorpr</label>
                                    <input type="text" class="form-control" name="date_of_incorp" id="date_of_incorp" placeholder="date of incorpr">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">ntn number</label>
                                    <input type="text" class="form-control" name="ntn_number" id="ntn_number" placeholder="ntn number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">salestax number</label>
                                    <input type="text" class="form-control" name="salestax_number" id="salestax_number" placeholder="salestax number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">authorised capital</label>
                                    <input type="text" class="form-control" name="authorised_capital" id="authorised_capital" placeholder="authorised capital">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">paidup capital</label>
                                    <input type="text" class="form-control" name="paidup_capital" id="paidup_capital" placeholder="paidup capital">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">share price</label>
                                    <input type="text" class="form-control" name="share_price" id="share_price" placeholder="share price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5 text-right">
                            <input type="button" class="btn btn-primary text-white" value="Save &amp; Continue">
                        </div>
                        <!--end form-grop-->
                    {{ Form::close() }}
                    <!--end form-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
        <!--end row-->
    </div>
@endsection
@section('script')
    @include('flashy::message')
    <script type="application/javascript" src="{{ asset('public/assets/backend/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector:'.editor',
            theme: 'modern',
            height: 200,
            forced_root_block : "",
            force_br_newlines : false,
            force_p_newlines : false,
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            remove_script_host : false,
            convert_urls : false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
        });
    </script>
@endsection
