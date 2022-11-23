<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/paginaInicial.css">
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
       
        <li><a href="cadastraUsuario.php">Cadastro</a></li>
        <li><a href="loginUsuario.php">Entrar</a></li>
      </ul>
    </nav>
  </header>

  <div class="conteudo-principal">
    <h4 class="titulo-conteudo">CASTRAÇÃO SOCIAL</h4>

    <div class="conteudo-secundario">

      <div class="coluna-um">
        <h4>ETAPA 1</h4>

        <div class="conteudo-coluna">
          <p><strong>REALIZE SEU CADASTRO</strong></p>
          <small>Para realizar seu cadastro, basta clicar no botão "Cadastro" da barra de menu</small>
          <img src="imgs/barrademenucadastro.png" class="menu-cadastro">
          
        </div>
      </div>

      <div class="coluna-dois">
        <h4>ETAPA 2</h4>

        <div class="conteudo-coluna">
          <p><strong>REALIZE SEU LOGIN</strong></p>
          <small>Para realizar o ligin, basta clicar no atlho "Entrar" da barra de menu.</small>
          <img src="imgs/barrademenuagendar.png" class="menu-agendamento">

        </div>
      </div>

      <div class="coluna-tres">
        <h4>ETAPA 3</h4>

        <div class="conteudo-coluna">
          <p><strong>REALIZE SEU AGENDAMENTO</strong></p>
          <small>Para realizar um agendamento, basta realizar o login</small>
          <img src="imgs/barrademenuagendar.png" class="menu-agendamento">

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