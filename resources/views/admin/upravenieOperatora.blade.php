@extends('admin-header')

@section('adminContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
              </div>
              @endif
                <div class="card-header">Upravenie operátora {{$operator->login}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route("operator.update",["$operator->id"]) }}">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Login') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="login" type="text" maxlength="35" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') ?: $operator->login }}" required autocomplete="login" autofocus>

                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nové heslo') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" minlength="8" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="zadajte heslo" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Zopakujte nové heslo') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" minlength="8" class="form-control" name="password_confirmation" placeholder="zopakujte heslo" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upraviť operátora') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
