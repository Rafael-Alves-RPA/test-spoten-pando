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
            $input = $request->validate([
                'description' => 'required|',
                'banner' => 'required|min:4',
            ]);
            Banner::create($input);
            return redirect('banners')->with('success', 'Banner created successfully!');
        } catch (\Exception $e) {
            return redirect('banners')->with('error', 'Banner not created!' . $e);
        }
    }
    public function edit($id)
    {
        try {
            Banner::findOrFail($id)->update([
                'description' => $this->description,
                'banner' => $this->banner,
            ]);
            return redirect('banners')->with('success', 'Banner updated successfully!');
        } catch (\Exception $e) {
            return redirect('banners')->with('error', 'Banner not updated!' . $e);
        }
    }
    public function delete($id)
    {
        try {
            Banner::findOrFail($id)->delete();
            return redirect('banners')->with('success', 'Banner deleted successfully!');
        } catch (\Exception $e) {
            return redirect('banners')->with('error', 'Banner not deleted!' . $e);
        }
    }
}