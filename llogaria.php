        <?php
            include './components/header.php'
        ?>
        <div class="llogaria-main">
            <form>
                <div class="login form form-style">
                    <h2>Kyqu</h2>
                    <hr class="divider">
                    <label for="email">Email</label>
                    <input class="input" type="email">
                    <label for="password">Fjalekalimi</label>
                    <input class="input" type="password">
                    <input type="submit" class="input button" value="Kyqu" onclick="validate(0)" />
                    <p>Nuk keni llogari? <a onclick="changeForm(1)">Regjistrohu</a></p>
                </div>

                <div class="register form hidden">
                    <h2>Regjistrohu</h2>
                    <hr class="divider">
                    <label for="emri">Emri</label>
                    <input id="emri" type="text">
                    <label for="mbiemri">Mbiemri</label>
                    <input id="mbiemri" type="text">
                    <label for="email">Email</label>
                    <input id="emaili" type="email">
                    <label for="password">Fjalekalimi</label>
                    <input id="fjalekalimi1" type="password">
                    <label for="confirmPassword">Konfirmo fjalekalimin</label>
                    <input id="fjalekalimi2" type="password">
                    <input type="submit" class="button" value="Regjistrohu" id="Btn-submit">
                    <p>Keni llogari? <a onclick="changeForm(0)">Kyqu</a></p>
                </div>
            </form>
        </div>

        <!--Footer-->
        <?php
            include './components/footer.php'
        ?>