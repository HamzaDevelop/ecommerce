<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Http\Controllers\Utilities\CommonHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function __construct(){
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = null)
    {

        $pagination = TRUE;

        $perPage =CommonHelper::PER_PAGE;

        $categories = Category::categoriesWithSubCategoriesArray($page, $perPage, $pagination);

        $total_pages = ceil(Category::where('category_parent', 0)->get()->count() / $perPage);

        $pagination = [
            'page' => $page,
            'previous_page' => $page-1,
            'next_page' => $page+1,
            'total_pages' => $total_pages
        ];

        return view('AdminTemplate.categories.list', compact('categories', 'pagination'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($parentId = null)
    {
        
        $categoriesArr = Category::where('category_parent', 0)->get();

        if($parentId){
            return view('AdminTemplate.categories.add', compact('categoriesArr', 'parentId'));
        }

        return view('AdminTemplate.categories.add', compact('categoriesArr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_parent' => 'required',
            'cat-name' => 'required|unique:categories,category_name',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
           
        $data = $request->all();

        if(isset($data['image'])){
            $imageName = time().'-'.$data['cat-name'].'.'.$request->image->extension();  

            $request->image->move(public_path('categories/images'), $imageName);

            $create = Category::create(
                [
                    'category_name' => $data['cat-name'],
                    'category_parent' => $data['category_parent'],
                    'image' => 'categories/images/'.$imageName
                ]
            );
        } else {
            $create = Category::create(
                [
                    'category_name' => $data['cat-name'],
                    'category_parent' => $data['category_parent']
                ]
            );
        }

        if(!$create){
            session()->flash('error','Unknown error occured While Adding!');
            return redirect()->back()->withInput();  
        } 
        session()->flash('success','New Category has been Added Successfully!');
         
        return redirect("admin/categories");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $categoryData = Category::find($category_id);

        $categoriesArr = Category::where('category_parent', 0)->get();

        return view('AdminTemplate.categories.edit', compact('categoryData', 'categoriesArr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'category_parent' => 'required',
            'cat-name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
           
        $data = $request->all();

        if(isset($data['image'])){
            
            $imageName = time().'-'.$data['cat-name'].'.'.$request->image->extension();  

            $request->image->move(public_path('categories/images'), $imageName);

            $update = Category::where('id', $data['id'])->update([
                'category_name' => $data['cat-name'],
                'category_parent' => $data['category_parent'],
                'image' => 'categories/images/'.$imageName
            ]);
        } else{
            $update = Category::where('id', $data['id'])->update([
                'category_name' => $data['cat-name'],
                'category_parent' => $data['category_parent']
            ]);
        }

        if(!$update){
            session()->flash('error','Unknown error occured While Updating!');
            return redirect()->back()->withInput();
        }
        session()->flash('success','Category has been Updated Successfully!');
        return redirect("admin/categories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        if($category = Category::find($category_id)){
            if($category->delete()){
                session()->flash('success', "Category Deleted Successfully!");
                return redirect('admin/categories');
            } else{
                session()->flash('error', 'Unknown error occured while deleting!');
                return redirect()->back()->withInput();
            }
        } else{
            session()->flash('error', 'Category Not Found!');
            return redirect()->back()->withInput();
        }
    }
}
