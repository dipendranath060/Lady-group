<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::where('is_active','1')->get();
        return view('admin.blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|min:5|max:100',
            'description' => 'required|string|min:10',
            'image' => 'image|mimes:jpeg,png,gif|max:2048',
            'meta_title' => 'required|string|min:6|max:50',
            'meta_description' => 'required|string|min:10|max:100',
            'image_alt' => 'required|string',
            'featured_image' => 'image|mimes:jpeg,png,gif|max:2048',
            'blog_slug' => 'required|string',
        ]);

        try
        {
            DB::beginTransaction();

            //Save for blogs
            $blog = new Blog;
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;
            $blog->image_alt = $request->image_alt;
            $blog->blog_slug = Str::slug($request->blog_slug);
            $blog->category_id = $request->category_id;

            if($request->hasFile('image'))
            { 
                $file = $request->file('image');
                $fileName ='image_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/blogs/', $fileName);
                $blog->image = $fileName;
            }
            if($request->hasFile('featured_image'))
            { 
                $file = $request->file('featured_image');
                $fileName ='featured_image_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/blogs/', $fileName);
                $blog->featured_image = $fileName;
            }

            $category_id = $request->input('category_id');
            if ($category_id == 'new') 
            {
                $category = new Categories;
                $category->name = $request->input('name');
                $category->is_active = 1;
                $category->save();
                $category_id = $category->id;
            }

            $blog->category_id = $category_id;
            $blog->save();

            DB::commit();
            return redirect()->route('blogs')->with('message', 'Blog Added Successfully...');
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);
        if($blog)
        {
            return view('admin.blogs.show', compact('blog'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Categories::where('is_active','1')->get();
        $blog = Blog::find($id);
        if($blog)
        {
            return view('admin.blogs.edit', compact('blog','categories'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|min:5|max:100',
            'description' => 'required|string|min:10',
            'image' => 'image|mimes:jpeg,png,gif|max:2048',
            'meta_title' => 'required|string|min:6|max:50',
            'meta_description' => 'required|string|min:10|max:100',
            'image_alt' => 'required|string',
            'featured_image' => 'image|mimes:jpeg,png,gif|max:2048',
            'blog_slug' => 'required|string',
            // 'category_id' => 'required|array',
        ]);

            //Save for blogs
            $blog = Blog::find($id);
            if($blog)
            {
                $blog->title = $request->title;
                $blog->description = $request->description;
                $blog->meta_title = $request->meta_title;
                $blog->meta_description = $request->meta_description;
                $blog->image_alt = $request->image_alt;
                $blog->blog_slug = Str::slug($request->blog_slug);
                $blog->category_id = $request->category_id;
    
                if($request->hasFile('image'))
                { 
                    $destination = 'uploads/blogs/' . $blog->image;
                    if (File::exists($destination))
                    {
                        File::delete($destination);
                    }
                    $file = $request->file('image');
                    $fileName ='image_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move('uploads/blogs/', $fileName);
                    $blog->image = $fileName;
                }
                if($request->hasFile('featured_image'))
                {
                    $destination = 'uploads/blogs/' . $blog->featured_image;
                    if (File::exists($destination))
                    {
                        File::delete($destination);
                    } 
                    $file = $request->file('featured_image');
                    $fileName ='featured_image_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move('uploads/blogs/', $fileName);
                    $blog->featured_image = $fileName;
                }

                $blog->update();
                return redirect()->route('blogs')->with('message', 'Blog Updated Successfully...');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('blogs')->with('status', 'Blog not found.');
        }

        $destination = 'uploads/blogs/' . $blog->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $destination = 'uploads/blogs/' . $blog->featured_image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $blog->delete();

        return redirect()->route('blogs')->with('status', 'Blog Deleted Successfully...');
    }
}
