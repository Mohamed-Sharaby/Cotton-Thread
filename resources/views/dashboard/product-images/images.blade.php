<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#item{{$product->id}}">
    صور المنتج
</button>

<!-- Modal -->
<div class="modal fade" id="item{{$product->id}}" tabindex="-1"
     role="dialog"
     aria-labelledby="item{{$product->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-dark">
                <h5 class="modal-title p-0 rounded"
                    id="exampleModalScrollableTitle">الصور
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <p class="msg alert alert-success  text-center" style="display: none;margin-bottom: 10px;">
                            تم حذف الصورة بنجاح
                        </p>
                        @if(count($product->product_images) > 0)
                            <table class="" style="width: 100%;">

                                <thead>
                                <tr class="text-dark">
                                    <th>#</th>
                                    <th class="font-weight-bold">الصورة </th>
                                    <th class="font-weight-bold">حذف</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($product->product_images as $index =>$image)
                                    <tr class="image{{$image->id}}">
                                        <td>{{$index +1}}</td>
                                        <td>
                                            @if($image->image)
                                                <a data-fancybox="gallery" href="{{$image->image}}">
                                                    <img src="{{$image->image}}" width="70" height="70"
                                                         class="img-thumbnail" alt="cat_img">
                                                </a>
                                            @else {{__('No Image')}} @endif
                                        </td>

                                        <td class="text-center">
                                            <a class="btn btn-danger btn-sm del_image" data-id="{{$image->id}}">
                                                <i class="fa fa-trash text-white"></i></a>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @else
                            <div class="mx-6 text-center">
                                <p class="bg-danger-400 p-1 col-xs-4">لا يوجد</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">
                    اغلاق
                </button>
            </div>
        </div>
    </div>
</div>
