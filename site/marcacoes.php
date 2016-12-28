<?php


include_once '../bd/BdMySQL.class.php';

include_once '../bd/Servicos.class.php';

$servico = new Servico();

include_once "cabecalho.php";
include_once "menu.php";
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
<!--                    <div class="box box-solid">-->
<!--                        <div class="box-header with-border">-->
<!--                            <h3 class="box-title">Novo serviço</h3>-->
<!--                        </div>-->
<!--                        <div class="box-body">-->
<!--                            <div class="btn-group" style="width: 100%; margin-bottom: 10px;">-->
<!--                                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
<!--                                <ul class="fc-color-picker" id="color-chooser">-->
<!--                                    <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                    <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <!-- /btn-group -->
<!--                            <div class="input-group">-->
<!--                                <input id="new-event" type="text" class="form-control" placeholder="Event Title">-->
<!---->
<!--                                <div class="input-group-btn">-->
<!--                                    <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                                <!-- /btn-group -->
<!--                            </div>-->
<!--                            <!-- /input-group -->
<!--                        </div>-->
<!--                    </div>-->
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

</section>

<!-- Modal -->
<div class="modal fade" id="Registo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>-->
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar" aria-hidden="true"></i></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form  id="f_registo">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                                <label class="hidden-sm hidden-xs" for="nome">Nome</label>
                                <input class="form-control" name="nome" id="nome" type="text" placeholder="Insira o seu nome">
                                <label class="hidden-sm hidden-xs" for="email">E-mail</label>
                                <input class="form-control" name="email" id="email" type="email" placeholder="Insira o seu email">
                                <label class="hidden-sm hidden-xs" for="telemovel">Telémovel</label>
                                <input class="form-control" name="telemovel" id="telemovel" type="text" placeholder="Insira o seu número de telémovel">
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
                <button type="button" class="btn btn-secondary" id="fechar">Fechar</button>
                <button type="button" class="btn btn-primary" id="marcar">Confirmar marcação</button>
            </div>
        </div>
    </div>
</div>

<!-- Page specific script -->
<script>

    $(document).ready(function() {

        $("#test").css('position','fixed')
            .css('z-index','1000')
            .css('width','100%');

        extra = 0;

        $("#addExtra").click(function () {
            extra++;
            $.ajax({
                url: 'trata.php',
                type: 'POST', // Send post data
//                dataType: 'json',
                data: 'accao=extra',
                async: false,
                success: function(result){
                    $("#f_registo").append('<label class="hidden-sm hidden-xs" for="extra'+extra+'">Serviço adicional</label>'+result);
                    $("#f_registo select:last").attr('id','extra'+extra);
                    if (extra == 3){
                        $("#addExtra").hide();
                    }

                }
            });
            return false;
        });

        $("#fechar").click(function () {
            $("#Registo").modal('hide');
            $('#calendar').fullCalendar('removeEvents',evento._id);
            $("#myModalLabel").empty();
        });

        json_events = null;
        var zone = "00:00";  //Change this to your timezone

        $.ajax({
            url: 'trata.php',
            type: 'POST', // Send post data
            dataType: 'json',
            data: 'accao=agenda',
            async: false,
            success: function(s){
                json_events = s;
            }
        });


        var currentMousePos = {
            x: -1,
            y: -1
        };
        jQuery(document).on("mousemove", function (event) {
            currentMousePos.x = event.pageX;
            currentMousePos.y = event.pageY;
        });

        /* initialize the external events
         -----------------------------------------------------------------*/

        $('#external-events .external-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true, // maintain when user navigates (see docs on the renderEvent method)
                duracao: $.trim($(this).attr('duracao')),
                id_servico: $.trim($(this).attr('id'))
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                opacity: 0.70,
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0,
                start: function(e, ui) {
                    idEvento =  $(this).attr('id');
                    width = $(ui.helper).css('width');
                    height = $(ui.helper).css('height');
                    console.log(idEvento);
                    $(ui.helper).css('width', '110').css('height', '20').css('text-align','center');
                },
                stop: function () {
                    $("#"+idEvento).css('width', width).css('height', height).css('text-align','left');
                }//  original position after the drag
            });

        });


        /* initialize the calendar
         -----------------------------------------------------------------*/

        $('#calendar').fullCalendar({
//            events: JSON.parse(json_events),
            events: json_events,
//            events: [{"id":"1","title":"Unhas","start":"2016-12-05T12:00:00","end":"2016-12-05T14:00:00","allDay":false},{"id":"2","title":"Epila\u00e7\u00e3o","start":"2016-12-05T10:00:00","end":"2016-12-05T12:00:00","allDay":false}],
            //events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
            utc: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek,agendaDay'
            },
            defaultView: 'agendaWeek',
            editable: false,
            droppable: true,
            allDaySlot: false,
            minTime: "10:00:00",
            maxTime: "20:00:00",
            eventReceive: function(event){
                evento = event;
                var title = event.title;
                var duracao = event.duracao;
                var start = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
                var id_servico = event.id_servico;

                var starttime = start.substr(start.length - 8);
                var data = start.substring(0,10);


                $("#myModalLabel").append("<strong> "+title+"</strong> para dia <b style='color: red;'>"+data+"</b> pelas <b style='color: red;'>" +starttime);
                $("#Registo").modal({backdrop: 'static', keyboard: false});
//                console.log("Serviço : " +id_servico+ " - " +title+ "\n Inicio : " +start+ " Fim : " +end);



                $("#marcar").click(function () {

                    var time = starttime.split(':');
                    var drc = duracao.split(':');
                    var horaEnd = parseInt(time[0]) + parseInt(drc[0]);
                    var minutoEnd = parseInt(time[1]) + parseInt(drc[1]);
                    var segundoEnd = parseInt(time[2]) + parseInt(drc[2]);
                    /*horaEnd = (horaEnd<10) ? "0"+horaEnd : horaEnd;
                     minutoEnd = (minutoEnd<10) ? "0"+minutoEnd : minutoEnd;
                     segundoEnd = (segundoEnd<10) ? "0"+segundoEnd : segundoEnd;*/

                    if (extra >= 1){
                        for (i=1;i<=extra;i++){
                            var extraDRC = $("#extra"+i+" option:selected").attr('duracao').split(':');

                            horaEnd = horaEnd + parseInt(extraDRC[0]);
                            minutoEnd = minutoEnd + parseInt(extraDRC[1]);
                            segundoEnd = segundoEnd + parseInt(extraDRC[2]);



                            console.log("extra : " + i + " = " +$("#extra"+i+" option:selected").attr('duracao'));


                        }
                    }

                    horaEnd = (horaEnd<10) ? "0"+horaEnd : horaEnd;
                    minutoEnd = (minutoEnd<10) ? "0"+minutoEnd : minutoEnd;
                    segundoEnd = (segundoEnd<10) ? "0"+segundoEnd : segundoEnd;

                    var TimeEnd = horaEnd+":"+minutoEnd+":"+segundoEnd;
                    var end = data +"T"+ TimeEnd;

//                    console.log("Hora final : " + TimeEnd + " / datahora final : " + end);

                    var dados;
                    var string = "&id_servico="+id_servico+"&startdate="+start+"&enddate="+end+"&title="+title;
                    if (extra >= 1){

                        for (i=1;i<=extra;i++) {
                            var valor = $("#extra"+i).val();
                            string += "&extra"+i+"="+valor;

                        }

                    }
                    dados = $("#f_registo").serialize()+string;

                    $.ajax({
                     url: 'trata.php',
                     data: dados + "&accao=nova",
                     type: 'POST',
                     dataType: 'json',
                     success: function(response){
//                         console.log(response);
                         event.id = response.eventid;
                         $('#calendar').fullCalendar('updateEvent',event);

                     },
                     error: function(e){
                     console.log(e.responseText);
                     }
                     });


                });

                $('#calendar').fullCalendar('updateEvent',event);
                console.log(event);
            },

            eventDrop: function(event, delta, revertFunc) {
                var title = event.title;
                var start = event.start.format();
                var end = (event.end == null) ? start : event.end.format();
                /*$.ajax({
                    url: 'process.php',
                    data: 'accao=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response){
                        if(response.status != 'success')
                            revertFunc();
                    },
                    error: function(e){
                        revertFunc();
                        alert('Error processing your request: '+e.responseText);
                    }
                });*/
            },
            eventClick: function(event, jsEvent, view) {
                console.log(event.id);
                var title = prompt('Event Title:', event.title, { buttons: { Ok: true, Cancel: false} });
                if (title){
                    event.title = title;
                    console.log('accao=changetitle&title='+title+'&eventid='+event.id);
                    $.ajax({
                        url: 'process.php',
                        data: 'accao=changetitle&title='+title+'&eventid='+event.id,
                        type: 'POST',
                        dataType: 'json',
                        success: function(response){
                            if(response.status == 'success')
                                $('#calendar').fullCalendar('updateEvent',event);
                        },
                        error: function(e){
                            alert('Error processing your request: '+e.responseText);
                        }
                    });
                }
            },
            eventResize: function(event, delta, revertFunc) {
                console.log(event);
                var title = event.title;
                var end = event.end.format();
                var start = event.start.format();
                $.ajax({
                    url: 'process.php',
                    data: 'accao=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response){
                        if(response.status != 'success')
                            revertFunc();
                    },
                    error: function(e){
                        revertFunc();
                        alert('Error processing your request: '+e.responseText);
                    }
                });
            },
            eventDragStop: function (event, jsEvent, ui, view) {
                if (isElemOverDiv()) {
                    var con = confirm('Are you sure to delete this event permanently?');
                    if(con == true) {
                        $.ajax({
                            url: 'process.php',
                            data: 'accao=remove&eventid='+event.id,
                            type: 'POST',
                            dataType: 'json',
                            success: function(response){
                                console.log(response);
                                if(response.status == 'success'){
                                    $('#calendar').fullCalendar('removeEvents');
                                    getFreshEvents();
                                }
                            },
                            error: function(e){
                                alert('Error processing your request: '+e.responseText);
                            }
                        });
                    }
                }
            }
        });

        function getFreshEvents(){
            $.ajax({
                url: 'process.php',
                type: 'POST', // Send post data
                data: 'accao=agenda',
                async: false,
                success: function(s){
                    freshevents = s;
                }
            });
//            $('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
            $('#calendar').fullCalendar('addEventSource', freshevents);
        }


        function isElemOverDiv() {
            var trashEl = jQuery('#trash');

            var ofs = trashEl.offset();

            var x1 = ofs.left;
            var x2 = ofs.left + trashEl.outerWidth(true);
            var y1 = ofs.top;
            var y2 = ofs.top + trashEl.outerHeight(true);

            if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
                currentMousePos.y >= y1 && currentMousePos.y <= y2) {
                return true;
            }
            return false;
        }

    });

</script>

