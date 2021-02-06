        <?php
        include_once '../components/header.php';
        ?>

        <?php if(isset($_SESSION['is_logged_in'])) {?>
            <h1 style="margin: 250px 0 250px 0;">You are already logged in</h1>
        <?php } else { ?>
        

        <div class="llogaria-main">
            <?php
                if(isset($_GET['login'])){
                    echo '<div class="llogaria-error">';
                    if($_GET['login'] == "empty-fields")
                        echo '<p>Të gjitha fushat duhet të plotësohen</p>';
                    else if ($_GET['login'] == "error")
                        echo '<p>Email dhe/ose fjalëkalimi është dhënë</p>';
                    echo '</div>';
                }
            ?>
            
            <div id="log-error" class="llogaria-error hidden">
                <p id='msg'></p>
            </div>
            <form method="POST" action="../businessLogic/AccountVerify.php" id='llogaria-form'>
                <div class="login form form-style">
                    <h2>Kyqu</h2>
                    <hr class="divider">
                    <label for="email">Email</label>
                    <input class="input" id="login-email" name="email" type="email">
                    <label for="password">Fjalekalimi</label>
                    <input class="input" id="login-pw" name="password" type="password">
                    <input type="submit" id="login-submit-btn" class="input button" name="login" value="Kyqu" />
                    <p>Nuk keni llogari? <a onclick="changeForm(1)">Regjistrohu</a></p>
                </div>
                <div class="register form hidden">
                    <h2>Regjistrohu</h2>
                    <hr class="divider">
                    <label for="emri">Emri</label>
                    <input id="fname" type="text" name="firstname">
                    <label for="mbiemri">Mbiemri</label>
                    <input id="lname" type="text" name="lastname">
                    <label for="email">Email</label>
                    <input id="reg-email" type="email" name="register-email">
                    <label for="password">Fjalekalimi</label>
                    <input id="reg-pw" type="password" name="register-password">
                    <label for="confirmPassword">Konfirmo fjalekalimin</label>
                    <input id="conf-pw" type="password" name="confirmpassword">
                    <input type="submit" name="register" class="input button" value="Regjistrohu" id="submit-btn">
                    <p>Keni llogari? <a onclick="changeForm(0)">Kyqu</a></p>
                </div>
            </form>
        </div>
        <?php } ?>

        <!--Footer-->
        <?php include '../components/footer.php'?>