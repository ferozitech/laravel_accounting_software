@extends('frontend.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="container pt-4 accounts-clbg">
        <div class="row dc-ledger-row">
            <div class="col-auto ml-auto text-right my-3 convertInto">
                <span>Convert Into:</span>
                <button class="btn btn-default mx-2 mb-2">
                    <img src="{{ asset('public/assets/frontend/images/pdf.png') }}" width="24" height="24" />
                </button>
                <button class="btn btn-default mr-2 mb-2">
                    <img src="{{ asset('public/assets/frontend/images/microsoftexcel.png') }}" width="24" height="24"  />
                </button>
                <a href="{{ route('create-group') }}">
                    <button class="btn mr-2 mb-2 btn-success" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">Add New</button>
                </a>
                <a href="{{ route('user-dashboard') }}">
                <button class="btn btn-dark mb-2">Back to Main</button>
                </a>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
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
            </div>
            <div class="col-xl-12 col-lg-12 mb-4 dc-ledger">
                <table class="table">
                    <thead class="table-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Company</th>
                        <th scope="col">Type</th>
                        <th scope="col">Code</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($companyGroups))
                        @php $counter=1; @endphp
                        @forelse ($companyGroups as $group)
                            <tr>
                                <th>{{ $counter }}</th>
                                <th>{{ $group->title }}</th>
                                <th>{{ $group->company->Title }}</th>
                                <th>{{ $group->type }}</th>
                                <th>{{ $group->code }}</th>
                                <td>{{ \Carbon\Carbon::parse($group->created_at)->format('d F, h:i A, Y') }}</td>
                                <th>
                                    <a href="{{ route('edit-group',$group->id) }}">
                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <a onclick="return confirm(' you want to delete?');" href="{{ route('destroyGroup',$group['id']) }}">
                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                    </a>
                                </th>
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

            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('flashy::message')
@endsection
