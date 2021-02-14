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
        $brandImages = $pmapper->getBrandImages();
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
                <div class="square">
                    <img src="../images/icons/industry.svg" alt="">
                    <a href="dashboard.php?action=add-brand-images">Brendet</a>
                </div>
                <div class="square">
                    <img src="../images/icons/text.svg" alt="">
                    <a href="rrethnesh.php?action=edit">Edito Rreth Nesh</a>
                </div>
            </div>
        </div>

    <?php } else if (isset($_GET['action']) && $_GET['action'] == 'view-products'){ ?>
        <div class="db-container">
            <table class="db-table">
                <thead>
                    <tr>
                        <th colspan="6">Produktet</th>
                    </tr>
                    <tr>    
                        <th>Emri</th>
                        <th>Cmimi</th>
                        <th>Sasia</th>
                        <th colspan="3">Opsionet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productList as $product){ ?>
                        <tr>
                            <td>
                                <?php echo $product['emri']; ?>
                            </td>
                            <td>
                                <?php echo $product['cmimi']; ?> &euro;
                            </td>
                            <td>
                                <?php echo $product['sasia']; ?> artikuj
                            </td>
                            <td>
                                <a href="<?php echo "../businessLogic/modifications.php?action=delete-product&prod-id=".$product['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini produktin?');">Fshij
                                </a>
                            </td>
                            <td>
                                <?php if($product['is_promoted'] == 0) { ?>
                                    <a href="<?php echo "../businessLogic/modifications.php?action=promote-product&prod-id=".$product['id']; ?>">Promovo
                                    </a>
                                <?php } else if($product['is_promoted'] == 1){ ?>
                                    <a href="<?php echo "../businessLogic/modifications.php?action=demote-product&prod-id=".$product['id']; ?>">Largo nga promovimi
                                    </a>
                                <?php }?>
                            </td>
                            <td>
                                <a href="<?php echo "../businessLogic/modifications.php?action=edit-product&prod-id=".$product['id']; ?>">Edito
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php } else if (isset($_GET['action']) && $_GET['action'] == 'add-product'){ 
            if(isset($_GET['upload']) && $_GET['upload'] == 'success'){
                echo '<script>alert("Produkti u shtua me sukses")</script>';
            }
            else if (isset($_GET['upload']) && $_GET['upload'] == 'error'){
                echo '<script>alert("Produkti nuk u shtua")</script>';
            }?>
        <div class="edit-product-main">
            <form method="POST" action="../businessLogic/upload.php" enctype="multipart/form-data" class="edit-product-card">
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
                        <th colspan="3">Opsionet</th>
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
                        <td><a href="<?php echo "../businessLogic/modifications.php?action=delete-user&user-id=".$user['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini përdoruesin?');">Fshij</a></td>
                        <?php if($user['is_admin'] == 1) {?>
                            <td><a href="<?php echo "../businessLogic/modifications.php?action=remove-admin&user-id=".$user['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini përdoruesin si administrator?');">Largo admin</a></td>
                        <?php } else { ?>
                            <td><a href="<?php echo "../businessLogic/modifications.php?action=make-admin&user-id=".$user['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të promovoni përdoruesin në administrator?');">Provomo në admin</a></td>
                        <?php } ?>
                        <td><a href="<?php echo "../businessLogic/modifications.php?action=edit-user&user-id=".$user['id']; ?>">Edito</a></td>
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
                            <td><a href="<?php echo "../businessLogic/modifications.php?action=delete-msg&msg-id=".$msg['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini mesazhin?');">Fshij</a></td>
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
                            <td><a href="<?php echo "../businessLogic/modifications.php?action=delete-msg&msg-id=".$msg['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini mesazhin?');">Fshij</a></td>
                            <td><a href="<?="view-message.php?action=view&msg_id=".$msg['id']?>">Lexo</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 
        </div>
    <?php } else if(isset($_GET['action']) && $_GET['action'] == 'add-category') { 
        if(isset($_GET['upload']) && $_GET['upload'] == 'success'){
            echo '<script>alert("Kategoria u shtua me sukses")</script>';
        }
        else if (isset($_GET['upload']) && $_GET['upload'] == 'error'){
            echo '<script>alert("Kategoria nuk u shtua sepse ekziston")</script>';
        }?>
        <div class="edit-product-main">
            <form method="POST" action="../businessLogic/upload.php" enctype="multipart/form-data" class="edit-product-card">
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
                            <td><a href="<?php echo "../businessLogic/modifications.php?action=delete-category&category=".$category['emri']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini kategorinë?');">Fshij</a></td>
                        </tr>
                    <?php } ?>
                </tbody>                
            </table>
        </div>   
    <?php } else if (isset($_GET['action']) && $_GET['action'] == 'add-slider-images'){ 
        if(isset($_GET['upload']) && $_GET['upload'] == 'success'){
            echo '<script>alert("Foto u shtua me sukses në slider")</script>';
        }?>
        <div class="edit-product-main">
            <form method="POST" action="../businessLogic/upload.php" enctype="multipart/form-data" class="edit-product-card">
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
                            <td><a href="<?php echo "../businessLogic/modifications.php?action=delete-slider-img&img-id=".$img['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini foton?');">Fshij</a></td>
                        </tr>
                    <?php } ?>
                </tbody>                
            </table>
        </div>
    <?php } else if(isset($_GET['action']) && $_GET['action'] == 'add-brand-images'){
        if(isset($_GET['upload']) && $_GET['upload'] == 'success'){
            echo '<script>alert("Foto u shtua me sukses në brende")</script>';
        } ?>
        <div class="edit-product-main">
            <form method="POST" action="../businessLogic/upload.php" enctype="multipart/form-data" class="edit-product-card">
                <h2>Shto fotografi të brendeve</h2>
                <hr class="divider">
                <input type="file" name="brand-image" required>
                <input class="button" type="submit" name="add-brand-img" value="Shto foton">
                <a href="dashboard.php">Anulo</a>
            </form>
        </div>
        <div class="db-container">
            <table class="db-table">
                <thead>
                    <tr>
                        <th colspan="3">Brendet</th>
                    </tr>
                    <tr>    
                        <th>Foto</th>
                        <th>Emri fotos</th>
                        <th>Opsionet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($brandImages as $img){ ?>
                        <tr>
                            <td>
                                <img  style="max-height: 150px;" src="<?php echo $img['image']; ?>" alt="">
                            </td>
                            <td>
                                <?php echo $img['image']; ?>
                            </td>
                            <td><a href="<?php echo "../businessLogic/modifications.php?action=delete-brand-img&img-id=".$img['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini foton?');">Fshij</a></td>
                        </tr>
                    <?php } ?>
                </tbody>                
            </table>
        </div>
    <?php }?>
        </main>
<?php } else {
        echo "Error 404";
} include '../components/footer.php'; ?>