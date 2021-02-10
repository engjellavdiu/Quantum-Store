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
    ?>

    <main id='main'>
        
        <div class="db-container">
        <!-- <h3><?php echo "<h2>Mirësevini, ".$user['first_name']."</h2>";?></h3> -->
        <table class="db-table">
            <thead>
                <tr>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Email</th>
                    <th colspan="3">Modifiko</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($userList as $user){ ?>
                <tr>
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
    <div class="db-container">
        <table class="db-table">
            <thead>
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
                        <td><a href="<?php echo "../businessLogic/modify-products.php?action=delete_product&prod_id=".$product['id']; ?>" onclick="return confirm('A jeni të sigurt që dëshironi të fshini produktin?');">Fshij</a></td>
                        <td><a href="<?php echo "../businessLogic/modify-products.php?action=edit_product&prod_id=".$product['id']; ?>">Edito</a></td>
                    </tr>
                <?php } ?>
            </tbody>                
        </table>
    </div>


    <a href="add-product.php">Shto produkt</a>
    <table class="db-table">
            <thead>
                <tr>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Email</th>
                    <th>Opsionet</th>
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
    </main>


    <?php }
    else {
        echo "Error 404";
    }

    include '../components/footer.php';
?>