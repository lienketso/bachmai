<?php

namespace Frontend\Http\Controllers;

use Barryvdh\Debugbar\Controllers\BaseController;
use Category\Models\Category;
use Illuminate\Http\Request;
use Post\Models\Post;

class SitemapController extends BaseController
{
        public function index(){
            $url = route('frontend::home');
            $category = Category::all()->first();
            $post = Post::all()->first();
            return response()->view('sitemap.index',[
                'category'=>$category,
                'post'=>$post,
                'url'=>$url
            ])->header('Content-Type', 'text/xml');
        }
        public function category(){
            $url = route('frontend::home');
            $category = Category::where('type','post')->orWhere('type','hospital')->get();
            return response()->view('sitemap.category',['category'=>$category,'url'=>$url])
                ->header('Content-Type', 'text/xml');
        }
        public function post(){
            $url = route('frontend::home');
            $page = Post::where('post_type','page')->get();
            $post = Post::orderBy('created_at','desc')->where('post_type','blog')->orWhere('post_type','hospital')->get();
            return response()->view('sitemap.post',['post'=>$post,'page'=>$page,'url'=>$url])
                ->header('Content-Type', 'text/xml');
        }
        public function diseases(){
            $url = route('frontend::home');
            $catdi = Category::where('type','health')->get();
            $diseases = Post::where('post_type','health')->get();
            return response()->view('sitemap.diseases',['catdi'=>$catdi,'diseases'=>$diseases,'url'=>$url])
                ->header('Content-Type', 'text/xml');
        }
        public function doctor(){
            $url = route('frontend::home');
            $doctor = Post::where('post_type','doc')->get();
            return response()->view('sitemap.doctor',['doctor'=>$doctor,'url'=>$url])
                ->header('Content-Type', 'text/xml');
        }
        public function video(){
            $url = route('frontend::home');
            $video = Post::where('post_type','video')->get();
            return response()->view('sitemap.video',['video'=>$video,'url'=>$url])
                ->header('Content-Type', 'text/xml');
        }

}
