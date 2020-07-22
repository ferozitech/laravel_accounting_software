@extends('backend.layouts.app')
@section('style')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
                        <h4 class="mt-0 header-title">Update Company Information</h4>
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
                        {!! Form::open(array('route' => 'updateCompany','id' => 'submitPage','class'=>'form-horizontal','files' => true)) !!}
                        <div class="row">
                            <input type="hidden" name="companyId" value="{{ (isset($company->id) ? $company->id : '') }}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">Title</label>
                                    <input type="text" class="form-control" value="{{ (isset($company->Title) ? $company->Title : '') }}" name="title" id="title" placeholder="Title" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">Email</label>
                                    <input type="email" class="form-control" value="{{ (isset($company->email) ? $company->email : '') }}" name="email" id="title" placeholder="email" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">phone</label>
                                    <input type="text" class="form-control" value="{{ (isset($company->phone) ? $company->phone : '') }}" name="phone" id="phone" placeholder="phone" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                            @if(!empty($company->logo))
                                <input type="hidden" name="companylogo" value="{{ (isset($company->logo) ? $company->logo : '') }}">
                                <img class="thumb-xl" src="{{ asset("public".\Illuminate\Support\Facades\Storage::url($company->logo)) }}">
                            @endif
                            </div><div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">logo</label>
                                    <input type="file" class="form-control" name="logo" id="logo">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">website</label>
                                    <input type="text" class="form-control" value="{{ (isset($company->website) ? $company->website : '') }}" name="website" id="website" placeholder="website">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">financial period from </label>
                                    <input type="text" class="form-control datepicker2"   name="financial_period_from" value="{{$company->financial_period_from}}" required="" id="financial_period_from" placeholder="financial period from">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">financial period to</label>
                                    <input type="text" class="form-control datepicker2" value="{{ (isset($company->financial_period_to) ? $company->financial_period_to : '') }}" name="financial_period_to" required="" id="financial_period_to" placeholder="financial period to">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">registration number</label>
                                    <input type="text" class="form-control" required="" value="{{ (isset($company->registration_number) ? $company->registration_number : '') }}" name="registration_number" id="registration_number" placeholder="registration number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">date of incorpr</label>
                                    <input type="text" class="form-control datepicker2" name="date_of_incorp" value="{{ (isset($company->date_of_incorp) ? $company->date_of_incorp : '') }}" id="date_of_incorp" placeholder="date of incorpr">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">ntn number</label>
                                    <input type="text" class="form-control" required="" value="{{ (isset($company->ntn_number) ? $company->ntn_number : '') }}" name="ntn_number" id="ntn_number" placeholder="ntn number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">salestax number</label>
                                    <input type="text" class="form-control" required="" value="{{ (isset($company->salestax_number) ? $company->salestax_number : '') }}" name="salestax_number" id="salestax_number" placeholder="salestax number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">authorised capital</label>
                                    <input type="text" class="form-control" name="authorised_capital" value="{{ (isset($company->authorised_capital) ? $company->authorised_capital : '') }}" id="authorised_capital" placeholder="authorised capital">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">paidup capital</label>
                                    <input type="text" class="form-control" name="paidup_capital" value="{{ (isset($company->paidup_capital) ? $company->paidup_capital : '') }}" id="paidup_capital" placeholder="paidup capital">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Title">share price</label>
                                    <input type="text" class="form-control" name="share_price" value="{{ (isset($company->share_price) ? $company->share_price : '') }}" id="share_price" placeholder="share price">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="totalUser" value="{{ (!empty($company->users)) ? $company->users->count() : 0 }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h4 class="mt-0 header-title">Company Users</h4>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="addMoreUsersBody">
                                    @if(!empty($company->users))
                                        @php $counter=1; @endphp
                                        @foreach($company->users as $user)
                                      <tr class="user_listing">
                                          <input type="hidden" class="userId" value="{{$user->id}}">
                                         <td>{{ $counter }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td name="buttons">
                                            <div class=" pull-right">
                                               <button id="bElim" type="button" class="btn delete btn-sm btn-soft-danger btn-circle"><i class="dripicons-trash" aria-hidden="true"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                            @php $counter++; @endphp
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <p></p>
                            </div>
                            <div class="form-group text-right">
                                <div class="col-md-12">
                                    <button type="button" onclick="appenduserBlock()" class="pull-right text-right btn-small rounded btn-primary text-white float-right">Add User</button>
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
        $(".datepicker2").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
        });
        var total =$('#totalUser').val()
        function appenduserBlock(){
            total++;
            $('#addMoreUsersBody').append('<tr class="user_listing">\n' +
                '<td>'+total+'</td>\n' +
                '<input type="hidden" class="number" value="'+total+'">\n' +
                '<td><input type="text" class="form-control name" placeholder="name"></td>\n' +
                '<td><input type="email" class="form-control email" placeholder="email"></td>\n' +
                '<td><input type="text" class="form-control phone" placeholder="phone"></td>\n' +
                '<td name="buttons">\n' +
                '<div class=" pull-right">\n' +
                '<button id="bElim" type="button" onclick="saveUserobject(this)" class="btn btn-sm btn-soft-success btn-circle"><i class="dripicons-checkmark" aria-hidden="true"></i></button>\n' +
                '<button id="bElim" type="button" class="btn delete btn-sm btn-soft-danger btn-circle"><i class="dripicons-trash" aria-hidden="true"></i></button>\n' +
                '</div>\n' +
                '</td>\n' +
                '</tr>')
            $('#totalUser').val(parseInt(total))
        }
        $(document).on('click', '.delete', function(e) {
            if (confirm("Are you sure?")) {
                $(this).closest('.user_listing').remove();
                var parent =$(this).parent().parent().parent();
                var userId =parent.find('input.userId').val()
                $.post('{{ route('deleteUser') }}', {_token:'{{ csrf_token() }}',userId:userId}, function (data) {

                });
            }
            return false;
        });
        function saveUserobject(e){
            var parent =$(e).parent().parent().parent();
            var number =parent.find('input.number').val()
            var name =parent.find('input.name').val()
            var email =parent.find('input.email').val()
            var phone =parent.find('input.phone').val()
            if(name =='' || email =='' ||  phone ==''){
                alert('please fill all fields before submiting')
                return false;
            }
            parent.empty()
            parent.append('<td>'+number+'</td>\n' +
                '<td>'+name+'</td>\n' +
                '<td>'+email+'</td>\n' +
                '<td>'+phone+'</td>\n' +
                '<td name="buttons">\n' +
                '<div class=" pull-right">\n' +
                '<button id="bElim" type="button" class="btn delete btn-sm btn-soft-danger btn-circle"><i class="dripicons-trash" aria-hidden="true"></i></button>\n' +
                '</div>\n' +
                '<input type="hidden" name="user_object['+number+'][name]" value="'+name+'">\n' +
                '<input type="hidden" name="user_object['+number+'][email]" value="'+email+'">\n' +
                '<input type="hidden" name="user_object['+number+'][phone]" value="'+phone+'">\n' +
                '</td>')
        }
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
