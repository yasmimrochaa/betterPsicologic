<?php
include_once("conexao.php");
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Menu</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('sidebar/sidebar/fundo.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        h1 {
            font-size: 50px;
        }

        .conteudo {
            padding-left: 100px;
        }
    </style>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style/menu.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>


    <div class="wrapper">
        <!-- Sidebar  -->

        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>Menu</h1>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="meuPerfil.php?cod=<?php echo $_SESSION['cod']?>">Meu Perfil</a>
                </li>
                <li>
                    <a href="prontuario.php">Prontuários</a>

                </li>
                <li>
                    <a href="agendapsi.php"> Minha Agenda</a>
                </li>
                <li>
                    <a href="cadastroPaciente.php">Cadastrar Clientes</a>
                </li>
                <li>
                    <!--Fale Conosco!-->

                    <!--Colando email para contato. O comando 'malito' permite abrir o app de e-mail-->
                    <a href="mailto:mytherapyy.0@gmail.com?subject=Assunto do mytherapyy.0@gmail.com&body=Conteúdo do email que será preenchido automaticamente" class="dashboard-nav-item">Fale Conosco</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                
                <li>
                    <a href="sair.php" class="download">Sair</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">

                        <i class="fas fa-align-left"></i>

                    </button>
                    <label for="" style="color: #17a2b8;">Seja Bem vindo(a):
                        <?php
                        echo $_SESSION["nome"];
                        ?>
                    </label>
                </div>
            </nav>




            <!-- jQuery CDN - Slim version (=without AJAX) -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <!-- Popper.JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <!-- Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
</body>

</html>