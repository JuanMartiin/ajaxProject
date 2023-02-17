@extends('base')
@section('modalContent')
<!-- ****** Quick View Modal Area Start ****** -->
        
        <section class="shop_grid_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                      
                      
                      <div style="display: flex; margin-bottom: 100px">  
                        <form action="{{ $url ?? url('clothe') }}">
                                <div style="width: 300px; height: 30px; margin-bottom: 50px; display: flex">
                                    <input value="{{$search ?? ''}}" type="text" name="q" value="{{ $q ?? '' }}" class="form-control" >
                                    <input type="hidden" name="orderby" value="{{ $orderby ?? '' }}">
                                    <div>
                                            <button type="submit" class="search">SEARCH</button>
                                    </div>
                                </div>
                            </form>
                        
                            <div style="margin-left: 100px">
                                    <div>
                                        <h4 style="color: orange; margin-bottom: 20px">Order by price</h4>
                                        <ul>
                                            <li style="margin-bottom: 20px">
                                                <a href="{{ $order['price']['desc'] }}"><strong>Most expensive</strong></a>
                                            </li>
                                            <li >
                                                <a href="{{ $order['price']['asc'] }}"><strong>Cheapest</strong></a>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                        </div>
                    <div class="col-12 col-md-8 col-lg-9" style="margin: 0 auto; width: 1500px; height: auto; margin-bottom: 300px">
                        <div class="shop_grid_product_area">
                            <div class="row">
                                @foreach($clothes as $clothe)
                                <!-- Single gallery Item -->
                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" style="width: 300px; height: 200px; margin-right: 40px" data-wow-delay="0.2s">
                                    <!-- Product Image -->
                                    <a href="{{ url('clothe/'. $clothe->id) }}"><div class="product-img">
                                        <img src="{{ asset('storage/images/' . $clothe->id . '.jpg') }}" style="width: 100%; height: auto" alt="">
                                    </div></a>
                                    <!-- Product Description -->
                                    <div class="product-description" style="margin-top: 20px">
                                        <h4 class="product-price" style="color: orange">{{ $clothe->price }}€</h4>
                                        <p style="font-size: 1.1em"><strong>{{ $clothe->name }}</strong></p>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>

                    </div>{{ $clothes->onEachSide(2)->links() }}
                </div>
            </div>
        </section>
        
@endsection