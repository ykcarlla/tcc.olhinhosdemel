<?php
include('conexao.php');

//if (isset($_POST['btnEnviar'])) {
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  echo"entrou";
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    if(empty('$email') || empty('$senha')) {
        header('Location: ../loginUsuario.php');
        exit();
    }
    $sql = "SELECT * FROM pessoas WHERE email = '$email' and senha = '$senha'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['sobrenome'] = $row['sobrenome'];
        $_SESSION['cpf'] = $row['cpf'];
        $_SESSION['telefone'] = $row['telefone'];
        $_SESSION['data de nascimento'] = $row['data_nasc'];
        $_SESSION['logado'] = true;
        header("Location: ../painelUsuario.php");
        exit();
        } 
        else {
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
  <link rel="stylesheet" href="css/loginUsuario.css">
  <title>Olhinhos de Mel</title>
</head>

<body>
  <header>
    <nav>
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>

      <span class="span-principal"><a href="/" class="principal">Página Inicial</a></span>

      <ul class="nav-list">
        <li><a href="/cadastraAgendamento.php">Agendar</a></li>
        <li><a href="/cadastraUsuario.php">Cadastro</a></li>
      </ul>
    </nav>
  </header>

  <div class="conteudo-principal">
    <img src="imgs/logo.png">

    <div class="conteudo-secundario">

      <form action = '<?php echo $_SERVER["PHP_SELF"];?>' class="form-login" method="post">

        <div class="columns">
          <div class="col">
            <label class="control-label" for="email">E-mail:</label>
            <input class="form-control" type="email" name="email" required>
          </div>
          <div class="col">
            <label class="control-label" for="senha">Senha:</label>
            <input class="form-control" type="password" name="senha" required>
          </div>

          <div class="form-group">
            <button class='btn' id="enviar" type="submit" value="Cadastrar" name="btnEnviar">Entrar</button>
            <button class='btn btn-outline-danger' value="Cancelar" name="btnCancelar">Cancelar</button>
          </div>

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