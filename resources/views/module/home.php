
<section class="content-wrapper" style="padding: 0; margin: 0 15vw;">
	<div class="content-header" style="text-align: center; background: black; margin: 0;height: 22vh;padding: 0px;" width="100vw">
		
				<div>BACKGROUND</div>

			</div>
<div class="row" style="border: 1px solid black; margin: 0">
	
	<div class="col-md-3">
		
		<div class="box">

			<div class="box-body">
				
				
				<div class="row">

					<div class="col-md-6">
						
						<span><img src="" alt="">STEAM</span><br>
						<span><img src="" alt="">Origin</span><br>
						<span><img src="" alt="">Rockstar</span><br>
						<span><img src="" alt="">Xbox</span><br>
						<span><img src="" alt="">Indies</span>

					</div>
					<div class="col-md-6">
						
						<span><img src="" alt="">Uplay</span><br>
						<span><img src="" alt="">Battle.net</span><br>
						<span><img src="" alt="">Nintendo</span><br>
						<span><img src="" alt="">Playstation</span><br>
						<span><img src="" alt="">Otros</span>	

					</div>
				</div>
				<hr>
				<?php 

					$item= null;
					$value= null;

					$categories = ControllerCategories::ctrShowCategories($item,$value);

					if($categories){

						for ($i=0; $i < 6; $i++) { 
							
							if($i == count($categories) ){

								break;
							}else{

								echo '<li>'.$categories[$i]["category"].'</li>';

							}

						}
						echo '<small style="padding: 20px"><a href="">...</a></small>';

					}

				 ?>



			</div>



		</div>

	</div>
	<div class="col-md-6" style="margin: 0; padding: 0;">
		
		<div class="box">
			
		
			<div class="box-body">
				
				<div class="productsPreorder mainshadow">
					
				<?php 
				$item = null;
				$value = null;
				$order = "id";

				$products = ControllerProducts::ctrShowProducts($item,$value,$order);

				for ($i=0; $i < 12 ; $i++) { 
					
					if($i == count($products)){
						break;
					}else{

						echo '<div class="item">
								<div class="clock delivered"><span>Disponible</span></div> 
								<a href="" class="cover">
									<img src="'.$products[$i]["image"].'" class="img-thumbnail">';
									if($products[$i]["isDlc"] == 1){

										echo '<img src="https://s1.gaming-cdn.com/themes/igv1/images/dlc.png" class="dlc" alt="DLC">';
									}
								echo '<div class="shadow">
										<span class="discount">22% OFF</span>
										<span class="price">'.$products[$i]["sale_price"].'</span>
									</div>
								</a>
								 <div class="date">
								'.$products[$i]["release_date"].'
								</div> 
								<a class="btn btn-primary" href="" rel="nofollow">
								Comprar
								</a> 
							</div>';

					}

				}


				?>
					
				</div>


			</div>

	

		</div>

	</div>
	<div class="col-md-3" style="padding: 0 20px 0 5px">
		
		<div class="box">
			
			<div class="box-header" style="text-align: center;">
				OFERTDA DEL DIA
				<div id="clock" style="margin: 0"></div>


			</div>
				



			<div class="box-body">ULTIMOS COMENTARIOS</div>



		</div>

	</div>
</div>

</section>
