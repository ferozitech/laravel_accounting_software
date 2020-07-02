@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')
 <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Metrica</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">CRM</a></li>
                            <li class="breadcrumb-item active">Forms</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Blogs</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h4 class="mt-0 header-title">All Blogs</h4>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Desc</th>
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th>Is Featured</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($blogs))
                                @php $counter=1; @endphp
                                @forelse ($blogs as $blog)
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{!! $blog->meta_description !!}</td>
                                    <td>
                                    @if(!empty($blog->main_image))
                                            <img class="thumb-sm" src="{{ asset("public".\Illuminate\Support\Facades\Storage::url($blog->main_image)) }}">
                                        @endif
                                    </td>
                                    <td>{{ $blog->author->name }}</td>
                                    <td>{{ ($blog->is_featured == '1') ? "Yes" : "No" }}</td>
                                    <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('d F, h:m A, Y') }}</td>
                                    <td name="buttons">
                                        <div class=" pull-right">
                                            <a href="{{ route('edit-blog',$blog['slug']) }}">
                                                <button id="bEdit" type="button" class="btn btn-sm btn-soft-success btn-circle mr-2"><i class="dripicons-document-edit"></i></button>
                                            </a>
                                            <a onclick="return confirm(' you want to delete?');" href="{{ route('deleteBlog',$blog['id']) }}">
                                                <button id="bElim" type="button" class="btn btn-sm btn-soft-danger btn-circle"><i class="dripicons-trash" aria-hidden="true"></i></button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @php $counter++; @endphp
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5"><i>No Record Found!</i></td>
                                    </tr>
                                @endforelse
                                @endif
                                </tbody>
                            </table>
                            <p><?php  if(isset($links)){ echo $links; } ?></p>
                            <!--end /table-->
                        </div>
                        <!--end /tableresponsive-->
                    </div>
                    <!--end card-body-->
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('public/assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    @include('flashy::message')
    <script> </script>
@endsection
