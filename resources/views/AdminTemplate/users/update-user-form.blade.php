<x-AdminHeader type="user" />
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Update Admin User</h4>
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
                            <h3 class="box-title">Update Admin User</h3>
                            <form method="POST" action="{{ route('admin/user_update') }}" enctype="multipart/form-data">
                                @csrf
    
                                <input id="id" type="hidden" name="id" value="{{ $user->id }}" required >
                                <div class="form-group mb-4">
                                    <label for="name" class="col-md-12 p-0">{{ __('Name') }}</label>
            
                                    <div class="col-md-12 border-bottom p-0">
                                        <input id="name" type="text" class="form-control p-0 border-0 @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Name') }}" value="{{ $user->name }}" required autocomplete="name" autofocus>
            
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            
                                <div class="form-group mb-4">
                                    <label for="email" class="col-md-12 p-0">{{ __('E-Mail Address') }}</label>
            
                                    <div class="col-md-12 border-bottom p-0">
                                        <input id="email" type="email" class="form-control p-0 border-0 @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ $user->email }}" required autocomplete="email">
            
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                @if($user->user_image)
                                    <img src='{{ asset('/images/'.$user->user_image) }}' height='100px' width='100px' />
                                @endif
                                <div class="form-group mb-4">
                                    <label for="user_image" class="col-md-12 p-0">{{ __('User Image') }}</label>
            
                                    <div class="col-md-12 border-bottom p-0">
                                        <input id="user_image" type="file" class="form-control p-0 border-0 @error('user_image') is-invalid @enderror" name="user_image" placeholder="{{ __('User Image') }}" autocomplete="user_image">
            
                                        @error('user_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
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
        <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
            href="https://www.wrappixel.com/">wrappixel.com</a>
        </footer>
        <!-- ============================================================== -->
        <x-AdminFooter />