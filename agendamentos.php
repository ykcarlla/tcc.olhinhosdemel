<?php
session_start();
if (!isset($_SESSION['logado'])) {
  header('location: loginUsuario.php');
exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/cadastraAgendamento.css">
  <title>Olhinhos de Mel</title>
</head>

<body>
  <header>
    <nav class="header__nav">
      <p></p>
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li><a href="verificaLogin.php" class="principal" style="white-space: nowrap;">Página Inicial</a></li>
        <li><a href="casdatraAgendamento.php" class="ativa">Agendar</a></li>
        <li><a href="cadastraUsuario.php">Cadastro</a></li>
        <li><a href="loginUsuario.php">Entrar</a></li>
      </ul>
    </nav>
  </header>

  <?php
  include('conexao.php');
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = $_POST['data'];


  $sql = "SELECT * from agendamento_agendar WHERE data_agendamento = '$data'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      session_start();
      $row = mysqli_fetch_assoc($result);
      $_SESSION['data'] = $data;
      $_SESSION['hora'] = $row['id_tutores'];
      header("Location: listaAgendamentos.php");
      exit();
        } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
  }
  ?>
  <div class="conteudo-principal">
    <img src="imgs/logo.png">
    <h4 class="titulo-conteudo">VEJA OS AGENDAMENTOS</h4>

    <div class="conteudo-secundario">

      <form class="row g-3" method="post">
    <div class="date">
      <label class="control-label" for="data">Data:</label>
      <input class="form-control" id="data" type="date" name="data" required>
    </div>
    </div>
    <div class="form-group">
      <input class='btn' id="enviar" type="submit" value="Consultar" name="btnEnviar"></input>
      <button class='btn btn-outline-danger' value="Cancelar" name="btnCancelar">Cancelar</button>
    </div>
    </form>
    
  </div>
  </div>
  <script>
   
    class MobileNavbar {
      constructor(mobileMenu, navList, navLinks) {
        this.mobileMenu = document.querySelector(mobileMenu);
        this.navList = document.querySelector(navList);
        this.navLinks = document.querySelectorAll(navLinks);
        this.activeClass = "active";

        this.handleClick = this.handleClick.bind(this);
      }

      animateLinks() {
        this.navLinks.forEach((link, index) => {
          link.style.animation ?
            (link.style.animation = "") :
            (link.style.animation = `navLinkFade 0.5s ease forwards ${
              index / 7 + 0.3
            }s`);
        });
      }

      handleClick() {
        this.navList.classList.toggle(this.activeClass);
        this.mobileMenu.classList.toggle(this.activeClass);
        this.animateLinks();
      }

      addClickEvent() {
        this.mobileMenu.addEventListener("click", this.handleClick);
      }

      init() {
        if (this.mobileMenu) {
          this.addClickEvent();
        }
        return this;
      }
    }

    const mobileNavbar = new MobileNavbar(
      ".mobile-menu",
      ".nav-list",
      ".nav-list li",
    );
    mobileNavbar.init();
  </script>

</html>