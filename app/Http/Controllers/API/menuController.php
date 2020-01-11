<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Traits\Translatable;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Menu::where('name', '=', "main")
                ->with(['parent_items' => function ($q) {
                        $q->select("id", "menu_id", "parent_id", "title", "url")->get();
                        $q->with(['children' => function ($qq) {
                                $qq->select("id", "menu_id", "parent_id", "title", "url")->orderBy('order');
                            }]);
                    }])
                ->first();


        $response = [];
        $list     = $list["parent_items"];
        foreach ($list as $single)
        {
            $model                 = [];
            foreach (config('localized-routes.supported-locales') as $locale) {
                $model['title'][$locale]     = $single->getTranslatedAttribute('title', $locale);
                if(Route::has($locale. "." .$single->getTranslatedAttribute('url'))){
                    $model["url"][$locale]   = route($single->getTranslatedAttribute('url'), Route::current()->parameters(), true, $locale);
                }else{
                    $model["url"]   = $single->getTranslatedAttribute('url');
                }

            }
         
            $children              = [];
            if (count($single->children) > 0)
            {
                foreach ($single->children as $c)
                {
                    foreach (config('localized-routes.supported-locales') as $locale) {
                        $child['title'][$locale] = $c->getTranslatedAttribute('title', $locale);
                            $child["url"][$locale]   = route($single->getTranslatedAttribute('url'), ['category' => $c->getTranslatedAttribute('url')], true, $locale);
                    }
                    $children[]       = $child;
                }
                $model["children"] = $children;
            }

            $response[] = $model;
        }
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
