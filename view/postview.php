<?php
ob_start();
?>




<!-- View Post -->
<section id="portfolio">
<div class="container">
<div class="row">
	<div class="col-lg-12 col-md-12 mx-auto">
		<div class="caption">
        <div class="caption-content">
		<h2><?= $post->getTitre(); ?></h2>
		<p><strong><?= $post->getChapo(); ?></strong></p>
		<p><?= $post->getContenu(); ?></p>
		<p><em>Ecrit par <?= $post->getAuteur(); ?>, le <?= $post->getCreated_at(); ?>. Modifié le <?= $post->getUpdated_at(); ?>.</em></p>
		<?= "<a class='btn btn-success' href='index.php?action=editpost&id=" . $post->getId() . "'>Modifier</a>"; ?>
		<?= "<a class='btn btn-danger' href='index.php?action=delete&id=" . $post->getId() . "'>Supprimer</a>"; ?>
	</div>
</div>
	</div>
</div>
</div>
</section>

<?php
$content=ob_get_clean();

require 'view/template.php';