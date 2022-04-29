<?php require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/ProfessorController.php';

$arrayProfessores = ProfessorController::listarProfessores($con);

?>

<table class="table table-dark mx-auto" style="width: 700px">
    <thead>
        <tr>
            <th>#id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Curso</th>
            <th>Institução</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($arrayProfessores as $professor) {?>
        <tr>
            <td><?php echo $professor['id']?></td>
            <td><?php echo $professor['nome']?></td>
            <td><?php echo $professor['cpf']?></td>
            <td><?php echo $professor['curso']?></td>
            <td><?php echo $professor['instituicao']?></td>
            <td>
                <button class="btn btn-warning">Editar</button>
                <button class="btn btn-danger deletar" data-acao2='professor' data-id =<?php echo $professor['id'];?> data-tabela='tbprofessor'>Excluir</button>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>
<script src="painel.js"></script>