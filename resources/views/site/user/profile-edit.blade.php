@extends('site.layout')
@section('title' , 'تعديل الحساب الشخصي || خيط وقطن')
@section('styles')
    <link rel="stylesheet" href="{{asset('website/css/filepond-plugin/filepond-plugin-image-preview.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/filepond-plugin/filepond.min.css')}}">
@endsection
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{route('website.users.profile')}}">حسابى</a></li>
            <li class="breadcrumb-item active" aria-current="page">تعديل الحساب</li>
        </ol>
    </div>
    <!-- /////////////////////||||||||||| start profile edit |||||||||||||||||||| -->
    <section class="all-sections">
        <div class="container">

            <form action="{{route('website.users.updateProfile')}}" method="post" enctype="multipart/form-data"
                  autocomplete="off">
                @csrf
                <div class="row">

                    <div class="col-xs-12 text-center"> @include('dashboard.layouts.status')</div>

                    <div class="col-xs-12">
                        <div class="text-center">
                            @if(auth()->user()->image)
                                <img src="{{auth()->user()->image}}" class="rounded-circle" alt="user-img" width="100"
                                     height="100">
                            @endif
                        </div>
                        <input type="file" class="filepond" name="image" accept="image/png, image/jpeg, image/gif"
                               id="imginput"/>
                    </div>


                    <div class="col-sm-6 col-xs-12">
                        <div class="input-wrap">
                            <input type="text" name="name" value="{{auth()->user()->name}}" placeholder="ادخل اسمك"
                                   readonly onfocus="this.removeAttribute('readonly');" required>
                            <div class="hov-input">
                                <label>من فضلك ادخل اسم المستخدم</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-wrap">
                            <input type="number" name="phone" value="{{auth()->user()->phone}}" placeholder="+983764"
                                   readonly onfocus="this.removeAttribute('readonly');" required>
                            <div class="hov-input">
                                <label>من فضلك ادخل رقم الجوال</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-wrap">
                            <input type="email" name="email" value="{{auth()->user()->email}}"
                                   placeholder="admin@admin.com" readonly onfocus="this.removeAttribute('readonly');"
                                   required>
                            <div class="hov-input">
                                <label>من فضلك ادخل البريد الإلكترونى</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-wrap">
                            <input type="text" name="city" value="{{auth()->user()->city}}" placeholder="" readonly
                                   onfocus="this.removeAttribute('readonly');" required>
                            <div class="hov-input">
                                <label>من فضلك ادخل المدينة</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-wrap">
                            <input type="password" name="password" placeholder="**********" readonly
                                   onfocus="this.removeAttribute('readonly');" required>
                            <div class="hov-input">
                                <label>من فضلك ادخل كلمة المرور</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="input-wrap">
                            <input type="password" name="password_confirmation" placeholder="**********" readonly
                                   onfocus="this.removeAttribute('readonly');" required>
                            <div class="hov-input">
                                <label>تأكيد كلمة المرور</label>
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
