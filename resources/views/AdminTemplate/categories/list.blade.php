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
                        <h4 class="page-title">Categories</h4>
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
                                    <h3 class="box-title">Categories</h3>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('admin/add_category') }}" class="btn btn-success rounded-circle" title="Add Category"><i class='fa fa-plus'></i></a>
                                </div>
                            </div>
                            {{-- <p class="text-muted">Add class <code>.table</code></p> --}}
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Category</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($categories))
                                            <?php $i=1; ?>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-2">
                                                                @if($category['image'])
                                                                    <img src="{{ asset($category['image']) }}" height='50' width="50"/>
                                                                @else
                                                                    <img src="{{ asset('AdminAsset/plugins/images/users/1-old.jpg') }}" height='50' width="50"/>
                                                                @endif
                                                            </div>
                                                            <div class="col-6 pt-3">
                                                                {{ $category['category_name'] }}
                                                            </div>
                                                            <div class="col-4 pt-2">
                                                                <button class="btn btn-secondary rounded-circle" type="button" title="View Sub Categories" onclick="displaySubCategory({{ $category['id'] }})"><i class="fas fa-angle-down"></i></button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="pt-2">
                                                            <a href="{{ route('admin/edit_category',[$category['id']]) }}" class="btn btn-primary" title="Edit Category"><i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('admin/delete_category',[$category['id']]) }}" class="btn btn-danger" title="Delete Category"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="subCategory{{ $category['id'] }}" class="subcategories">
                                                    <td colspan='3'>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h3 class="box-title">Sub Categories</h3>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                <a href="{{ route('admin/add_category', [$category['id']]) }}" class="btn btn-success rounded-circle" title="Add New Sub Category"><i class='fa fa-plus'></i></a>
                                                            </div>
                                                        </div>
                                                        {{-- <p class="text-muted">Add class <code>.table</code></p> --}}
                                                        <div class="table-responsive">
                                                            <table class="table text-nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="border-top-0">#</th>
                                                                        <th class="border-top-0">Category</th>
                                                                        <th class="border-top-0">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if (isset($category['subcategories']))
                                                                        <?php $j = 1; ?>
                                                                        @foreach($category['subcategories'] as $subcategory)
                                                                            <tr>
                                                                                <td>{{ $j++ }}</td>
                                                                                <td>
                                                                                    <div class="row">
                                                                                        <div class="col-2">
                                                                                            @if($subcategory['image'])
                                                                                                <img src="{{ asset($subcategory['image']) }}" height='50' width="50"/>
                                                                                            @else
                                                                                                <img src="{{ asset('AdminAsset/plugins/images/users/1-old.jpg') }}" height='50' width="50"/>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="col-6 pt-3">
                                                                                            {{ $subcategory['category_name'] }}
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="pt-2">
                                                                                        <a href="{{ route('admin/edit_category',[$subcategory['id']]) }}" class="btn btn-primary" title="Edit Category"><i class="fa fa-edit"></i></a>
                                                                                        <a href="{{ route('admin/delete_category',[$subcategory['id']]) }}" class="btn btn-danger" title="Delete Category"><i class="fa fa-trash"></i></a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td colspan="3">
                                                                                <h2 class="text-center">No Records Found!</h2>
                                                                            </td>
                                                                        </tr>                                                                        
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">
                                                    <h2 class="text-center">No Records Found!</h2>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
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