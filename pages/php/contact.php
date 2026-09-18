<?php
$title = 'Contact Me';
$styles = ['contact.css', 'contactMobile.css'];
ob_start();
?>
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
                <form action="form-handler.php" method="post" id="form">
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
require __DIR__ . '/../../layouts/app.php';