@extends('admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product Data</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('ProductController@update', $products->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$products->name}}" placeholder="Product Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">Brand</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" value="{{$products->brand}}" placeholder="Brand" required>

                                @if ($errors->has('brand'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select class="btn dropdown-toggle" id="sizeSelectBox" name="category" required>
                                    <option value="" disabled="" selected="">Choose One</option>
                    
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                    <option value="accessories">Accessories</option>

                                </select>

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input id="price" data-type="currency" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{$products->price}}" placeholder="Price" required>
                                </div>
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="textarea" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"  placeholder="Describe your product here" required>{{$products->description}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="size" class="col-md-4 col-form-label text-md-right">Size</label>

                            <div class="col-md-6">
                                <div id="size" class="text-center" style="padding-top: 10px;">
                                    <i id="helper">Select Category First</i>
                                    <span class="border border-dark rounded" id="checkboxTop" style="margin-right:5px;display: none; ">

                                    @if($products->xs == 1)
                                    <label class="checkbox-inline" style="padding-right: 5px;padding-left: 5px;"><input id="checkboxXS" name="xs" type="checkbox" value="1" checked="">XS</label>
                                    @else
                                    <label class="checkbox-inline" style="padding-right: 5px;padding-left: 5px;"><input id="checkboxXS" name="xs" type="checkbox" value="1">XS</label>
                                    @endif

                                    @if($products->s == 1)
                                    <label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxS" name="s" type="checkbox" value="1" checked="">S</label>
                                    @else
                                    <label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxS" name="s" type="checkbox" value="1" >S</label>
                                    @endif

                                    @if($products->m == 1)
                                    <label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxM" name="m" type="checkbox" value="1" checked="">M</label>
                                    @else
                                    <label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxM" name="m" type="checkbox" value="1">M</label>
                                    @endif

                                    @if($products->l == 1)
                                    <label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxL" name="l" type="checkbox" value="1" checked="">L</label>
                                    @else
                                    <label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxL" name="l" type="checkbox" value="1">L</label>
                                    @endif

                                    @if($products->xl == 1)
                                    <label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxXL" name="xl" type="checkbox" value="1" checked="">XL</label>
                                    @else
                                    <label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxXL" name="xl" type="checkbox" value="1">XL</label>
                                    @endif
                                    </span>

                                    <span class="border  border-dark rounded" id="checkboxAcc" style="display: none;">
                                    @if($products->none == 1)
                                    <label class="checkbox-inline" style="padding-right: 5px;padding-left: 5px;"><input id="none" name="none" type="checkbox" value="1" checked="">NONE</label>
                                    @else
                                    <label class="checkbox-inline" style="padding-right: 5px;padding-left: 5px;"><input id="none" name="none" type="checkbox" value="1" >NONE</label>
                                    @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        @foreach($measures as $measure)
                            @if($products->id == $measure->id_product)
                                @if($measure->size == "XS")
                                    @php
                                        $wXS = $measure->waist;
                                        $tXS = $measure->tight;
                                        $iXS = $measure->inseam;
                                        $kXS = $measure->knee;
                                        $lXS = $measure->leg;
                                    @endphp
                                @endif
                                @if($measure->size == "S")
                                    @php
                                        $wS = $measure->waist;
                                        $tS = $measure->tight;
                                        $iS = $measure->inseam;
                                        $kS = $measure->knee;
                                        $lS = $measure->leg;
                                    @endphp
                                @endif
                                @if($measure->size == "M")
                                    @php
                                        $wM = $measure->waist;
                                        $tM = $measure->tight;
                                        $iM = $measure->inseam;
                                        $kM = $measure->knee;
                                        $lM = $measure->leg;
                                    @endphp
                                @endif
                                @if($measure->size == "L")
                                    @php
                                        $wL = $measure->waist;
                                        $tL = $measure->tight;
                                        $iL = $measure->inseam;
                                        $kL = $measure->knee;
                                        $lL = $measure->leg;
                                    @endphp
                                @endif
                                @if($measure->size == "XL")
                                    @php
                                        $wXL = $measure->waist;
                                        $tXL = $measure->tight;
                                        $iXL = $measure->inseam;
                                        $kXL = $measure->knee;
                                        $lXL = $measure->leg;
                                    @endphp
                                @endif
                            @endif
                        @endforeach

                        <div class="form-group row" >
                            <label id="measureLabel" for="size" class="col-md-4 col-form-label text-md-right" style="display: none;">
                                <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalFitGuide1"><i class="fa fa-question-circle"></i></a>
                                Measurement
                            </label>
                            <div class="col-md-8" id="measureUl">
                                <ul class="list-group">
                                    <li class="list-group-item" id="listXS" style="display: none;">
                                        <div class="form-inline">
                                            <div style="width: 30px;">
                                                <i>XS</i>
                                            </div>
                                            <input type="text" name="xsw" style="width: 70px;" value="@php if(!empty($wXS)) echo $wXS @endphp" placeholder="Waist">
                                            <input type="text" name="xst" style="width: 70px;" value="@php if(!empty($tXS)) echo $tXS @endphp" placeholder="Tight">
                                            <input type="text" name="xsi" style="width: 70px;" value="@php if(!empty($iXS)) echo $iXS @endphp" placeholder="Inseam">
                                            <input type="text" name="xsk" style="width: 70px;" value="@php if(!empty($kXS)) echo $kXS @endphp" placeholder="Knee">
                                            <input type="text" name="xsl" style="width: 70px;" value="@php if(!empty($lXS)) echo $lXS @endphp" placeholder="Leg">
                                        </div>
                                    </li>
                                    <li class="list-group-item" id="listS" style="display: none;">
                                        <div class="form-inline">
                                            <div style="width: 30px;">
                                                <i>S</i>
                                            </div> 
                                            <input type="text" name="sw" style="width: 70px;" value="@php if(!empty($wS)) echo $wS @endphp" placeholder="Waist">
                                            <input type="text" name="st" style="width: 70px;" value="@php if(!empty($tS)) echo $tS @endphp" placeholder="Tight">
                                            <input type="text" name="si" style="width: 70px;" value="@php if(!empty($iS)) echo $iS @endphp" placeholder="Inseam">
                                            <input type="text" name="sk" style="width: 70px;" value="@php if(!empty($kS)) echo $kS @endphp" placeholder="Knee">
                                            <input type="text" name="sl" style="width: 70px;" value="@php if(!empty($lS)) echo $lS @endphp" placeholder="Leg">
                                        </div>
                                    </li>
                                    <li class="list-group-item" id="listM" style="display: none;">
                                        <div class="form-inline">
                                            <div style="width: 30px;">
                                                <i>M</i>
                                            </div> 
                                            <input type="text" name="mw" style="width: 70px;" value="@php if(!empty($wM)) echo $wM @endphp" placeholder="Waist">
                                            <input type="text" name="mt" style="width: 70px;" value="@php if(!empty($tM)) echo $tM @endphp" placeholder="Tight">
                                            <input type="text" name="mi" style="width: 70px;" value="@php if(!empty($iM)) echo $iM @endphp" placeholder="Inseam">
                                            <input type="text" name="mk" style="width: 70px;" value="@php if(!empty($kM)) echo $kM @endphp" placeholder="Knee">
                                            <input type="text" name="ml" style="width: 70px;" value="@php if(!empty($lM)) echo $lM @endphp" placeholder="Leg">
                                        </div>
                                    </li>
                                    <li class="list-group-item" id="listL" style="display: none;">
                                        <div class="form-inline">
                                            <div style="width: 30px;">
                                                <i>L</i>
                                            </div>
                                            <input type="text" name="lw" style="width: 70px;" value="@php if(!empty($wL)) echo $wL @endphp" placeholder="Waist">
                                            <input type="text" name="lt" style="width: 70px;" value="@php if(!empty($tL)) echo $tL @endphp" placeholder="Tight">
                                            <input type="text" name="li" style="width: 70px;" value="@php if(!empty($iL)) echo $iL @endphp" placeholder="Inseam">
                                            <input type="text" name="lk" style="width: 70px;" value="@php if(!empty($kL)) echo $kL @endphp" placeholder="Knee">
                                            <input type="text" name="ll" style="width: 70px;" value="@php if(!empty($lL)) echo $lL @endphp" placeholder="Leg">
                                        </div>
                                    </li>
                                    <li class="list-group-item" id="listXL" style="display: none;">
                                        <div class="form-inline">
                                            <div style="width: 30px;">
                                                <i>XL</i>
                                            </div>
                                            <input type="text" name="xlw" style="width: 70px;" value="@php if(!empty($wXL)) echo $wXL @endphp" placeholder="Waist">
                                            <input type="text" name="xlt" style="width: 70px;" value="@php if(!empty($tXL)) echo $tXL @endphp" placeholder="Tight">
                                            <input type="text" name="xli" style="width: 70px;" value="@php if(!empty($iXL)) echo $iXL @endphp" placeholder="Inseam">
                                            <input type="text" name="xlk" style="width: 70px;" value="@php if(!empty($kXL)) echo $kXL @endphp" placeholder="Knee">
                                            <input type="text" name="xll" style="width: 70px;" value="@php if(!empty($lXL)) echo $lXL @endphp" placeholder="Leg">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @foreach($stocks as $stock)
                            @if($products->id == $stock->id_product)
                                @if($stock->size == "XS")
                                    @php
                                        $valXS = $stock->amount
                                    @endphp
                                @endif
                                @if($stock->size == "S")
                                    @php
                                        $valS = $stock->amount
                                    @endphp
                                @endif
                                @if($stock->size == "M")
                                    @php
                                        $valM = $stock->amount
                                    @endphp
                                @endif
                                @if($stock->size == "L")
                                    @php
                                        $valL = $stock->amount
                                    @endphp
                                @endif
                                @if($stock->size == "XL")
                                    @php
                                        $valXL = $stock->amount
                                    @endphp
                                @endif
                                @if($stock->size == "NONE")
                                    @php
                                        $valNONE = $stock->amount
                                    @endphp
                                @endif
                            @endif
                        @endforeach

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">Stock</label>

                            <div class="col-md-8" id="notNONE">
                                <div class="row">
                                    <div class="col-md-3" id="stockXS" style="display: none;">
                                        <input type="number" min="0" max="999" class="form-control" value="@php if(!empty($valXS)) echo $valXS @endphp" name="stockXS"  placeholder="Stock">
                                        <p class="text-center"><i>XS</i></p>
                                    </div>
                                    <div class="col-md-3" id="stockS" style="display: none;">
                                        <input type="number" min="0" max="999" class="form-control" value="@php if(!empty($valS)) echo $valS @endphp" name="stockS"  placeholder="Stock">
                                        <p class="text-center"><i>S</i></p>
                                    </div>
                                    <div class="col-md-3" id="stockM" style="display: none;">
                                        <input type="number" min="0" max="999" class="form-control" value="@php if(!empty($valM)) echo $valM @endphp" name="stockM"  placeholder="Stock">
                                        <p class="text-center"><i>M</i></p>
                                    </div>
                                    <div class="col-md-3" id="stockL" style="display: none;">
                                        <input type="number" min="0" max="999" class="form-control" value="@php if(!empty($valL)) echo $valL @endphp" name="stockL" placeholder="Stock" >
                                        <p class="text-center"><i>L</i></p>
                                    </div>
                                    <div class="col-md-3" id="stockXL" style="display: none;">
                                        <input  type="number" min="0" max="999" class="form-control" value="@php if(!empty($valXL)) echo $valXL @endphp" name="stockXL"  placeholder="Stock">
                                        <p class="text-center"><i>XL</i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8" id="forNONE" style="display: none;">
                                <div class="col-md-3">
                                    <input type="number" min="0" max="999" class="form-control" value="@php if(!empty($valNONE)) echo $valNONE @endphp" name="stockNONE" placeholder="StockNONE">
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">Color</label>

                            <div class="col-md-6">
                                <select class="btn  dropdown-toggle" id="color" name="color">
                                    <option value="{{$products->color}}" selected="">{{$products->color}}</option>
                    
                                    <option value="Red" style="background-color: red; color: white;">Red</option>
                                    <option value="Orange" style="background-color: orange; color: white;">Orange</option>
                                    <option value="Yellow" style="background-color: yellow; color: white;">Yellow</option>
                                    <option value="Green" style="background-color: green; color: white;">Green</option>
                                    <option value="Blue" style="background-color: blue; color: white;">Blue</option>
                                    <option value="Purple" style="background-color: purple; color: white;">Purple</option>
                                    <option value="Pink" style="background-color: pink; color: white;">Pink</option>
                                    <option value="Brown" style="background-color: brown; color: white;">Brown</option>
                                    <option value="Black" style="background-color: black; color: white;">Black</option>
                                    <option value="White" style="background-color: white; color: black;">White</option>
                                    <option value="Grey" style="background-color: grey; color: white;">Grey</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                                <select class="btn dropdown-toggle" id="gender" name="gender">

                                    @if ($products->gender == 'men')
                                    <option value="{{$products->gender}}" selected="">{{$products->gender}}</option>

                                    
                                    <option value="women">Female</option>
                                    <option value="unisex">Unisex</option>
                                    

                                    @elseif ($products->gender == 'women')
                                    <option value="{{$products->gender}}" selected="">{{$products->gender}}</option>

                                    
                                    <option value="men">Male</option>
                                    <option value="unisex">Unisex</option>

                                    @elseif ($products->gender == 'unisex')
                                    <option value="{{$products->gender}}" selected="">{{$products->gender}}</option>

                                    
                                    <option value="men">Male</option>
                                    <option value="women">Female</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                <input type="file" name="image[]" class="form-control-file" multiple="true">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        Please correct following errors:
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFitGuide1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Fit Guide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-right: auto;margin-left: auto;">
        <img src="{{url('/images/grunge/fitguide-bottom.png')}}" style="width: 100%; height: auto; max-width: 400px;">
      </div>
    </div>
  </div>
</div>

@endsection
