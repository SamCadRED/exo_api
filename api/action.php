<?php
include_once 'calls.php';
include_once '../src/Produits.php';

$id = $_POST['id'];
$produit = new Produit(
    $id,
    $_POST['nom'],
    $_POST['description'],
    $_POST['prix'],
    $_POST['categorie']
);

function addFile($id){
    $dossier = '../data/image/';
    $taille_maxi = 100000000;
    $taille = filesize($_FILES['file']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['file']['name'], '.');
    // Vérifications 
    if(!in_array($extension, $extensions)) { $erreur = 'Format non vailde'; }
    if($taille>$taille_maxi) { $erreur = 'La taille du fichier est supérieure à 1 Mo';}
    //Upload s'il n'y a pas d'erreurs 
    if(!isset($erreur)) {
        if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier."$id.jpg")){
            echo 'Upload effectué avec succès !';
        } else {
            echo 'Echec de l\'upload !';
        }
    }
}

if ($_GET['type'] == "add") {
    $id=getLastId();
    $produit->setId($id);
    $response = addProduct($produit);
    $_FILES ? addFile($id) : null;
}
if ($_GET['type'] == "edit") {
    editProduct($produit);
    $_FILES ? addFile($id) : null;
} 
else if ($_GET['type'] == "delete") {
    deleteProduct($_GET['id']);
    unlink("../data/image/".$_GET['id'].".jpg");
}
else if ($_GET['type'] == "deleteIMG") {
    unlink("../data/image/".$_GET['id'].".jpg");
}

Header('Location: ../index.php');
