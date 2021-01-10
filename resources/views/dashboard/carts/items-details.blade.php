<div class="card border-1 border-danger shadow-lg">
    <div class="card-header bg-danger text-white header-elements-inline text-center">
        <h6 class="card-title">المنتجات</h6>
    </div>
    <div class="card-body">
        <p class="addMsg alert alert-success" style="display: none;">تم الاضافة بنجاح</p>
        <p class="editMsg alert alert-success" style="display: none;">تم التعديل بنجاح</p>

        @if(count($cart->cartItems) > 0)
            <table class="table table-hover">
                <thead>
                <tr class="text-light">
                    <th>#</th>
                    <th class="font-weight-bold">اسم المنتج</th>
                    <th class="font-weight-bold">الحجم</th>
                    <th class="font-weight-bold">اللون</th>
                    <th class="font-weight-bold">الكمية</th>
                    <th class="font-weight-bold">الصورة</th>
                    <th class="font-weight-bold">سعر المنتج</th>
                    <th class="font-weight-bold">خصومات</th>
                    <th class="font-weight-bold">السعر بعد الخصم</th>
                    <th class="font-weight-bold">اجمالى سعر المنتج</th>
{{--                    <th class="font-weight-bold"> حذف</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($cart->cartItems as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->productQuantity->product->name ?? ''}}</td>
                        <td>{{$item->productQuantity->size->size ?? ''}}</td>
                        <td class="text-center">
                            <div style="width: 40px;height: 40px;background-color:{{$item->productQuantity->color->color}} "></div>
                            {{$item->productQuantity->color->name ?? ''}}
                        </td>
                        <td>{{$item->quantity ?? ''}}</td>
                        <td>
                            @if($item->productQuantity->product->image)
                                <a data-fancybox="gallery"
                                   href="{{$item->productQuantity->product->image}}">
                                    <img src="{{$item->productQuantity->product->image}}"
                                         width="60" height="60" class="img-thumbnail"
                                         alt="product_img">
                                </a>
                            @else {{__('No Image')}} @endif
                        </td>
                        <td>{{$item->productQuantity->product->price ?? ''}}</td>
                        <td>{{$item->productQuantity->product->discount ?? 'لا يوجد'}} %</td>
                        <td>{{$item->productQuantity->product->priceAfterDiscount ?? 'لا يوجد'}}</td>

                        <td>{{$item->productQuantity->product->priceAfterDiscount * $item->quantity ?? ''}}</td>
{{--                        <td>--}}
{{--                            {!! Form::open([--}}
{{--                                   'action' => ['Admin\CartController@removeItem',$item->id],--}}
{{--                                   'method' => 'delete'--}}
{{--                                   ]) !!}--}}
{{--                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>--}}
{{--                            {!! Form::close() !!}--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="mx-6 text-center">
                <p class="bg-danger-400 p-2 col-xs-4">لا يوجد منتجات</p>
            </div>
        @endif
    </div>
</div>
