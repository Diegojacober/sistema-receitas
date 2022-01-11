<?php
require "./vendor/autoload.php";
// reference the Dompdf namespace
use Dompdf\Dompdf;

$nome = filter_input(INPUT_GET,'nome');
$idade = filter_input(INPUT_GET,'idade');
$data = filter_input(INPUT_GET,'data');
$adicao = filter_input(INPUT_GET,'adicao');
$odEsferico = filter_input(INPUT_GET,'od_esferico');
$odCilindrico = filter_input(INPUT_GET,'od_cilindrico');
$odEixo = filter_input(INPUT_GET,'od_eixo');
$oeEsferico = filter_input(INPUT_GET,'oe_esferico');
$oeCilindrico = filter_input(INPUT_GET,'oe_cilindrico');
$oeEixo = filter_input(INPUT_GET,'oe_eixo');
$descricao = filter_input(INPUT_GET,'descricao');

$html ='<head>
<style>
    
.cardd{
padding: 20px;
background-color: rgb(243, 243, 243);
margin-top: 35px;
margin-bottom: 30px;
border-radius: 20px;
box-shadow: 2px 5px 15px black;
}

.card-head h4{
width: 100vw;
text-align: center;
}

.tabela{
border-radius: 10px;
}
table{
width: 100vw;
border: 1px solid black;
}
th{
border: 1px solid black;
height: 25px;
}
td{
border:1px solid black;
height: 35px;
}


</style>
</head>

<body>

<main class="container">
<div style="display:flex;">
    <h2 align="center">LAUDO OPTOMÉTRICO: </h2>
    <h4 style="margin-left:600px;padding-top:40px;display:block">'.$data.'</h4>
</div>
    <div class="cardd">
        <div class="card-head">
            <h2>'.$nome .', '. $idade .' anos</h2><br>
           <br><br>
            
        </div>
        
        <div class="card-body">
            <div class="table-responsive tabela">

                <table class="table table-bordered">

                    <thead class="thead-dark">

                        <tr>

                            <th>OLHO</th>

                            <th>ESFÉRICO</th>

                            <th>CILINDRICO</th>

                            <th>EIXO</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td >OD</td>

                            <td>'. $odEsferico. '</td>

                            <td>'. $odCilindrico. '</td>

                            <td>'. $odEixo. '</td>

                        </tr>



                        <tr>

                            <td >OE</td>

                            <td>'. $oeEsferico. '</td>

                            <td>'. $oeCilindrico. '</td>

                            <td>'. $oeEixo. '</td>

                        </tr>

                    </tbody>



                </table>
                <br><br>
                <div><b>Adição: '. $adicao.'</b></div>

            </div>
        </div>
        <br><br>
        <div>Observação: '. $descricao .'</div>
        <br><br><br>
        
    </div>
    <br><br><hr>

</main>
</body>
';


$dompdf = new Dompdf();

$dompdf->loadHtml($html);


$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

header('Content-type: application/pdf');

echo $dompdf->output();