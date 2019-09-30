@section('title','Dishes')
@include('partials.header')
@include('partials.navbar')

<section class="container section-sm bg-default">
    @if (Session::get('success') )
        <div class="alert alert-success text-center" id="nalert">
            <strong>{{Session::get('success') }}</strong>
        </div>
    @endif
        @if (Auth::user()->is_approve == null)
            <div class="alert alert-danger text-center" >
                <strong>Your restaurant is not approved.</strong>
            </div>
        @endif
        <div class="row" id="cuttab">
            <div class="col mb-3">
                <div class=" card card-height">
                    <div class="card-header bg-gray-7 clear-fix">
                        <div class="float-left"><h6>Dishes List</h6></div>
                        <div class="float-right">
                            <button class="btn btn-clr btn-small text-white" data-toggle="modal"
                                    @if (Auth::user()->is_approve == null)
                                        disabled
                                    @endif
                                    data-target="#addDishModal">Add Dish
                            </button>
                        </div>
                    </div>
                    @isset($dishArr[0])
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Dish Name</th>
                                    <th>Prise</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dishArr as $item)
                                    <tr>
                                        <td> {{$loop->iteration}}</td>
                                        <td> {{$item->d_name}}</td>
                                        <td> ${{$item->d_prise}}</td>
                                        <td>
                                            @isset($item->d_photo)
                                                <img src="{{url('/'.$item->d_photo)}}" alt="photo" width="50vw"
                                                     height="45vw">
                                            @endisset
                                        </td>
                                        <td class="m-0 p-0 pt-1">
                                            <button class="btn btn-group-sm btn-clr m-0 nbtn text-white btn-small n" data-id="{{$item->id}}"
                                                    data-toggle="modal" data-target="#updateDishModal">
                                                <span class="fa fa-fw  fa-pencil fa-lg"></span>
                                            </button>
                                            <button class="btn btn-group-sm  m-0 nbtn text-white btn-small n"
                                                    data-toggle="modal" data-target="#deleteModal"  data-id="{{$item->id}}"
                                                    style="background-color: #dc3545;">
                                                <span class="fa fa-fw fa-trash fa-lg"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="my-4">
            <h5>No details Found.</h5>
        </div>
    @endisset
</section>

<!-- Add Dish Modal-->
<div class="modal fade" id="addDishModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title">Add Dish</h2>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    <div class="rounded nb">
                        <div class="col-md">
                            <form method="POST" action="{{url('dishadd')}}" class="needs-validation"
                                  id="addform" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="id" name="restaurant_id" value="{{Auth::user()->id}}">
                                <div class="form-group">
                                    <input class="form-control " type="text" name="d_name"
                                           placeholder="Dish Name" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control " type="text" name="d_prise" placeholder="Prise" required pattern="[0-9]+">
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="d_photo" id="nfile"
                                           accept="image/*">
                                    <label class="custom-file-label p-3" for="customFile" onclick="event.preventDefault();
                                                     document.getElementById('nfile').click();">Choose file</label>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-group-sm btn-clr m-0 nbtn text-white ">Submit</button>
                <button type="button" class="btn btn-danger font-weight-bold px-5" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Update Dish Modal-->
<div class="modal fade" id="updateDishModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title">Update Dish</h2>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    <div class="rounded nb">
                        <div class="col-md">
                            <form method="POST" action="{{url('dishadd')}}" class="needs-validation"
                                  id="addform" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="id" name="id">
                                <input type="hidden" class="id" name="restaurant_id" value="{{Auth::user()->id}}">
                                <div class="form-group">
                                    <input class="form-control d_name" type="text" name="d_name"
                                           placeholder="Dish Name" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control d_prise" type="text" name="d_prise" placeholder="Prise" required pattern="[0-9]+">
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="d_photo" id="nfile"
                                           accept="image/*">
                                    <label class="custom-file-label p-3" for="customFile" onclick="event.preventDefault();
                                                     document.getElementById('nfile').click();">Choose file</label>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-group-sm btn-clr m-0 nbtn text-white ">Submit</button>
                <button type="button" class="btn btn-danger font-weight-bold px-5" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- The Dish Delete Model-->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Delete Dish</h3>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    <div class="rounded nb">
                        <div class="col-md">
                            <form action="{{url('/dishdel')}}" method="POST" class="needs-validation"
                                 id="form">
                                @csrf
                                <div class=" form-group">
                                    Select "Delete" below if you are ready to want to delete this Dish
                                    <span class="text-capitalize font-weight-bold" id="d_name"></span>.
                                    <input class="id" type="hidden" name="id">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="px-5 font-weight-bold text-white btn bg-danger"
                        style="background-color: #dc3545">Delete
                </button>
                <button type="button" class="btn btn-secondary font-weight-bold px-5" data-dismiss="modal">Close
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
   $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@include('partials.footer')
