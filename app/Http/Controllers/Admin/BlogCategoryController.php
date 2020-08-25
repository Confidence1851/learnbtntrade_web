<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->PostCategory->all();
        return view('admin.blog_categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = Str::slug($data['title']);
        $this->PostCategory->create($data);
        return redirect()->route('blog.categories.index')->with('success_msg', 'Blog category created successfully!');
    }


    public function validateData($request , $id = null)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/svg',
            'status' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        $count = 0 ;
        if(!empty($id)){
            $category = $this->PostCategory->find($id);
            if(strtolower($category->title) == strtolower($data['title']) ){
                //
            }
            else{
                $count = $this->PostCategory->model()->where('title' , $data['title'])->count();
            }
        }
        else{
            $count = $this->PostCategory->model()->where('title' , $data['title'])->count();
        }
        if($count > 0){
            return redirect()->back()->with('error_msg', 'Blog Category title already exists!');
        }

        if(!empty( $image = $request->file('image'))){
            $data['file'] = putFileInStorage($image , $this->blogCategoryImagePath);
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->PostCategory->find($id);
        return view('admin.blog_categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->PostCategory->find($id);
        return view('admin.blog_categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->PostCategory->find($id);

        $data = $this->validateData($request , $id);
        try{
            if(!empty($request['file'])){
                deleteFileFromStorage($category->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old category image!');
        }
        $data['slug'] = Str::slug($data['title']);
        $this->PostCategory->update($category->id ,$data);
        return redirect()->route('blog.categories.index')->with('success_msg', 'Blog Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->PostCategory->find($id);
        if($category->posts->count() > 0){
            return redirect()->back()->with('error_msg', 'Cant delete category because it has some posts. Delete posts first!');
        }
        try{
            if(!empty($category->image)){
               deleteFileFromStorage($category->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old category image!');
        }
        $this->PostCategory->delete($category->id);
        return redirect()->back()->with('success_msg', 'Post Category deleted successfully!');
    }
}
