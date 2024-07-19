<?php
include "database/koneksi.php";
$db = new Database();
$connect = $db->getConnection();
$tbl_profile = $connect->query("select * from me");
$profile = $tbl_profile->fetchObject();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>CV - <?= $profile->nama_lengkap ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<!-- 
Easy Profile Template
http://www.templatemo.com/tm-467-easy-profile
-->
	<!-- stylesheet css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/templatemo-blue.css">
</head>

<body data-spy="scroll" data-target=".navbar-collapse">

	<!-- preloader section -->
	<div class="preloader">
		<div class="sk-spinner sk-spinner-wordpress">
			<span class="sk-inner-circle"></span>
		</div>
	</div>

	<!-- header section -->
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<img src="images/me.jpeg" width="100" height="100" class="img-responsive img-rounded tm-border" alt="templatemo easy profile">
					<hr>
					<h1 class="tm-title bold shadow">Hi, I am <?= $profile->nama_lengkap ?></h1>
					<p class="white bold shadow">Mahasiswa Institut Teknologi Sapta Mandiri Jurusan Teknologi Informasi. NIM. <?= $profile->nim ?></p>
				</div>
			</div>
		</div>
	</header>

	<!-- about and skills section -->
	<section class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="about">
					<h3 class="accent">Qoute's By 👋🏻</h3>
					<h2><?= $profile->nama_panggilan ?></h2>
					<p><?= $profile->moto ?></p>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="skills">
					<h2 class="white">Skills</h2>
					<?php
					$tbl_skills = $connect->query('select * from keahlian');
					$skills = $tbl_skills->fetchAll(PDO::FETCH_OBJ);
					if (count($skills) === 0) {
						echo "<p>Data Skills Tidak Ada</p>";
						return false;
					}
					foreach ($skills as $skill) :
					?>
						<strong><?= $skill->nama ?></strong>
						<span class="pull-right"><?= $skill->percent ?>%</span>
						<div class="progress">
							<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?= $skill->percent ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $skill->percent ?>%;"></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- education and languages -->
	<section class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<div class="education">
					<h2 class="white">Education</h2>
					<div class="education-content">
						<?php
						$tbl_sekolah = $connect->query('select * from sekolah');
						$schools = $tbl_sekolah->fetchAll(PDO::FETCH_OBJ);
						if (count($schools) === 0) {
							echo "<p>Data Sekolah Tidak Ada</p>";
							return false;
						}
						foreach ($schools as $school) :
						?>
							<div class="education-school">
								<h5><?= $school->nama ?></h5><span></span>
								<h5>Lulus Tahun <?= $school->tahun ?></h5>
							</div>
							<!-- <p class="education-description">In lacinia leo sed quam feugiat, ac efficitur dui tristique. Ut venenatis, odio quis cursus egestas, nulla sem volutpat diam, ac dapibus nisl ipsum ut ipsum. Nunc tincidunt libero non magna placerat elementum.</p> -->
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="languages">
					<h2>Languages</h2>
					<ul>
						<?php
						$tbl_bahasa = $connect->query('select * from bahasa');
						$langs = $tbl_bahasa->fetchAll(PDO::FETCH_OBJ);
						if (count($langs) === 0) {
							echo "<p>Data Bahasa Tidak Ada</p>";
							return false;
						}
						foreach ($langs as $lang) :
						?>
							<li><?= $lang->nama ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- contact and experience -->
	<section class="container">
		<div class="row">
			<div class="col-md-4 col-sm-12">
				<div class="contact">
					<h2>Contact</h2>
					<p><i class="fa fa-map-marker"></i> <?= $profile->alamat ?></p>
					<p><i class="fa fa-phone"></i> <?= $profile->wa ?></p>
					<p><i class="fa fa-envelope"></i> <?= $profile->email ?></p>
					<!-- <p><i class="fa fa-globe"></i> www.company.com</p> -->
				</div>
			</div>
			<div class="col-md-8 col-sm-12">
				<div class="experience">
					<h2 class="white">Rewords</h2>
					<div class="experience-content">
					<?php
						$tbl_penghargaan = $connect->query('select * from penghargaan');
						$rewords = $tbl_penghargaan->fetchAll(PDO::FETCH_OBJ);
						if (count($rewords) === 0) {
							echo "<p>Data Bahasa Tidak Ada</p>";
							return false;
						}
						foreach ($rewords as $reword) :
						?>
						<h4 class="experience-title accent"><i class="fa fa-bookmark mr-2"></i> <?= $reword->nama ?></h4>
						<?php endforeach; ?>
						<!-- <h5>New Media Company</h5><span></span>
						<h5>2035 January - 2036 April</h5>
						<p class="education-description">Cras porta tincidunt sem, in sollicitudin lorem efficitur ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- footer section -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<p>Copyright &copy; <?= date('Y') ?> <?= $profile->nama_lengkap ?></p>
					<ul class="social-icons">
						<li><a href="#" class="fa fa-facebook"></a></li>
						<li><a href="#" class="fa fa-instagram"></a></li>
						<li><a href="#" class="fa fa-whatsapp"></a></li>
						<li><a href="#" class="fa fa-send"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<!-- javascript js -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.backstretch.min.js"></script>
	<script src="js/custom.js"></script>

</body>

</html>