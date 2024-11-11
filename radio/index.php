<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Radio QWERTZ"; include '../head.php'; ?>
<link rel="stylesheet" href="../radio.css">
<body>
    <?php include '../header.php'; ?>
    <main>
        <?php $pageName = "Radio QWERTZ"; $pageDescription = 'Listen to our awesome radio below!'; include '../hero.php'; ?>
        <section class="content-section">
            <div id="toggle-container" style="position: absolute; top: 10px; right: 10px;">
                <button id="toggle-notes" style="padding: 5px 10px; font-size: 20px;">Hide Notes</button>
            </div>

            <div id="now-playing">
                <img id="artist-image" class="artist-image" src="https://qwertz-exe.com/images/default.png" alt="Artist Image"><br>
                <span id="track-info">Loading...</span>
            </div>
            
            <div class="player-container">
                <div id="custom-player">
                    <button id="playStopBtn" class="radio-btn">Play</button>
                    <div id="volume-label">
                        <span id="volume-icon">🔇</span>
                        <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="1">
                        <span id="volume-icon">🔊</span>
                    </div>
                </div>
            </div>
            <center>
            <div class="bottom-container">
                <text2 id="other-listeners">You are listening with X other listeners right now!</text2><br>
            </div>
            </center>
        </section>
    </main>
    <?php include '../footer.php'; ?>
    <script src="../radio.js"></script>
</body>
</html>