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
                    <h4 class="page-title">Companies</h4>
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
                                <h4 class="mt-0 header-title">All Companies</h4>
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
                                    <th>Logo</th>
                                    <th>Users</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($companies))
                                    @php $counter=1; @endphp
                                    @forelse ($companies as $company)
                                        <tr>
                                            <td>{{ $counter }}</td>
                                            <td>{{ $company->Title }}</td>
                                            <td>
                                                @if(!empty($company->logo))
                                                    <img class="thumb-sm" src="{{ asset("public".\Illuminate\Support\Facades\Storage::url($company->logo)) }}">
                                                @endif
                                            </td>
                                            <td>{{ $company->users->count() }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td>{{ $company->phone }}</td>
                                            <td>{{ $company->website }}</td>
                                            <td>{{ \Carbon\Carbon::parse($company->created_at)->format('d F, h:m A, Y') }}</td>
                                            <td name="buttons">
                                                <div class=" pull-right">
                                                    <a href="#">
                                                        <button id="bEdit" type="button" class="btn btn-sm btn-soft-success btn-circle mr-2"><i class="dripicons-document-edit"></i></button>
                                                    </a>
                                                    <a onclick="return confirm(' you want to delete?');" href="#">
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
                                @else
                                <tr>
                                    <td class="text-center" colspan="5"><i>No Record Found!</i></td>
                                </tr>
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
