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
  <link rel="stylesheet" href="css/paginaLogado.css">
  <title>Olhinhos de Mel</title>
</head>

<body>
  <header>
    <nav class="header__nav">
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li><a style="white-space: nowrap;" href="/" class="ativa">Página Inicial</a></li>
        <li><a href="/cadastraAgendamento.php">Agendar</a></li>
        <li><a href="/cadastraAnimal.php">Cadastrar</a></li>
        <li><a href="/painelUsuario.php">Perfil</a></li>
      </ul>
    </nav>
  </header>

  <div class="conteudo-principal">
    <img src="imgs/logo.png">
    <h4 class="titulo-conteudo">CASTRAÇÃO SOCIAL</h4>

    <div class="conteudo-secundario">

      <div class="coluna-um">
        <h4>CÃES</h4>

        <div class="conteudo-coluna">
          <p><strong>MACHO ATÉ 10KG</strong></p>
          <small>R$ 110,00</small>

          <p><strong>MACHO ACIMA DE 10KG</strong></p>
          <small>R$ 150,00</small>

          <p><strong>FÊMEA ATÉ 10KG</strong></p>
          <small>R$ 130,00</small>

          <p><strong>FÊMEA ACIMA DE 10KG</strong></p>
          <small>R$ 150,00</small>
        </div>
      </div>

      <div class="coluna-dois">
        <h4>GATOS</h4>

        <div class="conteudo-coluna">
          <p><strong>MACHO</strong></p>
          <small>R$ 50,00</small>

          <p><strong>FÊMEA</strong></p>
          <small>R$ 100,00</small>

        </div>
      </div>

      <div class="coluna-tres">
        <h4>ADICIONAL</h4>

        <div class="conteudo-coluna">
          <p><strong>ROUPA CIRÚRGICA</strong></p>
          <small>R$ 20,00</small>

          <p><strong>MEDICAÇÃO ORAL</strong></p>
          <small>R$ 20,00</small>

          <p><strong>RIFOCINA <br>E ÁGUA OXIGENADA</strong></p>

        </div>
      </div>

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