@extends('frontend.layouts.app')
@section('style')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container pt-4 accounts-clbg">
        <div class="row dc-ledger-row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="col fieldset-heading">
                    <a href="http://localhost/accounts313/groups">
                        <button class="btn btn-dark mb-2 float-right">Back</button>
                    </a>
                    <h5>Company group information</h5>
                    <p>Please fill all the required informations</p>
                </div>
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
            <div class="container">
                <div class="col-xl-12 col-lg-12 mb-4 dc-ledger create-voucher">
                    <div class="form-group">
                        <label for="Title">Number</label>
                        <input type="text" class="form-control other-inputs" name="title" id="number" placeholder="number" required="">
                    </div>
                    <div class="form-group">
                        <label for="Title">Date</label>
                        <input type="text" class="form-control datepicker2 other-inputs" name="title" id="title" placeholder="date" required="">
                    </div>
                    <div class="form-group">
                        <label for="Title">Type</label>
                        <select class="form-control other-inputs" name="type">
                            <option value="">Select Type</option>
                            <option value="">Type 2</option>
                            <option value="">Type 3</option>
                            <option value="">Type 4</option>
                            <option value="">Type 5</option>
                        </select>
                    </div>
                    <table class="table table-bordered">
                        <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th scope="col">Ledgers</th>
                            <th scope="col">Debit</th>
                            <th scope="col">Credit</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody id="parentBody">
                        <tr class="toAppend">
                            <th>1</th>
                            <th onclick="appendLedgers(this)">what text category fits?</th>
                            <th>is it credit</th>
                            <th>is it debit</th>
                            <th scope="col"></th>
                        </tr>
                        <tr id="lastChild">
                            <th>2</th>
                            <th onclick="appendLedgers(this)"></th>
                            <th></th>
                            <th></th>
                            <th scope="col"></th>
                        </tr>
                        </tbody>
                        <tr class="table-light table-footer create-voucher-footer">
                            <th scope="row"></th>
                            <td></td>
                            <td id="totaldebit">0</td>
                            <td class="balance-td" id="totalCredit">0</td>
                            <th scope="col"></th>
                        </tr>
                    </table>
                    <div class="form-group">
                        <label for="Title">Description</label>
                        <input type="text" class="form-control other-inputs" name="description" id="title" placeholder="description" required="">
                    </div>
                    <div class="form-group">
                        <label for="Title">Attachment</label>
                        <input type="file" class="form-control other-inputs" name="title" id="title" placeholder="date" required="">
                    </div>
                    <div class="form-group mt-5 text-right">
                        <input type="submit" class="btn btn-primary text-white" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="totalUser" value="1">
@endsection
@section('script')
    @include('flashy::message')
    <script type="application/javascript">
        $(".datepicker2").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
        });
        var total =$('#totalUser').val()
        function appendLedgers(e) {
            total++;
            prarent =$(e).parent()
            parentClass= prarent.attr('class');
            if(parentClass ==='toAppend'){
                number=1
                if(total>2){total--}
                prarent.attr('id', 'lastChild');
            }else{
                number=total
            }
            prarent.empty().append('<th>'+number+'</th>\n' +
                '<th>\n'+
                '<select class="form-control">\n' +
                '<option value="">Select Ledger</option>\n' +
                '@if(!empty($ledgers))\n'+
                '@foreach($ledgers as $ledger)\n' +
                '<option value="{{$ledger->id}}">{{$ledger->title}}</option>\n'+
                '@endforeach\n' +
                '@endif\n' +
                '</select>\n' +
                '</th>\n' +
                '<th>\n' +
                '<input type="text" class="debit form-control debit" placeholder="amount">\n'+
                '</th>\n'+
                '<th>\n'+
                '<input type="text" class="credit form-control credit" placeholder="amount\">\n'+
                '</th>'+
                '<th><button class="btn delete btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></th>'+
                '');
            parentId= prarent.attr('id');
            if(parentId ==='lastChild' && number !==1){
                $('#parentBody').append('<tr id="lastChild">\n'+
                    '<th>'+parseInt(total+1)+'</th>\n' +
                    "<th onclick=\"appendLedgers(this)\"></th>\n" +
                    "<th></th>\n" +
                    "<th></th>\n" +
                    "<th></th>\n" +
                    "</tr>");
            }
            number++;
        }
        $(document).on('click', '.delete', function(e) {
            $(this).closest('#lastChild').remove();
            total--;
            return false;
        });

        $(document).on("keyup", ".credit" , function() {
            var sum2 = 0;
            $(".credit").each(function(){
                sum2 += +this.value;
            });
            $("#totalCredit").text('Total Credit: RS '+addCommas(sum2));
        });

        $(document).on("keyup", ".debit" , function() {
            var sum1 = 0;
            $(".debit").each(function(){
                sum1 += +this.value;
            });
            $("#totaldebit").text('Total Debit: RS '+addCommas(sum1));
        });

        function addCommas(nStr)
        {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
@endsection
