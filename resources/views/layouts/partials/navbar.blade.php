<header>
  <div class="row header">
    <div class="container pddng-y-30 pddng-x-30">
      <div class="col-md-9 float-left pddng0">
        <ul class="menu">
          <li class="logo"><a href="{{ route('index')}}" >Ecommerce</a></li>
            @if(!request()->is('guestcheckout')) <!-- eğer istekten guestcheckout gelmediyse -->
              <li><a href="{{ route('shop')}}" class="menu-item ml-20">SHOP</a></li>
              <li><a href="{{ route('about')}}" class="menu-item ml-20">ABOUT</a></li>
              <li><a href="{{ route('blog')}}" class="menu-item ml-20">BLOG</a></li>
            @endif
        </ul>
      </div>
      <div class="col-md-3 float-right pddng0 text-right right-menu">
        @if(!request()->is('guestcheckout')) <!-- eğer istekten guestcheckout gelmediyse -->
          @guest<!--bu kısım oturum açılmadığında görünecek kısım -->
          <a href="{{ route('signup')}}" class="menu-item ml-20">SIGN UP</a>
          @endguest
          @auth<!-- bu kısım giriş yapan kullanıcı görür  -->
          <a href="{{ route('logout')}}" class="menu-item ml-20">LOGOUT</a>
          <a href="{{ route('myorders')}}" class="menu-item ml-20">MYORDERS</a>
          @endauth
          @guest<!--bu kısım oturum açılmadığında görünecek kısım -->
          <a href="{{ route('login')}}" class="menu-item ml-20">LOGIN</a>
          @endguest
          <a href="{{ route('cart')}}" class="menu-item ml-20">CART</a>
          @if(Cart::instance('default')->count()>0)
              <span class="cart-span">{{ Cart::instance('default')->count() }}</span>
          @endif
        @endif
    </div>
  </div>
</div>
</header>
