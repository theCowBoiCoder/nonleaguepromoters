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
        $seos = Seo::all();
        return view('admin.marketing.allseo', [
            'seos' => $seos
        ]);
    }

    public function editseo(Seo $seo)
    {
        $routes = collect(\Illuminate\Support\Facades\Route::getRoutes())->map(function ($route) {
            if (!Str::contains($route->uri(), '_')) {
                return $route->uri();
            }
        });

        return view('admin.marketing.editseo', [
            'seo' => $seo,
            'routes' => $routes
        ]);
    }

    public function editseopost(Seo $seo, Request $request)
    {
        $seo->route = $request->route;
        $seo->meta_title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->save();

        return redirect()->route('admin.marketing.seo.viewall', $seo)->with('success', 'SEO details has been updated.');
    }

    public function deleteseo(Seo $seo): \Illuminate\Http\RedirectResponse
    {
        $seo->delete();
        return redirect()->back()->with('deleted', 'Seo Detail removed');
    }

    public function createseo()
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

    public function postseo(Request $request): \Illuminate\Http\RedirectResponse
    {
        Seo::query()->updateOrCreate([
            'route' => $request->route,
        ], [
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->route('admin.marketing.seo.viewall')->with('success', 'SEO details has been created.');
    }
}
