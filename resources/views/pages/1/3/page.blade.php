@extends('layouts.page')

@section('title', $title)

@section('content')
    <div class="img-background">

        <div class="form-container">

            <div class="logo-mobile">
                <a href="http://on4web.pt/" target="_blank"><img class="mobile-logo"
                                                                 src="{{ asset("assets/$pathName/img/logotipo-branco.png") }}" alt="Logotipo">
                </a>
            </div>

            <div>
                <div class="social-icons">
                    <a target="_blank" class="ImgOnHover" href="https://www.facebook.com/on4web/?ref=br_rs"></a>
                    <a target="_blank" class="ImgOnHover2" href="https://www.linkedin.com/company/on4web"></a>
                </div>
                <!-- CCONTENT -->
                <h1 class="sistema-informatico">O nosso êxito <br><b>é o seu sucesso</b></h1>

            </div>
            <div>
                <div class="main">
                    <div class="main-login main-center">
                        <h2 class="novidades">Registe-se e receba um orçamento <strong>GRÁTIS!</strong></h2>
                        <form class="" role="form" action="user-register.php" method="post">

                            <div class="form-group">
                                <label for="name" type="text" name="name" class="cols-sm-2 control-label">Nome:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="nome" id="name"
                                               placeholder="Nome*" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Email:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" id="email"
                                               placeholder="Email*" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Numero:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="numero" id="email"
                                               placeholder="Telefone*" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="cols-sm-2 control-label">Empresa:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="empresa" id="name"
                                               placeholder="Empresa*" required>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="username" class="cols-sm-2 control-label">Localidade:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="localidade" id="name"
                                               placeholder="Localidade*" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="cols-sm-2 control-label">Estimativa:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="orcamento" id="name"
                                               placeholder="Estimativa de orçamento do projeto*" required>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <textarea name="descricao" class="form-control" type="textarea" id="message"
                                          style="border-radius:0;" placeholder="Descrição do Projeto*" maxlength="100"
                                          rows="3"></textarea>


                            </div>


                            <div class="form-group">
                                <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                                <div class="g-recaptcha" data-theme="light"
                                     data-sitekey="6LejtxEUAAAAABpnbocbCIYQuQloYhvUmi1DHOvA"
                                     style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                            </div>


                            <div class="form-group">
                                <button id="submit" name="submit"
                                        style="border-color:none !important; width: 100%;border-radius: 0;padding: 10px;"
                                        type="submit" name="submit" value="Submit"
                                        class="btn btn-primary btn-lg btn-block login-button">Quero Receber a Newsletter
                                </button>

                            </div>
                            <h2 class="dados-spam">Os seus dados não serão utilizados para enviar qualquer tipo de
                                SPAM</h2>
                        </form>
                    </div>
                </div>
                <div class="direitos-autor">
                    <p class="copyright">2017 © Todos os direitos reservados.</p>
                </div>
            </div>
        </div>


        <div class="logo-nossafreguesia">
            <a href="http://on4web.pt/" target="_blank"><img class="nossafreguesia-logo"
                                                             src="{{ asset("assets/$pathName/img/logotipo.png") }}" alt="Logotipo">
            </a>
        </div>
    </div>
@endsection
