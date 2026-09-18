<?php
include __DIR__ . '/../../database/database.php';
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] == false) {
    header("Location: /portfolio/pages/admin/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | WikiBhai Portfolio</title>

    <link rel="stylesheet" href="/portfolio/assets/css/admin-dashboard.css">
</head>

<body>

    <div class="dashboard-shell">

        <!-- =========================
             HEADER
        ========================== -->

        <?php include __DIR__ . '/../../components/_admin-header.php'; ?>


        <!-- =========================
             MAIN CONTENT
        ========================== -->

        <main class="dashboard-main">

            <!-- Dashboard heading -->

            <section class="dashboard-heading">

                <div>

                    <p class="eyebrow">
                        Private workspace
                    </p>

                    <h1>
                        Dashboard
                    </h1>

                    <p class="heading-description">
                        Manage your portfolio projects and incoming messages
                        from one focused space.
                    </p>

                </div>

                <a
                    class="add-project-button"
                    href="./upload_project.php">
                    <span class="plus-icon">+</span>
                    Add new project
                </a>

            </section>


            <!-- =========================
                 SUMMARY
            ========================== -->

            <section class="summary-grid">

                <article class="summary-card">

                    <div class="summary-card-top">

                        <span class="summary-label">
                            Total projects
                        </span>

                        <span class="summary-icon">
                            P
                        </span>

                    </div>

                    <strong class="summary-number">
                        <?php
                        $stmt = $pdo->query("SELECT COUNT(*) FROM projects");
                        $result = $stmt->fetchColumn();
                        echo $result;
                        ?>
                    </strong>

                    <span class="summary-description">
                        Projects in your portfolio
                    </span>

                </article>


                <article class="summary-card">

                    <div class="summary-card-top">

                        <span class="summary-label">
                            Total messages
                        </span>

                        <span class="summary-icon">
                            M
                        </span>

                    </div>

                    <strong class="summary-number">
                        12
                    </strong>

                    <span class="summary-description">
                        Messages received
                    </span>

                </article>


                <article class="summary-card summary-card-highlight">

                    <div class="summary-card-top">

                        <span class="summary-label">
                            Unread messages
                        </span>

                        <span class="summary-icon">
                            !
                        </span>

                    </div>

                    <strong class="summary-number">
                        04
                    </strong>

                    <span class="summary-description">
                        Messages waiting for you
                    </span>

                </article>

            </section>


            <!-- =========================
                 PROJECTS
            ========================== -->

            <section class="content-section">

                <div class="section-heading">

                    <div>

                        <p class="section-eyebrow">
                            Portfolio
                        </p>

                        <h2>
                            Projects
                        </h2>

                        <p>
                            Manage the projects displayed on your portfolio.
                        </p>

                    </div>

                    <a
                        class="section-action"
                        href="#">
                        + Add project
                    </a>

                </div>


                <div class="projects-table-wrapper">

                    <table class="projects-table">

                        <thead>

                            <tr>
                                <th>Project</th>
                                <th>Technology</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th class="actions-column">Actions</th>
                            </tr>

                        </thead>

                        <tbody>

                            <!-- Project 01 -->
                            <?php
                            $stmt = $pdo->query("SELECT * FROM projects");
                            $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($projects as $project) {
                                $dbDate = $project['created_at'];
                                $date = new DateTime($dbDate);

                                echo '
                              <tr>

                                <td>

                                    <div class="project-name-cell">

                                        <div class="project-placeholder">
                                            ✅
                                        </div>

                                        <div>

                                            <strong>
                                                ' . $project['title'] . '
                                            </strong>

                                            <span>
                                                ' . $project['slug'] . '
                                            </span>

                                        </div>

                                    </div>

                                </td>

                                <td>
                                    <span class="technology">
                                        JavaScript
                                    </span>
                                </td>

                                <td>

                                    <span class="status-badge status-published">

                                        <span class="status-dot"></span>

                                        Published

                                    </span>

                                </td>

                                <td>

                                    <span class="date-text">
                                        ' . $date->format('F j, Y') . '
                                    </span>

                                </td>

                                <td class="actions-column">

                                    <div class="table-actions">

                                        <a
                                            class="action-link edit"
                                            href="#">
                                            Edit
                                        </a>

                                        <a
                                            class="action-link delete"
                                            href="delete_project.php?project=' . $project['slug'] . '">
                                            Delete
                                        </a>

                                    </div>

                                </td>

                            </tr>
                             ';
                            }
                            ?>

                        </tbody>

                    </table>

                </div>

            </section>


            <!-- =========================
                 MESSAGES
            ========================== -->

            <section class="content-section messages-section">

                <div class="section-heading">

                    <div>

                        <p class="section-eyebrow">
                            Contact
                        </p>

                        <h2>
                            Recent messages
                        </h2>

                        <p>
                            Messages visitors have sent through your contact form.
                        </p>

                    </div>

                    <a
                        class="section-action"
                        href="#">
                        View all messages
                    </a>

                </div>


                <div class="messages-list">


                    <!-- Message 01 -->

                    <a
                        class="message-row message-unread"
                        href="#">

                        <div class="message-avatar">
                            A
                        </div>


                        <div class="message-content">

                            <div class="message-top">

                                <strong>
                                    Ahmed Khan
                                </strong>

                                <span class="unread-label">
                                    New
                                </span>

                            </div>

                            <span class="message-email">
                                ahmed@example.com
                            </span>

                            <p>
                                I would like to discuss a Laravel project with you...
                            </p>

                        </div>


                        <div class="message-meta">

                            <span>
                                Sep 16
                            </span>

                            <span class="message-arrow">
                                →
                            </span>

                        </div>

                    </a>


                    <!-- Message 02 -->

                    <a
                        class="message-row message-unread"
                        href="#">

                        <div class="message-avatar">
                            S
                        </div>


                        <div class="message-content">

                            <div class="message-top">

                                <strong>
                                    Sarah Ali
                                </strong>

                                <span class="unread-label">
                                    New
                                </span>

                            </div>

                            <span class="message-email">
                                sarah@example.com
                            </span>

                            <p>
                                Your portfolio looks interesting. I wanted to ask about...
                            </p>

                        </div>


                        <div class="message-meta">

                            <span>
                                Sep 15
                            </span>

                            <span class="message-arrow">
                                →
                            </span>

                        </div>

                    </a>


                    <!-- Message 03 -->

                    <a
                        class="message-row"
                        href="#">

                        <div class="message-avatar">
                            M
                        </div>


                        <div class="message-content">

                            <div class="message-top">

                                <strong>
                                    Muhammad Hassan
                                </strong>

                            </div>

                            <span class="message-email">
                                hassan@example.com
                            </span>

                            <p>
                                I have checked your projects and would like to know...
                            </p>

                        </div>


                        <div class="message-meta">

                            <span>
                                Sep 14
                            </span>

                            <span class="message-arrow">
                                →
                            </span>

                        </div>

                    </a>


                    <!-- Message 04 -->

                    <a
                        class="message-row"
                        href="#">

                        <div class="message-avatar">
                            R
                        </div>


                        <div class="message-content">

                            <div class="message-top">

                                <strong>
                                    Rayan Ahmed
                                </strong>

                            </div>

                            <span class="message-email">
                                rayan@example.com
                            </span>

                            <p>
                                I wanted to contact you regarding a website development...
                            </p>

                        </div>


                        <div class="message-meta">

                            <span>
                                Sep 12
                            </span>

                            <span class="message-arrow">
                                →
                            </span>

                        </div>

                    </a>

                </div>

            </section>

        </main>

    </div>

</body>

</html>