<!------------ Start Sign In Modal ------------>
<div class="modal custom_modal fade" id="resetPassModal" tabindex="-1" role="dialog" aria-labelledby="resetPassModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal_inner">
                <div class="box_center">
                    <a href="{{url('/')}}" class="box_logo"><img src="{{asset('website/img/logo.png')}}" alt="خيط القطن">
                    </a>
                    <h4 class="box_title">تعديل البيانات الشخصية</h4>
                </div>
                <form action="{{url('profile-edit')}}" autocomplete="off">
                    <div class="input-wrap">
                        <input type="password" placeholder="........" readonly onfocus="this.removeAttribute('readonly');" required>
                        <div class="hov-input">
                            <label>من فضلك ادخل كلمة المرور</label>
                        </div>
                    </div>
                    <button type="submit" class="btn-hvr">متابعة</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!------------ End Sign In Modal ------------>
