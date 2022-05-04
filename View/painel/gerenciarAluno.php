<?php require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/AlunoController.php';
require_once '../../Controller/InstituicaoController.php';
require_once '../../Controller/CursoController.php';

$arrayInstituicoes = InstituicaoController::listarInstituicoes($con);
$arrayCursos = CursoController::listarCursos($con);
$arrayAlunos = AlunoController::listarAlunos($con);

?>

<table class="table table-dark mx-auto" style="width: 1100px">
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
        <?php foreach($arrayAlunos as $aluno) {?>
        <tr>
            <td><?php echo $aluno['id']?></td>
            <td><?php echo $aluno['nome']?></td>
            <td><?php echo $aluno['email']?></td>
            <td><?php echo $aluno['rg']?></td>
            <td><?php echo $aluno['cpf']?></td>
            <td><?php echo $aluno['endereco']?></td>
            <td><?php echo $aluno['curso']?></td>
            <td><?php echo $aluno['instituicao']?></td>
            <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                Editar
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title text-dark" id="exampleModalLabel">Atualizar</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="action.php" method="POST">
                        <div class="form-row pt-4">
                            <label for="nome" class="col-4 text-dark">Nome:</label>
                            <input class="form-control col-8" type="text" name="data[nome]" id="nome" value="<?php echo $aluno['nome']?>">
                        </div>
                        <div class="form-row pt-4">
                            <label for="email" class="col-4 text-dark">Email:</label>
                            <input class="form-control col-8" type="email" name="data[email]" id="email" value="<?php echo $aluno['email']?>">
                        </div>
                        <div class="form-row pt-4">
                            <label for="cpf" class="col-4 text-dark">CPF:</label>
                            <input class="form-control col-8" type="text" name="data[cpf]" id="cpf" value="<?php echo $aluno['cpf']?>">
                        </div>
                        <div class="form-row pt-4">
                            <label for="rg" class="col-4 text-dark">RG:</label>
                            <input class="form-control col-8" type="text" name="data[rg]" id="rg" value="<?php echo $aluno['rg']?>">
                        </div>
                        <div  class="form-row pt-4">
                            <label for="endereco" class="col-4 text-dark">Endereço:</label>
                            <input class="form-control col-8" type="text" name="data[endereco]" id="endereco" value="<?php echo $aluno['endereco']?>">
                        </div>
                        <div  class="form-row pt-4">
                            <label for="instituicao" class="col-4 text-dark">Instituição de Ensino:</label>
                            <select name="data[instituicao]" id="instituicao" class="form-control col-8">
                                <option value=""><?php echo $aluno['instituicao']?></option>
                                <?php
                                    foreach($arrayInstituicoes as $instituicao) {
                                ?>
                                    <option value="<?php echo $instituicao['id'] ?>"> <?php echo $instituicao['nome']."-".$instituicao['sigla'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div  class="form-row pt-4">
                            <label for="curso" class="col-4 text-dark">Curso:</label>
                            <select name="data[curso]" id="curso" class="form-control col-8">
                                <option value=""><?php echo $aluno['curso']?></option>
                                <?php 
                                    foreach($arrayCursos as $curso) {
                                ?>
                                    <option value="<?php echo $curso['id'] ?>"> <?php echo $curso['nome'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-row pt-4">
                            <label for="senha" class="col-4 text-dark">Senha:</label>
                            <input class="form-control col-8" type="password" name="data[senha]" id="senha">
                        </div>
                        <div class="form-row d-flex justify-content-center pt-3">
                            <button class="btn btn-primary" id="btn-cadastro-Aluno">Cadastrar</button>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Atualizar</button>
                    </div>
                    </div>
                </div>
                </div>
                <button class="btn btn-danger deletar" data-acao2='usuario'data-id =<?php echo $aluno['id'];?> data-tabela='tbusuario'>Excluir</button>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>

<script src="painel.js"></script>