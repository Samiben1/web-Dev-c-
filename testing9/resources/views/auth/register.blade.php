@section('title','Register')
@include('partials.header')
@include('partials.navbar')
<div class="container">
    <div class="rounded mt-5" align="center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('register') }}" class="needs-validation">
                @csrf
                <div class="form-group">
                    <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name"
                           value="{{ old('name') }}" autofocus
                           placeholder="Name" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"  value="{{old('email')}}"
                           placeholder="Email" required>
                    @error('email')
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
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control " type="password" name="password_confirmation"
                           placeholder="Conform Password"
                           required>
                </div>
                <div class="form-group">
                    <textarea class="form-control @error('address') is-invalid @enderror" rows="5" name="address"
                              placeholder="Address" required>{{ old('address') }}</textarea>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="clearfix">
                    <div class="float-left">
                        <div class="form-check-inline">
                            <label class="form-check-label" for="radio1">
                                <input type="radio" class="form-check-input" name="type" value="2"
                                       {{( old('type') =='2' ? 'checked': '') }} required>Consumer
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for="radio2">
                                <input type="radio" class="form-check-input" name="type"
                                       value="1" {{old('type') =='1' ? 'checked' : '' }}>Restaurant
                            </label>
                        </div>
                        <br>
                        <div class="my-3">
                            <button type="submit" class="float-left btn font-weight-bold text-white btn-secondary"
                                    style="background-color: #6046b6">Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('partials.footer')
