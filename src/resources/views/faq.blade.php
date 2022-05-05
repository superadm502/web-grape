@extends('layouts.app')

@section('content')
    <div class="container">
        <section>
            <h3 class="text-center mb-4 pb-2 text-primary fw-bold">FAQ</h3>
            <p class="text-center mb-5">
                Respostas para as mais frequentes dúvidas
            </p>

            <div class="row">
                <div class="col-md-6 col-lg-6 mb-6">
                    <h6 class="mb-3 text-primary">É seguro?</h6>
                    <p>
                        <strong>Mas é claro!</strong> A estrutura do sistema foi construída com o objetivo de garantir a segurança 
                        dos seus dados.
                    </p>
                    <p>
                        Todos os dados sensíveis são criptogrados com uma chave secreta que apenas o servidor e a conta de administrador tem acesso.
                        A senha do administrador é composta em partes por 3 dos nossos membros. Sendo assim, é necessário a aprovação, além da constante vigília, dos mesmos para acessar
                        a conta de administrador e realizar as mudanças pertinentes sem expor ou mudar algo crítico.
                    </p>
                    <p>
                        Nós, membros da Grape, individualmente teremos apenas as permissões mínimas no projeto para realizar o desenvolvimento e as manutenções em geral.
                    </p>
                </div>

                <div class="col-md-6 col-lg-6 mb-6">
                    <h6 class="mb-3 text-primary">E o código fonte?</h6>
                    <p>
                        <a href="https://github.com/superadm502/web-grape" style="color: #000"><strong><u>https://github.com/superadm502/web-grape</u></strong></a>
                        O repositório do projeto é público para que qualquer um possa acompanhar o desenvolvimento do sistema 
                        e verificar se estamos fazendo o que realmente é dito. 
                        Caso queira reaproveitar algo do código fonte se atente as licenças e direitos autorais presentes no mesmo.
                    </p>
                    <p>
                        Importante ressaltar que as mudanças realizadas no código devem ser obrigatoriamente
                        aprovadas pela maioria dos membros/colaboradores presentes no repositório, para então chegar no servidor.
                    </p>
                </div>

                <div class="col-md-6 col-lg-6 mb-6">
                    <h6 class="mb-3 text-primary">Como entrar em contato?</h6>
                    <p>
                        <strong>Wpp:</strong> (47)99762-6546
                    </p>
                    <p>
                        <strong>E-mail:</strong> msubetir@gmail.com
                    </p>
                </div>

               
            </div>
        </section>
    </div>
@endsection
