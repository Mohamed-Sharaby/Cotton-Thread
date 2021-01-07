<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#{{$cart->address_id}}">
    عرض بيانات العنوان
</button>

<!-- Modal -->
<div class="modal fade" id="{{$cart->address_id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel"> بيانات العنوان </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <table class="table datatable-button-init-basic table-hover ">

                            <tr>
                                <th class="font-weight-bold">الاسم </th>
                                <td>{{$cart->address->name ?? __('Not Found')}}</td>

                                <th class="font-weight-bold">رقم الجوال </th>
                                <td>{{$cart->address->phone ?? __('Not Found')}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">المدينة </th>
                                <td>{{$cart->address->district->region->city->name ?? __('Not Found')}}</td>

                                <th class="font-weight-bold">المنطقة </th>
                                <td>{{$cart->address->district->region->name ?? __('Not Found')}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">الحى </th>
                                <td>{{$cart->address->district->name ?? __('Not Found')}}</td>

                                <th class="font-weight-bold">الشارع </th>
                                <td>{{$cart->address->street ?? __('Not Found')}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">رقم المنزل </th>
                                <td>{{$cart->address->house_num ?? __('Not Found')}}</td>

                                <th class="font-weight-bold"> تفاصيل العنوان</th>
                                <td>{{$cart->address->address ?? __('Not Found')}}</td>
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

