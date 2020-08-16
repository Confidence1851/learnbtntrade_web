<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->CourseCategory->all();
        return view('admin.course_categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course_categories.create');
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
        $this->CourseCategory->create($data);
        return redirect()->route('course.categories.index')->with('success_msg', 'Course category created successfully!');
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
            $category = $this->CourseCategory->find($id);
            if(strtolower($category->title) == strtolower($data['title']) ){
                //
            }
            else{
                $count = $this->CourseCategory->model()->where('title' , $data['title'])->first();
            }
        }
        else{
            $count = $this->CourseCategory->model()->where('title' , $data['title'])->first();
        }
        if($count > 0){
            return redirect()->back()->with('error_msg', 'Course Category title already exists!');
        }

        if(!empty( $image = $request->file('image'))){
            $data['file'] = putFileInStorage($image , $this->courseCategoryImagePath);
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
        $category = $this->CourseCategory->find($id);
        return view('admin.course_categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->CourseCategory->find($id);
        return view('admin.course_categories.edit', compact('category'));
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
        $category = $this->CourseCategory->find($id);

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
        $this->CourseCategory->update($category->id ,$data);
        return redirect()->route('course.categories.index')->with('success_msg', 'Course Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->CourseCategory->find($id);
        if($category->Courses->count() > 0){
            return redirect()->back()->with('error_msg', 'Cant delete category because it has some Courses. Delete Courses first!');
        }
        try{
            if(!empty($category->image)){
               deleteFileFromStorage($category->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old category image!');
        }
        $this->CourseCategory->delete($category->id);
        return redirect()->back()->with('success_msg', 'Course Category deleted successfully!');
    }
}
