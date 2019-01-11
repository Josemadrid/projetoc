<?php
ob_start();
?>

<!-- Posts Section -->

    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Posts</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php foreach ($posts as $post): ?>
                <div class="col-sm-4 portfolio-item">
                    
                        
                        <div class="caption">
                            <div class="caption-content">

                                <a href="index.php?action=viewsinglepost&id=<?= $post->getId(); ?>"><h2><?= $post->getTitre(); ?></h2></a>
                                  <p><?=$post->getChapo(); ?></p>
                                 <p><em>Créé le <?= $post->getCreated_at(); ?>. Modifié le <?= $post->getUpdated_at(); ?>.</em></p>
                            </div>
                        </div>
                        
                    </a>
                </div>
                
                <?php endforeach; ?>
            </div>

        </div>
    </section>
    

    <!-- Portfolio Modals -->
    

<?php
$content=ob_get_clean();


require 'view/template.php';