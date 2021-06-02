<?php

function createTable($lines){
    $tableau = '<div class="tableau">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Photo</th>
                    <th>
                        <div class="col-sm-0">
                            <a href="?type=add" onclick="" class="btn btn-success">
                                <i class="material-icons">&#xE147;</i>
                                <span>Ajouter</span> 
                            </a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="6"></td>
                </tr>
            </tfoot>
            <tbody>
                '.$lines.'
            </tbody>
        </table>
        </div>';
    return $tableau;
}

function createTableLine(Produit $produit){
    $id = $produit->getId();
    if (getImage($id)){
        $image ='<div class="" >
                    <img class="" style="height:50px" src="data/image/'.$id.'.jpg" alt="'.$produit->getNom().'">
                </div>';
    } else {
        $image ='<a href="?type=edit&id='.$id.'" onclick="" class="btn btn-sm" >
        <i class="material-icons">&#xE147;</i>
    </a>';
    }
    $line = '
        <tr>
            <td>'.$id.'</td>
            <td>'.$produit->getNom().'</td>
            <td>'.$produit->getDesc().'</td>
            <td>'.$produit->getPrix().'</td>
            <td>'.$produit->getCat().'</td>
            <td>'.$image.'</td>
            <td style="display:flex"> 
                <div class="btn btn-sm">
                    <a href="?type=edit&id='.$id.'" onclick="" class="edit" title="Edit" data-toggle="tooltip">
                        <i class="material-icons">&#xE254;</i>
                    </a>
                </div>
                <form action="api/action.php?type=delete&id='.$id.'" method="post">
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="material-icons">&#xE872;</i>
                    </button>
                </form>
            </td>
        </tr>';
    return $line;
}

// <a href="" onclick="" class="btn btn-sm" >
//     <i class="material-icons">&#xE147;</i>
// </a>