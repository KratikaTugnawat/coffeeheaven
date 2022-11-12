<?php

$db_name = 'mysql:host=localhost:3306;dbname=contact_db';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $guests = $_POST['guests'];
   $guests = filter_var($guests, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND number = ? AND guests = ?");
   $select_contact->execute([$name, $number, $guests]);

   if($select_contact->rowCount() > 0){
      $message[] = 'message sent already!';
   }else{
      $insert_contact = $conn->prepare("INSERT INTO `contact_form`(name, number, guests) VALUES(?,?,?)");
      $insert_contact->execute([$name, $number, $guests]);
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  <link rel="stylesheet" href="style.css">
  <title>Coffee Heaven</title>


</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" 
      
      style="background-color: var(--main-color);
      padding: 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1.5rem;">

         <span style="color: var(--white);
         font-size: 2rem;">'.$message.'</span>

         <i class="fas fa-times" 

         style="font-size: 2.5rem;
         color: var(--white);
         cursor: pointer;" 

         onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

  
<header class="header">
  <section class="flex">
    <a href="#home" id="home" class="logo"><img src="images/logo.png" alt=""></a>
    <nav class="navbar">
      <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#menu">Menu</a>
      <a href="#gallery">Gallery</a>
      <a href="#team">Team</a>
      <a href="#contact">Contact</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

  </section>
</header>

<div class="home-bg">

   <section class="home" id="home">

      <div class="content">

         <h3>coffee heaven</h3>

         <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut officia, accusantium mollitia laudantium dolorum dolore.</p>

         <a href="#about" class="btn" >about us</a>
         
      </div>

   </section>

</div>


<section class="about" id="about" style=" 
display: flex;
   align-items: center;  
   gap:4rem;">


<div class="image" style="flex:1 1 40rem;">

  <img src="images/about-img.svg" alt="" style="width: 100%;">

</div>

<div class="content" style="padding:1rem 0;
line-height:2;
color: var(--light-color);
font-size:1.7rem;">


  <h3 style="  font-size: 2.5rem;
   color:var(--black);
   font-family: 'Merienda One', cursive;
   padding-bottom: 1rem;">
   A cup of coffee can complete your day</h3>


  <p style="padding:1rem 0;
   line-height: 2;
   color:var(--light-color);
   font-size: 1.5rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque quasi voluptatibus id saepe non, voluptatem veritatis! Possimus sapiente minus commodi!
  </p>


  <a href="#about" 
         onMouseOver="this.style.background='black'"
        onMouseOut="this.style.background='var(--main-color)'"
         class="btn" 
         style=" display: inline-block;
    margin-top: 1rem;
    background-color: var(--main-color);
    cursor: pointer;
    color:var(--white);
    font-size: 1.8rem;
    padding:.5rem 2rem;
    border-radius: 10px">Our menu</a>


</div>
</section>

<section class="facility">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>our facility</h3>
   </div>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>varieties of coffees</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, adipisci!</p>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>coffee beans</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, adipisci!</p>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>breakfast and sweets</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, adipisci!</p>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>read to go coffee</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, adipisci!</p>
      </div>

   </div>

</section>

<section class="menu" id="menu">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>popular menu</h3>
   </div>

   <div class="box-container">

      <div class="box">
         <img src="images/menu-1.png" alt="">
         <h3>love you coffee</h3>
      </div>

      <div class="box">
         <img src="images/menu-2.png" alt="">
         <h3>Cappuccino</h3>
      </div>

      <div class="box">
         <img src="images/menu-3.png" alt="">
         <h3>Mocha coffee</h3>
      </div>

      <div class="box">
         <img src="images/menu-4.png" alt="">
         <h3>Frappuccino</h3>
      </div>

      <div class="box">
         <img src="images/menu-5.png" alt="">
         <h3>black coffee</h3>
      </div>

      <div class="box">
         <img src="images/menu-6.png" alt="">
         <h3>love heart coffee</h3>
      </div>

   </div>

</section>

<section class="gallery" id="gallery">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>our gallery</h3>
   </div>

   <div class="box-container">
      <img src="images/gallery-1.webp" alt="">
      <img src="images/gallery-2.webp" alt="">
      <img src="images/gallery-3.webp" alt="">
      <img src="images/gallery-4.webp" alt="">
      <img src="images/gallery-5.webp" alt="">
      <img src="images/gallery-6.webp" alt="">
   </div>

</section>

<section class="team" id="team">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>our team</h3>
   </div>

   <div class="box-container">

      <div class="box">
         <img src="images/our-team-1.jpg" alt="">
         <h3>john deo</h3>
      </div>
      <div class="box">
         <img src="images/our-team-2.jpg" alt="">
         <h3>john deo</h3>
      </div>
      <div class="box">
         <img src="images/our-team-3.jpg" alt="">
         <h3>john deo</h3>
      </div>
      <div class="box">
         <img src="images/our-team-4.jpg" alt="">
         <h3>john deo</h3>
      </div>
      <div class="box">
         <img src="images/our-team-5.jpg" alt="">
         <h3>john deo</h3>
      </div>
      <div class="box">
         <img src="images/our-team-6.jpg" alt="">
         <h3>john deo</h3>
      </div>

   </div>

</section>

<section class="contact" id="contact">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>contact us</h3>
   </div>

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>

      <form action="" method="post">

         <h3>book a table</h3>

         <input type="text" name="name" required class="box" maxlength="20" placeholder="enter your name">

         <input type="number" name="number" required class="box" maxlength="20" placeholder="enter your number" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false">

         <input type="number" name="guests" required class="box" maxlength="20" placeholder="how many guests" min="0" max="99" onkeypress="if(this.value.length == 2) return false">

         <input type="submit" name="send" value="send message" class="btn">

      </form>

   </div>

</section>

<section class="footer">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>our email</h3>
         <p>kunalgurjarkg786@gmail.com</p>
         <p>kratikatugnawat7@gmail.com</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>07:00am to 09:00pm</p>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>shop location</h3>
         <p>Indore, india - 452010</p>
      </div>

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>our numbers</h3>
         <p>+750-906-6979</p>
         <p>+957-507-3619</p>
      </div>

   </div>

   <div class="credit"> &copy; copyright @ <?= date('Y'); ?> by <span>mr. Kunal Gurjar and Miss. Kratika Tugnawat</span> | all rights reserved! </div>

</section>

<script src="script.js"></script>
</body>
</html>