<?php
/* @var $this ConfrontoController */
/* @var $model Confronto */

$this->breadcrumbs = array(
    'Confrontos' => array('index'),
    $model->id,
);
?>
<meta property="og:title" content="<?php echo $model->idTimeCasa->nome ?> x <?php echo $model->idTimeVisitante->nome ?> - Bolão da Galera" />

<meta property="og:type" content="article"/>

<meta property="og:site_name" content="http://www.casadogui.com.br "/>

<meta property="og:image" content="http://www.casadogui.com.br/bandeiras/<?php echo $model->idTimeCasa->escudo ?>" />
<meta property="og:image" content="http://www.casadogui.com.br/bandeiras/<?php echo $model->idTimeVisitante->escudo ?>" />
<meta property="og:description" content="\o/ Estou na torcida \o/"/>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script>

    jQuery(function() {
        debugger;
        location.href = "index.php";
    });
</script>
