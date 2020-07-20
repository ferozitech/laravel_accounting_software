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
                {!! Form::open(array('route' => 'update-group','id' => 'updategroup')) !!}
                <input type="hidden" name="groupId" value="{{$companyGroup->id}}">
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
                                        <option @if(!empty($companyGroup->parentId) && $companyGroup->parentId==$group->id) selected @endif value="{{$group->id}}">{{$group->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="companyName">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ (isset($companyGroup->title) ? $companyGroup->title : '') }}" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Type</label>
                            <select class="form-control" name="type">
                                <option value="">Select</option>
                                <option value="credit" @if(!empty($companyGroup->type) && $companyGroup->type=='credit') selected @endif>Credit</option>
                                <option value="debit" @if(!empty($companyGroup->type) && $companyGroup->type=='debit') selected @endif>Debit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="companyName">Code</label>
                            <input type="text" name="code" value="{{ (isset($companyGroup->code) ? $companyGroup->code : '') }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary float-right w-25">Update Now</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('flashy::message')
@endsection
