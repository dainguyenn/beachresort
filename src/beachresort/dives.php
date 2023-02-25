<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Dive Sites - Bhaccasyoniztas Beach Resort Website Template</title>
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
							<h1>Dive Site</h1>
							<ul id="sites">
								<?php
								include_once '/_Ky5/PHP/const.php';
								include_once PATH_DIR_RESORT . '/repo/DiveRepo.php';

								$diveRepo = new DiveRepo();

								$dives = $diveRepo->findAll();

								foreach ($dives as $dive) {
								?>
									<li>
										<a href="dives.php"><img src="<?php print($dive['img']) ?>" alt="Img"></a>
										<h2><a href="dives.php"><?php print($dive['name']) ?></a></h2>
										<p>
											<?php print($dive['description']) ?>
										</p>

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
					<li class="active">
						<a href="dives.php">Dive Site</a>
					</li>
					<li>
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