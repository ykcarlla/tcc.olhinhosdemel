<?php
session_start();
if (!isset($_SESSION['logado'])) {
  header('location: loginUsuario.php');
exit();
}
include('conexao.php');

$id_animal = $_GET['id_animal'];
$sql = "SELECT * FROM animais WHERE id_animal = $id_animal";
$query = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($query);

if (isset($_POST['btnSalvar'])) {
    $especie = $_POST['especie'];
    $sexo = $_POST['sexo'];
    $nome_animal = $_POST['nome_animal'];
    $raca = $_POST['raca'];
    $cor = $_POST['cor'];
    $porte = $_POST['porte'];
    $doenca = $_POST['doenca'];
    $vermes = $_POST['vermes'];
    $vacinacao = $_POST['vacinacao'];
    $comportamento = $_POST['comportamento'];
    $tutores = $_SESSION['id_tutores'];

  $sql = "UPDATE animais SET 
                nome='$nome_animal', 
                especie='$especie', 
                sexo='$sexo',
                raca='$raca',
                cor='$cor',   
                porte='$porte', 
                doenca='$doenca',
                vermes='$vermes',
                vacinacao='$vacinacao',
                comportamento='$comportamento',
                tutor='$tutores'
            WHERE id_animal='$id_animal'";

  mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Animal alterado com sucesso.') </script>";
    header("Location: cadastraAnimal.php");
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
  <link rel="stylesheet" href="css/editarAnimal.css">
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
      <li><a href="/cadastraNovoAnimal.php">Animais</a></li>
      <li><a href="/loginAdm.php">Entrar</a></li>
    </ul>
  </nav>
</header>


<div class="conteudo-principal">

  <h4 class="titulo-conteudo">EDITAR DADOS DOS ANIAMIS</h4>

  <div class="conteudo-secundario">

    <form class="row g-3" method="post">
    <div class="col-md-6" style=" margin-bottom: 1rem;">
          <label for="especie" class="control-label" style="display: flex; flex-direction: column;">Espécie:</label>
          <select class="custom-select" name="especie" style="width: 100%; height: 90%; border-radius: 5px; border: 2px #AFD4FF solid;">
            <option selected disabled value="<?php echo $dados['especie'] ?>" style="padding-left: .1rem; color:grey;"><?php echo $dados['especie'] ?></option>
            <option>Cão</option>
            <option>Gato</option>
          </select>
        </div>

        <div class="col-md-6" style=" margin-bottom: 1rem;">
          <label for="sexo" class="control-label" style="display: flex; flex-direction: column;">Sexo:</label>
          <select class="custom-select" name="sexo" style="width: 100%; height: 90%; border-radius: 5px; border: 2px #AFD4FF solid;">
            <option selected disabled value="<?php echo $dados['sexo'] ?>" style="padding-left: .1rem; color:grey;"><?php echo $dados['sexo'] ?></option>
            <option>Macho</option>
            <option>Fêmea</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="control-label" for="nome_animal">Nome do animal:</label>
          <input class="form-control" type="text" name="nome_animal" value="<?php echo $dados['nome'] ?>">
        </div>

        <div class="col-md-6">
          <label class="control-label" for="raca">Raça:</label>
          <input class="form-control" type="text" name="raca" value="<?php echo $dados['raca'] ?>">
        </div>

        <div class="col-md-6">
          <label class="control-label" for="cor">Cor:</label>
          <input class="form-control" type="text" name="cor" value="<?php echo $dados['cor'] ?>" >
        </div>

        <div class="col-md-6">
          <label for="porte" class="control-label" style="display: flex; flex-direction: column;">Porte:</label>
          <select class="custom-select" name="porte" style="width: 100%; height: 70%; border-radius: 5px; border: 2px #AFD4FF solid;">
            <option selected disabled value="<?php echo $dados['porte'] ?>" style="padding-left: .1rem; color:grey;"><?php echo $dados['porte'] ?></option>
            <option>Grande</option>
            <option>Médio</option>
            <option>Pequeno</option>
          </select>
        </div>


        <div class="col-md-6">
          <label class="control-label" for="vacinacao" style="display: flex; flex-direction: column;">Vacinação completa?</label>
          <input class="form-check-input" type="radio" name="vacinacao" value="Sim" >
          <label class="form-check-label" for="flexRadioDisabled">Sim</label>

          <input class="form-check-input" type="radio" name="vacinacao" value="Não" >
          <label class="form-check-label" for="flexRadioDisabled">Não</label>
        </div>

        <div class="col-md-6">
          <label class="control-label" for="vermes" style="display: flex; flex-direction: column;">Possui vermes?</label>
          <input class="form-check-input" type="radio" name="vermes" value="Sim" >
          <label class="form-check-label" for="flexRadioDisabled">Sim</label>

          <input class="form-check-input" type="radio" name="vermes" value="Não">
          <label class="form-check-label" for="flexRadioDisabled">Não</label>
        </div>


        <div class="col-md-6">
          <label class="control-label" for="doenca">Doenças:</label>
          <textarea class="form-control" name="doenca"><?php echo $dados['doenca'] ?></textarea>
        </div>

        <div class="col-md-6" id="comportamento">
          <label class="control-label" for="comportamento">Comportamento:</label>
          <textarea class="form-control" name="comportamento"><?php echo $dados['comportamento'] ?></textarea>
        </div>

        <div class="form-group">
        <button class='btn' id="enviar" type="submit" value="Salvar" name="btnSalvar">Salvar</button>
        <button class='btn btn-outline-danger' value="Cancelar" name="btnCancelar">Cancelar</button>
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