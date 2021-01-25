<div class="card-header text-center">
    {!!Form::model($cart , ['route' => ['admin.carts.update' , $cart->id] , 'method' => 'PATCH','files' => true]) !!}
    <div class="form-group  form-float">
        <div class="form-line flexy-input">
            <label class="form-label"> تغيير حالة الطلب </label>
            {!! Form::select("status",cart_status(),null,['class'=>'form-control select','placeholder'=>'اختار حالة الطلب'])!!}
{{--            <select name="status" id="status" class="form-control select {{$errors->has('status') ? 'is-invalid' : ''}}">--}}
{{--                <option disabled selected>اختر حالة الطلب</option>--}}
{{--                @foreach(cart_status() as $index => $status)--}}
{{--                    <option value="{{$index}}" {{$cart->status == $index ? 'selected' : ''}}>{{__($status)}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            @error('status')--}}
{{--            <div class="invalid-feedback">--}}
{{--                {{ $message }}--}}
{{--            </div>--}}
{{--            @enderror--}}
            <button class="btn btn-primary waves-effect" type="submit">حفظ</button>
        </div>
    </div>
    {!!Form::close() !!}
</div>
