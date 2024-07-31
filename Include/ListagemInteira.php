<?php
    
    $resultados="";

    foreach($Internacao as $a){
        $resultados.='<tr>';
        $resultados.='<td>'.$a->codigo.'</td>
                      <td>'.$a->data.'</td>
                      <td>'.$a->hora.'</td>
                      <td>'.$a->motivo.'</td>
                      <td>'.$a->qtdeDiarias.'</td>
                      <td>'.$a->valorQuarto.'</td>
                      <td>'.$a->nomePaciente.'</td>
                      <td>'.$a->totalGasto.'</td>

                      <td>
                         <a href="Internacao.php?codigo='.$a->codigo.'">
                         </a></td>';
                        
        $resultados.='</tr>';
                      
    }

?>
<main>

<div class="container">
<section>
    <table class='table table-striped mt-3' >
        <thead><tr>
            <td>Código</td>
            <td>Data</td>
            <td>Horário</td>
            <td>Motivo</td>
            <td>Quantidade de Dias</td>
            <td>Valor do Quarto</td>
            <td>Nome do Paciente</td>
            <td>Total Gasto</td>
           </tr>
        </thead>
  
    <tbody>
         <?=$resultados?>
    </tbody>
   </table>

</section>    
</div>
</main>