<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\CurrentMembers;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\MemberAssociation;
use App\Models\Milestone;
use App\Models\Notification;
use App\Models\OurWorks;
use App\Models\PreMembers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        $notifications = Notification::orderBy('created_at', 'DESC')->get();
        $initiatives = OurWorks::orderBy('created_at', 'DESC')->get();
        $associations = MemberAssociation::all();
        $milestones = Milestone::all();
        $banners = Banner::orderBy('created_at', 'DESC')->get();
        $currentDateTime = Carbon::now();
        $upcomingEvents = Event::where('start_date', '>', $currentDateTime)->orderBy('start_date', 'desc')->get();
        return view('frontend.index', compact('milestones', 'associations', 'blogs', 'initiatives', 'upcomingEvents', 'banners', 'notifications'));
    }

    public function about()
    {
        $currentMembers = CurrentMembers::all();
        return view('frontend.about', compact('currentMembers'));
    }

    public function blog()
    {
        $blogs = blog::paginate(6);
        return view('frontend.blog', compact('blogs'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function current_member()
    {
        $currentMembers = CurrentMembers::all();
        return view('frontend.currentMember', compact('currentMembers'));
    }

    public function event()
    {
        $currentDateTime = Carbon::now();
        $upcomingEvents = Event::where('start_date', '>', $currentDateTime)->orderBy('start_date', 'DESC')->paginate(5);
        $previousEvents = Event::where('expiry_date', '<', Carbon::now())->orderBy('expiry_date', 'desc')->paginate(10);
        return view('frontend.event',compact('upcomingEvents', 'previousEvents'));
    }

    public function gallery()
    {
        $albums = Gallery::paginate(8);
        return view('frontend.gallery', compact('albums'));
    }

    public function previous_member()
    {
        $previousMembers = PreMembers::all();
        return view('frontend.previousMember', compact('previousMembers'));
    }

    public function work()
    {
        $works = OurWorks::all();
        return view('frontend.work', compact('works'));
    }

    public function show_blog(string $blog_slug)
    {
        $blog = Blog::where('blog_slug', $blog_slug)->first();
        $recentBlogs = Blog::orderBy('updated_at', 'DESC')->get();
        return view('frontend.show-blog', compact('blog', 'recentBlogs'));
    }


    public function show_album(string $album_slug)
    {
        
        $album = Gallery::where('album_slug', $album_slug)->first();
        $images =[];

        if ($album) {
            $images = json_decode($album->images);
        }
        return view('frontend.show-album', compact('album', 'images'));
    }

    public function show_work(string $work_slug)
    {
        $work = OurWorks::where('work_slug', $work_slug)->first();
        $recentInitiatives = OurWorks::orderBy('updated_at', 'DESC')->get();
        return view('frontend.show-works', compact('work', 'recentInitiatives'));
    }


    public function show_event(string $event_slug)
    {
        $event = Event::where('event_slug', $event_slug)->first();
        $currentDateTime = Carbon::now();
        $upcomingEvents = Event::where('start_date', '>', $currentDateTime)->orderBy('start_date', 'desc')->get();
        return view('frontend.show-event', compact('event', 'upcomingEvents'));
    }

}
