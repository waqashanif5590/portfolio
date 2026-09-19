<?php
$title = 'Home';
$styles = ['about.css', 'resume.css', 'contact.css', 'services.css', 'portfolio.css', 'styleMobile.css'];
ob_start();

require_once __DIR__ . '/config/database.php';
?>


<section id="landing_section">
    <div class="landing_content">
        <h1 data-aos="fade-up">Welcome to my Portfolio</h1>
        <p data-aos="fade-up" data-aos-delay="0">I'm Muhammad Waqas Hanif and I'm a professional Full Stack
            Developer from Pakistan.</p>
        <div class="learn-more">
            <p data-aos="fade-up" data-aos-delay="0">Click to Learn more</p>
            <a data-aos="fade-down" data-aos-delay="0" href="/portfolio/pages/php/about.php">About Me</a>
        </div>

    </div>

</section>

<!-- about section -->
<section id="about_section">
    <h1 data-aos="fade-up">About Me</h1>
    <p data-aos="fade-up" data-aos-delay="0">I'm Muhammad Waqas Hanif, a professional Full Stack Developer from
        Pakistan.</p>

    <div class="details">
        <div data-aos="zoom-in" class="image_container">
            <img src="/portfolio/assets/images/profile.jpeg" alt="">
        </div>

        <div class="details_container">
            <h1 data-aos="fade-up">PHP and Laravel Full Stack Developer</h1>
            <p data-aos="fade-down" data-aos-delay="0">I specialize in creating user-friendly and visually
                appealing interfaces for mobiles and web
                applications while also being proficient
                in backend development.</p>
            <div class="personal_details">
                <div class="part_1 details_same">
                    <p data-aos="fade-up" data-aos-delay="0"><strong>Name:</strong> Muhammad Waqas Hanif</p>
                    <p data-aos="fade-up" data-aos-delay="0"><strong>Email:</strong> <a href="mailto:waqashanif5590@gmail.com">waqashanif5590@gmail.com</a></p>
                    <p data-aos="fade-up" data-aos-delay="0"><strong>Phone:</strong> +92 3485990122</p>
                    <p data-aos="fade-up" data-aos-delay="0"><strong>LinkedIn:</strong> <a href="https://www.linkedin.com/in/waqas-hanif-023238437" target="_blank">https://www.linkedin.com/in/waqas-hanif-023238437</a></p>
                    <p data-aos="fade-up" data-aos-delay="0"><strong>Freelance:</strong> Available</p>
                </div>
                <div class="part_2 details_same">
                    <p data-aos="fade-up" data-aos-delay="0"><strong>Age:</strong> 22</p>
                    <p data-aos="fade-up" data-aos-delay="0"><strong>Education:</strong> BS in Computer Science
                    </p>
                    <p data-aos="fade-up" data-aos-delay="0"><strong>Experience:</strong> 5 years</p>
                    <p data-aos="fade-up" data-aos-delay="0"><strong>Location:</strong> Pakistan</p>
                    <p data-aos="fade-up" data-aos-delay="0"><strong>City:</strong> Lahore</p>
                </div>


            </div>
        </div>
    </div>
</section>

<!-- Skills section -->
<section id="skills_section">
    <h1 data-aos="fade-up">Skills</h1>
    <p data-aos="fade-up" data-aos-delay="0">I specialize in building modern, full-stack web applications using
        technologies like HTML, CSS, JavaScript,
        React, Node.js, and MongoDB. From creating responsive user interfaces to developing powerful back-end APIs,
        I enjoy crafting efficient and scalable solutions that solve real-world problems.</p>

    <div class="skills_container">
        <div class="skills_part1 skills_same_part">
            <div class="progress">
                <span class="skill"><span>HTML</span> <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                        aria-valuemax="100" style="width: 100%;"></div>
                </div>
            </div>
            <div class="progress">
                <span class="skill"><span>CSS</span> <i class="val">95%</i></span>
                <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0"
                        aria-valuemax="100" style="width: 95%;"></div>
                </div>
            </div>
            <div class="progress">
                <span class="skill"><span>TailWind CSS</span> <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                        aria-valuemax="100" style="width: 90%;"></div>
                </div>
            </div>
            <div class="progress">
                <span class="skill"><span>JAVASCRIPT</span> <i class="val">80%</i></span>
                <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%;"></div>
                </div>
            </div>
        </div>

        <div class="skills_part2 skills_same_part">
            <div class="progress">
                <span class="skill"><span>PHP</span> <i class="val">85%</i></span>
                <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                        aria-valuemax="100" style="width: 85%;"></div>
                </div>
            </div>
            <div class="progress">
                <span class="skill"><span>MySQL</span> <i class="val">80%</i></span>
                <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                        aria-valuemax="100" style="width: 80%;"></div>
                </div>
            </div>
            <div class="progress">
                <span class="skill"><span>Laravel</span> <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                        aria-valuemax="100" style="width: 75%;"></div>
                </div>
            </div>
            <div class="progress">
                <span class="skill"><span>jQuery</span> <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                        aria-valuemax="100" style="width: 90%;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services section -->
<div id="service_section">
    <h1 data-aos="fade-up">Services</h1>
    <!-- Services as a web developer -->
    <p data-aos="fade-up" data-aos-delay="0">We provide web development services including HTML, CSS, JavaScript, PHP, Laravel, Mysql
        and more.</p>
    <div class="services_container">
        <div class="service">
            <!-- take image online that is related to the service -->
            <img data-aos="zoom-in" src="/portfolio/assets/images/blog.jpg" alt="Web Development">
            <h1 data-aos="fade-up" class="child">Blogg Websites</h1>
            <p data-aos="fade-up" data-aos-delay="0" class="child">Blog websites for sharing knowledge and experiences.</p>
        </div>
        <div class="service">
            <img data-aos="zoom-in" src="/portfolio/assets/images/business.jpg" alt="Web Development">
            <h1 data-aos="fade-up" class="child">Business Websites</h1>
            <p data-aos="fade-up" data-aos-delay="0" class="child">Professional websites for businesses to showcase their products and services.</p>
        </div>
        <div class="service">
            <img data-aos="zoom-in" src="/portfolio/assets/images/gym.jpg" alt="Web Development">
            <h1 data-aos="fade-up" class="child">Gym/Fitness Club Websites</h1>
            <p data-aos="fade-up" data-aos-delay="0" class="child">Websites for fitness centers and gyms to attract new members and promote their services.</p>
        </div>
        <div class="service">
            <img data-aos="zoom-in" src="/portfolio/assets/images/lms.jpg" alt="Web Development">
            <h1 data-aos="fade-up" class="child">LMS Portals</h1>
            <p data-aos="fade-up" data-aos-delay="0" class="child">Learning management systems for educational institutions and training programs.</p>
        </div>
        <div class="service">
            <img data-aos="zoom-in" src="/portfolio/assets/images/portfolio_temple.jpg" alt="Web Development">
            <h1 data-aos="fade-up" class="child">Portfolio Websites</h1>
            <p data-aos="fade-up" data-aos-delay="0" class="child">Showcase your work and skills with a professional portfolio website.</p>
        </div>
        <div class="service">
            <img data-aos="zoom-in" src="/portfolio/assets/images/ecommerce.jpg" alt="Web Development">
            <h1 data-aos="fade-up" class="child">E-Commerce Websites</h1>
            <p data-aos="fade-up" data-aos-delay="0" class="child">Online stores for selling products and services to customers.</p>
        </div>
        <div class="service">
            <img data-aos="zoom-in" src="/portfolio/assets/images/resturent.jpg" alt="Web Development">
            <h1 data-aos="fade-up" class="child">Restaurant Websites</h1>
            <p data-aos="fade-up" data-aos-delay="0" class="child">Websites for restaurants to showcase their menu, location, and services.</p>
        </div>
        <div class="service">
            <img data-aos="zoom-in" src="/portfolio/assets/images/real-estate.jpg" alt="Web Development">
            <h1 data-aos="fade-up" class="child">Real Estate Websites</h1>
            <p data-aos="fade-up" data-aos-delay="0" class="child">Websites for real estate agents and agencies to list properties and attract buyers.</p>
        </div>

    </div>
</div>

<!-- resume section -->
<section id="resume_section">
    <h1 data-aos="fade-up">Resume</h1>
    <div class="education_section">
        <h2 data-aos="fade-up" data-aos-delay="0" class="heading">Education</h2>
        <div class="edu-details-box" data-aos="slide-left">
            <div class="uni-details">
                <h1><i class="fa-solid fa-earth-americas"></i>10-12-2020</h1>
                <h2><i class="fa-solid fa-graduation-cap"></i>ICS (Intermediate in Computer Science)</h2>
                <a href="https://maps.app.goo.gl/DYbKwf9wvecipnNE9" target="_blank"><i
                        class="fa-solid fa-location-dot"></i>Govt College Jhang</a>
                <h3>Jhang, Pakistan</h3>
            </div>

            <div class="description">
                <h1>
                    I completed my intermediate education at Govt College Jhang, where I focused on science
                    subjects. This period helped me build a strong foundation in analytical thinking and
                    problem-solving skills.
                </h1>
            </div>
        </div>
        <div class="edu-details-box" data-aos="slide-right">
            <div class="uni-details">
                <h1><i class="fa-solid fa-earth-americas"></i>10-12-2022</h1>
                <h2><i class="fa-solid fa-graduation-cap"></i>BSC (Bachelor in Computer Science)</h2>
                <a href="https://maps.app.goo.gl/52CCToqmWQW6egXG6" target="_blank"><i
                        class="fa-solid fa-location-dot"></i>Virtual University of Pakistan</a>
                <h3>Lahore, Pakistan</h3>
            </div>

            <div class="description">
                <h1>
                    I completed my Bachelor in Computer Science at the Virtual University of Pakistan, where I
                    gained a comprehensive understanding of computer science principles and practices. This
                    experience has equipped me with the skills necessary to excel in the tech industry.
                </h1>
            </div>
        </div>
        <div class="edu-details-box" data-aos="slide-left">
            <div class="uni-details">
                <h1><i class="fa-solid fa-earth-americas"></i>10-12-2024</h1>
                <h2><i class="fa-solid fa-graduation-cap"></i>Graduation in Computer Science</h2>
                <a href="https://maps.app.goo.gl/52CCToqmWQW6egXG6" target="_blank"><i
                        class="fa-solid fa-location-dot"></i>Virtual University of Pakistan</a>
                <h3>Lahore, Pakistan</h3>
            </div>

            <div class="description">
                <h1>
                    I completed my Graduation degree in Computer Science at the Virtual University of Pakistan,
                    where I deepened my knowledge in advanced computer science topics and honed my practical skills
                    through hands-on projects.
                </h1>
            </div>
        </div>
        <div class="edu-details-box" data-aos="slide-right">
            <div class="uni-details">
                <h1><i class="fa-solid fa-earth-americas"></i>10-12-2025</h1>
                <h2><i class="fa-solid fa-graduation-cap"></i>Diploma in IT</h2>
                <a href="https://maps.app.goo.gl/52CCToqmWQW6egXG6" target="_blank"><i
                        class="fa-solid fa-location-dot"></i>Virtual University of Pakistan</a>
                <h3>Lahore, Pakistan</h3>
            </div>

            <div class="description">
                <h1>
                    I completed my Diploma in IT at the Virtual University of Pakistan, where I focused on practical
                    applications of information technology. This program enhanced my technical expertise and
                    provided hands-on experience with modern IT tools and methodologies.
                </h1>
            </div>
        </div>
    </div>

    <!-- Skills section -->
    <div id="technical_skills_section" class="language-skill-same-class">
        <h2 data-aos="fade-up" class="heading">Professional Skills</h2>
        <div class="skills_container language-skill-same-container" data-aos="fade-up" data-aos-delay="0">
            <h1>
                <div class="bullet"></div> Entrepreneurial Mindset
            </h1>
            <h1>
                <div class="bullet"></div> Adaptability
            </h1>
            <h1>
                <div class="bullet"></div> Problem-Solving
            </h1>
            <h1>
                <div class="bullet"></div> Team Collaboration
            </h1>
            <h1>
                <div class="bullet"></div> Communication Skills
            </h1>
            <h1>
                <div class="bullet"></div> Testing & Debugging
            </h1>
        </div>
    </div>

    <!-- Language section -->
    <div id="language_section" class="language-skill-same-class">
        <h2 class="heading" data-aos="fade-up">Languages</h2>
        <div class="language_container language-skill-same-container" data-aos="fade-up" data-aos-delay="0">
            <h1>
                <div class="bullet"></div> English
            </h1>
            <h1>
                <div class="bullet"></div> Urdu
            </h1>
            <h1>
                <div class="bullet"></div> Punjabi
            </h1>
        </div>

    </div>
</section>
<!-- portfolio section -->
<section id="portfolio_section">
    <h1 data-aos="fade-up">My Portfolio</h1>
    <p data-aos="fade-up" data-aos-delay="0">Here are some of my projects:</p>
    <div class="projects_container">
        <?php
        // Fetch projects from the database
        $stmt = $pdo->query("SELECT p.*, pi.image AS primary_image
            FROM projects p
            LEFT JOIN project_images pi
                ON pi.project_id = p.id AND pi.is_primary = 1
            WHERE p.status = true
            ORDER BY p.created_at DESC");
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($projects as $project) {
            $image_url = $project['primary_image']
                ? '/portfolio/uploads/images/' . htmlspecialchars($project['primary_image'], ENT_QUOTES, 'UTF-8')
                : '/portfolio/assets/images/business.jpg';
            echo '<div class="project">';
            echo '    <div data-aos="fade-up" class="project_image">';
            echo '        <img src="' . $image_url . '" alt="' . htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') . '">';
            echo '    </div>';
            echo '    <div class="project_detail">';
            echo '        <h2 class="project_title" data-aos="fade-up"><a href="/portfolio/pages/php/project-details.php?project=' . rawurlencode($project['slug']) . '">' . htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') . '</a></h2>';
            echo '        <p class="project_description" data-aos="fade-up" data-aos-delay="0">' . $project['short_description'] . '</p>';
            echo '    </div>';
            echo '</div>';
        }
        ?>
    </div>
</section>
<!-- Facts section -->
<section id="facts_section">
    <h1 data-aos="fade-up">Facts</h1>
    <p data-aos="fade-up" data-aos-delay="0">Over the years, we've delivered high-quality digital solutions with a
        strong focus on performance and
        customer satisfaction.</p>

    <div class="facts_container">
        <div class="fact">
            <h1 data-aos="fade-up" data-aos-delay="0">232</h1>
            <p data-aos="zoom-in" data-aos-delay="0">Clients</p>
        </div>
        <div class="fact">
            <h1 data-aos="fade-up" data-aos-delay="0">34</h1>
            <p data-aos="zoom-in" data-aos-delay="0">Projects</p>
        </div>
        <div class="fact">
            <h1 data-aos="fade-up" data-aos-delay="0">976</h1>
            <p data-aos="zoom-in" data-aos-delay="0">Hours of Support</p>
        </div>
        <div class="fact">
            <h1 data-aos="fade-up" data-aos-delay="0">22</h1>
            <p data-aos="zoom-in" data-aos-delay="0">Workers</p>
        </div>
    </div>
</section>


<!-- Contact section -->
<section id="contact_section">
    <h1 data-aos="fade-up">Contact Me</h1>
    <p data-aos="fade-down">If you have any questions or inquiries, feel free to reach out!</p>
    <div class="contact_container">
        <div class="address">
            <div class="location">
                <div class="address_icon">
                    <i data-aos="zoom-in" class="fa-solid fa-location-dot"></i>
                </div>
                <div class="info">
                    <h1 data-aos="fade-up">Address</h1>
                    <p data-aos="fade-up">Jhang, Pakistan</p>
                </div>

            </div>
            <div class="location">
                <div class="address_icon">
                    <i data-aos="zoom-in" class="fa-solid fa-phone"></i>
                </div>
                <div class="info">
                    <h1 data-aos="fade-up">Phone</h1>
                    <p data-aos="fade-down">+92 300 1234567</p>
                </div>

            </div>
            <div class="location">
                <div class="address_icon">
                    <i data-aos="zoom-in" class="fa-solid fa-envelope"></i>
                </div>
                <div class="info">
                    <h1 data-aos="fade-up">Email</h1>
                    <p data-aos="fade-down">example@example.com</p>
                </div>

            </div>

            <!-- Adding map to page -->
            <!-- Place this link as default
                  https://maps.app.goo.gl/VRH46xuCNVqu4jbF6 -->
            <div class="location_map">
                <iframe data-aos="zoom-in"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27209.63262257459!2d72.25365730367454!3d31.26992797933054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919f5e6a2e5b6d7%3A0x8e8a5e6e8e6e8e6e!2sJhang%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1701301234567!5m2!1sen!2s"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="contact_form">
            <form action="" id="form">
                <div class="input_field">
                    <label for="name" data-aos="fade-up">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>


                <div class="input_field">
                    <label for="email" data-aos="fade-up">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input_field">
                    <label for="subject" data-aos="fade-up">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>

                <div class="input_field">
                    <label for="message" data-aos="fade-up">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" id="submit-btn">Send Message</button>
            </form>
        </div>

    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/layouts/app.php';
