<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    function create(Request $req)
    {
        $Validator = Validator::make($req->all(),
    [
        "title"=>"required",
        "description"=>"required",
        "type"=>"required",
        "date"=>"required",


    ]);

    if($Validator->fails())
    {
        return response()->json($Validator->errors());
    }
        $news = new NewsModel();
        $news->title = $req->title;
        $news->description = $req->description;
        $news->type = $req->type;
        $news->date = $req->date;
        $news->save();

        return response()->json(["msg"=>"Create Successfully", "Info"=>$news]);


    }


    function readAll(Request $req)
    {
        $news = NewsModel::all();
        return response()->json(["Info"=>$news]);
    }

    function readID(Request $req)
    {
        $news = NewsModel::where('id',$req->id)->first();
        return response()->json(["Info"=>$news]);
    }

    
    function update(Request $req)
    {
        $news = new NewsModel();
        $news = NewsModel::where('id',$req->id)->first();
        $news->title = $req->title;
        $news->description = $req->description;
        $news->type = $req->type;
        $news->date = $req->date;
        $news->save();
        return response()->json(["msg"=>"Update Successfully", "Info"=>$news]);
    }

    function delete(Request $req)
    {
        $news = NewsModel::where('id',$req->id);
        $news->delete();
        return response()->json(["msg"=>"Delete Successfully"]);
    }

    function readDate(Request $req)
    {
        $news = NewsModel::where('date',$req->date)->get();
        return response()->json(["Info"=>$news]);
    }

    function readtype(Request $req)
    {
        $news = NewsModel::where('type',$req->type)->get();
        return response()->json(["Info"=>$news]);
    }

    
}
