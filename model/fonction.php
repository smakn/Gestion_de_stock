<?php
include 'connexion.php';


function getArticle($id=null)
{

    if (!empty($id)) {
        $sql = "SELECT * FROM articles WHERE id=?";
        $req = $GLOBALS ['connexion']->prepare($sql);
    
        $req ->execute(array($id));
       return $req->fetch();
    } else{
        $sql = "SELECT * FROM articles";
        $req = $GLOBALS ['connexion']->prepare($sql);

        $req ->execute();
    return $req->fetchAll();
    }

    
}