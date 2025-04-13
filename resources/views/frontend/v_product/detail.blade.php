 
@extends('frontend.v_layout.app') 
@section('content') 
<!-- template --> 
 
<!-- row --> 
<div class="row"> 
    <div class="col-md-12"> 
        <div class="billing-details"> 
            <div class="section-title"> 
               
                    
             
                <h3 class="title">{{ $judul }} </h3> 
            </div> 
        </div> 
    </div> 
    <!--  Product Details --> 
    <div class="product product-details clearfix"> 
        <div class="col-md-6"> 
            <div id="product-main-view"> 
                <div class="product-view"> 
                    <img src="{{asset('storage/img-product/'.$product->foto) }}" alt="" class="product-thumb">
                </div> 
               
            </div> 
            <div id="product-view"> 
 
 
               
               
            </div> 
        </div> 
        <div class="col-md-6"> 
            <div class="product-body"> 
                <div class="product-label"> 
                    <span>Merk</span> 
                    <span class="sale">{{ $product->merk }}</span> 
                </div> 
                <h2 class="product-name">{{ $product->product_name }}</h2> 
                <h3 class="product-price">Rp. {{ number_format($product->product_price, 0, ',', '.') }} 
</h3> 
                <p> 
                    {!! $product->product_description !!} 
                </p> 
                <div class="product-options"> 
                    <ul class="size-option"> 
                        <li><span class="text-uppercase">Type Product:</span></li> 
                        {{ $product->product_type }} 
                    </ul> 
                    <ul class="size-option"> 
                        <li><span class="text-uppercase">Stock:</span></li> 
                        {{ $product->product_stock }} 
                    </ul> 
                </div> 
                
                <div class="product-btns"> 
                    <form action="#" method="post" 
                        style="display: inline-block;"> 
                        @csrf 
                        <button type="submit" class="primary-btn add-to-cart"><i class="fa 
fa-shopping-cart"></i> 
                            Pesan</button> 
                    </form> 
                </div> 
            </div> 
        </div> 
 
    </div> 
</div> 
<!-- /Product Details --> 
 
<!-- end template--> 
@endsection 