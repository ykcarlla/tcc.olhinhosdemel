<!DOCTYPE html>
<html lang="pt-BR">

<?php
include('query/conexao.php');
$sql = "SELECT * FROM dono_animal";
$sql_animal = "SELECT * FROM animal";

$query = mysqli_query($conn, $sql);

$query_animal = mysqli_query($conn, $sql_animal);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/listaUsuarios.css">
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
                  <li><a href="#">Agendamentos</a></li>
                  <li><a href="#" class="ativa">Usuários</a></li>
                  <li><a href="/cadastraAdm.php">Cadastro</a></li>
                  <li><a href="/loginAdm.php">Entrar</a></li>

                </div>
              </ul>
            </nav>
          </header>
          

<div class='container'>

<div class="user-header">
    <h3 class='p-3'>Donos Cadastrados</h3>
    <a href="cadastraUsuario.php" class="btn btn-success">Cadastrar novo</a>
</div>
    

    <table class='table table-hover'>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Sobrenome</td>
            <td>E-mail</td>
            <td>CPF</td>
            <td>Data de Nascimento</td>
            <td>Telefone</td>
            <td class="text-center">Ação</td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?php echo $dados['id_dono'] ?></td>
                <td><?php echo $dados['nome_dono'] ?></td>
                <td><?php echo $dados['sobrenome_dono'] ?></td>
                <td><?php echo $dados['email_dono'] ?></td>
                <td><?php echo $dados['cpf_dono'] ?></td>
                <td><?php echo $dados['data_nasc_dono'] ?></td>
                <td><?php echo $dados['telefone_dono'] ?></td>
                
                
                <td colspan="2" class="text-center">
                    <a class='btn btn-info btn-sm' href='editaUsuario.php?id_dono=<?php echo $dados['id_dono'] ?>'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='#' onclick='confirmar("<?php echo $dados['id_dono'] ?>")'>Excluir</a></td>
            </tr>
        <?php } ?>
    </table>

    
<div class="user-header">
    <h3 class='p-3'>Animais Cadastrados</h3>
    <a href="cadastraUsuario.php" class="btn btn-success">Cadastrar novo</a>
</div>
    

    <table class='table table-hover'>
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
            <td class="text-center">Ação</td>
        </tr>

        <?php while ($dados_animal = mysqli_fetch_array($query_animal)) { ?>
            <tr>
                <td><?php echo $dados_animal['id_animal'] ?></td>
                <td><?php echo $dados_animal['nome_animal'] ?></td>
                <td><?php echo $dados_animal['especie'] ?></td>
                <td><?php echo $dados_animal['sexo'] ?></td>
                <td><?php echo $dados_animal['raca'] ?></td>
                <td><?php echo $dados_animal['cor'] ?></td>
                <td><?php echo $dados_animal['porte'] ?></td>
                <td><?php echo $dados_animal['vacinacao'] ?></td>
                <td><?php echo $dados_animal['vermes'] ?></td>
                <td><?php echo $dados_animal['doenca'] ?></td>
                <td><?php echo $dados_animal['comportamento'] ?></td>


                <td colspan="2" class="text-center">
                    <a class='btn btn-info btn-sm' href='editaUsuario.php?id_dono=<?php echo $dados['id_animal'] ?>'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='#' onclick='confirmar_animal("<?php echo $dados['id_animal'] ?>")'>Excluir</a></td>
            </tr>
        <?php } ?>
    </table>

</div>
<script>

    function confirmar(id_dono) {
        if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'query/excluiUsuario.php?id_dono=' + id_dono;
    }
    function confirmar_animal(id_animal) {
        if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluiUsuario.php?id_animal=' + id_animal;
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