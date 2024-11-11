<!-- tutorial_card.php -->
<?php
$completed = isset($_COOKIE['completed_tutorials']) ? explode(',', $_COOKIE['completed_tutorials']) : [];
$isCompleted = in_array($tutorial['slug'], $completed);
$cardClass = $isCompleted ? 'completed' : 'not-completed';
?>
<div class="tutorial-card card <?php echo $cardClass; ?>">
    <a href="/tutorials/tutorial.php?t=<?php echo urlencode($tutorial['slug']); ?>">
        <img src="<?php echo $tutorial['image']; ?>" alt="<?php echo htmlspecialchars($tutorial['name']); ?>">
    </a>
    <div class="tutorial-card-body">
        <h3 class="text-secondary"><?php echo htmlspecialchars($tutorial['name']); ?></h3>
        <p><?php echo htmlspecialchars($tutorial['description']); ?></p>
        <br>
        <button class="squarebtn btn" onclick="location.href='/tutorials/tutorial.php?t=<?php echo urlencode($tutorial['slug']); ?>'">
            <?php echo $isCompleted ? 'Review Tutorial' : 'Start Tutorial'; ?>
        </button>
    </div>
</div>