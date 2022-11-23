<?php
session_start();
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/painelUsuario.css">
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
        <li><a style="white-space: nowrap;" href="/" class="ativa">Página Inicial</a></li>
        <li><a href="/cadastraAgendamento.php">Agendar</a></li>
        <li><a href="/cadastraUsuario.php">Cadastro</a></li>
        <li><a href="/logoutUsuario.php">Sair</a></li>
      </ul>
    </nav>
  </header>


  <div class="conteudo-principal">
  <a href='editarPerfil.php'><button class='btn'>Editar</button></a>

    <h2><?php echo $_SESSION['email']; ?></h2>
    <h2><?php echo $_SESSION['nome']; ?></h2>
    <h2><?php echo $_SESSION['sobrenome']; ?></h2>
    <h2><?php echo $_SESSION['cpf']; ?></h2>
    <h2><?php echo $_SESSION['data_nasc']; ?></h2>
    <h2><?php echo $_SESSION['telefone']; ?></h2>


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