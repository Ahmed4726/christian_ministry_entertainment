<?php

namespace App\Http\Controllers;
use App\Models\UserBlog;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function user_blog() {
        return view('userblog');
    }
    function create_blog(Request $request)  {
        $blog = new UserBlog;
        $blog->title=$request->input("title");   
        $blog->blog_content=$request->input("blog_content");
        $blog->user_id=auth()->user()->id;
        $blog->save();
        return redirect()->route('user_blog')->with('success', 'Blog submitted successfully. Waiting for approval.');;
    }
    public function show() {
        $blogs = UserBlog::where('status', 0)->latest()->get();
        return view('layouts.admin.blogs.blogs_request',['blogs'=>$blogs]);
    }
    public function accept($id)
{
    $blog = UserBlog::findOrFail($id);
    $blog->update(['status' => 1]);

    return redirect()->route('blog_requests.show')
        ->with('success', 'Blog accepted and published successfully.');
}
    // public function accept(Request $request,$id)
    // {
    //     $blog = UserBlog::findorfail($id);
    //     $request->update(['status' => 1],['blog'=>$blog]);
    //     return redirect()->route('blog_requests.show')
    //         ->with('success', 'Blog accepted and published successfully.');
    // }
    public function reject($id)
    {
        $blog = UserBlog::findorfail($id);
        $blog->delete();
        return redirect()->route('blog_requests.show')
            ->with('success', 'Blog rejected and deleted.');
    }
    public function published_blogs() {
        $blogs = UserBlog::where('status', 1)->latest()->get();
        return view('newest_blog', compact('blogs'));
    }
}
