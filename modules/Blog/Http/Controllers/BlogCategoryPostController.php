<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogPost;
use Modules\Blog\Entities\BlogCategory;
use Illuminate\Contracts\Support\Renderable;

class BlogCategoryPostController extends Controller
{
    public const NUMBER_OF_TOTAL_BLOGS_IN_BLOGS_INDEX_PAGE = 10;

    public const NUMBER_OF_RECENT_BLOGS_IN_SIDEBAR = 5;


    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $blogCategory = BlogCategory::findOrFail(request()->route('category'));

        $blogPosts = $blogCategory->blogPosts()->published()
            ->paginate(self::NUMBER_OF_TOTAL_BLOGS_IN_BLOGS_INDEX_PAGE);

        $recentBlogPosts = BlogPost::published()
            ->latest()
            ->take(self::NUMBER_OF_RECENT_BLOGS_IN_SIDEBAR)->get();

        $blogCategories = BlogCategory::withCount(['blogPosts'=> fn($query) => $query->published()])->latest()->get();

        $indexTitle = $blogCategory->name;

        return view('storefront::public.blogs.posts.index', compact('indexTitle', 'blogCategory', 'blogPosts', 'recentBlogPosts', 'blogCategories'));
    }
}