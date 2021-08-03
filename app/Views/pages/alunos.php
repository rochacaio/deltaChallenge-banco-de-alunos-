<div class="container">
<a href="<?= '/alunos/inserir' ?>" class="btn btn-primary">Adicionar novo aluno</a>
    <?php if(!empty($alunos) && is_array($alunos)) : ?>
        <?php foreach($alunos as $alunos_item): ?>
            <div class="card my-5">
                <div class="card-body">
                    <h3> <?= $alunos_item['nome'] ?></h3>
                    <p><?= $alunos_item['endereco'] ?></p>
                </div>
                <div class="card-footer">
                <a href="<?= '/alunos/'.$alunos_item['id'] ?>" class="btn btn-success">Perfil completo</a>
                    <a href="<?= '/alunos/editar/'.$alunos_item['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="<?= '/alunos/excluir/'.$alunos_item['id'] ?>" class="btn btn-danger">Excluir</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum aluno cadastrado ainda</p>
    <?php endif; ?>
</div>