<?php include('entete.php'); ?>


<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>



<div class="container">
    <h3 style="text-align:center;border-bottom:solid 1px #eee">Partenaires</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="Carousel" class="carousel slide">

                <ol class="carousel-indicators">
                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#Carousel" data-slide-to="1"></li>
                    <li data-target="#Carousel" data-slide-to="2"></li>
                </ol>

                <!-- Carousel items -->
                <div class="carousel-inner">

                    <div class="item active">
                        <div class="row">
                            <div class="col-md-2 col-xs-4"><a href="http://lapartdereve.fr" class="thumbnail"><img src="../../../public/img/partenaires/la-part-de-reve.jpg" alt="Image" style="height:80px;"></a></div>
                            <div class="col-md-2 col-xs-4"><a href="http://air-du-temps.fr/" class="thumbnail"><img src="../../../public/img/partenaires/l-air-du-temps.jpg" alt="Image" style="height:80px;"></a></div>
                            <div class="col-md-2 col-xs-4"><a href="http://vuedereve.fr/" class="thumbnail"><img src="../../../public/img/partenaires/Vue_de_reve.png" alt="Image" style="height:80px;"></a></div>
                            <div class="col-md-2 col-xs-4"><a href="http://ifca31.fr/" class="thumbnail"><img src="../../../public/img/partenaires/ifca.png" alt="Image" style="height:80px;"></a></div>
                            <div class="col-md-2 col-xs-4"><a href="http://www.thirdedge.fr/" class="thumbnail"><img src="../../../public/img/partenaires/pouria-ardalan.jpg" alt="Image" style="height:80px;"></a></div>
                            <div class="col-md-2 col-xs-4"><a href="http://www.societe-rei.fr/" class="thumbnail"><img src="../../../public/img/partenaires/rei.jpg" alt="Image" style="height:80px;"></a></div>

                        </div><!--.row-->
                    </div><!--.item-->

                    <div class="item">
                        <div class="row">
                            <div class="col-md-2 col-xs-4"><a href="http://www.eritec.eu/" class="thumbnail"><img src="../../../public/img/partenaires/eritec.png" alt="Image" style="height:80px;"></a></div>
                            <div class="col-md-2 col-xs-4"><a class="thumbnail"><img src="../../../public/img/partenaires/l-abattoir.jpg" alt="Image" style="height:80px;"></a></div>
                            <div class="col-md-2 col-xs-4"><a href="https://www.fonsorbes.fr/annuaires-professionnels/afsom/" class="thumbnail"><img src="../../../public/img/partenaires/afsom.jpg" alt="Image" style="height:80px;"></a></div>
                        </div><!--.row-->
                    </div><!--.item-->





                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('#Carousel').carousel({
                    interval: 3000
                })
            });
        </script>
