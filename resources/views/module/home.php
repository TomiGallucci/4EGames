
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
				
					<div class="item">
						<div class="clock delivered"><span>ESTADO</span></div> 
						<a href="" class="cover">
							<img src="https://s1.gaming-cdn.com/images/products/5820/157x218/street-fighter-v-champion-edition-upgrade-kit-bundle-cover.jpg">
							<img src="https://s1.gaming-cdn.com/themes/igv1/images/dlc.png" class="dlc" alt="DLC">
							<div class="shadow">
								<span class="discount">22% OFF</span>
								<span class="price">PRECIO</span>
							</div>
						</a>
						 <div class="date">
						10/12/98
						</div> 
						<a class="button" href="https://www.instant-gaming.com/es/5820-comprar-key-steam-street-fighter-v-champion-edition-upgrade-kit-bundle/" rel="nofollow">
						Comprar
						</a> 
					</div>
					<div class="item">
						<div class="clock delivered"><span>ESTADO</span></div> 
						<a href="" class="cover">
							<img src="https://s1.gaming-cdn.com/images/products/5820/157x218/street-fighter-v-champion-edition-upgrade-kit-bundle-cover.jpg">
							<img src="https://s1.gaming-cdn.com/themes/igv1/images/dlc.png" class="dlc" alt="DLC">
							<div class="shadow">
								<span class="discount">22% OFF</span>
								<span class="price">PRECIO</span>
							</div>
						</a>
						 <div class="date">
						10/12/98
						</div> 
						<a class="button" href="https://www.instant-gaming.com/es/5820-comprar-key-steam-street-fighter-v-champion-edition-upgrade-kit-bundle/" rel="nofollow">
						Comprar
						</a> 
					</div>
					<div class="item">
						<div class="clock delivered"><span>ESTADO</span></div> 
						<a href="" class="cover">
							<img src="https://s1.gaming-cdn.com/images/products/5820/157x218/street-fighter-v-champion-edition-upgrade-kit-bundle-cover.jpg">
							<img src="https://s1.gaming-cdn.com/themes/igv1/images/dlc.png" class="dlc" alt="DLC">
							<div class="shadow">
								<span class="discount">22% OFF</span>
								<span class="price">PRECIO</span>
							</div>
						</a>
						 <div class="date">
						10/12/98
						</div> 
						<a class="button" href="https://www.instant-gaming.com/es/5820-comprar-key-steam-street-fighter-v-champion-edition-upgrade-kit-bundle/" rel="nofollow">
						Comprar
						</a> 
					</div>
					<div class="item">
						<div class="clock delivered"><span>ESTADO</span></div> 
						<a href="" class="cover">
							<img src="https://s1.gaming-cdn.com/images/products/5820/157x218/street-fighter-v-champion-edition-upgrade-kit-bundle-cover.jpg">
							<img src="https://s1.gaming-cdn.com/themes/igv1/images/dlc.png" class="dlc" alt="DLC">
							<div class="shadow">
								<span class="discount">22% OFF</span>
								<span class="price">PRECIO</span>
							</div>
						</a>
						 <div class="date">
						10/12/98
						</div> 
						<a class="button" href="https://www.instant-gaming.com/es/5820-comprar-key-steam-street-fighter-v-champion-edition-upgrade-kit-bundle/" rel="nofollow">
						Comprar
						</a> 
					</div>

				</div>


			</div>

	

		</div>

	</div>
	<div class="col-md-3" style="padding: 0 20px 0 5px">
		
		<div class="box">
			
			<div class="box-header">
					
				<div id="clock"></div>


			</div>
				



			<div class="box-body">ULTIMOS COMENTARIOS</div>



		</div>

	</div>
</div>

</section>
