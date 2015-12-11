<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$id_user = Yii::app()->user->getId();
$model = User::model()->find($condition = "id=$id_user");

if (Arquiteto::model()->exists($condition = "id_user=$id_user")) {
    $tipo = "Arquiteto";
    $perfil = Arquiteto::model()->find($condition = "id_user=$id_user");
} else if (Loja::model()->exists($condition = "id_user=$id_user")) {
    $tipo = "Loja";
    $perfil = Loja::model()->find($condition = "id_user=$id_user");
} else {
    $tipo = "Admin";
}
?>

<div class="content sortableContent">

    <div class="page-header">
        <div class="icon">
            <span class="ico-user"></span>
        </div>
        <h1>Perfil <small>GERENCIAMENTO DO PERFIL</small></h1>
    </div>
    <div class="row-fluid">
        <div class="span4 column">
            <table width="100%" class="table tickets">
                <tr>
                    <td width="55" class="bl_blue"><span class="label label-info">username</span></td>
                    <td width="50"><?php echo $model->username ?> <span class="mark">23/02/2013</span></td>
                </tr>
<?php
if ($tipo != "Admin") {
    echo '<tr>';
    echo '<td class="bl_blue"><span class="label label-info">Nome</span></td>';
    echo '<td> ' . $perfil->nome . '<span class="mark">22/02/2013</span></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td class="bl_green"><span class="label label-success">E-mail</span></td>';
    echo '<td>' . $perfil->email . '<span class="mark">21/02/2013</span></td>';
    echo '</tr>';
    echo '<tr>';
}
?>
                <td class="bl_red"><span class="label label-important">tipo</span></td>
                <td><?php echo $tipo ?> <span class="mark">20/02/2013</span></td>
                </tr>

            </table>
            <div class="row-form">
               <?php if ($tipo != "Admin") {
                echo '<a id="edita" href="#" class ="btn">Editar</a>';
               } ?>
                <a id="senha" href="#" class ='btn orange'>Alterar Senha</a>
            </div> 
        </div>
        
        
        <div id="divEditar" class="span4 column">
<?php
if ($tipo == "Arquiteto") {
    
    echo $this->renderPartial('_formArquiteto', array('model' => $perfil));
} else if($tipo == 'Loja') {
    echo $this->renderPartial('_formLoja', array('model' => $perfil));
}
?> 

        </div>
        <div id='divSenha' class="span4 column">
<?php
 echo $this->renderPartial('_formSenha');
 ?>
        </div>
    </div>    
</div>
<script>
    $(function() {
        $("#divEditar").hide();
         $("#divSenha").hide();
        $("#edita").click(function() {
            $("#divEditar").fadeIn();
        });
         $("#senha").click(function() {
            $("#divSenha").fadeIn();
        });
        
    });
</script>