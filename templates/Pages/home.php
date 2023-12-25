<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        ConnectionManager::get($name)->getDriver()->connect();
        // No exception means success
        $connected = true;
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/5/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

/*
if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;
*/
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>Paint Shop Home Page</title>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'home']) ?>
</head>
<body>
    <header>
        <div class="top-bar">
            <div class="logo">
                <img src="<?= $this->Url->image('1815730.png') ?>" alt="PaintShop">
            </div>
            <div class="search-bar">
                <form method="get">
                    <input type="text" name="search_key" placeholder="Search for paints..." value="<?php echo htmlspecialchars($_GET['search_key'] ?? '') ?>">
                    <input type="submit" value="Search">
                </form>
            </div>
            <div class="shopping-cart">
                <a href="/cart">Cart</a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <h1>Welcome to Our Paint Shop</h1>
            <h2>Our paints come in these colors</h2>
            <div class="paints">
                <?php
                // Example static data for paints
                $paints = [
                    ['name' => '#000000 Black', 'image' => 'black.png'],
                    ['name' => '#FFFFFF White', 'image' => 'white.png'],
                    ['name' => '#B22222 Fire brick red', 'image' => 'red.png'],
                    ['name' => '#FF4D40 Persimmon orange', 'image' => 'orange.png'],
                    ['name' => '#F3FF4C Lemon yellow', 'image' => 'yellow.png'],
                    ['name' => '#226D26 Green pepper green', 'image' => 'green.png'],
                    ['name' => '#0093C1 Sky blue', 'image' => 'blue.png'],
                    ['name' => '#2C1B48 Amethyst purple', 'image' => 'purple.png'],
                    // Add more paints here...
                ];

                foreach ($paints as $paint) {
                    if (empty($searchKey) || stripos($paint['name'], $searchKey) !== false) {
                        $imagePath = $this->Url->image($paint['image']);
                        echo "<div class='paint'>";
                        echo $this->Html->image($paint['image'], ['alt' => $paint['name']]);
                        echo "<h3>" . h($paint['name']) . "</h3>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </main>
</body>
</html>