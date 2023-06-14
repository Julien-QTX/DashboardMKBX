<?php 

require_once __DIR__ . '/../../init.php';

$page_title = "Accueil";

$head_metas = "<link rel=stylesheet href=assets/CSS/home.css>";


ob_start();

?>


<div class="banner">
  <div class="banner__overlay">
    <div class="banner__container">
      <h1 class="banner__title">TEST</h1>
      <p class="banner__text">E-commerce</p>
      <a href="#" class="btn btn--opacity">SHOP</a>
    </div>

    <img class="banner__scroll-down" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjkgMTI5IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAxMjkgMTI5IiB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4Ij4KICA8Zz4KICAgIDxwYXRoIGQ9Im0xMjEuMywzNC42Yy0xLjYtMS42LTQuMi0xLjYtNS44LDBsLTUxLDUxLjEtNTEuMS01MS4xYy0xLjYtMS42LTQuMi0xLjYtNS44LDAtMS42LDEuNi0xLjYsNC4yIDAsNS44bDUzLjksNTMuOWMwLjgsMC44IDEuOCwxLjIgMi45LDEuMiAxLDAgMi4xLTAuNCAyLjktMS4ybDUzLjktNTMuOWMxLjctMS42IDEuNy00LjIgMC4xLTUuOHoiIGZpbGw9IiNGRkZGRkYiLz4KICA8L2c+Cjwvc3ZnPgo=" />
  </div>
</div>
<div class="sect sect--type">
  <div class="container">
    <div class="row row--center">
      <div class="col-md-5 col-xs-8 col-sm-6 col--inbl">
        <h1 class="sect__title">Lorem ipsum dolor sit amet consectetur.</h1>
        <p class="sect__subtitle">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse tempora quasi suscipit.
      </p>
      </div>
    </div>
    <div class="row row--small row--margin row--center">
      <div class="col-md-4 col-sm-4 coffee">
        <img src="" class="coffee__img">
        <h2 class="coffee__name">Mocha</h2>
        <p class="coffee__descr">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse tempora quasi suscipit.
        </p>
      </div>
      
      <div class="col-md-4 col-sm-4 coffee">
        <img src="" class="coffee__img">
        <h2 class="coffee__name">Pour</h2>
        <p class="coffee__descr">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse tempora quasi suscipit.
        </p>
      </div>
      
       <div class="col-md-4 col-sm-4 coffee">
        <img src="" class="coffee__img">
        <h2 class="coffee__name">bagette</h2>
        <p class="coffee__descr">
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
        </p>
      </div>  
    </div>
       <div class="row row--margin row--center">
         <a href="#" class="btn">Full menu</a>
       </div>
  </div>
</div>
<div class="sect sect--brown sect--no-bottom">
  <div class="container">
    <div class="row row--center">
      <div class="col-md-5 col-sm-6 col--inbl ">
        <h1 class="sect__title sect--white-text">Our Story</h1>
      <p class="sect__subtitle sect--white-text">
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.
      </p>
      </div>
    </div>
</div>
  </div>
  <div class="story-img"></div>

<div class="half-sect">
  <div class="half half-sect__first">
    <div class="description">
      <h2 class="description__title">FRESH</h2>
      <p class="description__p">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse tempora quasi suscipit.</p>
      <a href="#" class="btn">Learn more</a>
    </div>

  </div>
    <div class="half half-sect__second">  </div>
</div>

<div class="sect sect--great">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-7 col-sm-offset-4 col-md-offset-6">
        <div class="description">
      <h2 class="description__title">GREAT</h2>
      <p class="description__p">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse tempora quasi suscipit.</p>
      <a href="#" class="btn">Learn more</a>
      </div>
      </div>
    </div>
  </div>
</div>

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