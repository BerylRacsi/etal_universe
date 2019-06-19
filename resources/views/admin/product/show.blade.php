@extends('admin.master')

@section('content')
        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    @foreach (explode(',', $products->image) as $mboh)
                                    <div class="item-slick3" data-thumb="{{ url('/',$mboh) }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ url('/',$mboh) }}" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ url('/',$mboh) }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl3 js-name-detail p-b-14">
                                {{$products->name}}
                            </h4>

                            <span class="mtext-106 cl3" data-type="currency">
                                Rp. 
                                @php
                                    echo number_format($products->price);
                                @endphp
                            </span>
                            <br>
                            <br>
                            <table class="table">
                              
                              <tbody>
                                <tr>
                                  <th scope="row">Brand</th>
                                  <td>{{$products->brand}}</td>
                                </tr>
                                <tr>
                                  <th scope="row">Category</th>
                                  <td>{{$products->category}}</td>
                                </tr>
                                <tr>
                                  <th scope="row">Available Size</th>
                                  <td>
                                    @if ($products->xs == 1)
                                        <strong style="text-align:left;">
                                            XS
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "XS")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                        <br>
                                    @endif
                                    @if ($products->s == 1)
                                        <strong style="text-align:left;">
                                            S
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "S")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                        <br>
                                    @endif
                                    @if ($products->m == 1)
                                        <strong style="text-align:left;">
                                            M
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "M")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                        <br>
                                    @endif
                                    @if ($products->l == 1)
                                        <strong style="text-align:left;">
                                            L
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "L")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                        <br>
                                    @endif
                                    @if ($products->xl == 1)
                                        <strong style="text-align:left;">
                                            XL
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "XL")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                        <br>
                                    @endif
                                    @if ($products->none == 1)
                                        <strong style="text-align:left;">
                                            NONE
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "NONE")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                    @endif
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">Color</th>
                                  <td>{{$products->color}}</td>
                                </tr>
                                <tr>
                                  <th scope="row">Gender</th>
                                  <td>{{$products->gender}}</td>
                                </tr>
                              </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                        </li>
                        @if($products->category == "bottom")
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#information-bottom" role="tab">Additional information</a>
                        </li>
                        @endif
                        @if($products->category == "top")
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#information-top" role="tab">Additional information</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 text-center cl6">
                                    {{$products->description}}
                                </p>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="information-bottom" role="tabpanel">
                            <div class="row" >
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <button class="btn btn-outline-info btn-lg" data-toggle="modal" data-target="#modalFitGuide1" style="margin: 0 auto; display: block;">Fit Guide</button><br>
                                    <table class="table table-striped table-light text-center table-fixed table-responsive">
                                        <thead>
                                            <tr>
                                                <td width="20%"><strong>Size</strong></td>
                                                <td width="16%"><strong>Waist</strong></td>
                                                <td width="16%"><strong>Tight</strong></td>
                                                <td width="16%"><strong>Inseam</strong></td>
                                                <td width="16%"><strong>Knee</strong></td>
                                                <td width="16%"><strong>Leg Opening</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($measures as $measure)
                                            <tr>
                                                <td>{{$measure->size}}</td>
                                                <td>{{$measure->waist}}</td>
                                                <td>{{$measure->tight}}</td>
                                                <td>{{$measure->inseam}}</td>
                                                <td>{{$measure->knee}}</td>
                                                <td>{{$measure->leg}}</td>
                                            </tr>
                                            @endforeach
                                      </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="information-top" role="tabpanel">
                            <div class="row" >
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <button class="btn btn-outline-info btn-lg" data-toggle="modal" data-target="#modalFitGuide2" style="margin: 0 auto; display: block;">Fit Guide</button><br>
                                    <table class="table table-striped table-light text-center table-fixed table-responsive">
                                        <thead>
                                            <tr>
                                                <td width=""><strong>Size</strong></td>
                                                <td width=""><strong>Lebar Bahu</strong></td>
                                                <td width=""><strong>Panjang Badan</strong></td>
                                                <td width=""><strong>Lebar Dada</strong></td>
                                                <td width=""><strong>Lingkar Leher</strong></td>
                                                <td width=""><strong>Lingkar Lengan</strong></td>
                                                <td width=""><strong>Panjang Lengan</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>S</td>
                                                <td>50</td>
                                                <td>69</td>
                                                <td>47</td>
                                                <td>49</td>
                                                <td>32</td>
                                                <td>21</td>
                                            </tr>
                                            <tr>
                                                <td>M</td>
                                                <td>52</td>
                                                <td>72</td>
                                                <td>50</td>
                                                <td>50</td>
                                                <td>34</td>
                                                <td>22</td>
                                            </tr>
                                            <tr>
                                                <td>L</td>
                                                <td>54</td>
                                                <td>75</td>
                                                <td>53</td>
                                                <td>51</td>
                                                <td>36</td>
                                                <td>23</td>
                                            </tr>
                                            <tr>
                                                <td>XL</td>
                                                <td>56</td>
                                                <td>78</td>
                                                <td>56</td>
                                                <td>52</td>
                                                <td>38</td>
                                                <td>24</td>
                                            </tr>
                                      </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
<!-- Modal Bottom -->
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

<!-- Modal Top-->
<div class="modal fade" id="modalFitGuide2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Fit Guide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin-right: auto;margin-left: auto;">
                <img src="{{url('/images/grunge/fitguide-top.png')}}" style="width: 100%; height: auto; max-width: 400px;">
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
    
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendor/MagnificPopup/magnific-popup.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
@endpush

@push('scripts')

    <script src="{{asset('vendor/jquery2/jquery-3.2.1.min.js')}}"></script>

    <script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>

    <script src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('js/slick-custom.js')}}"></script>

    <script src="{{asset('vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled:true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>    

    <script src="{{asset('js/main.js')}}"></script>

@endpush