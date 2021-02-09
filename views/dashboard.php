<?php 
    include '../components/header.php';
    include_once '../businessLogic/UserMapper.php';
    include_once '../businessLogic/Admin.php';

    if(!isset($_SESSION['is_logged_in']) || $_SESSION['role'] == 0){
        header("Location: index.php");
    }
    else if (isset($_SESSION['is_logged_in']) && $_SESSION['role'] == 1){
        $mapper =  new UserMapper();
        $userList = $mapper->getAllUsers();
        $user = $mapper->getUserByEmail($_SESSION['email']);
    ?>

    <?php echo "<h2>Mirësevini, ".$user['first_name']."</h2>";?>
    <main id='main'>
    <div>
        <h2>All users</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Email</th>
                    <th>Modifiko</th>
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
    </main>


    <?php }
    else {
        echo "Error 404";
    }

    include '../components/footer.php';
?>