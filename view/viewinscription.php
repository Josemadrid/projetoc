<?php ob_start(); ?>
    <section>
        <div class="container flipboard-boxes flipboard-inscription">
            <div class="row">
                <div class="col-lg-12 card-inscription">
                    <div class="card-inscription-body">

                        <div id="upper_left-corner"></div>
                        <div id="upper_right-corner"></div>
                        <div id="lower_left-corner"></div>
                        <div id="lower_right-corner"></div>

                        <h4 class="card-inscription-subtitle">TYPE / <span class="type-group">INSCRIPTION /</span></h4>
                        <h3 class="card-inscription-title">Remplissez les champs pour vous inscrire</h3>
                        <p class="card-inscription-text">
                        <form id="signupForm" method="post">
                            <div class="has-error">
                                <label class="form-label card-inscription-text" for="username">Votre Pseudo
                                    : </label> <input class="form-control" type="text"
                                                      name="username"
                                                      id="username">
                            </div>
                            <div class="has-error">
                                <label class="form-label card-inscription-text" for="password">Votre mot de
                                    passe
                                    : </label> <input class="form-control" type="password"
                                                      name="newpassword"
                                                      id="newpassword">
                            </div>
                            <div class="has-error">
                                <label class="form-label card-inscription-text" for="confirm_password">Confirmez
                                    votre mot de passe : </label> <input class="form-control"
                                                                         type="password"
                                                                         name="confirm_newpassword"
                                                                         id="confirm_newpassword">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary signup-submit" name="signup"
                                        value="Soumettre">
                                    Soumettre
                                </button>
                                <span id="signup-success"><span class="oi oi-check"></span> Succès, Vous pouvez vous connecter maintenant</span>
                            </div>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $content = ob_get_clean();
require 'view/template.php';