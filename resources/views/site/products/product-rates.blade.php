<div class="pro-rating">
    <div class="col-md-6 col-xs-12">
        <div class="user-rating">
            <div class="rate_in">
                <p class="rate_ratio">{{$product->avg_rate}}</p>
                <ul class="stars">
                    <!-- add class (.yellowed) to the number of rates --->
                    @for($i=0; $i< $product->avg_rate; $i++)
                        <li class="yellowed"><i class="fas fa-star"></i></li>
                        @endfor
                        @for($i=0;$i<(5-$product->avg_rate);$i++)
                            <li><i class="fas fa-star"></i></li>
                            @endfor
                </ul>
                <span>التقييم الكلى</span>
            </div>
            {{-- <div class="user-rating-details-wrap">--}}
            {{-- <h3>التقييم الكلى</h3>--}}
            {{-- <div class="user-rating-details">--}}
            {{-- <span>الخامة</span>--}}
            {{-- <div class="v-rating">--}}
            {{-- <span style="width:50%"></span>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="user-rating-details">--}}
            {{-- <span>الجودة</span>--}}
            {{-- <div class="v-rating">--}}
            {{-- <span style="width:75%"></span>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="user-rating-details">--}}
            {{-- <span>التوصيل</span>--}}
            {{-- <div class="v-rating">--}}
            {{-- <span style="width:25%"></span>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="user-rating-details">--}}
            {{-- <span>السعر</span>--}}
            {{-- <div class="v-rating">--}}
            {{-- <span style="width:100%"></span>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            <div class="user-comment">
                <h2>التقييمات ({{$ratesCount}})</h2>
                @foreach($rates as $rate)
                <div class="user-comment-content">
                    <div class="user-data">
                        <img src="{{$rate->user->image}}">
                        <h3>{{$rate->user->name}} </h3>
                        <span>{{\Carbon\Carbon::parse($rate->created_at)->format('Y M d')}}</span>
                    </div>
                    <p>{{$rate->comment}}</p>
                    <div class="rate_in">
                        <p class="rate_ratio">4.7 <span>جيد جدأ</span></p>
                        <ul class="stars">
                            <!-- add class (.yellowed) to the number of rates --->
                            <li class="yellowed"><i class="fas fa-star"></i></li>
                            <li class="yellowed"><i class="fas fa-star"></i></li>
                            <li class="yellowed"><i class="fas fa-star"></i></li>
                            <li class="yellowed"><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="col-md-6 col-xs-12">
        @auth()
        @if($can_rate)
        <div class="your-rating">
            <form class="add_comment_form" action="{{route('website.products.rate')}}" method="post">
                @csrf
                <h3>إضافة تقييمك</h3>
                {{-- <div class="form__group field">--}}
                {{-- <input type="text" class="form__field" placeholder="الاسم" id='name' name="name"--}}
                {{-- value="{{auth()->user()->name ?? ''}}"/>--}}
                {{-- <label for="name" class="form__label">الاسم</label>--}}
                {{-- </div>--}}
                {{-- <div class="form__group field">--}}
                {{-- <input type="email" class="form__field" placeholder="البريد الالكترونى"--}}
                {{-- value="{{auth()->user()->email ?? ''}}"--}}
                {{-- name="email" id='mail' required/>--}}
                {{-- <label for="mail" class="form__label">البريد الإلكترونى</label>--}}
                {{-- </div>--}}
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="rating-pro">
                    <div class="rate_in">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                            <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                        </fieldset>
                    </div>
                </div>
                <textarea placeholder="إضافة تعليق" required oninvalid="this.setCustomValidity('{{__('Comment Required')}}')" onchange="this.setCustomValidity('')" name="comment">{{old('comment')}}</textarea>
                <button type="submit" class="btn-hvr" id="add_comment_btn">إضافة</button>
            </form>
        </div>
        @endif
        @else
        <h3>إضافة تقييمك</h3>
        <p class="alert alert-danger">سجل <a href="{{route('login')}}" class="text-light"> دخولك </a> لكى تتمكن من اضافة تقييم</p>
        @endauth
    </div>

</div>
