<?php
include 'config.php';

// Adiciona produto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['equipamento']) && isset($_POST['id_equipamento'])) {
    $name = $_POST['equipamento'];
    $id_equipamento = $_POST['id_equipamento'];
    $stmt = $pdo->prepare("INSERT INTO manutencoes (equipamento, id_equipamento) VALUES (?, ?)");
    $stmt->execute([$name, $id_equipamento]);
}
if ($id_equipamento === false) {
    // Handle invalid ID case
    echo "ID inválido!";
    exit;
}

// Lista categorias e produtos
$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
$products = $pdo->query("SELECT products.*, categories.name as category_name FROM products JOIN categories ON products.category_id = categories.id")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!--NÃO ALTERAR-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenção de Equipamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/manuten.css">
    <!--NÃO ALTERAR-->
    <!--ADICIONE ICONS, CSS ABAIXO-->
</head>

<body>
    <!--NÃO ALTERAR NAV BAR-->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar">
                <div class="logo">
                    <h2 class="text-center text-white"><img src="logo.jpeg" width="50%"></h2>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Produtos
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    <li><a href="">Cadastrar Produto</a></li>
                                    <li><a href="">Listar Produtos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Pedidos
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    <li><a href="">Realizar Pedido</a></li>
                                    <li><a href="">Listar Pedidos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Fornecedores
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    <li><a href="">Cadastrar Fornecedor</a></li>
                                    <li><a href="">Listar Fornecedores</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Funcionários
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    <li><a href="">Cadastrar Funcionários</a></li>
                                    <li><a href="">Listar Funcionarios</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Estoque
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    <li><a href="">Atualizar Estoque</a></li>
                                    <li><a href="">Visualizar Estoque</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h5 class="mb-0">
                                <button class="btn btn-link Z" type="button" data-toggle="collapse"
                                    data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Equipamentos
                                </button>
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    <li><a href="">Registrar Equipamentos</a></li>
                                    <li><a href="">Listar Equipamentos</a></li>
                                    <li><a href="">Equipamentos em Mantenção</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!--NÃO ALTERAR-->
            <main class="col-md-10 main-content">
                <div class="header">
                    <h1>Manutenção de Equipamentos</h1>
                    <div class="user-info">
                        <img src="https://via.placeholder.com/40" alt="User Avatar">
                        <div class="text">
                            <p>Funcionário666</p>
                            <p>Função xyz</p>
                        </div>
                    </div>
                </div>
                <!--NÃO ALTERAR-->
                <!--ADICIONE OS CAMPOS ABAIXO-->
                <Form id="formulario" method="POST">
                    <div class="box" id="box">
                        <form id="add-pedido">
                            <br><div class="form-floating">
                                <textarea class="form-control" id="nome_equip"></textarea>
                                <label for="floatingTextarea2"><p>Equipamento</p></label required>
                            </div><br>
                            <div class="form-floating">
                                <textarea class="form-control"  id="descricao_prob"></textarea>
                                <label for="floatingTextarea2"><p>Descrição do Problema</p></label required>
                            </div><br>
                            <label for="date">Inicio:</label>
                            <input id="datein" type="date" required/>
                            <label for="date">Termino:</label>
                            <input id="dateter" type="date" required/><br><br>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="tecnico_res"></textarea>
                                <label for="floatingTextarea2"><p>Técnico Responsavel</p></label required>
                            </div><br>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelectGrid" aria-label="Float" required>
                                    <?php foreach ($manutencoes as $equipamento): ?>
                                      <option value="<?= $manutencoes['status'] ?>"><?= $manutencoes['status'] ?></option>
                                    <?php endforeach; ?>
                                    </select><br>
                                    <label for="floatingSelectGrid"><p>Status do Equipamento</p></label required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><p>Adicionar Equipamento</p></button>
                        </form>
                            <tbody id="pedidos-list">
                                <!-- Aqui serão adicionados os pedidos -->
                            </tbody>
                        </table>

                    </div>
                </Form>


                <!--NÃO ALTERAR-->
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!--NÃO ALTERAR-->
    <!--ADICIONE O JS ABAIXO-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="src/js/login.css"></script>
</body>

</html>