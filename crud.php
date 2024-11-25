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

    <style>
        /* tamanho da fonte */
        .input-field label {
            font-size: 16px !important;
            /* Forçando o tamanho com !important */
        }



        /* cor label focus  */
        .input-field input:focus+label {
            color: black !important;
        }

        /* cor label underline focus  */
        .row .input-field input:focus {
            border-bottom: 1px solid black !important;
            box-shadow: 0 1px 0 0 black !important
        }

        .material-icons {
            color: black !important;
        }

        .material-icons.active {
            color: black !important;
        }

        /* cor checkbox */
        .checkbox-black[type="checkbox"].filled-in:checked+span:not(.lever):after {
            border: 2px solid #607d8b;
            background-color: #607d8b;
        }

        /* cores do radio */
        [type="radio"]:checked+span:after,
        [type="radio"].with-gap:checked+span:after {
            background-color: black;
        }

        [type="radio"]:checked+span:after,
        [type="radio"].with-gap:checked+span:before,
        [type="radio"].with-gap:checked+span:after {
            border: 2px solid black;
        }

        /*cores do select */
        ul.dropdown-content li>a,
        ul.dropdown-content li>span {
            color: #000000;
            /* Cor do texto das opções */
            /* background-color: #f1f1f1;  Cor de fundo das opções */
        }


        /* Altera a cor do fundo do cabeçalho do Datepicker */
        .datepicker-date-display {
            background-color: #00aaff;
            /* Cor do cabeçalho */
        }

        /* Altera a cor do texto da data selecionada no cabeçalho */
        .datepicker-date-display .year-text,
        .datepicker-date-display .date-text {
            color: #fff;
            /* Cor do texto da data no cabeçalho */
        }

        /* Altera a cor dos dias do calendário */
        .datepicker-table td div {
            color: #333;
            /* Cor dos dias */
        }

        /* Altera a cor de fundo dos dias ao passar o mouse */
        .datepicker-table td div:hover {
            background-color: #ffcc00;
            /* Cor de fundo ao passar o mouse */
            color: #fff;
        }

        /* Altera a cor do dia selecionado */
        .is-selected {
            background-color: #00aaff;
            /* Cor de fundo do dia selecionado */
            color: #fff;
            /* Cor do texto do dia selecionado */
        }

        /* Altera a cor dos botões de navegação (próximo e anterior) */
        .datepicker-controls .datepicker-prev,
        .datepicker-controls .datepicker-next {
            color: #00aaff;
            /* Cor das setas de navegação */
        }
    </style>

</head>

<body>

    <?php include_once "header.php"; ?>



    <form onsubmit="return salvarMitologia(event);">

        <main class="container">

            <h1 class="center-align"> Gerenciamento </h1>
            <div class="card-panel">

                <div class="row">
                    <div class="input-field col s12">
                        <input id="id" name="id" type="text" class="validate" placeholder="ID">

                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="no_mit" name="no_mit" type="text" class="validate" placeholder="Nome da mitologia" pattern="^[A-Za-zÀ-ÿ]+$" required>

                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <input id="no_de" name="no_de" type="text" class="validate" placeholder="Nome do Deus ou Deuses" required>

                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12">

                        <input type="text" name="historia" id="" cols="30" rows="10" placeholder="Mito ou história">
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="input-field col s12">
                        <p>Escolha uma imagem para representar a mitologia:</p>
                        <input type="file" name="arquivo">
                    </div>
                </div> -->

                <div class="row">
                    <div class="col s12">
                        <p class="center-align">
                            <button class="btn waves-effect waves-light brown  lighten-3" type="submit" name="action">Enviar
                                <i class="material-icons right">send</i> </button>
                        </p>
                    </div>
                </div>


        </main>

    </form>

    <br><br><br>

    <!------------------------------------------------- Esta linha separa a tabela com o inserir de novas informações ------------------------------------------------------->

    <main class="container">

        <div class="card-panel">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da mitologia</th>
                        <th>Nome do deus ou deuses</th>
                        <th>História</th>

                        <th cosplan="2">Opções</th>
                    </tr>
                </thead>

                <tbody id="mitologias">

        </div>
        </div>


        </tr>

        </tbody>
        </table>
        </div>
    </main>

    <!-------------------------------------------------------------------------------------------------------->






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




        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

        /*

        var CPF = document.getElementById("CPF");
        CPF.addEventListener("input", function (event) {
          if (CPF.validity) {
            CPF.setCustomValidity(" ");
          } else {
            CPF.setCustomValidity("");
          }
        }); */
    </script>



    <script src="script.js"></script>

</body>

</html>