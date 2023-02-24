@extends('base')

@section('scripts')
<script type="text/javascript" src="{{ url('assets/js/ajax.js') }}?{{rand(2, 20)}}"></script>
@endsection

@section('modalContent')
<!-- ****** Quick View Modal Area Start ****** -->
        
        <section class="shop_grid_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                      
                      
                      <div style="display: flex; margin-bottom: 100px">  
                      
                        <form action="{{ $url ?? url('clothe') }}">
                                <div style="width: 300px; height: 30px; margin-bottom: 50px; display: flex">
                                    <input value="{{$search ?? ''}}" type="text" class="q" name="q" id="q" value="{{ $q ?? '' }}">
                                    <input type="hidden" name="orderby" value="{{ $orderby ?? '' }}">
                                    <input type="hidden" name="ordertype" value="{{ $ordertype ?? '' }}">
                                    <div>
                                            <button type="submit" class="search">SEARCH</button>
                                    </div>
                                </div>
                            </form>
                        
                            <div>
                                    <div style="margin-left: 100px !important; width: 200px !important; height: 50px !important">
                                        <h4 style="color: orange; margin-bottom: 20px">Order by price</h4>
                                        <ul style="list-style-type: none">
                                            <!-- Single Item -->
                                            <li >
                                                <a href="#" class="sorting" data-type="clothe.price" data-sort="desc"><strong>Most expensive</strong></a>
                                            </li>
                                            <!-- Single Item -->
                                            <li style="margin-top: 20px">
                                                <a href="#" class="sorting" data-type="price" data-sort="asc"><strong>Cheapest</strong></a>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                        </div>
                    <div class="col-12 col-md-8 col-lg-9" style="margin: 0 auto; width: 1500px; height: auto; margin-bottom: 300px">
                        <div class="shop_grid_product_area">
                            <div class="row" id="clotheAjaxBody">
                                
                            </div>
                        </div>
                        <nav style="margin-top: 75px">
                            <ul id="pagination" class="pagination"></ul>
                        </nav>
                    </div>
                </div>
            </div>
            </div>
        </section>
        
@endsection