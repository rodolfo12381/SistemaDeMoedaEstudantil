<?php require_once '../../Controller/AlunoController.php';
require_once '../../Controller/InstituicaoController.php';
require_once '../../Controller/CursoController.php';

$arrayInstituicoes = InstituicaoController::listarInstituicoes($con);
$arrayCursos = CursoController::listarCursos($con);
$arrayAlunos = AlunoController::listarAlunos($con);
$i=0;
?>
<div class="form-group lg-6 ml-5">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">
        Adicionar Aluno
    </button>
    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-dark" id="modalCadastroLabel">Cadastrar Aluno</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../cadastro/action.php" method="POST">
                        <div class="form-row pt-4">
                            <label for="nome" class="col-4">Nome:</label>
                            <input class="form-control col-8" type="text" name="data[nome]" id="nome">
                        </div>
                        <div class="form-row pt-4">
                            <label for="email" class="col-4">Email:</label>
                            <input class="form-control col-8" type="email" name="data[email]" id="email">
                        </div>
                        <div class="form-row pt-4">
                            <label for="cpf" class="col-4">CPF:</label>
                            <input class="form-control col-8" type="text" name="data[cpf]" id="cpf">
                        </div>
                        <div class="form-row pt-4">
                            <label for="rg" class="col-4">RG:</label>
                            <input class="form-control col-8" type="text" name="data[rg]" id="rg">
                        </div>
                        <div class="form-row pt-4">
                            <label for="endereco" class="col-4">Endereço:</label>
                            <input class="form-control col-8" type="text" name="data[endereco]" id="endereco">
                        </div>
                        <div class="form-row pt-4">
                            <label for="instituicao" class="col-4">Instituição de Ensino:</label>
                            <select name="data[instituicao]" id="instituicao" class="form-control col-8">
                                <option value="">--SELECIONE--</option>
                                <?php
                                foreach ($arrayInstituicoes as $instituicao) {
                                ?>
                                    <option value="<?php echo $instituicao['id'] ?>"> <?php echo $instituicao['nome'] . "-" . $instituicao['sigla'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-row pt-4">
                            <label for="curso" class="col-4">Curso:</label>
                            <select name="data[curso]" id="curso" class="form-control col-8">
                                <option value="">--SELECIONE--</option>
                                <?php
                                foreach ($arrayCursos as $curso) {
                                ?>
                                    <option value="<?php echo $curso['id'] ?>"> <?php echo $curso['nome'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-row pt-4">
                            <label for="senha" class="col-4">Senha:</label>
                            <input class="form-control col-8" type="password" name="data[senha]" id="senha">
                        </div>
                        <div class="form-row d-flex justify-content-center pt-3">
                            <button class="btn btn-primary" id="btn-cadastro-Aluno">Cadastrar</button>
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
<table class="table table-dark mx-auto" style="width: 1200px">
    <thead>
        <tr>
            <th>#id</th>
            <th>Nome</th>
            <th>email</th>
            <th>RG</th>
            <th>CPF</th>
            <th>Endereço</th>
            <th>Curso</th>
            <th>Institução</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($arrayAlunos as $aluno) { 
            $i++;
        ?>
            <tr>
                <td><?php echo $aluno['id'] ?></td>
                <td><?php echo $aluno['nome'] ?></td>
                <td><?php echo $aluno['email'] ?></td>
                <td><?php echo $aluno['rg'] ?></td>
                <td><?php echo $aluno['cpf'] ?></td>
                <td><?php echo $aluno['endereco'] ?></td>
                <td><?php 
                    $curso = CursoController::buscarPorId($aluno['curso'],$con);
                    echo $curso[1];
                ?></td>
                <td><?php 
                    $instituicao = InstituicaoController::buscarPorId($aluno['instituicao'],$con);
                    echo $instituicao[2];
                ?></td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modalAtualiza<?php echo $i?>">
                        Editar
                    </button>
                    <div class="modal fade modalAtualiza<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="modalAtualizaLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title text-dark" id="modalAtualizaLabel">Atualizar</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="fmrAtualiza" action="action.php" method="POST">
                                        <div class="form-row pt-4">
                                            <label for="nome" class="col-4 text-dark">Nome:</label>
                                            <input class="form-control col-8" type="text" name="data[nome]" id="nomeAtualiza" value="<?php echo $aluno['nome'] ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="email" class="col-4 text-dark">Email:</label>
                                            <input class="form-control col-8" type="email" name="data[email]" id="emailAtualiza" value="<?php echo $aluno['email'] ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="cpf" class="col-4 text-dark">CPF:</label>
                                            <input class="form-control col-8" type="text" name="data[cpf]" id="cpfAtualiza" value="<?php echo $aluno['cpf'] ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="rg" class="col-4 text-dark">RG:</label>
                                            <input class="form-control col-8" type="text" name="data[rg]" id="rgAtualiza" value="<?php echo $aluno['rg'] ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="endereco" class="col-4 text-dark">Endereço:</label>
                                            <input class="form-control col-8" type="text" name="data[endereco]" id="enderecoAtualiza" value="<?php echo $aluno['endereco'] ?>">
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="instituicao" class="col-4 text-dark">Instituição de Ensino:</label>
                                            <select name="data[instituicao]" id="instituicaoAtualiza" class="form-control col-8">
                                                <option value="<?php echo $aluno['instituicao'] ?>"><?php echo $instituicao[2] ?></option>
                                                <?php
                                                foreach ($arrayInstituicoes as $instituicao) {
                                                ?>
                                                    <option value="<?php echo $instituicao['id'] ?>"> <?php echo $instituicao['nome'] . "-" . $instituicao['sigla'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="curso" class="col-4 text-dark">Curso:</label>
                                            <select name="data[curso]" id="cursoAtualiza" class="form-control col-8">
                                                <?php
                                                $curso = CursoController::buscarPorId($aluno['curso'], $con);
                                                ?>
                                                <option value="<?php echo $aluno['curso'] ?>"><?php echo $curso[1] ?></option>
                                                <?php
                                                foreach ($arrayCursos as $curso) {
                                                ?>
                                                    <option value="<?php echo $curso['id'] ?>"> <?php echo $curso['nome'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row pt-4">
                                            <label for="senha" class="col-4 text-dark">Senha:</label>
                                            <input class="form-control col-8" type="password" name="data[senha]" id="senhaAtualiza" value="<?php echo $aluno['senha'] ?>">
                                        </div>
                                        <input type="hidden" id="idAtualiza" name="data[id]"value="<?php echo $aluno['id'] ?>">
                                        <button id="btn-atualiza" class="btn btn-primary mt-2" style="float: right;">Atualizar</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger deletar" data-acao2='usuario' data-id=<?php echo $aluno['id']; ?> data-tabela='tbusuario'>Excluir</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script src="painel.js"></script>