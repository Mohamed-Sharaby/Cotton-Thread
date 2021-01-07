<div class="form-group row">
    <label for="name" class="col-form-label col-lg-2">اسم قسيمة التخفيض</label>
    <div class="col-lg-4">
        {!! Form::text('name',null,[
        'class' =>'form-control '.($errors->has('name') ? ' is-invalid' : null),
        'placeholder'=> 'اسم قسيمة التخفيض' ,
        ]) !!}
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label for="code" class="col-form-label col-lg-2 text-lg-right">كود قسيمة التخفيض</label>
    <div class="col-lg-4">
        {!! Form::text('code',null,[
        'class' =>'form-control '.($errors->has('code') ? ' is-invalid' : null),
        'placeholder'=> 'كود قسيمة التخفيض' ,
        ]) !!}
        @error('code')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="value" class="col-form-label col-lg-2">نسبة خصم القسيمة</label>
    <div class="col-lg-4">
        {!! Form::text('value',null,[
        'class' =>'form-control '.($errors->has('value') ? ' is-invalid' : null),
        'placeholder'=> 'نسبة خصم القسيمة' ,
        ]) !!}
        @error('value')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label for="expire_at" class="col-form-label col-lg-2 text-lg-right">تاريخ انتهاء القسيمة </label>
    <div class="col-lg-4">
        {!! Form::date('expire_at',null,[
        'class' =>'form-control '.($errors->has('expire_at') ? ' is-invalid' : null),
        'placeholder'=> 'تاريخ انتهاء القسيمة ' ,
        ]) !!}
        @error('expire_at')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="products_in" class="col-form-label col-lg-2"> المنتجات التى تطبق عليها القسيمة</label>
    <div class="col-lg-4">

        {!! Form::select('products_in[]',products(),null,
       [
       'class' =>'form-control js-example-basic-multiple '.($errors->has('products_in') ? ' is-invalid' : null),
       'multiple',
       'id'=>'products_in'
       ]) !!}
        @error('products_in')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label for="products_out" class="col-form-label col-lg-2 text-lg-right"> المنتجات المستبعدة من القسيمة </label>
    <div class="col-lg-4">

        {!! Form::select('products_out[]',products(),null,
     [
     'class' =>'form-control js-example-basic-multiple '.($errors->has('products_out') ? ' is-invalid' : null),
     'multiple',
     'id'=>'products_out'
     ]) !!}
        @error('products_out')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="no_of_use" class="col-form-label col-lg-2">عدد مرات استخدام القسيمة</label>
    <div class="col-lg-4">
        {!! Form::text('no_of_use',null,[
        'class' =>'form-control '.($errors->has('no_of_use') ? ' is-invalid' : null),
        'placeholder'=> 'عدد مرات استخدام القسيمة' ,
        ]) !!}
        @error('no_of_use')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label for="no_of_client_use" class="col-form-label col-lg-2 text-lg-right">عدد مرات استخدام القسيمة للعميل</label>
    <div class="col-lg-4">
        {!! Form::text('no_of_client_use',null,[
        'class' =>'form-control '.($errors->has('no_of_client_use') ? ' is-invalid' : null),
        'placeholder'=> 'عدد مرات استخدام القسيمة للعميل' ,
        ]) !!}
        @error('no_of_client_use')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="exclude_products_discount" class="col-form-label col-lg-2">استبعاد المنتجات المخصومة</label>
    <div class="col-lg-4">
        {!! Form::checkbox('exclude_products_discount', 1,null,[
    'class'=>'form-control',
        ]) !!}
        @error('exclude_products_discount')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

