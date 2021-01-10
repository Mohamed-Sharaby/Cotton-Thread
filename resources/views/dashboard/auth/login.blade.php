<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> خيط وقطن - لوحة التحكم </title>
    <link rel="icon" href="{{asset('admin/global_assets/images/logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Courgette|Open+Sans&display=swap" rel="stylesheet">
    @include('dashboard.layouts.styles')
    @include('dashboard.layouts.scripts')
</head>

<body class="bg-slate-800">

<!-- Page content -->
<div class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">
            <!-- Login card -->
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card mb-0 shadow shadow-lg">
                    <div class="card-body">
                        <div class="text-center mb-3">
        <img src="{{asset('admin/global_assets/images/logo/logo.png')}}" alt="logo">
                            <h5 class="mb-0 mt-1">لوحة التحكم | تسجيل الدخول</h5>
                        </div>
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   oninvalid="this.setCustomValidity('البريد الالكترونى مطلوب')"
                                   onchange="this.setCustomValidity('')"
                                   placeholder="البريد الالكترونى" name="email" value="{{ old('email') }}" required
                                   autocomplete="email" autofocus>
                            <div class="form-control-feedback">
                                <i class="icon-envelop text-muted"></i>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" placeholder="كلمة المرور" name="password"
                                   oninvalid="this.setCustomValidity('كلمة المرور')"
                                   onchange="this.setCustomValidity('')"
                                   class="form-control @error('password') is-invalid @enderror" required
                                   autocomplete="current-password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i
                                    class="icon-circle-right2 mr-2"></i> دخول
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /login card -->
        </div>
        <!-- /content area -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->

</body>
</html>
