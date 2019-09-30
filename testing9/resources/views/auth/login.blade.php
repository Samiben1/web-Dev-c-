@section('title','Login')
@include('partials.header')
@include('partials.navbar')
<div class="container">
    <div class="rounded mt-5" align="center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('login') }}" class="needs-validation">
                @csrf
                <div class="form-group">
                    <input class="form-control  @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email')}}"
                           placeholder="Email" required autofocus>
                    @error('email')
                    <script type="text/javascript">
                        $(window).on('load', function () {
                            $('#loginModal').modal('show');
                        });
                    </script>
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                           placeholder="Password"
                           required>
                    @error('password')
                    <script type="text/javascript">
                        $(window).on('load', function () {
                            $('#loginModal').modal('show');
                        });
                    </script>
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="clearfix">
                    <div class="float-left">
                    <button type="submit" class="float-left btn font-weight-bold text-white btn-secondary"
                            style="background-color: #6046b6">Submit
                    </button>
                    </div>
                    <p class="float-left mt-4">&nbsp;&nbsp;Don't have account?<a href="{{route('register')}}">&nbsp;Click here to register.</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@include('partials.footer')
