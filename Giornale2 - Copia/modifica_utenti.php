<!-- .
|+-----------------------------------------------------------------------------------------+|
|                                                                                           |
|                               ███████╗██████╗░██████╗░███╗░░██╗██████╗░██╗░░░██╗          |
|                               ██╔════╝██╔══██╗╚════██╗████╗░██║██╔══██╗╚██╗░██╔╝          |
|                               █████╗░░██████╔╝░█████╔╝██╔██╗██║██║░░██║░╚████╔╝░          |
|   █▀▀ █▀█ █▀▄ █▀▀   █▄▄ █▄█   ██╔══╝░░██╔══██╗░╚═══██╗██║╚████║██║░░██║░░╚██╔╝░░          |
|   █▄▄ █▄█ █▄▀ ██▄   █▄█ ░█░   ██║░░░░░██║░░██║██████╔╝██║░╚███║██████╔╝░░░██║░░░          |
|                               ╚═╝░░░░░╚═╝░░╚═╝╚═════╝░╚═╝░░╚══╝╚═════╝░░░░╚═╝░░░          |
|+-----------------------------------------------------------------------------------------+|
|   Code By Fr3ndy 04/2022                                                                  |
|   Big project SaDiri                                                                      |
|   javascript,Html,css(bootstrap 5.1)                                                      |
|                                                                                           |
|+-----------------------------------------------------------------------------------------+|
. -->

<?php session_start(); 
include ("config.php");?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sa Diri / Modifica Utente</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles.css" rel="stylesheet" />

</head>

<body class="d-flex flex-column min-vh-100 ">
    <header class="bg-light border-bottom">
        <div class="container">
            <div class="text-center">
                <h1 class="fw-bolder">Sa Diri</h1>
                <p class="lead mb-0">L'infomazione a portata di click</p>
            </div>
        </div>
    </header>
    <?php
            $id=$_POST['ID'];

            include ("Config.php");
            $query = "
            SELECT ID_UTENTE,NOME,COGNOME,EMAIL,GRADO
            FROM UTENTI
            WHERE ID_UTENTE=$id
            LIMIT 1
            
            ";

            $ris = mysqli_query($link,$query);
            while($array=mysqli_fetch_array($ris)){

            if($array["GRADO"]==1){
                $v="<option selected value=\"1\">Editore</option>
                    <option value=\"2\">Admin</option>";
            }else{
                $v="<option value=\"1\">Editore</option>
                    <option selected value=\"2\">Admin</option>";
            }

            if ($ris)
            {

                print'
                <div class="container">
            <form method="post" action="gestione_modifica_utente.php" enctype="multipart/form-data">
            <div class="d-flex flex-column flex-wrap mr-auto justify-content-center p-2 my-3" >
                <h1>Revisione Utente id: '.$array["ID_UTENTE"].'</h1>
                <input style="display: none;" name="idi" value="'.$array["ID_UTENTE"].'">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">eMail</label>
                    <input type="text" class="form-control " id="exampleFormControlInput1" name="email" placeholder="Email" value="'.$array["EMAIL"].'">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                    <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Nome" name="nome" value="'.$array["NOME"].'">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Cognome</label>
                    <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Cognome" name="cognome" value="'.$array["COGNOME"].'">
                </div>
               
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Grado</label>
                    <select class="form-select" name="grado" aria-label="Default select example">
                    '.$v.'
                    </select>
                </div>
                <div class="mt-5 d-flex flex-row justify-content-between">
                    <button type="button" class="btn btn-danger" onclick="javascript:location.href=\'admin_articoli.php\'">Cancella</button>
                    <button type="submit" class="btn btn-warning">Modifica</button>
                </div>
            </div>
            </form>
        </div>
        <div class="container my-3 d-flex justify-content-center">

            <form method="post" action="Elimina_Utente.php" enctype="multipart/form-data">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina Utente
            </button>
            <input style="display: none;" name="id" value="'.$array["ID_UTENTE"].'">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ATTENZIONE!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare l\'utente
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,Chiudi</button>
                    <button type="submit" class="btn btn-danger">Si sono sicuro</button>
                </div>
                </div>
            </div>
            </div>
            </form>
            </div>

                ';

                    
            }else
            {
                    print "Errore nella query";
                    
            }  
        }
        ?>
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
    <footer class="py-2 bg-dark mt-auto">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <b>SaDiri</b> Fr3ndy 04/2022 <b>Repository:</b> <a
                    href="https://github.com/Fr3ndy/SaDiri">https://github.com/Fr3ndy/SaDiri</a> </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/switch.js"></script>
</body>
<script>
function preview() {
    frame.src = URL.createObjectURL(event.target.files[0]);
}

function clearImage() {
    document.getElementById('formFile').value = null;
    frame.src = "";
}
</script>

</html>