<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;

class ReviewsController extends Controller
{
    public function store(Request $request, $id)
    {
      $this->validate($request, Review::$rules);
      $review = new Review;
      $form = $request->all();
      $review->user_id = Auth::id();
      $review->hotel_id = $id;
      unset($form['_token']);
      if ($review->fill($form)->save()) {
          return redirect()->route('review.store', ['hotel' => $id]);
      }
    }
}
