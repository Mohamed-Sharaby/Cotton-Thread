<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#{{$coupon->id}}">
    التفاصيل
</button>

<!-- Modal -->
<div class="modal fade" id="{{$coupon->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel"> تفاصيل قسيمة التخفيض </h5>
                <span class="bg-danger-800 ml-3 p-1 rounded">{{$coupon->name}}</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <table class="table datatable-button-init-basic table-hover ">

                            <tr>
                                <th class="font-weight-bold">اسم القسيمة</th>
                                <td>{{$coupon->name ?? __('Not Found')}}</td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">كود القسيمة</th>
                                <td>{{$coupon->code ?? __('Not Found')}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">نسبة خصم القسيمة</th>
                                <td>{{$coupon->value .' %' ?? __('Not Found')}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">تاريخ انتهاء الخصم</th>
                                <td>{{\Carbon\Carbon::parse($coupon->expire_at)->format('Y-m-d') ?? __('Not Found')}}</td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">المنتجات التى تطبق عليها القسيمة</th>
                                <td>
                                    @if($coupon->products_in)
                                            @foreach(\App\Models\Product::whereIn('id', $coupon->products_in)->get() as $p)
                                                {{ $p->name }}
                                            <br>
                                            @endforeach
                                    @else
                                        لا يوجد
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">المنتجات المستبعدة من القسيمة</th>
                                <td>
                                    @if($coupon->products_out)
                                            @foreach(\App\Models\Product::whereIn('id', $coupon->products_out)->get() as $p)
                                                {{$p->name}}
                                            <br>
                                            @endforeach
                                    @else
                                        لا يوجد
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">عدد مرات استخدام القسيمة</th>
                                <td>{{$coupon->no_of_use ?? __('Not Found')}}</td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">عدد مرات استخدام العميل للقسيمة</th>
                                <td>{{$coupon->no_of_client_use ?? __('Not Found')}}</td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">استبعاد المنتجات المخصومة</th>
                                <td>{{$coupon->exclude_products_discount == 1 ? 'نعم' : 'لا'}}</td>
                            </tr>



                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">اغلاق
                </button>
            </div>
        </div>
    </div>
</div>

