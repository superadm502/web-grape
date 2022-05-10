@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($loginUfsc)
                    <div class="card text-center">
                        <div class="card-header">
                            <h5 class="card-title">Agendamento de refeição automático diário</h5>
                        </div>
                        <p class="card-text m-3">
                            Selecione os dias da semana em que deve ser feito o agendamento
                        </p>
                        <form method="POST" action="{{ route('weekdays-update') }}">
                            <div class="card-body">
                                @csrf
                                <div class="row justify-content-md-center">
                                    <div class="col-md-10 mb-2">
                                        <select name="week_days[]" style="width: 100%" multiple multiple
                                            multiselect-max-items="8" multiselect-hide-x="true">
                                            @foreach ($weekDays as $day)
                                                <option value="{{ $day->id }}"
                                                    {{ in_array($day->id, $userWeekDays ?? []) ? 'selected="selected"' : '' }}>
                                                    {{ $day->week_day }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 align-self-center">
                                        <button type="submit" class="btn btn-info">
                                            {{ __('Salvar') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

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

@section('script')
    <script type="text/javascript" src="/js/multiselect-dropdown.js"></script>
@endsection
