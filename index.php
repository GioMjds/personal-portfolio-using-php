<!-- Replace the name of your own database and it's table contents like the name, email, number, and the message -->

<?php
    $conn = mysqli_connect('localhost', 'root', '', 'contact_db') or die('connection failed');

    if (isset($_POST['send'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $msg = mysqli_real_escape_string($conn, $_POST['message']);

        $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

        if (mysqli_num_rows($select_message) > 0) {
            $messagePrompt[] = 'Message Sent Already';
        } else {
            mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('Query Failed');
            $messagePrompt[] = 'Message Sent Successfully';
        }
        
        // Fixing the 'Confirm Form Resubmission' problem in order to stop resending the contact messages in the databases when refreshed
        unset($_POST['send']);
        
        // Every refresh goes to the home section
        echo '<script>window.history.replaceState({}, "", window.location.href);</script>';
    }

    include 'data/data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gio Majadas | Personal Portfolio</title>
    <!-- Font Awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Custom css file link -->
    <link rel="stylesheet" href="style.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <div class="changing-div"></div>
<?php
    if (isset($messagePrompt)) {
        foreach ($messagePrompt as $message) {
            echo '
            <div class="message" data-aos="zoom-out">
                <span>'.$message.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
?>
    <!-- Header Part -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="#home" class="logo">Gio Majadas</a>
        <nav class="navbar">
            <a href="#home" class="active"><span class="fa-solid fa-house"></span> Home</a>
            <a href="#about"><span class="fa-solid fa-address-card"></span> About</a>
            <a href="#services"><span class="fa-solid fa-sliders"></span> Services</a>
            <a href="#portfolio"><span class="fa-solid fa-mountain-sun"></span> Projects</a>
            <a href="#contact"><span class="fa-solid fa-headset"></span> Contact</a>
        </nav>
        <div class="follow">
            <a href="https://www.facebook.com/Mimic.IGN" class="fab fa-facebook-f" target="_blank"></a>
            <a href="https://x.com/IGNmimic" class="fab fa-x-twitter" target="_blank"></a>
            <a href="https://www.instagram.com/giomjds/" class="fab fa-instagram" target="_blank"></a>
            <a href="https://www.linkedin.com/in/giomjds/" class="fab fa-linkedin" target="_blank"></a>
            <a href="https://github.com/GioMjds" class="fab fa-github" target="_blank"></a>
        </div>
    </header>
    <!-- Home Section -->
    <section class="home" id="home">
        <div class="image" data-aos="fade-down">
            <img src="images/mimic4.jpg" alt="Gio Majadas">
        </div>
        <div class="content">
            <h3 data-aos="fade-down">Hi, I am Gio Majadas</h3>
            <span data-aos="fade-down">2nd Year BSIT-SD Student</span>
            <p data-aos="fade-down">A 2nd Year BS Information Technology student striving an expertise and experiences in the field of IT</p>
            <a data-aos="fade-down" href="#about" class="btn">See More</a>
        </div>
    </section>
    <!-- About Section -->
    <section class="about" id="about">
        <h1 class="heading" data-aos="fade-up"> <span>About Me</span> </h1>
        <div class="biography">
            <p data-aos="fade-up"><?= $biography1 ?></p>
            <p data-aos="fade-up"><?= $biography2 ?></p>
            <p data-aos="fade-up"><?= $biography3 ?></p>
            <p data-aos="fade-up"><?= $biography4 ?></p>
            <div class="bio">
                <h3 data-aos="zoom-in"> <span>Email: </span><?= $aboutEmail ?></h3>
                <h3 data-aos="zoom-in"> <span>Address: </span><?= $aboutAddress ?></h3>
                <h3 data-aos="zoom-in"> <span>Phone: </span><?= $aboutPhone ?></h3>
                <h3 data-aos="zoom-in"> <span>Age: </span><?= $aboutAge ?></h3>
                <h3 data-aos="zoom-in"> <span>Experience: </span><?= $aboutExp ?></h3>
            </div>
            <a href="data/Gio Majadas (Resume).pdf" class="btn" target="_blank" data-aos="fade-up">Download CV</a>
        </div>
        <div class="skills" data-aos="fade-up">
            <h1 class="heading"> <span>Skills</span> </h1>
            <div class="progress">
                <?php foreach ($skills as $skill) {?>
                    <div class="bar" data-aos="fade-left">
                        <h3><span> <?= $skill['name']?></span> <?= $skill['percentage'] ?>%</h3>
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="edu-exp">
            <h1 class="heading" data-aos="fade-up"> <span>Education & Experience</span> </h1>
            <div class="row">
                <div class="box-container">
                    <h3 class="title" data-aos="fade-left">Education</h3>
                    <?php foreach($education as $edu) {?>
                        <div class="box" data-aos="fade-left">
                            <span><?= $edu['name_and_year'] ?></span>
                            <h3><?= $edu['school'] ?></h3>
                            <p><?= $edu['description'] ?></p>
                        </div>
                    <?php }?>
                </div>
                <div class="box-container">
                    <h3 class="title" data-aos="fade-right">Experience</h3>
                    <?php foreach($experience as $exp) {?>
                        <div class="box" data-aos="fade-right">
                            <span><?= $exp['year'] ?></span>
                            <h3><?= $exp['work'] ?></h3>
                            <p><?= $exp['description'] ?></p>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section class="services" id="services">
        <h1 class="heading" data-aos="fade-up"> <span>Services</span> </h1>
        <div class="box-container">
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-code"></i>
                <h3><?= $services[0]['name'] ?></h3>
                <p><?= $services[0]['description'] ?></p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-paint-brush"></i>
                <h3><?= $services[1]['name'] ?></h3>
                <p><?= $services[1]['description'] ?></p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fab fa-github"></i>
                <h3><?= $services[2]['name'] ?></h3>
                <p><?= $services[2]['description'] ?></p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-database"></i>
                <h3><?= $services[3]['name'] ?></h3>
                <p><?= $services[3]['description'] ?></p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-bullhorn"></i>
                <h3><?= $services[4]['name'] ?></h3>
                <p><?= $services[4]['description'] ?></p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-server"></i>
                <h3><?= $services[5]['name'] ?></h3>
                <p><?= $services[5]['description'] ?></p>
            </div>
        </div>
    </section>
    <!-- Portfolio Section -->
    <section class="portfolio" id="portfolio">
        <h1 class="heading" data-aos="fade-up"> <span>Projects</span> </h1>
        <div class="box-container">
            <!-- This may vary for school purposes -->
            <div class="box" data-aos="zoom-in">
                <img src="images/a1.jpg" alt="Personal Portfolio">
                <h3>Personal Portfolio</h3>
                <span>( 2023 - 2024 )</span>
            </div>
            <div class="box" data-aos="zoom-in">
                <img src="images/a2.jpg" alt="OpenCV">
                <h3>Python OpenCV</h3>
                <span>( 2023 - 2024 )</span>
            </div>
            <div class="box" data-aos="zoom-in">
                <img src="images/a3.jpg" alt="Responsive Websites">
                <h3>Responsive Websites</h3>
                <span>( 2023 - 2024 )</span>
            </div>
            <div class="box" data-aos="zoom-in">
                <img src="images/a4.jpg" alt="Back End Development">
                <h3>Back End Development</h3>
                <span>( 2023 - 2024 )</span>
            </div>
            <div class="box" data-aos="zoom-in">
                <img src="images/a5.jpg" alt="E-Commerce Websites">
                <h3>E-Commerce Websites</h3>
                <span>( 2023 - 2024 )</span>
            </div>
            <div class="box" data-aos="zoom-in">
                <img src="images/a6.jpg" alt="UI/UX Designer">
                <h3>UI/UX Designer</h3>
                <span>( 2023 - 2024 )</span>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section class="contact" id="contact">
        <h1 class="heading" data-aos="fade-up"> <span>Contact Me</span> </h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="flex">
                <input data-aos="fade-right" type="text" name="name" placeholder="Enter Your Name" class="box" required>
                <input data-aos="fade-left" type="email" name="email" placeholder="Enter Your Email" class="box" required>
            </div>
            <input data-aos="fade-up" type="number" min="0" name="number" placeholder="Enter Your Number" class="box" required>
            <textarea data-aos="fade-up" name="message" class="box" required placeholder="Enter Your Message" cols="30" rows="10"></textarea>
            <input type="submit" data-aos="zoom-in" value="Send Message" name="send" class="btn">
        </form>
        <div class="box-container">
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-phone"></i>
                <h3>Phone</h3>
                <p><?= $contact['phone'] ?></p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-envelope"></i>
                <h3>Email</h3>
                <p><?= $contact['email'] ?></p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Address</h3>
                <p><?= $contact['address'] ?></p>
            </div>
        </div>
    </section>
    <div class="credit"> &copy; <?php echo date('Y'); ?> <span>Gio Majadas</span></div>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- AOS Script -->
    <script>
        AOS.init({
            duration: 800,
            delay: 300
        });
    </script>
</body>
</html>