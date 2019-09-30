@section('title','Restaurent')
@include('partials.header')
@include('partials.navbar')
<section class="container section-sm bg-default">
    @if (Auth::user()->is_approve == null)
        <div class="alert alert-danger text-center">
            <strong>Your restaurant is not approved.</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-3 col-sm-6 my-1 ">
            <div class="card bg-gray-7">
                <div class="card-body">
                    <div class="card-body-icon clearfix">
                        <h5>Total Earning</h5>
                    </div>
                    <div class="mt-4 float-right">
                        <strong style="font-size: 2rem">${{$sum['total']}}</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 my-1 ">
            <div class="card bg-gray-7">
                <div class="card-body">
                    <div class="card-body-icon clearfix">
                        <h5>Last 12 Weeks</h5>
                    </div>
                    <div class="mt-4 float-right">
                        <strong style="font-size: 2rem">${{ $sum['last12']}}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($sumArr as $key => $item)
            <div class="col-xl-3 col-sm-6 my-1">
                <div class="card bg-gray-7">
                    <div class="card-body">
                        <div class="card-body-icon clearfix">
                            <h5>Last {{$key + 1}} Week</h5>
                        </div>
                        <div class="mt-4 float-right">
                            <strong style="font-size: 2rem">${{$item}}</strong>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@include('partials.footer')
