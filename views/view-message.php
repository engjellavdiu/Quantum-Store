<?php 
    include '../components/header.php';
    require_once '../businessLogic/MessageMapper.php';

    if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) 
        && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){

            $mapper = new MessageMapper();
            $msg = $mapper->getMessageById($_GET['msg_id']);
?>  
    <div class="view-message-main">
        <div class="message-card">
            <img src="../images/icons/envelope-regular.svg" alt="">
            <p><b>Mesazh nga:</b> <?= $msg['emri'].' '.$msg['mbiemri']?></p>
            <p><b>Email: </b><?= $msg['email']?></p>
            <textarea disabled><?= $msg['msg']?></textarea>
            <p><a href="<?= "../businessLogic/send-message.php?action=set_read&msg_id=".$msg['id']?>">Mark as Read</a></p>
        </div>
    </div>
<?php } else {
    header("Location: ../views/index.php");
}
?>

<?php include '../components/footer.php'?>