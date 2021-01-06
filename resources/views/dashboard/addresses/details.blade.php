<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#{{$address->id}}">
    تفاصيل العنوان
</button>

<!-- Modal -->
<div class="modal fade" id="{{$address->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">تفاصيل العنوان</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <table class="table datatable-button-init-basic table-hover table-responsive display nowrap text-center"
                       style="width:100%">

                    <tr>
                        <th class="font-weight-bold">الحى</th>
                        <td>{{$address->district->name ?? __('Not Found')}}</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold">المنطقة</th>
                        <td>{{$address->district->region->name ?? __('Not Found')}}</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold">الشارع</th>
                        <td>{{$address->street ?? __('Not Found')}}</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold">رقم المنزل</th>
                        <td>{{$address->house_num ?? __('Not Found')}}</td>
                    </tr>
                    <tr>
                        <th class="font-weight-bold">العنوان بالتفصيل</th>
                        <td>{{$address->address ?? __('Not Found')}}</td>
                    </tr>


                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">اغلاق
                </button>
            </div>
        </div>
    </div>
</div>
