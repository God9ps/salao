<?php
include_once '../bd/BdMySQL.class.php';
include_once '../bd/Administracao.class.php';
include_once '../bd/Alerta.class.php';
include_once '../bd/Clientes.class.php';
include_once '../bd/Marcacoes.class.php';
include_once '../bd/Servicos.class.php';

$servico = new Servico();
$marcacao = new Marcacao();
$accao = $_POST['accao'];

if($accao == 'new')
{
	$startdate = $_POST['startdate'].'+'.$_POST['zone'];
	$title = $_POST['title'];
	$insert = mysqli_query($con,"INSERT INTO calendar(`title`, `startdate`, `enddate`, `allDay`) VALUES('$title','$startdate','$startdate','false')");
	$lastid = mysqli_insert_id($con);
	echo json_encode(array('status'=>'success','eventid'=>$lastid));
}

if($accao == 'changetitle')
{
	$eventid = $_POST['eventid'];
	$title = $_POST['title'];
	$update = mysqli_query($con,"UPDATE calendar SET title='$title' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($accao == 'resetdate')
{
	$title = $_POST['title'];
	$startdate = $_POST['start'];
	$enddate = $_POST['end'];
	$eventid = $_POST['eventid'];
	$update = mysqli_query($con,"UPDATE calendar SET title='$title', startdate = '$startdate', enddate = '$enddate' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($accao == 'remove')
{
	$eventid = $_POST['eventid'];
	$delete = mysqli_query($con,"DELETE FROM calendar where id='$eventid'");
	if($delete)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($accao == 'fetch')
{

 /*   $agenda = array();
    $arrayServico = $servico->listarServicos();
    $arrayMarcacao = $marcacao->listarMarcacoes();
    while ($rowSer = $arrayServico->fetch(PDO::FETCH_ASSOC)){
        while ($rowMar = $arrayMarcacao->fetch(PDO::FETCH_ASSOC)){
            if ($rowSer['id'] == $rowMar['id_servico']){
                $agenda = array("title"=>$rowMar["id_servico"],"start"=>$rowMar["dia"]." ".$rowMar["hora"], "end"=>"2016-12-05 12:30:00" );
            }
        }
    }
    return json_encode($agenda);*/



	$events = array();
    $arrayServico = $servico->listarServicos();
	/*$query = mysqli_query($con, "SELECT * FROM calendar");
	while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC))*/
    while ($fetch = $arrayServico->fetch(PDO::FETCH_ASSOC))
	{
	$e = array();
    $e['id'] = $fetch['id'];
    $e['title'] = $fetch['title'];
    $e['start'] = $fetch['startdate'];
    $e['end'] = $fetch['enddate'];

    $allday = ($fetch['allDay'] == "true") ? true : false;
    $e['allDay'] = $allday;

    array_push($events, $e);
	}
	echo json_encode($events);
}


?>