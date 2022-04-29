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
<?php
    session_start();
    //prelevo le informazioni
    $nome = $_POST['articolo'];
    $imp = $_POST['categoria'];
    
    //dichiaro la variabile errore
    $err=false;

    $_SESSION['E_art'] = "";

    //verifico se ci sono errori o meno
    if(!$err){
        include ("Config.php");
        //prelevo la emeil uguale a quella prelevata
        $query = "
        SELECT ID_CATEGORIA,ID_ARTICOLO
        FROM categorie_articoli
        WHERE ID_CATEGORIA= \"$imp\"
        and ID_ARTICOLO= \"$nome\";
        ";

        $ris = mysqli_query($link,$query);
        $conta=mysqli_num_rows($ris);
        //conto il risultato
        if ($conta==0)
        {
            $query = "
            INSERT INTO categorie_articoli (ID_CATEGORIA,ID_ARTICOLO)
            VALUES('$imp','$nome')
            ";
            $ris = mysqli_query($link,$query);
            
            $_SESSION['E_art'] = "Successo";
            
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
        else
        {
            //se il risultato è sbagliato
            $_SESSION['E_art'] = "associazione già presente";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }  

          
    }else{
        //se sono presenti errori
        $_SESSION['E_art'] = "Errore improvviso";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }    
  
?>