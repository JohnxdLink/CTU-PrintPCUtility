<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/login/style.css">
   <link rel="shortcut icon" type="image/x-icon" href="../public/images/logo/castro-techno-logo.png">
   <meta name="language" content="English">
   <meta name="description" content="This is the login page of PPU">
   <meta name="robots" content="follow">
   <meta name="author" content="Castro John Christian">
   <title>CTU | Login</title>
</head>

<body class="whole-container body-sec">
   <section class="body-sec__background"></section>
   <main class="body-sec__main main-sec">
      <section class="main-sec__container container-login">

         <div class="container-login__image login__image">
            <img class="login__image--edit" src="../public/../public/images/illustration/Login-amico.png" alt="">
         </div>

         <div class="container-login__forms login-form">
            <div class="login-form__header header">
               <div class="header__logo">
                  <img class="header__logo--edit" src="../public/images/logo/castro-techno-logo.png" alt="">
               </div>

               <div class="login-form__header-text hdr-texts">
                  <div>
                     <h4 class="hdr-texts--ctu">Castro Technological University</h4>
                  </div>
                  <div>
                     <h4 class="hdr-texts--location">Compostela Campus, Cebu</h4>
                  </div>
               </div>
            </div>

            <form class="login-form__container fr-element" action="../../controller/php/loginValidation.php" method="post">
               <div>
                  <div>
                     <label class="fr-element__lbl" for="">Username:</label>
                  </div>
                  <div>
                     <input class="fr-element__input" type="text" name="username" id="username" placeholder="Username">
                  </div>
               </div>
               <div>
                  <div>
                     <label class="fr-element__lbl" for="">Password:</label>
                  </div>
                  <div>
                     <input class="fr-element__input" type="text" name="password" id="password" placeholder="Password">
                  </div>
               </div>
               <div>
                  <input class="fr-element__input fr-elmnt--btn" type="submit" name="submit" id="submit" value="Login">
               </div>
            </form>
         </div>
      </section>
   </main>
</body>

</html>