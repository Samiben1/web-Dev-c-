@section('title','Home')
@include('partials.header')
@include('partials.navbar')
<style>
    img {
        height: 236px !important;
    }
</style>
<section class="section section-lg section-bottom-md-70 bg-default">
    <div class="container">
        <h3 class="oh">
            <span class="d-inline-block wow slideInUp" data-wow-delay="0s">Restaurant Near You</span>
        </h3>
        <div class="row row-lg row-40 justify-content-center">
        @isset($restaurant[0])
            @foreach($restaurant as $item)
                <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1s">
                    <!-- Team Modern-->
                    <article class="team-modern">
                        <a class="team-modern-figure" href="{{url('select_order/'.$item->id)}}">
                            <img src="{{url(isset($item->photo)?($item->photo):'uploads/no-preview.jpg' )}}"
                                 alt="photo" width="270" height="236"/>
                        </a>
                        <div class="team-modern-caption">
                            <h6 class="team-modern-name">
                                <a href="{{url('select_order/'.$item->id)}}">{{$item->name}}</a>
                            </h6>
                            <ul class="list-inline team-modern-social-list text-center">
                                <li>
                                    <a class="icon px-5 py-2" style="display: inline"
                                       href="{{url('select_order/'.$item->id)}}">View</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        @else
            <div>
                <h5>No details Found.</h5>
            </div>
        @endisset
    </div>
</section>
</div>
@include('partials.footer')
