<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainPageController extends Controller
{
   
    public function mainpage(){
        $main = Main::first();
        return view('pages.main',compact('main'));
    }

    public function update(Request $request){
        
        $request->validate([
            'title' => 'required|string',
            'sub_title' => 'required|string',
        ]);
         $main = Main::first();
         $main->title = $request->title;
         $main->sub_title = $request->sub_title;

        if($request->file('bc_img')){
            $img_file = $request->file('bc_img');
            $img_file->storeAs('public/img','bc_img.'. $img_file->getClientOriginalExtension());
            $main->bc_img = 'storage/img/bc_img.'.$img_file->getClientOriginalExtension();
        }

        if($request->file('resume')){
            $img_file = $request->file('resume');
            $img_file->storeAs('public/pdf','resume.'. $img_file->getClientOriginalExtension());
            $main->resume = 'storage/pdf/resume.'.$img_file->getClientOriginalExtension();
        }

        $main->save();
        return redirect()->route('admin.mainpage')->with('success','main page updated successfully!');
    }

}
