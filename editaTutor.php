<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['adm']==false) {
  header('location: loginUsuario.php');
exit();
}
include('conexao.php');

$id_tutores = $_GET['id_tutor'];
$sql = "SELECT * FROM tutores WHERE id_tutores = $id_tutores";
$query = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($query);

if (isset($_POST['btnSalvar'])) {
  $nome_tutores = $_POST['nome'];
  $sobrenome_tutores = $_POST['sobrenome'];
  $cpf_tutores = $_POST['cpf'];
  $telefone_tutores = $_POST['telefone'];
  $email_tutores = $_POST['email'];
  $senha_tutores = $_POST['senha'];
  $data_nasc_tutores =  $_POST['data_nasc'];

  $sql = "UPDATE tutores SET 
                nome='$nome_tutores', 
                sobrenome='$sobrenome_tutores', 
                cpf='$cpf_tutores',
                data_nasc='$data_nasc_tutores',
                telefone='$telefone_tutores',   
                email='$email_tutores', 
                senha='$senha_tutores'
            WHERE id_tutores='$id_tutores'";

  mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Usuário alterado com sucesso.') </script>";
    header("Location: listaTutores.php");
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
      <li><a href="/loginAdm.php">Entrar</a></li>
    </ul>
  </nav>
</header>


<div class="conteudo-principal">

  <h4 class="titulo-conteudo">EDITAR DADOS DO TUTOR</h4>

  <div class="conteudo-secundario">

    <form class="row g-3" method="post">
      <div class="col-md-6">
        <label class="control-label" for="nome">Nome:</label>
        <input class="form-control" type="text" name="nome" value="<?php echo $dados['nome'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="sobrenome">Sobrenome:</label>
        <input class="form-control" type="text" name="sobrenome" value="<?php echo $dados['sobrenome'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="cpf_tutores">CPF:</label>
        <input class="form-control" type="text" name="cpf" value="<?php echo $dados['cpf'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="data_nasc">Data de Nascimento:</label>
        <input class="form-control" type="date" name="data_nasc" value="<?php echo $dados['data_nasc'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="telefone">Telefone:</label>
        <input class="form-control" type="text" name="telefone" value="<?php echo $dados['telefone'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="email">E-mail:</label>
        <input class="form-control" type="email" name="email" value="<?php echo $dados['email'] ?>" >
      </div>
      <div class="col-md-6">
        <label class="control-label" for="email">Senha:</label>
        <input class="form-control" type="text" name="senha" value="<?php echo $dados['senha'] ?>" >
      </div>

      <div class="form-group">
        <button class='btn' id="enviar" type="submit" value="Salvar" name="btnSalvar">Salvar</button>
        <button class='btn btn-outline-danger' value="Cancelar" name="btnCancelar">Cancelar</button>
      </div>
    </form>
    <form action="excluiUsuario.php" method="$_POST">
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