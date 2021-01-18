<!------------ Start Sign In Modal ------------>
<div class="modal custom_modal fade" id="returnsModal" tabindex="-1" role="dialog" aria-labelledby="returnsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal_inner">
                <div class="box_center">
                    <h4 class="box_title">سياسة الاسترجاع</h4>
                </div>
                <form action="{{url('profile-orders')}}" class="defaultForm">
                    <ul class="list_decoration">
                        <li>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل</li>
                        <li>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل</li>
                        <li>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل</li>
                    </ul>
                    <div class="form">
                        <input id="check" type="checkbox">
                        <label for="check" style="--d: '+d+' px">
                            <svg viewBox="0,0,50,50">
                                <path d="M5 30 L 20 45 L 45 5"></path>
                            </svg>
                        </label>
                        الموافقة على الشروط
                    </div>
                    <button type="submit" class="btn-hvr" data-dismiss="modal">حفظ</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!------------ End Sign In Modal ------------>
