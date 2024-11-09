<?php

namespace App\Http\Controllers\Web\backend;

use App\Http\Controllers\Controller;
use App\Models\CMS;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index() {
        return view('backend.layouts.home.index');
    }

    public function about() {
        $data = CMS::where('id', '1')->first();
        return view('backend.layouts.about.about',compact('data'));
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


            if ($data->image != null && file_exists($fileToDelete2))
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


    public function ceoMessage() {
        $data = CMS::where('id', '2')->first();
        return view('backend.layouts.about.ceo-message', compact('data'));
    }

    public function storeCeoMessage(Request $request) {
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
            $request->file('image')->move('cms/about/ceo/message/', $filename);
            $image = 'cms/about/ceo/message/' . $filename;
        }
        $data = CMS::where('id', $request->value)->first();

        // dd($data);
        if($data) {
            $fileToDelete2 = public_path($data->image);
            if ($data->image != null && file_exists($fileToDelete2))
            {
                unlink($fileToDelete2);
            }

            $data->update([
                'title' => $request->title,
                'content' => $request->description,
                'image' => $image,
            ]);
        }else{
            CMS::create([
                'title' => $request->title,
                'content' => $request->description,
                'image' => $image,
            ]);
        }
        return redirect()->route('seo-message')->with('success', 'CEO message updated successfully');
    }

    public function aboutFeatures() {
        return view('backend.layouts.about.features');
    }

    public function storeAboutFeatures(Request $request) {
        // dd($request->all());

        $request->validate([
            'title.*' => 'required',
            'content.*' => 'required',
            'image.*' => 'required',
        ]);
        for($i = 0; $i < count($request->title); $i++) {

        //   echo "<pre>"; print_r($data);
        $image = null;
        if ($request->hasFile('image.' . $i)) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image.' . $i)->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $request->file('image.' . $i)->move('cms/about/features/imgs/', $filename);
            $image = 'cms/about/features/imgs/' . $filename;
        }
            Feature::create([
                'title' => $request->title[$i],
                'content' => $request->content[$i],
                'image' =>  $image
            ]);
        }


        return redirect()->route('about.features')->with('success', 'About features Created successfully');
    }

    public function buyingACar() {
        $data = CMS::where('id', '3')->first();
        return view('backend.layouts.about.buying-a-car', compact('data'));
    }


    public function SaveBuyingCarInfo(Request $request) {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'url' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('banner')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $request->file('banner')->move('cms/about/buy-a-car/banner/', $filename);
            $banner = 'cms/about/buy-a-car/banner/' . $filename;
        }
        if($request->hasFile('image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $request->file('image')->move('cms/about/buy-a-car/image/', $filename);
            $image = 'cms/about/buy-a-car/image/' . $filename;
        }

        $data = CMS::where('id', $request->value)->first();

        if($data) {
            $imageToDelete = public_path($data->image);
            $bannerToDel = public_path($data->banner);
            if ($data->image != null && file_exists($imageToDelete))
            {
                unlink($imageToDelete);
            }
            if ($data->banner != null && file_exists($bannerToDel))
            {
                unlink($bannerToDel);
            }

            $data->update([
                'title' => $request->title,
                'content' => $request->content,
                'url' => $request->url,
                'banner' => $banner,
                'image' => $image,
            ]);
        }
        else {
            CMS::create([
                'title' => $request->title,
                'content' => $request->content,
                'url' => $request->url,
                'banner' => $banner,
                'image' => $image,
            ]);
        }
        $data = CMS::where('id', $request->value)->first();

        return redirect()->route('about.buying.a.car')->with('success', 'Buying a car info updated successfully', compact('data'));

    }




    public function sellACar(Request $request) {
        $data = CMS::where('id', '4')->first();
        return view('backend.layouts.about.sell-a-car', compact('data'));
    }


    public function SaveSellCarInfo(Request $request) {
    //  dd($request->all());
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if($request->hasFile('image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $request->file('image')->move('cms/about/sell-a-car/image/', $filename);
            $image = 'cms/about/sell-a-car/image/' . $filename;
        }

        $data = CMS::where('id', $request->value)->first();

        if($data) {
            $imageToDelete = public_path($data->image);
            $bannerToDel = public_path($data->banner);
            if ($data->image != null && file_exists($imageToDelete))
            {
                unlink($imageToDelete);
            }


            $data->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $image,
            ]);
        }
        else {
            CMS::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $image,
            ]);
        }
        $data = CMS::where('id', $request->value)->first();
        return redirect()->route('about.sell.a.car')->with('success', 'Selling a car info updated successfully', compact('data'));
    }

    public function finalizeTheSell() {
        $data = CMS::where('id', '5')->first();
        return view('backend.layouts.about.finalize-the-sell', compact('data'));
    }


    public function storeFinalizeTheSell(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $request->file('image')->move('cms/about/finalize-the-sell/image/', $filename);
            $image = 'cms/about/finalize-the-sell/image/' . $filename;
        }

        $data = CMS::where('id', $request->value)->first();

        if($data) {
            $imageToDelete = public_path($data->image);
            $bannerToDel = public_path($data->banner);
            if ($data->image != null && file_exists($imageToDelete))
            {
                unlink($imageToDelete);
            }

            return redirect()->route('about.finalize.the.sell')->with('success', 'Finalize the sell info updated successfully');
        }

    }
}
