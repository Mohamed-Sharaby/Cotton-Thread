<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#{{$gallery->id}}">
    التفاصيل
</button>

<!-- Modal -->
<div class="modal fade" id="{{$gallery->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel"> تفاصيل المنتج </h5>
                <span class="badge badge-danger ml-2 font-size-lg">{{$gallery->name}}</span>
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
                                <td>{{$gallery->ar_name}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">الاسم بالانجليزية</th>
                                <td>{{$gallery->en_name}}</td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">النوع</th>
                                <td>{{$gallery->type == 'image' ? 'صورة' : 'فيديو'}}</td>
                            </tr>
                            @if($gallery->type == 'image')
                                <tr>
                                    <th class="font-weight-bold">الصورة</th>
                                    <td>
                                        @if($gallery->image)

                                            <a data-fancybox="gallery" href="{{getImgPath($gallery->image)}}">
                                                <img src="{{getImgPath($gallery->image)}}" width="70" height="70"
                                                     class="img-thumbnail" alt="cat_img">
                                            </a>
                                        @else {{__('No Image')}} @endif
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <th class="font-weight-bold">رابط الفيديو</th>
                                    <td>
                                        <a href="{{$gallery->url}}" target="_blank">الذهاب للرابط</a>
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <th class="font-weight-bold">الوصف بالعربية</th>
                                <td>{{$gallery->ar_details}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">الوصف بالانجليزية</th>
                                <td>{{$gallery->en_details}}</td>
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

