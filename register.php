<!-- Autor: Lucas Lima Aires
RA: 22202072 -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrar - CRUD</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <?php include 'conexao.php'; ?>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Criar Conta</h3></div>
                                    <div class="card-body">
                                        <form method="post", action="conta.php">   
                                            <div> 
                                                <?php echo isset($_REQUEST['mensagem']) ? $_REQUEST['mensagem'] : ''  ?> 
                                            </div>                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="nome" type="text"/>
                                                <label for="inputFirstName">Nome</label>
                                            </div>
                                                
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" type="email"/>
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="senha" type="password"/>
                                                <label for="inputPassword">Senha</label>
                                            </div>
                                            
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" value="Criar conta" class="btn btn-primary btn-block"></input></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">Já possui uma conta? Faça login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
    </body>
</html>
