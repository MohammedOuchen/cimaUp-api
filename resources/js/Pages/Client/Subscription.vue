<template>
<div id="main">
<br>
<br>
<div align="center">
<img src="images/cimaup.png"/>
</div>
<br>
<br>
<br>
<br>
<h1 class="demo-title">
  Sélectionnez le forfait qui vous convient<br>
</h1>
<h2>Regardez autant que vous voulez. Sans publicité.</h2>
<h2>Recommandations personnalisées.</h2>
<h2>Changez ou annulez votre forfait à tout moment.</h2>
<br>
<br>
<br>
<br>
<div class="pricing-table">
  <div class="ptable-item">
    <div class="ptable-single">
      <div class="ptable-header">
        <div class="ptable-title">
          <h2>Essentiel</h2>
        </div>
        <div class="ptable-price">
          <h2><small>€</small>8.99<span>/ M</span></h2>
        </div>
      </div>
      <div class="ptable-body">
        <div class="ptable-description">
          <ul>
            <li>Qualité vidéo : Bonne</li>
            <li>Résolution : 480P</li>
            <li>Netflix sur votre TV, ordinateur, smartphone et tablette : inclus</li>
          </ul>
        </div>
      </div>
      <div class="ptable-footer">
        <div class="ptable-action">
          <a href="">Acheter</a>
        </div>
      </div>
    </div>
  </div>

  <div class="ptable-item featured-item">
    <div class="ptable-single">
      <div class="ptable-header">
        <div class="ptable-status">
          <span>Hot</span>
        </div>
        <div class="ptable-title">
          <h2>Standard</h2>
        </div>
        <div class="ptable-price">
          <h2><small>€</small>12.99<span>/ M</span></h2>
        </div>
      </div>
      <div class="ptable-body">
        <div class="ptable-description">
          <ul>
            <li>Qualité vidéo : Meilleure</li>
            <li>Résolution : 1080P</li>
            <li>Netflix sur votre TV, ordinateur, smartphone et tablette : inclus</li>
          </ul>
        </div>
      </div>
      <div class="ptable-footer">
        <div class="ptable-action">
          <a href="">Acheter</a>
        </div>
      </div>
    </div>
  </div>

  <div class="ptable-item">
    <div class="ptable-single">
      <div class="ptable-header">
        <div class="ptable-title">
          <h2>Premium</h2>
        </div>
        <div class="ptable-price">
          <h2><small>€</small>18.99<span>/ M</span></h2>
        </div>
      </div>
      <div class="ptable-body">
        <div class="ptable-description">
          <ul>
            <li>Qualité vidéo : Optimale </li>
            <li>Résolution : 4K+HDR</li>
            <li>Netflix sur votre TV, ordinateur, smartphone et tablette : inclus</li>
          </ul>
        </div>
      </div>
      <div class="ptable-footer">
        <div class="ptable-action">
          <a href="">Acheter</a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</template>

<style>
*,
*::before,
*::after {
  box-sizing: border-box;
}

.logo{
  text-align:center;
}


h2{
  text-align: center;
  font-size: 18px;
  font-weight: 300;
  color: #f6f8fa;
  letter-spacing: 2px;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #1a1a2e;
}

h1.demo-title {
  text-align: center;
  font-size: 30px;
  font-weight: 600;
  color: #f6f8fa;
  letter-spacing: 2px;
}

h1.demo-title a {
  font-size: 16px;
  font-weight: 300;
}

.pricing-table {
  display: flex;
  flex-flow: row wrap;
  width: 100%;
  max-width: 1100px;
  margin: 0 auto;
  background: #1a1a2e;
}

.pricing-table .ptable-item {
  width: 33.33%;
  padding: 0 15px;
  margin-bottom: 30px;
}

@media (max-width: 992px) {
  .pricing-table .ptable-item {
    width: 33.33%;
  }
}

@media (max-width: 768px) {
  .pricing-table .ptable-item {
    width: 50%;
  }
}

@media (max-width: 576px) {
  .pricing-table .ptable-item {
    width: 100%;
  }
}

.pricing-table .ptable-single {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.pricing-table .ptable-header,
.pricing-table .ptable-body,
.pricing-table .ptable-footer {
  position: relative;
  width: 100%;
  text-align: center;
  overflow: hidden;
}

.pricing-table .ptable-status ,
.pricing-table .ptable-title,
.pricing-table .ptable-price,
.pricing-table .ptable-description,
.pricing-table .ptable-action {
  position: relative;
  width: 100%;
  text-align: center;
}

.pricing-table .ptable-single {
  background: #f6f8fa;
}

.pricing-table .ptable-single:hover {
  box-shadow: 0 0 10px #999999;
}

.pricing-table .ptable-header {
  margin: 0 30px;
  padding: 30px 0 45px 0;
  width: auto;
  background: #2A293E;
}

.pricing-table .ptable-header::before,
.pricing-table .ptable-header::after {
  content: "";
  position: absolute;
  bottom: 0;
  width: 0;
  height: 0;
  border-bottom: 100px solid #f6f8fa;
}

.pricing-table .ptable-header::before {
  right: 50%;
  border-right: 250px solid transparent;
}

.pricing-table .ptable-header::after {
  left: 50%;
  border-left: 250px solid transparent;
}

.pricing-table .ptable-item.featured-item .ptable-header {
  background: #FF6F61;
}

.pricing-table .ptable-status {
  margin-top: -30px;
}

.pricing-table .ptable-status span {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 30px;
  padding: 5px 0;
  text-align: center;
  color: #FF6F61;
  font-size: 14px;
  font-weight: 300;
  letter-spacing: 1px;
  background: #2A293E;
}

.pricing-table .ptable-status span::before,
.pricing-table .ptable-status span::after {
  content: "";
  position: absolute;
  bottom: 0;
  width: 0;
  height: 0;
  border-bottom: 10px solid #FF6F61;
}

.pricing-table .ptable-status span::before {
  right: 50%;
  border-right: 25px solid transparent;
}

.pricing-table .ptable-status span::after {
  left: 50%;
  border-left: 25px solid transparent;
}

.pricing-table .ptable-title h2 {
  color: #ffffff;
  font-size: 24px;
  font-weight: 300;
  letter-spacing: 2px;
}

.pricing-table .ptable-price h2 {
  margin: 0;
  color: #ffffff;
  font-size: 45px;
  font-weight: 700;
  margin-left: 15px;
}

.pricing-table .ptable-price h2 small {
  position: absolute;
  font-size: 18px;
  font-weight: 300;
  margin-top: 16px;
  margin-left: -15px;
}

.pricing-table .ptable-price h2 span {
  margin-left: 3px;
  font-size: 16px;
  font-weight: 300;
}

.pricing-table .ptable-body {
  padding: 20px 0;
}

.pricing-table .ptable-description ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

.pricing-table .ptable-description ul li {
  color: #2A293E;
  font-size: 14px;
  font-weight: 300;
  letter-spacing: 1px;
  padding: 7px;
  border-bottom: 1px solid #dedede;
}

.pricing-table .ptable-description ul li:last-child {
  border: none;
}

.pricing-table .ptable-footer {
  padding-bottom: 30px;
}

.pricing-table .ptable-action a {
  display: inline-block;
  padding: 10px 20px;
  color: #FF6F61;
  font-size: 14px;
  font-weight: 500;
  letter-spacing: 2px;
  text-decoration: none;
  background: #2A293E;
}

.pricing-table .ptable-action a:hover {
  color: #2A293E;
  background: #FF6F61;
}

.pricing-table .ptable-item.featured-item .ptable-action a {
  color: #2A293E;
  background: #FF6F61;
}

.pricing-table .ptable-item.featured-item .ptable-action a:hover {
  color: #FF6F61;
  background: #2A293E;
}
</style>

