<?php require_once 'C:/programas_php/htdocs/workspace/lab03/Controller/EmpresaController.php';

$arrayEmpresas = EmpresaController::listarEmpresas($con);

?>
<table class="table table-dark mx-auto" style="width: 600px;">
    <thead>
        <tr>
            <th>#id</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($arrayEmpresas as $empresa) {?>
        <tr>
            <td><?php echo $empresa['id']?></td>
            <td><?php echo $empresa['nome']?></td>            
            <td>
                <button class="btn btn-primary">Visualizar Produtos</button>
                <button class="btn btn-warning">Editar</button>
                <button class="btn btn-danger deletar" data-acao2='empresa' data-id =<?php echo $empresa['id'];?> data-tabela='tbempresa'>Excluir</button>
            </td>
        </tr>
    <?php }?>    
    </tbody>
</table>
<script src="painel.js"></script>