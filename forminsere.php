<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
    <?php
    include_once "header.php";
    require_once "conect.php";
    ?>
    <main class="container">

        <h1 class="center-align"> Cadastrar </h1>


        <div class="card-panel">
            <div class="row">
                <div class="input-field col s12">
                    <input id="CPF" type="text" class="validate" pattern="^\d{3}\.\d{3}\.\d{3}-\d{2}$" required>
                    <label for="CPF">CPF (XXX.XXX.XXX-XX)</label>
                    <span class="helper-text" data-error="Digita direito!!! XXX.XXX.XXX-XX"></span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="nomeCliente" type="text" class="validate" pattern="[A-Za-z\s]+" required>
                    <label for="nomeCliente">Nome</label>
                    <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="dataNasc" type="text" class="datepicker" name="dataNasc">
                    <label for="dataNasc">Data Nascimento</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <p class="center-align">
                    <button class="btn waves-effect waves-light brown  lighten-3" type="submit" name="action">Submit
                        <i class="material-icons right">send</i> </button>
                </p>
            </div>
        </div>






    </main>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script>
        // Inicializa o date picker
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            M.Datepicker.init(elems, {
                autoClose: true, // Fecha o date picker automaticamente após a seleção
                format: 'dd/mm/yyyy', // Define o formato da data
                yearRange: [1900, 2100], // Define o intervalo de anos
                onSelect: function(date) {
                    console.log('Data selecionada: ', date);
                }
            });
        });
    </script>
</body>

</html>