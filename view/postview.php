<?php
ob_start();
?>




<!-- View Article -->
<div class="row">
	<div class="col-lg-12 col-md-12 mx-auto">
		<h1><?= $this->clean($post->getTitre()); ?></h1>
		<p><em>Ecrit par <?= $this->clean($post->getAuteur()); ?>, le <?= $post->getCree(); ?>. Modifié le <?= $post->getModifie(); ?>.</em></p>
		<p><strong><?= nl2br($this->clean($post->getChapo())); ?></strong></p>
		<p><?= nl2br($this->clean($post->getContenu())); ?></p>
	</div>
</div>


<?php
$content=ob_get_clean();

require 'view/template.php';