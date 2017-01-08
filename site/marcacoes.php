<?php


include_once '../bd/BdMySQL.class.php';

include_once '../bd/Servicos.class.php';

$servico = new Servico();

include_once "cabecalho.php";
include_once "menu1.php";
?>
<br><br><br><br><br>
<section class="main-section" id="marcacoes">
    <!-- Content Wrapper. Contains page content -->
    <div class="container">

        <!-- Main content -->

            <div class="row">
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h4 class="box-title">Serviços</h4>
                        </div>
                        <div class="box-body">
                            <!-- the events -->
                            <div id="external-events">
                                <?php
                                $cores = array('aqua','yellow','light-blue','teal','blue','orange','green','red','fuchsia','navy');
                                $array = $servico->listarServicos();
                                $i=0;
                                while ($row = $array->fetch(PDO::FETCH_ASSOC)){
                                    echo "<div id='{$row['id']}' duracao='{$row['duracao']}' class='external-event bg-{$cores[$i]}'>{$row['servico']}</div>";
                                    $i++;
                                } ?>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
<!--                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Novo serviço</h3>
                        </div>
                        <div class="box-body">
                            <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>
                                <ul class="fc-color-picker" id="color-chooser">
                                    <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                                    <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                                </ul>
                            </div>
                            <!-- /btn-group
                            <div class="input-group">
                                <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                                <div class="input-group-btn">
                                    <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add
                                    </button>
                                </div>
                                <!-- /btn-group
                            </div>
                            <!-- /input-group
                        </div>
                    </div>-->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-body no-padding">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>

    </div>


    <!-- Modal -->
    <div role="main" class="modal fade" id="Registo" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                     </button>-->
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar" aria-hidden="true"></i></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="formulario">
                        <form  id="f_registo">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                                    <label class="hidden-sm hidden-xs" for="nome">Nome</label>
                                    <input class="form-control" name="nome" id="nome" type="text" placeholder="Insira o seu nome" required="required">
                                    <label class="hidden-sm hidden-xs" for="email">E-mail</label>
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Insira o seu email" required="required">
                                    <label class="hidden-sm hidden-xs" for="telemovel">Telémovel</label>
                                    <input class="form-control" name="telemovel" id="telemovel" type="text" placeholder="Insira o seu número de telémovel" required="required">
                                    <label class="hidden-sm hidden-xs" for="datanascimento">Data de Nascimento</label>
                                    <input class="form-control" name="datanascimento" id="datanascimento" type="date" placeholder="Insira a sua data de nascimento">

                                </div>
                            </div>

                        </form>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <button id="addExtra" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar serviço</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row" style="margin-right: 5px;">
                        <label class="radio-inline">
                            <input type="radio" value="0" name="confOP">SMS
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="1" name="confOP">E-Mail
                        </label>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-secondary" id="cancelar">Fechar</button>
                        <button type="button" class="btn btn-primary" id="marcar" disabled>Confirmar marcação</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <!--  <div class="modal fade" id="Confirmar" style="width: 200px;">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <form  id="f_confirmar">
                              <div class="row">
                                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                      <p>Verifique o seu telemovel e insira o código</p>
                                      <input class="form-control" name="codigo" id="codigo" type="text" placeholder="" required="required" maxlength="5">
                                      <button class="btn btn-sm btn-primary" id="confMarcacao">Confirmar</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>-->

</section>



<!-- Page specific script -->
<script>

    $(document).ready(function() {

        $("#test").css('position','fixed')
            .css('z-index','1000')
            .css('width','100%');



    });

</script>

