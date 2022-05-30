@extends('layouts.app')

@section('css')
    <style>
        ul {
            list-style: none;
            /* margin: 5px 20px; */
        }

        li {
            /* margin: 10px 0; */
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 row justify-content-center text-center">
                <h2 class="col-3" style="color: purple" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Usuários autenticados">{{ count($loginsUfsc) }}</h2>
            </div>
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
                                    <div class="col-md-10">
                                        <div>
                                            <ul>
                                                @foreach ($weekDays as $day)
                                                    <li>
                                                        <div class="form-check form-switch text-start mb-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="{{ $day->id }}" name="week_days[]"
                                                                {{ $userWeekDays[$day->id] ?? null ? 'checked="checked"' : '' }}>
                                                            <label class="form-check-label">
                                                                {{ $day->week_day }}
                                                            </label>
                                                        </div>

                                                        <ul>
                                                            <li>
                                                                <div class="row">
                                                                    <div class="form-check text-start col-md-6">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="{{ $day->id }}" name="launch[]"
                                                                            {{ $userWeekDays[$day->id]['launch'] ?? null ? 'checked="checked"' : '' }}>
                                                                        <label class="form-check-label">Almoço</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <select class="form-select col-mb-6"
                                                                            name="launchHours[{{ $day->id }}]">
                                                                            @foreach ($launchHours as $hour)
                                                                                <option value="{{ $hour->id }}"
                                                                                    {{ ($userWeekDays[$day->id]['launch_hour_id'] ?? null) == $hour->id ? 'selected="selected"' : '' }}>
                                                                                    {{ $hour->hour }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="row">
                                                                    <div class="form-check text-start col-md-6">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="{{ $day->id }}" name="dinner[]"
                                                                            {{ $userWeekDays[$day->id]['dinner'] ?? null ? 'checked="checked"' : '' }}>
                                                                        <label class="form-check-label">Janta</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <select class="form-select col-md-6"
                                                                            name="dinnerHours[{{ $day->id }}]">
                                                                            @foreach ($dinnerHours as $hour)
                                                                                <option value="{{ $hour->id }}"
                                                                                    {{ ($userWeekDays[$day->id]['dinner_hour_id'] ?? null) == $hour->id ? 'selected="selected"' : '' }}>
                                                                                    {{ $hour->hour }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="col-md-12 align-self-center">
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        // var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        //     return new bootstrap.Tooltip(tooltipTriggerEl)
        // })

        // $('input[type="checkbox"]').change(function(e) {
        //     var checked = $(this).prop("checked"),
        //         container = $(this).parent().parent(),
        //         siblings = container.siblings();

        //     container.find('input[type="checkbox"]').prop({
        //         checked: checked
        //     });

        //     function checkSiblings(el) {
        //         var parent = el.parent().parent(),
        //             all = true;
        //             // .children('#form-check')
        //         console.log(el.parent().parent(), $(this).children('input[type="checkbox"]'))
        //         el.siblings().each(function() {
        //             let returnValue = all = ($(this).parent().children('input[type="checkbox"]').prop("checked") ===
        //                 checked);
        //             return returnValue;
        //         });
        //         if (all && checked) {
        //             parent.children('input[type="checkbox"]').prop({
        //                 checked: checked
        //             });
        //             checkSiblings(parent);
        //         } else if (all && !checked) {
        //             parent.children('input[type="checkbox"]').prop("checked", checked);
        //             checkSiblings(parent);
        //         } else {
        //             el.parents("li").children('input[type="checkbox"]').prop({
        //                 checked: true
        //             });
        //         }
        //     }
        //     checkSiblings(container);
        // });
    </script>
@endsection
