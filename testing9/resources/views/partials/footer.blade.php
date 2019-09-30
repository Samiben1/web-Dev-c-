</div>
<!-- Cart Modal-->
<div class="modal fade" id="cartModal" style="z-index: 1000;">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cart</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    @isset($cartArr[0])
                        <div class="rounded nb">
                            <div class="col-md">
                                <table>
                                    @foreach($cartArr as $item)
                                        <tr>
                                            <td width="70%">{{$item->d_name}}</td>
                                            <td width="20%">${{$item->d_prise}}</td>
                                            <td>
                                                <a class="btn text-white btn-small" data-toggle="tooltip"
                                                   title="Remove!" href="{{url('remove/'.$item->cart_id)}}"
                                                   style="background-color: #dc3545;">
                                                    <span class="fa fa-fw fa-times fa-lg"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th>Total:</th>
                                        <th> ${{$cartArrsum}}</th>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="rounded nb">
                            <div class="col-md">
                                <p>No items in cart.</p>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                @isset($cartArr[0])
                    <button type="submit" class="btn font-weight-bold btn-clr">
                        <a class="text-white" href="{{url('order/'.Auth::user()->id)}}">Order</a>
                    </button>
                @endisset
                <button type="button" class="btn btn-danger font-weight-bold "
                        data-dismiss="modal">Close
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Javascript-->
<script src="{{asset('js/customeJs.js')}}"></script>
<script src="{{asset('js/core.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
