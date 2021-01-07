<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#{{$cart->id}}">
    عرض بيانات العميل
</button>

<!-- Modal -->
<div class="modal fade" id="{{$cart->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel"> بيانات العميل </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <table class="table datatable-button-init-basic table-hover ">

                            <tr>
                                <th class="font-weight-bold">اسم العميل</th>
                                <td>{{$cart->user->name ?? __('Not Found')}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">رقم الجوال</th>
                                <td>{{$cart->user->phone ?? __('Not Found')}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">البريد الالكترونى</th>
                                <td>{{$cart->user->email ?? __('Not Found')}}</td>
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

