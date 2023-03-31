<?php

namespace App\Http\Controllers\LuxeFront;

use App\Http\Controllers\Controller;
use App\Traits\CloverUtils;
use Illuminate\Http\Request;

class LuxeController extends Controller
{
    use CloverUtils;
    public function about()
    {
        return view('partials.theme.about');
    }

    public function contact()
    {
        return view('partials.theme.contact');
    }

    public function shop()
    {
        return view('partials.theme.shop');
    }

    public function categories()
    {
        $categories = $this->getCategories();

        return view('partials.theme.categories',compact('categories'));
    }

}
