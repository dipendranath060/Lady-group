<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurrentMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CurrentMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentMembers = CurrentMembers::paginate(10);
        return view('admin.current_members.index', compact('currentMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.current_members.create');
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
        ]);

        $currentMember = new CurrentMembers;
        $currentMember->name = $request->name;
        $currentMember->designation = $request->designation;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = time(). '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/current-Members/'), $fileName);
            $currentMember->image = $fileName;
        }

        $currentMember->save();
        return redirect()->route('current-members')
                    ->with('message', 'Current-Member Added Successfully...');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $currentMember = CurrentMembers::find($id);
        if($currentMember)
        {
            return view('admin.current_members.edit', compact('currentMember'));
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
        ]);

        $currentMember = CurrentMembers::find($id);
        if($currentMember)
        {
            $currentMember->name = $request->name;
            $currentMember->designation = $request->designation;
    
            if($request->hasFile('image'))
            {
                $destination = 'uploads/current-members/' .$currentMember->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $fileName = time(). '.' .$file->getClientOriginalExtension();
                $file->move(public_path('uploads/current-Members/'), $fileName);
                $currentMember->image = $fileName;
            }
    
            $currentMember->update();
            return redirect()->route('current-members')
                        ->with('message', 'Current-Member Updated Successfully...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $currentMember = CurrentMembers::find($id);

        if (!$currentMember) {
            return redirect()->route('current-members')->with('status', 'Current Member not found.');
        }

        $destination = 'uploads/current-members/' . $currentMember->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $currentMember->delete();

        return redirect()->route('current-members')->with('status', 'Current Member Deleted Successfully...');
    }
}
