<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

class MarketingController extends Controller
{

    public function seo()
    {
        $routes = collect(\Illuminate\Support\Facades\Route::getRoutes())->map(function ($route) {
            if (!Str::contains($route->uri(), '_')) {
                return $route->uri();
            }
        });


        return view('admin.marketing.seo', [
            'routes' => $routes
        ]);
    }

    public function postseo(Request $request){
        Seo::query()->create([
            'route' => $request->route,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,

        ]);
    }
}
