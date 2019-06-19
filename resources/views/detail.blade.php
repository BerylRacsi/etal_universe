@extends('master')

@section('navbar')

    <div class="container-menu-desktop trans-03 p-t-30">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>
    
@endsection

@section('content')

<!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-75 p-b-60">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6 col-lg-7 p-tb-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @foreach (explode(',', $products->image) as $mboh)
                                    <div class="item-slick3" >
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ url('/',$mboh) }}" alt="IMG-PRODUCT" style="width: 100%; height: auto; max-width: 400px; margin-right: auto; margin-left: auto;">

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
                    
                <div class="col-md-6 col-lg-5 p-tb-30">
                    <div class="p-r-50 p-lr-0-lg">
                        <h4 class="mtext-105 cl3 js-name-detail p-b-14">
                            {{$products->name}}
                        </h4>

                        <span class="mtext-106 cl3">
                            Rp.
                                @php
                                    echo (number_format($products->price).".00");
                                @endphp
                        </span>
                        <hr>
                        <div class="size-204 respon6-next">
                            <div class="rs1-select2 bor8 bg0">
                                <select id="select-detail" class="js-select2 stext-107 size-select2" name="time">
                                    <option disabled selected>Select Size</option>
                                    @if ($products->xs == 1)
                                        <option value="1">Size XS</option> 
                                    @endif
                                    @if ($products->s == 1)
                                        <option value="2">Size S</option>
                                    @endif
                                    @if ($products->m == 1)
                                        <option value="3">Size M</option>
                                    @endif
                                    @if ($products->l == 1)
                                        <option value="4">Size L</option> 
                                    @endif
                                    @if ($products->xl == 1)
                                        <option value="5">Size XL</option>
                                    @endif
                                    @if ($products->none == 1)
                                        <option value="6" selected>NONE</option>
                                    @endif
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>

                        <div class="respon6-next">
                            <div style="float: left;">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input id="qty-detail" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button data-id="{{$products->id}}" class="add-to-cart-detail m-tb-10 stext-101 cl0 size-101 bg9 bor1 hov-btn1 p-lr-15 trans-04">
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>{{-- Right Column --}}
            </div>{{--Row--}}

            <div class="bor10 m-t-10 p-t-20 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs p-t-20" role="tablist">
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
                    <div class="tab-content p-t-20">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6 text-center">
                                    {{$products->description}}
                                </p>
                            </div>
                        </div>

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

                    </div> {{-- Tab-Content --}}
                </div> {{-- Tab-01 --}}
            </div> {{-- Tab-Border --}}
        </div>{{--Container--}}
    </section>

<!-- Modal Bottom-->
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
    