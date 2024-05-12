<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-4">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Todo
                </a>
                <button class="navbar-toggler hidemobile" @click="test()" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse show" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" style="flex-direction:row!important;flex-wrap:wrap">
                 

                    <li class="nav-item" style="margin:5px">
                        <a class="nav-link" href="/obrazki.php"></a>
                    </li>
              
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" >
                        <!-- Authentication Links -->
                        <template v-if="1==0">
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                                <li class="nav-item" >
                                    <a class="nav-link" href="register.php">Register</a>
                                </li>
                        </template>

                        <li class="nav-item" style="transform: translateY(20%);">
                    
                        </li>
                            <li class="nav-item dropdown hidemobile" v-if="1==1" @click="$root.wylogujshow = !$root.wylogujshow">
                            

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo $_SESSION['login']; ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="wyloguj" v-if="wylogujshow">
                                    <a class="dropdown-item" href="logout.php">
                                        Wyloguj
                                    </a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>