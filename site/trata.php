<?php
include_once '../bd/BdMySQL.class.php';
include_once '../bd/Administracao.class.php';
include_once '../bd/Alerta.class.php';
include_once '../bd/Clientes.class.php';
include_once '../bd/Marcacoes.class.php';
include_once '../bd/Servicos.class.php';

$servico = new Servico();
$rsMarcacao = new Marcacao();
$rsCliente = new Clientes();
switch ($_POST['accao']){
    case 'agenda':

        $events = array();
        $arrayMarcacao = $rsMarcacao->listarMarcacoes();
        /*$query = mysqli_query($con, "SELECT * FROM calendar");
        while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC))*/
        while ($fetch = $arrayMarcacao->fetch(PDO::FETCH_ASSOC))
        {
            $e = array();
            $e['id'] = $fetch['id'];
            $e['title'] = $fetch['title'];
            $e['start'] = $fetch['startdate'];
            $e['end'] = $fetch['enddate'];

//            $allday = ($fetch['allDay'] == "true") ? true : false;
//            $e['allDay'] = $allday;

            array_push($events, $e);
        }
        echo json_encode($events);

    break;

    case 'nova':
        print_r($_POST);
        $cliente = array();
        $marcacao = array();

        $cliente['nome'] = $_POST['nome'];
        $cliente['email'] = $_POST['email'];
        $cliente['telemovel'] = $_POST['telemovel'];
        $cliente['datanascimento'] = $_POST['datanascimento'];

        $marcacao['id_cliente'] = $rsCliente->registarCliente($cliente);
        $marcacao['id_servico'] = $_POST['id_servico'];
        $marcacao['title'] = $_POST['title'];
        $marcacao['startdate'] = $_POST['startdate'];
        $marcacao['enddate'] = $_POST['enddate'];
        $marcacao['extra1'] = (isset($_POST['extra1'])) ? $_POST['extra1'] : '' ;
        $marcacao['extra2'] = (isset($_POST['extra2'])) ? $_POST['extra2'] : '' ;
        $marcacao['extra3'] = (isset($_POST['extra3'])) ? $_POST['extra3'] : '' ;

        $result = $rsMarcacao->registarMarcacao($marcacao);




        /*$con = mysqli_connect('localhost','root','','salao');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telemovel = $_POST['telemovel'];
        $datanascimento = $_POST['datanascimento'];
        $id_servico = $_POST['id_servico'];
        
        $insert = mysqli_query($con,"INSERT INTO clientes(`nome`, `email`, `telemovel`, `datanascimento`) VALUES('$nome','$email','$telemovel','$datanascimento')");
        $lastidcliente = mysqli_insert_id($con);
*/

        echo json_encode(array('status'=>'success','eventid'=>$result));
    break;

    case 'extra':
        $arrayServico = $servico->listarServicos();
        echo "<select class='form-control'>";
        echo "<option value=''>Seleccione serviço</option>";
        foreach ($arrayServico as $value){
            echo "<option value='{$value['id']}' duracao='{$value['duracao']}'>{$value['servico']}</option>";
        }
        echo "</select>";
    break;

    case 'teste':
        $arrayServico = $servico->listarServicos();
        print_r($arrayServico);
    break;

    default:
        echo "Não foi escolhida qualquer acção";
    break;
}