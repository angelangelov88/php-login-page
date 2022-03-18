<header>
<!-- I added the logo as a background image in order to be able to change the image and show another one when the user scrolls down -->
      <a href="#" id="logo"></a>
      <ul id="ul-header">
        <li class="li-header"><a href="#">Who we are</a></li>
        <li class="li-header"><a href="#">#LifeatGoco</a></li>
        <li class="li-header"><a href="#">What's in it for you</a></li>
        <li class="li-header"><a href="#">GoFurther Academy</a></li>
        <li class="li-header"><a href="#">FAQ</a></li>
      </ul>
      <a href="#" class="header-btn">View Jobs</a>

<!-- I added the blocker div to allow the user click anywhere in order to close the hamburger dropdown when shows on small screens -->
      <div class="blocker" onclick="openCloseNav()"></div>

<!-- Extra code for the drop down hamburger menu on small screen sizes -->
      <div id="header-small">
        <ul>
          <li class="li-header-small"><a href="#">Who we are</a></li>
          <li class="li-header-small"><a href="#">#LifeatGoco</a></li>
          <li class="li-header-small"><a href="#">What's in it for you</a></li>
          <li class="li-header-small"><a href="#">GoFurther Academy</a></li>
          <li class="li-header-small"><a href="#">FAQ</a></li>
        </ul>
      </div>

<!-- Hamburger menu itself -->
      <div class="btn-menu-xs" onclick="openCloseNav()">
          <div class="menu-lines">
              <div class="menu-line"></div>
              <div class="menu-line"></div>
              <div class="menu-line"></div>	
          </div>
          <div class="menu-x">x</div>
              <p class="menu-title">MENU</p>						
      </div>
</header>