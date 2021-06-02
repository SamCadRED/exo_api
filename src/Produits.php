<?php 
class Produit {
    private $id;
    private $nom;
    private $desc;
    private $prix;
    private $cat;

    public function __construct($id,$nom,$desc,$prix,$cat){
        //echo "appel du constructeur";
        $this->id = $id;
        $this->nom = $nom;
        $this->desc = $desc;
        $this->prix = $prix;
        $this->cat = $cat;
    }
    
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getDesc(){
        return $this->desc;
    }
    public function getPrix(){
        return $this->prix;
    }
    public function getCat(){
        return $this->cat;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setDesc($desc){
        $this->desc = $desc;
    }
    public function setPrix($prix){
        $this->prix = $prix;
    }
    public function setCat($cat){
        $this->cat = $cat;
    }

    public function Parse2Array() {
        $array = array(
            "id"=>$this->id,
            "nom"=>$this->nom,
            "description"=>$this->desc,
            "prix"=>$this->prix,
            "categorie"=>$this->cat,
        );
        return $array;
    }
}