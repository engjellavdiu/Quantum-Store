<?php 
    include_once '../businessLogic/MessageMapper.php';
    include_once '../businessLogic/UserMapper.php';
    include '../components/header.php';

    if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) 
        && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){
        
        $msgmapper = new MessageMapper();

        if(isset($_GET['action']) && $_GET['action'] == "all-messages"){
            $msgList = $msgmapper->getAllMessages();
        ?>

<main id="main">
<div class="db-container">
    <table class="db-table">
            <thead>
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
    </main>

        <?php }else if (isset($_GET['action']) && $_GET['action'] == "unread-messages"){
                $msgUnread = $msgmapper->getUnreadMessages();
            ?>
            <main id="main">
<div class="db-container">
    <table class="db-table">
            <thead>
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
    </main>
        <?}

?>  
    
<?php } else {
    header("Location: ../views/index.php");
}}
?>

<?php include '../components/footer.php'?>