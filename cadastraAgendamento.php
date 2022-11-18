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
        <li><a href="verificaLogin.php" class="principal" style="white-space: nowrap;">Página Inicial</a></li>
        <li><a href="#">Agendar</a></li>
        <li><a href="cadastraUsuario.php" class="ativa">Cadastro</a></li>
        <li><a href="loginUsuario.php">Entrar</a></li>
      </ul>
    </nav>
  </header>

  <?php
  include('conexao.php');

  $sql = "SELECT id_animal, nome FROM animais";

  $query = mysqli_query($conn, $sql);
  ?>
  <div class="conteudo-principal">
    <img src="imgs/logo.png">
    <h4 class="titulo-conteudo">FAÇA O AGENDAMENTO</h4>

    <div class="conteudo-secundario">

      <form class="row g-3" method="post">
        <div class="col-md-6">
          <label class="control-label" for="animal">Animal:</label>
          <select name="animal">
            <?php while ($dados = mysqli_fetch_array($query)) { ?>

              <option value="<?php echo $dados['id_animal'] ?>"><?php echo $dados['nome'] ?></option>

            <?php } ?>
          </select>
        </div>
    </div>
    <div class="col-md-6">
      <label class="control-label" for="data">Data:</label>
      <input class="form-control" id="data" type="date" name="data" value="<?= $data_selecionada ?>" required>
    </div>
    <div class="col-md-6">
      <label class="control-label" for="hora">Hora:</label>
      <select name="hora" id="hora">
        <?php if (isset($disponiveis)) {
          if (empty($disponiveis)) {
            echo '<option value="null">Sem datas disponíveis para este dia</option>';
          }
          foreach ($disponiveis as $hora) { ?>
            <option value="<?= $hora ?>"><?= $hora ?>:00</option>
          <?php } ?>
        <?php } else { ?>
          <option value="null">Selecione uma data primeiro</option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <input class='btn' id="enviar" type="submit" value="Cadastrar" name="btnEnviar">Cadastrar</input>
      <button class='btn btn-outline-danger' value="Cancelar" name="btnCancelar">Cancelar</button>
    </div>
    </form>
  </div>
  </div>
  <script>
    document.querySelector('#data').addEventListener('change', () => {
      window.location.href = 'cadastraAgendamento.php?data=' + document.querySelector('#data').value;
    })
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