@extends('layouts.page')

@section('title', $title)

@section('content')
    <div class="col-md-6 col-xs-12">
        <div class="imgntw" style="margin-left:50px; margin-top:20px;">
            <img src="{{ asset("assets/$pathName/img/logotipo.png") }}">
        </div>
        <div class="container top-buffer">
            <div style="overflow:auto;" class="none-display-mob">
                <h1 style="font-size:50px; color:#16233c; text-align:center;" class="jose-light">Somos o seu</h1>
                <h1 style="font-size:60px; text-align:center;" class="jose-semi">Parceiro Digital</h1>
            </div>

            <img class="imageresizemobile" src="{{ asset("assets/$pathName/img/imagem.png") }}">
            <div class="text-white col-md-6 col-xs-12" style="overflow:auto; margin-top: -50px">
                <p class=""><img src="{{ asset("assets/$pathName/img/bullet.png") }}" class="col-xs-1 col-md-1">O nosso objectivo é ajudar
                    os nossos clientes a melhorar os seus produtos da forma mais rentável e dinâmica possível.</img></p>
                <p class=""><img src="{{ asset("assets/$pathName/img/bullet.png") }}" class="col-xs-1 col-md-1">O nosso conhecimento é
                    baseado nas mais recentes e eficazes tácticas de web e software.                   baseado nas mais recentes e eficazes tácticas de web e software.</p>
                </p>
                <p class=""><img src="{{ asset("assets/$pathName/img/bullet.png") }}" class="col-xs-1 col-md-1">Juntamente com a nossa
                    equipa jovem e multidisciplinar, a NTW apresenta-se como uma empresa capaz de lhe oferecer todas as
                    ferramentas que necessita para alcançar os seus objectivos. </img></p>

            </div>
        </div>
    </div>

    <div style="padding-left: 100px;" class="none-l-padd col-md-6 col-xs-12">
        <div class="container">
            <div class="col-md-5">
                <div style="overflow:auto;" class="none-display-desk">
                    <h1 style="font-size:50px; color:#16233c; text-align:right;" class="jose-light">Somos o seu</h1>
                    <h1 style="font-size:60px; text-align:right;" class="jose-semi">Parceiro Digital</h1>
                </div>
                <div class="form-area">
                    <form action="submitForm" method="post">
                        <br>
                        <h3 class="jose-semi" style="text-align: center; font-size:22px;"> Registe-se e receba um
                            orçamento GRÁTIS!</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" style="border-radius:0;" value=""
                                   name="name" placeholder="Nome*" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" style="border-radius:0;" id="email"
                                   value="" name="email" placeholder="Email*" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="phone" style="border-radius:0;" name="numero"
                                   value="" placeholder="Numero de Telefone*" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="subject" style="border-radius:0;" name="empresa"
                                   value="" placeholder="Empresa*" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="subject" style="border-radius:0;"
                                   name="orcamento"
                                   placeholder="Estimativa de Orçamento no Projeto*" required>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" type="textarea" id="message" style="border-radius:0;"
                                      name="descricao"
                                      placeholder="Descrição do Projeto*" maxlength="140" rows="7"></textarea>

                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-theme="light"
                                 data-sitekey="6Ld9eBAUAAAAAOzdcttKX6VxtymFG7euRHs8FKtG"
                                 style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                        </div>
                        <button id="submit" name="submit" style="width: 100%;
    border-radius: 0;
    padding: 10px;" class="btn btn-primary pull-right" type="submit" value="Submit">Submit Form
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="text-center-mob">
        <div class="col-md-8 col-xs-12" style="padding-top:50px;">
            <img src="{{ asset("assets/$pathName/img/alentejo2020.png") }}">
            <img src="{{ asset("assets/$pathName/img/portugal2020.png") }}">
            <img src="{{ asset("assets/$pathName/img/uniao-europeia.png") }}">
            <img src="{{ asset("assets/$pathName/img/startup-lisboa.png") }}">
            <img src="{{ asset("assets/$pathName/img/microsoft.png") }}">
        </div>
    </div>

    <div class="text-center-mob col-md-3 col-xs-12">
        <p style="padding-top:60px;">2017 © Todos os direitos reservados</p>
    </div>
@endsection