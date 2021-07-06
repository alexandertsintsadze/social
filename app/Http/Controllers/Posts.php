<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Posts extends Controller
{
    //
    public function createPost(Request $request) {
        $advert = new Advert;

        $advert->account_id = Auth::id();
        $advert->title = $request->title;
        $advert->description = $request->description;
        $advert->active = 1;
        $advert->type = 1;

        $advert->save();

        return redirect(route('adverts'));
    }
    public function makeOffer(Request $request, $id) {
        $offer = new Offer;
        $offer->account_id = Auth::id();
        $offer->status = 0;
        $offer->advert_id = $id;
        $offer->type = $request->type;
        if ($request->price) {
            $offer->price = $request->price;
        }
        $offer->save();
        return redirect(route('adverts'))->with('offer', true);
    }
    public function createView(Request $request) {
        
        return view('account.createadverts');
    }
    public function viewPost(Request $request, $id) {
        // $advert = Advert::find($id);
        $advert = DB::table('adverts')->select('adverts.*', 'accounts.name as name')->where([['adverts.id', '=', $id], ['adverts.active', '=', 1]])->leftJoin('accounts', 'accounts.id', '=', 'adverts.account_id')->first();
        
        return view('account.viewadvert', ['advert' => $advert]);
    }
    public function viewOwnPost(Request $request) {
        
    }
    public function listOwnPost(Request $request) {
        //Advert::
        $adverts = DB::table('adverts')->select('adverts.*', 'accounts.name as name')->where([['account_id', '=', Auth::id()]])->get();
        // dump($adverts);
        function status($type) {
            switch($type) {
                case 1: return 'კრიტერიუმების მიხედვით';
                case 2: return 'შემომთავაზეთ ფასები';
                default: return 'კრიტერიუმების მიხედვით';
            }
        }
        foreach($adverts as $advert) {
            $advert->type = status($advert->type);
        }
        return view('account.adverts', ['adverts' => $adverts]);
    }
    public function listAdvertOffers(Request $request) {

    }
    public function listPost(Request $request) {
        //Advert::
        $adverts = DB::table('adverts')->select('adverts.*', 'accounts.name as name')->where([/* ['adverts.type', '=', 1],  */['active', '=', 1]])->leftJoin('accounts', 'accounts.id', '=', 'adverts.account_id')->get();;
        // dump($adverts);
        function status($type) {
            switch($type) {
                case 1: return 'კრიტერიუმების მიხედვით';
                case 2: return 'შემომთავაზეთ ფასები';
                default: return 'კრიტერიუმების მიხედვით';
            }
        }
        foreach($adverts as $advert) {
            $advert->type = status($advert->type);
        }
        return view('account.adverts', ['adverts' => $adverts]);
    }
}
