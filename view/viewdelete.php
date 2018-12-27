<?php
ob_start();
?>



<?=

'<form class="form" role="form" action="index.php?action=delete&id=' . $post->getId() . '" method="post">
                                    <div class="col-lg-12 text-center"><p style="color:#FF0000";><strong>CONFIRMATION</strong></p>
                                        <input type="hidden" id="id" name="id" value="' . $post->getId() . '">
                                        <button type="submit" name="delete" class="btn btn-danger">Oui</button>
                                        <a class="btn btn-primary" href="index.php?action=viewsinglepost&id=' . $post->getId() .'">Non</a>
                                    </div>
                                </form>'; ?>


<!-- View Post -->
<section id="portfolio">
<div class="container">
<div class="row">
    <div class="col-lg-12 col-md-12 mx-auto">
        <h2><?= $post->getTitre(); ?></h2>
        <p><strong><?= $post->getChapo(); ?></strong></p>
        <p><?= $post->getContenu(); ?></p>
        <p><em>Ecrit par <?= $post->getAuteur(); ?>, le <?= $post->getCreated_at(); ?>. Modifié le <?= $post->getUpdated_at(); ?>.</em></p>
        
    </div>
</div>
</div>
</section>





<?php
$content=ob_get_clean();

require 'view/template.php';