<table class="table datatable-button-init-basic table-hover ">
    <tr>
        <th class="font-weight-bold">بيانات العميل</th>
        <td>@include('dashboard.carts.user_details')</td>
        <th class="font-weight-bold">تاريخ الطلب</th>
        <td>{{optional($cart->created_at)->format('Y.m.d') ?? __('Not Found')}}</td>
    </tr>
    <tr>
        <th class="font-weight-bold">اجمالى تكلفة الطلب</th>
        <td>{{$cart->total ?? __('Not Found')}}</td>
        <th class="font-weight-bold">طريقة الدفع</th>
        <td>
            {{__($cart->payment)}}
        </td>
    </tr>
    <tr>
        <th class="font-weight-bold">العنوان</th>
        <td>@include('dashboard.carts.address_details')</td>
        <th class="font-weight-bold">حالة الطلب</th>
        <td>{{__($cart->status)}}</td>
    </tr>
    <tr>
        <th class="font-weight-bold">وقت وصول الطلب</th>
        <td>{{optional($cart->delivered_at)->format('Y.m.d') ?? __('Not Found')}}</td>
    </tr>

</table>
