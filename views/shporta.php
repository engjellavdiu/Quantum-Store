<?php
include_once '../businessLogic/CartMapper.php';
include_once '../businessLogic/UserMapper.php';
include_once '../businessLogic/ProductMapper.php';
include '../components/header.php';

if (
    !empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in'])
    && $_SESSION['is_logged_in'] == 1 && ($_SESSION['role'] == 0 || $_SESSION['role'] == 1)
) {

    $cmapper = new CartMapper();
    $umapper = new UserMapper();
    $cartlist = $cmapper->getCart();
    $loggeduser = $umapper->getUserByEmail($_SESSION['email']);

    $cartProducts = $cmapper->getCartProducts($loggeduser['id']);

    $pmapper = new ProductMapper();

    global $produktetNeShporte;
    $produktetNeShporte = array();

    for ($i = 0; $i < count($cartProducts); $i = $i + 1) {
        $prod = $pmapper->getProductsById($cartProducts[$i]['product_id']);
        $produktetNeShporte[$i] = [$prod];
    }

    $totali = 0;
?>
    <main id="main">
        <div class="cart">
            <div class="db-container">
                <table class="db-table">
                    <thead>
                        <tr>
                            <th>Produkti</th>
                            <th>Cmimi</th>
                            <th>Opsionet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produktetNeShporte as $produkt) { ?>
                            <?php for ($i = 0; $i < count($produkt); $i = $i + 1) {
                                $totali = $totali + $produkt[$i]['cmimi'] ?>
                                <tr>
                                    <td>
                                        <?php echo $produkt[$i]['emri']; ?>
                                    </td>
                                    <td>
                                        <?php echo $produkt[$i]['cmimi']; ?> &euro;
                                    </td>
                                    <td>
                                        <a href="<?php echo "../businessLogic/modifications.php?action=remove-from-cart&product-id=" . $produkt[$i]['id']; ?>">Largo nga shporta</a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="db-container">
                <table class="db-table">
                    <thead>
                        <tr>
                            <th>Totali</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $totali; ?>&euro;
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="button" href="">Checkout</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php } else { ?>

    <main id="main">
        <div class="cart-container">
            <div class="cart-message">
                <p>Ju nuk jeni të kyqur. Për të shtuar produkte në shportë kyquni ose krijoni llogari</p>
                <a class="button" href="llogaria.php">Kyqu</a>
            </div>
        </div>
    </main>

<?php } ?>

<?php include '../components/footer.php'; ?>