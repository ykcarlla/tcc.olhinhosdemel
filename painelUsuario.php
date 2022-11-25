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
        <li><a href="/cadastraAnimal.php">Animais</a></li>
        <li><a href="/logoutUsuario.php">Sair</a></li>
      </ul>
    </nav>
  </header>


  <div class="conteudo-principal">
  <h4 class="titulo-conteudo">PERFIL</h4>
    <div class="btns">
    <a href='editarPerfil.php'><button class='btn-edit' id="hover">Editar</button></a>
    <a href='cadastraNovoAnimal.php'><button class='btn-ca' id="hover">Cadastrar novo animal</button></a>
    <a href='excluirPerfil.php?id_tutor=<?php echo $_SESSION['id_tutores']?>' onclick='confirmar("<?php echo $dados['id_tutores'] ?>")'><button class='btn-ex'>Excluir</button></a>
    </div>
  
    <div class="dados">
    <h3>Nome: <span style="color: grey"><?php echo $_SESSION['nome']; ?></span></h3>
    <h3>Sobrenome: <span style="color: grey"><?php echo $_SESSION['sobrenome']; ?></span></h3>
    <h3>Email: <span style="color: grey"><?php echo $_SESSION['email']; ?></span></h3>
    <h3>CPF: <span style="color: grey"><?php echo $_SESSION['cpf']; ?></span></h3>
    <h3>Data de Nascimento: <span style="color: grey"><?php echo $_SESSION['data_nasc']; ?></span></h3>
    <h3>Telefone: <span style="color: grey"><?php echo $_SESSION['telefone']; ?></span></h3>
    </div>

  </div>
  <script>
   function confirmar(id_tutores) {
        if (confirm('Você realmente deseja seu perfil?'))
            location.href = 'query/excluiPerfil.php?id_dono=' + id_tutores;
    }

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