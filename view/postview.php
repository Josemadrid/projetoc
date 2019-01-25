<?php 
ob_start();
?>

<section id="portfolio">
<div class="container">
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="caption">
        <div class="caption-content">
		<h2 style="color:orange"><?= $post->getTitre(); ?></h2>
		<p style="color:green"><strong><?= $post->getChapo(); ?></strong></p>
		<p><?= $post->getContenu(); ?></p>
		<p><em>Ecrit par <?= $post->getAuteur(); ?>, le <?= $post->getCreated_at(); ?>. Modifié le <?= $post->getUpdated_at(); ?>.</em></p>

		<?php
		if(isset($_SESSION['user']))
                            {
                                if($_SESSION['user']->getRole() == 2)
                                { ?>
                                    <a class='btn btn-success' href="index.php?action=editpost&id= <?= $post->getId() ?> ">Modifier</a>
									<a class='btn btn-danger' href="index.php?action=delete&id= <?= $post->getId()?>  ">Supprimer</a>

									<?php
                                }
                            }
                            
                            ?>
	<br>
	<br>
		<h3 id="homeHeading">COMMENTAIRES</h3>
		<?php foreach ($comment as $comment): ?>

		<h3 style="color:blue"><?= $comment->getUtilisateur()->getPseudo(); ?></h2>
		<p style="color:green"><strong><?= $comment->getContenu_commentaire(); ?></strong></p>
		<p><em>Le <?= $comment->getDatecreation_commentaire(); ?>. Modifié le <?= $comment->getDatemodification_commentaire(); ?>.</em></p>

		<?php endforeach; ?>


<?php
		if(isset($_SESSION['user']))
		{?>


<div class="row">
                
                 
    <form class="form" role="form" action="index.php?action=addcomment" method="post">
      

        <div class="form-group">
        <label for="content">Message :</label>
        <textarea type="text" class="form-control" id="Message" name="Message" placeholder="..." rows="10" required></textarea>
		
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-success" href="index.php?action=home">Ajouter</button>
        <a class="btn btn-primary" href="index.php?action=listposts">Retour</a>
        <input type="hidden" id="postId" name="postId" value="<?=$post->getId()?>">


      </div>
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