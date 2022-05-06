@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($loginUfsc)
                    <div class="card text-center">
                        <div class="card-header">
                            Agendamento de refeição automático diário
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="alert alert-success col-md-6" role="alert">
                                O serviço está ativo
                            </div>
                            <p class="card-text">OBS: Para desabilitar o serviço remova o seu registro de Autenticação</p>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        {{ __('Realize sua autenticação da UFSC para liberar os serviços') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
