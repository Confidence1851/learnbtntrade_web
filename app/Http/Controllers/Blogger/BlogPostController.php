<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->Post->model()->where('user_id' , auth('web')->id())->orderby('created_at' , 'desc')->paginate(100);
        return view('blogger.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->PostCategory->model()->where('status' , $this->activeStatus)->get();
        return view('blogger.posts.create' ,compact( 'categories'));
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
        $data['user_id'] = auth('web')->id();
        $data['status'] = $this->activeStatus;
        // $data['featured'] = $this->activeStatus;
        $this->Post->create($data);
        return redirect()->route('blogger.posts.index')->with('success_msg', 'Blog post created successfully!');
    }


    public function validateData($request , $id = null )
    {
        // dd($request->all());
        $data = $request->validate([
            'post_category_id' => 'required|string',
            'title' => 'required|string',
            'image' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/svg',
            'body' => 'required|string',
            // 'status' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);
        $count = 0 ;
        if(!empty($id)){
            $post = $this->Post->find($id);
            if(strtolower($post->title) == strtolower($data['title']) ){
                //
            }
            else{
                $count = $this->Post->model()->where('title' , $data['title'])->count();
            }
        }
        else{
            $count = $this->Post->model()->where('title' , $data['title'])->count();
        }
        if($count > 0){
            return redirect()->back()->with('error_msg', 'Blog title already exists!');
        }

        if(!empty( $image = $request->file('image'))){
            $data['image'] = resizeImageandSave($image , $this->blogPostsImagePath , 'local' , 640 , 360);
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
        $post = $this->Post->find($id);
        return view('blogger.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->PostCategory->all();
        $post = $this->Post->find($id);
        return view('blogger.posts.edit', compact('post' , 'categories'));
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
        $post = $this->Post->find($id);

        $data = $this->validateData($request , $id);
        try{
            if(!empty($request['image'])){
                deleteFileFromStorage($post->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old blog post image!');
        }
        $data['slug'] = Str::slug($data['title']);
        $this->Post->update($post->id ,$data);
        return redirect()->route('blogger.posts.show',$post)->with('success_msg', 'Blog Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->Post->find($id);
        try{
            if(!empty($post->image)){
                deleteFileFromStorage($post->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old blog post image!');
        }
        $this->Post->delete($post->id);
        return redirect()->back()->with('success_msg', 'Blog Post deleted successfully!');
    }
}
