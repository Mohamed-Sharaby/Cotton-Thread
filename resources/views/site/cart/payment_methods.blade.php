<div class="items_r custom-radio">
    {{--                    <form action="{{url('booking-done')}}" class="custom-radio" id="payOffForm" method="post">--}}
{{--    <form action="#" class="custom-radio" id="payOffForm" method="post">--}}
{{--        @csrf--}}
        <p>
            <input type="radio" id="test1" name="payment" value="COD" checked>
            <label for="test1"><i class="fas fa-truck"></i> الدفع عند الاستلام
                <span class="arw"><i class="fas fa-chevron-left"></i></span>
            </label>
        </p>
        <p>
            <input type="radio" id="test2" name="payment" value="credit">
            <label for="test2"><i class="fas fa-credit-card"></i> بطاقة ائتمان
                <span class="arw"><i class="fas fa-chevron-left"></i></span>
            </label>
        </p>
        <p>
            <input type="radio" id="test3" name="payment" value="bank_transaction">
            <label for="test3"><i class="fas fa-dollar-sign"></i> تحويل بنكى
                <span class="arw"><i class="fas fa-chevron-left"></i></span>
            </label>
        </p>
        <p>
            <input type="radio" id="test4" name="payment" value="wallet">
            <label for="test4"><i class="fas fa-wallet"></i> محفظتى
                <span class="arw"><i class="fas fa-chevron-left"></i></span>
            </label>
        </p>
{{--    </form>--}}
</div>

<!-- Start Bank transfer -->
<div class="col-md-9 col-xs-12 bank-transaction hidden">
    <div class="form-group">
        <label for="">صورة التحويل البنكى</label>
        <input type="file" name="transaction_image" class="form-control">
    </div>
</div>
<!-- End Bank transfer -->
