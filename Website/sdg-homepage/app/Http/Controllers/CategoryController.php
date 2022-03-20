<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function AddCategory(){

        return view('backend.category.add_category');
    }

    function PostCategory(Request $request){
        $request->validate([
            'image' => ['image']
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file)->save(public_path('thumbnails/' . $ext));

            Category::insert([
                'title' => $request->title,
                'slug' => $request->slug,
                'goal_no' => $request->goal_no,
                'image' => $ext,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Goal Inserted Successfully.');
        }
    }

    function ViewCategory(){
        $category = Category::orderBy('id', 'asc')->simplePaginate(10);
        return view('backend.category.view_category', compact('category'));
    }

    function EditCategory($slug){
        $category = Category::where('slug', $slug)->first();
        return view('backend.category.edit_category', compact('category'));
    }

    function UpdateCategory(Request $request){
        $id = $request->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $old_image = Category::findOrFail($id)->image;

            $ext = Str::lower(Str::random(7)) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('thumbnails/' . $ext));

            Category::where('id', $id)->update([
                'image' => $ext,
                'title' => $request->title,
                'slug' => $request->slug,
                'goal_no' => $request->goal_no,
                'updated_at' => Carbon::now()
            ]);
        } else {
            Category::where('id', $id)->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'goal_no' => $request->goal_no,
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->route('ViewCategory')->with('success', 'Category Updated Successfully.');
    }

    function DeleteCategory($slug){
        Category::where('slug', $slug)->delete();
        return back()->with('success', 'Category Deleted Successfully.');
    }
}
