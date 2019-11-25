<!DOCTYPE HTML>
<html>
<?php include("headNecessidades.php") ?>

<body>
    <div class="container">
    <?php include("menuNecessidades.php") ?>
    <?php require_once("../controller/ControllerEditarNecessidades.php");?>

        <form action="../controller/ControllerEditarNecessidades.php" method="POST" name="form" onsubmit="document.form.submit()">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Dados</span>
                </div>
                <div class="card-body">

                    <input type="hidden" name="id" value="<?php
                    // Preenche o id no campo id com um valor "value"
                    echo (isset($id) && ($id != null || $id != "")) ? $id : '';

                    ?>" />
                    <div class="form-group row">
                        <label for="nome" class="col-2 col-form-label text-right">Nome:</label>
                        <div class="col-4">
                            <input type="text" class="form-control" name="nome" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo $editar->getNome();?>" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo" class="col-2 col-form-label text-right">Tipo:</label>
                        <div class="col-4">
                            <input type="text" name="tipo" value="<?php
                            // Preenche o tipo no campo contato com um valor "value"
                            echo $editar->getTipo();?>" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prioridade" class="col-2 col-form-label text-right">Prioridade:</label>
                        <div class="col-4">
                            <input type="text" name="prioridade" value="<?php
                            // Preenche a prioridade no campo email com um valor "value"

                            echo $editar->getPrioridade();?>" class="form-control" />
                        </div>                                   
                    </div>
                </div>
                <div class="card-footer">
                    <div class="clearfix">
                        <div class="float-right">
                            <button type="submit" id="editar" class="btn btn-primary"><i class="fas fa-check mr-1"></i>Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>