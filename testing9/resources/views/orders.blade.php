@section('title','Orders')
@include('partials.header')
@include('partials.navbar')

<section class="container section-sm bg-default">
    @if (Auth::user()->is_approve == null)
        <div class="alert alert-danger text-center" >
            <strong>Your restaurant is not approved.</strong>
        </div>
    @endif
    <div class="row" id="cuttab">
        <div class="col mb-3">
            <div class=" card card-height">
                <div class="card-header bg-gray-7 clear-fix">
                    <div class="float-left"><h6>Orders</h6></div>
                </div>
                @isset($orderArr[0])
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>User Name</th>
                                <th>Address</th>
                                <th>Dish Name</th>
                                <th>Prise</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderArr as $item)
                            <tr>
                                <td> {{$loop->iteration}}</td>
                                <td> {{$item->name}}</td>
                                <td> {{$item->address}}</td>
                                <td> {{$item->d_name}}</td>
                                <td> ${{$item->d_prise}}</td>
                                <td> {{$item->date}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="my-4">
                <h5>No details Found.</h5>
            </div>
        @endisset
    </div>
</section>

@include('partials.footer')
