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
    }

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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
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
        <a href="#home" class="logo">Portfolio</a>
        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#portfolio">Portfolio</a>
            <a href="#contact">Contact</a>
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
        <div class="image" data-aos="fade-right">
            <img src="images/mimic4.jpg" alt="Gio Majadas">
        </div>
        <div class="content">
            <h3 data-aos="fade-up">Hi, I am Gio Majadas</h3>
            <span data-aos="fade-up">2nd Year BSIT-SD Student</span>
            <p data-aos="fade-up">Nag-aaral sa LU bilang BSIT tapos 2nd Year na. May balak pa sanang magtransfer sa PHINMA Rizal College of Laguna kase maangas uniform duon kaso ayaw ko kase ayaw ko lang.</p>
            <a data-aos="fade-up" href="#about" class="btn">About Me</a>
        </div>
    </section>
    <!-- About Section -->
    <section class="about" id="about">
        <h1 class="heading" data-aos="fade-up"> <span>About Me</span> </h1>
        <div class="biography">
            <p data-aos="fade-up">Pinanganak sa bahay (sayang hindi sa ospital pinanganak para premium yung dating). Dadagdagan pa yan. Saka krass ko po yung BS ata yon o BA Psych?? basta gondo ni ate gorl, edi don't u gagoing me?</p>
            <div class="bio">
                <h3 data-aos="zoom-in"> <span>Name: </span> Gio Majadas </h3>
                <h3 data-aos="zoom-in"> <span>Email: </span> giomjds@gmail.com </h3>
                <h3 data-aos="zoom-in"> <span>Address: </span> Manila, Philippines </h3>
                <h3 data-aos="zoom-in"> <span>Phone: </span> +63 920 212 9617 </h3>
                <h3 data-aos="zoom-in"> <span>Age: </span> 21 years old </h3>
                <h3 data-aos="zoom-in"> <span>Experience: </span> 2nd Year BSIT-SD Student @ Laguna University </h3>
            </div>
            <a href="#" class="btn" data-aos="fade-up">Download CV</a>
        </div>
        <div class="skills" data-aos="fade-up">
            <h1 class="heading"> <span>Skills</span> </h1>
            <div class="progress">
                <div class="bar" data-aos="fade-left"> <h3><span>HTML</span> <span>87%</span></h3> </div>
                <div class="bar" data-aos="fade-right"> <h3><span>CSS</span> <span>79%</span></h3> </div>
                <div class="bar" data-aos="fade-left"> <h3><span>JavaScript</span> <span>66%</span></h3> </div>
                <div class="bar" data-aos="fade-right"> <h3><span>SQL</span> <span>61%</span></h3> </div>
                <div class="bar" data-aos="fade-left"> <h3><span>PHP</span> <span>70%</span></h3> </div>
                <div class="bar" data-aos="fade-right"> <h3><span>C</span> <span>78%</span></h3> </div>
                <div class="bar" data-aos="fade-left"> <h3><span>C++</span> <span>93%</span></h3> </div>
                <div class="bar" data-aos="fade-right"> <h3><span>C#</span> <span>67%</span></h3> </div>
                <div class="bar" data-aos="fade-left"> <h3><span>Visual Basic .NET</span> <span>74%</span></h3> </div>
                <div class="bar" data-aos="fade-right"> <h3><span>GitHub</span> <span>76%</span></h3> </div>
            </div>
        </div>
        <div class="edu-exp">
            <h1 class="heading" data-aos="fade-up"> <span>Education & Experience</span> </h1>
            <div class="row">
                <div class="box-container">
                    <h3 class="title" data-aos="fade-right">Education</h3>
                    <div class="box" data-aos="fade-right">
                        <span>( 2015 - 2019 )</span>
                        <h3>Junior High School</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit hic vero nulla laudantium autem facere commodi voluptatibus inventore praesentium, id repudiandae eaque quis itaque eligendi velit.</p>
                    </div>
                    <div class="box" data-aos="fade-right">
                        <span>( 2019 - 2021 )</span>
                        <h3>Senior High School</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit hic vero nulla laudantium autem facere commodi voluptatibus inventore praesentium, id repudiandae eaque quis itaque eligendi velit.</p>
                    </div>
                    <div class="box" data-aos="fade-right">
                        <span>( 2023 - Current )</span>
                        <h3>College</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit hic vero nulla laudantium autem facere commodi voluptatibus inventore praesentium, id repudiandae eaque quis itaque eligendi velit.</p>
                    </div>
                </div>
                <div class="box-container">
                    <h3 class="title" data-aos="fade-left">Experience</h3>
                    <div class="box" data-aos="fade-left">
                        <span>( 2019 - 2020 )</span>
                        <h3>Front-End Developer</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit hic vero nulla laudantium autem facere commodi voluptatibus inventore praesentium, id repudiandae eaque quis itaque eligendi velit.</p>
                    </div>
                    <div class="box" data-aos="fade-left">
                        <span>( 2020 - 2021 )</span>
                        <h3>Back-End Developer</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit hic vero nulla laudantium autem facere commodi voluptatibus inventore praesentium, id repudiandae eaque quis itaque eligendi velit.</p>
                    </div>
                    <div class="box" data-aos="fade-left">
                        <span>( 2021 - 2022 )</span>
                        <h3>Full-Stack Developer</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit hic vero nulla laudantium autem facere commodi voluptatibus inventore praesentium, id repudiandae eaque quis itaque eligendi velit.</p>
                    </div>
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
                <h3>Web Development</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto vel obcaecati voluptatibus nam, laboriosam est quis delectus.</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-paint-brush"></i>
                <h3>UI/UX Designer</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto vel obcaecati voluptatibus nam, laboriosam est quis delectus.</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fab fa-github"></i>
                <h3>Git & GitHub</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto vel obcaecati voluptatibus nam, laboriosam est quis delectus.</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-chart-line"></i>
                <h3>Data Analyst</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto vel obcaecati voluptatibus nam, laboriosam est quis delectus.</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-bullhorn"></i>
                <h3>Digital Marketing</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto vel obcaecati voluptatibus nam, laboriosam est quis delectus.</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fab fa-wordpress"></i>
                <h3>Wordpress</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto vel obcaecati voluptatibus nam, laboriosam est quis delectus.</p>
            </div>
        </div>
    </section>
    <!-- Portfolio Section -->
    <section class="portfolio" id="portfolio">
        <h1 class="heading" data-aos="fade-up"> <span>Portfolio</span> </h1>
        <div class="box-container">
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
        <form action="" method="post">
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
                <p>+63 920 212 9617</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-envelope"></i>
                <h3>Email</h3>
                <p>giomjds@gmail.com</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Address</h3>
                <p>Manila, Philippines</p>
            </div>
        </div>
    </section>
    <div class="credit"> &copy;: <?php echo date('Y'); ?> by <span>Gio Majadas</span></div>
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