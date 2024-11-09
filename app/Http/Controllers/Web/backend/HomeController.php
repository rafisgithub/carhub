<?php

namespace App\Http\Controllers\Web\backend;

use App\Http\Controllers\Controller;
use App\Models\CMS;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('backend.layouts.home.index');
    }

    public function about() {
        return view('backend.layouts.about.about');
    }

    public function storeAboutSection(Request $request) {
    //  dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $request->file('image')->move('cms/about/ceo/profile/', $filename);
            $image = 'cms/about/ceo/profile/' . $filename;
        }


        $data = CMS::where('id', $request->value)->first();
        if ($data) {
            $fileToDelete2 = public_path($data->image);


            if (file_exists($fileToDelete2))
            {
                unlink($fileToDelete2);
            }
            $data->update([
                'title' => $request->title,
                'content' => $request->description,
                'image' => $image,
            ]);
        } else {

            CMS::create([
                'title' => $request->title,
                'content' => $request->description,
                'image' => $image,
            ]);
        }

        return redirect()->route('about')->with('success', 'About section updated successfully');
    }
}
