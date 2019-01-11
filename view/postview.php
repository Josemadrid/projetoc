<?php
ob_start();
?>




<!-- View Post -->
<section id="portfolio">
<div class="container">
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="caption">
        <div class="caption-content">
		<h2><?= $post->getTitre(); ?></h2>
		<p><strong><?= $post->getChapo(); ?></strong></p>
		<p><?= $post->getContenu(); ?></p>
		<p><em>Ecrit par <?= $post->getAuteur(); ?>, le <?= $post->getCreated_at(); ?>. Modifié le <?= $post->getUpdated_at(); ?>.</em></p>

		<?php
		if(isset($_SESSION['user']))
                            {
                                if($_SESSION['user']->getRole() == 2)
                                {
                                    "<a class='btn btn-success' href='index.php?action=editpost&id=" . $post->getId() . "'>Modifier</a>";
									"<a class='btn btn-danger' href='index.php?action=delete&id=" . $post->getId() . "'>Supprimer</a>";
                                }
                            }
                            
                            ?>
		

<div class="row">
                
                  <h3 id="homeHeading">COMMENTAIRES</h3>
    <form class="form" role="form" action="index.php?action=addpost" method="post">
      <div class="form-group">
        <label for="author">Pseudo :</label>
        <input type="text" class="form-control" id="Pseudo" name="Pseudo" placeholder="Julien" required>
      </div>

        <div class="form-group">
        <label for="content">Message :</label>
        <textarea type="text" class="form-control" id="Message" name="Message" placeholder="..." rows="10" required></textarea>
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