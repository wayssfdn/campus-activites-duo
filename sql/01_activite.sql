-- À importer dans une base de travail. Adapter son nom si le professeur fournit une base.
CREATE DATABASE IF NOT EXISTS campus_activites CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE campus_activites;

CREATE TABLE IF NOT EXISTS activite (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(120) NOT NULL,
    description TEXT NOT NULL,
    date_activite DATETIME NOT NULL,
    lieu VARCHAR(120) NOT NULL,
    capacite INT UNSIGNED NOT NULL
) ENGINE=InnoDB;

-- Les dates sont calculées le jour de l’import. Les quatre identifiants restent stables.
INSERT INTO activite (id, titre, description, date_activite, lieu, capacite) VALUES
    (1, 'Atelier réparation', 'Diagnostiquez une panne simple.', TIMESTAMP(CURRENT_DATE + INTERVAL 7 DAY, '14:00:00'), 'Salle B12', 12),
    (2, 'Découverte du jeu vidéo', 'Créez un niveau jouable en équipe.', TIMESTAMP(CURRENT_DATE + INTERVAL 10 DAY, '16:30:00'), 'Salle informatique', 16),
    (3, 'Rencontre avec des anciens', 'Échangez sur les métiers après le BTS.', TIMESTAMP(CURRENT_DATE + INTERVAL 15 DAY, '17:00:00'), 'Auditorium', 30),
    (4, 'Tournoi du campus', 'Activité passée pour tester le filtre de dates.', TIMESTAMP(CURRENT_DATE - INTERVAL 2 DAY, '15:00:00'), 'Gymnase', 24)
ON DUPLICATE KEY UPDATE id = activite.id;
