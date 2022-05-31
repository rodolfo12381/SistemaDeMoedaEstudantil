<?php require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/EmpresaController.php';
require_once('../../Controller/VantagensController.php');

$arrayVantagens = VantagensController::listarVantagemPorId($con,$_SESSION['usuarioID']);
$i = 0;
?>
<div class="form-group lg-6 ml-5">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastraProduto">
        Adicionar Produtos
    </button>
    <div class="modal fade" id="modalCadastraProduto" tabindex="-1" role="dialog" aria-labelledby="modalCadastraProdutoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-dark" id="modalCadastraProdutoLabel">Cadastrar Vantagem</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../cadastro/actionEmpresa.php" method="POST" enctype="multipart/form-data">
                        <div class="form-row pt-4">
                            <label for="nome" class="col-4"><span class="text-dark">Nome: </span></label>
                            <input class="form-control col-8" type="text" name="produto[nome]">
                        </div>
                        <div class="form-row pt-4">
                            <label for="nome" class="col-4"><span class="text-dark">Descrição: </span></label>
                            <input class="form-control col-8" type="text" name="produto[descricao]">
                        </div>
                        <div class="form-row pt-4">
                            <label for="nome" class="col-4"><span class="text-dark">Custo: </span></label>
                            <input class="form-control col-8" type="text" name="produto[custo]">
                        </div>
                        <div class="form-row pt-4">
                            <label for="nome" class="col-4"><span class="text-dark">Imagem: </span></label>
                            <input class="form-control col-8" type="file" name="imagem">
                        </div>
                        <input type="hidden" name="produto[id]" value="<?php echo $_SESSION['usuarioID']; ?>">
                        <div class="form-row d-flex justify-content-center pt-3">
                            <button class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table table-dark mx-auto" style="width: 1100px;">
    <thead>
        <tr>
            <th>#id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Custo</th>
            <th>Foto</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($arrayVantagens as $vantagem) {
            $i++;
        ?>
            <tr>
                <td><?php echo $vantagem['id'] ?></td>
                <td><?php echo $vantagem['nome'] ?></td>
                <td><?php echo $vantagem['descricao'] ?></td>
                <td><?php echo $vantagem['custo'] ?></td>
                <td> <img src="../../config/cms/uploads/<?php echo $vantagem['foto'] ?>" style="width: 300px; height: 200px"></td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditarProduto<?php echo $i; ?>">
                        Editar
                    </button>
                    <div class="modal fade" id="modalEditarProduto<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditarProdutoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title text-dark" id="modalEditarProdutoLabel">Editar Vantagem</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../cadastro/actionEmpresa.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-row pt-4">
                                            <label for="nome" class="col-4"><span class="text-dark">Nome: </span></label>
                                            <input class="form-control col-8" type="text" name="produtoEditar[atualiza][nome]" value="<?php echo $vantagem['nome'] ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="nome" class="col-4"><span class="text-dark">Descrição: </span></label>
                                            <input class="form-control col-8" type="text" name="produtoEditar[atualiza][descricao]" value="<?php echo $vantagem['descricao'] ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="nome" class="col-4"><span class="text-dark">Custo: </span></label>
                                            <input class="form-control col-8" type="text" name="produtoEditar[atualiza][custo]" value="<?php echo $vantagem['custo'] ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="nome" class="col-4"><span class="text-dark">Imagem: </span></label>
                                            <input class="form-control col-8" type="file" name="imagemAtualiza">
                                        </div>
                                        <input type="hidden" name="produtoEditar[atualiza][id]" value="<?php echo $_SESSION['usuarioID']; ?>">
                                        <input type="hidden" name="produtoEditar[atualiza][id_vantagem]" value="<?php echo $vantagem['id']; ?>">
                                        <div class="form-row d-flex justify-content-center pt-3">
                                            <button class="btn btn-primary">Atualizar</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger deletar" data-acao2='vantagem' data-id=<?php echo $vantagem['id']; ?> data-tabela='tbvantagem'>Excluir</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script src="painel.js"></script>