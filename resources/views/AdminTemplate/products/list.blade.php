<x-AdminHeader />
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
                        <h4 class="page-title">{{ __('Products') }}</h4>
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
                                    <h3 class="box-title">{{ __('Products') }}</h3>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('admin/add_product') }}" class="btn btn-success rounded-circle" title="Add Category"><i class='fa fa-plus'></i></a>
                                </div>
                            </div>
                            {{-- <p class="text-muted">Add class <code>.table</code></p> --}}
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">{{ __('Product') }}</th>
                                            <th class="border-top-0">{{ __('Product Category') }}</th>
                                            <th class="border-top-0">{{ __('Product Active') }}</th>
                                            <th class="border-top-0">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($products))
                                            <?php $i=1; ?>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                @if($product['image'])
                                                                    <img src="{{ asset($product['image']) }}" height='50' width="50"/>
                                                                @else
                                                                    <img src="{{ asset('AdminAsset/plugins/images/dummy-product.png') }}" height='50' width="50"/>
                                                                @endif
                                                            </div>
                                                            <div class="col-9 pt-3">
                                                                {{ $product['name'] }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-12 pt-2">
                                                            {{ $product['category_name'] }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-12 pt-2">
                                                            @if($product->active)
                                                                <input type="checkbox" checked="checked" onclick="return false;">
                                                            @else
                                                            <input type="checkbox" onclick="return false;">
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="pt-2">
                                                            <a href="javascript:void();" class="btn btn-info" title="View Product" onclick="viewProduct({{ $product['id'] }})"><i class="fas fa-eye"></i></a>
                                                            <a href="{{ route('admin/edit_product',[$product['id']]) }}" class="btn btn-primary" title="Edit Product"><i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('admin/delete_product',[$product['id']]) }}" class="btn btn-danger" title="Delete Product"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">
                                                    <h2 class="text-center">{{ __('No Records Found!') }}</h2>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="text-center">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            @if($pagination['page'] == 1)
                                                <a class="page-link" href="javascript:void();" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            @else
                                                <a class="page-link" href="{{ route('admin/categories', [$pagination['previous_page']]) }}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            @endif
                                        </li>
                                        @for($page = 1; $page <= $pagination['total_pages']; $page++)
                                            <li class="page-item"><a class="page-link" href="{{ route('admin/categories', [$page]) }}">{{ $page }}</a></li>
                                        @endfor
                                        <li class="page-item">
                                            @if($pagination['total_pages'] == $pagination['page'])
                                                <a class="page-link" href="javascript:void();" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            @else
                                                <a class="page-link" href="{{ route('admin/categories', [$pagination['next_page']]) }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            @endif
                                        </li>
                                    </ul>
                                </nav>
                            </div> --}}
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
            <footer class="footer text-center">{{ __(date('Y').' © E-Commerce brought to you by') }} <a
                href="https://www.wrappixel.com/">{{ __('hamza.com') }}</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <x-AdminFooter />