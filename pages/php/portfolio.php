<?php
require_once __DIR__ . '/../../config/database.php';

$title = 'Portfolio';
$styles = ['portfolio.css', 'portfolioMobile.css'];
ob_start();

?>
<!-- Portfolio section -->
<section id="portfolio_section">
    <h1 data-aos="fade-up">My Portfolio</h1>
    <p data-aos="fade-up" data-aos-delay="300">Here are some of my projects:</p>
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
                ? '/uploads/images/' . htmlspecialchars($project['primary_image'], ENT_QUOTES, 'UTF-8')
                : '/assets/images/business.jpg';
            echo '<div class="project">';
            echo '    <div data-aos="fade-up" class="project_image">';
            echo '        <img src="' . $image_url . '" alt="' . htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') . '">';
            echo '    </div>';
            echo '    <div class="project_detail">';
            echo '        <h2 class="project_title" data-aos="fade-up"><a href="/pages/php/project-details.php?project=' . rawurlencode($project['slug']) . '">' . htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') . '</a></h2>';
            echo '        <p class="project_description" data-aos="fade-up" data-aos-delay="300">' . $project['short_description'] . '</p>';
            echo '    </div>';
            echo '</div>';
        }
        ?>
    </div>
</section>
<?php
$content = ob_get_clean();
require __DIR__ . '/../../layouts/app.php';
