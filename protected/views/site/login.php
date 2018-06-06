<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
    <meta charset="utf-8" />
    <title>Bolão da Copa Online | Web Application</title>
    <meta name="description" content="Sistema de Bolão para os frescos não pertubarem mais" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v2.css" type="text/css" />
    <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js" cache="false"></script> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/excanvas.js" cache="false"></script> <![endif]-->
</head>
<body>
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xxl"><a class="navbar-brand block" href="index.html">Bolão da Copa Online</a>
            <section class="panel panel-default bg-white m-t-lg">
                <header class="panel-heading text-center"><strong>Sign in</strong> </header>
               <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
                  
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	), 'htmlOptions'=>array(
        'class'=>'panel-body wrapper-lg',
    ),
)); ?>
                    <div class="form-group">
                        <label class="control-label">Usuario</label>
                        
                      <?php echo $form->textField($model,'username',array('class'=>'form-control input-lg','placeholder'=>'Usuario')); ?>
		<?php echo $form->error($model,'username'); ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                       
                       <?php echo $form->passwordField($model,'password',array('class'=>'form-control input-lg','placeholder'=>'Senha')); ?>
		<?php echo $form->error($model,'password'); ?>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">
                            Manter-me logado </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <div class="line line-dashed"></div>
                   
          

<?php $this->endWidget(); ?>
	

	
	

	
	

  </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder">
            <p><small>Bolão da Copa Online<br>
                &copy; 2018</small> </p>
        </div>
    </footer>
    <!-- / footer -->
    <script src="js/app.v2.js"></script>
    <!-- Bootstrap -->
    <!-- App -->
</body>
</html>
