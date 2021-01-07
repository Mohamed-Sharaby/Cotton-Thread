<div class="card-header text-center">
    {!!Form::model($cart , ['route' => ['admin.carts.update' , $cart->id] , 'method' => 'PATCH','files' => true]) !!}
    <div class="form-group  form-float">
        <div class="form-line flexy-input">
            <label class="form-label"> تغيير حالة الطلب </label>
            {!! Form::select("status",cart_status(),null,['class'=>'form-control select','placeholder'=>'اختار حالة الطلب'])!!}
            <button class="btn btn-primary waves-effect" type="submit">حفظ</button>
        </div>
    </div>
    {!!Form::close() !!}
</div>
