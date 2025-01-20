<header>
    <nav>
        <div class="logo"><a href="<?php echo getLink('home'); ?>">QWERTZ</a></div>
        <div class="nav-links">
            <a href="<?php echo getLink('projects'); ?>">Projects</a>
            <a href="<?php echo getLink('tutorials'); ?>">Tutorials</a>
            <a href="<?php echo getLink('radio'); ?>">Radio</a>
            <a href="<?php echo getLink('donate'); ?>">Donate</a>
        </div>
        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i> <!-- Font Awesome Hamburger Icon -->
        </div>
    </nav>
    <script>
        document.getElementById('hamburger').addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active'); // Toggle active class to show/hide links
        });
    </script>
</header>