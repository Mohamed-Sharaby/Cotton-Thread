@extends('site.layout')
@section('title' , 'الدفع || خيط وقطن')
@section('styles')
    <link rel="stylesheet" href="{{asset('website/css/select2.min.css')}}">
@endsection
@section('content')
    <!-- /////////////////////||||||||||| bread crumbs |||||||||||||||||||| -->
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{route('website.carts.index')}}">السلة</a></li>
            <li class="breadcrumb-item active" aria-current="page">الدفع</li>
        </ol>
    </div>
    <!-- /////// ||||||||||||||||||||end breadcrumbs|||||||||||||||||||| ///////// -->
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
    <section class="my_cart">
        <div class="container">
            <form action="#" class="custom-radio" id="payOffForm" method="post" >
                @csrf
                <div class="row">
                    <div class="col-md-9 col-xs-12">
                        @include('site.cart.payment_methods')
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="left-calc">
                            <h3>ملخص السلة</h3>

                            <p class="left-card">
                                <span class="rigt-span ">المجموع:</span>
                                <span class="left-span"><span id="totalss">{{ $total }}</span>ر.س</span>
                            </p>
                            <p class="left-card discount">
                                <span class="rigt-span"> الخصم :<span class="coupon-perc">{{$coupon ? $coupon->discount : 0 }}</span>%</span>
                                <span class="left-span red"><span
                                        class="discount-value">{{ number_format( $total * ($coupon ? $coupon->discount : 0) /100,2) }} </span> ر.س</span>
                            </p>
                            <p class="left-card discount">
                                <span class="rigt-span"> الضريبة :</span>
                                <input type="hidden" name="taxes_fees" class="hidden_taxes"
                                       value="{{$total * getSetting('tax_percentage') / 100}}">
                                <span class="rigt-span"><span id="taxes"
                                                              class="taxes">{{number_format($total * getSetting('tax_percentage') / 100,2)}} </span>ر.س</span>
                            </p>
                            <p class="left-card">
                                <span class="rigt-span">المجموع الإجمالى: </span>
                                <span class="left-span">
                                    <span id="all-totalss">
                                        {{ number_format(($total + ($total * getSetting('tax_percentage') / 100)) - ($total * ($coupon ? $coupon->discount : 0) /100),2)}}
                                    </span> ر.س
                                </span>
                                <input type="hidden" name="final_total" id="all-totalss-val"
                                       value=" {{ ($total + ($total * getSetting('tax_percentage') / 100)) - ($total * ($coupon ? $coupon->discount : 0) /100)}}">
                            </p>
                            <!--- start choose address --->
                            <div class="sha7n_adrs">
                                <select class="js-select2 form-control" title="عنوان الشحن" name="address_id"
                                        id="addresses">
                                    <option selected disabled>عنوان الشحن</option>
                                    @foreach(\App\Models\Address::where('user_id',auth()->id())->get() as $address)
                                        <option value="{{$address->id}}">{{$address->name}} </option>
                                    @endforeach
                                </select>
                                <a href="{{route('website.users.addresses.create')}}" class="to_new_adrs">
                                    <i class="fas fa-plus"></i>إضافة عنوان اخر
                                </a>
                            </div>
                            <!--- end choose address --->
                            {{--                    <a href="{{url('booking-done')}}" class="btn-hvr submit_cart" type="submit">--}}
                            {{--                        تأكيد الدفع--}}
                            {{--                    </a>--}}
                            <button class="btn-hvr submit_cart" type="submit">
                                تأكيد الدفع
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
    <!---- select2 init --->
    <script src="{{asset('website/js/select2.full.js')}}"></script>
    <script src="{{asset('website/js/user/cart.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".js-select2").select2();
            $('select:not(.normal)').each(function () {
                $(this).select2({
                    dropdownParent: $(this).parent()
                });
            });
        });
    </script>
@endsection
