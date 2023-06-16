<?php 

require_once __DIR__ . '/../../init.php';

$page_title = "Accueil";

$head_metas = "<link rel=stylesheet href=assets/CSS/home.css>";


ob_start();

?>

    <!-- Showcase -->
    <header class="showcase">
      <h2>E-commerce</h2>
      <p>
        Select Surfaces are on sale now - save while supplies last
      </p>
      <a href="/?page=panier" class="btn">
        Shop Now 
      </a>
    </header>

    <!-- Home cards 1 -->
    <section class="home-cards">
      <div>
        <img src="../../assets/img/chaussure1.jpg" alt="">
        <h3>Nike</h3>
        <p>
          40.99€
        </p>
        <a href="#">Acheté <i class="fas fa-chevron-right"></i></a>
      </div>
      <div>
        <img src="../../assets/img/chaussure2.jpg" alt="" />
        <h3>Nike</h3>
        <p>
          40.99€
        </p>
        <a href="/?page=panier">Acheté <i class="fas fa-chevron-right"></i></a>
      </div>
      <div>
        <img src="../../assets/img/chaussure3.jpg" alt="" />
        <h3>Nike</h3>
        <p>
          40.99€
        </p>
        <a href="#">Acheté <i class="fas fa-chevron-right"></i></a>
      </div>
      <div>
        <img src="../../assets/img/chaussure4.jpg" alt="" />
        <h3>Nike</h3>
        <p>
          40.99€
        </p>
        <a href="#">Acheté<i class="fas fa-chevron-right"></i></a>
      </div>
    </section>

    <!-- Xbox -->
    <section class="pack">
      <div class="content">
        <h2>Pack Ultimate</h2>
        <p> Ultimate
          Pack
          next favorite game.</p>
          <a href="#" class="btn">
            Join Now <i class="fas fa-chevron-right"></i>
          </a>
      </div>
    </section>

    <!-- Home cards 2 -->
			<section class="home-cards">
				<div>
					<img src="../../assets/img/T-shirt1.jpg" alt="" />
					<h3>T-shirt</h3>
					<p>
						19.99€
					</p>
					<a href="#">Acheté <i class="fas fa-chevron-right"></i></a>
				</div>
				<div>
					<img src="../../assets/img/T-shirt2.jpg" alt="" />
					<h3>T-shirt</h3>
					<p>
            19.99€
					</p>
					<a href="#">Acheté <i class="fas fa-chevron-right"></i></a>
				</div>
				<div>
					<img src="../../assets/img/T-shirt2.jpg" alt="" />
					<h3>T-shirt</h3>
					<p>
            19.99€
					</p>
					<a href="#">Acheté <i class="fas fa-chevron-right"></i></a>
				</div>
				<div>
					<img src="../../assets/img/T-shirt1.jpg" alt="" />
					<h3>T-shirt</h3>
					<p>
            19.99€
					</p>
					<a href="#">Acheté <i class="fas fa-chevron-right"></i></a>
				</div>
      </section>
      
      <!-- Carbon -->
      <section class="carbon dark">
        <div class="content">
          <h2>Commiting To Carbon Negative</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing reiciendis excepturi eveniet fugit facere id enim 
            incidunt voluptatibus rem itaque officia est et voluptate obcaecati?</p>
            <a href="#" class="btn">
              Learn More <i class="fas fa-chevron-right"></i>
            </a>
        </div>
      </section>

      <!-- Follow -->
      <section class="follow">
        <p>Follow</p>
        <a href="https://facebook.com">
          <img src="https://i.ibb.co/LrVMXNR/social-fb.png" alt="Facebook">
        </a>
        <a href="https://twitter.com">
          <img src="https://i.ibb.co/vJvbLwm/social-twitter.png" alt="Twitter">
        </a>
        <a href="https://linkedin.com">
          <img src="https://i.ibb.co/b30HMhR/social-linkedin.png" alt="Linkedin">
        </a>
      </section>
    </div>
      <!-- Links -->
      <section class="links">
        <div class="links-inner">
          <ul>
            <li><h3>What's New</h3></li>
            <li><a href="#">Surface Pro X</a></li>
            <li><a href="#">Surface Laptop 3</a></li>
            <li><a href="#">Surface Pro 7</a></li>
          </ul>
          <ul>
            <li><h3>Store</h3></li>
            <li><a href="#">Account Profile</a></li>
            <li><a href="#">Download Center</a></li>
            <li><a href="#">Store support</a></li>
          </ul>
          <ul>
            <li><h3>Education</h3></li>
            <li><a href="#">education</a></li>
            <li><a href="#">Office for students</a></li>
            <li><a href="#">Office 365 for schools</a></li>
          </ul>
          <ul>
            <li><h3>Enterprise</h3></li>
            <li><a href="#">Azure</a></li>
            <li><a href="#">AppSource</a></li>
            <li><a href="#">Automotive</a></li>
          </ul>
          <ul>
            <li><h3>Developer</h3></li>
            <li><a href="#">Visual Studio</a></li>
            <li><a href="#">Windowszs Dev Center</a></li>
            <li><a href="#">Developer Network</a></li>
          </ul>
          <ul>
            <li><h3>Company</h3></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Company news</a></li>
          </ul>
        </div>
      </section>

      <!-- Footer -->
      <footer class="footer">
        <div class="footer-inner">
          <div><i class="fas fa-globe fa-2x"></i> France (Europe)</div>
          <ul>
            <li><a href="#">Sitemap</a></li>
					  <li><a href="#">Contact</a></li>
					  <li><a href="#">Privacy & cookies</a></li>
					  <li><a href="#">Terms of use</a></li>
					  <li><a href="#">Trademarks</a></li>
					  <li><a href="#">Safety & eco</a></li>
					  <li><a href="#">About our ads</a></li>
					  <li><a href="#">&copy;  2020</a></li>
          </ul>
        </div>
      </footer>

<?php

if ($user !== false) {
    if ($user->role == 0) { ?>

    <h2>Votre compte a été banni</h2>
   
<?php }
}


//echo '<p>'.var_dump($user).'</p>';



/*if (isset($_SESSION['user_id'])) {
    echo '<p>'.$_SESSION['user_id'].'</p>';
}*/

$page_content = ob_get_clean();