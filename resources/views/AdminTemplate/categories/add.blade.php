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
                    <h4 class="page-title">Add Category</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex">
                        <ol class="breadcrumb ms-auto">
                            <li><a href="{{ route('admin') }}" class="fw-normal">Dashboard</a></li>
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
                            <h3 class="box-title">Add Category</h3>
                            <form method="POST" action="{{ route('admin/store_category') }}" enctype="multipart/form-data">
                                @csrf
    
                                <div class="form-group mb-4">
                                    <label for="category_parent" class="col-md-12 p-0">{{ __('Category Parent') }}</label>
            
                                    <div class="col-md-12 border-bottom p-0">
                                        <select id="category_parent" type="text" class="form-control p-0 border-0 @error('category_parent') is-invalid @enderror" name="category_parent" placeholder="{{ __('Category Parent') }}" required autofocus>
                                            <option value="0" @if(!isset($parentId)) selected @endif>Root Category</option>
                                            @foreach($categoriesArr as $category)
                                                @if(isset($parentId))
                                                    @if($parentId == $category->id)
                                                        <option value="{{ $category->id }}" selected >{{ $category->category_name }}</option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_parent')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="cat-name" class="col-md-12 p-0">{{ __('Category Name') }}</label>
            
                                    <div class="col-md-12 border-bottom p-0">
                                        <input id="cat-name" type="text" class="form-control p-0 border-0 @error('cat-name') is-invalid @enderror" name="cat-name" placeholder="{{ __('Category Name') }}" value="{{ old('cat-name') }}" required autocomplete="cat-name" autofocus>
            
                                        @error('cat-name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="cat-name" class="col-md-12 p-0">{{ __('Category Image') }}</label>
            
                                    <div class="col-md-12 border-bottom p-0">
                                        <input id="image" type="file" class="form-control p-0 border-0 @error('image') is-invalid @enderror" name="image" placeholder="{{ __('Category Image') }}" value="{{ old('image') }}" autocomplete="image" autofocus>
            
                                        @error('image')
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
        <footer class="footer text-center"> 2022 © E-Commerce brought to you by <a
            href="https://www.wrappixel.com/">hamza.com</a>
        </footer>
        <!-- ============================================================== -->
        <x-AdminFooter />