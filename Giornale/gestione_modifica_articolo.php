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


$ti = $_POST['titolo'];
$sti = $_POST['sottotitolo'];
$des = $_POST['descrizione'];
$art = $_POST['articolo'];
$fonte=$_POST['fonte'];
$idi = $_POST['idi'];
$revisionato=$_POST['revisionato'];
$visibile=$_POST['visibile'];

$data_modifica=date("Y/m/d H:i:s");



if(!isset($_POST['revisionato'])){
    $revisionato=0;
}
if(!isset($_POST['visibile'])){
    $visibile=0;
}

print"$ti<br>$sti<br>$art,<br>$fonte<br>$revisionato<BR>$visibile";
$cerca = array("'",'"');
$sostituisci = array("&#39;","&#34;");

$art= str_replace($cerca, $sostituisci, $art);
$ti= str_replace($cerca, $sostituisci, $ti);
$sti= str_replace($cerca, $sostituisci, $sti);
$fonte= str_replace($cerca, $sostituisci, $fonte);
$des= str_replace($cerca, $sostituisci, $des);


include ("config.php");

//inserisci in articoli
$query = "
UPDATE articoli SET
TITOLO='$ti',
SOTTOTITOLO='$sti',
DATA_MODIFICA='$data_modifica',
TESTO='$art',
FONTE='$fonte',
VISIBILE=$visibile,
REVISIONATO=$revisionato
where ID_ARTICOLO='$idi';
";
$ris = mysqli_query($link,$query);
        
if($ris){
    print"la queri dovrebbe andare<br>";
}else{
    print"non funge<br>";
}


// ----

$file=$_FILES["img"];
if($_FILES['img']['size'] != 0){
    $target_dir = "Immagini_articolo";
    $f=$file["name"];

    //$ext = pathinfo($file['name'], PATHINFO_EXTENSION);

    move_uploaded_file($file['tmp_name'], $target_dir.DIRECTORY_SEPARATOR."$idi $f");



    //inserisci l'immagine
    $nomefile=$idi." $f";
    $query = "
    update immagini set
    NOME='$nomefile',
    DESCRIZIONE='$des'
    where ID_ARTICOLO='$idi';
    ";
    $ris = mysqli_query($link,$query);
}

// header( "refresh:2;url=index.html" );
print"Successo<br>";

print"<button type=\"button\" onclick=\"javascript:location.href='admin_articoli.php'\" >Torna all'admin</button>"

?>