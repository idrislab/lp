@extends('layouts.page')

@section('title', $title)

@section('content')
  <div class="img-background">
    <div class="logo-nossafreguesia">
      <a href="http://rightco.pt/" target="_blank">
        <img class="nossafreguesia-logo" src="{{ asset("assets/$pathName/img/logotipo.png") }}" alt="Logotipo" >
      </a>
    </div>
    <div class="form-container">

                    <div class="logo-mobile" >
                      <a href="http://rightco.pt/" target="_blank">
                        <img class="mobile-logo" style="display: inline-block;" src="{{ asset("assets/$pathName/img/logotipo_branco.png") }}" alt="Logotipo" >
                      </a>
                    </div>


      <div>
        <div class="social-icons">
          <a target="_blank" class="ImgOnHover" href="https://www.facebook.com/rightco.pt/?hc_ref=SEARCH&fref=nf"></a>
          <a target="_blank" class="ImgOnHover2" href="https://www.linkedin.com/company/rightco"></a>
        </div>
        <!-- CCONTENT -->
        <h1 class="sistema-informatico">If you can dream it <br><b>We can do it!</b></h1>

      </div>
      <div>
        <div class="main">
          <div class="main-login main-center">
            <h2 class="novidades" style="text-align:center;">Registe-se e receba um orçamento <strong>GRÁTIS!</strong></h2>

            <form class="" role="form" action="user-register.php" method="post">

              <div class="form-group">
                <label for="name" type="text" name="name" class="cols-sm-2 control-label">Nome:</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <input type="text" class="form-control" name="nome" id="name"  placeholder="Nome*" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">Email:</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email*" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">Numero:</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <input type="number" class="form-control" name="numero" id="email" placeholder="Telefone*" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Empresa:</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <input type="text" class="form-control" name="empresa" id="name"  placeholder="Empresa*" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Localidade:</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <input type="text" class="form-control" name="localidade" id="name"  placeholder="Localidade*" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="username"  class="cols-sm-2 control-label">Estimativa:</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <input type="number" class="form-control" name="orcamento" id="name"  placeholder="Estimativa de orçamento do projeto*" required>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <textarea name="descricao" class="form-control" type="textarea" id="message" style="border-radius:0;" placeholder="Descrição do Projeto*" maxlength="100" rows="3"></textarea>


              </div>

              <div class="form-group">

                <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                <div class="g-recaptcha" data-theme="light" data-sitekey="6LegnR0UAAAAAO7uWhZ1k3fz4hG9WdTJlN1U9xkP" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>

              </div>

              <div class="form-group">
                <button  id="submit" name="submit" style="border-color:none !important; width: 100%;border-radius: 0;padding: 10px;" type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg btn-block login-button">Quero Receber um orçamento</button>

              </div>
              <h2 class="dados-spam">Os seus dados não serão utilizados para enviar qualquer tipo de SPAM</h2>
            </form>
          </div>
        </div>

        <div class="box boxmobile2 boxmobile3" style="text-align:center" >

          <div class="col-md-6" style="padding-top:20px">



            <div class="col-md-4">

              <a target="_blank" class="ImgOnHover5" href="http://rightco.pt/consultoria-estrategica/"></a>

            </div>
            <h2 style="margin: 0px; margin-top: 20px; display: inline-block;" class="novidades col-md-8">Consultoria Estrategica</h2>
          </div>

          <div class="col-md-6" style="padding-top:20px">


            <div class="col-md-4" >
              <a target="_blank" class="ImgOnHover6" href="http://rightco.pt/consultoria-de-candidatura-a-fundos-p2020/"></a>
            </div>
            <h2 style="margin: 0px; margin-top: 20px; display: inline-block;" class="novidades col-md-8">Consultoria de Candidaturas a Fundos P2020</h2>
          </div>
          <div class="col-md-6" style="padding-top:20px">


            <div class="col-md-4">
              <a target="_blank" class="ImgOnHover7" href="http://rightco.pt/desenvolvimento-georeferenciacao/"></a>

            </div>
            <h2 style="margin: 0px; margin-top: 20px; display: inline-block;" class="novidades col-md-8">Desenvolvimento de Software Taylormade</h2>
          </div>
          <div class="col-md-6" style="padding-top:20px ">


            <div class="col-md-4">
              <a target="_blank" class="ImgOnHover8" href="http://rightco.pt/desenvolvimento-de-software-tailormade/"></a>
            </div>
            <h2 style="margin: 0px; margin-top: 20px; display: inline-block;" class="novidades col-md-8">Aplicações Moveis</h2>
          </div>


          <div class="col-md-6" style="padding-top:20px">


            <div class="col-md-4">
              <a target="_blank" class="ImgOnHover9" href="http://rightco.pt/desenvolvimento-de-aplicacoes-moveis/"></a>
            </div>
            <h2 style="margin: 0px; margin-top: 20px; display: inline-block;  margin-top: 10px; padding-bottom:20px;" class="novidades col-md-8">Desenvolvimento de Sistemas Georreferenciação</h2>
          </div>
          <div class="col-md-6" style="padding-top:20px">


            <div class="col-md-4 ">
              <a target="_blank" class="ImgOnHover10" href="http://rightco.pt/design-grafico/"></a>
            </div>
            <h2 style="padding-bottom:20px; margin: 0px; margin-top: 20px; display: inline-block;" class="novidades col-md-8">Design Gráfico</h2>
          </div>


        </div>


        <div class="direitos-autor">
          <p class="copyright">2017 © Todos os direitos reservados.</p>
        </div>
      </div>
    </div>

    <div class="col-md-6 box boxtransform boxmobile" >

      <div class="col-md-6" style="padding-top:20px">



        <div class="col-md-4">

          <a target="_blank" class="ImgOnHover5" href="http://rightco.pt/consultoria-estrategica/"></a>

        </div>
        <h2 style="margin: 0px; margin-top: 20px; display: inline-block;" class="novidades col-md-8">Consultoria Estrategica</h2>
      </div>

      <div class="col-md-6" style="padding-top:20px">


        <div class="col-md-4" >
          <a target="_blank" class="ImgOnHover6" href="http://rightco.pt/consultoria-de-candidatura-a-fundos-p2020/"></a>
        </div>
        <h2 style="margin: 0px; margin-top: 20px; display: inline-block;" class="novidades col-md-8">Consultoria de Candidaturas a Fundos P2020</h2>
      </div>
      <div class="col-md-6" style="padding-top:20px">


        <div class="col-md-4">
          <a target="_blank" class="ImgOnHover7" href="http://rightco.pt/desenvolvimento-georeferenciacao/"></a>

        </div>
        <h2 style="margin: 0px; margin-top: 20px; display: inline-block;" class="novidades col-md-8">Desenvolvimento de Software Taylormade</h2>
      </div>
      <div class="col-md-6" style="padding-top:20px">


        <div class="col-md-4">
          <a target="_blank" class="ImgOnHover8" href="http://rightco.pt/desenvolvimento-de-software-tailormade/"></a>
        </div>
        <h2 style="margin: 0px; margin-top: 20px; display: inline-block;" class="novidades col-md-8">Aplicações Moveis</h2>
      </div>


      <div class="col-md-6" style="padding-top:20px">


        <div class="col-md-4">
          <a target="_blank" class="ImgOnHover9" href="http://rightco.pt/desenvolvimento-de-aplicacoes-moveis/"></a>
        </div>
        <h2 style="margin: 0px; margin-top: 20px; display: inline-block;  margin-top: 10px; padding-bottom:20px;" class="novidades col-md-8">Desenvolvimento de Sistemas Georreferenciação</h2>
      </div>
      <div class="col-md-6" style="padding-top:20px">


        <div class="col-md-4">
          <a target="_blank" class="ImgOnHover10" href="http://rightco.pt/design-grafico/"></a>
        </div>
        <h2 style="margin: 0px; margin-top: 20px; display: inline-block;" class="novidades col-md-8">Design Gráfico</h2>
      </div>
    </div>
  </div>
@endsection
