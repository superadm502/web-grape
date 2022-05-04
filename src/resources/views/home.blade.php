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
                            <div class="alert alert-success col-md-8" role="alert">
                                Ativo
                            </div>
                          <p class="card-text">Para desabilitar remova o seu registro de autenticação</p>
                        </div>
                      </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        {{ __('Realize sua autenticação da UFSC para liberar os serviços') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
