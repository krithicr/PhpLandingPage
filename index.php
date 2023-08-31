<?php 
$nameErr = $emailErr = $contactError = "";
$name = $email = $contact = $message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST['name'];
        if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
            $nameErr = "Only Alphabets and White space are allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = htmlspecialchars(trim($_POST['email']));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid Email Format";
        }
    }
    if (empty($_POST["contact"])) {
        $contactError = "Contact is required";
    } else {
        $contact = trim($_POST['contact']);
        if (!preg_match("/^[0-9]*$/", $contact)) {
            $contactError = "Enter a valid Contact Number";
         } 
    }
    if ($nameErr == "" && $emailErr == "" && $contactError == "") {
        header("Location: thankyou.php");
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTech Home Energy Audit</title>
   
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="app">

    
   <?php include("header.php"); ?>

    <section id="why_choose_ecotech">
        
        <div class="image">
            <img src="./images/Technology-Pros-Cons-Big.jpg" alt="">
        </div>
        <div class="content">
            <h2>Why Choose EcoTech</h2>
             <ul>
                   <li>Cutting-Edge Technology: We use the latest in energy audit tools.</li>
                   <li>Experienced Auditors: Our team of experts is passionate about sustainability.</li>
                   <li>Comprehensive Reports: You'll receive a detailed analysis with actionable steps.</li>
             </ul>
        </div>
        
        
    </section>

   

    <section id="benefits_features">
      
        <div class="content_features">
            <h2>Benefits and Features</h2>
            <ul>
                <li>Expert Analysis: Our team of experts is passionate about sustainability.</li>
                <li>Tailored Recommendations: Receive a personalized energy-saving plan for your home.</li>
                <li>Comprehensive Reports: You'll receive a detailed analysis with actionable steps.</li>
            </ul>
        </div>
        <div class="image_house">
        <img src="./images/house-6481809_1280-transformed.png" alt="">
        </div>
        
    </section>

    <!-- <section id="testimonials">
        Testimonials carousel
        <h2>What Our Customers Say</h2>
        <div class="testimonial">
            <img src="user1-avatar.jpg" alt="User 1">
            <p>"SmartFit has helped me stay on top of my fitness game!" - Lisa S.</p>
        </div>
        <div class="testimonial">
            <img src="user2-avatar.jpg" alt="User 2">
            <p>"The sleep tracking feature is a game-changer for my health!" - Mark T.</p>
        </div>
    </section> -->

   

    <section id="cta">
        <div class="ctaContent">
            <h2>Get Your Energy Audit Today</h2>
            <p>Book your EcoTech Home Energy Audit now and start saving both energy and money!</p>
        </div>
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  id="form" onsubmit="return validateForm()">
            <div class="name_box">
                <input id="name" type="text" name="name" placeholder="Name" autocomplete="off">
                <p id="alert_name"></p>
            </div>
            <div class="email_box">
                <input id="email" type="text" name="email" placeholder="Email">
                <p id="alert_email"></p></div>
            <div class="contact_box">
                <input id="contact" type="text" name="contact" placeholder="Contact Number" minlength="1" maxlength="10" >
                <p id="alert_contact"></p>
            </div>
                
                
                <textarea name="message" id="" placeholder="Questions And Feedbacks" rows="3" cols="20" maxlength="80"></textarea>
                <button id="submit" type="submit">Book Now</button>
        </form>
          
        
            
        
    </section>



    <?php include("footer.php")?>
    </div>
      <script>
           window.history.forward();
            function noBack() {
            window.history.forward();
        }
        function validateForm() {
            
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var contact = document.getElementById("contact").value;
            
            var nameErr = "";
            var emailErr = "";
            var contactErr = "";

            if (name === "") {
                nameErr = "Name is required";
            } else if (!/^[a-zA-Z\s]*$/.test(name)) {
                nameErr = "Only Alphabets and White space are allowed";
            }

            if (email === "") {
                emailErr = "Email is required";
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                emailErr = "Invalid Email Format";
            }

            if (contact === "") {
                contactErr = "Contact is required";
            } else if (!/^[0-9]*$/.test(contact) || contact.length !== 10) {
                contactErr = "Enter a valid Contact Number";
            }

            document.getElementById("alert_name").textContent = nameErr;
            document.getElementById("alert_email").textContent = emailErr;
            document.getElementById("alert_contact").textContent = contactErr;

        

            if (nameErr === "" && emailErr === "" && contactErr === "") {
                name ="";
                email = "";
                contact ="";
                return true; 
            } else {
                return false; 
            }
        }
    </script>
</body>

</html>