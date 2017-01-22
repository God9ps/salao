


$(document).ready(function () {

    $('#myCarousel').carousel({
        interval: 3000,
        cycle: true
    });


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
            console.log(s);
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
                // console.log(idEvento);
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
        eventOverlap: true,
        hiddenDays: [ 0 ],
        businessHours: [
            {
                start: '10:00',
                end: '20:00',
                dow: [ 1,2,3,4,5 ]

            },
            {
                start: '10:00',
                end: '14:00',
                dow: [ 6 ]

            }],
        eventReceive: function(event){
            $(".fc-title").hide();
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

            $("#cancelar").click(function () {
                $("#Registo").modal('hide');

                $('#calendar').fullCalendar('removeEvents',evento._id);
                $(".fc-title").hide();
                $("#myModalLabel").empty();
                $('.modal-body').find('form')[0].reset();
            });

            $("input[name='confOP']").change(function () {
                confOP = $(this).val();
                $("#marcar").removeAttr('disabled');
            });

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

                    }
                }

                minutoEnd = (minutoEnd<10) ? "0"+minutoEnd : minutoEnd;

                if (parseInt(minutoEnd) > 59){
                    minutoEnd = "00";
                    horaEnd = horaEnd + 1;
                    horaEnd = (horaEnd<10) ? "0"+horaEnd : horaEnd;
                }

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
                    data: dados +"&confOP="+confOP+ "&accao=nova",
                    type: 'POST',
                    dataType: 'json',
                    success: function(){
                        $("#fechar").remove();
                    },
                    complete: function(response){

                        var retorno = response.responseJSON;

                        console.log(response.responseJSON);
                        if (retorno.status === 'success'){

                            event.id = retorno.eventid;


                            $(".modal-body").html('<h3>Verifique o seu telemovel/email e insira o código</h3><br><br><input style="width: 100px" class="form-control" name="codigo" id="codigo" type="text" placeholder="" required maxlength="5">');
                            $(".modal-footer").html('<button type="button" class="btn btn-secondary" id="fechar">Fechar</button><button class="btn btn-sm btn-primary" id="confMarcacao">Confirmar</button>');
                            $("#codigo").focus();

                            $("#fechar").click(function () {
                                $("#Registo").modal('hide');

                                $('#calendar').fullCalendar('removeEvents',evento._id);
                                $("#myModalLabel").empty();
                                $('.modal-body').find('form')[0].reset();
                            });

                            $("#confMarcacao").click(function () {

                                $.ajax({
                                    url: 'trata.php',
                                    data: {id: event.id, codigo: $("#codigo").val(), accao: 'confMarcacao'},
                                    type: 'POST',
                                    dataType: 'json',
                                    complete: function(response){

                                        /*console.log(response + " " + response.responseJSON);
                                        var retorno = response.responseJSON;*/

                                        if (retorno.status === 'success') {
                                            $('#calendar').fullCalendar('updateEvent', event);
                                            $("#Registo").modal('hide');
                                            $("#myModalLabel").empty();
                                            $('.modal-body').find('form')[0].reset();
                                            $.notify("A sua marcação foi confirmada","success");
                                        }else{
                                            $("#myModalLabel").empty();
                                            $('.modal-body').find('form')[0].reset();
                                            $.notify("Código inválido","error");
                                        }
                                    }
                                });
                            });

                        }else if (retorno.status === 'indisponivel'){
                            console.log("Horario indisponivel");
                            $("#Registo").modal('hide');
                            $('#calendar').fullCalendar('removeEvents',evento._id);
                            $("#myModalLabel").empty();
                            $('.modal-body').find('form')[0].reset();
                        }
                    },
                    error: function(e){
                        // console.log(e.responseText);
                    }
                });


            });

            $('#calendar').fullCalendar('updateEvent',event);

        }

        /*eventDrop: function(event, delta, revertFunc) {
            var title = event.title;
            var start = event.start.format();
            var end = (event.end == null) ? start : event.end.format();
            /!*$.ajax({
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
             });*!/
        },*/
        /*eventClick: function(event, jsEvent, view) {
            // console.log(event.id);
            var title = prompt('Event Title:', event.title, { buttons: { Ok: true, Cancel: false} });
            if (title){
                event.title = title;
                // console.log('accao=changetitle&title='+title+'&eventid='+event.id);
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
        },*/
        /*eventResize: function(event, delta, revertFunc) {
            // console.log(event);
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
        },*/
        /*eventDragStop: function (event, jsEvent, ui, view) {
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
        }*/
    });

    $(".fc-title").hide();

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