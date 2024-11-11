<!-- project_card.php -->
<div class="project-card card">
    <a href="<?php echo $project['download']; ?>">
        <img src="<?php echo $project['image']; ?>" alt="<?php echo htmlspecialchars($project['name']); ?>">
    </a>
    <div class="project-card-body">
        <h3 class="text-secondary"><?php echo htmlspecialchars($project['name']); ?></h3>
        <p><?php echo htmlspecialchars($project['description']); ?></p>
        <br>
        <button class="squarebtn btn" onclick="location.href='<?php echo $project['download']; ?>'">Download</button>
    </div>
</div>