<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function addVideo(Request $request){

        $video = new Video();
        $video->name = $request->name;
        $video->year = $request->year;
        $video->description = $request->description;
        $video->category = $request->category;
        $video->image_link = $request->image_link;
        //$video->video_link = $request->video_link;
        $video->is_featured = $request->is_featured;
        $is_uploaded = $request->is_uploaded;

        if ($is_uploaded == "true"){
            $file_name = $request->file("file")->getClientOriginalName();
            $final_name = str_replace(' ', '', $file_name);
            $video_url = $request->file("file")->storeAs("public", $final_name);
            $video->video_link = str_replace('public', 'storage', $video_url);
        }
        else{
            $video->video_link = $request->video_link;
        }
        $save = $video->save();
        return ["status"=>$save];

    }

    public function showAllVideo(){
        return Video::all();
    }

    public function showVideoById($id){
        return Video::findOrFail($id);
    }

    public function featuredVideo()
    {
        return Video::where('is_featured', '=', 'true')->get();
    }

    public function getCategories(){
        return Video::select('category')->distinct()->get();
    }

    public function getByCategories($categories){
        return Video::where('category', '=', $categories)->get();
    }

    public function testVideo(Request $request): array
    {
        $file_name = $request->file('file')->getClientOriginalName();
        $final_name = str_replace(' ', '', $file_name);
        return ["result"=>$request->file('file')->storeAs('public', $final_name)];
        //return ["data"=>$request->data];
    }


}
