<template>
    <div id="app">
        <img src="./Assets/netflix1.png" id="bg" alt="">
        <div class="overlay">
            <div class="logo">
                <p>CIMⱯUP</p>
            </div>
            <div class="subTitle1">
                <p>Everything you imagine
and even more ...</p>
            </div>
            <div class="subTitle2">
                <p>With a CIMAUP subscription, watch popular movies and Series. Also enjoy your time with us.</p>
            </div>
            <div class="buttonsDiv">
                <div class="registerButtonDiv">
                    <button type="button" class="registerButton">New to CIMAUP ?</button> 
                </div>
                <div class="skipText">
                    <p>Skip it now !</p>
                </div>
                <div class="orText">
                    <p>or</p>
                </div>
                <div class="signInButtonDiv">
                    <button type="button" class="signInButton">Sign in</button> 
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>
    
<style scoped>
.orText {
    font-family: sans-serif;
    top : 70px;
    left : 80px;
    color: #FFFFFF;
    font-size: 12px;
    max-width: 600px;
    position: absolute;
    font-family : Roboto;
}
.orText:before {
  content: "";
  display: block;
  width: 70px;
  height: 2px;
  background: #4154FF;
  left: -80px;
  top: 50%;
  position: absolute;
}
.orText:after {
  content: "";
  display: block;
  width: 70px;
  height: 2px;
  background: #4154FF;
  left: 20px;
  top: 50%;
  position: absolute;
}
.skipText {
    position: absolute;
    top : 55px;
    left : 100px;
    font-size: 12px;
    font-family : Roboto;
    color : #FFFFFF;
}
.buttonsDiv {
    position: absolute;
    top : 370px;
    left : 120px;
    height : 78px;
    width : 325px;
}
.registerButton {
    position: absolute;
    background-color: #4154FF;
    border: none;
    color: black;
    width:  170px;
    height : 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    top : 0px;
    left : 0px;   
}
.signInButton {
    position: absolute;
    background-color: transparent;
    color: #4154FF;
    border: 2px solid #4154FF;  
    font-size: 16px;
    top : 100px;
    left : 0px;
    width:  170px;
    height : 50px;
}
.overlay {
    position: absolute;
    float : right;
    width : 40%;
    height : 100%;
    background-color: rgba(0, 0, 0, 0.9);
    -webkit-transform: skew(10deg);
    -moz-transform: skew(10deg);
    -o-transform: skew(10deg);
    transform: skew(10deg);
    }
#bg {
  position: fixed; 
  top: 0; 
  left: 0; 
  min-width: 100%;
  min-height: 100%;
}
.logo {
    position: absolute;
    top : 100px;
    left : 109px;
    height : 78px;
    width : 325px;
    font-size: 50px;
    font-family : Roboto;
    color : #4154FF;
}
.subTitle1 {
    position: absolute;
    top : 180px;
    left : 129px;
    height : 78px;
    width : 325px;
    font-size: 22px;
    font-family : Roboto;
    color : #FFFFFF;
}
.subTitle2 {
    position: absolute;
    top : 260px;
    left : 149px;
    height : 78px;
    width : 325px;
    font-size: 16px;
    font-family : Roboto;
    color : #FFFFFF;
}
</style> 