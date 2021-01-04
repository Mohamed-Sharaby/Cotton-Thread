<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#{{$product->id}}">
    تفاصيل المنتج
</button>

<!-- Modal -->
<div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel"> تفاصيل المنتج </h5>
                <span class="badge badge-danger ml-2 font-size-lg">{{$product->name}}</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <table class="table datatable-button-init-basic table-hover ">

                            <tr>
                                <th class="font-weight-bold">الاسم بالعربية</th>
                                <td>{{$product->ar_name}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">الاسم بالانجليزية</th>
                                <td>{{$product->en_name}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">القسم الفرعى </th>
                                <td>{{$product->subcategory->name}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">السعر</th>
                                <td>{{$product->price}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">الخصم</th>
                                <td>{{$product->discount}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">جديد</th>
                                <td>{{$product->is_new == 1 ? 'نعم' : 'لا'}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">الوصف بالعربية</th>
                                <td>{{$product->ar_details}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">الوصف بالانجليزية</th>
                                <td>{{$product->en_details}}</td>
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

