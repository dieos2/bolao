<?php
/* @var $this RankController */
/* @var $data Rank */
?>



<a class="list-group-item" href="#">
        <span class="badge bg-success"><?php echo CHtml::encode($data->idPonto->pontos); ?></span>
        <i class="fa fa-check-square icon-muted"></i>
        <?php echo CHtml::encode($data->idAposta->idConfronto->idTimeCasa->nome); ?>
        <?php echo CHtml::encode($data->idAposta->idConfronto->placar_casa); ?>
        x 
        <?php echo CHtml::encode($data->idAposta->idConfronto->placar_visitante); ?>
        <?php echo CHtml::encode($data->idAposta->idConfronto->idTimeVisitante->nome); ?>
        <?php if($data->id_ponto == 1)
            {echo '<i class="fa fa-star icon-muted"></i>';}
            else if($data->id_ponto == 2){'<i class="fa fa-star-half-o"></i>';}?>
      
        <?php echo CHtml::encode($data->idAposta->placar_casa); ?>
        x 
        <?php echo CHtml::encode($data->idAposta->placar_visitante); ?>
       </a>

                         

