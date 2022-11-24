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
  <link rel="stylesheet" href="css/cadastraAgendamento.css">
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
        <li><a href="cadastraAgendamento.php" class="ativa">Agendar</a></li>
        <li><a href="cadastraUsuario.php">Cadastro</a></li>
        <li><a href="loginUsuario.php">Entrar</a></li>
      </ul>
    </nav>
  </header>

  <?php
  include('conexao.php');

  $sql = "SELECT id_animal, nome FROM animais";

  $query = mysqli_query($conn, $sql);

if(isset($_GET['data'])){
    $data_selecionada = $_GET['data'];
    $dt = DateTime::createFromFormat("Y-m-d", $data_selecionada);
    $dia_semana = $dt->format('D');
    
    if($dia_semana == 'Sat'){
      $disponiveis = ['9','10','11'];
    }else if($dia_semana == 'Sun'){
      $disponiveis = [];
    }else{
      $disponiveis = ['9','10','11','13','14','15','16','17'];
    }
    $sql = "SELECT * from agendamento_agendar WHERE data_agendamento = '$data_selecionada'";
    $indisponiveis = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($indisponiveis)){
        $hora = $data['hora'];
        if (($chave = array_search($hora, $disponiveis)) !== false) {
            unset($disponiveis[$chave]);
        }
    }
}

if (isset($_POST['btnEnviar'])) {
    $animal = $_POST['animal'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $tutores = $_SESSION['id_tutores'];
    if($hora == 'null'){
        echo "<script> Selecione um horario válido </script>";
        return;
    }
    $sql = "INSERT INTO agendamento_agendar (animal, data_agendamento, hora, tutor) 
            VALUES ('$animal', '$data', '$hora', '$tutores')";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<p class='alerta'>Agendamento feito com sucesso!</p>";
        if (($chave = array_search($hora, $disponiveis)) !== false) {
            unset($disponiveis[$chave]);
        }
    } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}
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
    
    <div class="col-md-6">
      <label class="control-label" for="data">Data:</label>
      <input class="form-control" id="data" type="date" name="data" value="<?php echo $data_selecionada ?>" required>
    </div>
    <div class="col-md-6">
      <label class="control-label" for="hora">Hora:</label>
      <select name="hora" id="hora">
        <?php if (isset($disponiveis)) {
          if (empty($disponiveis)) {
            echo '<option value="null">Sem horarios disponíveis para este dia</option>';
          }
          foreach ($disponiveis as $hora) { ?>
            <option value="<?= $hora ?>"><?= $hora ?>:00</option>
          <?php } ?>
        <?php } else { ?>
          <option value="null">Selecione uma data primeiro</option>
        <?php } ?>
      </select>
    </div>
    </div>
    <div class="form-group">
      <input class='btn' id="enviar" type="submit" value="Agendar" name="btnEnviar"></input>
      <button class='btn btn-outline-danger' value="Cancelar" name="btnCancelar">Cancelar</button>
    </div>
    </form>
    
  </div>
  </div>
  <script>
    document.querySelector('#data').addEventListener('input', () => {
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