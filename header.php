<?php
// session here
?>
<!-- main header -->
<header id="header" class="white-header">
    <div class="container-fluid">
        <!-- logo -->
        <div class="logo" >
            <a href="index.php">
                <img class="normal" src="img/brand.png" alt="FlyWithUs">
                <img class="gray-logo" src="img/brand.png" alt="FlyWithUs">
            </a>
        </div>
        <!-- main navigation -->
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle nav-opener" data-toggle="collapse" data-target="#nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- main menu items and drop for mobile -->
            <div class="collapse navbar-collapse" id="nav">
                <!-- main navbar -->
                <ul class="nav navbar-nav">

                    <li><a href="Packages.php">Packages</a></li>
                    <li><a href="hotels.php" >Hotels</a </li>
                    <li><a href="flights.php">Flights</a></li>

                    <?php
                    session_start();
                    if (!isset($_SESSION['email'])) {
                        echo '<li class="visible-xs visible-sm">
                          <a href="login.php">
                            <span class="icon icon-user"></span>
                            <span class="text">Login</span>
                          </a>
                        </li>
                        <li class="hidden-xs hidden-sm v-divider">
                          <a href="login.php">
                            <span class="icon icon-user"></span>
                          </a>
                        </li>';
                    } else {
                        echo '<li class="visible-xs visible-sm nav-visible dropdown last-dropdown v-divider">
                         <a href="logout.php" data-toggle="dropdown">
                           <span class="icon icon-user"></span>
                         </a>
                         <div class="dropdown-menu dropdown-xs">
                           <div class="drop-wrap cart-wrap">
                           <ul class="cart-list">
                               <div class="text-holder">
                                 <div class="text-wrap">
                                   <strong class="name"style="float:rght;"><a href="my-bookings.php">Bookings</a></strong>
                                 </div>
                               </div>
                           </ul>
                             <ul class="cart-list">

                                 <div class="text-holder">
                                   <div class="text-wrap">
                                     <strong class="name"style="float:rght;"><a href="logout.php">log Out</a></strong>
                                   </div>
                                 </div>
                             </ul>
                           </div>
                         </div>
                       </li>';
                    }
                    // code...
                    ?>

                    <li class="visible-xs visible-sm nav-visible dropdown last-dropdown v-divider">
                        <a href="my-cart.html" data-toggle="dropdown">
                            <span class="icon icon-cart"></span>
                            <span class="text hidden-md hidden-lg">Cart</span>
                            <span class="text hidden-xs hidden-sm">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-md">
                            <div class="drop-wrap cart-wrap">
                                <strong class="title">Shopping Cart</strong>
                                <ul class="cart-list">
                                    <li>
                                        <div class="img">
                                            <a href="#">
                                                <img src="img/listing/img-16.jpg" height="165" width="170" alt="image description">
                                            </a>
                                        </div>
                                        <div class="text-holder">
                                            <span class="amount">x 2</span>
                                            <div class="text-wrap">
                                                <strong class="name"><a href="#">Weekend in Paradise</a></strong>
                                                <span class="price">$199</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img">
                                            <a href="#">
                                                <img src="img/listing/img-17.jpg" height="165" width="170" alt="image description">
                                            </a>
                                        </div>
                                        <div class="text-holder">
                                            <span class="amount">x 4</span>
                                            <div class="text-wrap">
                                                <strong class="name"><a href="#">Water Sports in Spain</a></strong>
                                                <span class="price">$199</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img">
                                            <a href="#">
                                                <img src="img/listing/img-18.jpg" height="165" width="170" alt="image description">
                                            </a>
                                        </div>
                                        <div class="text-holder">
                                            <span class="amount">x 4</span>
                                            <div class="text-wrap">
                                                <strong class="name"><a href="#">Beach Party in Greece</a></strong>
                                                <span class="price">$199</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="footer">
                                    <a href="my-cart.php" class="btn btn-primary">View cart</a>
                                    <span class="total">$3300</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown hidden-xs hidden-sm last-dropdown v-divider">
                        <a href="#"><span class="text">LANG</span> <span class="icon-angle-down"></span></a>
                        <div class="dropdown-menu dropdown-sm">
                            <div class="drop-wrap lang-wrap">
                                <div class="lang-row">
                                    <div class="lang-col">
                                        <div id="google_translate_element"></div>

                                        <script type="text/javascript">
                                            function googleTranslateElementInit() {
                                                new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                                            }
                                        </script>

                                        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
    <!-- search form -->
    <form class="search-form" action="#">
        <fieldset>
            <a href="#" class="search-opener hidden-md hidden-lg">
                <span class="icon-search"></span>
            </a>
            <div class="search-wrap">
                <a href="#" class="search-opener close">
                    <span class="icon-cross"></span>
                </a>
                <div class="trip-form trip-form-v2 trip-search-main">
                    <div class="trip-form-wrap">
                        <div class="holder">
                            <label>Departing</label>
                            <div class='select-holder'>
                                <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                    <input class="form-control" type="text" readonly />
                                    <span class="input-group-addon"><i class="icon-drop"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="holder">
                            <label>Returning</label>
                            <div class='select-holder'>
                                <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
                                    <input class="form-control" type="text" readonly />
                                    <span class="input-group-addon"><i class="icon-drop"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="holder">
                            <label for="select-region">Select Region</label>
                            <div class='select-holder'>
                                <select class="trip-select trip-select-v2 region" name="region" id="select-region">
                                    <option value="select">Africa</option>
                                    <option value="select">Arctic</option>
                                    <option value="select">Asia</option>
                                    <option value="select">Europe</option>
                                    <option value="select">Oceanaia</option>
                                    <option value="select">Polar</option>
                                </select>
                            </div>
                        </div>
                        <div class="holder">
                            <label for="select-activity">Select Activity</label>
                            <div class='select-holder'>
                                <select class="trip-select trip-select-v2 acitvity" name="activity" id="select-activity">
                                    <option value="Holiday Type">Holiday Type</option>
                                    <option value="Holiday Type">Beach Holidays</option>
                                    <option value="Holiday Type">Weekend Trips</option>
                                    <option value="Holiday Type">Summer and Sun</option>
                                    <option value="Holiday Type">Water Sports</option>
                                    <option value="Holiday Type">Scuba Diving</option>
                                </select>
                            </div>
                        </div>
                        <div class="holder">
                            <label for="price-range">Price Range</label>
                            <div class='select-holder'>
                                <select class="trip-select trip-select-v2 price" name="activity" id="price-range">
                                    <option value="Price Range">Price Range</option>
                                    <option value="Price Range">$1 - $499</option>
                                    <option value="Price Range">$500 - $999</option>
                                    <option value="Price Range">$1000 - $1499</option>
                                    <option value="Price Range">$1500 - $2999</option>
                                    <option value="Price Range">$3000+</option>
                                </select>
                            </div>
                        </div>
                        <div class="holder">
                            <button class="btn btn-trip btn-trip-v2" type="submit">Find Tours</button>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</header>
