<!DOCTYPE html>
<html lang="pt-BR">

<?php
include('conexao.php');
session_start();
if (!isset($_SESSION['logado'])) {
  header('location: loginUsuario.php');
exit();
}

$sql1 = "SELECT * FROM agendamento_agendar";

$query1 = mysqli_query($conn, $sql1);

if($query1){
$data = $_POST['data'];
$sql = "SELECT * FROM agendamento_agendar WHERE data_agendamento = '$data'";
} 
$query = mysqli_query($conn, $sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/listaAgendamentos.css">
    <title>Olhinhos de Mel</title>
</head>


<header>
            <nav class="header__nav">
            <p></p>
              <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
              </div>
              <ul class="nav-list">
                <div class="principal_item">
                  <li><a href="/" class="principal" style="white-space: nowrap; margin: 0 !important;">Página Inicial</a></li>
                </div>

                <div class="nav__items">
                  <li><a href="/listaAgendamentos.php" class="ativa">Agendamentos</a></li>
                  <li><a href="/listaTutores.php">Usuários</a></li>
                  <li><a href="/cadastraAdm.php">Cadastro</a></li>
                  <li><a href="/loginUsuario.php">Sair</a></li>

                </div>
              </ul>
            </nav>
          </header>
          

<div class='container'>

<div class="user-header">
    <h3 class='p-3'>AGENDAMENTOS DO DIA <?php echo $data;?></h3>
</div>
    
<div class="card-agenda">
<?php while ($dados = mysqli_fetch_array($query)) { ?>
<div class="header" style="display:flex; justify-content: space-between">
<?php if($dados){?>
<h3><?php echo $dados['hora'] ?>h</h3>
<?php }?>
<button class="btn" href='excluirAgendamento.php?id_agendamento_agendar=<?php echo $dados['id_agendamento_agendar'] ?>' onclick='confirmar_agendamento("<?php echo $dados['id_agendamento_agendar'] ?>")'>Fechar agendamento</button>
</div>
<?php if($dados){?>
                <?php
                $id_tutor = $dados['tutor'];
                $sql_tutor = "SELECT * FROM tutores WHERE id_tutores = $id_tutor";              
                $query_tutor = mysqli_query($conn, $sql_tutor);
                $dados_tutor = mysqli_fetch_array($query_tutor);
                ?>

                <?php
                $id_animal = $dados['animal'];
                $sql_animal = "SELECT * FROM animais WHERE id_animal = $id_animal";              
                $query_animal = mysqli_query($conn, $sql_animal);
                $dados_animal = mysqli_fetch_array($query_animal);
                ?>

<div class="dados" style="display:flex; flex-direction: row; gap:15rem; font-size: 20px;">

<div class="dados-tutor" style="display:flex; flex-direction: column; gap:5px;">
<p class="b">DADOS DO DONO</p>
<p><span class="a">Nome:</span> <?php echo $dados_tutor['nome'] ?></p>
<p><span class="a">Sobrenome:</span> <?php echo $dados_tutor['sobrenome'] ?></p>
<p><span class="a">E-mail:</span> <?php echo $dados_tutor['email'] ?></p>
<p><span class="a">CPF:</span> <?php echo $dados_tutor['cpf'] ?></p>
<p><span class="a">Data Nascimento:</span> <?php echo $dados_tutor['data_nasc'] ?></p>
<p><span class="a">Telefone:</span> <?php echo $dados_tutor['telefone'] ?></p>
</div>

<div class="dados-animal_um">
<p class="b">DADOS DO ANIMAL</p>
<p><span class="a">Nome:</span> <?php echo $dados_animal['nome'] ?></p>
<p><span class="a">Espécie:</span> <?php echo $dados_animal['especie']?></p>
<p><span class="a">Sexo:</span> <?php echo $dados_animal['sexo']?></p>
<p><span class="a">Raça:</span> <?php echo $dados_animal['raca'] ?></p>
<p><span class="a">Cor:</span> <?php echo $dados_animal['cor'] ?></p>
</div>
<div class="dados-animal_dois" style="margin-top: 3rem">
<p><span class="a">Porte:</span> <?php echo $dados_animal['porte'] ?></p>
<p><span class="a">Vacinado:</span> <?php echo $dados_animal['vacinacao'] ?></p>
<p><span class="a">Vermes:</span> <?php echo $dados_animal['vermes'] ?></p>
<p><span class="a">Doenças:</span> <?php echo $dados_animal['doenca'] ?></p>
<p><span class="a">Comportamento:</span> <?php echo $dados_animal['comportamento'] ?></p>
</div>

</div>
  
        <?php } ?>
        <?php }?>
</div>
    
                
</div>
<script>

function confirmar_agendamento(id_agendamento_agendar) {
        if (confirm('Você realmente deseja fechar esse agendamento?'))
            location.href = 'excluirAgendamento.php?id_agendamento_agendar=' + id_agendamento_agendar;
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