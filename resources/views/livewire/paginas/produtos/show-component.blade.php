<x-slot name="header">
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="{{ route('home') }}" class="headerButton">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">{{ $model->name }}</div>
        <div class="right">
            <a href="#" class="headerButton">
                <ion-icon name="star-outline"></ion-icon>
            </a>
        </div>
    </div>
</x-slot>
<div id="appCapsule">


    <!-- carousel full -->
    <div class="carousel-full splide">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img src="{{ $model->cover_url }}" alt="alt" class="imaged w-100 square">
                </li>
            </ul>
        </div>
    </div>
    <!-- * carousel full -->

    <div class="section full">
        <div class="wide-block pt-2 pb-2 product-detail-header">
            <div class="rate-block mb-1">
                <ion-icon name="star" class="active"></ion-icon>
                <ion-icon name="star" class="active"></ion-icon>
                <ion-icon name="star" class="active"></ion-icon>
                <ion-icon name="star" class="active"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
            <h1 class="title">{{ $model->name }}</h1>
            <div class="text">1 kg - Packed</div>
            <div class="detail-footer">
                <!-- price -->
                <div class="price">
                    <div class="old-price">R$ {{ form_read($model->old_price)}}</div>
                    <div class="current-price">R$ {{ form_read($model->sale_price)}}</div>
                </div>
                <!-- * price -->
                <!-- amount -->
                <div class="amount">
                    <div class="stepper stepper-secondary">
                        <a href="#" class="stepper-button stepper-down">-</a>
                        <input type="text" class="form-control" value="1" disabled />
                        <a href="#" class="stepper-button stepper-up">+</a>
                    </div>
                </div>
                <!-- * amount -->
            </div>
            <button class="btn btn-primary btn-lg btn-block">
                <ion-icon name="cart-outline"></ion-icon>
                Adicionar item
            </button>
        </div>
    </div>


    <div class="section full mt-2">
        <div class="section-title">Product Details</div>
        <div class="wide-block pt-2 pb-2">
           {!! $model->description->content !!}
        </div>

    </div>

    <!-- Review -->
    <div class="section full mt-2">
        <div class="section-title">Reviews (2)</div>
        <div class="wide-block pt-2 pb-2">
            <!-- comment block -->
            <div class="comment-block">
                <!--item -->
                <div class="item">
                    <div class="avatar">
                        <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w32 rounded">
                    </div>
                    <div class="in">
                        <div class="comment-header">
                            <h4 class="title">Diego Morata</h4>
                            <span class="time">just now</span>
                        </div>
                        <div class="rate-block mb-1 mt-05">
                            <ion-icon name="star" class="active"></ion-icon>
                            <ion-icon name="star" class="active"></ion-icon>
                            <ion-icon name="star" class="active"></ion-icon>
                            <ion-icon name="star" class="active"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>
                        <div class="text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="comment-footer">
                            <a href="#" class="comment-button">
                                <ion-icon name="happy-outline"></ion-icon>
                                Helpful (523)
                            </a>
                            <a href="#" class="comment-button">
                                <ion-icon name="flag-outline"></ion-icon>
                                Report
                            </a>
                        </div>
                    </div>
                </div>
                <!-- * item -->
                <!--item -->
                <div class="item">
                    <div class="avatar">
                        <img src="assets/img/sample/avatar/avatar4.jpg" alt="avatar" class="imaged w32 rounded">
                    </div>
                    <div class="in">
                        <div class="comment-header">
                            <h4 class="title">Carmelita Marsham</h4>
                            <span class="time">Sep 23, 2020</span>
                        </div>
                        <div class="rate-block mb-1 mt-05">
                            <ion-icon name="star" class="active"></ion-icon>
                            <ion-icon name="star" class="active"></ion-icon>
                            <ion-icon name="star" class="active"></ion-icon>
                            <ion-icon name="star" class="active"></ion-icon>
                            <ion-icon name="star" class="active"></ion-icon>
                        </div>
                        <div class="text">
                            Vivamus lobortis, orci et commodo pulvinar, eros nibh volutpat ipsum, in rhoncus risus
                            dolor
                            sed ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec nisi
                            odio,
                            dapibus in felis vel, lobortis iaculis quam.
                        </div>
                        <div class="comment-footer">
                            <a href="#" class="comment-button">
                                <ion-icon name="happy-outline"></ion-icon>
                                Helpful (43)
                            </a>
                            <a href="#" class="comment-button">
                                <ion-icon name="flag-outline"></ion-icon>
                                Report
                            </a>
                        </div>
                    </div>
                </div>
                <!-- * item -->
            </div>
            <!-- * comment block -->
            <div class="divider mt-3 mb-2"></div>
            <a href="#" class="btn btn-block btn-primary">Add a review</a>
        </div>
    </div>
    <!-- * Review -->



    <div class="section full mt-2 mb-3">
        <div class="section-title mb-1">Related Items</div>


        <!-- carousel multiple -->
        <div class="carousel-multiple splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="card product-card">
                            <div class="card-body">
                                <img src="assets/img/sample/photo/product1.jpg" class="image"
                                    alt="product image">
                                <h2 class="title">Apple</h2>
                                <p class="text">1 kg</p>
                                <div class="price">$ 4.99</div>
                                <a href="#" class="btn btn-sm btn-primary btn-block">ADD TO CART</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- * carousel multiple -->

    </div>
    <!-- App Sidebar -->
    @include('layouts.includes.footer')
    <!-- App Bottom Menu -->
</div>
