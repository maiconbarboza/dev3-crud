<?php
/**
 * Projeto de aplicação CRUD utilizando PDO - Agenda de Contatos
 *
 * Alexandre Bezerra Barbosa
 */
// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $cpf = filter_input(INPUT_POST, 'cpf');
    $endereco = filter_input(INPUT_POST, 'endereco');
    $cnpj = filter_input(INPUT_POST, 'cnpj');
    $email = filter_input(INPUT_POST, 'email');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $razao_social = filter_input(INPUT_POST, 'razao_social');
} else if (!isset($id)) {
// Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
}

// Cria a conexão com o banco de dados
try {
    $conexao = new PDO("mysql:host=localhost;dbname=lar_sao_vicente", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "<p class=\"bg-danger\">Erro na conexão:" . $erro->getMessage() . "</p>";
}

// Bloco If que Salva os dados no Banco - atua como Create e Update
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    try {
        if ($id != "") {
            $stmt = $conexao->prepare("UPDATE usuarios SET nome=?, cpf=?,endereco=?, cnpj=?, email=?, telefone=?, razao_social=? WHERE id = ?");
            $stmt->bindParam(10, $id);
        } else {
            $stmt = $conexao->prepare("INSERT INTO usuarios (nome, cpf, endereco, cnpj, email, telefone, razao_social) VALUES (?, ?, ?, ?, ?, ?, ?)");
        }
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $cpf);
        $stmt->bindParam(3, $endereco);
        $stmt->bindParam(4, $cnpj);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $telefone);
        $stmt->bindParam(9, $razao_social);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $id = null;
                $nome = null;
                $cpf = null;
                $endereco = null;
                $cnpj = null;
                $email = null;
                $telefone = null;
                $razao_social = null;
            } else {
                echo "<p class=\"bg-danger\">Erro ao tentar efetivar cadastro</p>";
            }
        } else {
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}

// Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $id = $rs->id;
            $nome = $rs->nome;
            $cpf = $rs->cpf;
            $endereco = $rs->endereco;
            $cnpj = $rs->cnpj;
            $email = $rs->email;
            $telefone = $rs->telefone;
            $razao_social = $rs->razao_social;
        } else {
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}

// Bloco if utilizado pela etapa Delete
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "<p class=\"bg-success\">Registo foi excluído com êxito</p>";
            $id = null;
        } else {
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" >
        <title>Lista de usuários</title>
        <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet" />
        <script src="assets/js/bootstrap.js" type="text/javascript" ></script>
    </head>
    <body>
        <div class="container">
            <header class="row">
                <br />
            </header>
            <article>
                <div class="row">
                    <form action="?act=save" method="POST" name="form1" class="form-horizontal" >
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="panel-title">Dados</span>
                            </div>
                            <div class="panel-body">

                                <input type="hidden" name="id" value="<?php
                                // Preenche o id no campo id com um valor "value"
                                echo (isset($id) && ($id != null || $id != "")) ? $id : '';

                                ?>" />
                                <div class="form-group">
                                    <label for="nome" class="col-sm-1 control-label">Nome:</label>
                                    <div class="col-md-5">
                                        <input type="text" name="nome" value="<?php
                                        // Preenche o nome no campo nome com um valor "value"
                                        echo (isset($nome) && ($nome != null || $nome != "")) ? $nome : '';

                                        ?>" class="form-control"/>
                                    </div>
                                    <label for="cpf" class="col-sm-1 control-label">CPF:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="cpf" value="<?php
                                        // Preenche o cpf no campo contato com um valor "value"
                                        echo (isset($cpf) && ($cpf != null || $cpf != "")) ? $cpf : '';

                                        ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="endereco" class="col-sm-1 control-label">Endereço:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="endereco" value="<?php
                                        // Preenche o email no campo contato com um valor "value"
                                        echo (isset($endereco) && ($endereco != null || $endereco != "")) ? $endereco : '';

                                        ?>" class="form-control" />
                                    </div>
                                    <label for="cnpj" class="col-sm-2 control-label">CNPJ:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="cnpj" value="<?php
                                        // Preenche o email no campo cnpj com um valor "value"
                                        echo (isset($cnpj) && ($cnpj != null || $cnpj != "")) ? $cnpj : '';

                                        ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-1 control-label">E-mail:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="email" value="<?php
                                        // Preenche o celular no campo email com um valor "value"

                                        echo (isset($email) && ($email != null || $email != "")) ? $email : '';

                                        ?>" class="form-control" />
                                    </div>
                                    <label for="telefone" class="col-sm-2 control-label">Telefone:</label>
                                    <div class="col-md-2">
                                        <input type="text" name="telefone" value="<?php
                                        // Preenche o celular no campo telefone com um valor "value"
                                        echo (isset($telefone) && ($telefone != null || $telefone != "")) ? $telefone : '';

                                        ?>" class="form-control" />
                                    </div>                                    
                                </div>
                                <div class="form-group">
                                    <label for="razao_social" class="col-sm-1 control-label">Razão Social:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="razao_social" value="<?php
                                        // Preenche o celular no campo razao social com um valor "value"
                                        echo (isset($razao_social) && ($razao_social != null || $razao_social != "")) ? $razao_social : '';

                                        ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="clearfix">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary" /><span class="glyphicon glyphicon-ok"></span> salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th>Razão Social</th>
                                    <th>Email</th>
                                    <th>CNPJ</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                /**
                                 *  Bloco que realiza o papel do Read - recupera os dados e apresenta na tela
                                 */
                                try {
                                    $stmt = $conexao->prepare("SELECT * FROM usuarios");
                                    if ($stmt->execute()) {
                                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {

                                            ?><tr>
                                                <td><?php echo $rs->nome; ?></td>
                                                <td><?php echo $rs->cpf; ?></td>
                                                <td><?php echo $rs->endereco; ?></td>
                                                <td><?php echo $rs->telefone; ?></td>
                                                <td><?php echo $rs->razao_social; ?></td>
												<td><?php echo $rs->email; ?></td>
												<td><?php echo $rs->cnpj; ?></td>
                                                <td><center>
                                            <a href="?act=upd&id=<?php echo $rs->id; ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                            <a href="?act=del&id=<?php echo $rs->id; ?>" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-remove"></span> Excluir</a>
                                        </center>
                                        </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "Erro: Não foi possível recuperar os dados do banco de dados";
                                }
                            } catch (PDOException $erro) {
                                echo "Erro: " . $erro->getMessage();
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
    </body>
</html>
