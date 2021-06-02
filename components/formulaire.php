<?php

function getForm($addOrEdit,$show, $id){
    // if true => add, if false => edit
    $value = $addOrEdit ? "Ajouter" : "Modifier";
    $action = $addOrEdit ? 'add' : 'edit&id='.$id;
    if ($id != null){
        $produit = getProduit($id);
        $nom = $produit->getNom();
        $desc = $produit->getDesc();
        $prix = $produit->getPrix();
        $cat = $produit->getCat();
    } else {
        $nom = "";
        $desc = "";
        $prix = "";
        $cat = "";
    }
    if(!getImage($id)) {
        $manageIMG = '<input type="file" name="file" class="btn btn-light btn-block btn-sm">';
    } else {
        $manageIMG = '<a href="index.php?type=deleteIMG&id='.$id.'" onclick="" class="btn btn-danger btn-block btn-sm"><span>Suprimer image</span></a>';
    }

    $formulaire = '
        <div role="main" class="form" style="width:50%">
            <h3>'.$value.' un produit</h3>
            <form action="api/action.php?type='.$action.'" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="'.$id.'" />
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="nom" name="nom" value="'.$nom.'"/>
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Description" name="description" value="'.$desc.'"/>
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Prix" name="prix" value="'.$prix.'"/>
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Categorie" name="categorie" value="'.$cat.'"/>
                </div>

                <div class="">'.$manageIMG.'</div>

                <div class="form-group" style="display:flex">
                    <button type="submit" class="btn btn-success" style="width:50%;margin:1%;">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        '.$value.'
                    </button>
                    <a href="?type=cancel" class="btn btn-dark" style="width:50%;margin:1%" onclick=""class="btn btn-cancel">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        <span>Annuler</span> 
                    </a>
                </div>
            </form>
        </div>';
    //return addProduct($produit);
    return $show ? $formulaire : null;
}


// <form method="POST" action="upload.php" enctype="multipart/form-data" >
//                         <!-- On limite le fichier à 1000Ko -->
//                         <input type="hidden" name="MAX_FILE_SIZE" value="100000">
//                         <input type="file" name="file" class="btn btn-light btn-block btn-sm">
//                         <!--<input type="submit" name="envoyer" value="Envoyer le fichier" class="btn btn-primary btn-block btn-sm">-->
//                     </form>