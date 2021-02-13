<?php include '../components/header.php';
include '../businessLogic/MessageMapper.php';

    $mapper = new MessageMapper();
    $text = $mapper->getText();

    if(!empty($_SESSION['is_logged_in']) && isset($_SESSION['is_logged_in']) 
        && $_SESSION['is_logged_in'] == 1 && $_SESSION['role'] == 1){ 
            if(isset($_GET['action']) && $_GET['action'] == 'edit') { ?>
                <div class="rrethnesh-container">
                    <div class="rrethnesh-card">
                        <div>
                            <h1>Rreth nesh</h1>
                            <hr class="divider">
                        </div>
                        <div>
                            <form action="../businessLogic/upload.php" method="POST">
                                <input type="text" class="hidden" name="id" value="<?php echo $text['id'] ?>">
                                <textarea name="text">
                                    <?php echo $text['text']?>
                                </textarea>
                                <input type="submit" class="button" name="change-reth-nesh" value="Ruaj ndryshimet">
                            </form>
                        </div>
                    </div>
                </div>
    <?php } else  { ?>
        <div class="rrethnesh-container">
            <div class="rrethnesh-card">
                <div>
                    <h1>Rreth nesh</h1>
                    <hr class="divider">
                </div>
                <div>
                    <p><?php echo $text['text'] ?></p>
                </div>
            </div>
        </div>
    <?php }
    } else { ?>
        <div class="rrethnesh-container">
            <div class="rrethnesh-card">
                <div>
                    <h1>Rreth nesh</h1>
                    <hr class="divider">
                </div>
                <div>
                    <p><?php echo $text['text'] ?></p>
                </div>
            </div>
        </div>
    <?php }

include '../components/footer.php'; ?>