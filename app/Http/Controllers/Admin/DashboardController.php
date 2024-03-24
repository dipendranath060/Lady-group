<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Event;
use App\Models\OurWorks;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::count();
        $blogs = Blog::count();
        $category = Categories::count();
        $works = OurWorks::count();
        $currentDateTime = Carbon::now();
        $upcomingEvents = Event::where('start_date', '>', $currentDateTime)->orderBy('start_date')->get();
        return view('admin.dashboard', compact('events', 'upcomingEvents', 'blogs', 'category', 'works'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
