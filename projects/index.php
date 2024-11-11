<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "QWERTZ - Projects"; include '../head.php'; ?>
<body>
    <?php include '../header.php'; ?>
    <main>
        <?php $pageName = "Projects"; $pageDescription = "Explore all our amazing projects below!"; include '../hero.php'; ?>

        <section id="projects" class="content-section">
            <?php
            // Load projects from JSON file
            $categories = json_decode(file_get_contents('../projects.json'), true);
            foreach ($categories as $category => $projects) {
                echo "<h2 class='category-header'>$category</h2>";
                echo "<div class='projects-container'>";
                foreach ($projects as $project) {
                    include '../project_card.php';
                }
                echo "</div>";
            }
            ?>
        </section>

    </main>
    <?php include '../footer.php'; ?>
</body>
</html>