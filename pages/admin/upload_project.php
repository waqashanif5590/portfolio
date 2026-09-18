<?php
include __DIR__ . '/../../database/database.php';
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] == false) {
    header("Location: /portfolio/pages/admin/login.php");
    exit();
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $github_url = $_POST['github_url'];
    $live_url = $_POST['live_url'];
    $featured = isset($_POST['featured']) ? 1 : 0;
    $status = isset($_POST['status']) ? 1 : 0;



    //  Handle technologies
    $technologies = [];
    if (isset($_POST['technologies'])) {
        foreach ($_POST['technologies'] as $tech_slug) {
            $stmt = $pdo->prepare("SELECT id FROM technologies WHERE slug = ?");
            $stmt->execute([$tech_slug]);
            $tech = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($tech) {
                $technologies[] = $tech['id'];
            }
        }
    }


    // Handle features
    $features = [];
    if (isset($_POST['features'])) {
        foreach ($_POST['features'] as $feature) {
            if (!empty($feature['title']) && !empty($feature['description'])) {
                $features[] = [
                    'title' => $feature['title'],
                    'icon' => $feature['icon'] ?? '',
                    'description' => $feature['description']
                ];
            }
        }
    }


    // Handle images
    $images = [];
    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['name'] as $index => $name) {
            if (!empty($name)) {
                $tmp_name = $_FILES['images']['tmp_name'][$index];
                $alt_text = $_POST['image_alt_text'][$index + 1] ?? '';
                $caption = $_POST['image_caption'][$index + 1] ?? '';
                $is_primary = (int) ($_POST['primary_image'] ?? 0) === $index + 1 ? 1 : 0;
                // Move the uploaded file to the desired directory
                move_uploaded_file($tmp_name, __DIR__ . '/../../uploads/images/' . basename($name));
                $images[] = [
                    'filename' => basename($name),
                    'alt_text' => $alt_text,
                    'caption' => $caption,
                    'is_primary' => $is_primary
                ];
            }
        }
    }

    // Insert project into database
    $stmt = $pdo->prepare("INSERT INTO projects (title, slug, short_description, description, github_url, live_url, featured, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $slug, $short_description, $description, $github_url, $live_url, $featured, $status]);
    $project_id = $pdo->lastInsertId();
    // Insert technologies into database
    foreach ($technologies as $tech_id) {
        $stmt = $pdo->prepare("INSERT INTO project_technologies (project_id, technology_id) VALUES (?, ?)");
        $stmt->execute([$project_id, $tech_id]);
    }
    // Insert features into database
    foreach ($features as $feature) {
        $stmt = $pdo->prepare("INSERT INTO project_features (project_id, title, icon, description) VALUES (?, ?, ?, ?)");
        $stmt->execute([$project_id, $feature['title'], $feature['icon'], $feature['description']]);
    }
    // Insert images into database
    foreach ($images as $image) {
        $stmt = $pdo->prepare("INSERT INTO project_images (project_id, image, alt_text, caption, is_primary) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$project_id, $image['filename'], $image['alt_text'], $image['caption'], $image['is_primary']]);
    }

    // Show alert message
    echo "<script>alert('Project added successfully!'); window.location.href = '/portfolio/pages/admin/upload_project.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Add New Project | WikiBhai Portfolio</title>

    <link
        rel="stylesheet"
        href="/portfolio/assets/css/admin-dashboard.css">

    <link
        rel="stylesheet"
        href="/portfolio/assets/css/admin-project-create.css">

</head>


<body>

    <div class="dashboard-shell">


        <!-- =====================================================
             HEADER
        ====================================================== -->

        <?php include __DIR__ . '/../../components/_admin-header.php'; ?>

        <!-- =====================================================
             MAIN
        ====================================================== -->

        <main class="project-create-main">


            <!-- =================================================
                 PAGE HEADING
            ================================================== -->

            <section class="project-page-heading">

                <div>

                    <a
                        class="back-link"
                        href="/portfolio/pages/admin/index.php">
                        <span>←</span>
                        Back to dashboard
                    </a>


                    <p class="eyebrow">
                        Portfolio
                    </p>


                    <h1>
                        Add new project
                    </h1>


                    <p class="heading-description">
                        Add the information, technologies, features and
                        images for a project in your portfolio.
                    </p>

                </div>

            </section>



            <!-- =================================================
                 PROJECT FORM
            ================================================== -->

            <form
                class="project-form"
                action="./upload_project.php"
                method="post"
                enctype="multipart/form-data">


                <!-- =================================================
                     BASIC INFORMATION
                ================================================== -->

                <section class="form-section">

                    <div class="form-section-heading">

                        <div class="section-number">
                            01
                        </div>


                        <div>

                            <h2>
                                Project information
                            </h2>

                            <p>
                                Basic information about your project.
                            </p>

                        </div>

                    </div>


                    <div class="form-grid">


                        <!-- Title -->

                        <div class="form-field full-width">

                            <label for="title">
                                Project title
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                placeholder="e.g. Library Management System"
                                required>

                        </div>


                        <!-- Slug -->

                        <div class="form-field">

                            <label for="slug">
                                Slug
                            </label>

                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                placeholder="library-management-system">

                            <span class="field-help">
                                Used for the project URL.
                            </span>

                        </div>


                        <!-- Short Description -->

                        <div class="form-field">

                            <label for="short-description">
                                Short description
                            </label>

                            <input
                                type="text"
                                id="short-description"
                                name="short_description"
                                placeholder="A short summary of the project">

                            <span class="field-help">
                                Keep this short for project cards.
                            </span>

                        </div>


                        <!-- Description -->

                        <div class="form-field full-width">

                            <label for="description">
                                Project description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="7"
                                placeholder="Describe the project, its purpose, how it works and what you built..."></textarea>

                        </div>


                        <!-- GitHub -->

                        <div class="form-field">

                            <label for="github-url">
                                GitHub URL
                            </label>

                            <input
                                type="url"
                                id="github-url"
                                name="github_url"
                                placeholder="https://github.com/username/project">

                        </div>


                        <!-- Live URL -->

                        <div class="form-field">

                            <label for="live-url">
                                Live project URL
                            </label>

                            <input
                                type="url"
                                id="live-url"
                                name="live_url"
                                placeholder="https://example.com">

                        </div>

                    </div>



                    <!-- Project settings -->

                    <div class="settings-row">


                        <label class="toggle-option">

                            <input
                                type="checkbox"
                                name="featured"
                                checked>

                            <span class="toggle-box"></span>

                            <span class="toggle-content">

                                <strong>
                                    Featured project
                                </strong>

                                <small>
                                    Show this project in your featured projects.
                                </small>

                            </span>

                        </label>


                        <label class="toggle-option">

                            <input
                                type="checkbox"
                                name="status"
                                checked>

                            <span class="toggle-box"></span>

                            <span class="toggle-content">

                                <strong>
                                    Published
                                </strong>

                                <small>
                                    Make this project visible on the portfolio.
                                </small>

                            </span>

                        </label>

                    </div>

                </section>



                <!-- =================================================
                     FEATURES
                ================================================== -->

                <section class="form-section">

                    <div class="form-section-heading">

                        <div class="section-number">
                            02
                        </div>


                        <div>

                            <h2>
                                Project features
                            </h2>

                            <p>
                                Add the main features or functionality of
                                this project.
                            </p>

                        </div>

                    </div>


                    <div id="features-container">


                        <!-- Feature 01 -->

                        <div class="feature-card">

                            <div class="feature-card-header">

                                <span class="item-number">
                                    Feature 01
                                </span>

                                <button
                                    type="button"
                                    class="remove-item">
                                    Remove
                                </button>

                            </div>


                            <div class="form-grid">

                                <div class="form-field">

                                    <label for="feature-title-1">
                                        Feature title
                                    </label>

                                    <input
                                        type="text"
                                        id="feature-title-1"
                                        name="features[0][title]"
                                        placeholder="e.g. User Authentication">

                                </div>


                                <div class="form-field">

                                    <label for="feature-icon-1">
                                        Icon
                                        <span class="optional">
                                            Optional
                                        </span>
                                    </label>

                                    <input
                                        type="text"
                                        id="feature-icon-1"
                                        name="features[0][icon]"
                                        placeholder="e.g. fa-user-lock">

                                </div>


                                <div class="form-field full-width">

                                    <label for="feature-description-1">
                                        Feature description
                                    </label>

                                    <textarea
                                        id="feature-description-1"
                                        name="features[0][description]"
                                        rows="4"
                                        placeholder="Explain what this feature does..."></textarea>

                                </div>

                            </div>

                        </div>


                        <!-- Add feature -->

                        <button
                            type="button"
                            class="add-item-button"
                            id="add-feature-btn">
                            <span>+</span>
                            Add another feature
                        </button>

                    </div>

                </section>



                <!-- =================================================
                     TECHNOLOGIES
                ================================================== -->

                <section class="form-section">

                    <div class="form-section-heading">

                        <div class="section-number">
                            03
                        </div>


                        <div>

                            <h2>
                                Technologies
                            </h2>

                            <p>
                                Select all technologies used to build this project.
                            </p>

                        </div>

                    </div>


                    <div class="technology-list">


                        <?php
                        $stmt = $pdo->query("SELECT * FROM technologies");
                        $technologies = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($technologies as $tech) {
                            $checked = in_array($tech['slug'], $_POST['technologies'] ?? []) ? 'checked' : '';
                            echo '<label class="technology-option">';
                            echo '<input type="checkbox" name="technologies[]" value="' . htmlspecialchars($tech['slug']) . '" ' . $checked . '>';
                            echo '<span class="technology-check">✓</span>';
                            echo '<span class="technology-details">';
                            echo '<strong>' . htmlspecialchars($tech['name']) . '</strong>';
                            echo '<small>' . htmlspecialchars($tech['category']) . '</small>';
                            echo '</span>';
                            echo '</label>';
                        }
                        ?>

                    </div>

                </section>



                <!-- =================================================
                     PROJECT IMAGES
                ================================================== -->

                <section class="form-section">

                    <div class="form-section-heading">

                        <div class="section-number">
                            04
                        </div>


                        <div>

                            <h2>
                                Project images
                            </h2>

                            <p>
                                Add screenshots or images of your project
                                and choose one primary image.
                            </p>

                        </div>

                    </div>


                    <div class="images-container">


                        <!-- Image 01 -->

                        <div class="image-card">

                            <div class="image-card-header">

                                <span class="item-number">
                                    Image 01
                                </span>

                                <label class="primary-option">

                                    <input
                                        type="radio"
                                        name="primary_image"
                                        value="1"
                                        checked>

                                    <span class="radio-mark"></span>

                                    <span>
                                        Primary image
                                    </span>

                                </label>

                            </div>


                            <div class="image-form">

                                <div class="image-upload">

                                    <label
                                        for="project-image-1"
                                        class="upload-box">

                                        <span class="upload-icon">
                                            ↑
                                        </span>

                                        <strong>
                                            Choose project image
                                        </strong>

                                        <small>
                                            PNG, JPG or WEBP
                                        </small>

                                    </label>

                                    <input
                                        type="file"
                                        id="project-image-1"
                                        name="images[]"
                                        accept="image/png,image/jpeg,image/webp">

                                </div>


                                <div class="image-details">

                                    <div class="form-field">

                                        <label for="alt-text-1">
                                            Alt text
                                        </label>

                                        <input
                                            type="text"
                                            id="alt-text-1"
                                            name="image_alt_text[1]"
                                            placeholder="Describe the image">

                                    </div>


                                    <div class="form-field">

                                        <label for="caption-1">
                                            Caption
                                            <span class="optional">
                                                Optional
                                            </span>
                                        </label>

                                        <input
                                            type="text"
                                            id="caption-1"
                                            name="image_caption[1]"
                                            placeholder="Image caption">

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!-- Image 02 -->

                        <div class="image-card">

                            <div class="image-card-header">

                                <span class="item-number">
                                    Image 02
                                </span>

                                <label class="primary-option">

                                    <input
                                        type="radio"
                                        name="primary_image"
                                        value="2">

                                    <span class="radio-mark"></span>

                                    <span>
                                        Primary image
                                    </span>

                                </label>

                            </div>


                            <div class="image-form">

                                <div class="image-upload">

                                    <label
                                        for="project-image-2"
                                        class="upload-box">

                                        <span class="upload-icon">
                                            ↑
                                        </span>

                                        <strong>
                                            Choose project image
                                        </strong>

                                        <small>
                                            PNG, JPG or WEBP
                                        </small>

                                    </label>

                                    <input
                                        type="file"
                                        id="project-image-2"
                                        name="images[]"
                                        accept="image/png,image/jpeg,image/webp">

                                </div>


                                <div class="image-details">

                                    <div class="form-field">

                                        <label for="alt-text-2">
                                            Alt text
                                        </label>

                                        <input
                                            type="text"
                                            id="alt-text-2"
                                            name="image_alt_text[2]"
                                            placeholder="Describe the image">

                                    </div>


                                    <div class="form-field">

                                        <label for="caption-2">
                                            Caption
                                            <span class="optional">
                                                Optional
                                            </span>
                                        </label>

                                        <input
                                            type="text"
                                            id="caption-2"
                                            name="image_caption[2]"
                                            placeholder="Image caption">

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!-- Image 03 -->

                        <div class="image-card">

                            <div class="image-card-header">

                                <span class="item-number">
                                    Image 03
                                </span>

                                <label class="primary-option">

                                    <input
                                        type="radio"
                                        name="primary_image"
                                        value="3">

                                    <span class="radio-mark"></span>

                                    <span>
                                        Primary image
                                    </span>

                                </label>

                            </div>


                            <div class="image-form">

                                <div class="image-upload">

                                    <label
                                        for="project-image-3"
                                        class="upload-box">

                                        <span class="upload-icon">
                                            ↑
                                        </span>

                                        <strong>
                                            Choose project image
                                        </strong>

                                        <small>
                                            PNG, JPG or WEBP
                                        </small>

                                    </label>

                                    <input
                                        type="file"
                                        id="project-image-3"
                                        name="images[]"
                                        accept="image/png,image/jpeg,image/webp">

                                </div>


                                <div class="image-details">

                                    <div class="form-field">

                                        <label for="alt-text-3">
                                            Alt text
                                        </label>

                                        <input
                                            type="text"
                                            id="alt-text-3"
                                            name="image_alt_text[3]"
                                            placeholder="Describe the image">

                                    </div>


                                    <div class="form-field">

                                        <label for="caption-3">
                                            Caption
                                            <span class="optional">
                                                Optional
                                            </span>
                                        </label>

                                        <input
                                            type="text"
                                            id="caption-3"
                                            name="image_caption[3]"
                                            placeholder="Image caption">

                                    </div>

                                </div>

                            </div>

                        </div>


                        <button
                            type="button"
                            class="add-item-button">
                            <span>+</span>
                            Add another image
                        </button>

                    </div>

                </section>



                <!-- =================================================
                     FORM ACTIONS
                ================================================== -->

                <div class="form-actions">

                    <a
                        class="cancel-button"
                        href="/portfolio/admin/dashboard.html">
                        Cancel
                    </a>


                    <button
                        class="save-project-button"
                        type="submit">
                        Save project
                    </button>

                </div>


            </form>

        </main>

    </div>
    <script>
        const addFeatureBtn = document.getElementById('add-feature-btn');
        const featureContainer = document.getElementById('features-container');
        let featureNumber = 1;
        addFeatureBtn.addEventListener('click', () => {
            featureContainer.innerHTML += `
               <div class="feature-card">

                            <div class="feature-card-header">

                                <span class="item-number">
                                    Feature 0${featureNumber}
                                </span>

                                <button
                                    type="button"
                                    class="remove-item">
                                    Remove
                                </button>

                            </div>


                            <div class="form-grid">

                                <div class="form-field">

                                    <label for="feature-title-${featureNumber}">
                                        Feature title
                                    </label>

                                    <input
                                        type="text"
                                        id="feature-title-${featureNumber}"
                                        name="features[${featureNumber}][title]"
                                        placeholder="e.g. User Authentication">

                                </div>


                                <div class="form-field">

                                    <label for="feature-icon-${featureNumber}">
                                        Icon
                                        <span class="optional">
                                            Optional
                                        </span>
                                    </label>

                                    <input
                                        type="text"
                                        id="feature-icon-${featureNumber}"
                                        name="features[${featureNumber}][icon]"
                                        placeholder="e.g. fa-user-lock">

                                </div>


                                <div class="form-field full-width">

                                    <label for="feature-description-${featureNumber}">
                                        Feature description
                                    </label>

                                    <textarea
                                        id="feature-description-${featureNumber}"
                                        name="features[${featureNumber}][description]"
                                        rows="4"
                                        placeholder="Explain what this feature does..."></textarea>

                                </div>

                            </div>

                        </div>`;
            featureNumber++;
        })
    </script>

</body>

</html>