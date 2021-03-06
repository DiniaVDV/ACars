<div class="container">
	<div class="row">
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
			<div class="leftSidebar">
				<h4>Выбран автомобиль:</h4>
				<div>
					<h4><a class="onRed" href="{{url()->current()}}/about">{{$car->alias}}</a></h4>
					<a class="btn btn-default" href="{{asset('/')}}">
						Сброс
					</a>
				</div>
				<h4>Категории:</h4>
				<div onclick="listOfCategory(arguments[0])">
					<?php foreach($categories as $element => $value):?>
						<?php  if(count($value) > 1):?>
									<ul class="Container">
										<li class="Node IsRoot IsLast ExpandClosed">
											<div class="Expand"></div>
											<div class="Content"><?=$element?></div>
											<ul class="Container">
												<?php foreach($value as $childElement => $childValue):
														if(!is_numeric($childElement)):?>
															<?php if(count($childValue) > 1):?>
																	<li class="Node ExpandClosed">
																		<div class="Expand"></div>
																		<div class="Content"><?=$childElement?></div>
																		<ul class="Container">
																		  <?php foreach($childValue as $grandChildElement => $grandChildValue):
																					if(!is_numeric($grandChildElement)):?>									
																						<li class="Node ExpandLeaf IsLast">
																							<div class="Expand"></div>
																							<div class="Content"><a
																										href="{{asset('/cars')}}/{{Session::get('car_alias')}}/categories/{{$grandChildValue->category_name}}"><?=$grandChildElement?></a></div>
																						</li>
																			  <?php endif;?>
																		  <?php endforeach;?>									
																		</ul>
																	</li>
															<?php elseif(count($childValue) == 1):?>
																	<li class="Node ExpandLeaf IsLast">
																		<div class="Expand"></div>
																		<div class="Content"><a href="{{asset('/cars')}}/{{Session::get('car_alias')}}/categories/{{$childValue->category_name}}"><?=$childElement?></a></div>
																	</li>
															<?php endif;?>		
												  <?php endif;?>
												<?php endforeach;?>	
										
											</ul>
										</li>
									</ul>
											
							<?php elseif(count($value) == 1):?>
									<ul class="Container">
										<li class="Node IsRoot IsLast ExpandClosed">
											<div class="Expand"></div>
											<div class="Content"><a href="{{asset('/cars')}}/{{Session::get('car_alias')}}/categories/{{$value[0]->category_name}}"><?=$element?></a></div>
										</li>
									</ul>
		
							<?php endif;?>			
				<?php endforeach;?>		
			</div>
	
			</div>
		</div>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 content">

