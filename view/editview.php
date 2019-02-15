<?php
/**
 * VIEW EDIT.
 * 
 * PHP version 7.2.4
 * 
 * @category Controlleur
 * @package  Controlleur
 * @author   Name <mail@mail.com>
 * @license  https://fr.wikipedia.org/wiki/Licence_MIT 
 * @version  GIT: Release: 1.0.0
 * @link     URL Documentation
 */
ob_start();
?>
<br>


<div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                  <h3 id="homeHeading">Modifie le Post</h3>
    <form class="form" role="form" action="index.php?action=editpost&id=<?php echo htmlspecialchars($post->getId());?>" method="post">
      <div class="form-group">
        <label for="author">Auteur :</label>
        <input type="text" class="form-control" id="auteur" name="auteur"
               placeholder="Auteur" value="<?php 
                echo htmlspecialchars($post->getAuteur());?>" required>
      </div>
      <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" id="titre" 
               name="titre" placeholder="Titre" 
               value="<?php echo htmlspecialchars($post->getTitre());?>" required>
      </div>
      <div class="form-group">
        <label for="chapo">Chapô :</label>
        <textarea type="text" class="form-control" id="chapo" 
                  name="chapo" placeholder="Chapô de l'article"  
                  rows="8"  required> 
                        <?php echo htmlspecialchars($post->getChapo());?>
        </textarea> 
      </div>
      <div class="form-group">
        <label for="content">Contenu :</label>
        <textarea type="text" class="form-control" id="contenu" 
                  name="contenu" placeholder="Contenu de l'article" 
                  rows="25" required> 
                    <?php echo htmlspecialchars($post->getContenu());?>
        </textarea>
      </div>
      <br>
      <div class="form-actions">
          <input type="hidden" id="id" name="id" 
                 value="<?php echo htmlspecialchars($post->getId()); ?>">
        <button type="submit" name="edit" class="btn btn-success">Modifier</button>
                <a class="btn btn-primary" href="index.php?action=viewsinglepost&id= <?php echo htmlspecialchars($post->getId());?>">Retour</a>
      </div>
      
    </form>
  </div>
</div>


<?php
$content=ob_get_clean();


require 'view/template.php';
