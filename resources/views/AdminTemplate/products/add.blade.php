<x-AdminHeader />
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">{{ __('Add Product') }}</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex">
                        <ol class="breadcrumb ms-auto">
                            <li><a href="{{ route('admin') }}" class="fw-normal">{{ __('Dashboard') }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            @if (session()->has('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <h3 class="box-title">{{ __('Add Product') }}</h3>
                            <form method="POST" action="{{ route('admin/store_product') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group mb-4">
                                            <label for="name" class="col-md-12 p-0">{{ __('Product Name') }}</label>
                    
                                            <div class="col-md-12 border-bottom p-0">
                                                <input id="name" type="text" class="form-control p-0 border-0 @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Product Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group mb-4">
                                            <label for="category" class="col-md-12 p-0">{{ __('Product Category') }}</label>
                    
                                            <div class="col-md-12 border-bottom p-0">
                                                {{-- <input id="category" type="text" class="form-control p-0 border-0 @error('category') is-invalid @enderror" name="category" placeholder="{{ __('Product Category') }}" value="{{ old('category') }}" required autocomplete="category" autofocus> --}}
                                                <select id="category" type="text" class="form-control p-0 border-0 @error('category') is-invalid @enderror" name="category" placeholder="{{ __('Category') }}" required autofocus>
                                                    <option value="0" disabled selected>&nbsp;{{ __('Select Product Category') }}</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category['id'] }}">&nbsp;{{ __($category['category_name']) }}</option>
                                                        @if(isset($category['subcategories']))
                                                            @foreach($category['subcategories'] as $subcategory)
                                                                <option value="{{ $subcategory['id'] }}">&nbsp;>> {{ __($subcategory['category_name']) }}</option>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </select>

                                                @error('category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group mb-4">
                                            <label for="purchase_price" class="col-md-12 p-0">{{ __('Purchase Price') }}</label>
                    
                                            <div class="col-md-12 border-bottom p-0">
                                                <input id="purchase_price" type="text" class="form-control p-0 border-0 @error('purchase_price') is-invalid @enderror" name="purchase_price" placeholder="{{ __('Purchase Price') }}" value="{{ old('purchase_price') }}" required autocomplete="purchase_price" autofocus>
                    
                                                @error('purchase_price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-4">
                                            <label for="sale_price" class="col-md-12 p-0">{{ __('Sale Price') }}</label>
                    
                                            <div class="col-md-12 border-bottom p-0">
                                                <input id="sale_price" type="text" class="form-control p-0 border-0 @error('sale_price') is-invalid @enderror" name="sale_price" placeholder="{{ __('Sale Price') }}" value="{{ old('sale_price') }}" required autocomplete="sale_price" autofocus>
                    
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group mb-4">
                                            <label for="quantity" class="col-md-12 p-0">{{ __('Product Quantity') }}</label>
                    
                                            <div class="col-md-12 border-bottom p-0">
                                                <input id="quantity" type="text" class="form-control p-0 border-0 @error('quantity') is-invalid @enderror" name="quantity" placeholder="{{ __('Product Quantity') }}" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                    
                                                @error('quantity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-4">
                                            <label for="image" class="col-md-12 p-0">{{ __('Product Image') }}</label>
                    
                                            <div class="col-md-12 border-bottom p-0">
                                                <input id="image" type="file" class="form-control p-0 border-0 @error('image') is-invalid @enderror" name="image" placeholder="{{ __('Product Image') }}" value="{{ old('image') }}" autocomplete="image" autofocus>
                    
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mb-4">
                                    <label for="short_description" class="col-md-12 p-0">{{ __('Short Description') }}</label>
            
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea id="short_description" rows='3' class="form-control p-0 border-0 @error('short_description') is-invalid @enderror" name="short_description" placeholder="{{ __('Short Description') }}" required autocomplete="short_description" autofocus>{{ old('short_description') }}</textarea>
            
                                        @error('short_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="description" class="col-md-12 p-0">{{ __('Long Description') }}</label>
            
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea id="description" rows="5" class="form-control p-0 border-0 @error('description') is-invalid @enderror" name="description" placeholder="{{ __('Long Description') }}" autocomplete="description" autofocus>{{ old('description') }}</textarea>
            
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <footer class="footer text-center">{{ __(date('Y').' © E-Commerce brought to you by') }} <a
            href="https://www.wrappixel.com/">{{ __('hamza.com') }}</a>
        </footer>
        <!-- ============================================================== -->
        <x-AdminFooter />