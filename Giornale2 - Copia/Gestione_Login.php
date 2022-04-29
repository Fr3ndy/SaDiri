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
    $email=$_POST['email'];
    $p=$_POST['pswd'];

    //dichiaro la variabile errore
    $err=false;

    //creo le variabili di sessione degli errori e della email
    $_SESSION['E_email1'] = "";
    $_SESSION['E_pass1'] = "";
    $_SESSION['email1'] = "";

    //verifico se le informazioni rispettano delle caratteristiche
    if(empty($email)){
        $err=true;
        $_SESSION['E_email1'] = "La email non può essere vuota";
    }

    if(empty($p)){
        $err=true;
        $_SESSION['E_pass1'] = "La password non può essere vuota";
    }
    //verifico se ci sono errori o meno
    if(!$err){
        //includo il collegamento al db
        include ("config.php");
        //assegno la criptografia alla password
        $pswcript=md5($p);
        //verifico se l'utente è registrato
        $query="select * from utenti where EMAIL=\"$email\" and PASS=\"$pswcript\"";
        $ris=mysqli_query($link,$query);
        //verifico se ho una risposta dal db
        if ($ris)
        {
            //conto i risultati ricevuti
            $conta=mysqli_num_rows($ris);
            if ($conta==1)
            {
                //se il risultato è corretto
                header("Location:index.php");
                $_SESSION['E_email1'] = "";
                $_SESSION['E_pass1'] = "";
                $_SESSION['email1'] = "";

                $array=mysqli_fetch_array($ris);

                session_start();
                $_SESSION['nick'] = $array['NOME']." ".$array['COGNOME'];
                $_SESSION['logged']=1;
                $_SESSION['grade']=$array['GRADO'];
                $_SESSION['id']=$array['ID_UTENTE'];
            }
            else
            {
                //se il risultato è sbagliato
                $_SESSION['E_email1'] = "Le credenziali non sono corrette";
                $_SESSION['email1'] = $email;
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
        else
        {
            //errore di risposta del db
            $_SESSION['E_email1'] = "Si è verificato un errore , riprova";
        }
    }else{
        //se sono presenti errori
        $_SESSION['email1'] = $email;
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }      
?>