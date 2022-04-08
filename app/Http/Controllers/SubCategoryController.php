<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class SubCategoryController extends Controller {
    //
    function index() {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index', [
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }
    function store(Request $request) {

        if ($request->subcategory_image) {

            $request->validate([
                'category_id' => 'required',
                'subcategory_name' => 'required',
                'subcategory_image' => 'mimes:jpg,bmp,png',
                'subcategory_image' => 'file|max:2024',

            ]);
            // img /insert
            if($request == 'subcategory_name'){
              echo "already acy";
            }else{
                'akno ni';
            }


            $subcatagory_id =  Subcategory::insertGetId([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'created_at' => Carbon::now(),

            ]);
            $subcategory_image = $request->subcategory_image;
            $extention = $subcategory_image->getClientOriginalExtension();
            $file_name = $subcatagory_id . '.' . $extention;
            Image::make($subcategory_image)->save(public_path('uploads/subcategory/' . $file_name));
            Subcategory::find($subcatagory_id)->update([
                'subcategory_image' => $file_name,
            ]);
        } else {

            $request->validate([
                'category_id' => 'required',
                'subcategory_name' => 'required',
                'subcategory_image' => 'mimes:jpg,bmp,png',
                'subcategory_image' => 'file|max:2024',

            ]);
            // img /insert

            $subcatagory_id =     Subcategory::insert([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'created_at' => Carbon::now(),

            ]);
            return back()->with('success', 'Category Added Successfully!');
        }
    }
    function forced_delete($subcatagory_id) {
        Subcategory::onlyTrashed()->find($subcatagory_id)->forceDelete();
            // return back();

    }
}
