<main class="flex-shrink-0">
    <?php
    include_once 'navbar.php';
    function RenderSection($file)
    {
        $db = new Query();
        return Section($file, $db);
    }
    ?>
</main>