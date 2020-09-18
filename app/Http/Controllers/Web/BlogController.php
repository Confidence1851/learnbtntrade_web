<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function blog_posts(Request $request){
        $search_keywords = $request->keywords;
        $category_id = $request->category_id;
        $categories = $this->PostCategory->model()->where('status' , $this->activeStatus)->get();
        $builder = $this->Post->model()->where('status' , $this->activeStatus)->orderBy('created_at' , 'desc');
        if(empty($category_id)){
            $posts = $builder->where('title', 'like' , '%'.$search_keywords.'%')->paginate(20);
        }
        else{
            $posts = $builder->where('title', 'like' , '%'.$search_keywords.'%')
            ->where('post_category_id' , $category_id )->paginate(20);
            $category_id = $this->PostCategory->find($category_id);
        }
        $featured_posts = $this->Post->model()->where('status' , $this->activeStatus)->where('featured' , $this->activeStatus)->limit(5)->inRandomOrder()->get();
        return view('web.blog' , compact('posts' , 'featured_posts' , 'categories' , 'search_keywords' , 'category_id'));
    }

    public function blog_post_info($id , $slug){
        $categories = $this->PostCategory->model()->where('status' , $this->activeStatus)->get();
        $post = $this->Post->find($id);
        $related_posts = $this->Post->model()->where('status' , $this->activeStatus)->where('post_category_id' , $post->category->id )->limit(5)->inRandomOrder()->get();
        return view('web.blog_info' , compact('post' , 'categories' , 'related_posts'));
    }

    public function blog_category_posts(Request $request , $id){
        $category = $this->PostCategory->find($id);
        if(!empty($category)){
            $request['category_id'] = $id;
            return $this->blog_posts($request);
        }
    }

    public function blog_comment(Request $request){
        $data = $request->validate([
            'post_id' => 'required|string',
            'body' => 'required|string',
        ]);
        if(empty($data['body']) || empty($data['post_id'])){
            return response()->json([
                'success'=> false ,
                'msg' => 'Comment cound not be added!',
                'data' => null,
            ]);
        }
        else{
           $data['user_id'] = auth('web')->user()->id;
           $comment = $this->PostComment->create($data);
           return response()->json([
               'success'=> true ,
               'msg' => 'Comment added successfully!',
               'data' => [
                   'avatar' => $comment->author->getAvatar() ,
                   'name' => $comment->author->fullName(),
                   'date' => date('d M Y h:i:A',strtotime($comment->created_at)),
                   'comment' => $comment->body,
                ],
           ]);
        }
    }

}
