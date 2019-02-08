<?php
ob_start();
?>
<br>


<div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                  <h3 id="homeHeading">Ajouter un nouveau post</h3>
    <form class="form" role="form" action="index.php?action=addpost" method="post">
      <div class="form-group">
        <label for="author">Auteur :</label>
        <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Auteur" required>
      </div>
      <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" required>
      </div>
      <div class="form-group">
        <label for="chapo">Chapô :</label>
        <textarea type="text" class="form-control" id="chapo" name="chapo" placeholder="Chapô de l'article" rows="8" required></textarea>
      </div>
      <div class="form-group">
        <label for="content">Contenu :</label>
        <textarea type="text" class="form-control" id="contenu" name="contenu" placeholder="Contenu de l'article" rows="25" required></textarea>
      </div>
      <br>
      <div class="form-actions">
        <button type="submit" class="btn btn-success">Ajouter</button>
        <a class="btn btn-primary" href="index.php?action=home">Retour</a>
      </div>
    </form>
  </div>
</div>


<?php
$content=ob_get_clean();


require 'view/template.php';
