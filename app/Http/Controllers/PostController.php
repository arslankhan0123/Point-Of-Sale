<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function Posts()
    {
        $AllCategory = Category::all();
        $allpost = Post::all();
        return view('admin.posts', compact('AllCategory', 'allpost'));
    }


    public function addPost()
    {
        $todayDate = Carbon::now();
        // dd($todayDate);
        $AllCategory = Category::all();
        $LoggedInUser = Auth::user()->id;
        return view('admin.addpost', compact('AllCategory', 'LoggedInUser', 'todayDate'));
    }

    public function insertpost(Request $request)
    {
        // dd('hello post');
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'title' => 'required',
                'description' => 'required',
                'feature_image' => 'required',
                'postTags' => 'required',
                'seoTitle' => 'required',
                'seoDescription' => 'required',
                'seoTags' => 'required',
                'excerpt' => 'required',
            ];

            $CustomMessage = [
                'title.required' => 'Title is required',
                'description.required' => 'Description is required',
                'feature_image.required' => 'featureImage is required',
                'postTags.required' => 'postTags is required',
                'seoTitle.required' => 'seoTitle is required',
                'seoDescription.required' => 'seoDescription is required',
                'seoTags.required' => 'seoTags is required',
                'excerpt.required' => 'excerpt is required',
            ];
            $this->validate($request, $rules, $CustomMessage);


            $post = new Post;
            if($request->hasFile('feature_image'));
            {
                $image = $request->file('feature_image');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $request->feature_image->move('assets/uploads/postimages', $imagename);
                $post->feature_image = $imagename;
            }
            $post->title = $request->title;
            $post->description = $request->description;
            $post->tags = $request->postTags;
            $post->seo_title = $request->seoTitle;
            $post->seo_description = $request->seoDescription;
            $post->seo_tags = $request->seoTags;
            $post->excerpt = $request->excerpt;
            $post->category_id = $request->categories;
            $post->user_id = $request->user_id;
            $post->date_of_post = $request->date_of_post;
            $post->date_of_last_edit = $request->date_of_last_edit;
            $post->status = $request->status;
            $post->save();
            return redirect()->back()->with('success',"Post Added Successfully");
        }
        return view('admin.addCategory');
    }


    public function editpost($id)
    {
        $AllCategory = Category::all();
        $Post = Post::findOrFail($id);
        return view('admin.editPost', compact('Post', 'AllCategory'));
    }


    public function updatepost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if($request->hasFile('feature_image'));
        {
            $image = $request->file('feature_image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->feature_image->move('assets/uploads/postimages', $imagename);
            $post->feature_image = $imagename;
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->tags = $request->postTags;
        $post->seo_title = $request->seo_title;
        $post->seo_description = $request->seo_description;
        $post->seo_tags = $request->seo_tags;
        $post->excerpt = $request->excerpt;
        $post->category_id = $request->categories;
        $post->status = $request->status;
        $post->save();
        return redirect()->back()->with('success',"Post updated Successfully");
    }


    public function deletepost($id)
    {
        $Post = Post::find($id);
        $Post->delete();
        return redirect()->back()->with('deleted',"Post deleted Successfully");
    }
}
