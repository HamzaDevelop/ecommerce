<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'category_name',
        'category_parent',
        'image'
    ];

    /** 
     * Function to display categories with thier sub categories with or without pagination
     */
    public static function categoriesWithSubCategoriesArray($page = null, $perPage = null, $allowPagination = null){
        
        if($allowPagination){
            
            if(!$page){
                $page = 1;
            }

            $offset = ($page - 1) * $perPage;

            $parents = Self::where('category_parent', 0)->offset($offset)->limit($perPage)->get()->toArray();

            $children = Self::where('category_parent', '!=', 0)->get()->toArray();

            foreach($parents as $parent){
                foreach($children as $child){
                    if($parent['id'] == $child['category_parent']){
                        $parent['subcategories'][] = $child;
                    }
                }
                $categories[] = $parent; 
            }
        } else {

            $parents = Self::where('category_parent', 0)->get()->toArray();

            $children = Self::where('category_parent', '!=', 0)->get()->toArray();

            foreach($parents as $parent){
                foreach($children as $child){
                    if($parent['id'] == $child['category_parent']){
                        $parent['subcategories'][] = $child;
                    }
                }
                $categories[] = $parent; 
            }
        }

        return $categories;
    }
}
