<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "QWERTZ - Tutorials"; include '../head.php'; ?>
<body>
    <?php include '../header.php'; ?>
    <main>
        <?php $pageName = "Tutorials"; $pageDescription = "Check out one of the coding tutorials we provide"; include '../hero.php'; ?>

        <section id="tutorials" class="content-section">
            <div class="tutorial-info">
                <h2>Your Learning Journey</h2>
                <p>Complete tutorials to track your progress. Click the "Complete" button at the end of each tutorial to mark it as finished.</p>
                <div class="progress-bar-container">
                    <div id="global-progress-bar" class="progress-bar"></div>
                    <span id="progress-percentage">0%</span>
                </div>
            </div>

                <?php
                // Load tutorials from JSON file
                $categories = json_decode(file_get_contents('../tutorials.json'), true);
                foreach ($categories as $category => $tutorials) {
                    echo "<h2 class='category-header'>$category</h2>";
                    echo "<div class='tutorials-container'>";
                    foreach ($tutorials as $tutorial) {
                        include '../tutorial_card.php';
                    }
                    echo "</div>";
                }
                ?>
        </section>

    </main>
    <?php include '../footer.php'; ?>

    <script>
    function updateGlobalProgress() {
        const completedTutorials = document.querySelectorAll('.tutorial-card.completed').length;
        const totalTutorials = document.querySelectorAll('.tutorial-card').length;
        const progressPercentage = (completedTutorials / totalTutorials) * 100;
        
        document.getElementById('global-progress-bar').style.width = progressPercentage + '%';
        document.getElementById('progress-percentage').textContent = Math.round(progressPercentage) + '%';
    }

    // Call this function when the page loads and after marking a tutorial as complete
    document.addEventListener('DOMContentLoaded', updateGlobalProgress);
    </script>
</body>
</html>