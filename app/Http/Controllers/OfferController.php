<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OfferController extends Controller
{
    public function create(){
    return view('offers.create');
    }
    public function store(OfferRequest $request){
        $file_extension=$request->photo->getClientOriginalExtension();
        $photo_name=time().'.'.$file_extension;
        $path='images/offers';
        $request->photo->move($path,$photo_name);
    Offer::create([
        'name_ar'=>$request->name_ar,
        'name_en'=>$request->name_en,
        'price'=>$request->price,
        'details_ar'=>$request->details_ar,
        'details_en'=>$request->details_en,
        'photo'=> $photo_name

    ]);
        return redirect()->back();

    }
    public function index(){
        $offers= Offer::select('id','price','name_'.App::currentLocale().' as name','details_'.App::currentLocale().' as details')->get();
        return view('offers.show',compact('offers'));
    }
    public function edit($id){
        $offer=Offer::findOrFail($id);
       return view('offers.edit',compact('offer'));
    }
    public function update(OfferRequest $request,$id){
        $file_extension=$request->photo->getClientOriginalExtension();
        $photo_name=time().'.'.$file_extension;
        $path='images/offers';
        $request->photo->move($path,$photo_name);
        $offer=Offer::findOrFail($id);
        $offer->update([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'price'=>$request->price,
            'details_ar'=>$request->details_ar,
            'details_en'=>$request->details_en,
            'photo'=>$photo_name
        ]);

        return redirect()->route('offer.index')->with('__("message.offer updated")');
    }
    public function delete($id){
        $offer=Offer::findOrFail($id);
        $offer->where('id',$id)->delete();
        return redirect()->route('offer.index');
    }


}
