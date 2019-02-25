<?php
/**
 * VIEW ACCUEIL.
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

<!-- presentation-->
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-2   col-sm-8">
                    <h1 id="homeHeading">Jose Madrid</h1>
                                    
                    <hr>
                    <img src="public/themes/img/photo1.jpg" width="150" 
                         height="150" class="pull-right">
                    <h3>Mes missions comme développeur PHP</h3>
                        <p>Ma mission de développeur est de créer des
                            sites Internet
                            dynamiques grâce à son langage de programmation
                            de prédilection
                            : le PHP. Pour cela, je peut utiliser, selon
                            mes préférences et
                            mes compétences, le PHP sans framework,
                            avec framework 
                            propriétaire ou avec framework en open
                            source (Symfony, Zend…).</p><br>

                        <p>Je travaille en étroite collaboration 
                            avec le chef de projet web,
                            chargé d’établir le cahier des charges
                            en fonction des demandes
                            et contraintes du client. J'étudie le
                            cahier des charges pour
                            choisir la solution la mieux adaptée
                            : par exemple, la mise 
                            en place d’un CMS de type WordPress 
                            ou Prestashop. Une fois
                            la solution trouvée, je développe
                            des pages dynamiques en 
                            utilisant des suites de logiciels
                            : par exemple, le WAMP 
                            (Windows, Apache, MySQL et PHP). 
                            Une fois que le site 
                            Internet est développé, je peut 
                            intervenir dessus pour réparer
                            des bugs et faire des mises à jour.</p>

                    <h3>Mes compétences</h3>
                        <p>Un développeur PHP qui ne maîtrise pas le PHP, 
                            cela n’existe tout simplement pas ! Il s’agit 
                            du fondement même de mon métier. Je maîtrise 
                            aussi d’autres langages de programmation, des
                            CMS ainsi que des frameworks.</p>

                    <h3>Ma formation</h3>
                        <p>Pour devenir développeur PHP, j'ai fait des études
                            en informatique chez Openclassroom, même si 
                            certaines personnes y parviennent en autodidacte.
                            Je vous le conseil fortement ils ont un site web
                            complet avec des professionel trés compétent.</p>
                    <p>Créatif, ayant un oeil ouvert sur les technologies 
                        avant-gardistes, je dévoile mon univers à travers 
                        le design et la programmation.</p>
                    
                </div>
          </div>
       </div>

 <!-- Contact Section -->
    <section id="Contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contactez-moi</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    
                    <form name="sentMessage" id="contactForm" 
                          method="POST" action="/projetoc/index.php?action=mail">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 
                                 floating-label-form-group controls">
                                <label>Prénom</label>
                                <input type="text" class="form-control" 
                                       placeholder="Prénom" name="prenom" 
                                       id="name" 
                                       required data-validation-required-message
                                       ="SVP entrez votre prénom.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 
                                 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" class="form-control"
                                       placeholder="Email" name="email" 
                                       id="email" 
                                       required data-validation-required-message
                                       ="SVP entrez votre email.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 
                                 floating-label-form-group controls">
                                <label>Telephone</label>
                                <input type="tel" class="form-control"
                                       placeholder="Telephone" name="telephone" 
                                       id="phone" 
                                       required data-validation-required-message
                                       ="SVP entrez votre número de telephone.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 
                                 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" 
                                          placeholder="Message" name="message" 
                                          id="message"
                                          required data-validation-required-message
                                          ="SVP entrez votre message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" 
                                        class="btn btn-success btn-lg">
                                    Envoyer</button>
                            </div>
                        </div>
                        <input type="hidden" name="token" id="token" 
                               value="<?php echo $token; ?>" />
                    </form>
                
                </div>
            </div>
        </div>
    </section>




    <?php
    $content=ob_get_clean();

    require 'view/template.php';
    