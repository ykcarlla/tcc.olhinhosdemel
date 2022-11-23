<?php
session_start();
if (!isset($_SESSION['logado'])) {
  header('location: loginUsuario.php');
exit();
}
include('conexao.php');

$id_dono = $_SESSION['id_tutores'];

if (isset($_POST['btnSalvar'])) {
  $nome_dono = $_POST['nome'];
  $sobrenome_dono = $_POST['sobrenome'];
  $cpf_dono = $_POST['cpf'];
  $telefone_dono = $_POST['telefone'];
  $email_dono = $_POST['email'];
  $data_nasc_dono =  $_POST['data_nasc'];

  $sql = "UPDATE tutores SET 
                nome='$nome_dono', 
                sobrenome='$sobrenome_dono', 
                cpf='$cpf_dono',
                data_nasc='$data_nasc_dono',
                telefone='$telefone_dono',   
                email='$email_dono',
            WHERE id_tutores='$id_dono'";

  mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Usuário alterado com sucesso.') </script>";
    header("Location: painelUsuario.php");
  } else {
    echo "<script> alert('Ocorreu algum erro.') </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/editarUsuario.css">
  <title>Olhinhos de Mel</title>
</head>


<header>
  <nav>
    <p></p>
    <div class="mobile-menu">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
    <ul class="nav-list">
      <li><a href="/" class="principal">Página Inicial</a></li>
      <li><a href="#">Agendamentos</a></li>
      <li><a href="#">Usuários</a></li>
      <li><a href="/cadastraAdm.php">Cadastro</a></li>
      <li><a href="/logout.php">Sair</a></li>
    </ul>
  </nav>
</header>


<div class="conteudo-principal">

  <h4 class="titulo-conteudo">EDITE SEU PERFIL</h4>

  <div class="conteudo-secundario">

    <form class="row g-3" method="post">
      <div class="col-md-6">
        <label class="control-label" for="nome">Nome:</label>
        <input class="form-control" type="text" name="nome" value="<?php echo $_SESSION['nome'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="sobrenome">Sobrenome:</label>
        <input class="form-control" type="text" name="sobrenome" value="<?php echo $_SESSION['sobrenome'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="cpf_dono">CPF:</label>
        <input class="form-control" type="text" name="cpf" value="<?php echo $_SESSION['cpf'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="data_nasc">Data de Nascimento:</label>
        <input class="form-control" type="date" name="data_nasc" value="<?php echo $_SESSION['data_nasc'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="telefone">Telefone:</label>
        <input class="form-control" type="text" name="telefone" value="<?php echo $_SESSION['telefone'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="email">E-mail:</label>
        <input class="form-control" type="email" name="email" value="<?php echo $_SESSION['email'] ?>" >
      </div>
      

      <div class="form-group">
        <button class='btn' id="enviar" type="submit" value="Salvar" name="btnSalvar">Salvar</button>
        <button class='btn btn-outline-danger' value="Cancelar" name="btnCancelar">Cancelar</button>
      </div>
    </form>
    <form action="excluirPerfil.php" method="$_POST">
    <div class="form-group">
        <button class='btn' id="excluir" type="submit" value="excluir" name="btnexcluir">Excluir</button>
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
</body>

</html>