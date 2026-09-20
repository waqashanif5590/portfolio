<?php
require_once __DIR__ . '/../../config/database.php';
$title = 'Services';
$styles = ['services.css', 'serviceMobile.css'];
ob_start();
?>

    <!-- Services Section -->
    <div id="service_section">
        <h1 data-aos="fade-up">Services</h1>
        <!-- Services as a web developer -->
        <p data-aos="fade-up" data-aos-delay="300">We provide web development services including HTML, CSS, JavaScript, PHP, Laravel, Mysql
            and more.</p>
        <div class="services_container">
            <div class="service">
                <!-- take image online that is related to the service -->
                <img data-aos="zoom-in" src="<?= $baseUrl ?>/assets/images/blog.jpg" alt="Web Development">
                <h1 data-aos="fade-up" class="child">Blogg Websites</h1>
                <p data-aos="fade-up" data-aos-delay="300" class="child">Blog websites for sharing knowledge and experiences.</p>
            </div>
            <div class="service">
                <img data-aos="zoom-in" src="<?= $baseUrl ?>/assets/images/business.jpg" alt="Web Development">
                <h1 data-aos="fade-up" class="child">Business Websites</h1>
                <p data-aos="fade-up" data-aos-delay="300" class="child">Websites for businesses to showcase their products and services.</p>
            </div>
            <div class="service">
                <img data-aos="zoom-in" src="<?= $baseUrl ?>/assets/images/gym.jpg" alt="Web Development">
                <h1 data-aos="fade-up" class="child">Gym/Fitness Club Websites</h1>
                <p data-aos="fade-up" data-aos-delay="300" class="child">Websites for fitness centers and gyms to attract new members and promote their services.</p>
            </div>
            <div class="service">
                <img data-aos="zoom-in" src="<?= $baseUrl ?>/assets/images/lms.jpg" alt="Web Development">
                <h1 data-aos="fade-up" class="child">LMS Portals</h1>
                <p data-aos="fade-up" data-aos-delay="300" class="child">Learning management systems for educational institutions and training programs.</p>
            </div>
            <div class="service">
                <img data-aos="zoom-in" src="<?= $baseUrl ?>/assets/images/portfolio_temple.jpg" alt="Web Development">
                <h1 data-aos="fade-up" class="child">Portfolio Websites</h1>
                <p data-aos="fade-up" data-aos-delay="300" class="child">Showcase your work and skills with a portfolio website.</p>
            </div>
            <div class="service">
                <img data-aos="zoom-in" src="<?= $baseUrl ?>/assets/images/ecommerce.jpg" alt="Web Development">
                <h1 data-aos="fade-up" class="child">E-Commerce Websites</h1>
                <p data-aos="fade-up" data-aos-delay="300" class="child">Online stores for selling products and services to customers.</p>
            </div>
            <div class="service">
                <img data-aos="zoom-in" src="<?= $baseUrl ?>/assets/images/resturent.jpg" alt="Web Development">
                <h1 data-aos="fade-up" class="child">Restaurant Websites</h1>
                <p data-aos="fade-up" data-aos-delay="300" class="child">Websites for restaurants to showcase their menu, location, and services.</p>
            </div>
            <div class="service">
                <img data-aos="zoom-in" src="<?= $baseUrl ?>/assets/images/real-estate.jpg" alt="Web Development">
                <h1 data-aos="fade-up" class="child">Real Estate Websites</h1>
                <p data-aos="fade-up" data-aos-delay="300" class="child">Websites for real estate agents and agencies to list properties and attract buyers.</p>
            </div>
            <div class="service">
                <img src="<?= $baseUrl ?>/assets/images/business.jpg" alt="Web Development">
                <h1 data-aos="fade-up" class="child">Other Services</h1>
                <p data-aos="fade-up" data-aos-delay="300" class="child">Additional web development services to meet your specific needs.</p>
            </div>

        </div>
    </div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../../layouts/app.php';