<?php
require_once __DIR__ . '/../../database/database.php';

$slug = trim($_GET['project'] ?? '');
$project = null;

if ($slug !== '') {
	$stmt = $pdo->prepare("SELECT * FROM projects WHERE slug = ? AND status = 1 LIMIT 1");
	$stmt->execute([$slug]);
	$project = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$project) {
	http_response_code(404);
	$title = 'Project Not Found';
	$styles = ['project-details.css'];
	ob_start();
	?>
	<section class="project-details-page project-not-found">
		<p class="project-eyebrow">Portfolio</p>
		<h1>Project not found</h1>
		<p>The project may have been removed or is not currently published.</p>
		<a class="project-action" href="/portfolio/pages/php/portfolio.php">Back to portfolio</a>
	</section>
	<?php
	$content = ob_get_clean();
	require __DIR__ . '/../../layouts/app.php';
	exit;
}

$project_id = (int) $project['id'];

$stmt = $pdo->prepare("SELECT image, alt_text, caption, is_primary
	FROM project_images
	WHERE project_id = ?
	ORDER BY is_primary DESC, sort_order ASC, id ASC");
$stmt->execute([$project_id]);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT title, icon, description
	FROM project_features
	WHERE project_id = ?
	ORDER BY sort_order ASC, id ASC");
$stmt->execute([$project_id]);
$features = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT t.name, t.slug, t.icon
	FROM technologies t
	INNER JOIN project_technologies pt ON pt.technology_id = t.id
	WHERE pt.project_id = ?
	ORDER BY t.name ASC");
$stmt->execute([$project_id]);
$technologies = $stmt->fetchAll(PDO::FETCH_ASSOC);

$e = static fn ($value): string => htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
$primary_image = $images[0] ?? null;
$title = $project['title'];
$styles = ['project-details.css'];
ob_start();
?>
<section class="project-details-page">
	<a class="project-back-link" href="/portfolio/pages/php/portfolio.php">&larr; Back to portfolio</a>

	<header class="project-details-header">
		<p class="project-eyebrow">Featured project</p>
		<h1><?= $e($project['title']) ?></h1>
		<p class="project-lead"><?= $e($project['short_description']) ?></p>
		<div class="project-links">
			<?php if (!empty($project['github_url'])): ?>
				<a class="project-action" href="<?= $e($project['github_url']) ?>" target="_blank" rel="noopener noreferrer">
					<i class="fa-brands fa-github" aria-hidden="true"></i> View source code
				</a>
			<?php endif; ?>
			<?php if (!empty($project['live_url'])): ?>
				<a class="project-action project-action-primary" href="<?= $e($project['live_url']) ?>" target="_blank" rel="noopener noreferrer">
					<i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i> Visit live project
				</a>
			<?php endif; ?>
		</div>
	</header>

	<?php if ($primary_image): ?>
		<figure class="project-hero-image">
			<img src="/portfolio/uploads/images/<?= $e($primary_image['image']) ?>" alt="<?= $e($primary_image['alt_text'] ?: $project['title']) ?>">
			<?php if (!empty($primary_image['caption'])): ?><figcaption><?= $e($primary_image['caption']) ?></figcaption><?php endif; ?>
		</figure>
	<?php endif; ?>

	<div class="project-details-grid">
		<article class="project-copy">
			<p class="project-eyebrow">About the project</p>
			<h2>Built with purpose</h2>
			<div class="project-description"><?= nl2br($e($project['description'])) ?></div>
		</article>

		<?php if ($technologies): ?>
			<aside class="project-panel">
				<p class="project-eyebrow">Technology</p>
				<h2>Tools used</h2>
				<ul class="technology-list">
					<?php foreach ($technologies as $technology): ?>
						<li>
							<?php if (!empty($technology['icon'])): ?><i class="<?= $e($technology['icon']) ?>" aria-hidden="true"></i><?php endif; ?>
							<span><?= $e($technology['name']) ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</aside>
		<?php endif; ?>
	</div>

	<?php if ($features): ?>
		<section class="project-section">
			<p class="project-eyebrow">Highlights</p>
			<h2>What this project delivers</h2>
			<div class="feature-grid">
				<?php foreach ($features as $feature): ?>
					<article class="feature-card">
						<?php if (!empty($feature['icon'])): ?><i class="<?= $e($feature['icon']) ?> feature-icon" aria-hidden="true"></i><?php endif; ?>
						<h3><?= $e($feature['title']) ?></h3>
						<p><?= nl2br($e($feature['description'])) ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if (count($images) > 1): ?>
		<section class="project-section">
			<p class="project-eyebrow">Gallery</p>
			<h2>Inside the experience</h2>
			<div class="project-gallery">
				<?php foreach (array_slice($images, 1) as $image): ?>
					<figure>
						<img src="/portfolio/uploads/images/<?= $e($image['image']) ?>" alt="<?= $e($image['alt_text'] ?: $project['title']) ?>">
						<?php if (!empty($image['caption'])): ?><figcaption><?= $e($image['caption']) ?></figcaption><?php endif; ?>
					</figure>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>
</section>
<?php
$content = ob_get_clean();
require __DIR__ . '/../../layouts/app.php';
