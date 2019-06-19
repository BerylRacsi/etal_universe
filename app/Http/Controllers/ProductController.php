<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Measurement;
use App\Stock;
use File;
use Image;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::all();
        $stocks = Stock::all();

        return view('admin/product/index', compact('products','stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin/product/create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $latestOrder = Product::orderBy('created_at','DESC')->first();

        $products = new Product;

        if (is_null($latestOrder)) {
            $products->id = 1;
        }
        else {
            $products->id = $latestOrder->id+1;
        }

        $products->name = $request->input('name');
        $products->brand = $request->input('brand');
        $products->category = $request->input('category');
        $pricefixed = str_replace(',', '',$request->input('price'));
        $products->price = $pricefixed;
        $products->description = $request->input('description');


        if ($request->has('xs')){
            $products->xs = $request->input('xs');

            $stockxs = new Stock;
            $stockxs->id_product = $products->id;
            $stockxs->size = "XS";
            $stockxs->amount = $request->input('stockXS');
            $stockxs->save();

            if ($request->input('category') == "bottom") {
                $measurexs = new Measurement;
                $measurexs->id_product = $products->id;
                $measurexs->size = "XS";
                $measurexs->waist = $request->input('xsw');
                $measurexs->tight = $request->input('xst');
                $measurexs->inseam = $request->input('xsi');
                $measurexs->knee = $request->input('xsk');
                $measurexs->leg = $request->input('xsl');

                $measurexs->save();
            }
        }
        else {
            $products->xs = '0';
        }

        if ($request->has('s')){
            $products->s = $request->input('s');

            $stocks = new Stock;
            $stocks->id_product = $products->id;
            $stocks->size = "S";
            $stocks->amount = $request->input('stockS');
            $stocks->save();

            if ($request->input('category') == "bottom") {
                $measures = new Measurement;
                $measures->id_product = $products->id;
                $measures->size = "S";
                $measures->waist = $request->input('sw');
                $measures->tight = $request->input('st');
                $measures->inseam = $request->input('si');
                $measures->knee = $request->input('sk');
                $measures->leg = $request->input('sl');

                $measures->save();
            }
        }
        else {
            $products->s = '0';
        }

        if ($request->has('m')){
            $products->m = $request->input('m');

            $stockm = new Stock;
            $stockm->id_product = $products->id;
            $stockm->size = "M";
            $stockm->amount = $request->input('stockM');
            $stockm->save();

            if ($request->input('category') == "bottom") {
                $measurem = new Measurement;
                $measurem->id_product = $products->id;
                $measurem->size = "M";
                $measurem->waist = $request->input('mw');
                $measurem->tight = $request->input('mt');
                $measurem->inseam = $request->input('mi');
                $measurem->knee = $request->input('mk');
                $measurem->leg = $request->input('ml');

                $measurem->save();
            }
        }
        else {
            $products->m = '0';
        }

        if ($request->has('l')){
            $products->l = $request->input('l');

            $stockl = new Stock;
            $stockl->id_product = $products->id;
            $stockl->size = "L";
            $stockl->amount = $request->input('stockL');
            $stockl->save();

            if ($request->input('category') == "bottom") {
                $measurel = new Measurement;
                $measurel->id_product = $products->id;
                $measurel->size = "L";
                $measurel->waist = $request->input('lw');
                $measurel->tight = $request->input('lt');
                $measurel->inseam = $request->input('li');
                $measurel->knee = $request->input('lk');
                $measurel->leg = $request->input('ll');

                $measurel->save();
            }
        }
        else {
            $products->l = '0';
        }

        if ($request->has('xl')){
            $products->xl = $request->input('xl');

            $stockxl = new Stock;
            $stockxl->id_product = $products->id;
            $stockxl->size = "XL";
            $stockxl->amount = $request->input('stockXL');
            $stockxl->save();

            if ($request->input('category') == "bottom") {
                $measurexl = new Measurement;
                $measurexl->id_product = $products->id;
                $measurexl->size = "XL";
                $measurexl->waist = $request->input('xlw');
                $measurexl->tight = $request->input('xlt');
                $measurexl->inseam = $request->input('xli');
                $measurexl->knee = $request->input('xlk');
                $measurexl->leg = $request->input('xll');

                $measurexl->save();
            }
        }
        else {
            $products->xl = '0';
        }

        if ($request->has('none')){
            $products->none = $request->input('none');

            $stocknone = new Stock;
            $stocknone->id_product = $products->id;
            $stocknone->size = "NONE";
            $stocknone->amount = $request->input('stockNONE');
            $stocknone->save();
        }
        else {
            $products->none = '0';
        }
        $products->color = $request->input('color');
        $products->gender = $request->input('gender');

        if ($request->hasFile('image')) {
            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = $thm_img = true;
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/originals/')) {
                $org_img = File::makeDirectory('images/originals/', 0777, true);
            }
            if ( ! File::exists('images/thumbnails/')) {
                $thm_img = File::makeDirectory('images/thumbnails', 0777, true);
            }
            
            $path1 = [];
            $path2 = [];    

            // loop through each image to save and upload
            foreach($images as $key => $image) {

                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/originals/' . $filename;
                $thm_path = 'images/thumbnails/' . $filename;
 
                $path1[$key] = $org_path; 
                $path2[$key] = $thm_path;

                if (($org_img && $thm_img) == true) {
                   Image::make($image)->fit(1200, 1486, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                   Image::make($image)->fit(1200, 1486, function ($constraint) {
                       $constraint->upsize();
                   })->save($thm_path);
                }

            }

        }
        $stringpath1 = implode(',', $path1);
        $stringpath2 = implode(',', $path2);

        $products->image = $stringpath1;
        $products->thumbnail = $thm_path;
        $products->save();

        return redirect('/admin/product');
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        $measures = Measurement::where('id_product',$id)->get();
        $stocks = Stock::where('id_product',$id)->get();

        return view('admin.product.show',compact('products','measures','stocks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $products = Product::find($id);
        $measures = Measurement::where('id_product',$id)->get();
        $stocks = Stock::where('id_product',$id)->get();

        return view('admin.product.edit',compact('products','measures','stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $products->name = $request->input('name');
        $products->brand = $request->input('brand');
        $products->category = $request->input('category');
        $pricefixed = str_replace(',', '',$request->input('price'));
        $products->price = $pricefixed;
        $products->description = $request->input('description');

        if ($request->has('xs')){
            $products->xs = $request->input('xs');

            $stockxs = Stock::where('id_product',$id)->where('size','XS')->first();
            $stockxs->id_product = $products->id;
            $stockxs->size = "XS";
            $stockxs->amount = $request->input('stockXS');
            $stockxs->save();

            if ($request->input('category') == "bottom") {
                $measurexs = Measurement::where('id_product',$id)->where('size','XS')->first();
                $measurexs->id_product = $products->id;
                $measurexs->size = "XS";
                $measurexs->waist = $request->input('xsw');
                $measurexs->tight = $request->input('xst');
                $measurexs->inseam = $request->input('xsi');
                $measurexs->knee = $request->input('xsk');
                $measurexs->leg = $request->input('xsl');

                $measurexs->save();
            }
        }
        else {
            $products->xs = '0';
        }
        if ($request->has('s')){
            $products->s = $request->input('s');

            $stocks = Stock::where('id_product',$id)->where('size','S')->first();
            $stocks->id_product = $products->id;
            $stocks->size = "S";
            $stocks->amount = $request->input('stockS');
            $stocks->save();

            if ($request->input('category') == "bottom") {
                $measures = Measurement::where('id_product',$id)->where('size','S')->first();
                $measures->id_product = $products->id;
                $measures->size = "S";
                $measures->waist = $request->input('sw');
                $measures->tight = $request->input('st');
                $measures->inseam = $request->input('si');
                $measures->knee = $request->input('sk');
                $measures->leg = $request->input('sl');

                $measures->save();
            }
        }
        else {
            $products->s = '0';
        }
        if ($request->has('m')){
            $products->m = $request->input('m');

            $stockm = Stock::where('id_product',$id)->where('size','M')->first();
            $stockm->id_product = $products->id;
            $stockm->size = "M";
            $stockm->amount = $request->input('stockM');
            $stockm->save();

            if ($request->input('category') == "bottom") {
                $measurem = Measurement::where('id_product',$id)->where('size','M')->first();
                $measurem->id_product = $products->id;
                $measurem->size = "M";
                $measurem->waist = $request->input('mw');
                $measurem->tight = $request->input('mt');
                $measurem->inseam = $request->input('mi');
                $measurem->knee = $request->input('mk');
                $measurem->leg = $request->input('ml');

                $measurem->save();
            }
        }
        else {
            $products->m = '0';
        }
        if ($request->has('l')){
            $products->l = $request->input('l');

            $stockl = Stock::where('id_product',$id)->where('size','L')->first();
            $stockl->id_product = $products->id;
            $stockl->size = "L";
            $stockl->amount = $request->input('stockL');
            $stockl->save();

            if ($request->input('category') == "bottom") {
                $measurel = Measurement::where('id_product',$id)->where('size','L')->first();
                $measurel->id_product = $products->id;
                $measurel->size = "L";
                $measurel->waist = $request->input('lw');
                $measurel->tight = $request->input('lt');
                $measurel->inseam = $request->input('li');
                $measurel->knee = $request->input('lk');
                $measurel->leg = $request->input('ll');

                $measurel->save();
            }
        }
        else {
            $products->l = '0';
        }
        if ($request->has('xl')){
            $products->xl = $request->input('xl');

            $stockxl = Stock::where('id_product',$id)->where('size','XL')->first();
            $stockxl->id_product = $products->id;
            $stockxl->size = "XL";
            $stockxl->amount = $request->input('stockXL');
            $stockxl->save();

            if ($request->input('category') == "bottom") {
                $measurexl = Measurement::where('id_product',$id)->where('size','XL')->first();
                $measurexl->id_product = $products->id;
                $measurexl->size = "XL";
                $measurexl->waist = $request->input('xlw');
                $measurexl->tight = $request->input('xlt');
                $measurexl->inseam = $request->input('xli');
                $measurexl->knee = $request->input('xlk');
                $measurexl->leg = $request->input('xll');

                $measurexl->save();
            }
        }
        else {
            $products->xl = '0';
        }
        if ($request->has('none')){
            $products->none = $request->input('none');

            $stocknone = Stock::where('id_product',$id)->where('size','NONE')->first();
            $stocknone->id_product = $products->id;
            $stocknone->size = "NONE";
            $stocknone->amount = $request->input('stockNONE');
            $stocknone->save();
        }
        else {
            $products->none = '0';
        }
        $products->color = $request->input('color');
        $products->gender = $request->input('gender');

        if ($request->hasFile('image')) {
            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = $thm_img = true;
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/originals/')) {
                $org_img = File::makeDirectory('images/originals/', 0777, true);
            }
            if ( ! File::exists('images/thumbnails/')) {
                $thm_img = File::makeDirectory('images/thumbnails', 0777, true);
            }
            
            $path1 = [];
            $path2 = [];    

            // loop through each image to save and upload
            foreach($images as $key => $image) {

                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/originals/' . $filename;
                $thm_path = 'images/thumbnails/' . $filename;
 
                $path1[$key] = $org_path; 
                $path2[$key] = $thm_path;

                if (($org_img && $thm_img) == true) {
                   Image::make($image)->fit(900, 500, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                   Image::make($image)->fit(140, 140, function ($constraint) {
                       $constraint->upsize();
                   })->save($thm_path);
                }

            }

        $stringpath1 = implode(',', $path1);
        $stringpath2 = implode(',', $path2);

        $products->image = $stringpath1;
        $products->thumbnail = $thm_path;
        }

        $products->save();

        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $measure = Measurement::where('id_product',$id);
        $stock = Stock::where('id_product',$id);
        Storage::delete($product->image);
        $measure->delete();
        $stock->delete();
        $product->delete();
        return redirect('admin/product')->with('status', 'Product Removed!');
    }
}
