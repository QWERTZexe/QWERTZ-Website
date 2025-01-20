<!DOCTYPE html>
<html lang="en">
<?php $pageTitle = "Donate"; include '../head.php'; ?>
<body>
    <?php include '../header.php'; ?>
    <main>
        <?php $pageName = "Donate"; $pageDescription = "Support my work with cryptocurrency"; include '../hero.php'; ?>

        <section id="donate" class="content-section">
            <div class="container">
                <h2>Donate Cryptocurrency</h2>
                <p>If you find my projects or tutorials helpful, consider supporting my work with a cryptocurrency donation. Your contribution helps me continue creating valuable content and developing open-source projects.</p>
                
                <div class="crypto-cards">
                    <?php
                    // Array of cryptocurrency donation options
                    $cryptoOptions = [
                        [
                            'name' => 'Ethereum',
                            'image' => 'https://raw.githubusercontent.com/trustwallet/assets/refs/heads/master/blockchains/ethereum/info/logo.png',
                            'address' => '0x62aA3B99443713B51e4187499c773e1875909297'
                        ],
                        [
                            'name' => 'Litecoin',
                            'image' => 'https://raw.githubusercontent.com/trustwallet/assets/refs/heads/master/blockchains/litecoin/info/logo.png',
                            'address' => 'ltc1qpz5q63r9pqxt7ecuwyq2kdwx79t49m7nvm9axp'
                        ],
                        [
                            'name' => 'Ethereum Classic',
                            'image' => 'https://raw.githubusercontent.com/trustwallet/assets/refs/heads/master/blockchains/classic/info/logo.png',
                            'address' => '0xF993bE5667437D33826b3C4C6553344f00b1E860'
                        ],
                        [
                            'name' => 'BNB Smart Chain',
                            'image' => 'https://raw.githubusercontent.com/trustwallet/assets/refs/heads/master/blockchains/bnbt/info/logo.png',
                            'address' => '0x62aA3B99443713B51e4187499c773e1875909297'
                        ],
                        [
                            'name' => 'Dogecoin',
                            'image' => 'https://raw.githubusercontent.com/trustwallet/assets/refs/heads/master/blockchains/doge/info/logo.png',
                            'address' => 'DJN76UgaQQEE85zvsQpZwDBXuu5fs8ejRZ'
                        ],
                        [
                            'name' => 'Bitcoin',
                            'image' => 'https://raw.githubusercontent.com/trustwallet/assets/refs/heads/master/blockchains/bitcoin/info/logo.png',
                            'address' => 'bc1qutca9tx2zmc0nns0uwv6gmpu8e3707hq3kw3c9'
                        ],
                        // Add more cryptocurrencies as needed
                    ];

                    // Display crypto cards
                    foreach ($cryptoOptions as $crypto) {
                        echo '<div class="crypto-card">';
                        echo '<img src="' . $crypto['image'] . '" alt="' . $crypto['name'] . ' Logo">';
                        echo '<h3>' . $crypto['name'] . '</h3>';
                        echo '<div class="wallet-address">';
                        echo '<input type="text" value="' . $crypto['address'] . '" readonly>';
                        echo '<button onclick="copyAddress(this)">Copy</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php include '../footer.php'; ?>

    <script>
        function copyAddress(button) {
            var input = button.previousElementSibling;
            input.select();
            document.execCommand("copy");
            button.textContent = "Copied!";
            setTimeout(function() {
                button.textContent = "Copy";
            }, 2000);
        }
    </script>
</body>
</html>
