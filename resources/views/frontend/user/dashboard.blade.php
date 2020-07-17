@extends('frontend.layouts.app')
@section('style')
@endsection
@section('content')
 <div class="container pt-4 accounts-clbg">
        <div class="row dc-listening-row">
            <div class="col-xl-4 col-lg-6 mb-4 dc-listening">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-10">
                                <h5 class="DeepSkyBlue">voucher</h5>
                                <p>24,2020 : 03:13pm</p>
                            </div>
                            <div class="col">
                                <a href="#">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="amountType">Difference</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <h4 class="closingAmount">2,00.000.<span>00</span></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-default">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-4 col-lg-6 mb-4 dc-listening">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-10">
                                <h5 class="DeepSkyBlue">Groups</h5>
                                <p>Last Updated Group 26/03/2020</p>
                            </div>
                            <div class="col">
                                <a href="#">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="amountType">Trade Receivables</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Closing Amount</p>
                            </div>
                            <div class="col pl-0">
                                <h4 class="closingAmount">2,00.000.<span>00</span></h4>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <p>Opening Amount</p>
                            </div>
                            <div class="col pl-0">
                                <h5 class="openingAmount">2,00.000.<span>00</span></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-default">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-4 col-lg-6 mb-4 dc-listening">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-10">
                                <h5 class="DeepSkyBlue">Ledger</h5>
                                <p>Period 01/07/2020 - 30/06/2021</p>
                            </div>
                            <div class="col">
                                <a href="#">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="amountType">Balance</h5>
                            </div>
                        </div>
                        <div class="row  mb-3">
                            <div class="col">
                                <h4 class="closingAmount balanceAmount">2,00.000.<span>00</span></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-default">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row dc-ledger-row">
            <div class="col-auto ml-auto text-right my-3 convertInto">
                <span>Convert Into:</span>
                <button class="btn btn-default mx-2 mb-2">
                    <img src="{{ asset('public/assets/frontend/images/pdf.png') }}" width="24" height="24" />
                </button>
                <button class="btn btn-default mr-2 mb-2">
                    <img src="{{ asset('public/assets/frontend/images/microsoftexcel.png') }}" width="24" height="24"  />
                </button>
                <button class="btn btn-dark mb-2">Back to Main</button>
            </div>
            <div class="col-xl-12 col-lg-12 mb-4 dc-ledger">
                <table class="table">
                    <thead class="table-primary">
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Our Ref.</th>
                        <th scope="col">Party Ref.</th>
                        <th scope="col">Voucher Type</th>
                        <th scope="col">Debit</th>
                        <th scope="col">Credit</th>
                        <th scope="col">Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">01</th>
                        <td>23/02/2020</td>
                        <td>Lodum ipsum dolor sit amet
                            conquer lorem.
                        </td>
                        <td></td>
                        <td></td>
                        <td>Bank Recipt</td>
                        <td></td>
                        <td class="credit-td">1,00,000.00</td>
                        <td>( 1,00,000.00 )</td>
                    </tr>
                    <tr class="tableInfo">
                        <th scope="row">02</th>
                        <td>23/02/2020</td>
                        <td>Lodum ipsum dolor sit amet
                            conquer lorem.
                        </td>
                        <td></td>
                        <td></td>
                        <td>Sales Invoice</td>
                        <td class="debit-td">1,20,000.00</td>
                        <td></td>
                        <td>20,000.00</td>
                    </tr>
                    <tr>
                        <th scope="row">02</th>
                        <td>23/02/2020</td>
                        <td>Lodum ipsum dolor sit amet
                            conquer lorem.
                        </td>
                        <td></td>
                        <td></td>
                        <td>Sales Invoice</td>
                        <td class="debit-td">1,20,000.00</td>
                        <td></td>
                        <td>20,000.00</td>
                    </tr>
                    <tr class="tableInfo">
                        <th scope="row">02</th>
                        <td>23/02/2020</td>
                        <td>Lodum ipsum dolor sit amet
                            conquer lorem.
                        </td>
                        <td></td>
                        <td></td>
                        <td>Sales Invoice</td>
                        <td class="debit-td">1,20,000.00</td>
                        <td></td>
                        <td>20,000.00</td>
                    </tr>
                    <tr class="table-light table-footer">
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>3,40,000.00</td>
                        <td>1,00,000.00</td>
                        <td class="balance-td">2,40,000.00</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('flashy::message')
@endsection
