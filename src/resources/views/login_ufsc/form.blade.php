@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Sistema de Autenticação Centralizada</h4>
                    <p class="category">Formulário</p>
                </div>

                <div class="card-body">
                    @if (!$loginUfsc)
                        <form method="POST" action="{{ route('login_ufsc_store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="enrollment" class="col-md-2 col-form-label text-md-end">{{ __('Matrícula') }}</label>

                                <div class="col-md-8">
                                    <input id="enrollment" type="text" class="form-control @error('enrollment') is-invalid @enderror" name="enrollment" value="{{ old('enrollment') }}" required autocomplete="enrollment" autofocus>

                                    @error('enrollment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-2 col-form-label text-md-end">{{ __('Senha') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form method="POST" action="/login_ufsc/form/{{$loginUfsc->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Apagar registro') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
