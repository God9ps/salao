<?php

function geraSenha($numeros = true)
{
// Caracteres de cada tipo

    $num = '1234567890';

// Variáveis internas
    $retorno = '';
    $caracteres = '';
// Agrupamos todos os caracteres que poderão ser utilizados


    if ($numeros) $caracteres .= $num;
    $tamanho = 5;
// Calculamos o total de caracteres possíveis
    $len = strlen($caracteres);
    for ($n = 1; $n <= $tamanho; $n++) {
// Criamos um número aleatório de 1 até $len para pegar um dos caracteres
        $rand = mt_rand(1, $len);
// Concatenamos um dos caracteres na variável $retorno
        $retorno .= $caracteres[$rand-1];
    }
    return $retorno;
}

include_once '../bd/BdMySQL.class.php';
include_once '../bd/Administracao.class.php';
include_once '../bd/Alerta.class.php';
include_once '../bd/Clientes.class.php';
include_once '../bd/Marcacoes.class.php';
include_once '../bd/Servicos.class.php';
include_once '../bd/php-uk/textlocal.class.php';

$servico = new Servico();
$rsMarcacao = new Marcacao();
$rsCliente = new Clientes();
$rsAlerta = new Alerta();

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
        $status = "erro";
        $cliente = array();
        $marcacao = array();

        $cliente['nome'] = $_POST['nome'];
        $cliente['email'] = $_POST['email'];
        $cliente['telemovel'] = '351'.$_POST['telemovel'];
        $cliente['datanascimento'] = $_POST['datanascimento'];

        $exiteEmail = $rsCliente->verificarClientePeloEmail($_POST['email']);

        if (is_array($exiteEmail)){
            $marcacao['id_cliente'] = $exiteEmail[0];
        }else{
            $marcacao['id_cliente'] = $rsCliente->registarCliente($cliente);
        }


        $marcacao['id_servico'] = $_POST['id_servico'];
        $marcacao['title'] = $_POST['title'];
        $marcacao['startdate'] = $_POST['startdate'];
        $marcacao['enddate'] = $_POST['enddate'];
        $marcacao['extra1'] = (isset($_POST['extra1'])) ? $_POST['extra1'] : '' ;
        $marcacao['extra2'] = (isset($_POST['extra2'])) ? $_POST['extra2'] : '' ;
        $marcacao['extra3'] = (isset($_POST['extra3'])) ? $_POST['extra3'] : '' ;
        $marcacao['codigo'] = geraSenha();

        try {
            $result = $rsMarcacao->registarMarcacao($marcacao);
            $status = "success";
//            print_r($result);
        } catch (Exception $e) {

            die('Error: ' . $e->getMessage());
        }

        if ($_POST['confOP'] == 0){
            $textlocal = new Textlocal('pauloamserrano@gmail.com', 'Alex2007');

            $numbers = array($cliente['telemovel']);
            $sender = 'Anna Style';
            $message = 'Para confirmar a sua visita introduza o código : ' . $marcacao['codigo'];

            try {
                $resultsms = $textlocal->sendSms($numbers, $message, $sender);
//            print_r($result);
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
        }else if($_POST['confOP'] == 1){
            $rsAlerta->enviarEmail("Código de confirmação","Código : " . $marcacao['codigo'], "geral@annastyle.pt" , "Anna Style Studio", $cliente['email'] , $cliente['nome'] );
        }



        echo json_encode(array('status'=>$status,'eventid'=>$result));

    break;

    case 'confMarcacao':
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];

        try {

            $result = $rsMarcacao->confMarcacao($id, $codigo);
            echo json_encode(array('status'=>'success','eventid'=>$result));

        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

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

    default:
        echo "Não foi escolhida qualquer acção";
    break;
}