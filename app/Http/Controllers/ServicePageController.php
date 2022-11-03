<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    
    public function list(){

        $services = Service::all();
        return view('pages.services.list', compact('services'));
    }
    
    
    public function create(){

        return view('pages.services.create');
    }

    public function store(Request $request){
        $request->validate([

            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $service = new Service;
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;

        $service->save();
        return redirect()->route('admin.servicepage.list')->with('success','Service Successfully Created');

    }


    public function edit($id){

        $service = Service::find($id);
        return view('pages.services.edit', compact('service'));

    }


    public function update(Request $request, $id){

        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $service = Service::find($id);
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;

        $service->save();
        return redirect()->route('admin.servicepage.list')->with('success','Service Successfully Updated');

    }


    public function delete($id){

        $service = Service::find($id);
        $service->delete();
        return redirect()->route('admin.servicepage.list')->with('success','Service Successfully Deleted');


    }

}
