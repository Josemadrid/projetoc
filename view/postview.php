<?php 
/**
 * VIEW POST.
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

<section id="portfolio">
<div class="container">
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <div class="caption">
        <div class="caption-content">
        <h2 style="color:orange"><?php echo htmlspecialchars($post->getTitre());
        ?></h2>
        <p style="color:green"><strong><?php 
        echo htmlspecialchars($post->getChapo()); ?></strong></p>
        <p><?php echo htmlspecialchars($post->getContenu()); ?></p>
                <p><em>Ecrit par <?php echo 
                htmlspecialchars($post->getAuteur()); ?>, le 
                    <?php echo htmlspecialchars($post->getCreatedAt()); ?>
                . Modifié le <?php echo 
                htmlspecialchars($post->getUpdatedAt()); ?>.</em></p>

    <?php
    if (isset($_SESSION['user'])) { 
        if ($_SESSION['user']->getRole() == 2) { 
            ?> 
                <a class='btn btn-success' 
                                       href="index.php?action=editpost&id= <?php echo htmlspecialchars($post->getId()) ?> ">
                                        Modifier</a>
                                    <a class='btn btn-danger' 
                                       href="index.php?action=delete&id= <?php echo htmlspecialchars($post->getId())?>  ">
                                        Supprimer</a>

        <?php    }

    }?>
                            
    
    <br>
    <br>
        <h3 id="homeHeading">COMMENTAIRES</h3>
    <?php foreach ($comment as $comment): ?>

        <h3 style="color:blue"><?php echo
        htmlspecialchars($comment->getUtilisateur()->getPseudo()); ?></h2>
        <p style="color:green"><strong><?php echo 
        htmlspecialchars($comment->getContenuCommentaire()); ?></strong></p>
        <p><em>Le <?php echo 
        htmlspecialchars($comment->getDatecreationCommentaire()); ?>
                . Modifié le <?php echo 
                htmlspecialchars($comment->getDatemodificationCommentaire()); ?>.
            </em></p>

    <?php endforeach; ?>


<?php
if (isset($_SESSION['user'])) {
    ?>


<div class="row">
                
                 
    <form class="form" role="form" 
          action="index.php?action=addcomment" method="post">
      

        <div class="form-group">
        <label for="content">Message :</label>
        <textarea type="text" class="form-control" 
                  id="Message" name="Message"
                  placeholder="..." rows="10" required></textarea>
        
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-success" 
                href="index.php?action=home">Ajouter</button>
        <a class="btn btn-primary" 
           href="index.php?action=listposts">Retour</a>
        <input type="hidden" id="postId" 
               name="postId" value="<?php echo
                htmlspecialchars($post->getId())?>">


      </div>
        <input type="hidden" name="token" 
               id="token" value="<?php echo $token; ?>" />
    </form>
    </div>
    <?php 
}?>
</div>

    </div>
</div>
</div>
</section>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<?php
$content=ob_get_clean();

require 'view/template.php';
