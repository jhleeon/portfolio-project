<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    public function list()
    {
        $abouts = About::all();
        return view('pages.abouts.list', compact('abouts'));
    }


    public function create()
    {
        return view('pages.abouts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required',
            'title1' => 'required|string',
            'title2' => 'required|string',
            'description' => 'required',

        ]);
        $about = new About();
        $about->title1 = $request->title1;
        $about->title2 = $request->title2;
        $about->description = $request->description;

        $file = $request->file('img');
        Storage::putFile('public/img/', $file);
        $about->img = "storage/img/" . $file->hashName();

        $about->save();
        return redirect()->route('admin.aboutpage.list')->with('success', 'About Successfully Created');
    }



    public function edit($id)
    {
        $about = About::find($id);
        return view('pages.abouts.edit', compact('about'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title1' => 'required|string',
            'title2' => 'required|string',
            'description' => 'required',

        ]);

        $about = About::find($id);
        $about->title1 = $request->title1;
        $about->title2 = $request->title2;
        $about->description = $request->description;

        if ($request->file('img')) {
            $file = $request->file('img');
            Storage::putFile('public/img/', $file);
            $about->img = "storage/img/" .$file->hashName();
        }
            $about->save();
            return redirect()->route('admin.aboutpage.list')->with('success', 'About Successfully Updated');
    }


    public function delete($id)
    {
        $about = About::find($id);
        @unlink(public_path($about->img));
        $about->delete();
        return redirect()->route('admin.aboutpage.list')->with('success', 'About Successfully Deleted');
    }
}
