<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Prices extends Controller
{
    //
    public $fields = [
            'facebook' => [
                'facebook_timeline_photo' => [
                    'name' => 'ცალკე ფოტოს დაპოსტვა'
                ],
                'facebook_timeline_video' => [
                    'name' => 'ცალკე ვიდეოს დაპოსტვა'
                ],
                'facebook_timeline_photo_review' => [
                    'name' => 'ცალკე ფოტოს დაპოსტვა + მიმოხილვა'
                ],
                'facebook_timeline_video_review' => [
                    'name' => 'ცალკე ვიდეოს დაპოსტვა + მიმოხილვა'
                ],
                'facebook_day_photo' => [
                    'name' => 'დეიში ფოტოს დაპოსტვა'
                ],
                'facebook_day_video' => [
                    'name' => 'დეიში ვიდეოს დაპოსტვა'
                ],
                'facebook_include_photo' => [
                    'name' => 'ჩანდეს არსებულ ფოტოში'
                ],
                'facebook_include_video' => [
                    'name' => 'ჩანდეს არსებულ ვიდეოში'
                ],
            ],
            'insta' => [
                'inst_timeline_photo' => [
                    'name' => 'ცალკე ფოტოს დაპოსტვა'
                ],
                'inst_timeline_video' => [
                    'name' => 'ცალკე ვიდეოს დაპოსტვა'
                ],

                'inst_timeline_photo_review' => [
                    'name' => 'ცალკე ფოტოს დაპოსტვა + მიმოხილვა'
                ],
                'inst_timeline_video_review' => [
                    'name' => 'ცალკე ვიდეოს დაპოსტვა + მიმოხილვა'
                ],
                'inst_story_photo' => [
                    'name' => 'სთორიში ფოტოს დაპოსტვა'
                ],
                'inst_story_video' => [
                    'name' => 'სთორიში ვიდეოს დაპოსტვა'
                ],
                'inst_include_photo' => [
                    'name' => 'ჩანდეს არსებულ ფოტოში'
                ],
                'inst_include_video' => [
                    'name' => 'ჩანდეს არსებულ ვიდეოში'
                ],
            ],
            'youtube' => [
                'youtube_dedicated' => [
                    'name' => 'ცალკე ვიდეო'
                ],
                'youtube_dedicated_review' => [
                    'name' => 'ცალკე ვიდეო + მიმოხილვა'
                ],
                'youtube_sponsor' => [
                    'name' => 'არსებულ ვიდეოში დასპონსორება (1 წამის ფასი)'
                ],
                'youtube_description_sponsor' => [
                    'name' => 'აღწერაში'
                ],
            ]
        ];
    public function view(Request $request)
    {
        $price = Price::own(Auth::id())->first();
        if (!$price) {
            $price = [];
            foreach($this->fields as $item) {
                foreach($item as $index=>$field) {
                    $price[$index] = $request->$index;
                }
            }
        }
        return view('account.prices', ['fields' => $this->fields, 'prices' => $price]);
    }

    public function create(Request $request) {
        //own(Auth::id())->
        $price = Price::firstOrNew(['account_id' => Auth::id()]);
        foreach($this->fields as $item) {
            foreach($item as $index=>$field) {
                $price->$index = $request->$index;
            }
        }
        $price->save();
        return redirect(route('prices'));
        // dump($price);
    }
}
