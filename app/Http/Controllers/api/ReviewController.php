<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Auth;


class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
       
        $res = [
            'reviews' => $reviews,
            
           
        ];
    }
    public function store(Request $request)
    {
       
        $review= Review::create([
            'service'   =>$request->service ,
            'rating'    =>$request->rating ,
            'remarks'   =>$request->remarks ,
            'user'      =>auth()->user()->name,
            'user_id'   =>auth()->user()->id,
        ]);
        $res = [
            'review' => $review,
            'message' => 'review created succesfully',
           
        ];
       
    }

}
