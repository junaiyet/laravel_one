<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;
use Image;

class CategoryController extends Controller {
    //
    function index() {
        $categories = Category::all();
        $trust_category = Category::onlyTrashed()->get();
        // $total = Category::count();

        return view('admin.category.index', [
            'categories' => $categories,
            'trust_category' => $trust_category,
            // 'total' => $total,
        ]);
    }

    function store(Request $request) {

        if ($request->category_image) {

            $request->validate([
                'category_name' => 'required|unique:categories',
                'category_image' => 'mimes:jpg,bmp,png',
                'category_image' => 'file|max:2024',

            ], [
                'category_name.required' => "Please Add Catagories?",
                'category_name.unique' => "Already Added Catagories",
            ]);
            // img /insert
            $catagory_id = Category::insertGetId([
                'category_name' => $request->category_name,
                'added_by' => Auth::id(),
                'created_at' => Carbon::now(),
            ]);

            // image
            $catagory_image = $request->category_image;
            $extention = $catagory_image->getClientOriginalExtension();
            $file_name =  $catagory_id . '.' . $extention;
            Image::make($catagory_image)->save(public_path('uploads/category/' . $file_name));
            Category::find($catagory_id)->update([
                'category_image' => $file_name,
            ]);
            // image
        } else {
            $request->validate([
                'category_name' => 'required|unique:categories',
            ], [
                'category_name.required' => "Please Add Catagories?",
                'category_name.unique' => "Already Added Catagories",
            ]);
            // img /insert
            $catagory_id = Category::insertGetId([
                'category_name' => $request->category_name,
                'added_by' => Auth::id(),
                'created_at' => Carbon::now(),
            ]);
        }


        return back()->with('success', 'Category Added Successfully!');

    }

    function edit($catagory_id) {

        $category_info = Category::find($catagory_id);

        return view('admin.category.edit', [
            'category_info' => $category_info,
        ]);
    }
    function update(Request $request) {

        if ( $request->category_image == '') {

        Category::find($request->category_id)->update([
            'category_name' => $request->category_name,
            'added_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/category')->with('success', 'Category Updated Successfully!');
        }else{
           $iamge =Category::find($request->category_id);
           if($iamge->category_image == 'default.png'){
                 $category_img = $request->category_image;
                 $extention = $category_img->getClientOriginalExtension();
                 $file_name = $request->category_id.'.'.$extention;
                 Image::make( $category_img)->save(public_path('/uploads/category/'.$file_name));
                 Category::find($request->category_id)->update([
                    'category_image'=>$file_name,
                 ]);
                 return redirect('/category')->with('success', 'Category Updated Successfully!');

           }else{
               $delete_form = public_path('/uploads/category/'.$iamge->category_image);
               unlink($delete_form);
               $category_img = $request->category_image;
               $extention = $category_img->getClientOriginalExtension();
               $file_name = $request->category_id.'.'.$extention;
               Image::make( $category_img)->save(public_path('/uploads/category/'.$file_name));
               Category::find($request->category_id)->update([
                  'category_image'=>$file_name,
               ]);
               return redirect('/category')->with('success', 'Category Updated Successfully!');

           }

        }
// die();

//         Category::find($request->category_id)->update([
//             'category_name' => $request->category_name,
//             'added_by' => Auth::id(),
//             'updated_at' => Carbon::now(),
//         ]);
//         return redirect('/category')->with('success', 'Category Updated Successfully!');
    }
    function delete($category_id) {
        Category::find($category_id)->delete();
        return back();
    }
    function restore($category_id) {
        Category::onlyTrashed()->find($category_id)->restore();
        return back();
    }
    function forced_delete($category_id) {
        $image =Category::onlyTrashed()->find($category_id);
           if($image->category_image == 'default.png'){
            Category::onlyTrashed()->find($category_id)->forceDelete();
            return back();
           }else{
            $delete_form = public_path('/uploads/category/'.$image->category_image);
            unlink($delete_form);
            Category::onlyTrashed()->find($category_id)->forceDelete();
            return back();
           }

    }
    function mark_delete(Request $request) {
        $request->validate(
            [
                'mark' => 'required',
            ],
            [
                'mark.required' => "Pleace Check At Least 1 Category",
            ]
        );
        foreach ($request->mark as $mark) {
            Category::find($mark)->delete();
        }
        return back();
    }
}
