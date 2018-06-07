<?php
/* @var $this RankController */
/* @var $data Rank */
?>

<style>
    .panel .table td, .panel .table th {
    padding: 6px 10px !important;}
    </style>


      
<tr><td><div style=" float:left" data-toggle="tooltip" data-original-title="<?php echo CHtml::encode($data->idAposta->idConfronto->idTimeCasa->nome); ?>"><img src="images/<?php echo CHtml::encode($data->idAposta->idConfronto->idTimeCasa->escudo)?>" />
        <?php echo CHtml::encode($data->idAposta->idConfronto->placar_casa); ?></div>
        <div style="float: left;
    font-size: 98%;
    font-weight: bold;
    padding: 0 10px;">x</div>
       
       <div style=" float:left" data-toggle="tooltip" data-original-title="<?php echo CHtml::encode($data->idAposta->idConfronto->idTimeVisitante->nome); ?>"> <?php echo CHtml::encode($data->idAposta->idConfronto->placar_visitante); ?>
           <img src="images/<?php echo CHtml::encode($data->idAposta->idConfronto->idTimeVisitante->escudo)?>" />
       </div> </td>
            <td>
      <div style=" float:left" data-toggle="tooltip" data-original-title="<?php echo CHtml::encode($data->idAposta->idConfronto->idTimeCasa->nome); ?>"><img src="images/<?php echo CHtml::encode($data->idAposta->idConfronto->idTimeCasa->escudo)?>" />
        <?php echo CHtml::encode($data->idAposta->placar_casa); ?></div>
        <div style="float: left;
    font-size: 98%;
    font-weight: bold;
    padding: 0 10px;">x</div> 
         <div style=" float:left" data-toggle="tooltip" data-original-title="<?php echo CHtml::encode($data->idAposta->idConfronto->idTimeVisitante->nome); ?>">
 <?php echo CHtml::encode($data->idAposta->placar_visitante); ?>
     <img src="images/<?php echo CHtml::encode($data->idAposta->idConfronto->idTimeVisitante->escudo)?>" />
         </div>
            </td>
            <td>  <span class="badge bg-success"><?php echo CHtml::encode($data->idPonto->pontos); ?></span>
       </td>
        </tr>
                         

