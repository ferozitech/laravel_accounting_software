@extends('frontend.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12  pt-5 pb-4 loginDetails">
                <div class="col fieldset-heading">
                    <a href="{{route('groups')}}">
                        <button class="btn btn-dark mb-2 float-right">Back</button>
                    </a>
                    <h5>Company group information</h5>
                    <p>Please fill all the required informations</p>
                </div>
                {!! Form::open(array('route' => 'storeGroup','id' => 'updategroup')) !!}
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Parent Group(*)</label>
                        <select class="form-control" name="parentId" required="">
                            @if(!empty($parentGroups))
                                <option value="">Select</option>
                                @foreach($parentGroups as $group)
                                    <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="companyName">Title</label>
                        <input type="text" name="title" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="companyName">Code</label>
                        <input type="text" name="code" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary float-right w-25">Add Now</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('flashy::message')
@endsection
