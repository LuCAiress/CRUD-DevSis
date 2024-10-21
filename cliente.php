<!-- Autor: Lucas Lima Aires
RA: 22202072 -->

<?php
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:cliente.php');
}

$logado = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php 
    # comando para conexão com o banco de dados
    include 'conexao.php';

    # trecho responsável pela listagem total de registros
    $sql = "SELECT * FROM usuario";
    $consulta = $conexao->query($sql);

    # consulta que permitirá a realização da edição de um determinado 
    # registro
    $result = null;
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sqlConsulta = " SELECT * FROM usuario WHERE id =:id";
        $stmt = $conexao->prepare($sqlConsulta);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
    }
?>

<body class="sb-nav-fixed">   
    <?php include 'menu-lateral.php'; ?>
    <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="cliente.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                CRUD
                            </a>
                            
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logado como:</div>
                        <?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''  ?>
                        <br></br>
                        <a href="logout.php">Sair</a> 
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tabela</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                Plataforma para realizar operações de CRUD (Create, Read, Update, Delete).
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Visualização do Cadastro de Clientes
                            </div>
                            <div class="card-body">
                                <div> 
                                    <?php echo isset($_REQUEST['mensagem']) ? $_REQUEST['mensagem'] : ''  ?> 
                                </div>

                                <h3>Lista de Usuários</h3>
                                <form method="post" action="inserir.php">
                                    <input type="hidden" name="id" 
                                        value="<?php echo $result != null ? $result->id : ''?>"/>
                                    Nome: <input type="text" name="nome" 
                                        value="<?php echo $result != null ? $result->nome : ''?>"/>
                                    E-mail: <input type="email" name="email" 
                                        value="<?php echo $result != null ? $result->email : ''?>"/>
                                    <input type="submit" value="Salvar"/>
                                    <input type="reset" value="Limpar"/>

                                <br><br>

                                </form>


                                
                                <table id="datatablesSimple" class="table table-bordered table-responsive"> 
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                            <th>EMAIL</th>
                                            <th>AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                            <th>EMAIL</th>
                                            <th>AÇÕES</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
                                            <tr>
                                                <td><?php echo $linha->id ?></td>
                                                <td><?php echo $linha->nome ?></td>
                                                <td><?php echo $linha->email ?></td>
                                                <td>
                                                    <a href="cliente.php?id=<?php echo $linha->id ?>">
                                                        Editar
                                                    </a>
                                                    |
                                                    <a href="excluir.php?id=<?php echo $linha->id ?>">
                                                        Excluir
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <tbody>
                                </table>
                            </div>  
                        </div>    
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; CEUB 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

</body>
</html>