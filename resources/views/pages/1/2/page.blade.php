@extends('layouts.page')

@section('title', $title)


@section('content')
    <div class="img-background resizeToScreen">
        <div class="form-container">
            <div class="logo-mobile">
                <a href="http://nossafreguesia.pt" target="_blank">
                    <img src="{{ asset("assets/$pathName/img/logotipo.png") }}" class="mobile-logo">
                </a>
            </div>

            <div>
                <div class="social-icons">
                    <a target="_blank" class="ImgOnHover"
                       href="https://www.facebook.com/Nossa-Freguesia-1805938432991346/"></a>
                    <a target="_blank" class="ImgOnHover2" href="https://www.linkedin.com/company/nossa-freguesia"></a>
                </div>
                <!-- CCONTENT -->
                <h1 class="sistema-informatico">Sistema Informático</h1>
                <div class="icon-1">
                    <a class="img-icon-1 ImgOnHover3"></a>
                    <h2 class="gestao-territorio">Gestão de território que permite uma gestão de
                        toda a área geográfica.</h2>
                </div>
                <div class="icon-2">
                    <a class="img-icon-2 ImgOnHover4"></a>
                    <h2 class="gestao-territorio">Identifica ocorrências ou pontos de interesse, locais
                        ou eventos que ai ocorram ou estejam a decorrer.</h2>
                </div>
            </div>
            <div>
                <div class="main">
                    <div class="main-login main-center">
                        <h2 class="novidades">Registe-se e receba as nossas <strong>Novidades!</strong></h2>
                        <form class="" role="form" action="user-register.php" method="post">

                            <div class="form-group">
                                <label for="name" type="text" name="name"
                                       class="cols-sm-2 control-label">Nome:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="Nome*" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email"
                                       class="cols-sm-2 control-label">Email:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" id="email"
                                               placeholder="Email*" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username"  class="cols-sm-2 control-label">Localidade:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="localidade" id="name"
                                               placeholder="Localidade*" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password"  class="cols-sm-2 control-label">Freguesia:</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="freguesia" id="password"
                                               placeholder="Freguesia*" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="padding-top:5px;">
                                <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                                <div class="g-recaptcha" data-theme="light"
                                     data-sitekey="6LdWDxIUAAAAAI2TKQmIgiiRh96Zl-9peF1khp98"
                                     style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                            </div>

                            <div class="form-group">
                                <button id="submit" name="submit" style="width: 100%;border-radius: 0;padding: 10px;"
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
                    <p class="copyright">2017 © Todos os direitos reservados. Desenvolvido
                        por <img src="{{ asset("assets/$pathName/img/logo_rightco.png") }}" class="img-rightco">
                </div>
            </div>
        </div>

        <div class="logo-nossafreguesia">
            <a href="http://nossafreguesia.pt"
               target="_blank"><img src="{{ asset("assets/$pathName/img/logotipo.png") }}" class="nossafreguesia-logo">
            </a>
        </div>
    </div>
@endsection