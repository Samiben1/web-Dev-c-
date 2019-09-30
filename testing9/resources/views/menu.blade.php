@section('title','Order')
@include('partials.header')
@include('partials.navbar')
<style>
    @media (min-width: 992px) {
        .product {
            height: 320px !important;
        }
    }
    img {
        width: 161px !important;
        height: 162px !important;
    }
</style>
<section class="section section-first bg-default section-style-2 text-md-left mt-1">

        <div class="container">
            <div class="row row-50">
                <div class="col-lg-10">
                    <ul class="list-xl box-typography">
                        <li>
                            <h3>{{$restaurantArr->name}}</h3>
                            <p>{{$restaurantArr->address}}</p>
                        </li>
                    </ul>
                </div>
            </div>
            @isset($dishArr[0])
            <section class="section mt-5 bg-default">
                <h3 class="oh-desktop">
                    <span class="d-inline-block wow slideInUp">Our Dishes</span></h3>
                <div class="row row-lg">
                    @foreach($dishArr as $item)
                        <div class="col-xl-2 col-offset-1 pt-2">
                            <!-- Product-->
                            <article class="product wow fadeInUp" data-wow-delay=".15s">
                                <div class="product-figure">
                                    <img src="{{url(isset($item->d_photo)?($item->d_photo):'uploads/no-preview.jpg' )}}" alt="photo"/>
                                </div>
                                <h6 class="product-title"> {{$item->d_name}}</h6>
                                <div class="product-price-wrap">
                                    <div class="product-price">${{$item->d_prise}}</div>
                                </div>
                                <div class="product-button">
                                    <div class="button-wrap">
                                        @guest
                                            @php
                                                $id = 0;
                                            @endphp
                                        @endguest
                                        @auth
                                            @php
                                                $id =  Auth::user()->id;
                                            @endphp
                                        @endauth
                                        <a class="button button-xs button-primary button-winona" href="{{url('/addcart/'.$id.'/'.$restaurantArr['id'].'/'.$item->id)}}">Add to
                                            cart</a></div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="container">
                    <ul class="pagination justify-content-end">
{{--                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Previous</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>--}}
{{--                    <li class="page-item active"><a class="page-link" href="#">Next</a></li>--}}
                        {{$dishArr->links()}}
                    </ul>
                </div>
            </section>
        </div>
    @else
        <div class="mt-4" align="center">
            <h5>No details Found.</h5>
        </div>
    @endisset
</section>
@include('partials.footer')
