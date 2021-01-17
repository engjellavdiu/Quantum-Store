        <?php include 'components/header.php' ?>

        <main id="main">
            <!--Slideshow-->
            <div class="slideshow">
                <div class="slide">
                    <img src="images/slideri/3-ps5-slider.png">
                </div>
                <div class="slide">
                    <img src="images/slideri/2-xbox-slider.png">
                </div>
                <div class="slide">
                    <img src="images/slideri/1-asus-slider.png">
                </div>
                <div class="slide">
                    <img src="images/slideri/0-apple-slider.png">
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <div class="dots">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
            </div>

            <!--Produktet me te kerkuara-->
            <div class="section-title">
                <h3>Produktet me te fundit</h3>
                <hr class="divider">
            </div>
            <div class="block">
                <img src="images/produktet-fundit/watch-series-6-blue.png" alt="">
                <img src="images/produktet-fundit/razerblade-blue.png" alt="">
                <img src="images/produktet-fundit/iphone12-blue.png" alt="">
            </div>
            <!-- GoToTop -->
            <button onclick="topFunction()" id="back-to-top" title="Go to top"><img src="images/arrow-top.png" alt=""></button>

            <!--brendet-->
        <div class="section-title">
            <h3>Brendet</h3>
            <hr class="divider">
        </div>
        <div class="brendet">
            <img src="images/brendet-logos/apple-logo.svg" alt="">
            <img src="images/brendet-logos/ps5-logo.png" alt="">
            <img src="images/brendet-logos/asus-logo.png" alt="">
            <img src="images/brendet-logos/xbox-logo.svg" alt="">
            <img src="images/brendet-logos/razer-logo.png" alt="">
            <img src="images/brendet-logos/hyper-x-logo.png" alt="">
        </div>
            
            <!--Produktet-->
            <div class="section-title">
                <h3>Produktet</h3>
                <hr class="divider">
            </div>
            <div id="produktet-each">
                <ul>
                    <!-- HyperX Cloud -->
                    <li>
                        <div class="card">
                            <div class="imageC">
                                <img src="images/hyperx-cloud2.png" alt="">
                            </div>
                            <div class="content">
                                <h3>HyperX Cloud 2</h3>
                                <h2 class="price">€89.99</h2>
                                <a href="#" class="addToCart">Shto në Shportë</a>
                            </div>
                        </div>
                    </li>
                    <!-- Razer Kraken -->
                    <li>
                        <div class="card">
                            <div class="imageC">
                                <img src="images/razerkraken-productCard.png" alt="">
                            </div>
                            <div class="content">
                                <h3>Razer Kraken Pro V2</h3>
                                <h2 class="price">€89.99</h2>
                                <a href="#" class="addToCart">Shto në Shportë</a>
                            </div>
                        </div>
                    </li>
                    <!-- PS5 -->
                    <li>
                        <div class="card">
                            <div class="imageC">
                                <img src="images/ps5-productCard.png" alt="">
                            </div>
                            <div class="content">
                                <h3>Play Station 5</h3>
                                <h2 class="price">€399.99</h2>
                                <a href="#" class="addToCart">Shto në Shportë</a>
                            </div>
                        </div>
                    </li>
                    <!-- Xbox X Series -->
                    <li>
                        <div class="card">
                            <div class="imageC">
                                <img src="images/xboxseries-productCard.png" alt="">
                            </div>
                            <div class="content">
                                <h3>Xbox X Series</h3>
                                <h2 class="price">€499.99</h2>
                                <a href="#" class="addToCart">Shto në Shportë</a>
                            </div>
                        </div>
                    </li>
                    <!-- MacBook Pro -->
                    <li>
                        <div class="card">
                            <div class="imageC">
                                <img src="images/macbookpro-productCard.png" alt="">
                            </div>
                            <div class="content">
                                <h3>Macbook Pro</h3>
                                <h2 class="price">€1449.99</h2>
                                <a href="#" class="addToCart">Shto në Shportë</a>
                            </div>
                        </div>
                    </li>
                    <!-- Asus Rog -->
                    <li>
                        <div class="card">
                            <div class="imageC">
                                <img src="images/asus-rog-productCard.png" alt="">
                            </div>
                            <div class="content">
                                <h3>Asus Rog GT51CH</h3>
                                <h2 class="price">€1699.99</h2>
                                <a href="#" class="addToCart">Shto në Shportë</a>
                            </div>
                        </div>
                    </li>
                    <!-- Apple Watch -->
                    <li>
                        <div class="card">
                            <div class="imageC">
                                <img src="images/appleseries6-productCard.png" alt="">
                            </div>
                            <div class="content">
                                <h3>Apple Watch</h3>
                                <h2 class="price">€523.99</h2>
                                <a href="#" class="addToCart">Shto në Shportë</a>
                            </div>
                        </div>
                    </li>
                    <!-- iPhone 12 pro -->
                    <li>
                        <div class="card">
                            <div class="imageC">
                                <img src="images/iphone12pro-productCard.png" alt="">
                            </div>
                            <div class="content">
                                <h3>iPhone 12 pro</h3>
                                <h2 class="price">€1099.99</h2>
                                <a href="#" class="addToCart">Shto në Shportë</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="shiko-te-gjitha">
                <a href="produktet.php">Shiko te gjitha produktet</a>
            </div>
        </main>
        

        <!--Footer-->
        <?php include 'components/footer.php'?>