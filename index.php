<?php

$section = isset($_GET['page']) ? $_GET['page'] : 'home';
$section_path = 'sections/' . $section . '.php';

include 'layout/main.php';
if (file_exists($section_path)) {
    RenderSection("$section.php");
} else {
    RenderSection("404.php");
}
include 'layout/footer.php';