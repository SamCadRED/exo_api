<?php
include_once 'auth.php';
$GLOBALS['URL'] = 'https://api-test-exo-default-rtdb.europe-west1.firebasedatabase.app/Produits';

function getAllProducts(){
    $query = $GLOBALS['URL'].'.json';

    $get_data = callAPI('GET', $query, false);
    $Products = json_decode($get_data);

    $Produits = array();
    foreach ($Products as $Product) {
        $id = $Product->id;
        $nom = $Product->nom;
        $desc = $Product->description;
        $prix = $Product->prix;
        $cat = $Product->categorie;

        $Produit = new Produit($id,$nom,$desc,$prix,$cat);
        array_push($Produits, $Produit);
    }
    
    $file = 'data/data.json';
    writeToFile($file,$Products);

    return $Produits;
}

function getLastId(){
    $Product = getAllProducts();
    $id = count($Product);
    return $id;
}

function getProduit($id){
    $produits = getAllProducts();
    $produit = $produits[$id];
    //$produit = new Produit($id,$produit['nom'],$produit['desc'],$produit['prix'],$produit['cat']);
    return $produit;
}

function addProduct($produit){
    $query = $GLOBALS['URL'].'/'.$produit->getId().'.json';
    $data = json_encode($produit->Parse2Array());

    $make_call = callAPI('PUT', $query, $data);
    $response = json_decode($make_call);
    return var_dump($response);
}

function editProduct($produit) {
    $query = $GLOBALS['URL'].'/'.$produit->getId().'.json';
    $data = json_encode($produit->Parse2Array());

    $make_call = callAPI('PATCH', $query, $data);
    $response = json_decode($make_call);
    return var_dump($response); 
}

function deleteProduct($id){
    $query = $GLOBALS['URL'].'/'.$id.'.json';
    $make_call = callAPI('DELETE', $query, false);
    $response = json_decode($make_call);
    return var_dump($response);
}

function writeToFile($file,$object){
    $fp = fopen($file, 'w');
    fwrite($fp, json_encode($object));
    fclose($fp);
}

function getImage($id){
    if(file_exists('data/image/'.$id.'.jpg')) {
        return true;
    } else {
        return false;
    }
}