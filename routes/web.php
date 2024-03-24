<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CurrentMemberController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MemberAssociationController;
use App\Http\Controllers\Admin\MilestoneController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OurWorksController;
use App\Http\Controllers\Admin\PreMemberController;
use App\Http\Controllers\Admin\SendMailController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    //public routes
    Route::get('/', [FrontendController::class, 'index'])->name('homes');
    Route::get('/about', [FrontendController::class, 'about'])->name('about');
    Route::get('/blogs', [FrontendController::class, 'blog'])->name('blog');
    Route::get('/blogs/{blog_slug}', [FrontendController::class, 'show_blog'])->name('show-blogs');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/current-members', [FrontendController::class, 'current_member'])->name('members');
    Route::get('/events', [FrontendController::class, 'event'])->name('event');
    Route::get('/event/{event_slug}', [FrontendController::class, 'show_event'])->name('show-event');
    Route::get('/gallery', [FrontendController::class, 'gallery'])->name('fgallery');
    Route::get('/gallery/{album_slug}', [FrontendController::class, 'show_album'])->name('show-fgallery');
    Route::get('/previous-members', [FrontendController::class, 'previous_member'])->name('pre-member');
    Route::get('/initiatives', [FrontendController::class, 'work'])->name('initiative');
    Route::get('/initiatives/{wor_slug}', [FrontendController::class, 'show_work'])->name('show-initiative');
    Route::post('/sendMail', [SendMailController::class, 'index'])->name('sendMail');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //All authenticated Routes Here
    Auth::routes();

    Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');


    //Routes for Member Association
    Route::get('/member-associations', [MemberAssociationController::class, 'index'])->name('member-associations');
    Route::get('/add-member-association', [MemberAssociationController::class, 'create'])->name('add-member-association');
    Route::post('/add-member-association', [MemberAssociationController::class, 'store']);
    Route::get('/edit-member-association/{id}', [MemberAssociationController::class, 'edit'])->name('edit-member-association');
    Route::put('/update-member-association/{id}', [MemberAssociationController::class, 'update'])->name('update-member-association');
    Route::delete('/delete-member-association/{id}', [MemberAssociationController::class, 'destroy'])->name('delete-member-association');


    //Routes for Our Works
    Route::get('/our-works', [OurWorksController::class, 'index'])->name('our-works');
    Route::get('/add-our-work', [OurWorksController::class, 'create'])->name('add-our-work');
    Route::post('/add-our-work', [OurWorksController::class, 'store']);
    Route::get('/edit-our-work/{id}', [OurWorksController::class, 'edit'])->name('edit-our-work');
    Route::put('/update-our-work/{id}', [OurWorksController::class, 'update'])->name('update-our-work');
    Route::delete('/delete-our-work/{id}', [OurWorksController::class, 'destroy'])->name('delete-our-work');


    //Routes for Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/add-gallery', [GalleryController::class, 'create'])->name('add-gallery');
    Route::post('/add-gallery', [GalleryController::class, 'store']);
    Route::get('/edit-gallery/{id}', [GalleryController::class, 'edit'])->name('edit-gallery');
    Route::put('/update-gallery/{id}', [GalleryController::class, 'update'])->name('update-gallery');
    Route::delete('/delete-gallery/{id}', [GalleryController::class, 'destroy'])->name('delete-gallery');


    //Routes for Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('add-category');
    Route::post('/add-category', [CategoryController::class, 'store']);
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('update-category');
    Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete-category');


    //Routes for Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/add-gallery', [GalleryController::class, 'create'])->name('add-gallery');
    Route::post('/add-gallery', [GalleryController::class, 'store']);
    Route::get('/edit-gallery/{id}', [GalleryController::class, 'edit'])->name('edit-gallery');
    Route::put('/update-gallery/{id}', [GalleryController::class, 'update'])->name('update-gallery');
    Route::delete('/delete-gallery/{id}', [GalleryController::class, 'destroy'])->name('delete-gallery');


    //Routes for Blogs
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/add-blog', [BlogController::class, 'create'])->name('add-blog');
    Route::post('/add-blog', [BlogController::class, 'store']);
    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('edit-blog');
    Route::put('/update-blog/{id}', [BlogController::class, 'update'])->name('update-blog');
    Route::get('/show-blog/{id}', [BlogController::class, 'show'])->name('show-blog');
    Route::delete('/delete-blog/{id}', [BlogController::class, 'destroy'])->name('delete-blog');


    //Routes for Events
    Route::get('/events', [EventController::class, 'index'])->name('events');
    Route::get('/add-event', [EventController::class, 'create'])->name('add-event');
    Route::post('/add-event', [EventController::class, 'store']);
    Route::get('/edit-event/{id}', [EventController::class, 'edit'])->name('edit-event');
    Route::put('/update-event/{id}', [EventController::class, 'update'])->name('update-event');
    Route::delete('/delete-event/{id}', [EventController::class, 'destroy'])->name('delete-event');


    //Routes for Milestones
    Route::get('/milestones', [MilestoneController::class, 'index'])->name('milestones');
    Route::get('/add-milestone', [MilestoneController::class, 'create'])->name('add-milestone');
    Route::post('/add-milestone', [MilestoneController::class, 'store']);
    Route::get('/edit-milestone/{id}', [MilestoneController::class, 'edit'])->name('edit-milestone');
    Route::put('/update-milestone/{id}', [MilestoneController::class, 'update'])->name('update-milestone');
    Route::delete('/delete-milestone/{id}', [MilestoneController::class, 'destroy'])->name('delete-milestone');

    //Routes for Previous Members
    Route::get('/pre-members', [PreMemberController::class, 'index'])->name('pre-members');
    Route::get('/add-pre-member', [PreMemberController::class, 'create'])->name('add-pre-member');
    Route::post('/add-pre-member', [PreMemberController::class, 'store']);
    Route::get('/edit-pre-member/{id}', [PreMemberController::class, 'edit'])->name('edit-pre-member');
    Route::put('/update-pre-member/{id}', [PreMemberController::class, 'update'])->name('update-pre-member');
    Route::delete('/delete-pre-member/{id}', [PreMemberController::class, 'destroy'])->name('delete-pre-member');


    //Routes for Current Members
    Route::get('/current-members', [CurrentMemberController::class, 'index'])->name('current-members');
    Route::get('/add-current-member', [CurrentMemberController::class, 'create'])->name('add-current-member');
    Route::post('/add-current-member', [CurrentMemberController::class, 'store']);
    Route::get('/edit-current-member/{id}', [CurrentMemberController::class, 'edit'])->name('edit-current-member');
    Route::put('/update-current-member/{id}', [CurrentMemberController::class, 'update'])->name('update-current-member');
    Route::delete('/delete-current-member/{id}', [CurrentMemberController::class, 'destroy'])->name('delete-current-member');


    //Routes for Banners
    Route::get('/banners', [BannerController::class, 'index'])->name('banners');
    Route::get('/add-banner', [BannerController::class, 'create'])->name('add-banner');
    Route::post('/add-banner', [BannerController::class, 'store']);
    Route::get('/edit-banner/{id}', [BannerController::class, 'edit'])->name('edit-banner');
    Route::put('/update-banner/{id}', [BannerController::class, 'update'])->name('update-banner');
    Route::delete('/delete-banner/{id}', [BannerController::class, 'destroy'])->name('delete-banner');


    //Routes for Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::get('/add-notification', [NotificationController::class, 'create'])->name('add-notification');
    Route::post('/add-notification', [NotificationController::class, 'store']);
    Route::get('/edit-notification/{id}', [NotificationController::class, 'edit'])->name('edit-notification');
    Route::put('/update-notification/{id}', [NotificationController::class, 'update'])->name('update-notification');
    Route::delete('/delete-notification/{id}', [NotificationController::class, 'destroy'])->name('delete-notification');


    //Routes for User
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/add-user', [UserController::class, 'create'])->name('add-user');
    Route::post('/add-user', [UserController::class, 'store']);
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::put('/update-user/{id}', [UserController::class, 'update'])->name('update-user');
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');


});
