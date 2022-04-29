<?php require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/AlunoController.php';

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
                <button class="btn btn-warning">Editar</button>
                <button class="btn btn-danger deletar" data-acao2='usuario'data-id =<?php echo $aluno['id'];?> data-tabela='tbusuario'>Excluir</button>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>
<script src="painel.js"></script>