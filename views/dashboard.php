<?php 
    include '../components/header.php';
    include_once '../businessLogic/UserMapper.php';
    include_once '../businessLogic/Admin.php';

    if(!isset($_SESSION['is_logged_in']) || $_SESSION['role'] == 0){
        header("Location: index.php");
    }
    else if (isset($_SESSION['is_logged_in']) && $_SESSION['role'] == 1){
        $mapper =  new UserMapper();
        $users = $mapper->getAllUsers();
    ?>

    <?php echo "<h1>Mirësevini, </h1>";?>

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
                <?php foreach($users as $user){ ?>
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
                    <td><a href="<?php echo "../businessLogic/ModifyUsers.php?action=delete&user_id=".$user['id']; ?>">Fshij</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>



    <?php }
    else {
        echo "Error 404";
    }

    include '../components/footer.php';
?>