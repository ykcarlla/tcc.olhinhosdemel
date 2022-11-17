<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cadastrarUsuario.css">
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
                <li><a href="/" class="principal" style="white-space: nowrap;">Página Inicial</a></li>
                <li><a href="/cadastraAgendamento.php">Agendar</a></li>
                <li><a href="/cadastraUsuario.php" class="ativa">Cadastro</a></li>
                <li><a href="/loginUsuario.php">Entrar</a></li>
              </ul>
            </nav>
          </header>
          
<?php
include('query/conexao.php');
?>

          
        
    <div class="conteudo-principal">
        <img src="imgs/logo.png">
        <h4 class="titulo-conteudo">FAÇA SEU CADASTRO</h4>

        <div class="conteudo-secundario">
            
        <form action = "query/cadastroUsuario.php" class="row g-3" method="post">
            <div class="col-md-6">
                <label class="control-label" for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" required>
            </div>
            <div class="col-md-6">
                <label class="control-label" for="sobrenome">Sobrenome:</label>
                <input class="form-control" type="text" name="sobrenome" required>
            </div>
            <div class="col-md-6">
                <label class="control-label" for="cpf">CPF:</label>
                <input class="form-control" type="text" name="cpf" required>
            </div>
            <div class="col-md-6">
                <label class="control-label" for="data_nasc">Data de Nascimento:</label>
                <input class="form-control" type="date" name="data_nasc">
            </div>
            <div class="col-md-6">
                <label class="control-label" for="telefone">Telefone:</label>
                <input class="form-control" type="text" name="telefone" required>
            </div>
            <div class="col-md-6">
                <label class="control-label" for="email">E-mail:</label>
                <input class="form-control" type="email" name="email" required>
            </div>
            <div class="col-md-6" id="last">
                <label class="control-label" for="senha">Senha:</label>
                <input class="form-control" type="password" name="senha" required>
            </div>

            <div class="form-group">
            <button class='btn' id="enviar" type="submit" value="Cadastrar" name="btnEnviar">Cadastrar</button>
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
        link.style.animation
          ? (link.style.animation = "")
          : (link.style.animation = `navLinkFade 0.5s ease forwards ${
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