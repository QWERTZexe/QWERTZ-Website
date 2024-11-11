<?php
// Get the requested tutorial from the URL parameter
$tutorialName = isset($_GET['t']) ? $_GET['t'] : '';

// Sanitize the input to prevent directory traversal
$tutorialName = preg_replace('/[^a-zA-Z0-9_-]/', '', $tutorialName);

if (empty($tutorialName)) {
    // No tutorial specified, redirect to the main tutorials page
    header("Location: /tutorials/");
    exit;
}

$markdownFile = "{$tutorialName}.md";

if (!file_exists($markdownFile)) {
    // Tutorial not found, show 404 page
    header("HTTP/1.0 404 Not Found");
    include '../404.php';
    exit;
}

// Set the title and description based on the tutorial
$pageTitle = "QWERTZ - " . ucfirst($tutorialName) . " Tutorial";
$pageName = ucfirst($tutorialName) . " Tutorial";
$pageDescription = "Learn " . ucfirst($tutorialName) . " programming with our comprehensive tutorial!";

// Include the header
include '../head.php';
?>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/marked-highlight/lib/index.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/python.min.js"></script>
<link rel="stylesheet" href="../tutorial.css">

<body>
    <?php include '../header.php';?>
    <main>
        <?php include '../hero.php'; ?>
        <section class="tutorial-content content-section">
            <div id="content"></div>
            <div id="completion-message">🎉 Tutorial Completed! 🎉</div>
            <br>
        </section>
    </main>
    <?php include '../footer.php'; ?>
    
    <script>
        // Fetch and render the Markdown content
        fetch('<?php echo htmlspecialchars($markdownFile); ?>')
            .then(response => response.text())
            .then(markdown => {
                document.getElementById('content').innerHTML = marked.parse(markdown);
                hljs.highlightAll();
            }); 
        document.getElementById('completion-message').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            let slug = "<?php echo $tutorialName; ?>"
            let completed = getCookie('completed_tutorials');
            completed = completed ? completed.split(',') : [];
            if (!completed.includes(slug)) {
                completed.push(slug);
                setCookie('completed_tutorials', completed.join(','), 365);
            }
        });
    </script>
</body>
</html>