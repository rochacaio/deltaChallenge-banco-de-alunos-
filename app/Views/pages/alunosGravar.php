<div class="container"> 
    <div class="alert-danger p-3 my-3">
    <?=  \Config\Services::validation()->listErrors();  ?>
    </div>
    <form action="<?= '/alunos/gravar' ?>" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
        <div class="form-group"> 
            <label for="nome"> Nome </label>
            <input type="text" class="form-control" name="nome" value="<?= isset($alunos['nome']) ? $alunos['nome'] : set_value('nome') ?>"/>
        </div>  
        <div class="form-group"> 
            <label for="endereco"> Endereço </label></br>
            <input type="text" class="form-control" name="endereco" value="<?= isset($alunos['endereco']) ? $alunos['endereco'] : set_value('endereco') ?>"/>
         </div>
         <div class="form-group"> 
            <label for="img"> Imagem </label><br/>
            <input type="file" name="img">
         </div>
        <input type="hidden" name="id" value="<?= isset($alunos['id']) ? $alunos['id'] : set_value('id') ?>">
        <input type="submit" name="submit" class="btn btn-primary" value="salvar">
    </form>
</div>