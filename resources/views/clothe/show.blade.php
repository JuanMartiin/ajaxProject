@extends('base')
@section('modalContent')



        <!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area Start >>>>>>>>>>>>>>>>>>>>>>>>> -->
        <section class="single_product_details_area section_padding_0_100 mt-100">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(img/product-img/product-9.jpg);">
                                    </li>
                                    <!--<li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(img/product-img/product-2.jpg);">-->
                                    <!--</li>-->
                                    <!--<li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(img/product-img/product-3.jpg);">-->
                                    <!--</li>-->
                                    <!--<li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(img/product-img/product-4.jpg);">-->
                                    <!--</li>-->
                                </ol>

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="img/product-img/product-9.jpg">
                                        <img class="d-block w-100" src="{{ asset('storage/images/' . $clothe->id . '.jpg') }}" alt="">
                                    </a>
                                    </div>
                                    <!--<div class="carousel-item">-->
                                    <!--    <a class="gallery_img" href="img/product-img/product-2.jpg">-->
                                    <!--    <img class="d-block w-100" src="img/product-img/product-2.jpg" alt="Second slide">-->
                                    <!--</a>-->
                                    <!--</div>-->
                                    <!--<div class="carousel-item">-->
                                    <!--    <a class="gallery_img" href="img/product-img/product-3.jpg">-->
                                    <!--    <img class="d-block w-100" src="img/product-img/product-3.jpg" alt="Third slide">-->
                                    <!--</a>-->
                                    <!--</div>-->
                                    <!--<div class="carousel-item">-->
                                    <!--    <a class="gallery_img" href="img/product-img/product-4.jpg">-->
                                    <!--    <img class="d-block w-100" src="img/product-img/product-4.jpg" alt="Fourth slide">-->
                                    <!--</a>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">

                            <h4 class="title"><a href="#">{{ $clothe->name }}</a></h4>

                            <h4 class="price" style="color: orange">{{ $clothe->price }}€</h4>


                            

                            <div class="widget size mb-50">
                                <h6 class="widget-title">Size</h6>
                                <div class="widget-desc">
                                    <ul>
                                        <li>S</li>
                                        <li>M</li>
                                        <li>L</li>
                                        <li>XL</li>
                                    </ul>
                                </div>
                            </div>
                            <div style="background-color: black; border: 1px solid black; width: 130px; height: 40px; cursor: pointer; border-radius: 10px"><p style="color: white; font-size: 1.3em; text-align: center; margin-top: 5px">BUY</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area End >>>>>>>>>>>>>>>>>>>>>>>>> -->

        <!-- ****** Quick View Modal Area Start ****** -->
        <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <div class="modal-body">
                        <div class="quickview_body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-5">
                                        <div class="quickview_pro_img">
                                            <img src="img/product-img/product-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="quickview_pro_des">
                                            <h4 class="title">Boutique Silk Dress</h4>
                                            <div class="top_seller_product_rating mb-15">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            
                                        </div>
                                        <!-- Add to Cart Form -->
                                        <form class="cart" method="post">
                                            <div class="quantity">
                                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                                <input type="number" class="qty-text" id="qty2" step="1" min="1" max="12" name="quantity" value="1">

                                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>
                                            <!-- Wishlist -->
                                            <div class="modal_pro_wishlist">
                                                <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                            </div>
                                            <!-- Compare -->
                                            <div class="modal_pro_compare">
                                                <a href="compare.html" target="_blank"><i class="ti-stats-up"></i></a>
                                            </div>
                                        </form>

                                        <div class="share_wf mt-30">
                                            <p>Share With Friend</p>
                                            <div class="_icon">
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection