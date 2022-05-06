@extends('layouts.start')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card-body mt-5" style="height: 100%">
                    <div class="flex justify-content-center align-items-center">
                        {{-- <img class="img-responsive" style="width:25%" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Grape-symbol-logo.svg/1200px-Grape-symbol-logo.svg.png"/> --}}
                        <h1 class="display-1 text-center" style="color: purple">Grape</h1>
                        <p class="display-6 text-center">Auxiliar e dinamizar sua vida universitária. Novos serviços estão
                            por vir...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div class="alert alert-secondary col-md-12" role="alert">
                        <p class="card-text text-center">Com dúvidas sobre o serviço e a sua segurança? Acesse nossa <a href="{{route('faq')}}">página
                            de
                            dúvidas frequentes</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
