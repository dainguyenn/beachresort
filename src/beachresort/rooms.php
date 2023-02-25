<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Rooms - Bhaccasyoniztas Beach Resort Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="/dist/output.css" type="text/css">
</head>

<body>
	<?php
	include_once './repo/RoomRepo.php';
	$roomRepo = new RoomRepo();

	$rooms = $roomRepo->findAll();


	?>
	<div id="background">
		<div id="page">
			<?php include_once 'nav.php' ?>
			<div id="contents">
				<div class="box  w-[860px]">
					<div>
						<div class="body">
							<h1>Rooms</h1>
							<ul id="rooms">
								<?php foreach ($rooms as $room) {
								?>
									<li>
										<a href="rooms.php"><img class="w-[399px]" src="<?php echo $room['img'] ?>" alt="Img"></a>
										<h2><a href="rooms.php"><?php echo $room['name'] ?></a></h2>
										<p>
											<?php echo $room['description'] ?>
										</p>
										<span class="rate">Rate: <?php echo $room['rate'] ?> / Day</span>
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
					<li class="active">
						<a href="rooms.php">Rooms</a>
					</li>
					<li>
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
			<img src="/src/fileUpload/imgs/Screenshot (92).png" alt="" srcset="">
		</div>
	</div>
</body>

</html>