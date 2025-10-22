@extends('layouts.admin')

@section('title', 'Update user')

@section('header')

@endsection
@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Update Information of {{$influencer->fname}} {{$influencer->lname}}</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{url('admin/influencer')}}" class="text-muted text-hover-primary">Influencers</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Update Information</li>
</ul>
@endsection

@section('content')
<form autocomplete="off" action="{{url('admin/influencer/update')}}" enctype="multipart/form-data" method="post" id="updateForm" onsubmit="return checkValidation();">
    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link text-active-primary disabled active" data-bs-toggle="tab" id="influencer-details" href="#influencerDetails">General Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-active-primary disabled" data-bs-toggle="tab" id="influencer-images" href="#influencerImages">Media</a>
        </li>
    </ul>

    <input type="hidden" value="{{Request::get('userUid')}}" name="userUid">
    @csrf
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="influencerDetails" role="tabpanel">
            <div class="row g-5 mb-5">
                <!-- Card for Image and Image Alt -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-5 mb-5">
                                <div class="col-md-12 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Profile Image</label>
                                    <div class="d-flex flex-center flex-column py-5 mb-1">
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ $influencer->profileImage ? asset($influencer->profileImage) : 'assets/media/blank.png' }}')">
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ $influencer->profileImage ? asset($influencer->profileImage) : 'assets/media/blank.png' }}')"></div>
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Image">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <input type="file" name="profileImage" accept="image/*" />
                                                <input type="hidden" name="avatar_remove" />
                                            </label>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Image">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="form-text">Allowed all image file types
                                            .webp is preferred for better performance
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Image Alt</label>
                                    <input type="text" class="form-control txtOnly" placeholder="Enter Alt" id="profileImageAlt" name="profileImageAlt" value="{{ $influencer->profileImageAlt }}">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card for Other Fields -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-5 mb-5">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">First Name</label>
                                    <input type="text" class="form-control txtOnly space" placeholder="Enter First Name" id="fname" name="fname" value="{{ $influencer->fname }}" minlength="1" required>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Last Name</label>
                                    <input type="text" class="form-control txtOnly space" placeholder="Enter Last Name" id="lname" name="lname" value="{{ $influencer->lname }}" minlength="1" required>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Phone</label>
                                    <input type="hidden" id="oldPhone" value="{{$influencer->phone}}">
                                    <input type="text" class="form-control numOnly" placeholder="Enter Phone" id="phone" name="phone" max="10" value="{{ $influencer->phone }}" onkeyup="checkphone('influencerPhone')" data-validation="phoneNo" data-title="Phone No" required>
                                    <span class="text-danger" id="phonetitle"></span>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Email</label>
                                    <input type="hidden" id="oldEmail" value="{{$influencer->email}}">
                                    <input type="text" class="form-control space" placeholder="Enter Email" id="email" name="email" value="{{ $influencer->email }}" onkeyup="checkemail('influencerEmail')" data-validation="email" data-title="Email" required>
                                    <span class="text-danger" id="emailtitle"></span>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Status</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" name="status">
                                        <option value="1" {{ $influencer->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $influencer->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-12 fv-row">
                                    <label class=" fs-6 fw-semibold mb-2">Select Outlet</label>
                                    <select class="form-select" data-control="select2" data-placeholder="Select Outlet" name="outlet[]" id="outlet" multiple>
                                        <option value=""></option>
                                        @foreach($outlets as $outlet) 
                                        <option value="{{ $outlet->uid }}" {{in_array($outlet->uid, explode(',', $influencer->outletUid)) ? 'selected' : ''}}>{{ $outlet->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Influencer Fields -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-5">
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Influencer Tag</label>
                                    <input type="text" class="form-control" placeholder="Enter Influencer Tag" id="influencerTag" name="influencerTag" value="{{ $influencer->influencerTag }}">
                                </div>

                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Influencer Facebook Link</label>
                                    <input type="text" class="form-control" placeholder="Enter Facebook Link" id="influencerFbLink" name="influencerFbLink" value="{{ $influencer->influencerFbLink }}" data-validation="fb" data-title="Facebook Link" validate>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Influencer Instagram Link</label>
                                    <input type="text" class="form-control" placeholder="Enter Instagram Link" id="influencerInstaLink" name="influencerInstaLink" value="{{ $influencer->influencerInstaLink }}" data-validation="insta" data-title="Instagram Link" validate>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Influencer YouTube Link</label>
                                    <input type="text" class="form-control" placeholder="Enter YouTube Link" id="influencerYoutubeLink" name="influencerYoutubeLink" value="{{ $influencer->influencerYoutubeLink }}" data-validation="youtube" data-title="You Tube Link" validate>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Influencer Website Link</label>
                                    <input type="text" class="form-control" placeholder="Enter Website Link" id="influencerWebsiteLink" name="influencerWebsiteLink" value="{{ $influencer->influencerWebsiteLink }}" data-validation="website" data-title="Website Link" validate>
                                </div>

                                <div class="col-md-3 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Feature 1</label>
                                    <input type="text" class="form-control" placeholder="Enter Feature 1" id="influencerFeature1" name="influencerFeature1" value="{{ $influencer->influencerFeature1 }}">
                                </div>

                                <div class="col-md-3 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Feature 2</label>
                                    <input type="text" class="form-control" placeholder="Enter Feature 2" id="influencerFeature2" name="influencerFeature2" value="{{ $influencer->influencerFeature2 }}">
                                </div>

                                <div class="col-md-3 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Feature 3</label>
                                    <input type="text" class="form-control" placeholder="Enter Feature 3" id="influencerFeature3" name="influencerFeature3" value="{{ $influencer->influencerFeature3 }}">
                                </div>
                                <div class="col-md-3 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Feature 4</label>
                                    <input type="text" class="form-control" placeholder="Enter Feature 4" id="influencerFeature4" name="influencerFeature4" value="{{ $influencer->influencerFeature4 }}">
                                </div>

                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Influencer Bio</label>
                                    <textarea class="form-control" placeholder="Enter Influencer Bio" id="influencerBio{{ $influencer->uid }}" name="influencerBio" rows="4">{{ $influencer->influencerBio }}</textarea>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Short Description</label>
                                    <textarea class="form-control" placeholder="Enter Short Description" id="shortdesc{{ $influencer->uid }}" name="shortdesc" rows="4">{{ $influencer->shortdesc }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="tab-pane fade" id="influencerImages" role="tabpanel">
            <div class="card p-4">
                <div class="d-flex justify-content-end">
                    <a class="btn" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-overflow="true">
                        <button type="button" class="btn btn-primary">
                            Select Media Type
                        </button>
                    </a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a onclick="addMediaCard('image')">
                                            <span class="svg-icon svg-icon-3" style="cursor: pointer;">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="indicator-label" style="cursor: pointer;">Image</span>
                                        </a>
                                    </div>
                                    <div class="separator my-2"></div>
                                    <div class="col-md-12">
                                        <a onclick="addMediaCard('video')">
                                            <span class="svg-icon svg-icon-3" style="cursor: pointer;">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span class="indicator-label" style="cursor: pointer;">Video</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="mediaContainer">
                    @foreach ($influencer->influencerimgmedia as $productImage)
                    <div class="col-sm-3" id="img-card-{{ $productImage->uid }}">
                        <div class="card card-border mt-3" style="border: 2px solid #a1a5b7;border-radius: 5px;">
                            <div class="card-header">
                                <div class="card-title">
                                    <label class="fs-6 fw-semibold">Image</label>
                                </div>
                                <div class="card-toolbar">
                                    <a class="btn btn-icon btn-outline-danger has-ripple" onclick="deleteMedia('{{ $productImage ->uid }}')"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="influencerexistingImageUid[]" value="{{$productImage->uid}}">
                                <div class="row g-2 mb-2">
                                    <div class="col-md-12 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Image</label>
                                        <div class="d-flex flex-center flex-column">
                                            <div class="image-input image-input-outline" data-kt-image-input="true">
                                                <?php
                                                if ($productImage->path != null) {
                                                    $placeholderblankImage = $productImage->path;
                                                } else {
                                                    $placeholderblankImage = config('placeholderblankImage');
                                                }
                                                ?>
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ $placeholderblankImage  }}')"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">Image Alt</label>
                                        <input type="text" class="form-control space" placeholder="Enter Image Alt" name="savedimageAlts[]" value="{{ $productImage->imageAlt }}">
                                    </div>
                                    <div class="col-md-12 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Sequence</label>
                                        <input type="number" class="preventMinus form-control" placeholder="Enter Sequence" name="savedsequences[]" min="0" value="{{ $productImage->sequence }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($influencer->influencervideomedia as $productVideo)
                    <div class="col-sm-3" id="img-card-{{ $productVideo->uid }}">
                        <div class="card card-border mt-3" style="border: 2px solid #a1a5b7;border-radius: 5px;">
                            <div class="card-header">
                                <div class="card-title">
                                    <label class="fs-6 fw-semibold">Video</label>
                                </div>
                                <div class="card-toolbar">
                                    <a class="btn btn-icon btn-outline-danger has-ripple" onclick="deleteMedia('{{ $productVideo->uid }}')"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="influencerexistingVideoUid[]" value="{{$productVideo->uid}}">
                                <div class="row g-2 mb-2">
                                    <div class="col-md-12 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Thumbnail Image</label>
                                        <div class="d-flex flex-center flex-column">
                                            <div class="image-input image-input-outline" data-kt-image-input="true">
                                                <?php
                                                if ($productVideo->thumbnailImg != null) {
                                                    $placeholderblankImage = $productVideo->thumbnailImg;
                                                } else {
                                                    $placeholderblankImage = config('placeholderblankImage');
                                                }
                                                ?>
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ $placeholderblankImage  }}')"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">Thumbnail Image Alt</label>
                                        <input type="text" class="form-control space" placeholder="Enter Thumbnail Image Alt" name="savedthumbnailImgAlts[]" value="{{ $productVideo->thumbnailImgAlt }}" />
                                    </div>
                                    <div class="col-md-12 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Video Link</label>
                                        <input type="text" class="form-control" placeholder="Video Link" name="savedvideolinks[]" value="{{ $productVideo->path }}" required>
                                    </div>
                                    <div class="col-md-12 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Sequence</label>
                                        <input type="number" class="preventMinus form-control" placeholder="Enter Sequence" name="savedvideosequences[]" min="0" value="{{ $productVideo->sequence }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Image card template -->
                    <template id="imageCardTemplate">
                        <div class="col-sm-3 mb-4 image-card">
                            <div class="card card-border mt-3" style="border: 2px solid #a1a5b7;border-radius: 5px;">
                                <div class="card-header">
                                    <div class="card-title">
                                        <label class="fs-6 fw-semibold">Image</label>
                                    </div>
                                    <div class="card-toolbar">
                                        <a class="btn btn-icon btn-outline-danger" onclick="btnCancel(this, 'image')"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Image</label>
                                            <div class="d-flex flex-center flex-column">
                                                <div class="image-input image-input-outline" data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ config('placeholderblankImage') }}')"></div>
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Image">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="influencermediaImages[]" accept="image/*" onchange="previewImage(this)" required />
                                                        <input type="hidden" name="avatar_remove" />
                                                    </label>
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Image">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 fv-row">
                                            <label class="fs-6 fw-semibold mb-2">Image Alt</label>
                                            <input type="text" class="form-control space" placeholder="Enter Image Alt" name="imageAlts[]">
                                        </div>
                                        <div class="col-md-12 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Sequence</label>
                                            <input type="number" class="preventMinus form-control" placeholder="Enter Sequence" name="sequences[]" min="0" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Video card template -->
                    <template id="videoCardTemplate">
                        <div class="col-sm-3 mb-4 video-card">
                            <div class="card card-border mt-3" style="border: 2px solid #a1a5b7;border-radius: 5px;">
                                <div class="card-header">
                                    <div class="card-title">
                                        <label class="fs-6 fw-semibold">Video</label>
                                    </div>
                                    <div class="card-toolbar">
                                        <a class="btn btn-icon btn-outline-danger" onclick="btnCancel(this, 'video')"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Thumbnail Image</label>
                                            <div class="d-flex flex-center flex-column">
                                                <div class="image-input image-input-outline" data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ config('placeholderblankImage') }}')"></div>
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Image">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="influencerthumbnailImages[]" accept="image/*" onchange="previewImage(this)" required />
                                                        <input type="hidden" name="avatar_remove" />
                                                    </label>
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Image">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 fv-row">
                                            <label class="fs-6 fw-semibold mb-2">Thumbnail Image Alt</label>
                                            <input type="text" class="form-control space" placeholder="Enter Thumbnail Image Alt" name="thumbnailImgAlts[]">
                                        </div>
                                        <div class="col-md-12 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Video Link</label>
                                            <input type="text" class="form-control" placeholder="Video Link" name="links[]" required>
                                        </div>
                                        <div class="col-md-12 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Sequence</label>
                                            <input type="number" class="preventMinus form-control" placeholder="Enter Sequence" name="videosequences[]" min="0" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer" style="width: -webkit-fill-available; display: flex; justify-content: space-between; position: fixed; margin-right: 40px; bottom: 50px;">
        <div class="position-relative w-100">
            <button style="position: absolute; bottom: 0; left: 10px;" type="button" class="btn btn-secondary" id="prevTab" onclick="prevvTab()" disabled>Previous</button>
            <button style="position: absolute; bottom: 0; right: 10px;" type="button" class="btn btn-primary" id="nextTab" onclick="nexxtTab()">Next</button>
            <button type="submit" class="btn btn-primary" id="kt_modal_add_submit" onclick="finalSubmit()" style="display: none;position: absolute; bottom: 0; right: 10px;">
                <span class="indicator-label">Update</span>
                <span class="indicator-progress">Updating...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </div>

</form>

@endsection

@section('scripts')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<!-- required validation -->
<script>
    var valid = true;
    var emptyFieldError = false; // Flag to check if any field is empty

    function checkValidation(tabId, tabName) {
        valid = true;
        emptyFieldError = false; // Reset flag

        var requiredInputFields = $('#' + tabId).find('input[required]');
        var validInputFields = $('#' + tabId).find('input[validate]');
        var requiredSelectFields = $('#' + tabId).find('select[required]');
        var requiredTextareaFields = $('#' + tabId).find('textarea[required]');

        requiredInputFields.each(function() {
            var item = $(this);
            item.removeClass('is-invalid');
            var value = item.val().trim();
            var validationType = item.data('validation');

            if (value === '') {
                valid = false;
                emptyFieldError = true;
                item.addClass('is-invalid');
            } else if (validationType) {
                var regexMap = {
                    'phoneNo': /^[6789][0-9]{9}$/,
                    'email': /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
                    'empNo': /^[a-zA-Z0-9]+$/,
                    'password': /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{8,}$/
                };

                if (regexMap[validationType] && !regexMap[validationType].test(value)) {
                    valid = false;
                    item.addClass('is-invalid');
                    toastr.error(item.data('title') + ' is invalid');
                }
            }
        });


        validInputFields.each(function() {
            var item = $(this);
            item.removeClass('is-invalid');
            var value = item.val().trim();
            var validationType = item.data('validation');

            if (validationType && value !== '') {
                var regexMap = {
                    'fb': /(?:https?:\/\/)?(?:www\.)?facebook\.com\/(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/,
                    'insta': /(?:(?:http|https):\/\/)?(?:www.)?(?:instagram.com|instagr.am|instagr.com)\/(\w+)/,
                    'youtube': /^(?:https?:\/\/)?(?:www\.)?(youtube\.com\/(?:@[\w\-]+|channel\/[\w\-]+|c\/[\w\-]+|watch\?v=[\w\-]+)|youtu\.be\/[\w\-]+)/,
                    'website': /^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,6}(\/[a-zA-Z0-9#?&%=._-]*)?$/
                };

                if (regexMap[validationType] && !regexMap[validationType].test(value)) {
                    valid = false;
                    item.addClass('is-invalid');
                    toastr.error(item.data('title') + ' is invalid');
                }
            }
        });

        requiredSelectFields.each(function() {
            var item = $(this);
            if (item.val() === '') {
                valid = false;
                emptyFieldError = true;
                item.next().find('.select2-selection').addClass('is-invalid');
            } else {
                item.next().find('.select2-selection').removeClass('is-invalid');
            }
        });

        requiredTextareaFields.each(function() {
            var item = $(this);
            if (item.val().trim() === '') {
                valid = false;
                emptyFieldError = true;
                item.addClass('is-invalid');
            } else {
                item.removeClass('is-invalid');
            }
        });


        if (emptyFieldError) {
            toastr.error('Please fill all the required fields in ' + tabName + ' Tab');
        }
    }

    function nexxtTab() {
        var currentTab = $(".nav-link.active");
        var currentTabBody = $(".tab-pane.show.active");
        checkValidation(currentTabBody.attr('id'), currentTab.text());
        if (!valid) return;
        var nextTab = currentTab.parent().next().find(".nav-link");
        var nextTabBody = currentTabBody.next();

        if (nextTab.length > 0) {
            currentTab.removeClass("active");
            currentTabBody.removeClass("show active");
            nextTab.addClass("active");
            nextTabBody.addClass("show active");

            if (nextTabBody.attr('id') === 'influencerImages') {
                $('#nextTab').hide();
                $('#kt_modal_add_submit').show();
            }
            $('#prevTab').prop('disabled', false);
        }
    }

    function prevvTab() {
        var currentTab = $(".nav-link.active");
        var currentTabBody = $(".tab-pane.show.active");

        var prevTab = currentTab.parent().prev().find(".nav-link");
        var prevTabBody = currentTabBody.prev();

        if (prevTab.length > 0) {
            currentTab.removeClass("active");
            currentTabBody.removeClass("show active");
            prevTab.addClass("active");
            prevTabBody.addClass("show active");

            if (prevTabBody.attr('id') === 'influencerDetails') {
                $('#prevTab').prop('disabled', true);
            }
            $('#nextTab').show();
            $('#kt_modal_add_submit').hide();
        }
    }

    function finalSubmit() {
        checkValidation('influencerImages', 'Media');
        if (valid) {
            $('#kt_modal_add_submit').prop('disabled', true).html(`
        <span class="indicator-label">Update</span>
        <span class="indicator-progress">Updating...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
        `);
            $('#updateForm').submit();
        }
    }
</script>

<!--  Media Code -->
<script>
    function addMediaCard(type) {
        var container = document.getElementById("mediaContainer");
        var existingMediaCards = container.getElementsByClassName('image-card').length + container.getElementsByClassName('video-card').length;
        var template = document.getElementById(type === 'image' ? "imageCardTemplate" : "videoCardTemplate");
        var newCard = template.content.cloneNode(true);
        var mediaCards = container.getElementsByClassName(type + "-card").length;
        newCard.querySelector(".card-title label").textContent = `${type.charAt(0).toUpperCase() + type.slice(1)} ${mediaCards + 1}`;
        container.appendChild(newCard);
        updateMediaCardNumbers(type);
    }

    function btnCancel(button, type) {
        button.closest('.' + type + '-card').remove();
        updateMediaCardNumbers(type);
    }

    function updateMediaCardNumbers(type) {
        let cards = document.querySelectorAll('.' + type + '-card');
        cards.forEach((card, index) => {
            card.querySelector('.card-title label').innerText = `${type.charAt(0).toUpperCase() + type.slice(1)} ${index + 1}`;
        });
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var wrapper = input.closest('.image-input').querySelector('.image-input-wrapper');
                wrapper.style.backgroundImage = 'url(' + e.target.result + ')';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- Check Existing email & phone -->
<script>
    function checkphone(fieldType) {
        var filed = document.getElementById('phone').value;
        var title = document.getElementById('phonetitle');
        var button = document.getElementById('updateBtn');

        if (filed == "") {
            title.style.display = "none";
        } else {
            $.ajax({
                type: "GET",
                url: "{{url('/admin/checkdata')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'phone': filed,
                    'fieldType': fieldType
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        var oldPhone = document.getElementById('oldPhone').value;
                        if (response.data.phone === oldPhone) {
                            title.style.display = "none";
                            button.disabled = false;
                        } else {
                            title.innerHTML = "A user already exists with this phone number";
                            title.style.display = "block";
                            button.disabled = true;
                        }
                    } else {
                        title.style.display = "none";
                        button.disabled = false;
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    }

    function checkemail(fieldType) {
        var filed = document.getElementById('email').value;
        var title = document.getElementById('emailtitle');
        var button = document.getElementById('updateBtn');

        if (filed == "") {
            title.style.display = "none";
        } else {
            $.ajax({
                type: "GET",
                url: "{{url('/admin/checkdata')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'email': filed,
                    'fieldType': fieldType
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        var oldEmail = document.getElementById('oldEmail').value;
                        if (response.data.email === oldEmail) {
                            title.style.display = "none";
                            button.disabled = false;
                        } else {
                            title.innerHTML = "A user already exists with this email";
                            title.style.display = "block";
                            button.disabled = true;
                        }
                    } else {
                        title.style.display = "none";
                        button.disabled = false;
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    }
</script>

<script>
    function deleteMedia(uid) {
        $.ajax({
            url: "{{ url('admin/influencer/deleteimg') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                uid: uid
            },
            success: function(response) {
                if (response.status === 200) {
                    toastr.error('Media Deleted Successfully');
                    $('#img-card-' + uid).remove();
                    $('#vid-card-' + uid).remove();
                } else {
                    toastr.error('Failed to delete');
                }
            },
            error: function(response) {
                console.log(response);

            }
        });
    }
</script>
@endsection