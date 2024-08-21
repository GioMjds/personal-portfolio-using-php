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

        unset($_POST['send']);
        
        echo '<script>window.history.replaceState({}, "", window.location.href);</script>';
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
        <div class="image" data-aos="fade-right">
            <img src="images/mimic4.jpg" alt="Gio Majadas">
        </div>
        <div class="content">
            <h3 data-aos="fade-up">Hi, I am Gio Majadas</h3>
            <span data-aos="fade-up">2nd Year BSIT-SD Student</span>
            <p data-aos="fade-up">A 2nd Year BS Information Technology student striving an expertise and experiences in the field of IT</p>
            <a data-aos="fade-up" href="#about" class="btn">About Me</a>
        </div>
    </section>
    <!-- About Section -->
    <section class="about" id="about">
        <h1 class="heading" data-aos="fade-up"> <span>About Me</span> </h1>
        <div class="biography">
            <p data-aos="fade-up">Hello! I'm Gio Majadas, an IT student particularly interested in making innovations and pontifications about technology. I am currently finishing my degree in Bachelor of Science in Information Technology at Laguna University.</p>
            <p data-aos="fade-up">I have a strong background in database administration, UI/UX design, and frontend development. My interest in how things work inside technology started with what applications and web infrastructure are really made of. With time, I managed to build upon these skills, learning HTML, CSS, JavaScript, and PHP, among others in programming languages, inclusive of Python, C, C++, C#, VB.NET, and SQL.</p>
            <p data-aos="fade-up">Along with my technical experience, I am also innately inquisitive and able to solve problems—a lifelong learner. I always yearn for improvement in all I do, whether it's creating an aesthetically appealing application online, network protection, or radical problem debugging.</p>
            <p data-aos="fade-up">As rarely as I am not immersed with code, when not working, you would catch me studying at will or from time to time indulging in online games, having entirely geared my effort toward IT sector development.</p>
            <div class="bio">
                <h3 data-aos="zoom-in"> <span>Name: </span> Gio Majadas <i class="fa-solid fa-mars"></i></h3>
                <h3 data-aos="zoom-in"> <span>Email: </span> giomjds@gmail.com </h3>
                <h3 data-aos="zoom-in"> <span>Address: </span> Manila, Philippines </h3>
                <h3 data-aos="zoom-in"> <span>Phone: </span> +63 920 212 9617 </h3>
                <h3 data-aos="zoom-in"> <span>Age: </span> 21 years old </h3>
                <h3 data-aos="zoom-in"> <span>Experience: </span> 2nd Year BSIT-SD Student @ Laguna University </h3>
            </div>
            <a href="Gio Majadas (Resume).pdf" class="btn" data-aos="fade-up">Download CV</a>
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
                    <h3 class="title" data-aos="fade-left">Education</h3>
                    <div class="box" data-aos="fade-right">
                        <span>Elementary ( 2010 - 2015 )</span>
                        <h3>Dayap Elementary School - Annex</h3>
                        <p>Elementary school life was a vivid combination of curiosity and adventure: every day, something new was learned. One learned starting from elementary physics and arithmetic principles to the first letter combinations in writing. Even in shared crayons and recess activities, friendships were initiated inside the four walls of a class. This is what I did those years through: focused on creating in myself a sense of wonder for everything that was unfolding around me and on mastering the basic abilities that would help me become successful.</p>
                    </div>
                    <div class="box" data-aos="fade-left">
                        <span>Junior High School ( 2015 - 2019 )</span>
                        <h3>Dayap National High School - Main</h3>
                        <p>A greater amount of independence and self-discovery began with the move to junior high school. Innumerable amounts of time were used up by the opportunity to study a lot of new topics in depth, whether this was exploring technology on the one hand or delving into literature and history on the other. Another aspect was that social dynamics changed with the newly gained friendship and involvement in extracurricular activities. For the past, I have been forming my self-identity, learning about my interests and developed strengths, and setting a base for my future goals.</p>
                    </div>
                    <div class="box" data-aos="fade-right">
                        <span>Senior High School ( 2019 - 2021 )</span>
                        <h3>Luzonian School of Excellence in Science and Technology</h3>
                        <p>Senior high school certainly turned out to be a real defining period. The emphasis on the development of intellect and the self grew. I began attending more advanced classes and technology groups while taking my future as an IT seriously. The pressure of doing well in studies was balanced with the exhilaration of discovering new opportunities that put me into the professional world, such as internships and projects. These, coupled with the enhancement of my technical skills, have been endowed with an umpteen number of lessons in tenacity, teamwork, and time management.</p>
                    </div>
                    <div class="box" data-aos="fade-left">
                        <span>College ( 2023 - Current )</span>
                        <h3>Laguna University</h3>
                        <p>The most memorable phase in my life is my undergraduate years, when centre stage was taken by information technology. They enrolled me in courses on programming, database administration, network security, and cloud computing to make me an expert in domains such as mine. Students gain necessary practical experience through internships, group projects, and hands-on laboratories within the teaching of how to tackle technical problems. Their involvement in tech clubs and participation in coding competitions helped in the enhancement of their technical skills, group work, communication, and degree of technological awareness. The aim at college was not to learn only the technical skills but to become a full, all-rounded IT professional equipped to handle all kinds of problems and challenges in the fast-moving industry.</p>
                    </div>
                </div>
                <div class="box-container">
                    <h3 class="title" data-aos="fade-right">Experience</h3>
                    <div class="box" data-aos="fade-left">
                        <span>( 2023 - Current )</span>
                        <h3>Teaching Coding / Programming Basics</h3>
                        <p>In this position, I planned individual lessons and provided breakdowns of tricky subjects while adjusting teaching methods according to different learning styles as a tutor for the basics of information technology with a focus on coding and programming. This work has improved my ability to explain technical concepts as simply and concisely as possible and is now being used in IT environments when explaining technical information to clients, colleagues, and end-users. Additionally, tutoring has provided a foundation for augmenting my patience and empathy, and the two now exist simultaneously when working to assist others with technology issues.</p>
                    </div>
                    <div class="box" data-aos="fade-right">
                        <span>( 2023 - Current )</span>
                        <h3>Leadership Roles</h3>
                        <p>I have been able to undertake and execute such activities and projects in my leadership role in a tech club. This improved my ability to delegate tasks and make sure they were done on time and through effective planning. Furthermore, I now have experience with leading and motivating a group of colleagues in a way that stimulates creativity and teamwork. Project management and team leadership are inbuilt parts of the delivery of successful technology solutions in the IT industry, for which these skills become quite essential.</p>
                    </div>
                    <div class="box" data-aos="fade-left">
                        <span>( 2021 - 2022 )</span>
                        <h3>Customer Service</h3>
                        <p>In order to obtain an added skill in terms of tuning my communication and problem-solving skills when working as a customer service representative, I was very comprehensively equipped with how to handle people with different levels of technical expertise. My role was to help the clients in solving problems every day, that would in many ways involve diagnosing software and making technical answers as clear as possible. My job has enabled me to learn two major traits: patience and adaptability, both vital in handling IT technical challenges.</p>
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
                <h3>Front-End Development</h3>
                <p>Building responsive, interactive websites using HTML, CSS, and JavaScript, and popular frameworks like React or Angular.</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-paint-brush"></i>
                <h3>UI/UX Designer</h3>
                <p>Crafting intuitive and visually stunning interfaces that simplify complex interactions and elevate brand identities.</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fab fa-github"></i>
                <h3>Git & GitHub</h3>
                <p>Streamlining development workflows and ensuring seamless collaboration through expert Git and GitHub management.</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-database"></i>
                <h3>Database Management</h3>
                <p>Designing, implementing, and optimizing high-performance databases that ensure data integrity, security, and scalability.</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-bullhorn"></i>
                <h3>Digital Marketing</h3>
                <p>Developing and executing targeted digital marketing strategies that drive brand awareness, engagement, and conversions.</p>
            </div>
            <div class="box" data-aos="zoom-in">
                <i class="fas fa-server"></i>
                <h3>Server-side Development</h3>
                <p>Designing and implementing robust, scalable, and secure server-side architectures that power fast and reliable web applications.</p>
            </div>
        </div>
    </section>
    <!-- Portfolio Section -->
    <section class="portfolio" id="portfolio">
        <h1 class="heading" data-aos="fade-up"> <span>Projects</span> </h1>
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
    <div class="credit"> &copy; <?php echo date('Y'); ?>    <span>Gio Majadas</span></div>
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