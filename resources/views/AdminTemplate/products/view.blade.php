<div class="body" style="width: 40rem;">
  <div class="card">
    <div class="card-header">
      <h2>{{ __('View Product') }}</h2>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          @if($product->image)
            <img src="{{ asset($product->image) }}" class="w-100"/>
          @else
            <img src="{{ asset('AdminAsset/plugins/images/dummy-product.png') }}" class="w-100">
          @endif
        </div>
        <div class="col-6">
          <div class="item">
            <div class="row">
              <div class="col-6"><b>{{ __('Product Name') }}:</b></div>
              <div class="col-6">{{  $product->name }}</div>  
            </div><br>
            <div class="row">
              <div class="col-6"><b>{{ __('Product Category Name') }}:</b></div>
              <div class="col-6">{{  $product->category_name }}</div>  
            </div><br>
            <div class="row">
              <div class="col-6"><b>{{ __('Product Active') }}:</b></div>
              <div class="col-6">
                @if(!$product->active)
                  {{ __('No') }}
                @else
                  {{ __('Yes') }}
                @endif</div>  
            </div><br>
            <div class="row">
              <div class="col-6"><b>{{ __('Product Quantity') }}:</b></div>
              <div class="col-6">{{  $product->quantity }}</div>  
            </div><br>
            <div class="row">
              <div class="col-6"><b>{{ __('Purchase Price') }}:</b></div>
              <div class="col-6">{{  $product->purchase_price }}</div>  
            </div><br>
            <div class="row">
              <div class="col-6"><b>{{ __('Sale Price') }}:</b></div>
              <div class="col-6">{{  $product->sale_price }}</div>  
            </div><br>
          </div>
        </div>
      </div>
      <div class="row pt-4">
        <div class="col-12">
          <div class="row">
            <div class="col-4">
              <b>{{  __('Product Short Description') }}:</b>
            </div>
            <div class="col-8">
              {{ $product->short_description }}
            </div>
          </div><br>
          <div class="row">
            <div class="col-4">
              <b>{{  __('Product Description') }}:</b>
            </div>
            <div class="col-8">
              {{ $product->description }}
            </div>
          </div><br>
        </div>
      </div>
    </div>
  </div>
</div>