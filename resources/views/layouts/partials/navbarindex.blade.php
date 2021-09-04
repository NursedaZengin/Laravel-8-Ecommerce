<header>
  <div class="col-md-12 pddng-y-40 pddng-x-30">
    <div class="col-md-9 float-left pddng0">
      <ul class="menu">
        <li class="logo"><a href="{{ route('index')}}" >Ecommerce</a></li>
        <li><a href="{{ route('shop')}}" class="menu-item ml-20">SHOP</a></li>
        <li><a href="#" class="menu-item ml-20">ABOUT</a></li>
        <li><a href="#" class="menu-item ml-20">BLOG</a></li>
      </ul>
    </div>
    <div class="col-md-3 float-right pddng0 text-right">
      @if(!request()->is('checkout'))
        @guest<!--bu kısım oturum açılmadığında görünecek kısım -->
        <a href="{{ route('logout')}}" class="menu-item ml-20">SIGN UP</a></li>
        @endguest
        @auth<!-- bu kısım giriş yapan kullanıcı görür  -->
        <a href="{{ route('logout')}}" class="menu-item ml-20">LOG OUT</a></li>
        @endauth
        @guest<!--bu kısım oturum açılmadığında görünecek kısım -->
        <a href="{{ route('login')}}" class="menu-item ml-20">LOGIN</a></li>
        @endguest
        <a href="{{ route('cart')}}" class="menu-item ml-20">CART</a>
          @if(Cart::count()>0)
          <span class="cart-span">{{ Cart::count() }}</span>
          @endif
      @endif
    </div>
  </div>
</header>
