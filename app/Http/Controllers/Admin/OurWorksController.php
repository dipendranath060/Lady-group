<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurWorks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OurWorksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $initiatives = OurWorks::paginate(10);
        return view('admin.our_works.index', compact('initiatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.our_works.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4|max:100',
            'description' => 'required|min:10',
            'image' => 'image|mimes:jpeg,png,gif|max:2048',
            'work_slug' => 'required|string',
            'meta_description' => 'required|string|min:10|max:100',
        ]);

        $initiative = new OurWorks;
        $initiative->title = $request->title;
        $initiative->description = $request->description;
        $initiative->meta_description = $request->meta_description;
        $initiative->work_slug = Str::slug($request->work_slug);

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = time(). '.' .$file->getClientOriginalExtension();
            $file -> move(public_path('uploads/initiatives/'), $fileName);
            $initiative->image = $fileName;
        }

        $initiative->save();
        return redirect()->route('our-works')
                    ->with('message', 'Work Added Successfully...');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $initiative = OurWorks::find($id);
        if($initiative)
        {
            return view('admin.our_works.edit', compact('initiative'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|min:4|max:100',
            'description' => 'required|min:10',
            'image' => 'image|mimes:jpeg,png,gif|max:2048',
            'work_slug' => 'required|string',
            'meta_description' => 'required|string|min:10|max:100',
        ]);

        $initiative = OurWorks::find($id);
        if($initiative)
        {
            $initiative->title = $request->title;
            $initiative->description = $request->description;
            $initiative->meta_description = $request->meta_description;
            $initiative->work_slug = Str::slug($request->work_slug);
    
            if ($request->hasFile('image'))
            {
                $destination = 'uploads/initiatives/' .$initiative->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $fileName = time(). '.' .$file->getClientOriginalExtension();
                $file -> move(public_path('uploads/initiatives/'), $fileName);
                $initiative->image = $fileName;
            }
    
            $initiative->update();
            return redirect()->route('our-works')
                        ->with('message', 'Work Updated Successfully...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $initiative = OurWorks::find($id);
        if(!$initiative)
        {
            return redirect()->route('our-works')->with('status', 'Initiative not found.');
        }
        $destination = 'uploads/initiatives/' . $initiative->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $initiative->delete();

        return redirect()->route('our-works')->with('status', 'Initiative Deleted Successfully...');
    }
}
