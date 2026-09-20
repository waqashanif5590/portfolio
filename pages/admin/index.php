<?php
include __DIR__ . '/../../config/database.php';
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] == false) {
    header("Location: /pages/admin/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | WikiBhai Portfolio</title>

    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/admin-dashboard.css">
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
                        <?php $stmt = $pdo->query("SELECT COUNT(*) FROM contact_messages");
                        $result = $stmt->fetchColumn();
                        echo $result; ?>
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
                                            ' . strtoupper(substr($project['title'], 0, 1)) . '
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

                                        <form
                                            method="post"
                                            action="delete_project.php"
                                            class="delete-project-form"
                                            onsubmit="return confirm(\'Delete this project?\');">
                                            <input
                                                type="hidden"
                                                name="project"
                                                value="' . htmlspecialchars($project['slug'], ENT_QUOTES, 'UTF-8') . '">
                                            <button type="submit" class="action-link delete">
                                                Delete
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>
                             ';
                            }
                            if (empty($projects)) {
                                echo '<tr>
                                <td class="project-name-cell" colspan="5">
                                No project uploaded
                                </td>
                                </tr>';
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


                    <?php
                    $stmt = $pdo->query("SELECT * FROM contact_messages");
                    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($messages as $message) {
                        $dbDate = $message['created_at'];
                        $date = new DateTime($dbDate);
                        echo '
                     <a
                        class="message-row message-unread"
                        href="#">

                        <div class="message-avatar">
                            ' . strtoupper(substr($message['name'], 0, 1)) . '
                        </div>


                        <div class="message-content">

                            <div class="message-top">

                                <strong>
                                    ' . $message['name'] . '
                                </strong>

                                <span class="unread-label">
                                    New
                                </span>

                            </div>

                            <span class="message-email">
                                  ' . $message['email'] . '
                            </span>

                            <p>
                                 ' . $message['subject'] . '
                            </p>

                        </div>


                        <div class="message-meta">

                            <span>
                                  ' . $date->format('F j, Y') . '
                            </span>

                            <span class="message-arrow">
                                →
                            </span>

                        </div>

                    </a>';
                    }
                    ?>

                </div>

            </section>

        </main>

    </div>

</body>

</html>