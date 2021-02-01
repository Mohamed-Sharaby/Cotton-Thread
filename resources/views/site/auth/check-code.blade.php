@extends('site.layout')
@section('title' , ' إستعادة كلمة المرور || خيط وقطن')
@section('styles')
    <link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">
@endsection
@section('content')
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
    <section class="static-page all-sections">
        <div class="container">
            <div class="row">

                <form action="{{url('/change-password')}}" method="post" class="static-page-form" >
                    @csrf
                    <a href="{{url('/')}}">
                        <img src="{{asset('website/img/logo-wide.png')}}">
                    </a>
                    <h2>تغيير كلمة المرور</h2>
                    @include('dashboard.layouts.status')
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissable  show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    <br>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="hidden" name="phone" value="{{$phone}}">
                    <div class="input-wrap">
                        <input type="text" placeholder="1234" name="code" value="{{old('code')}}">
                        <div class="hov-input">
                            <label>الكود</label>
                        </div>
                    </div>

                    <div class="input-wrap">
                        <input type="password" placeholder="كلمة المرور" name="password">
                        <div class="hov-input">
                            <label>كلمة المرور</label>
                        </div>
                    </div>
                    <div class="input-wrap">
                        <input type="password" placeholder="تأكيد كلمة المرور" name="password_confirmation">
                        <div class="hov-input">
                            <label> تأكيد كلمة المرور </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-hvr">حفظ</button>
                </form>
            </div>
        </div>
    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection
