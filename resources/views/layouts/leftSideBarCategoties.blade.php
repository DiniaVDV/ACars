<div class="container">
	<div class="row">
		<div class="col-xs-3 col-md-3 col-lg-3 hidden-xs">
			<div class="leftSidebar">
				<h4>Выбран автомобиль:</h4>
				<h4><a class="onRed" href="http://localhost/shop/public">AUDI 80B3 1.8</a></h4>
				<h4>Категории:</h4>

				<?php $i=0; 
				/*print_r($categories);
				print_r(count($categories));die();*/
					  foreach($categories as $element => $value):
							$i++;?>

							<?php  if(count($value) > 1):?>
							<div class="list-group" id="accordion<?=$i?>" role="tablist" aria-multiselectable="true">
										<div class="panel panel-dafault">
											<div class="panel-heading" role="tab" id="heading<?=$i?>">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion<?=$i?>" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>"> <?=$element?>
													</a>
												</h4>
											</div>										
								<?php foreach($value as $childElement => $childValue):
										if(!is_numeric($childElement)):?>
										<div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
											<div class="panel-body">
										<?php	if(count($childValue) > 1):
													$i++;?>
													<div class="list-group" id="accordion<?=$i?>" role="tablist" aria-multiselectable="true">
														<div class="panel panel-dafault">
															<div class="panel-heading" role="tab" id="heading<?=$i?>">
																<h4 class="panel-title">
																	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion<?=$i?>" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>"> <?=$childElement?>
																	</a>
																</h4>
															</div>
												<?php  
														foreach($childValue as $grandChildElement => $grandChildValue):
															if(!is_numeric($grandChildElement)):?>													
																<div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
																	<div class="panel-body">
																		<div class="list-group" id="accordion<?=$i?>" role="tablist" aria-multiselectable="true">
																			<div class="panel panel-dafault">
																				<div class="panel-heading" role="tab" id="heading<?=$i?>">
																					<h4 class="panel-title">
																						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion<?=$i?>" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>"> 
																							<a href="select/#"><?=$grandChildElement?></a>
																						</a>
																					</h4>
																				</div>	
																			</div>
																		</div>			
																	</div>	
																</div>	
														<?php endif;?>
													<?php endforeach;?>									
														</div>
													</div>	
											<?php elseif(count($childValue) == 1):?>
													<div class="list-group" id="accordion<?=$i?>" role="tablist" aria-multiselectable="true">
														<div class="panel panel-dafault">
															<div class="panel-heading" role="tab" id="heading<?=$i?>">
																<h4 class="panel-title">
																	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion<?=$i?>" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>"> 
																	</a>
																	<a href="select/#"><?=$childElement?></a>
																</h4>
															</div>	
														</div>
													</div>											
										<?php endif;?>
											</div>	
										</div>
										<?php endif;?>
								<?php endforeach;?>								
						<?php elseif(count($value) == 1):?>
						
							<div class="list-group" id="accordion<?=$i?>" role="tablist" aria-multiselectable="true">
										<div class="panel panel-dafault">
											<div class="panel-heading" role="tab" id="heading<?=$i?>">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion<?=$i?>" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>"> 
														<a href="#"><?=$element?></a>
													</a>
												</h4>
											</div>	

						<?php endif;?>
																	</div>	
							</div>					
				<?php endforeach;?>
								</div>	
							</div>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 content">
		