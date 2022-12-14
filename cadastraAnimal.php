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
  <link rel="stylesheet" href="css/cadastraAnimal.css">
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
        <li><a href="#" class="ativa">Animais</a></li>
        <li><a href="/painelUsuario.php">Perfil</a></li>
      </ul>
    </nav>
  </header>
  <?php
  include('conexao.php');

  $sql = "SELECT * FROM animais";

  $query = mysqli_query($conn, $sql);
  ?>
<?php 
if(!isset($_SESSION['id_animal'])) {?>
 <div class="conteudo-principal">
    <img src="imgs/logo.png">
    <h4 class="titulo-conteudo">CADASTRE SEU ANIMALZINHO</h4>

    <div class="conteudo-secundario">

      <form action="cadastroAnimal.php" class="row g-3" method="post">

      <input class="form-control" type="hidden" name="tutores" value="<?php echo $_SESSION['id_tutores']?>">

        <div class="col-md-6" style=" margin-bottom: 1rem;">
          <label for="especie" class="control-label" style="display: flex; flex-direction: column;">Espécie:</label>
          <select class="custom-select" name="especie" style="width: 100%; height: 90%; border-radius: 5px; border: 2px #AFD4FF solid;">
            <option selected disabled value="" style="padding-left: .1rem; color:grey;">Escolha...</option>
            <option>Cão</option>
            <option>Gato</option>
          </select>
        </div>

        <div class="col-md-6" style=" margin-bottom: 1rem;">
          <label for="sexo" class="control-label" style="display: flex; flex-direction: column;">Sexo:</label>
          <select class="custom-select" name="sexo" style="width: 100%; height: 90%; border-radius: 5px; border: 2px #AFD4FF solid;">
            <option selected disabled value="" style="padding-left: .1rem; color:grey;">Escolha...</option>
            <option>Macho</option>
            <option>Fêmea</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="control-label" for="nome_animal">Nome do animal:</label>
          <input class="form-control" type="text" name="nome_animal" required>
        </div>

        <div class="col-md-6">
          <label class="control-label" for="raca">Raça:</label>
          <input class="form-control" type="text" name="raca" required>
        </div>

        <div class="col-md-6">
          <label class="control-label" for="cor">Cor:</label>
          <input class="form-control" type="text" name="cor" required>
        </div>

        <div class="col-md-6">
          <label for="porte" class="control-label" style="display: flex; flex-direction: column;">Porte:</label>
          <select class="custom-select" name="porte" style="width: 100%; height: 70%; border-radius: 5px; border: 2px #AFD4FF solid;">
            <option selected disabled value="" style="padding-left: .1rem; color:grey;">Escolha...</option>
            <option>Grande</option>
            <option>Médio</option>
            <option>Pequeno</option>
          </select>
        </div>


        <div class="col-md-6">
          <label class="control-label" for="vacinacao" style="display: flex; flex-direction: column;">Vacinação completa?</label>
          <input class="form-check-input" type="radio" name="vacinacao" value="sim">
          <label class="form-check-label" for="flexRadioDisabled">Sim</label>

          <input class="form-check-input" type="radio" name="vacinacao" value="não">
          <label class="form-check-label" for="flexRadioDisabled">Não</label>
        </div>

        <div class="col-md-6">
          <label class="control-label" for="vermes" style="display: flex; flex-direction: column;">Possui vermes?</label>
          <input class="form-check-input" type="radio" name="vermes" value="sim">
          <label class="form-check-label" for="flexRadioDisabled">Sim</label>

          <input class="form-check-input" type="radio" name="vermes" value="não">
          <label class="form-check-label" for="flexRadioDisabled">Não</label>
        </div>


        <div class="col-md-6">
          <label class="control-label" for="doenca">Doenças:</label>
          <textarea class="form-control" name="doenca" required></textarea>
        </div>

        <div class="col-md-6" id="comportamento">
          <label class="control-label" for="comportamento">Comportamento:</label>
          <textarea class="form-control" name="comportamento" required></textarea>
        </div>

        <div class="form-group">
          <input class='btn' id="enviar" type="submit" value="Cadastrar" name="btnEnviar">
          <button class='btn btn-outline-danger' value="Cancelar" name="btnCancelar">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
<?php } else {?>
  <div class="user-header">
    <h3 class='p-3'>Animais Cadastrados</h3>
    <a href="cadastraNovoAnimal.php" class="btn btn-success">Cadastrar novo</a>
</div>
    <table class='table table-hover' id="table-animal">
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Espécie</td>
            <td>Sexo</td>
            <td>Raça</td>
            <td>Cor</td>
            <td>Porte</td>
            <td>Vacinado</td>
            <td>Vermes</td>
            <td>Doenças</td>
            <td>Comportamento</td>
            <td>Ação</td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $dados['id_animal'] ?></td>
                <td><?php echo $dados['nome'] ?></td>
                <td><?php echo $dados['especie'] ?></td>
                <td><?php echo $dados['sexo'] ?></td>
                <td><?php echo $dados['raca'] ?></td>
                <td><?php echo $dados['cor'] ?></td>
                <td><?php echo $dados['porte'] ?></td>
                <td><?php echo $dados['vacinacao'] ?></td>
                <td><?php echo $dados['vermes'] ?></td>
                <td><?php echo $dados['doenca'] ?></td>
                <td><?php echo $dados['comportamento'] ?></td>


                <td colspan="2">
                    <a class='btn btn-info btn-sm' id="edit" href='editaNovoAnimal.php?id_animal=<?php echo $dados['id_animal'] ?>'>Editar</a>
                    <a class='btn btn-danger btn-sm' id="delete" href='excluirNovoAnimal.php?id_animal=<?php echo $dados['id_animal'] ?>' onclick='confirmar_animal("<?php echo $dados['id_animal'] ?>")'>Excluir</a></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>
  <script>

function confirmar_animal(id_animal) {
        if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluirNovoAnimal.php?id_animal=' + id_animal;
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