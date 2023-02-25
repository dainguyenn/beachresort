<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Foods - Bhaccasyoniztas Beach Resort Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	<div id="background">
		<div id="page">
			<?php include_once 'nav.php' ?>
			<div id="contents">
				<div class="box">
					<div>
						<div class="body">
							<?php
							include_once '/_Ky5/PHP/const.php';
							include_once PATH_DIR_RESORT . '/repo/FoodsRepo.php';

							$foodsRepo = new FoodsRepo();

							$foods = $foodsRepo->findAll(); ?>
							<h1>Food</h1>
							<ul id="foods">
								<?php
								foreach ($foods as $food) {
								?>
									<li>
										<h2><a href="foods.php"><?php print($food['category']) ?></a></h2>
										<div class="infos">
											<a href="foods.php"><img src="<?php print($food['img']) ?>" alt="Img" height="169" width="780"><span class="cover"></span></a>
											<p>
												<span><?php print($food['name']) ?></span> <?php print($food['description']) ?>
											</p>
										</div>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<div>
				<ul class="navigation">
					<li>
						<a href="index123.php">Home</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="rooms.php">Rooms</a>
					</li>
					<li>
						<a href="dives.php">Dive Site</a>
					</li>
					<li class="active">
						<a href="foods.php">Food</a>
					</li>
					<li>
						<a href="news.php">News</a>
					</li>
					<li>
						<a href="contact.php">Contact</a>
					</li>
				</ul>
				<div id="connect">
					<a href="http://pinterest.com/fwtemplates/" target="_blank" class="pinterest"></a> <a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a> <a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a> <a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a>
				</div>
			</div>
			<p>
				© 2023 by BHACCASYONIZTAS BEACH RESORT. All Rights Reserved
			</p>
		</div>
	</div>
</body>

</html>