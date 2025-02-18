<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{
    public function rateArticle(Request $request, $article_id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Rate::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'article_id' => $article_id,
            ],
            [
                'rating' => $request->rating,
            ]
        );

        return redirect()->back()->with('status', 'Article rated successfully');
    }

    public function getUserRating($article_id)
{
    $userRating = Rate::where('article_id', $article_id)
                      ->where('user_id', Auth::id())
                      ->first();

    return $userRating ? $userRating->rating : null;
}
}