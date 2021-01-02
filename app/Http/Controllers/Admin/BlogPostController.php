<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
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
        $posts = $this->Post->model()->orderby("id" , "desc")->paginate(100);
        return view('admin.blog_posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->PostCategory->all();
        return view('admin.blog_posts.create' ,compact( 'categories'));
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
        $data['user_id'] = auth('web')->user()->id;
        $this->Post->create($data);
        return redirect()->route('blog.posts.index')->with('success_msg', 'Blog post created successfully!');
    }


    public function validateData($request , $id = null )
    {

        $title = '|unique:posts,title';
        if(!empty($id)){
            $post = $this->Post->find($id);
            if($request->title == $post->title){
                $title = '';
            }
        }
       
        $data = $request->validate([
            'post_category_id' => 'required|string',
            'title' => 'required|string'.$title,
            'image' => 'nullable|file|mimetypes:image/jpeg,image/png,image/jpg,image/svg',
            'body' => 'required|string',
            'status' => 'required|string',
            'featured' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);
       
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
    public function show($post)
    {
        $post = $this->Post->find($post);
        return view('admin.blog_posts.show', compact('post'));
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
        return view('admin.blog_posts.edit', compact('post' , 'categories'));
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
        // dd($request->all());

        $data = $this->validateData($request , $id);
        try{
            if(!empty($request['image'])){
                deleteFileFromPrivateStorage($post->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old blog post image!');
        }
        $data['slug'] = Str::slug($data['title']);
        $this->Post->update($post->id ,$data);
        return redirect()->route('blog.posts.show',$post)->with('success_msg', 'Blog Post updated successfully!');
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
