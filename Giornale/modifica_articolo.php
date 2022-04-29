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
    <title>Sa Diri / Creazione Articolo</title>
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
            SELECT ID_ARTICOLO,TITOLO,SOTTOTITOLO,DATA_MODIFICA,FONTE,DATA_CREAZIONE,REVISIONATO,VISIBILE,ID_UTENTE,TESTO
            FROM articoli
            WHERE ID_ARTICOLO=$id
            ORDER BY ID_ARTICOLO
            LIMIT 1
            
            ";

            $ris = mysqli_query($link,$query);
            while($array=mysqli_fetch_array($ris)){

            if ($ris)
            {

                $query1="
                    SELECT NOME,DESCRIZIONE 
                    FROM immagini 
                    where ID_ARTICOLO=$id;
                ";
                $ris = mysqli_query($link,$query1);
                $array1=mysqli_fetch_array($ris);



                if($array["REVISIONATO"]==1){
                    $r="<input class=\"form-check-input\" type=\"checkbox\" name=\"revisionato\" id=\"flexSwitchCheckDefault\" value=\"1\" checked>";
                }else{
                    $r="<input class=\"form-check-input\" type=\"checkbox\" name=\"revisionato\" id=\"flexSwitchCheckDefault\" value=\"1\" >";
                }

                if($array["VISIBILE"]==1){
                    $v="<input class=\"form-check-input\" type=\"checkbox\" name=\"visibile\" id=\"flexSwitchCheckDefault\" value=\"1\" checked>";
                }else{
                    $v="<input class=\"form-check-input\" type=\"checkbox\" name=\"visibile\" id=\"flexSwitchCheckDefault\" value=\"1\" >";
                }

                print'
                <div class="container">
            <form method="post" action="gestione_modifica_articolo.php" enctype="multipart/form-data">
            <div class="d-flex flex-column flex-wrap mr-auto justify-content-center p-2 my-3" >
                <h1>Revisione Articolo id: '.$array["ID_ARTICOLO"].'</h1>
                <input style="display: none;" name="idi" value="'.$array["ID_ARTICOLO"].'">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Titolo</label>
                    <input type="text" class="form-control form-control-lg fw-bold" id="exampleFormControlInput1" name="titolo" placeholder="Titolo" value="'.$array["TITOLO"].'">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Sottotitolo</label>
                    <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="SottoTitolo" name="sottotitolo" value="'.$array["SOTTOTITOLO"].'">
                </div>
                <div class="mb-3">
                    <label for="Image" class="form-label">Immagine</label>
                    <input class="form-control" accept="image/*" name="img" type="file" id="formFile" onchange="preview()">
                    <img id="frame" src="Immagini_articolo\\'.$array1["NOME"].'" class="img-fluid mt-3" />
                    <button type="button" onclick="clearImage()" class="btn btn-danger mt-3">Elimina</button>
                    <div class="my-3">
                        <label for="exampleFormControlInput1" class="form-label">Descrizione Foto</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="descrizione" placeholder="Descrizione" value="'.$array1["DESCRIZIONE"].'">
                    </div>
                </div>

                <div class="accordion accordion-flush border my-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <b>Istruzioni</b>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><b>Reindirizzamenti:</b>   &lt;a href="sito" target="_blank" &gt; Testo di reindirizzamento &lt;/a&gt;<br>
                                <b>Torno a capo</b>b> : &lt;br&gt;<br>
                                Si possono usare tutti gli elementi html
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Testo Articolo</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="articolo" >'.$array["TESTO"].'</textarea>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Fonte</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="fonte" placeholder="Fonte" value="'.$array["FONTE"].'">
                </div>
                <div class="form-check form-switch">
                    '.$r.'
                    <label class="form-check-label" for="flexSwitchCheckDefault">Revisionato</label>
                </div>
                <div class="form-check form-switch">
                    '.$v.'
                    <label class="form-check-label" for="flexSwitchCheckDefault">Visibile</label>
                </div>
                <div class="mt-5 d-flex flex-row justify-content-between">
                    <button type="button" class="btn btn-danger" onclick="javascript:location.href=\'admin_articoli.php\'">Cancella</button>
                    <button type="submit" class="btn btn-warning">Modifica</button>
                </div>
            </div>
            </form>
        </div>
        <div class="container my-3 d-flex justify-content-center">
            
                
            

            <form method="post" action="Elimina_articolo.php" enctype="multipart/form-data">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina Articolo
            </button>
            <input style="display: none;" name="id" value="'.$array["ID_ARTICOLO"].'">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ATTENZIONE!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare l\'articolo
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