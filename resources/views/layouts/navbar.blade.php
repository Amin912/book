<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/style.css" />
        <title>MonLivre</title>
        <script src="js/script.js"></script>
        <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    </head>
    
    <body>
        <div id="bloc_page" >
            <header>
                <div id="logoWrap">
                    <div class="menuIcon" onclick="toggle()">
                        <img src="images/menu.png" width="40px">
                    </div>

                    <div id="logo" >
                        <a href="{{ url('/') }}" class="logoClick">
                            <span class="logoTemp">
                                <img src="images/livre_logo.jpg" alt="Logo de livre" />
                                <h1 class="logoText">MonLivre</h1> 
                            </span>
                        </a>  
                    </div>
                </div>
                <div id="searchWrap">
                    <form action="">
                        <input type="text" class="searchSt" name="input">
                        <button class="submitButton">
                                <img src="images/search.png" width="22">            
                        </button>
                    </form>
                    <button class="advSearch">Avancée</button>
                </div>
                <!--Barre de recherche-->         
                <div class="search-box">
                    <input type="text" placeholder="Tapez votre recherche">
                    <div class="search-icon" onclick="showInput()">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="cancel-icon">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="search-data"></div>
                </div> 
                <!--Fin de la barre de recherche-->
                <div class="navRight">
                    <a href="{{ url('/') }}" >Accueil</a>
                    @if (Route::has('login'))
                        @auth
                            @if(Auth::user()->is_admin == 1)
                                <a href="{{ url('/admin/home') }}" class="py-2 d-none d-md-inline-block">My Account</a>
                            @else
                                <a href="{{url('/cart')}}">Panier</a>
                                <a href="{{ url('/home') }}" class="py-2 d-none d-md-inline-block">My Account</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="py-2 d-none d-md-inline-block">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="py-2 d-none d-md-inline-block">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>

                <div class="navIcons">
                    <a href="{{ url('/') }}" ><img class="loginIcon" src="images/home.png" /></a>
                    <a href="#"><img class="loginIcon" src="images/login.png" /></a>
                    <a href="#"><img class="loginIcon" src="images/cart.png" /></a>
                </div>
            </header>

            <div id="menu" class="sideMenu">
                <ul>
                    <!-- database categories -->
                    <a href="#"><li class="menuElem" >cat</li></a>
                    <a href="#"><li class="menuElem" >cat</li></a>
                    <a href="#"><li class="menuElem" >cat</li></a>
                    <a href="#"><li class="menuElem" >cat</li></a>
                    <a href="#"><li class="menuElem" >cat</li></a>
                </ul>
            </div>
            <main class="py-4">
                <!-- this is the content !-->

                @yield('content')

                <!-- end content here !-->
            </main>
            <footer>
                <section><h1>   </h1>   <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    </section>           
                <div class="footer-social-icons">
                    <h4>Nous suivre</h4>
                    <ul class="social-icons">
                        <li><a href="" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                        <li><a href="" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
                        <li><a href="" class="social-icon"> <i class="fa fa-rss"></i></a></li>
                        <li><a href="" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
                        <li><a href="" class="social-icon"> <i class="fa fa-linkedin"></i></a></li>
                        <li><a href="" class="social-icon"> <i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </footer>
            <script>
                
                const searchBox = document.querySelector(".search-box");
                const searchBtn = document.querySelector(".search-icon");
                const cancelBtn = document.querySelector(".cancel-icon");
                const searchInput = document.querySelector("input");
                const searchData = document.querySelector(".search-data");
                searchBtn.onclick =()=>{
                    searchBox.classList.add("active");
                    searchBtn.classList.add("active");
                    searchInput.classList.add("active");
                    cancelBtn.classList.add("active");
                    searchInput.focus();
                    if(searchInput.value != ""){
                        var values = searchInput.value;
                        searchData.classList.remove("active");
                        searchData.innerHTML = "Vous venez de rechercher " + "<span style='font-weight: 500;'>" + values + "</span>";
                    }
                    else{
                        searchData.textContent = "";
                    }
                    }
                cancelBtn.onclick =()=>{
                    searchBox.classList.remove("active");
                    searchBtn.classList.remove("active");
                    searchInput.classList.remove("active");
                    cancelBtn.classList.remove("active");
                    searchData.classList.toggle("active");
                    searchInput.value = "";
                }
                
      $('.minus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());

    		if (value > 1) {
    			value = value - 1;
    		} else {
    			value = 0;
    		}

        $input.val(value);

    	});

    	$('.plus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());

    		if (value < 100) {
      		value = value + 1;
    		} else {
    			value =100;
    		}

    		$input.val(value);
    	});

      $('.like-btn').on('click', function() {
        $(this).toggleClass('is-active');
      });
    
            </script>
            
        </div>
    </body>
</html>