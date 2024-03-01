<?php

namespace App\Http\Controllers;

use App\DataTables\BannersDataTable;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(BannersDataTable $dataTable)
    {
        return $dataTable->render('banners.index');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'description' => 'required|min:4',
                'banner' => 'required|image',
            ]);
            $bannerName = '';
            if ($banner = $request->file('banner')) {
                $bannerName = time().'-'.uniqid().'.'.$banner->getClientOriginalExtension();
                $banner->move('banner', $bannerName);
            }
            Banner::create([
                'banner' => $bannerName,
                'description' => $request->description,
            ]);

            return redirect('banners')->with('success', 'Banner created successfully!');
        } catch (\Exception $e) {
            return redirect('banners')->with('error', 'Banner not created!'.' '.$e->getMessage());
        }
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        return view('/banners/edit', [
            'banner' => $banner,
        ]);
    }

    public function editSave(Request $request, $id)
    {
        try {
            $request->validate([
                'description' => 'required|min:4',
                'banner' => 'required|image',
            ]);
            $bannerName = '';
            if ($banner = $request->file('banner')) {
                $bannerName = time().'-'.uniqid().'.'.$banner->getClientOriginalExtension();
                $banner->move('banner', $bannerName);
            }
            Banner::findOrFail($id)->update([
                'description' => $request->description,
                'banner' => $bannerName,
            ]);

            return redirect('banners')->with('success', 'Banner updated successfully!');
        } catch (\Exception $e) {
            return redirect('banners')->with('error', 'Banner not updated!'.' '.$e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Banner::findOrFail($id)->delete();

            return redirect('banners')->with('success', 'Banner deleted successfully!');
        } catch (\Exception $e) {
            return redirect('banners')->with('error', 'Banner not deleted!'.' '.$e->getMessage());
        }
    }
}
