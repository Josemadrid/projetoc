<?php
/**
 * VIEW DELETE POST.
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



<?php echo

'<form class="form" role="form" action="index.php?action=delete&id=' . 
        htmlspecialchars($post->getId()) . '" method="post">
                                    <div class="col-lg-12 text-center">
                                    <p style="color:#FF0000";><strong>
                                    CONFIRMATION</strong></p>
                                        <input type="hidden" id="id" 
                                        name="id" value="' . 
        htmlspecialchars($post->getId()) . '">
                                        <button type="submit" 
                                        name="delete" 
                                        class="btn btn-danger">Oui</button>
                                        <a class="btn btn-primary" 
                                        href="index.php?action=viewsinglepost&id=' . 
        htmlspecialchars($post->getId()) .'">Non</a>
                                    </div>
                                </form>'; ?>


<!-- View Post -->
<section id="portfolio">
<div class="container">
<div class="row">
    <div class="col-lg-12 col-md-12 mx-auto">
        <h2><?php echo htmlspecialchars($post->getTitre()); ?></h2>
        <p><strong><?php echo htmlspecialchars($post->getChapo()); ?></strong></p>
        <p><?php echo htmlspecialchars($post->getContenu()); ?></p>
        <p><em>Ecrit par <?php echo htmlspecialchars($post->getAuteur()); ?>,
                le <?php echo htmlspecialchars($post->getCreated_at()); ?>.
                Modifié le <?php echo htmlspecialchars($post->getUpdated_at());
                ?>.</em></p>
        
    </div>
</div>
</div>
</section>





<?php
$content=ob_get_clean();

require 'view/template.php';
