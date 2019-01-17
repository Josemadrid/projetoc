<?php
		if(isset($_SESSION['user']))
                            {
                                if($_SESSION['user']->getRole() == 2)
                                { ?>
                                    <?="<a class='btn btn-success' href='index.php?action=editpost&id=" . $post->getId() . "'>Modifier</a>";?>
									<?="<a class='btn btn-danger' href='index.php?action=delete&id=" . $post->getId() . "'>Supprimer</a>";?>
                                }<?php
                            }
                            
                            ?>


                            <a href="index.php?action=viewsinglepost&id=<?= $post->getId(); ?>">