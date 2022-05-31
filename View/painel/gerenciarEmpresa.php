<?php 
require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/EmpresaController.php';
require_once('../../Controller/VantagensController.php');
require_once ('gravarImagem.php');

$arrayEmpresas = EmpresaController::listarEmpresas($con);
$i = 0;
$j = 0;
?>
<div class="form-group lg-6 ml-5">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">
        Adicionar Empresa
    </button>
    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-dark" id="modalCadastroLabel">Cadastrar Empresa</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../cadastro/actionEmpresa.php" method="POST">
                        <div class="form-row pt-4">
                            <label for="nome" class="col-4">Nome:</label>
                            <input class="form-control col-8" type="text" name="data[nome]" id="nome">
                        </div>
                        <div class="form-row pt-4">
                            <label for="cnpj" class="col-4">CNPJ:</label>
                            <input class="form-control col-8" type="text" name="data[cnpj]" id="cnpj">
                        </div>
                        <div class="form-row pt-4">
                            <label for="email" class="col-4">Email:</label>
                            <input class="form-control col-8" type="text" name="data[email]" id="email">
                        </div>
                        <div class="form-row pt-4">
                            <label for="senha" class="col-4">Senha:</label>
                            <input class="form-control col-8" type="password" name="data[senha]" id="senha">
                        </div>
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
            <th>Email</th>
            <th>CNPJ</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($arrayEmpresas as $empresa) {
            $i++;
        ?>
            <tr>
                <td><?php echo $empresa['id'] ?></td>
                <td><?php echo $empresa['nome'] ?></td>
                <td><?php echo $empresa['email'] ?></td>
                <td><?php echo $empresa['cnpj'] ?></td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAtualiza<?php echo $i; ?>">
                        Editar
                    </button>
                    <div class="modal fade" id="modalAtualiza<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modalAtualizaLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title text-dark" id="modalAtualizaLabel">Editar Empresa</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../cadastro/actionEmpresa.php" method="POST">
                                        <div class="form-row pt-4">
                                            <label for="nome" class="col-4"><span class="text-dark">Nome: </span></label>
                                            <input class="form-control col-8" type="text" name="atualiza[nome]" id="nomeAtualiza" value="<?php echo $empresa['nome']; ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="email" class="col-4"><span class="text-dark">Email: </span></label>
                                            <input class="form-control col-8" type="text" name="atualiza[email]" id="emailAtualiza" value="<?php echo $empresa['email']; ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="senha" class="col-4"><span class="text-dark">Senha: </span></label>
                                            <input class="form-control col-8" type="password" name="atualiza[senha]" id="senhaAtualiza" value="<?php echo $empresa['senha']; ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="cnpj" class="col-4"><span class="text-dark">CNPJ: </span></label>
                                            <input class="form-control col-8" type="text" name="atualiza[cnpj]" id="cnpjAtualiza" value="<?php echo $empresa['cnpj']; ?>">
                                        </div>
                                        <input type="hidden" name="atualiza[id]" value="<?php echo $empresa['id']; ?>">
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
                    <button class="btn btn-danger deletar" data-acao2='empresa' data-id=<?php echo $empresa['id']; ?> data-tabela='tbempresa'>Excluir</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCadastraProduto<?php echo $i; ?>">
                        Adicionar Produtos
                    </button>
                    <div class="modal fade" id="modalCadastraProduto<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modalCadastraProdutoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title text-dark" id="modalCadastraProdutoLabel">Cadastrar Produto</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../cadastro/actionEmpresa.php" method="POST">
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
                                            <input class="form-control col-8" type="text" name="produto[imagem]">
                                        </div>
                                        <input type="hidden" name="produto[id]" value="<?php echo $empresa['id']; ?>">
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVisualiza<?php echo $i; ?>">
                        Visualizar Produtos
                    </button>
                    <div class="modal fade" id="modalVisualiza<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modalVisualizaLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title text-dark" id="modalVisualizaLabel">Produtos</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-dark mx-auto bg-dark">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Descrição</th>
                                                <th>Custo</th>
                                                <th>Foto</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $arrayProdutos = VantagensController::listarVantagemPorId($con, $empresa['id']);
                                            foreach ($arrayProdutos as $produto) {
                                                $j++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $produto['id'] ?></td>
                                                    <td><?php echo $produto['nome'] ?></td>
                                                    <td><?php echo $produto['descricao'] ?></td>
                                                    <td><?php echo $produto['custo'] ?></td>
                                                    <td><?php echo $produto['foto'] ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditarProduto<?php echo $j; ?>">
                                                            Editar
                                                        </button>
                                                        <div class="modal fade" id="modalEditarProduto<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditarProdutoLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h2 class="modal-title text-dark" id="modalEditarProdutoLabel">Editar Vantagem</h2>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="../cadastro/actionEmpresa.php" method="POST">
                                                                            <div class="form-row pt-4">
                                                                                <label for="nome" class="col-4"><span class="text-dark">Nome: </span></label>
                                                                                <input class="form-control col-8" type="text" name="produtoEditar[atualiza][nome]" value="<?php echo $produto['nome'] ?>">
                                                                            </div>
                                                                            <div class="form-row pt-4">
                                                                                <label for="nome" class="col-4"><span class="text-dark">Descrição: </span></label>
                                                                                <input class="form-control col-8" type="text" name="produtoEditar[atualiza][descricao]" value="<?php echo $produto['descricao'] ?>">
                                                                            </div>
                                                                            <div class="form-row pt-4">
                                                                                <label for="nome" class="col-4"><span class="text-dark">Custo: </span></label>
                                                                                <input class="form-control col-8" type="text" name="produtoEditar[atualiza][custo]" value="<?php echo $produto['custo'] ?>">
                                                                            </div>
                                                                            <div class="form-row pt-4">
                                                                                <label for="nome" class="col-4"><span class="text-dark">Imagem: </span></label>
                                                                                <input class="form-control col-8" type="text" name="produtoEditar[atualiza][imagem]" value="<?php echo $produto['foto'] ?>">
                                                                            </div>
                                                                            <input type="hidden" name="produtoEditar[atualiza][id]" value="<?php echo $empresa['id']; ?>">
                                                                            <input type="hidden" name="produtoEditar[atualiza][id_vantagem]" value="<?php echo $produto['id']; ?>">
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
                                                        <button class="btn btn-danger deletar" data-acao2='empresa' data-id=<?php echo $produto['id']; ?> data-tabela='tbvantagem'>Excluir</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script src="painel.js"></script>