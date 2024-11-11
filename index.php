<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "QWERTZ"; include 'head.php'; ?>
<body>
    <?php include 'header.php'; ?>
    <main>
        <?php $pageName = "QWERTZ"; $pageDescription = "Yet another coding guy"; include 'hero.php'; ?>

        
        <section id="projects" class="content-section">
            <div class="container">
                <h2>Featured Projects</h2>
                <div class="cards">
                    <?php
                    // Load projects from JSON file
                    $categories = json_decode(file_get_contents('projects.json'), true);
                    $featuredProjects = [];

                    // Collect all projects from all categories
                    foreach ($categories as $category => $projects) {
                        foreach ($projects as $project) {
                            if (isset($project['featured']) && $project['featured']) {
                                $featuredProjects[] = $project;
                            }
                        }
                    }

                    // Sort featured projects by a 'featuredOrder' property if it exists
                    usort($featuredProjects, function($a, $b) {
                        return ($a['featuredOrder'] ?? PHP_INT_MAX) - ($b['featuredOrder'] ?? PHP_INT_MAX);
                    });

                    // Display the first 3 featured projects
                    for ($i = 0; $i < 3 && $i < count($featuredProjects); $i++) {
                        $project = $featuredProjects[$i];
                        include 'project_card.php'; // Include the project card
                    }
                    ?>  
                </div>
            </div>
        </section>

    <section id="tutorials" class="content-section">
        <div class="container">
            <h2>Latest Tutorials</h2>
            <div class="cards">
                <?php
                // Load projects from JSON file
                $categories = json_decode(file_get_contents('tutorials.json'), true);
                $featuredTutorials = [];

                // Collect all projects from all categories
                foreach ($categories as $category => $tutorials) {
                    foreach ($tutorials as $tutorial) {
                        if (isset($tutorial['featured']) && $tutorial['featured']) {
                            $featuredTutorials[] = $tutorial;
                        }
                    }
                }

                // Sort featured projects by a 'featuredOrder' property if it exists
                usort($featuredTutorials, function($a, $b) {
                    return ($a['featuredOrder'] ?? PHP_INT_MAX) - ($b['featuredOrder'] ?? PHP_INT_MAX);
                });

                // Display the first 3 featured tutorials
                for ($i = 0; $i < 3 && $i < count($featuredTutorials); $i++) {
                    $tutorial = $featuredTutorials[$i];
                    include 'tutorial_card.php'; // Include the tutorial card
                }
                ?>  
            </div>
        </div>
    </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>