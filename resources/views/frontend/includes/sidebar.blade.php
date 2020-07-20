<div class="border-right a-sidebar" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <a href="{{ route('user-dashboard') }}">
            <img src="{{ asset('public/assets/frontend/images/logo.png') }}" alt="Accounts 313">
        </a>
    </div>
    <div class="list-group list-group-flush">
        <li class="nav-item dropdown createNewDropdown">
            <a class="nav-link dropdown-toggle" href="#" id="createNew" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus-circle"></i>
                Create New</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="createNew">
                <a class="dropdown-item" href="#">Create New</a>
                <a class="dropdown-item" href="#">Company Profile</a>
                <a class="dropdown-item" href="#">Vouchers</a>
                <a class="dropdown-item" href="{{ route('create-group') }}">Groups</a>
                <a class="dropdown-item" href="{{ route('create-ledger') }}">Ledgers</a>
            </div>
        </li>
        <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action"><span>Transactions</span> <i class="fas fa-chevron-right"></i></a>
        <li class="nav-item dropdown mega-menu">
            <a class="nav-link dropdown-toggle" href="#" id="Transactions" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><span>Accounting Reports</span> <i
                    class="fas fa-chevron-right"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Transactions">
                <div class="row megaMenuRow">
                    <div class="col-12">
                        <h6>Accounting Reports</h6>
                    </div>
                    <div class="col-6">
                        <a class="dropdown-item" href="#">Cash Book</a>
                        <a class="dropdown-item" href="#">Bank Book</a>
                        <a class="dropdown-item" href="#">Ledgers</a>
                        <a class="dropdown-item" href="#">Group Reports</a>
                        <a class="dropdown-item" href="#">Voucher Reports</a>
                        <a class="dropdown-item" href="#">Trial Balance</a>
                    </div>
                    <div class="col-6">
                        <a class="dropdown-item" href="#">Depreciation Schedule</a>
                        <a class="dropdown-item" href="#">Notes Accounts</a>
                        <a class="dropdown-item" href="#">Cash Flow Statements</a>
                        <a class="dropdown-item" href="#">Profit and Loss</a>
                        <a class="dropdown-item" href="#">Balance Sheet</a>
                        <a class="dropdown-item" href="#">Previous Years Account</a>
                    </div>
                </div>
            </div>
        </li>
        <a href="#" class="list-group-item list-group-item-action"><span>Other Reports</span> <i
                class="fas fa-chevron-right"></i></a>
        <a href="#" class="list-group-item list-group-item-action">Components</a>
    </div>
</div>
