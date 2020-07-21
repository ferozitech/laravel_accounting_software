@extends('frontend.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12  pt-5 pb-4 loginDetails">
                <div class="col fieldset-heading">
                    <a href="{{route('ledgers')}}">
                        <button class="btn btn-dark mb-2 float-right">Back</button>
                    </a>
                    <h5>Update Ledger</h5>
                    <p>Please fill all the required informations</p>
                </div>
                {!! Form::open(array('route' => 'updateLedger','id' => 'storeLedger')) !!}
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
                <input type="hidden" name="ledgerId" value="{{ (isset($ledgerdetail->id) ? $ledgerdetail->id : '') }}">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="companyName">Title</label>
                        <input type="text" name="title" value="{{ (isset($ledgerdetail->title) ? $ledgerdetail->title : '') }}" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Parent Group(*)</label>
                        <select class="form-control" name="groupId" required="">
                            @if(!empty($groups))
                                <option value="">Select</option>
                                @foreach($groups as $group)
                                    <option @if(isset($ledgerdetail->group->id) && $ledgerdetail->group->id == $group->id) selected @endif value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="companyName">Ref Number</label>
                        <input type="text" name="ref_number" value="{{ (isset($ledgerdetail->ref_number) ? $ledgerdetail->ref_number : '') }}" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="companyName">Party Ref Number</label>
                        <input type="text" name="party_ref_number" value="{{ (isset($ledgerdetail->party_ref_number) ? $ledgerdetail->party_ref_number : '') }}" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="companyName">Opening Balance</label>
                        <input type="text" name="opening_balance" value="{{ (isset($ledgerdetail->opening_balance) ? $ledgerdetail->opening_balance : '') }}" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="companyName">Account Serial</label>
                        <input type="text" name="account_serial" value="{{ (isset($ledgerdetail->account_serial) ? $ledgerdetail->account_serial : '') }}" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="message">description</label>
                        <textarea class="form-control" id="description" name="description" cols="30" rows="3">{!! (isset($ledgerdetail->description) ? $ledgerdetail->description : '') !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary float-right w-25">Update</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('flashy::message')
@endsection
