<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        
        $reviews= Rating::with('customer')->get();


        return view ('admin.review.index' , compact('reviews'));
    }

    public function delete($review_id)
    {
        $rate= Rating::find($review_id);
        if ($rate) {
            $rate->delete();
    
            return redirect('admin/review')->with('message', 'Review deleted successfully');
        }
    
        return redirect('admin/review')->with('error', 'Review not found');
    }
}
