<?php
include_once '../bd/BdMySQL.class.php';
include_once '../bd/Servicos.class.php';
include_once '../bd/Imagens.class.php';

$rsImagem = new Imagem();
$servico = new Servico();
?>

<section class="main-section" id="service"><!--main-section-start-->
    <div class="container">
        <h2>Quem somos</h2>
        <h6>Cuidar de si é a nossa prioridade</h6>
        <div class="row">
            <div class="col-lg-4 col-sm-6 wow fadeInLeft delay-05s">
                <div class="service-list wow fadeInLeft delay-07s">
                    <div class="service-list-col1">
                        <img src="img/icones/identity.png" width="60">
                    </div>
                    <div class="service-list-col2 wow fadeInLeft delay-07s">
                        <h3>A nossa identidade</h3>
                        <p>A nossa razão de existir é você, por isso trabalhamos diariamente para podermos oferecer, não
                            só o melhor serviço, mas um local onde possa encontrar calma, bem estar e beleza.</p>
                    </div>
                </div>
                <div class="service-list wow fadeInLeft delay-07s">
                    <div class="service-list-col1">
                        <img src="img/icones/eye-make-up.png" width="50">
                    </div>
                    <div class="service-list-col2 wow fadeInLeft delay-07s">
                        <h3>O nosso serviço</h3>
                        <p>O nascimento da Anna Style Studio surgiu de forma natural, aliando uma paixão pessoal à
                            vontade de fazer com que você se sinta bem e atraente todos os dias.</p>
                    </div>
                </div>
                <div class="service-list wow fadeInLeft delay-07s">
                    <div class="service-list-col1">
                        <img src="img/icones/beauty-products.png" width="50">
                    </div>
                    <div class="service-list-col2 wow fadeInLeft delay-07s">
                        <h3>Os produtos</h3>
                        <p>O nosso padrão de qualidade requer uma escolha cuidada e rigorosa dos produtos por nós
                            utilizados, os quais são seleccionados por forma a garantir a sua total satisfação.</p>
                    </div>
                </div>
                <div class="service-list wow fadeInLeft delay-07s">
                    <div class="service-list-col1">
                        <img src="img/icones/female-graduate-student.png" width="50">
                    </div>
                    <div class="service-list-col2 wow fadeInLeft delay-07s">
                        <h3>Formação</h3>
                        <p>A nossa vontade de bem servir implica uma constante formação para conseguirmos oferecer um
                            serviço de qualidade e com a garantia de estarmos na vanguarda das técnicas de estética
                            utilizadas no mundo.</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-8 col-sm-6 wow fadeInLeft delay-05s">

                <div id="myCarousel" class="carousel slide" data-interval="3000">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#x"><img
                                            src="img/carousel/img1.jpg" alt="Image" class="img-responsive"></a>
                                </div>

                            </div>
                            <!--/row-->
                        </div>

                        <?php

                        $arrayImagem = $rsImagem->listarImagens();
                        while ($rowImagem = $arrayImagem->fetch(PDO::FETCH_ASSOC)) {

                            echo "<div class='item'>";
                            echo "<div class='row'>";
                            echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
                            echo "<a href='#'><img src='../img/{$rowImagem['imagem']}' alt='{$rowImagem['titulo']}' class='img-responsive'></a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";


                        }
                        $rsImagem->endImagens();
                        ?>



                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!--main-section-end-->


<section class="main-section alabaster" id="mobile"><!--main-section alabaster-start-->
    <div class="container">
        <div class="row">
            <figure class="col-lg-5 col-sm-4 wow fadeInLeft">
                <img src="img/iphone.png" alt="" class="img-responsive">
            </figure>
            <div class="col-lg-7 col-sm-8 col-xs-12 featured-work">
                <h2>Anna Mobile</h2>
                <P class="padding-b">Para uma maior proximidade com a Anna Style Studio, oferecemos a nossa aplicação mobile, onde pode encontrar
                    tudo sobre nós. Receba em primeira mão as nossas novidades e beneficie de ofertas exclusivas. Faça também de forma cómoda a sua marcação.</P>
                <div class="featured-box">
                    <div class="featured-box-col1 wow fadeInRight delay-02s">
                        <i class="fa-magic"></i>
                    </div>
                    <div class="featured-box-col2 wow fadeInRight delay-02s">
                        <h3>Como por arte de magia</h3>
                        <p>Tenha um papel activo na Anna Style Studio. A nossa App consegue estreitar laços com as nossas clientes.</p>
                    </div>
                </div>
                <div class="featured-box">
                    <div class="featured-box-col1 wow fadeInRight delay-04s">
                        <i class="fa-gift"></i>
                    </div>
                    <div class="featured-box-col2 wow fadeInRight delay-04s">
                        <h3>Ofertas</h3>
                        <p>Beneficie de exclusividade na Anna. Receba em primeira mão as melhores ofertas e descontos.</p>
                    </div>
                </div>
                <div class="featured-box">
                    <div class="featured-box-col1 wow fadeInRight delay-06s">
                        <i class="fa-calendar"></i>
                    </div>
                    <div class="featured-box-col2 wow fadeInRight delay-06s">
                        <h3>Marcações</h3>
                        <p>De forma prática, cómoda e rápida, com a nossa App pode fazer as suas marcações.</p>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg wow fadeInUp delay-06s center-block"><i class="fa fa-android fa-1x" aria-hidden="true"></i> Download App para Android</button>
            </div>
        </div>
    </div>
</section><!--main-section alabaster-end-->


<section class="main-section paddind" id="Portfolio"><!--main-section-start-->
    <div class="container">
        <h2>Portfolio</h2>
        <h6>Conheça o nosso serviço</h6>
        <div class="portfolioFilter">
            <ul class="Portfolio-nav wow fadeIn delay-02s">
                <li><a href="#" data-filter="*" class="current">Todos</a></li>
                <?php
                    $array = $servico->listarServicos();
                    while ($row = $array->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><a href='#' data-filter='.{$row['id']}'>{$row['servico']}</a> </li>";
                    }
                    $servico->endServicos();
                ?>
            </ul>
        </div>
    </div>


    <div class="portfolioContainer wow fadeInUp delay-04s">
        <?php

        $arrayImagem = $rsImagem->listarImagens();
        while ($rowImagem = $arrayImagem->fetch(PDO::FETCH_ASSOC)) {
        /*$n = sizeof($rowImagem);
        $random_keys=array_rand($rowImagem,$n);

        foreach ($random_keys as $value){*/
            echo "<div class='Portfolio-box {$rowImagem['id_servico']}'>";
                echo "<a href='#'><img src='../img/{$rowImagem['imagem']}' class='img-responsive' alt=''></a>";
                echo "<h3>{$rowImagem['titulo']}</h3>";
                echo "<p>{$rowImagem['descricao']}</p>";
            echo "</div>";
        }
        $rsImagem->endImagens();
        ?>

    </div>
</section><!--main-section-end-->

<!--
<section class="main-section client-part" id="client">
    <div class="container">
        <b class="quote-right wow fadeInDown delay-03"><i class="fa-quote-right"></i></b>
        <div class="row">
            <div class="col-lg-12">
                <p class="client-part-haead wow fadeInDown delay-05">It was a pleasure to work with the guys at Knight Studio. They made sure
                    we were well fed and drunk all the time!</p>
            </div>
        </div>
        <ul class="client wow fadeIn delay-05s">
            <li><a href="#">
                    <img src="img/client-pic1.jpg" alt="">
                    <h3>James Bond</h3>
                    <span>License To Drink Inc.</span>
                </a></li>
        </ul>
    </div>
</section>
<div class="c-logo-part">
    <div class="container">
        <ul>
            <li><a href="#"><img src="img/c-liogo1.png" alt=""></a></li>
            <li><a href="#"><img src="img/c-liogo2.png" alt=""></a></li>
            <li><a href="#"><img src="img/c-liogo3.png" alt=""></a></li>
            <li><a href="#"><img src="img/c-liogo4.png" alt=""></a></li>
            <li><a href="#"><img src="img/c-liogo5.png" alt=""></a></li>
        </ul>
    </div>
</div>
-->

<section class="main-section team" id="prices">
    <div class="container">
        <h2>Preços</h2>
        <h6>Consulte os nossos preços</h6>
        <div class="row">
        <?php

            $array = $servico->listarServicosPrecos();

            while ($row = $array->fetch(PDO::FETCH_ASSOC)) {

                ?>
                    <div class="col-md-3">
                        <div class="panel panel-danger">
                            <div class="panel-heading text-center">
                                <?php echo $row['servico']; ?>
                                <!--										<p class="text-center">MAX TEAM SIZE 25</p>-->
                            </div>
                            <div class="panel-body text-center">
                                <p class="lead" style="font-size:50px"><strong><?php echo $row['preco'] ." €"; ?></strong></p>
                            </div>
                            <ul class="list-group list-group-flush text-center">

                                <li class="list-group-item">
                                    <a class="btn btn-xs btn-block btn-info" id="<?php echo $row['id']; ?>"><span class="fa fa-envelope"></span> Pedir informações</a>
                                </li>
                                <li class="list-group-item">
                                    <a class="btn btn-xs btn-block btn-warning" galeria-id="<?php echo $row['id']; ?>"><span class="fa fa-image"></span> Ver fotos</a>
                                </li>
                            </ul>
                            <div class="panel-footer"><a class="btn btn-md btn-block btn-primary" href="marcacoes.php">QUERO MARCAR</a>
                            </div>
                        </div>
                    </div>


                <?php
            }
            $servico->endServicos();
        ?>
        </div>
</div>

</section>




<!--<section class="business-talking">
    <div class="container">
        <h2>Venha tratar de si...</h2>
    </div>
</section>-->

<div class="container">
    <section class="main-section contact" id="contact">
        <h2>CONTACTOS</h2>
        <h6>Entre facilmente em contacto connosco</h6>
        <div class="row">
            <div class="col-lg-6 col-sm-7 wow fadeInLeft">
                <div class="contact-info-box address clearfix">
                    <h3><i class=" icon-map-marker"></i>Morada:</h3>
                    <span>Rua São João da Mata 50<br>1200-850 Lisboa</span>
                </div>
                <div class="contact-info-box phone clearfix">
                    <h3><i class="fa-mobile-phone"></i>Telemovel:</h3>
                    <span>96 395 86 84</span>
                </div>
                <div class="contact-info-box email clearfix">
                    <h3><i class="fa-pencil"></i>Email:</h3>
                    <span>geral@annastyle.pt</span>
                </div>
                <div class="contact-info-box hours clearfix">
                    <h3><i class="fa-clock-o"></i>Horário:</h3>
                    <span><strong>Segunda a Sexta:</strong> 10h - 20h<br><strong>Sábado:</strong> 10h - 14h<br></span>
                </div>
                <ul class="social-link">
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="pinterest"><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-sm-5 wow fadeInUp delay-05s">
                <div class="form">

                    <div id="sendmessage">A sua mensagem foi enviada. Obrigado!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control input-text" id="name"
                                   placeholder="Nome" data-rule="minlen:4"
                                   data-msg="Nome inválido"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control input-text" name="email" id="email"
                                   placeholder="Email" data-rule="email" data-msg="Insira um email válido"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-text" name="subject" id="subject"
                                   placeholder="Assunto" data-rule="minlen:4"
                                   data-msg="Introduza assunto com mais de 8 caractéres"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-text text-area" name="message" rows="5"
                                      data-rule="required" data-msg="Escreva a mensagem"
                                      placeholder="Menssagem"></textarea>
                            <div class="validation"></div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="input-btn">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>