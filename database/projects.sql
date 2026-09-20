CREATE DATABASE IF NOT EXISTS my_portfolio
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE my_portfolio;

-- Create admin table if it doesn't exist
CREATE TABLE IF NOT EXISTS admins (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    status boolean NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- =========================================================
-- 1. Projects
-- =========================================================
CREATE TABLE projects (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    slug VARCHAR(180) NOT NULL UNIQUE,
    short_description VARCHAR(500) NOT NULL,
    description TEXT NOT NULL,
    github_url VARCHAR(500) NULL,
    live_url VARCHAR(500) NULL,
    featured BOOLEAN NOT NULL DEFAULT FALSE,
    status BOOLEAN NOT NULL DEFAULT TRUE,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- =========================================================
-- 2. Project Features
-- =========================================================
CREATE TABLE project_features (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id BIGINT UNSIGNED NOT NULL,
    title VARCHAR(150) NOT NULL,
    description TEXT NULL,
    icon VARCHAR(100) NULL,
    sort_order INT UNSIGNED NOT NULL DEFAULT 0,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_project_features_project
        FOREIGN KEY (project_id)
        REFERENCES projects(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    INDEX idx_project_features_project_id (project_id)
) ENGINE=InnoDB;

-- =========================================================
-- 3. Technologies
-- =========================================================
CREATE TABLE technologies (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    slug VARCHAR(120) NOT NULL UNIQUE,
    category VARCHAR(100) NOT NULL,
    icon VARCHAR(100) NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- =========================================================
-- 4. Project Technologies
-- Many-to-many relationship between projects and technologies
-- =========================================================
CREATE TABLE project_technologies (
    project_id BIGINT UNSIGNED NOT NULL,
    technology_id BIGINT UNSIGNED NOT NULL,

    PRIMARY KEY (project_id, technology_id),

    CONSTRAINT fk_project_technologies_project
        FOREIGN KEY (project_id)
        REFERENCES projects(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT fk_project_technologies_technology
        FOREIGN KEY (technology_id)
        REFERENCES technologies(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- =========================================================
-- 5. Project Images
-- =========================================================
CREATE TABLE project_images (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id BIGINT UNSIGNED NOT NULL,
    image VARCHAR(500) NOT NULL,
    alt_text VARCHAR(255) NULL,
    caption VARCHAR(255) NULL,
    is_primary BOOLEAN NOT NULL DEFAULT FALSE,
    sort_order INT UNSIGNED NOT NULL DEFAULT 0,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_project_images_project
        FOREIGN KEY (project_id)
        REFERENCES projects(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    INDEX idx_project_images_project_id (project_id)
) ENGINE=InnoDB;

-- =========================================================
-- 6. Contact Messages
-- =========================================================
CREATE TABLE contact_messages (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(200) NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,

    INDEX idx_contact_messages_email (email),
    INDEX idx_contact_messages_created_at (created_at)
) ENGINE=InnoDB;
