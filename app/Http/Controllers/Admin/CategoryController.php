<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\category;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category = category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $category = new category;
        $category->name = $data['name'];
        $category->slug = $data['slug'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/category', $image_name);
            $category->image = $image_name;
        }
        
        $category->description = $data['description'];
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->navbar_status = $request->navbar_status ==true ? 1 : 0;
        $category->status = $request->status ==true ? 1 : 0;
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/category')->with('success', 'Category added successfully');

    }

    public function edit($id)
    {
        $category = category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $id)
    {
        $data = $request->validated();

        $category = category::find($id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];

        if ($request->hasFile('image')) {

            $destination = 'uploads/category/'.$category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/category', $image_name);
            $category->image = $image_name;
        }
        
        $category->description = $data['description'];
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->navbar_status = $request->navbar_status ==true ? 1 : 0;
        $category->status = $request->status ==true ? 1 : 0;
        $category->created_by = Auth::user()->id;
        $category->update();

        return redirect('admin/category')->with('success', 'Category updated successfully');
    }   

    public function destroy($id)
    {
        $category = category::find($id);
        if($category){
            $destination = 'uploads/category/'.$category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $category->post()->delete();
            $category->delete();
            
            return redirect('admin/category')->with('success', 'Category deleted with its successfully');
        }
        else{
            return redirect('admin/category')->with('error', 'Category not found');
        }
    }

}
