<div class="container">
    <div class="card my-3">
        <div class="card-body">
            <div class="py-4">
            <img src="/img/alunos/<?= $alunos['img'] ?>" alt="" class="img-fluid col-md-6 offset-md-3"></br/>
            <b> Nome completo:</b> <?= $alunos['nome'] ?>
            </div>        
        </div>
        <div class="card-footer">
            <b>Endereço: </b><?= $alunos['endereco'] ?>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
</div>