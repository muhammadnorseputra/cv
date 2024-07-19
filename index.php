<?php
include_once "query.php";
include_once "helper.php";

$db = new Query();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CV - <?= $db::Profile('nama_lengkap') ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark page-navbar gradient">
    <div class="container">
      <a class="navbar-brand logo" href="#">CV <?= $db::Profile('nama_lengkap') ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item item">
          <li class="nav-item item">
            <a class="nav-link" href="#work-experience">Pengalaman Kerja</a>
          </li>
          <li class="nav-item item">
            <a class="nav-link" href="#education">Riwayat Pendidikan</a>
          </li>
          <li class="nav-item item">
            <a class="nav-link" href="#skills">Keahliah</a>
          </li>
          <li class="nav-item item">
            <a class="nav-link" href="#moto">Moto</a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="page cv-page">
    <section class="cv-block block-intro border-bottom">
      <div class="container">
        <div class="avatar">
          <img class="img-fluid rounded-circle" src="assets/me.jpg">
        </div>
        <p>Helo semua ! Perkenalkan saya <strong><?= $db::Profile('nama_lengkap') ?></strong>. Kalian bisa memanggil saya <strong><?= $db::Profile('nama_panggilan') ?></strong>, saya seorang mahasiswi <strong>Institut Teknologi Sapta Mandiri</strong> dengan <strong>NIM. 230342027</strong>. Jurusan Teknologi Informasi, berikut ini adalah CV Sederhana saya.</p>
        <a href="#work-experience" class="btn btn-outline-primary">Hire Me</a>
      </div>
    </section>
    <section class="cv-block info">
      <div class="container">
        <div class="work-experience group" id="work-experience">
          <h2 class="text-center">Pengalaman Kerja</h2>
          <?php
          $pengalaman = $db::getTable('pengalaman');
          if (count($pengalaman) > 0) :
            foreach ($pengalaman as $p) :
          ?>
              <div class="item">
                <div class="row">
                  <div class="col-md-6">
                    <h3><?= $p->nama ?></h3>
                  </div>
                  <div class="col-md-6">
                    <time class="period"><?= $p->tahun ?></time>
                  </div>
                </div>
              </div>
            <?php
            endforeach;
          else :
            ?>
            <p class="text-center text-muted">Pengalaman Kerja Tidak Ada</p>
          <?php
          endif;
          ?>
        </div>
        <div class="education group" id="education">
          <h2 class="text-center">Riwayat Pendidikan</h2>
          <?php
          $pendidikan = $db::getTable('sekolah');
          if (count($pendidikan) > 0) :
            foreach ($pendidikan as $p) :
          ?>
              <div class="item">
                <div class="row">
                  <div class="col-md-6">
                    <h3><?= $p->nama ?></h3>
                  </div>
                  <div class="col-md-6">
                    <time class="period">Lulus : <?= $p->tahun ?></time>
                  </div>
                </div>
              </div>
            <?php
            endforeach;
          else :
            ?>
            <p class="text-center text-muted">Riwayat Pendidikan Tidak Ada</p>
          <?php
          endif;
          ?>
        </div>
        <div class="group" id="skills">
          <div class="row">
            <div class="col-md-6">
              <div class="skills info-card">
                <h2>Keahlian</h2>
                <?php
                $keahlian = $db::getTable('keahlian');
                if (count($keahlian) > 0) :
                  foreach ($keahlian as $k) :
                ?>
                    <h3><?= $k->nama ?></h3>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:75%">
                      </div>
                    </div>
                  <?php
                  endforeach;
                else :
                  ?>
                  <p class="text-center text-muted">Keahlian Tidak Ada</p>
                <?php
                endif;
                ?>
                <br>
                <h2>Hobby</h2>
                <?php
                $hobby = $db::getTable('hobby');
                if (count($hobby) > 0) :
                  foreach ($hobby as $h) :
                ?>
                <h3><?= $h->nama ?></h3>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                  </div>
                </div>
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
            <div class="col-md-6">
              <div class="contact-info info-card">
                <h2>Contact Info</h2>
                <div class="row">
                  <div class="col-1">
                    <i class="ion-android-calendar icon"></i>
                  </div>
                  <div class="col-9">
                    <span><?= $db::Profile('tempat_lahir') . ", " . convertDate($db::Profile('tgl_lahir')) ?></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-1">
                    <i class="ion-person icon"></i>
                  </div>
                  <div class="col-9">
                    <span><?= $db::Profile('nama_lengkap') ?></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-1">
                    <i class="ion-ios-telephone icon"></i>
                  </div>
                  <div class="col-9">
                    <span><?= $db::Profile('wa') ?></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-1">
                    <i class="ion-at icon"></i>
                  </div>
                  <div class="col-9">
                    <span><?= $db::Profile('email') ?? "-"; ?></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-1">
                    <i class="ion-location icon"></i>
                  </div>
                  <div class="col-9">
                    <span><?= $db::Profile('alamat') ?? "-"; ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="moto group" id="moto">
          <h2 class="text-center">Moto</h2>
          <p class="text-center text-muted"><?= $db::Profile('moto') ?></p>
        </div>
      </div>
    </section>
    <footer class="page-footer">
      <div class="container">
        <div class="social-icons">
          <a href="#"><i class="ion-social-facebook" title="Facebook"></i></a>
          <a href="//instagram.com/<?= $db::Profile('ig') ?>"><i class="ion-social-instagram-outline" title="Instagram"></i></a>
          <a href="//wa.me/<?= $db::Profile('wa') ?>?text=Halo <?= $db::Profile('nama_panggilan') ?>"><i class="ion-social-whatsapp" title="WA"></i></a>
        </div>
      </div>
    </footer>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>

</html>