<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PreMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prevMembers = PreMembers::paginate(10);
        return view('admin.pre_members.index', compact('prevMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pre_members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'designation' => 'required|string|max:20',
            'image' => 'image|mimes:jpeg,png,gif|max:2048',
            'tenure' => 'required|string|max:50'
        ]);

        $prevMember = new PreMembers;
        $prevMember->name = $request->name;
        $prevMember->designation = $request->designation;
        $prevMember->tenure = $request->tenure;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = time(). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/previous-Members/'), $fileName);
            $prevMember->image = $fileName;
        }

        $prevMember->save();
        return redirect()->route('pre-members')
                    ->with('message', 'Previous-Member Added Successfully...');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prevMember = PreMembers::find($id);
        if($prevMember)
        {
            return view('admin.pre_members.edit', compact('prevMember'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'designation' => 'required|string|max:20',
            'image' => 'image|mimes:jpeg,png,gif|max:2048',
            'tenure' => 'required|string'
        ]);

        $prevMember = PreMembers::find($id);
        if($prevMember)
        {
            $prevMember->name = $request->name;
            $prevMember->designation = $request->designation;
            $prevMember->tenure = $request->tenure;
    
            if($request->hasFile('image'))
            {
                $destination = 'uploads/previous-members/' .$prevMember->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $fileName = time(). '.' .$file->getClientOriginalExtension();
                $file->move(public_path('uploads/previous-Members/'), $fileName);
                $prevMember->image = $fileName;
            }
    
            $prevMember->update();
            return redirect()->route('pre-members')
                        ->with('message', 'Previous-Member Updated Successfully...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prevMember = PreMembers::find($id);

        if (!$prevMember) {
            return redirect()->route('pre-members')->with('status', 'Previous Member not found.');
        }

        $destination = 'uploads/previous-members/' . $prevMember->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $prevMember->delete();

        return redirect()->route('pre-members')->with('status', 'Previous Member Deleted Successfully...');
    }
}
