<section class="hero">
    <h1><?php echo $pageName; ?></h1>
    <p><?php echo $pageDescription; ?></p>
    <div class="cta-buttons">
        <?php 
        // Check the current page URL
        $currentUrl = $_SERVER['REQUEST_URI'];

        if ($currentUrl === '/') {
            // Home page buttons
            ?>
            <button onclick="location.href='<?php echo getLink('projects'); ?>'" class="btn btn-primary">Projects</button>
            <button onclick="location.href='<?php echo getLink('tutorials'); ?>'" class="btn btn-secondary">Tutorials</button>
            <?php
        } elseif (strpos($currentUrl, 'tutorial.php') !== false) {
            // Tutorial page buttons
            ?>
            <button onclick="location.href='<?php echo getLink('home'); ?>'" class="btn btn-primary">Home</button>
            <button onclick="location.href='<?php echo getLink('tutorials'); ?>'" class="btn btn-secondary">Tutorials</button>
            <?php
        } else {
            // Default button for other pages
            ?>
            <button onclick="location.href='<?php echo getLink('home'); ?>'" class="btn btn-primary">Home</button>
            <?php
        }
        ?>
    </div>
</section>