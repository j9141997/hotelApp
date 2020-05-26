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
      //
      $text = $request->text;
      if(strpos($text, '　') !== false) {
        $msg = '口コミを正しく入力して下さい。';
        return redirect()->back()->with('msg', $msg);
      }
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
