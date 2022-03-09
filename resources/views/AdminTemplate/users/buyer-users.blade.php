<x-AdminHeader type="user" />
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">{{ __('Buyer Users') }}</h4>
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
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif (session()->has('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="white-box">
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="box-title">{{ __('Buyer Users') }}</h3>
                                </div>
                                {{-- <div class="col-6 text-end">
                                    <a href="{{ route('admin/register_admin') }}" class="btn btn-success">Add User</a>
                                </div> --}}
                            </div>
                            {{-- <p class="text-muted">Add class <code>.table</code></p> --}}
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">{{ __('Image') }}</th>
                                            <th class="border-top-0">{{ __('Name') }}</th>
                                            <th class="border-top-0">{{ __('Email') }}</th>
                                            <th class="border-top-0">{{ __('Mobile Number') }}</th>
                                            <th class="border-top-0">{{ __('Verified') }}</th>
                                            <th class="border-top-0">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    <img src="" height="50" width="50" />
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>@if($user->verified) {{ __('Yes') }} @else {{ __('No') }} @endif</td>
                                                <td>
                                                    <a href="{{ route('admin/update_admin_user',[$user->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('admin/delete_admin_user',[$user->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2021 © e-commerce Admin brought to you by <a
                    href="https://www.wrappixel.com/">hamza.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <x-AdminFooter />