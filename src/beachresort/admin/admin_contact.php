<?php
include_once '/_Ky5/PHP/const.php';
include_once PATH_DIR . '/beachresort/entity/User.php';

// if (!isset($_SESSION)) {
// 	session_start();
// }

// $userRepo = new AccountRepo('account');
// $user = $userRepo->login('a', 'a');

// $authen = new Authenticate();

// $isRole = $authen->hasRole('ROLE_ADMIN', array('ROLE_MANAGER'));
// if (!$isRole) {
// 	throw new Exception('Unauthorized');
// }
?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Contact - Bhaccasyoniztas Beach Resort Website Template</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
	<?php
	include_once '../repo/ContactRepo.php';
	$contactRepo = new ContactRepo();
	$contacts = $contactRepo->findAll();
	?>

	<div id="background">
		<div id="page">

			<?php
			include_once '../nav.php';
			?>
			<div id="contents">
				<div class="box">
					<div class="w-[860px]">
						<div id="contact" class="body">
							<h1>Contact</h1>
							<table border="1" cellspacing="1">
								<thead>
									<tr>
										<th>id</th>
										<th>name</th>
										<th>email</th>
										<th>subject</th>
										<th>message</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($contacts as $c) {
									?>
										<tr>
											<td><?php echo $c['id'] ?></td>
											<td><?php echo $c['name'] ?></td>
											<td><?php echo $c['email'] ?></td>
											<td><?php echo $c['subject'] ?></td>
											<td><?php echo $c['message'] ?></td>
											<td>
												<a href="<?php echo '?del=' . $c['id'] ?>">Delete</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>


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
						<li>
							<a href="foods.php">Food</a>
						</li>
						<li>
							<a href="news.php">News</a>
						</li>
						<li class="active">
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

		<?php

		if (isset($_GET['del'])) {
			$contactRepo->deleteById($_GET['del']);
			header("Location:" . $_SERVER['PHP_SELF']);
		}

		?>


</body>

</html>