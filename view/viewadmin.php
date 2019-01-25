<?php 
ob_start();
?>

<div class="container">
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<br>
		<h3 id="homeHeading">POSTS</h3>
<li class="page-scroll">

                        <a href="/projetoc/?action=addpost">CREER UN POST</a>
                    </li>
                    <li class="page-scroll">

                        <a href="/projetoc/?action=listposts">LISTE DES POSTS</a>
                    </li>
                    <br>
			<h3 id="homeHeading">COMMENTAIRES</h3>
	
	




    <div class="page-header text-center">
        
    </div>
    <div class="row" id="commentPart">
    	<div class="col-lg8 col-lg-offset-2">	
        <ul class="list-group">
            
           <?php foreach ($comment as $comment): ?>
            <li class="list-group-item item">
                <strong> <?= $comment->getContenu_commentaire(); ?> || <em>Le <?= $comment->getDatecreation_commentaire(); ?></strong>
                <p class="text-right buttonAdmin">
                    <a href="/projetoc/index.php?action=admin&adminaction=deletecomment&id=<?= $comment->getId() ?>">
                        <button class="btn btn-danger">Supprimer</button>
                    </a>
                    <a href="/projetoc/index.php?action=admin&adminaction=validcomment&id=<?= $comment->getId() ?>">
                        <button class="btn btn-success">Valider</button>
                    </a>
                </p>
            </li>
               <?php endforeach; ?>
          
        </ul>
        <a href="/projetoc/?action=admin&adminaction=viewscomment"><button class="btn btn-success">Voir Plus</button></a>
        </div>
    
</div>
		

		
                        
                    
</div>
</div>
</div>


<?php
$content=ob_get_clean();

require 'view/template.php';