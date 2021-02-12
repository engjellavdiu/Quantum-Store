<?php 
    include '../components/header.php';
    include_once '../businessLogic/UserMapper.php';
    include_once '../businessLogic/ProductMapper.php';
    include_once '../businessLogic/MessageMapper.php';
    include_once '../businessLogic/Admin.php';

    if(!isset($_SESSION['is_logged_in']) || $_SESSION['role'] == 0){
        header("Location: index.php");
    }
    else if (isset($_SESSION['is_logged_in']) && $_SESSION['role'] == 1){
        $mapper =  new UserMapper();
        $userList = $mapper->getAllUsers();
        $user = $mapper->getUserByEmail($_SESSION['email']);
        $pmapper = new ProductMapper();
        $productList = $pmapper->getAllProducts();
        $msgmapper = new MessageMapper();
        $msgList = $msgmapper->getAllMessages(); 
        $msgUnread = $msgmapper->getUnreadMessages();
        $sliderImg = $pmapper->getSliderImages();
        $categories = $pmapper->getAllCategories();
    ?>

    <main id='main'>

    <?php if(isset($_GET['action']) == false){?>
        <div class="dashboard-container">
            <div class="dashboard-panel wrapper">
                <div class="greet">
                    <h3>Mirësevini në panelin e administratorit, <?= $user['first_name']?></h3>
                </div>
                <div class="square">
                    <img src="../images/icons/plus-sign.svg" alt="">
                    <a href="dashboard.php?action=add-product">Shto produkt</a>
                </div>
                <div class="square">
                    <img src="../images/icons/box.svg" alt="">
                    <a href="dashboard.php?action=view-products">Shiko të gjitha produktet</a>
                </div>
                <div class="square">
                <img src="../images/icons/users.svg" alt="">
                    <a href="dashboard.php?action=view-users">Shiko të gjithe perdoruesit</a>
                </div>
                <div class="square">
                    <img src="../images/icons/envelope.svg" alt="">
                    <a href="dashboard.php?action=unread-messages">Mesazhet e pa lexuara</a>
                </div>  
                <div class="square">
                    <img src="../images/icons/envelope-open.svg" alt="">
                    <a href="dashboard.php?action=all-messages">Shiko te gjitha mesazhet</a>
                </div>
                <div class="square">
                    <img src="../images/icons/list.svg" alt="">
                    <a href="dashboard.php?action=add-category">Shto kategori</a>
                </div>
                <div class="square">
                    <img src="../images/icons/photo.svg" alt="">
                    <a href="dashboard.php?action=add-slider-images">Slider</a>
                </div>
            </div>
        </div>

    <?php } else if (isset($_GET['action']) && $_GET['action'] == 'view-products'){ ?>
        <div class="db-container">
            <table class="db-table">
                <thead>
                    <tr>
                        <th colspan="5">Produktet</th>
                    </tr>
                    <tr>    
                        <th>Emri</th>
                        <th>Cmimi</th>
                        <th>Sasia</th>
                        <th colspan="2">Modifiko</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productList as $product){ ?>
                        <tr>
                            <td>
                                <?php echo $product['emri']; ?>
                            </td>
                            <td>
                                <?php echo $product['cmimi']; ?>
                            </td>
                            <td>
                                <?php echo $product['sasia']; ?>
                            </td>
                            <td>
                                <a href="<?php echo "../businessLogic/modify-products.php?action=delete_product&prod_id=".$product['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini produktin?');">Fshij
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo "../businessLogic/modify-products.php?action=edit_product&prod_id=".$product['id']; ?>">Edito
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php } else if (isset($_GET['action']) && $_GET['action'] == 'add-product'){ ?>
        <div class="edit-product-main">
            <form method="POST" action="../businessLogic/upload-product.php" enctype="multipart/form-data" class="edit-product-card">
                <h2>Shto produkt</h2>
                <hr class="divider">
                <label for="name">Emri i produktit</label>
                <input type="text" name="name" value="" required>
                <label for="name">Prodhuesi</label>
                <input type="text" name="prodhuesi" value="">
                <label for="price">Cmimi</label>
                <input type="number" step="any" name="price" value="" required>
                <label for="desc">Përshkrimi</label>
                <textarea name="desc" value="" required></textarea>
                <label for="qty">Sasia në stok</label>
                <input type="number" name="qty" value="<?= $product['sasia'] ?>" required>
                <label for="cat">Zgjedh një kategori</label>
                <select name="cat" required>
                    <option value=""></option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?= $category['emri']?>"><?= $category['emri']?></option>
                    <?php endforeach; ?>
                </select>
                <label for="image">Ngarko foto të produktit</label>
                <input type="file" name="image" required>
                <input class="button" type="submit" name="add-product-btn" value="Shto produktin">
                <a href="dashboard.php">Anulo</a>
            </form>
        </div>   
    <?php } else if(isset($_GET['action']) && $_GET['action'] == 'view-users') { ?>
        <div class="db-container">
            <table class="db-table">
                <thead>
                    <tr>
                        <th colspan="6">Përdoruesit</th>
                    </tr>
                    <tr class="users-email-col">
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Email</th>
                        <th colspan="3">Modifiko</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($userList as $user){ ?>
                    <tr class="users-email-col">
                        <td>
                            <?php echo $user['first_name']; ?>
                        </td>
                        <td>
                            <?php echo $user['last_name']; ?>
                        </td>
                        <td>
                            <?php echo $user['email']; ?>
                        </td>
                        <td><a href="<?php echo "../businessLogic/modify-users.php?action=delete&user_id=".$user['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini përdoruesin?');">Fshij</a></td>
                        <?php if($user['is_admin'] == 1) {?>
                            <td><a href="<?php echo "../businessLogic/modify-users.php?action=removeadmin&user_id=".$user['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini përdoruesin si administrator?');">Remove admin</a></td>
                        <?php } else { ?>
                            <td><a href="<?php echo "../businessLogic/modify-users.php?action=makeadmin&user_id=".$user['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të promovoni përdoruesin në administrator?');">Make admin</a></td>
                        <?php } ?>
                        <td><a href="<?php echo "../businessLogic/modify-users.php?action=edit&user_id=".$user['id']; ?>">Modifiko</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>    
        </div>
    <?php } else if(isset($_GET['action']) && $_GET['action'] == 'unread-messages') { ?>
        <div class="db-container">
            <table class="db-table">
                <thead>
                    <tr>
                        <th colspan="5">Mesazhe të pa lexuara</th>
                    </tr>
                    <tr>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Email</th>
                        <th colspan="2">Opsionet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($msgUnread as $msg){ ?>
                        <tr>
                            <td>
                                <?php echo $msg['emri']; ?>
                            </td>
                            <td>
                                <?php echo $msg['mbiemri']; ?>
                            </td>
                            <td>
                                <?php echo $msg['email']; ?>
                            </td>
                            <td><a href="<?php echo "../businessLogic/send-message.php?action=delete&msg_id=".$msg['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini mesazhin?');">Fshij</a></td>
                            <td><a href="<?="view-message.php?action=view&msg_id=".$msg['id']?>">Lexo</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 
        </div>
    <?php } else if(isset($_GET['action']) && $_GET['action'] == 'all-messages') { ?>
        <div class="db-container">
            <table class="db-table">
                <thead>
                    <tr>
                        <th colspan="5">Të gjitha mesazhet</th>
                    </tr>
                    <tr>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Email</th>
                        <th colspan="2">Opsionet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($msgList as $msg){ ?>
                        <tr>
                            <td>
                                <?php echo $msg['emri']; ?>
                            </td>
                            <td>
                                <?php echo $msg['mbiemri']; ?>
                            </td>
                            <td>
                                <?php echo $msg['email']; ?>
                            </td>
                            <td><a href="<?php echo "../businessLogic/send-message.php?action=delete&msg_id=".$msg['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini mesazhin?');">Fshij</a></td>
                            <td><a href="<?="view-message.php?action=view&msg_id=".$msg['id']?>">Lexo</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 
        </div>
    <?php } else if(isset($_GET['action']) && $_GET['action'] == 'add-category') { ?>
        <div class="edit-product-main">
            <form method="POST" action="../businessLogic/upload-product.php" enctype="multipart/form-data" class="edit-product-card">
                <h2>Shto kategori</h2>
                <hr class="divider">
                <label for="name">Emri i kategorisë</label>
                <input type="text" name="kategoria" value="" required>
                <input class="button" type="submit" name="add-category-btn" value="Shto kategorinë">
                <a href="dashboard.php">Anulo</a>
            </form>
        </div>     
        <div class="db-container">
            <table class="db-table">
                <thead>
                    <tr>
                        <th colspan="2">Kategoritë</th>
                    </tr>
                    <tr>    
                        <th>Foto</th>
                        <th>Opsionet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category){ ?>
                        <tr>
                            <td>
                                <?php echo $category['emri']; ?>
                            </td>
                            <td><a href="<?php echo "../businessLogic/modify-products.php?action=delete_product&prod_id=".$product['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini produktin?');">Fshij</a></td>
                        </tr>
                    <?php } ?>
                </tbody>                
            </table>
        </div>   
    <?php } else if (isset($_GET['action']) && $_GET['action'] == 'add-slider-images'){ ?>
        <div class="edit-product-main">
            <form method="POST" action="../businessLogic/upload-product.php" enctype="multipart/form-data" class="edit-product-card">
                <h2>Shto fotografi në slider</h2>
                <hr class="divider">
                <input type="file" name="slider-image" required>
                <input class="button" type="submit" name="add-slider-img" value="Shto foton">
                <a href="dashboard.php">Anulo</a>
            </form>
        </div>
        <div class="db-container">
            <table class="db-table">
                <thead>
                    <tr>
                        <th colspan="3">Fotot në slider</th>
                    </tr>
                    <tr>    
                        <th>Foto</th>
                        <th>Emri fotos</th>
                        <th>Opsionet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sliderImg as $img){ ?>
                        <tr>
                            <td>
                                <img  style="max-width: 100%;" src="<?php echo $img['image']; ?>" alt="">
                            </td>
                            <td>
                                <?php echo $img['image']; ?>
                            </td>
                            <td><a href="<?php echo "../businessLogic/modify-products.php?action=delete_product&prod_id=".$product['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini produktin?');">Fshij</a></td>
                        </tr>
                    <?php } ?>
                </tbody>                
            </table>
        </div>
    <?php } ?>
        </main>
<?php } else {
        echo "Error 404";
} include '../components/footer.php'; ?>