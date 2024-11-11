<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = $errorShort; include 'head.php'; ?>
<body>
    <?php include 'header.php'; ?>
    <main>
        <?php $pageName = $errorCode; $pageDescription = $errorLong; include 'hero.php'; ?>
        <section class="content-section" style="padding: 20px;">
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>