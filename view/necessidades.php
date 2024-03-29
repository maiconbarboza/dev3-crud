<?php require_once("../controller/ControllerListarNecessidades.php");?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include("headNecessidades.php"); ?>

<body>
    <div class="container">
        <?php include("menuNecessidades.php"); ?>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-sm table-striped" style="margin-bottom: 0;">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Prioridade</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php new listarController();  ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>