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
                            <button type="button" class="btn btn-primary">Editar</button>
                         </a></td>';
                        
        $resultados.='</tr>';
                      
    }

?>