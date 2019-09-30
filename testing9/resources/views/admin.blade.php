@section('title','Admin')
@include('partials.header')
@include('partials.navbar')
<style>
    .alert {
        position: relative;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
    }
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
</style>
<section class="container section-sm bg-default">

        @if (Session::get('success')  )
            <div class="alert alert-success text-center" id="nalert" >
                <strong>{{Session::get('success') }}</strong>
            </div>
        @endif
            <div class="row" id="cuttab">
        <div class="col mb-3">
            @isset($restaurantArr[0])
            <div class=" card card-height">
                <div class="card-header bg-gray-7 clear-fix">
                    <div class="float-left"><h6>Restaurant List</h6></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Restaurant Name</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($restaurantArr as $item)
                                    <tr>
                                <td>{{$loop->iteration}}</td>
                                <td> {{$item->name}}</td>
                                <td> {{$item->address}}</td>
                                <td class="m-0 p-0 pt-1">
                                    <a class="btn btn-clr nbtn text-white btn-small" data-toggle="tooltip" title="Accept!" href="{{url('approve/'.$item->id)}}" >
                                        <span class="fa fa-fw fa-check fa-lg"></span>
                                    </a>
{{--                                    <button class="btn text-white btn-small" data-toggle="tooltip" title="Reject!"--}}
{{--                                            style="background-color: #dc3545;">--}}
{{--                                        <span class="fa fa-fw fa-times fa-lg"></span>--}}
{{--                                    </button>--}}
                                </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                @else
            <div>
                <h5>No details Found.</h5>
            </div>
                @endisset
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).ready(function() {
        $("#nalert").hide();
        $("#nalert").fadeTo(1600, 600).slideUp(600, function() {
            $("#nalert").slideUp(600);
        });
    });

</script>
@include('partials.footer')

