<?php

namespace App\Http\Controllers;

use App\Models\Banner;

class ShowBannerController extends Controller
{
    public function showAll()
    {
        $banners = Banner::all();

        return view('/show', [
            'banners' => $banners,
        ]);
    }
}
