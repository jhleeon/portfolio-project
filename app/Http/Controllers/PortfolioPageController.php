<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioPageController extends Controller
{
    // public function list(){

    //     $services = Service::all();
    //     return view('pages.services.list', compact('services'));
    // }
    
    
    public function create(){

        return view('pages.portfolios.create');
    }


    public function store(Request $request){

        $request->validate([

            'big_img' =>'required',
            'small_img' =>'required',
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
        Storage::putFile('public/img/',$big_file);
        $portfolio->big_img = "storage/img/".$big_file->hashName();

        $small_file = $request->file('small_img');
        Storage::putFile('public/img/',$small_file);
        $portfolio->small_img = "storage/img/".$small_file->hashName();
        $portfolio->save();
        return redirect()->route('admin.portfoliopage.create')->with('success','Portfolio Successfully Created');

    }


    // public function edit($id){

    //     $service = Service::find($id);
    //     return view('pages.services.edit', compact('service'));

    // }


    // public function update(Request $request, $id){

    //     $request->validate([
    //         'icon' => 'required|string',
    //         'title' => 'required|string',
    //         'description' => 'required|string',
    //     ]);

    //     $service = Service::find($id);
    //     $service->icon = $request->icon;
    //     $service->title = $request->title;
    //     $service->description = $request->description;

    //     $service->save();
    //     return redirect()->route('admin.servicepage.list')->with('success','Service Successfully Updated');

    // }


    // public function delete($id){

    //     $service = Service::find($id);
    //     $service->delete();
    //     return redirect()->route('admin.servicepage.list')->with('success','Service Successfully Deleted');


    // }
}
