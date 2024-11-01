<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <?php include_once "header.php"; ?>
    <?php include_once "conect.php"; ?>

    <main class="container">

    <h1>Clientes</h1>

    <a href="forminsere.php" class="#01579b light-blue darken-4 waves-effect waves-light btn"><i class="material-icons right">add</i>Inserir</a>

        <br> <br>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Data de Nascimetnto</th>
                    <th>Operação</th>
                </tr>
            </thead>

            <tbody>

                <?php $sql = "SELECT * FROM clientes";
                $resultado = mysqli_query($conexao, $sql);
                while ($linha = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td> <?php echo $linha['id']; ?> </td>
                        <td> <?php echo $linha['CPF']; ?> </td>
                        <td> <?php echo $linha['nomeCliente']; ?> </td>
                        <td> <?php $dataNasc = date('d/m/y', strtotime($linha['dataNasc']));
                                echo $dataNasc; ?> </td>
                        <td> <a href="#modal<?php echo $linha['id']; ?>" class="btn-floating btn-medium waves-effect waves-light #bf360c deep-orange darken-4 modal-trigger"><i class="material-icons">delete</i></a> </td>


                        <div id="modal<?php echo $linha['id']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>Atenção</h4>
                                <p>Tu quer excluir esse cara?
                                <h6> <?php echo $linha['nomeCliente']; ?> </h6>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <form action="excluir.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">

                                    <button type="button" name="btn-cancelar" class="modal-action modal-close waves-red btn #b71c1c red darken-4 darken-1">
                                        Cancelar </button>

                                    <button type="submit" name="btn-deletar" class="modal-action modal-close  btn waves-light #00796b teal darken-2">
                                        Confirmar </button>


                                </form>
                            </div>
                        </div>


                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </main>

    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidnav');
            var instances ;
        })
    </script>

</body>

</html>