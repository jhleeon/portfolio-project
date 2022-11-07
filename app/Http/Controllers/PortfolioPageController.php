<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioPageController extends Controller
{
    public function list()
    {
        $portfolios = Portfolio::all();
        return view('pages.portfolios.list', compact('portfolios'));
    }


    public function create()
    {
        return view('pages.portfolios.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'big_img' => 'required',
            'small_img' => 'required',
            'front_title' => 'required|string',
            'front_sub_title' => 'required|string',
            'title' => 'required|string',
            'description' => 'required',
            'client' => 'required|string',
            'category' => 'required|string',
        ]);
        $portfolio = new Portfolio();
        $portfolio->front_title = $request->front_title;
        $portfolio->front_sub_title = $request->front_sub_title;
        $portfolio->title = $request->title;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->description = $request->description;
        $portfolio->client = $request->client;
        $portfolio->category = $request->category;

        $big_file = $request->file('big_img');
        Storage::putFile('public/img/', $big_file);
        $portfolio->big_img = "storage/img/" . $big_file->hashName();

        $small_file = $request->file('small_img');
        Storage::putFile('public/img/', $small_file);
        $portfolio->small_img = "storage/img/" . $small_file->hashName();
        $portfolio->save();
        return redirect()->route('admin.portfoliopage.list')->with('success', 'Portfolio Successfully Created');
    }



    public function edit($id)
    {

        $portfolio = Portfolio::find($id);
        return view('pages.portfolios.edit', compact('portfolio'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'front_title' => 'required|string',
            'front_sub_title' => 'required|string',
            'title' => 'required|string',
            'description' => 'required',
            'client' => 'required|string',
            'category' => 'required|string',
        ]);

        $portfolio = Portfolio::find($id);
        $portfolio->front_title = $request->front_title;
        $portfolio->front_sub_title = $request->front_sub_title;
        $portfolio->title = $request->title;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->description = $request->description;
        $portfolio->client = $request->client;
        $portfolio->category = $request->category;

        if ($request->file('big_img')) {

            $big_file = $request->file('big_img');
            Storage::putFile('public/img', $big_file);
            $portfolio->big_img = "storage/img/" . $big_file->hashName();
            
        }

        if ($request->file('small_img')) {

            $small_file = $request->file('small_img');
            Storage::putFile('public/img', $small_file);
            $portfolio->small_img = "storage/img/" . $small_file->hashName();
        }

        $portfolio->save();
        return redirect()->route('admin.portfoliopage.list')->with('success', 'Portfolio Successfully Created');
    }


    public function delete($id){

        $portfolio = Portfolio::find($id);
        @unlink(public_path($portfolio->big_img));
        @unlink(public_path($portfolio->small_img));
        $portfolio->delete();
        return redirect()->route('admin.portfoliopage.list')->with('success','Portfolio Successfully Deleted');


    }
}
