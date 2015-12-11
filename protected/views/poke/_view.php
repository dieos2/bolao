<?php
/* @var $this PokeController */
/* @var $data Poke */
?>





<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-sm-6">
                <section class="panel panel-default">
                    <header class="panel-heading bg-danger lt no-border">
                        <div class="clearfix"><a href="#" class="pull-left thumb avatar b-3x m-r">
                                <img src='images/poke/<?php echo $data->foto ?>' class="img-circle">
                            </a>
                            <div class="clear">
                                <div class="h3 m-t-xs m-b-xs text-white">#<?php echo $data->numero ?> - <?php echo $data->nome ?> 
                                    <?php
                                    if ($data->pego != 0) {
                                        echo '<img src="/images/poke/images.png" />';
                                    } else {
                                        echo '<i class="fa fa-circle text-white pull-right text-xs m-t-sm"></i>';
                                    }
                                    ?> </div>
                                <small class="text-muted"></small> </div>
                        </div>
                    </header>
                    <div class="list-group no-radius alt">
                        <a id="" data-id="<?php echo $data->id ?>" data-pego="<?php if($data->pego != 0)
															 { 
															 echo '0'; 
															 }
															 else
															 { 
															 echo '1' ;
															 }
															 ?> " class="peguei list-group-item" href="#">
                            <span class="badge bg-success"> </span>
                            <i class="fa fa-check-square icon-muted"></i>
                                <?php echo CHtml::encode($data->onde); ?>
                        </a>
                    </div>
                    <div class="list-group no-radius alt"><a class="list-group-item" href="#">
                            <span class="badge bg-success"></span>
                            <i class="fa fa-tachometer"></i>
                            Total
                        </a>

                    </div>             
                </section>

            </div>

        </div>
    </div>

</div>


