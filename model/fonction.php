<?php
include 'connexion.php';

//fonction article
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

//fonction client
function getClient($id=null)
{

    if (!empty($id)) {
        $sql = "SELECT * FROM clients WHERE id=?";
        $req = $GLOBALS ['connexion']->prepare($sql);
    
        $req ->execute(array($id));
       return $req->fetch();
    } else{
        $sql = "SELECT * FROM clients";
        $req = $GLOBALS ['connexion']->prepare($sql);

        $req ->execute();
    return $req->fetchAll();
    }

    
}

function getVente($id= null)
{

    if (!empty($id)) {
        $sql = "SELECT Nom_article, Nom, Prenom, v.quantite, prix, date_vente
         FROM clients AS c, ventes, AS v, articles AS a WHERE v.id_articles=a.id AND v.id_clients=c.id AND v.id=?";
        $req = $GLOBALS ['connexion']->prepare($sql);
    
        $req ->execute(array($id));
       return $req->fetch();
    } else{
        $sql = "SELECT Nom_article, Nom, Prenom, v.quantite, prix, date_vente
        FROM clients AS c, ventes, AS v, articles AS a WHERE v.id_articles=a.id AND v.id_clients=c.id" ;
        $req = $GLOBALS ['connexion']->prepare($sql);

        $req ->execute();
    return $req->fetchAll();
    }

    
}