<?php 
    include_once '../businessLogic/UserMapper.php';
    include '../components/header.php';

    if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) 
        && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){
        
            $mapper =  new UserMapper();
        $userList = $mapper->getAllUsers();

?>  
    <main id="main">
    <div class="db-container">
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
    </main>
<?php } else {
    header("Location: ../views/index.php");
}
?>

<?php include '../components/footer.php'?>