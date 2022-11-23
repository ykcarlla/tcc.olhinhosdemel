<!DOCTYPE html>
<html lang="pt-BR">

<?php
include('conexao.php');
session_start();
$data = $_SESSION['data'];
$sql = "SELECT * FROM agendamento_agendar WHERE data_agendamento = '$data'";

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
                  <li><a href="/listaUsuarios.php">Usuários</a></li>
                  <li><a href="/cadastraAdm.php">Cadastro</a></li>
                  <li><a href="/loginAdm.php">Entrar</a></li>

                </div>
              </ul>
            </nav>
          </header>
          

<div class='container'>

<div class="user-header">
    <h3 class='p-3'>AGENDAMENTOS DO DIA <?php echo $data = $_SESSION['data'];?></h3>
</div>
    
<div class="card-agenda">
<?php while ($dados = mysqli_fetch_array($query)) { ?>
<h3 class='p-3'><?php echo $dados['hora'] ?>h</h3>
</div>
<?php } ?>

    <table class='table table-hover'>
        <tr>
            <td>Data</td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $data = $_SESSION['data'];?></td>
                <td><?php echo $dados['hora'] ?></td>
                
                
                <td colspan="2" class="text-center">
            </tr>
        <?php } ?>
    </table>
                
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