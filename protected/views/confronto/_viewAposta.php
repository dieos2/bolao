<?php
$casa ="hide";
$visitante = "hide";
if($data->placar_casa >= $data->placar_visitante){
$casa = ""; 
}else{
	$visitante = "";
}
?>
                                 
								   <tr class="divApostas_<?php echo CHtml::encode($data->id) ?>" >
                                       <td> 
									   <div class="<?php echo $casa ?>" style="width: 30%;display: initial;">
                                            <label>
                                                <?php echo ucfirst(CHtml::encode($data->idUser->username)); ?></label>
                                        </div>
										</td>
										<td>
										<div class="form-group" style="width: 26px; display: inline-block;">
                                           
                                            <input class="c<?php echo CHtml::encode($data->id) ?>" type="text" data-notblank="true" data-maxlength="2" id="placar_casa" name="placar_casa" style="width: 100%;text-align: center; border: none" value="<?php echo $data->placar_casa ?>" readonly="readonly">
                                        </div></td><td> x</td>
                                        <td><div class="form-group" style="width: 26px; display: inline-block;">
                                           
                                            <input  class="v<?php echo CHtml::encode($data->id) ?>" type="text" data-notblank="true" data-maxlength="2" id="placar_visitante" name="placar_visitante" style="width: 100%;text-align: center; border: none " value="<?php echo $data->placar_visitante ?>" readonly="readonly">
                                        
                                        </div>
</td>
										<td><div class="<?php echo $visitante ?>" style="width: 30%;display: initial;">
                                             <label>
                                                <?php echo ucfirst(CHtml::encode($data->idUser->username)); ?>
											</label>
                                              
                                        </div></td></tr>
									

