<?php
include_once "database/query.php";
include_once "helpers/fungsi.php";

$db = new Query();
$profile = $db::Profile();
?>
<!DOCTYPE html>
<html>

<head>
	<title>CV @<?= $profile->nama_lengkap ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Halo semua, perkenalkan saya <?= $profile->nama_panggilan ?>, saya seorang mahasiswi <strong>Institut Teknologi Sapta Mandiri</strong> dengan <strong>NIM. 230342027</strong>. Jurusan Teknologi Informasi, berikut ini adalah CV Sederhana saya.">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/kube.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/custom.min.css" />
	<link rel="shortcut icon" href="img/favicon.png" />
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display+SC:700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<style>
		.intro h1:before {
			/* Edit this with your name or anything else */
			content: '<?= $profile->nama_panggilan ?>';
		}
	</style>
</head>

<body>
	<!-- Navigation -->
	<div class="main-nav">
		<div class="container">
			<header class="group top-nav">
				<div class="navigation-toggle" data-tools="navigation-toggle" data-target="#navbar-1">
					<span class="logo"><?= $profile->nama_panggilan ?></span>
				</div>
				<nav id="navbar-1" class="navbar item-nav">
					<ul>
						<li class="active"><a href="#about">About</a></li>
						<li><a href="#experiences">Experiences</a></li>
						<li><a href="#Studys">Studys</a></li>
						<li><a href="#Hobbys">Hobbys</a></li>
					</ul>
				</nav>
			</header>
		</div>
	</div>

	<!-- Introduction -->
	<div class="intro section" id="about">
		<div class="container">
			<p>Hi, I’m <?= $profile->nama_lengkap ?></p>
			<div class="units-row units-split wrap">
				<div class="unit-20">
					<img src="img/me.jpeg" alt="Avatar">
				</div>
				<div class="unit-80">
					<h1>I live in<br><span id="typed"></span></h1>
				</div>
				<p>
					Halo semua, perkenalkan saya <strong><?= $profile->nama_panggilan ?></strong>, mahasiswi <strong>Institut Teknologi Sapta Mandiri</strong> dengan <strong>NIM (<?= $profile->nim ?>)</strong>. Jurusan Teknologi Informasi, berikut ini adalah CV Sederhana saya.
				</p>
			</div>
		</div>
	</div>

	<!-- Work Experience -->
	<div class="work section second" id="experiences">
		<div class="container">
			<h1>Work<br>Experiences</h1>
			<?php
			$pengalaman = $db::getTable('pengalaman');
			if (count($pengalaman) > 0) :
				foreach ($pengalaman as $k) :
			?>
					<ul class="work-list">
						<li><?= $k->tahun_awal ?> - <?= $k->tahun_akhir ?></li>
						<li><a href="#"><?= $k->nama ?></a></li>
					</ul>
				<?php
				endforeach;
			else :
				?>
				<p class="text-center text-muted">Keahlian Tidak Ada</p>
			<?php
			endif;
			?>
		</div>
	</div>

	<!-- Award & Studys -->
	<div class="award section second" id="Studys">
		<div class="container">
			<h1>Riwayat<br>Pendidikan</h1>
			<?php
			$sekolah = $db::getTable('sekolah');
			if (count($sekolah) > 0) :
				foreach ($sekolah as $s) :
			?>
			<ul class="award-list list-flat">
				<li>Lulus Tahun <?= $s->tahun ?></li>
				<li><?= $s->nama ?></li>
			</ul>
			<?php
				endforeach;
			else :
				?>
				<p class="text-center text-muted">Riwayat Pendidikan Tidak Ada</p>
			<?php
			endif;
			?>
		</div>
	</div>

	<!-- Technical Hobbys -->
	<div class="Hobbys section second" id="Hobbys">
		<div class="container">
			<h1>Technical<br>Hobbys</h1>
			<?php
			$hobby = $db::getTable('hobby');
			if (count($hobby) > 0) :
				foreach ($hobby as $s) :
			?>
			<ul class="skill-list list-flat">
				<li>&rightarrow; <?= $s->nama ?></li>
				<!-- <li>HTML / CSS / SASS / PHP / Javascript</li> -->
			</ul>
			<?php
				endforeach;
			else :
				?>
				<p class="text-center text-muted">Hobby Tidak Ada</p>
			<?php
			endif;
			?>
		</div>
	</div>

	<!-- Quote -->
	<div class="quote">
		<div class="container text-centered">
			<h1><?= $profile->moto ?></h1>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="units-row">
				<div class="unit-50">
					<p>&copy; <?= date('Y') ?> - <?= $profile->nama_lengkap ?></p>
				</div>
				<div class="unit-50">
					<ul class="social list-flat right">
						<li><a href="mailto:<?= $profile->email ?>"><i class="fa fa-send"></i></a></li>
						<li><a href="//instagram.com/<?= $profile->ig ?>"><i class="fa fa-instagram"></i></a></li>
						<li><a href="//wa.me/<?= $profile->wa ?>"><i class="fa fa-phone"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<!-- Javascript -->
	<script src="js/jquery.min.js"></script>
	<script src="js/typed.min.js"></script>
	<script src="js/kube.min.js"></script>
	<script src="js/site.js"></script>
	<?php
	$pairs = json_encode(splitIntoPairs($profile->alamat));
	?>
	<script>
		function newTyped() {}
		$(function() {
			$("#typed").typed({
				// Change to edit type effect
				strings: <?= $pairs ?>,

				typeSpeed: 90,
				backDelay: 700,
				contentType: "html",
				loop: !0,
				resetCallback: function() {
					newTyped()
				}
			}), $(".reset").click(function() {
				$("#typed").typed("reset")
			})
		});
	</script>
</body>

</html>