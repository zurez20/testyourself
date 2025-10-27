@extends('layouts.admin')

@section('title')
    Question & Answer
@endsection

@section('header')
@endsection


@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Question & Answer</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">Question & Answer</li>
    </ul>
@endsection
@section('content')

    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has('alert-' . $msg))
            <div class="col-sm-12">
                <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                    {{ Session::get('alert-' . $msg) }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
    @endforeach
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="col-sm-12">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        </div>
    @endif


    <!-- table -->
    @if ($questions->count() == 0)
        <div class="card">
            <div class="card-body p-0">
                <div class="text-center px-4">
                    <img class="mw-100 mh-300px" alt="" src="assets/media/illustrations/sketchy-1/5.png" />
                </div>
                <div class="card-px text-center py-20 ">
                    <p class="text-gray-400 fs-4 fw-semibold mb-10">Looks like you do not have any questions added here.
                        <br />If you want to add a question, click on the button below.
                    </p>
                    </p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal"><span
                            class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                    fill="currentColor" />
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                    transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                    fill="currentColor" />
                            </svg>
                        </span>Add Question & Answer
                    </button>
                </div>

            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <input type="text" data-kt-customer-table-filter="search" class="form-control w-250px ps-15"
                            placeholder="Search Question & Answer " />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal">
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                        fill="currentColor" />
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                        transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            Add Question & Answer
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0" id="tableDiv">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                    <thead>
                        <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="text-center min-w-50px">Sr. No</th>
                            <th class="text-center min-w-50px">Questions</th>
                            <th class="text-center min-w-50px">Answers</th>
                            <th class="text-center min-w-50px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($questions as $index => $data)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>

                                <!-- Question -->
                                <td class="text-center">
                                    {{ $data->question ?? 'Not Found' }}
                                </td>

                                <!-- Answers -->
                                <td class="text-center">
                                    @if ($data->answers->count() > 0)
                                        <ul class="list-unstyled mb-0">
                                            @foreach ($data->answers as $answer)
                                                <li class="{{ $answer->isCorrect ? 'text-success fw-bold' : '' }}">
                                                    {{ $answer->answer }}
                                                    @if ($answer->isCorrect)
                                                        <span class="badge bg-success ms-1">Correct</span>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="text-muted">No answers added</span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="text-center">
                                    <div class="align-middle text-center">
                                        <a class="btn btn-icon btn-outline-danger has-ripple" data-bs-toggle="modal"
                                            onclick="openDeleteModal('{{ $data->id }}')" data-bs-target="#deleteModal"
                                            style="border-radius: 50%;">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    @endif
    <!--create modal start-->
    <div class="modal fade addclearonclose" id="addmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h1 class="modal-title w-100 text-center">Add Question & Answers</h1>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>

                <form autocomplete="off" action="{{ url('admin/question/add') }}" enctype="multipart/form-data"
                    method="POST" id="addForm">
                    @csrf
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0">
                        <div class="row g-5 mt-2">
                            <div class="col-md-12 fv-row mt-5">
                                <label class="required fs-6 fw-semibold mb-2">Question</label>
                                <input type="text" class="form-control" placeholder="Enter Question" id="question"
                                    name="question" required>
                            </div>

                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Category</label>
                                <select class="form-select" name="categoryId" id="categoryId" data-control="select2"
                                    data-hide-search="true">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Age Range</label>
                                <select class="form-select" name="agerangeId" id="agerangeId" data-control="select2"
                                    data-hide-search="true">
                                    @foreach ($ageranges as $agerange)
                                        <option value="{{ $agerange->id }}">{{ $agerange->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr class="mt-5 mb-0">

                            <div class="col-md-12 mt-5">
                                <label class="fs-5 fw-bold mb-3">Answers</label>

                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="correct_answer"
                                                value="{{ $i }}" id="correct_answer_{{ $i }}"
                                                required>
                                        </div>
                                        <input type="text" class="form-control"
                                            placeholder="Enter Answer {{ $i }}" name="answers[]"
                                            id="answer_{{ $i }}" required>
                                    </div>
                                @endfor

                                <small class="text-muted">Select one answer as correct.</small>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="addBtn">
                            <span class="indicator-label">Add Question</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--create modal end-->

    <!--delete modal start-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Question & Answer</h5>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <form action="{{ url('admin/question/delete') }}" id="deleteForm" method="post">
                    @csrf
                    <input type="hidden" id="questionId" name="questionId">
                    <div class="modal-body">
                        <span>Are you sure you want to delete this question ? <br> Action cannot be reverted</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">No</button>
                        <button type="submit" id="delYes" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--delete modal end-->
@endsection

@section('scripts')
    <!-- Modals -->
    <script>
        let questions = @json($questions);
        var config = {
            placeholderblank: 'assets/media/blankimg.svg'
        };

        function openDeleteModal(questionId) {
            let question = questions.find(x => x.id == questionId);
            $('#questionId').val(question.id);
        }
    </script>

    <!--required validation-->
    <script>
        var KTModalAdd = function() {
            var t, e, o, n, r, i;
            return {
                init: function() {
                    r = document.querySelector("#addForm"),
                        t = r.querySelector("#addBtn"),
                        n = FormValidation.formValidation(r, {
                            fields: {
                                question: {
                                    validators: {
                                        notEmpty: {
                                            message: "Question is required"
                                        },
                                        stringLength: {
                                            max: 256,
                                            message: "Name must be less than 256 characters"
                                        }
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
                        }), r.querySelectorAll('.space').forEach(function(input) {
                            input.addEventListener('input', function() {
                                this.value = this.value.trimStart();
                            });
                        });

                    t.addEventListener("click", function(e) {
                        e.preventDefault();

                        // Trim spaces on all .space fields (both input and textarea)
                        r.querySelectorAll('.space').forEach(function(input) {
                            input.value = input.value.trim();
                        });

                        n && n.validate().then(function(e) {
                            console.log("validated!"),
                                "Valid" == e ? (
                                    t.disabled = !0,
                                    setTimeout(function() {
                                        e.isConfirmed && (t.disabled = !1);

                                        // Submit form
                                        r.submit();

                                    }, 0)) : Swal.fire({
                                    text: "Sorry, looks like there are some missing fields, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                        });
                    });

                    $('select').change(function() {
                        var fieldName = $(this).attr('name');
                        n.revalidateField(fieldName);
                    });
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTModalAdd.init()
        }));
    </script>

    <!--datatable-->
    <script>
        let KTAppEcommerceCategories = function() {
            let n = () => {

            };
            return {
                init: function() {
                    (t = document.querySelector("#data_table")) && ((e = $(t).DataTable({
                        info: !1,
                        order: [],
                        pageLength: 10,

                    })).on("draw", (function() {
                        n()
                    })), document.querySelector('[data-kt-customer-table-filter="search"]').addEventListener(
                        "keyup", (function(t) {
                            e.search(t.target.value).draw()
                        })), n())
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTAppEcommerceCategories.init()
        }));
    </script>
@endsection
