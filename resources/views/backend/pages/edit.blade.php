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
                        <h4 class="mt-0 header-title">Update Page</h4>
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
                        {!! Form::open(array('route' => 'updatePage','id' => 'submitPage','class'=>'form-horizontal','files' => true)) !!}
                        <div class="row">
                            <input type="hidden" value="{{ (!empty($page->id) ? $page->id : '') }}" name="pageId">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">Title</label>
                                    <input type="text" class="form-control" value="{{ (!empty($page->title) ? $page->title : '') }}" name="title" id="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Meta Title">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" value="{{ (!empty($page->meta_title) ? $page->meta_title : '') }}" id="meta_title" placeholder="Meta Title">
                                </div>
                            </div>
                            @if(!empty($page->banner_image_name))
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="hidden_banner_image_name" value="{{ (!empty($page->banner_image_name) ? $page->banner_image_name : '') }}">
                                   <img class="thumb-xl" src="{{ asset("public".\Illuminate\Support\Facades\Storage::url($page->banner_image_name)) }}">
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Meta Description">Banner Image</label>
                                    <input type="file" class="form-control" name="banner_image_name" id="banner_image_name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Meta Description">Banner Text</label>
                                    <input type="text" class="form-control" value="{{ (!empty($page->banner_text) ? $page->banner_text : '') }}" name="banner_text" id="banner_text" placeholder="Banner Text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Meta Description">Meta Description</label>
                                    <textarea class="form-control editor" name="meta_description" id="meta_description" rows="6">{!! (!empty($page->meta_description) ? $page->meta_description : '') !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Meta Title">Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" value="{{ (!empty($page->meta_keywords) ? $page->meta_keywords : '') }}" id="meta_keywords" placeholder="Meta Keywords">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Meta Description">Content</label>
                                    <textarea class="form-control editor" name="content" id="content" rows="6">{!! (!empty($page->content) ? $page->content : '') !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Meta Description">Is Disabled</label>
                                    <select class="form-control" name="is_disabled">
                                        <option value="">Select</option>
                                        <option value="1" @if(isset($page->is_disabled) && $page->is_disabled ==1) selected @endif>Yes</option>
                                        <option value="0" @if(isset($page->is_disabled) && $page->is_disabled ==0) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5 text-right">
                            <input type="submit" class="btn btn-primary text-white" value="Update">
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
