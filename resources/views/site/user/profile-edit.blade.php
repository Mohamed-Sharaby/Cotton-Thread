@extends('site.layout')
@section('title' , 'تعديل الحساب الشخصي | خيط وقطن')
@section('styles')
<link rel="stylesheet" href="{{asset('website/css/filepond-plugin/filepond-plugin-image-preview.min.css')}}">
<link rel="stylesheet" href="{{asset('website/css/filepond-plugin/filepond.min.css')}}">
@endsection
@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{url('/')}}">حسابى</a></li>
        <li class="breadcrumb-item active" aria-current="page">تعديل الحساب</li>
    </ol>
</div>
<!-- /////////////////////||||||||||| start profile edit |||||||||||||||||||| -->
<section class="all-sections">
    <div class="container">
        <form action="{{url('profile')}}" autocomplete="off">
            <div class="row">
                <div class="col-xs-12">
                    <input type="file" class="filepond" name="filepond" accept="image/png, image/jpeg, image/gif" id="imginput" />
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="text" placeholder="ادخل اسمك" readonly onfocus="this.removeAttribute('readonly');" required>
                        <div class="hov-input">
                            <label>من فضلك ادخل اسم المستخدم</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="number" placeholder="+983764" readonly onfocus="this.removeAttribute('readonly');" required>
                        <div class="hov-input">
                            <label>من فضلك ادخل رقم الجوال</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="email" placeholder="admin@admin.com" readonly onfocus="this.removeAttribute('readonly');" required>
                        <div class="hov-input">
                            <label>من فضلك ادخل البريد الإلكترونى</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="text" placeholder="القصيم" readonly onfocus="this.removeAttribute('readonly');" required>
                        <div class="hov-input">
                            <label>من فضلك ادخل المدينة</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="password" placeholder="**********" readonly onfocus="this.removeAttribute('readonly');" required>
                        <div class="hov-input">
                            <label>من فضلك ادخل كلمة المرور</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="input-wrap">
                        <input type="password" placeholder="**********" readonly onfocus="this.removeAttribute('readonly');" required>
                        <div class="hov-input">
                            <label>من فضلك ادخل كلمة المرور</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-hvr">حفظ</button>
        </form>
    </div>
</section>
@include('site.modals.reset-pass-modal')
<!-- /////////////////////|||||||||||End profile edit |||||||||||||||||||| -->
@endsection
@section('scripts')
<script src="{{asset('website/js/filepond-plugin/file-encode.min.js')}}"></script>
<script src="{{asset('website/js/filepond-plugin/file-validate-type.min.js')}}"></script>
<script src="{{asset('website/js/filepond-plugin/image-exif-orientation.min.js')}}"></script>
<script src="{{asset('website/js/filepond-plugin/image-crop.min.js')}}"></script>
<script src="{{asset('website/js/filepond-plugin/image-resize.min.js')}}"></script>
<script src="{{asset('website/js/filepond-plugin/image-transform.min.js')}}"></script>
<script src="{{asset('website/js/filepond-plugin/image-preview.min.js')}}"></script>
<script src="{{asset('website/js/filepond-plugin/filepond.min.js')}}"></script>
<script>
    FilePond.registerPlugin(
        // encodes the file as base64 data
        FilePondPluginFileEncode,
        // validates files based on input type
        FilePondPluginFileValidateType,
        // corrects mobile image orientation
        FilePondPluginImageExifOrientation,
        // previews the image
        FilePondPluginImagePreview,
        // crops the image to a certain aspect ratio
        FilePondPluginImageCrop,
        // resizes the image to fit a certain size
        FilePondPluginImageResize,
        // applies crop and resize information on the client
        FilePondPluginImageTransform
    );
    // Select the file input and use create() to turn it into a pond
    // in this example we pass properties along with the create method
    // we could have also put these on the file input element itself
    FilePond.create(
        document.querySelector('#imginput'), {
            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact circle',
            styleLoadIndicatorPosition: 'center bottom',
            styleButtonRemoveItemPosition: 'center bottom'
        }
    );
</script>
@endsection
