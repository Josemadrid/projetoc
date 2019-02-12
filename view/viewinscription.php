
<?php 
/**
 * VIEW INSCRIPTION.
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
ob_start(); ?>
<section>
    <div class="container flipboard-boxes flipboard-inscription">
        <div class="row">
            <div class="col-lg-5 card-inscription">
                <div class="card-inscription-body">

                    <div id="upper_left-corner"></div>
                    <div id="upper_right-corner"></div>
                    <div id="lower_left-corner"></div>
                    <div id="lower_right-corner"></div>

                    <h4 class="card-inscription-subtitle">TYPE /
                        <span class="type-group">INSCRIPTION /</span></h4>
                    <h3 class="card-inscription-title">
                        Remplissez les champs pour vous inscrire</h3>
                    <p class="card-inscription-text">
                    <form id="signupForm" action="index.php?action=connection"
                          method="post">
                        <div class="has-error">
                            <label class="form-label card-inscription-text"
                                   for="pseudo">Votre Pseudo
                                : </label> <input class="form-control" type="text"
                                              name="pseudo"
                                              id="pseudo"
                                              required>
                        </div>
                        <div class="has-error">
                            <label class="form-label card-inscription-text" 
                                   for="email">Votre Email
                                : </label> <input class="form-control" type="text"
                                              name="email"
                                              id="email"
                                              required>
                        </div>
                        <div class="has-error">
                            <label class="form-label card-inscription-text" 
                                   for="password">Votre mot de
                                passe
                                : </label> <input class="form-control" 
                                       type="password"
                                              name="password"
                                              id="password"
                                              required>
                        </div>
                        <div class="has-error">
                            <label class="form-label card-inscription-text" 
                                   for="confirmpassword">Confirmez
                                votre mot de passe : </label> <input 
                                    class="form-control"
                                                              type="password"
                                                              name="confirmpassword"
                                                              id="confirmpassword"
                                                              required>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary 
                                    signup-submit" name="signup"
                                    value="Soumettre" required>
                                Soumettre
                            </button>
                            <span id="signup-success"><span class="oi oi-check">
                                
                                </span> Succès, Vous pouvez 
                                vous connecter maintenant</span>
                        </div>
                        <input type="hidden" name="token" id="token" 
                               value="<?php echo $token; ?>" />
                    </form>
                    </p>
                </div>

            </div>
            <div class="col-lg-2 card-inscription"></div>
            <div class="col-lg-5 card-inscription">
                <div class="card-inscription-body">

                    <div id="upper_left-corner"></div>
                    <div id="upper_right-corner"></div>
                    <div id="lower_left-corner"></div>
                    <div id="lower_right-corner"></div>

                    <h4 class="card-inscription-subtitle">TYPE / <span 
                            class="type-group">CONNECTION /</span></h4>
                    <h3 class="card-inscription-title">Remplissez les 
                        champs pour vous connecter</h3>
                    <p class="card-inscription-text">
                    <form id="signupForm" method="post" 
                          action="index.php?action=connect">
                        <div class="has-error">
                            <label class="form-label card-inscription-text" 
                                   for="username">Votre Pseudo
                                : </label> <input class="form-control" type="text"
                                              name="pseudo"
                                              id="username"
                                              required>
                        </div>
                        <div class="has-error">
                            <label class="form-label card-inscription-text" 
                                   for="password">Votre mot de
                                passe
                                : </label> <input class="form-control" 
                                       type="password"
                                              name="password"
                                              id="newpassword"
                                              required>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary 
                                    signup-submit"
                                    name="signup"
                                    value="Soumettre" required>
                                Soumettre
                            </button>
                            <span id="signup-success"><span class="oi oi-check">
                                
                                </span> Succès, Vous pouvez vous 
                                connecter maintenant</span>
                        </div>
                        <input type="hidden" name="token" id="token" 
                               value="<?php echo $token; ?>" />
                    </form>
                </div>
            </div>
        </div>
</section>
<?php
$content = ob_get_clean();
require 'view/template.php';
