<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>

<body>
    <div class="container">
    <?php include("menu.php") ?>

        <form action="../controller/ControllerCadastro.php" method="POST" name="form" onsubmit="document.form.submit()">
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
                            <input type="text" name="nome" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($nome) && ($nome != null || $nome != "")) ? $nome : '';

                            ?>" class="form-control"/>
                        </div>
                        <label for="cpf" class="col-2 col-form-label text-right">CPF:</label>
                        <div class="col-4">
                            <input type="text" name="cpf" value="<?php
                            // Preenche o cpf no campo contato com um valor "value"
                            echo (isset($cpf) && ($cpf != null || $cpf != "")) ? $cpf : '';

                            ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="endereco" class="col-2 col-form-label text-right">Endereço:</label>
                        <div class="col-4">
                            <input type="text" name="endereco" value="<?php
                            // Preenche o email no campo contato com um valor "value"
                            echo (isset($endereco) && ($endereco != null || $endereco != "")) ? $endereco : '';

                            ?>" class="form-control" />
                        </div>
                        <label for="cnpj" class="col-sm-2 col-form-label text-right">CNPJ:</label>
                        <div class="col-4">
                            <input type="text" name="cnpj" value="<?php
                            // Preenche o email no campo cnpj com um valor "value"
                            echo (isset($cnpj) && ($cnpj != null || $cnpj != "")) ? $cnpj : '';

                            ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-2 col-form-label text-right">E-mail:</label>
                        <div class="col-4">
                            <input type="text" name="email" value="<?php
                            // Preenche o celular no campo email com um valor "value"

                            echo (isset($email) && ($email != null || $email != "")) ? $email : '';

                            ?>" class="form-control" />
                        </div>
                        <label for="telefone" class="col-sm-2 col-form-label text-right">Telefone:</label>
                        <div class="col-4">
                            <input type="text" name="telefone" value="<?php
                            // Preenche o celular no campo telefone com um valor "value"
                            echo (isset($telefone) && ($telefone != null || $telefone != "")) ? $telefone : '';

                            ?>" class="form-control" />
                        </div>                                    
                    </div>
                    <div class="form-group row">
						<label for="senha" class="col-sm-2 col-form-label text-right">Senha:</label>
                        <div class="col-4">
                            <input type="password" name="senha" value="<?php
                            // Preenche o celular no campo telefone com um valor "value"
                            echo (isset($senha) && ($senha != null || $telefone != "")) ? $telefone : '';

                            ?>" class="form-control" />
                        </div>  
                        <label for="razao_social" class="col-2 col-form-label text-right">Razão Social:</label>
                        <div class="col-4">
                            <input type="text" name="razao_social" value="<?php
                            // Preenche o celular no campo razao social com um valor "value"
                            echo (isset($razao_social) && ($razao_social != null || $razao_social != "")) ? $razao_social : '';

                            ?>" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="clearfix">
                        <div class="float-right">
                            <button type="submit" id="cadastrar" class="btn btn-primary"><i class="fas fa-check mr-1"></i>Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>