<?php
$nameErr = $emailErr = $contactError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["alert_name_value"])) {
        $nameErr = "";
    }
    if (empty($_POST["alert_email_value"])) {
        $emailErr = "";
    }
    if (empty($_POST["alert_contact_value"])) {
        $contactError = "";
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
                <h2 class="content_heading">Why Choose EcoTech</h2>
                <ul>
                    <li>Cutting-Edge Technology: We use the latest in energy audit tools.</li>
                    <li>Experienced Auditors: Our team of experts is passionate about sustainability.</li>
                    <li>Comprehensive Reports: You'll receive a detailed analysis with actionable steps.</li>
                </ul>
            </div>

        </section>



        <section id="benefits_features">
            <div class="content">
                <h2 class="content_heading">Benefits and Features</h2>
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

        <section id="testimonials_section">
            <div class="testimonial_heading">
                <h2>What Our Customers Say</h2>
            </div>

            <div class="testimonials">
                <div class="testimonial">
                    <div class="testimonial_image">
                        <img src="./images/person_1-transformed.png" alt="User 1">
                    </div>
                    <div class="testimonial_content">
                        <p>"The EcoTech team is outstanding. Their recommendations were spot-on, and I've noticed a significant drop in my energy bills!" - Michael P.</p>
                    </div>

                </div>
                <div class="testimonial">
                    <div class="testimonial_image">
                        <img src="./images/person_2-transformed.png" alt="User 1">
                    </div>
                    <div class="testimonial_content">
                        <p>"I'm thrilled with the results of EcoTech's energy audit. My home is now more energy-efficient than ever!" - Sarah M.</p>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="testimonial_image">
                        <img src="./images/person_3-transformed.png" alt="User 1">
                    </div>
                    <div class="testimonial_content">
                        <p>"EcoTech's energy audit services have transformed my home's energy consumption. I'm saving both money and the environment!" - John D.</p>
                    </div>

                </div>

            </div>


        </section>

        <section id="cta">
            <div class="ctaContent">
                <h2>Get Your Energy Audit Today</h2>
                <p>Book your EcoTech Home Energy Audit now and start saving both energy and money!</p>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="form" onsubmit="return validateForm()">
                <div class="name_box">
                    <input id="name" type="text" name="name" placeholder="Name" autocomplete="off" />
                    <p id="alert_name"></p>
                    <input type="text" name="alert_name_value" id="alert_name_value">
                </div>
                <div class="email_box">
                    <input id="email" type="text" name="email" placeholder="Email" />
                    <p id="alert_email"></p>
                    <input type="text" name="alert_email_value" id="alert_email_value">
                </div>
                <div class="contact_box">
                    <input id="contact" type="text" name="contact" placeholder="Contact Number" minlength="1" maxlength="10" />
                    <p id="alert_contact"></p>
                    <input type="text" name="alert_contact_value" id="alert_contact_value">
                </div>


                <textarea name="message" id="" placeholder="Questions And Feedbacks" rows="3" cols="20" maxlength="80"></textarea>
                <button id="submit" type="submit">Book Now</button>
            </form>




        </section>



        <?php include("footer.php") ?>
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

            document.getElementById("alert_name_value").style.
            document.getElementById("alert_name_value").style.display = "none";

            var alert_name_input = document.getElementById("alert_name").textContent;
            document.getElementById("alert_name_value").value = alert_name_input;



            if (nameErr === "" && emailErr === "" && contactErr === "") {
                name = "";
                email = "";
                contact = "";
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>