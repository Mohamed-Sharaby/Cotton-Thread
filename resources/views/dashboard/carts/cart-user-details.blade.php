<table class="table datatable-button-init-basic table-hover ">
    <tr>
        <th class="font-weight-bold">بيانات العميل</th>
        <td>@include('dashboard.carts.user_details')</td>
        <th class="font-weight-bold">تاريخ الطلب</th>
        <td>{{optional($cart->created_at)->format('Y.m.d') ?? __('Not Found')}}</td>
    </tr>
    <tr>
        <th class="font-weight-bold">طريقة الدفع</th>
        <td>
            @if($cart->payment == 'bank_transaction')
                <span>{{__($cart->payment)}}</span>
                <a data-fancybox="gallery"
                   href="{{$cart->transaction_image}}">
                    <img src="{{$cart->transaction_image}}"
                         width="60" height="60" class="img-thumbnail"
                         alt="bank_transaction_img">
                </a>
            @else
                {{__($cart->payment)}}
            @endif
        </td>
        <th class="font-weight-bold">حالة الطلب</th>
        <td>{{__($cart->status)}}</td>
    </tr>
    <tr>
        <th class="font-weight-bold">العنوان</th>
        <td>
            @if($cart->address)
                @include('dashboard.carts.address_details')
            @else
                لا يوجد
            @endif
        </td>

        <th class="font-weight-bold">وقت وصول الطلب</th>
        <td>{{optional($cart->delivered_at)->format('Y.m.d') ?? __('Not Found')}}</td>
    </tr>

</table>
