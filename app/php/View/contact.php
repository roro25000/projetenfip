<?php include('entete.php'); ?>

<html>


    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="validator.js"></script>
    <script src="contact.js"></script>

    <br/>

    <section class="page-section cta" style="background:#B22222">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="cta-inner2 text-center rounded">

                        <div class="row col-sm-12">
                            <nav class="col-sm-6">  
                                <form id="contact-form" method="post" action="contact.php" role="form">

                                    <div class="messages"></div>

                                    <div class="controls">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label5 for="form_name">Prénom* :</label5>
                                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Martin" required="required" data-error="Firstname is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label6 for="form_lastname">Nom* :</label6>
                                                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Durand" required="required" data-error="Lastname is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label7 for="form_email">Email* :</label7>
                                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="exemple@gmail.com" required="required" data-error="Valid email is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label3 for="form_phone">Téléphone :</label3>
                                                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="0102030405">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label4 for="form_message">Message* :</label4>
                                                    <textarea id="form_message" name="message" class="form-control" placeholder="Votre Message  " rows="6" required="required" data-error="Please,leave us a message."></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-success btn-send" value="Envoyer votre message">
                                            </div>
                                        </div>
                                        </nav>


                                        <nav class="col-sm-6 google">  
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2890.859076947793!2d1.3039720505296026!3d43.5678194658641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aeb140d3d2ae13%3A0xe049c13c4699e7a1!2s1+Rue+d&#39;Estujats%2C+31830+Plaisance-du-Touch!5e0!3m2!1sfr!2sfr!4v1522142231648" width="450" height="320" frameborder="0" style="border:0" margin-right="10rem" allowfullscreen></iframe>
                                        </nav>

                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
                </section>