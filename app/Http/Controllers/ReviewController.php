<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Owner;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
       public function rate($company_id)
       {
       
        $reviews = Review::find($company_id);
        
        $total_reviews=0;
        $user_counter=0;
      
        foreach ($reviews as $review) {
            $total_reviews= $total_reviews + $review->count;
            $user_counter++;
        }
        $avg_reviews=$total_reviews/$user_counter;
              
        return view('publicSite.singleCompany',compact('total_reviews','avg_reviews'));
       }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request,$company_id)
    {
        $this->validate($request, [
            'rate-select' => 'required' 
        ]);
        $review = new Review;
        $review->count = $request->input('rate-select');
        $review->user_id = auth()->id();
        $review->owner_id =$company_id;
        if (Auth::check()) {
            $review->save();
            return redirect('/companies/{$company_id}')->with('success', 'post created');
        }else{
            return redirect('/login'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
