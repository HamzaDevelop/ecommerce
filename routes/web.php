<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\IndexController;
use App\Http\Controllers\customer\ContactUsController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\CheckoutController;
use App\Http\Controllers\customer\WishlistController;
use App\Http\Controllers\customer\MyAccountController;
use App\Http\Controllers\customer\BlogController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Utilities\CommonHelper;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'language'], function()
{
    
    /* Customer Module */
    // Index Page
    Route::get('/', [IndexController::class, 'index']);
    // Home Page
    Route::get('/home', [IndexController::class, 'index'])->name('home');
    // contact us page
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact_us');
    // cart page
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    // checkout page
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    //  wishlist page
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    // account page
    Route::get('/my-account', [MyAccountController::class, 'index'])->name('my_account');
    // blog archive page
    Route::get('/blog-archive', [BlogController::class, 'index'])->name('blog_archive');
    // Blog Single Page
    Route::get('/blog-single', [BlogController::class, 'blog_single'])->name('blog_single');


    /* Admin Module */
    Route::group(['prefix' => 'admin',  'middleware' => 'auth:admin'], function()
    {
        // Index Page
        Route::get('/', [HomeController::class, 'index'])->name('admin');
        // Home Page
        // Route::get('/admin', [App\Http\Controllers\admin\HomeController::class, 'index']);
        // contact us page
        Route::get('/404', [HomeController::class, 'error'])->name('admin/404');
        // Category Page
        Route::get('/categories/{page?}', [CategoryController::class, 'index'])->name('admin/categories');
        // Edit Category page
        Route::get('/edit-category/{cat_id}', [CategoryController::class, 'edit'])->name('admin/edit_category');
        // Add Category page
        Route::get('/add-category/{parent_id?}', [CategoryController::class, 'create'])->name('admin/add_category');
        // Add Category
        Route::post('/store-category', [CategoryController::class, 'store'])->name('admin/store_category');
        // Update category
        Route::post('/update-category', [CategoryController::class, 'update'])->name('admin/update_category');
        // Delete Category page
        Route::get('/delete-category/{cat_id}', [CategoryController::class, 'destroy'])->name('admin/delete_category');
        // Product Listing Page 
        Route::get('/products', [ProductController::class, 'index'])->name('admin/products');
        // Product View Page
        Route::get('/product/view/{productId}', [ProductController::class, 'view'])->name('admin/product/view');
        // Edit Product page
        Route::get('/edit-product/{product_id}', [ProductController::class, 'edit'])->name('admin/edit_product');
        // Add Product page
        Route::get('/add-product', [ProductController::class, 'create'])->name('admin/add_product');
        // Edit Product page
        Route::post('/store-product', [ProductController::class, 'store'])->name('admin/store_product');
        // Update Product
        Route::post('/update-product', [ProductController::class, 'update'])->name('admin/update_product');
        // Delete Product
        Route::get('/delete-product/{product_id}', [ProductController::class, 'destroy'])->name('admin/delete_product');
        // Demo Table page
        Route::get('/basic-table', [HomeController::class, 'basicTable']);
        // Blank page
        Route::get('/blank', [HomeController::class, 'blank']);
        // Site Icons page
        Route::get('/fontawesome', [HomeController::class, 'fontawesome']);
        // Demo page
        Route::get('/page', [HomeController::class, 'page']);
        // Maps page
        Route::get('/google-map', [HomeController::class, 'googleMap']);
        // Profile page
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin/profile');
        // Admin Users Listing
        Route::get('/admin-users', [UserController::class, 'adminUsers'])->name('admin/admin_users');
        // Admin Users Listing
        Route::get('/buyer-users', [UserController::class, 'buyerUsers'])->name('admin/buyer_users');
        // Register Admin Page
        Route::get('/register-admin', [UserController::class, 'registerAdmin'])->name('admin/register_admin');
        // Admin Registration Process
        Route::post('/admin-register', [UserController::class, 'adminRegister'])->name('admin/admin_register');
        // Admin Delete
        Route::get('/delete-admin-user/{user_id}', [UserController::class, 'deleteAdminUser'])->name('admin/delete_admin_user');
        // Admin Update Page
        Route::get('/update-admin-user/{user_id}', [UserController::class, 'updateAdminUser'])->name('admin/update_admin_user');
        // Admin Update Process
        Route::post('/user-update', [UserController::class, 'userUpdate'])->name('admin/user_update');

    });

    Auth::routes();

    // Login Admin Page
    Route::get('/login', [LoginController::class, 'index'])->name('login_page');

    // Login Admin Process
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    // Logout Admin
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // SetDefault Language
    Route::get('/set-default-lang', [CommonHelper::class, 'setLocale'])->name('set_default_lang');

    // Logout Admin
    Route::get('/set-lang/{langId}', [CommonHelper::class, 'setLocale'])->name('set_lang');

});