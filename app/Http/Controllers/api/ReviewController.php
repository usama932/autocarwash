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
        return response()->json($res, 200);
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
    public function update(Request $request, $id)
    {
        $review= Review::where('id',$id)->update([
            'is_feature'   =>$request->is_feature,
            'remarks'   =>$request->remarks ,
        ]);
        $res = [
            'review' => $review,
            'message' => 'review created succesfully',
           
        ];   
    }
    public function destroy($id)
    {
        $review = Review::find($id);
      
        if(!empty($review)){
            $review->delete();
            $res = [
                'review' => $review,
                'message' => 'review deleted succesfully',
               
                ];
                
                return response()->json($res, 200);
        }
        else
        {
            $res = [
                'message' => 'Something went wrong',
               
                ];
                
                return response()->json($res, 200);
        }
}
}