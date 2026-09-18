<?php
$title = 'Resume';
$styles = ['resume.css', 'resumeMobile.css'];
ob_start();
?>
    <!-- resume section -->
    <section id="resume_section">
        <h1 data-aos="fade-up">Resume</h1>
        <div class="education_section">
            <h2 data-aos="fade-up" data-aos-delay="300" class="heading">Education</h2>
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
            <div class="skills_container language-skill-same-container" data-aos="fade-up" data-aos-delay="300">
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
            <div class="language_container language-skill-same-container" data-aos="fade-up" data-aos-delay="300">
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
<?php
$content = ob_get_clean();
require __DIR__ . '/../../layouts/app.php';