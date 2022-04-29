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
    <title>Sa Diri / Articolo</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column min-vh-100 " style="background-color: #d3d3d32e">
    <header class="bg-light border-bottom">
        <div class="container">
            <div class="text-center">
                <h1 class="fw-bolder">Sa Diri</h1>
                <p class="lead mb-0">L'infomazione a portata di click</p>
            </div>
        </div>
    </header>
    <!-- -----------------------------------------------------NAV-BAR----------------------------------------------------------------------     -->
    <nav class="navbar navbar-expand-lg px-5 sticky-top bg-danger navbar-dark"
        style="box-shadow: 0px 0px 5px 0px #000000;">
        <div class="container-fluid">
            <span></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold;" href="index.php">Home </a> </li>
                    <li class="nav-item"><a class="nav-link" href="ultimaora.php"> Ultima ora</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">Categorie</a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <div class="d-flex flex-row flex-wrap " style="min-width: 20em;">
                                <?php
                                    $query="
                                        SELECT ID_CATEGORIA
                                        FROM categorie
                                    ";
                                    $recordSet=mysqli_query($link,$query);
                                    while($record=mysqli_fetch_array($recordSet)){
                                            
                                        $id=$record[0];

                                        $query1="
                                        SELECT NOME, ID_CATEGORIA
                                        FROM categorie
                                        WHERE ID_CATEGORIA='$id';
                                        ";

                                        $ris1 = mysqli_query($link,$query1);
                                        $array1=mysqli_fetch_array($ris1);
                                        
                                        print'
                                        <form method="get" action="categorie.php" style="width: 33%;">
                                        <input style="display: none;" name="nomee" value="'.$array1["NOME"].'">
                                        <button type="submit" class="list-group-item list-group-item-action border-0 justify-content-center d-flex" name="id" value="'.$array1["ID_CATEGORIA"].'">
                                        '.$array1["NOME"].'</button>
                                        </form>';
                                    }
                                ?>
                            </div>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <div class="form-check form-switch nav-link">
                            <label class="form-check-label" for="lightSwitch">🌓</label>
                            <input class="form-check-input" type="checkbox" id="lightSwitch" />
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> Area personale </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php
                                if(isset($_SESSION['logged'])){
                                    $N=$_SESSION["nick"];
                                    print"<li class=\"dropdown-header\">$N</li>";
                                }else{
                                    print"<li class=\"dropdown-header\">Non registrato</li>";
                                }
                                
                                if(isset($_SESSION['logged']) && $_SESSION["grade"]>=1){
                                    print"<li><a class=\"dropdown-item\" href=\"admin_home.php\"> Admin</a></li>";
                                }

                                if(isset($_SESSION['logged'])){
                                    $N=$_SESSION["nick"];
                                    print"<li><a class=\"dropdown-item\" href=\"destroysession.php\"> Log out</a></li>";
                                }else{
                                    print"<li><a class=\"dropdown-item\" href=\"Login.php\"> Accedi/Registrati</a></li>";
                                }
                                
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
    <div class="container my-lg-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="container ">
                    <div class="card border-1 m-4">
                        <?php
                            $id = $_GET["ide"];
                            if(!empty($id)){
                                include ("config.php");
                                ///prende gli attributi dell'articolo che rispettano l'id
                                $query="
                                SELECT TITOLO,SOTTOTITOLO,TESTO,DATA_CREAZIONE,DATA_MODIFICA,FONTE,ID_UTENTE
                                FROM articoli 
                                where ID_ARTICOLO=$id;
                                ";
                                $ris = mysqli_query($link,$query);
                                if($ris){
                                    $array=mysqli_fetch_array($ris);
                                    ///prende le immagini dal db che hanno come id articolo id
                                    $query1="
                                    SELECT NOME,DESCRIZIONE 
                                    FROM immagini 
                                    where ID_ARTICOLO=$id;
                                    ";
                                    $ris = mysqli_query($link,$query1);
                                    $array1=mysqli_fetch_array($ris);

                                    ///prende l'id dell'utente
                                    $k=$array['ID_UTENTE'];
                                    ///prende nome e cognome dell'utente che ha quel id
                                    $query2="
                                    SELECT NOME,COGNOME 
                                    FROM utenti
                                    where ID_UTENTE=$k;
                                    ";
                                    $ris = mysqli_query($link,$query2);
                                    $array2=mysqli_fetch_array($ris);
                                    ///prende le categorie che hanno quell'id
                                    $query3="
                                    SELECT ID_CATEGORIA
                                    FROM categorie_articoli
                                    WHERE ID_ARTICOLO=$id
                                    ";
                                    $ris = mysqli_query($link,$query3);
                                    $categ="";
                                    while($array3=mysqli_fetch_array($ris)){
                                        $j=$array3[0];
                                        $query4="
                                        SELECT NOME
                                        FROM categorie
                                        WHERE ID_CATEGORIA=$j
                                        ";
                                        $riss = mysqli_query($link,$query4);
                                        $array4=mysqli_fetch_array($riss);
                                        $idr=$array4[0];
                                        $categ.="<span class=\"badge rounded-pill border bg-light p-2\">$idr</span>";
                                        
                                    }    
                                    print'
                                    <div class="card-body">
                                        <h1>'.$array["TITOLO"].'</h1>
                                        <h3>'.$array["SOTTOTITOLO"].'</h3>
                                        <div class="card-text"><small class="text-muted"><b> '.$array["DATA_CREAZIONE"].'</b> </small></div>
                                        <img class="card-img-top" src="Immagini_articolo\\'.$array1["NOME"].'" />
                                        <div class="card-text">'.$array1["DESCRIZIONE"].'</div>
                                        <div class="card-text my-5" style="text-align: justify;">'.$array["TESTO"].'</div>
                                        <div class="card-text"><b>Fonte:</b> '.$array["FONTE"].'</div>
                                        <div class="card-text"><br><b>Creatore:</b> '.$array2["NOME"].' '.$array2["COGNOME"].'</div>
                                        <br>'.$categ.'
                                    </div>
                                    ';
                                }else{
                                    //non è presente alcun articolo con quell id
                                } 
                            } else{
                                //id non assegnato
                            }   
                            ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <section class="sticky-top" style="top: 80px; z-index: 1;">
                    <div class="card mb-4">
                        <img class="card-img-top p-3" src="assets/coca cola.JPG" alt="..." />
                    </div>
                    <div class="card mb-4">
                        <img class="card-img-top p-3" src="assets/a.png" alt="..." />
                    </div>
                </section>
            </div>
        </div>
    </div>
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

</html>