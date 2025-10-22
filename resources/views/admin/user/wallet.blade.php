@extends('layouts.admin')

@section('title')
Customers Wallet
@endsection

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0"> Customers Wallet</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Customers Wallet</li>
</ul>
@endsection
@section('content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<div class="col-sm-12">
    <div class="alert alert-{{ $msg }} alert-dismissible fade show" wallet="alert">
        {{ Session::get('alert-' . $msg) }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
@endforeach
@if ($errors->any())
<div class="col-sm-12">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
</div>
@endif


<!-- user table -->
<div class="card">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <form action="{{ url('admin/wallet') }}" method="get" id="filter_form">
                <div class="row">
                    <div class="col-md-7">
                        <div class="input-group">
                            <input type="text" id="searchInput" name="searchTerm" value="{{ request()->input('searchTerm') }}" class="form-control" placeholder="Search Customer" aria-label="Search Fields" aria-describedby="basic-addon1">
                            <button type="submit" class="btn btn-primary" aria-label="Search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <select class="form-select" data-control="select2" data-placeholder="Select Status"
                            data-hide-search="true" name="status" id="FilterStatus" onchange="this.form.submit()">
                            <option value="">Select Status</option>
                            <option value="1" {{ Request::get('status') === '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ Request::get('status') === '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card-body pt-0" id="tableDiv">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
            <thead>
                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="text-center min-w-25px">#</th>
                    <th class="text-center min-w-125px">Customer</th>
                    <th class="text-center min-w-125px">Total Amount</th>
                    <th class="text-center min-w-125px">Paid Amount</th>
                    <th class="text-center min-w-125px">Balance Amount</th>
                    <th class="text-center min-w-125px">Status</th>
                    @if (in_array('update-user-wallet', config('updatePermissions')))
                    <th class="text-center min-w-70px">Update</th>
                    @endif
                    <th class="text-center min-w-70px">History</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                @if($wallets->count() == 0)
                <tr>
                    <td colspan="8">
                        <p class="text-gray-400 fs-4 fw-semibold mb-10 text-center">No Result Found</p>
                    </td>
                </tr>
                @else
                @foreach ($wallets as $index => $data)
                <tr>
                    <td class="text-center">{{ $index + 1 + ($wallets->currentPage() - 1) * $wallets->perPage() }}
                    </td>
                    <td class="text-center">
                        {{ $data->customer ? $data->customer->fname . ' ' . $data->customer->lname : 'Not Found' }}
                    </td>
                    <td class="text-center">
                        {{ $data->totalAmount}}
                    </td>
                    <td class="text-center">
                        {{ $data->paidAmount}}
                    </td>
                    <td class="text-center">
                        {{ $data->balanceAmount}}
                    </td>
                    <td class="text-center">
                        @if(optional($data->customer)->status == 1)
                        <div class="badge badge-light-success">
                            Active
                        </div>
                        @else
                        <div class="badge badge-light-danger">
                            Inactive
                        </div>
                        @endif
                    </td>
                    @if (in_array('update-user-wallet', config('updatePermissions')))
                    <td class="text-center">
                        <div class="align-middle text-center">
                            <a class="btn btn-icon btn-outline-warning has-ripple" data-bs-toggle="modal" onclick="openUpdateModal('{{$data->customerUid}}')" data-bs-target="#historyModal" style="border-radius: 50%;"><i class="fas fa-pen"></i></a>
                        </div>
                    </td>
                    @endif
                    <td class="text-center">
                        <div class="align-middle text-center">
                            <a class="btn btn-icon btn-outline-warning has-ripple" href="{{'admin/wallet/wallethistory?customerUid=' . $data->customerUid}}" style="border-radius: 50%;"><i class="fas fa-eye"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="mt-5" id="pagination">
            {{ $wallets->appends(request()->query())->links() }}
        </div>

    </div>
</div>

<!-- Update modal start -->
<div class="modal fade" id="historyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-550px">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h1 class="modal-title w-100 text-center">Update Wallet of <span id="customerName"></span></h1>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <form autocomplete="off" action="{{url('admin/wallet/update')}}" enctype="multipart/form-data" method="post" id="updateForm">
                @csrf
                <input type="hidden" id="customerUid" name="customerUid">
                <div class="modal-body scroll-y px-10 pt-0">
                    <div class="row g-3 mt-3">
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2 ">Type</label>
                            <select class="form-select " data-control="select2" data-placeholder="Select Type"
                                data-hide-search="true" name="type" id="type">
                                <option value=""></option>
                                <option value="Credit">Credit</option>
                                <option value="Debit">Debit</option>
                            </select>
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Amount</label>
                            <input type="number" step="0.01" class="form-control" placeholder="Enter Amount" id="amount" name="amount" min="0">
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Remark</label>
                            <textarea class="form-control" placeholder="Enter Remark" id="adminRemark" name="adminRemark"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="updateBtn">
                        <span class="indicator-label">Update</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Update modal end -->

@endsection

@section('scripts')

<!-- Required Field Validation -->
<script>
    var KTModalUpdate = function() {
        var t, e, o, n, r, i;
        return {
            init: function() {
                r = document.querySelector("#updateForm"),
                    t = r.querySelector("#updateBtn"),
                    n = FormValidation.formValidation(r, {
                        fields: {
                            type: {
                                validators: {
                                    notEmpty: {
                                        message: "Select type is required"
                                    },
                                }
                            },
                            amount: {
                                validators: {
                                    notEmpty: {
                                        message: "Enter amount is required"
                                    },
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger,
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row",
                                eleInvalidClass: "",
                                eleValidClass: ""
                            })
                        }
                    }), t.addEventListener("click", (function(e) {
                        e.preventDefault(), n && n.validate().then((function(e) {

                            console.log("validated!"), "Valid" == e ? (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0, setTimeout((function() {
                                t.removeAttribute("data-kt-indicator")
                                e.isConfirmed && (t.disabled = !1)

                                // Submit form
                                r.submit();

                            }), 2e3)) : Swal.fire({
                                text: "Sorry, looks like there are some missing fields, please try again.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            })
                        }))
                    }))
                $('select').change(function() {
                    var fieldName = $(this).attr('name');
                    n.revalidateField(fieldName);
                });
            }
        }
    }();
    KTUtil.onDOMContentLoaded((function() {
        KTModalUpdate.init()
    }));
</script>

<!-- Modal -->
<script>
    var wallets = @json($wallets);
    wallets = wallets.data;
    var isEditMode = false;

    function openUpdateModal(customerUid) {
        var wallet = wallets.find(x => x.customerUid == customerUid);
        $('#customerUid').val(wallet.customerUid);
        $('#customerName').html(wallet.customer.fname + ' ' + wallet.customer.lname);
    }

    document.getElementById('updateForm').onsubmit = function(e) {
        document.getElementById('updateBtn').disabled = true;
    };
</script>

@endsection