<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function autoComplete(Request $request) {
        $query = $request->get('term','');

        $authors = DB::select("SELECT * FROM authors WHERE name LIKE '%$query%'");
            
//            Author::where('name','LIKE','%'.$query.'%')->get();

//        $data=array();
//        foreach ($authors[0] as $author) {
//            $data[]=array('value'=>$author->name,'id'=>$authors->id);
//        }

//        dd($data);
        if($authors)
            return $authors;
        else
            return ['value'=>'No Result Found','id'=>''];
    }
}
