<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Contact - Bhaccasyoniztas Beach Resort Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	<div id="background">
		<div id="page">
			<?php include_once 'nav.php' ?>

			<div id="contents">
				<div class="box">
					<div>
						<div id="contact" class="body">
							<h1>Contact</h1>
							<form method="POST">
								<table>
									<tbody>
										<tr>
											<td>Name:</td>
											<td><input required type="text" name="name" value="" class="txtfield"></td>
										</tr>
										<tr>
											<td>Email:</td>
											<td><input required type="text" value="" name="email" class="txtfield"></td>
										</tr>
										<tr>
											<td>Subject:</td>
											<td><input required type="text" value="" name="subject" class="txtfield"></td>
										</tr>
										<tr>
											<td class="txtarea">Message:</td>
											<td><textarea name="message"></textarea></td>
										</tr>
										<tr>
											<td><input required type="submit" name="submit" value="" class="btn"></td>

										</tr>
									</tbody>
								</table>
							</form>
							<h2>Bhaccasyoniztas Beach Resort</h2>
							<p>
								<span>Address:</span> 123 Lorem Ipsum Cove, Sed Ut City, LI 12345
							</p>
							<p>
								<span>Telephone Number:</span> 1-800-999-9999
							</p>
							<p>
								<span>Fax Number:</span> 1-800-111-1111
							</p>
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
	include_once './builder/ContactBuilder.php';
	include_once './repo/ContactRepo.php';

	$contactRepo = new ContactRepo();

	if (isset($_POST['submit'])) {

		$p = $_POST;
		$contact = (new ContactBuilder())
			->addName($p['name'])
			->addEmail($p['email'])
			->addMessage($p['message'])
			->addSubject($p['subject'])
			->build();

		$contactRepo->save($contact);
	}

	?>

</body>

</html>