<!DOCTYPE html>
<html lang="pt-BR">

<?php
include('query/conexao.php');
/*if (!isset($_SESSION['logado']) || $_SESSION['logado'] = false) {
header('location: loginUsuario.php');
exit();
}*/
$id_dono = $_GET['id_dono'];

if (isset($_POST['btnSalvar'])) {
  $nome_dono = $_POST['nome_dono'];
  $sobrenome_dono = $_POST['sobrenome_dono'];
  $cpf_dono = $_POST['cpf_dono'];
  $telefone_dono = $_POST['telefone_dono'];
  $email_dono = $_POST['email_dono'];
  $senha_dono = $_POST['senha_dono'];
  $data_nasc_dono =  $_POST['data_nasc_dono'];

  $sql = "UPDATE dono_animal SET 
                nome_dono='$nome_dono', 
                sobrenome_dono='$sobrenome_dono', 
                cpf_dono='$cpf_dono',
                telefone_dono='$telefone_dono',  
                data_nasc_dono='$data_nasc_dono', 
                email_dono='$email_dono', 
                senha_dono='$senha_dono'
            WHERE id_dono='$id_dono'";

  mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Usuário alterado com sucesso.') </script>";
    header("Location: listaUsuarios.php");
  } else {
    echo "<script> alert('Ocorreu algum erro.') </script>";
  }
}
$sql = "SELECT * FROM dono_animal WHERE id_dono=$id_dono";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
?>


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

  <h4 class="titulo-conteudo">EDITAR DADOS DO DONO</h4>

  <div class="conteudo-secundario">

    <form class="row g-3" method="post">
      <div class="col-md-6">
        <label class="control-label" for="nome_dono">Nome:</label>
        <input class="form-control" type="text" name="nome_dono" value="<?php echo $linha['nome_dono'] ?>" required>
      </div>
      <div class="col-md-6">
        <label class="control-label" for="sobrenome_dono">Sobrenome:</label>
        <input class="form-control" type="text" name="sobrenome_dono" value="<?php echo $linha['sobrenome_dono'] ?>" required>
      </div>
      <div class="col-md-6">
        <label class="control-label" for="cpf_dono">CPF:</label>
        <input class="form-control" type="text" name="cpf_dono" value="<?php echo $linha['cpf_dono'] ?>" required>
      </div>
      <div class="col-md-6">
        <label class="control-label" for="data_nasc_dono">Data de Nascimento:</label>
        <input class="form-control" type="date" name="data_nasc_dono" value="<?php echo $linha['data_nasc_dono'] ?>">
      </div>
      <div class="col-md-6">
        <label class="control-label" for="telefone_dono">Telefone:</label>
        <input class="form-control" type="text" name="telefone_dono" value="<?php echo $linha['telefone_dono'] ?>" required>
      </div>
      <div class="col-md-6">
        <label class="control-label" for="email_dono">E-mail:</label>
        <input class="form-control" type="email" name="email_dono" value="<?php echo $linha['email_dono'] ?>" required>
      </div>
      <div class="col-md-6" id="last">
        <label class="control-label" for="senha_dono">Senha:</label>
        <input class="form-control" type="password" name="senha_dono" value="<?php echo $linha['senha_dono'] ?>" required>
      </div>

      <div class="form-group">
        <button class='btn' id="enviar" type="submit" value="Salvar" name="btnSalvar">Salvar</button>
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
</body>

</html>