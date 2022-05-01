@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($loginUfsc)
                    <div class="card">
                        <div class="card-header">Agendamento de refeição automático</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="alert alert-success" role="alert">
                                Ativado
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        {{ __('Realize a autenticação da UFSC') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
