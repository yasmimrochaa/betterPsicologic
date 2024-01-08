<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <title>My Therapy</title>
  <style>
    @import url('https://fonts.googleapis.com/css2? family= Open+Sans:wght@300 & família= Roboto+Condensado:ital,wght@1.200 & display=swap');

    body {
      background-color: #D9D9D9;
    }


    h1 {
      font-family: 'Roboto Condensed';
      font-size: 4rem;
      padding-top: 90px;
      padding-left: 10px;
      width: 100%;
    }

    p {
      font-family: 'Open Sans';
      text-align: justify;
      font-size: larger;
    }

    .img {
      padding-top: 40px;
      margin: auto;
      opacity: 0.7;
    }

    .dropdown-menu {
      --bs-dropdown-link-active-bg: #97C8CD;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #97C8CD; padding: 20px 120px;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Therapy</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mailto:mytherapyy.0@gmail.com?subject=Assunto do mytherapyy.0@gmail.com&body=Conteúdo do email que será preenchido automaticamente">
              Contato</a>
          </li>
          <li class="nav-item dropdown me-2">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Login
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="loginPsi.php">Sou psicólogo</a></li>
              <li><a class="dropdown-item" href="loginPac.php">Sou paciente</a></li>
            </ul>
          </li>
        </ul>
        <span class="navbar-text">
          <a href="https://www.instagram.com/mytherapy.tcc?igsh=MWNuYjQ0bmZocHZoeQ=="><img src="style/image/instagram.png" alt="" style="max-height: 25px; max-width: 25px;"></a>
        </span>
      </div>
    </div>
  </nav>


  <div class="container">
    <div class="row">
      <div class="col-7">
        <h1>Aprimore suas sessões de terapia</h1>
        <hr>
        <p>O nosso Software oferece ferramentas que são fundamentais para um ótimo atendimento.
          E tem como principais funções a criação do prontuário de um paciente contendo todas as informações essenciais para o atendimento. O próprio paciente marca seu horário em uma agenda com horários estabelecidos pela psicóloga. O profissional tem a possibilidade de escrever o resumo da sessão anterior juntamente com a data do atendimento. Assim melhorando essencialmente a qualidade do atendimento solicitado.
        </p>
      </div>
      <div class="col-3">
        <img src="style/image/Logo oficial.png" alt="" class="img">
      </div>
    </div>




</body>

</html>