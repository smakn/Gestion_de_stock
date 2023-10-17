<?php
    include 'entete.php';
//recupaire l article qui est dans GET pour le mettre dans le formulaire
    if (!empty($_GET['id'])) {
        $article = getArticle($_GET['id']);
    }
    
?>

<div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <form action=" <?= !empty($_GET['id']) ? "../model/modifArticle.php" : "../model/AjoutArticle.php " ?>"  method="POST">
                    <label for="Nom_article"> Nom de l'article</label>
                    <input value="<?= !empty($_GET['id']) ? $article['Nom_article']  : "" ?>" type="text" name="Nom_article" id="Nom_article" placeholder="Veuillez saisir votre nom">
                    <input value="<?= !empty($_GET['id']) ? $article['id']  : "" ?>" type="hidden" name="id" id="id" >

                    <label for="categorie"> Categorie</label>
                    <select name="categorie" id="categorie">
                        <option <?= !empty($_GET['id']) && $article['categorie'] == "ordinateur" ? "selected" : "" ?> value="ordinateur">Ordinateur</option>
                        <option <?= !empty($_GET['id']) && $article['categorie'] == "Imprimante" ? "selected" : "" ?> value="Imprimante">Imprimante</option>
                        <option <?= !empty($_GET['id']) && $article['categorie'] == "scaner" ? "selected" : "" ?> value="scaner">scaner</option>
                        <option <?= !empty($_GET['id']) && $article['categorie'] == "telephone" ? "selected" : "" ?> value="telephone">telephone</option>
                        <option <?= !empty($_GET['id']) && $article['categorie'] == "sourie" ? "selected" : "" ?> value="sourie">sourie</option>
                        <option <?= !empty($_GET['id']) && $article['categorie'] == "clavier" ? "selected" : "" ?> value="clavier">clavier</option>
                        <option <?= !empty($_GET['id']) && $article['categorie'] == "cle_usb" ? "selected" : "" ?> value="cle_usb">cle usb</option>
                        <option <?= !empty($_GET['id']) && $article['categorie'] == "cle_internet" ? "selected" : "" ?> value="cle_internet">cle_internet</option>
                        <option <?= !empty($_GET['id']) && $article['categorie'] == "disque_dur" ? "selected" : "" ?> value="disque_dur">disque_dur</option>
                        <option <?= !empty($_GET['id']) && $article['categorie'] == "ram" ? "selected" : "" ?> value="ram">ram</option>
                        
                    </select>

                    <label for="quantite"> Quantité</label>
                    <input value="<?= !empty($_GET['id']) ? $article['quantite']  : "" ?>" type="number" name="quantite" id="quantite" placeholder="Veuillez saisir la auqntité">

                    <label for="prix_unitaire"> Prix unitaire</label>
                    <input value="<?= !empty($_GET['id']) ? $article['prix_unitaire']  : "" ?>" type="text" name="prix_unitaire" id="prix_unitaire" placeholder="Veuillez saisir le prix unitaire">

                    <label for="date_fabrication"> Date de fabrication</label>
                    <input value="<?= !empty($_GET['id']) ? $article['date_fabrication']  : "" ?>" type="datetime-local" name="date_fabrication" id="date_fabrication" >

                    <label for="date_expiration"> Date d'expiration</label>
                    <input value="<?= !empty($_GET['id']) ? $article['date_expiration']  : "" ?>" type="datetime-local" name="date_expiration" id="date_expiration" >

                    <button type="submit" name="valider"> Valider</button>
                <!--message a afficher en cas de reussite du remplissage du formulaire ou de l echec-->
                    <?php
                        if (!empty($_SESSION['message']['text'])) {
                    ?>
                    <div class="alert <?= $_SESSION['message']['type'] ?>">
                        <?= $_SESSION['message']['text'] ?>
                    </div>

                    <?php    
                    } 
                    ?>
                    
                </form>

            </div>
            <div class="box">
                <table class="mtable">
                    <tr>
                        <th>Nom article</th>
                        <th>Categorie</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Date de fabrication</th>
                        <th>Date d'expiration</th>
                        <th>Action</th>
                    </tr>
                    <!--afficher les article enregistre dans la base sur article-->
                    <?php
                        $articles = getArticle();
                        if (!empty($articles) && is_array($articles)) {
                            foreach ($articles as $key => $value) { 
                    ?>
                    <tr>
                        <td> <?= $value['Nom_article'] ?></td>
                        <td> <?= $value['categorie'] ?></td>
                        <td> <?= $value['quantite'] ?></td>
                        <td> <?= $value['prix_unitaire'] ?></td>
                        <td> <?= date('d/m/Y H:i:s', strtotime ($value['date_fabrication'])) ?></td>
                        <td> <?= date('d/m/Y H:i:s', strtotime ( $value['date_expiration'])) ?></td>
                        <td><a href="?id=<?=  $value['id'] ?>"> <i class="bx bx-edit-alt"></i> </a></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
        </div>

    </div>
    </section>
</body>
</html>
    
<?php
    include 'pied.php';
?>