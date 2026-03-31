-- ============================================================
-- Données de test : pharmacie
-- ============================================================

USE `pharmacie`;

-- ------------------------------------------------------------
-- MEDICAMENT
-- ------------------------------------------------------------
INSERT INTO `MEDICAMENT` (`nom`, `description`, `famille`, `image`) VALUES
('Paracétamol',   'Analgésique et antipyrétique courant, utilisé contre la douleur et la fièvre.',          'Analgésique',       'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/2023_Doreta_75_mg_%2B_650_mg.jpg/640px-2023_Doreta_75_mg_%2B_650_mg.jpg'),
('Ibuprofène',    'Anti-inflammatoire non stéroïdien (AINS) utilisé contre la douleur et l\'inflammation.', 'Anti-inflammatoire', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/RexallDG.jpg/640px-RexallDG.jpg'),
('Amoxicilline',  'Antibiotique de la famille des pénicillines, utilisé contre les infections bactériennes.','Antibiotique',      'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Amoxicillin_500mg_capsules_on_a_plate_%28Sandoz%29.jpg/640px-Amoxicillin_500mg_capsules_on_a_plate_%28Sandoz%29.jpg'),
('Oméprazole',    'Inhibiteur de la pompe à protons, réduit l\'acidité gastrique.',                         'Gastroprotecteur',  'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Omeprazole_20mg.jpg/640px-Omeprazole_20mg.jpg'),
('Aspirine',      'Analgésique, antipyrétique et anti-agrégant plaquettaire.',                              'Analgésique',       'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/Regular_strength_enteric_coated_aspirin_tablets.jpg/640px-Regular_strength_enteric_coated_aspirin_tablets.jpg');

-- ------------------------------------------------------------
-- EFFET_THERAPEUTIQUE
-- ------------------------------------------------------------
INSERT INTO `EFFET_THERAPEUTIQUE` (`libelle`, `id_medicament`) VALUES
('Soulagement de la douleur',         1),
('Réduction de la fièvre',            1),
('Réduction de l\'inflammation',      2),
('Soulagement de la douleur',         2),
('Élimination des bactéries',         3),
('Traitement des infections ORL',     3),
('Réduction de l\'acidité gastrique', 4),
('Protection de la muqueuse gastrique',4),
('Prévention des caillots sanguins',  5),
('Soulagement des maux de tête',      5);

-- ------------------------------------------------------------
-- EFFET_SECONDAIRE
-- ------------------------------------------------------------
INSERT INTO `EFFET_SECONDAIRE` (`libelle`, `id_medicament`) VALUES
('Risque hepatique en cas de surdosage', 1),
('Nausées',                              1),
('Douleurs abdominales',                 2),
('Ulcère gastrique',                     2),
('Réaction allergique (urticaire)',      3),
('Diarrhée',                             3),
('Maux de tête',                         4),
('Diarrhée',                             4),
('Saignements gastro-intestinaux',       5),
('Acouphènes en cas de surdosage',       5);

-- ------------------------------------------------------------
-- INTERACTION
-- ------------------------------------------------------------
INSERT INTO `INTERACTION` (`description`, `id_medicament1`, `id_medicament2`) VALUES
('Association déconseillée : risque accru d\'hémorragie digestive.',         2, 5),
('Potentialisation des effets analgésiques, surveiller la dose totale.',     1, 5),
('L\'oméprazole peut réduire l\'absorption de l\'amoxicilline.',             4, 3),
('Risque accru d\'ulcère gastrique en cas d\'association prolongée.',        2, 1);

-- ------------------------------------------------------------
-- ACTIVITE
-- ------------------------------------------------------------
INSERT INTO `ACTIVITE` (`nom`, `description`, `date_activite`, `lieu`, `nb_places_max`) VALUES
('Atelier bien-être',         'Séance de relaxation et de conseils santé pour les patients.',     '2026-04-10', 'Salle polyvalente - Lyon',    20),
('Conférence nutrition',      'Conférence sur l\'alimentation saine et les interactions médicamenteuses.', '2026-04-25', 'Amphithéâtre - Paris', 50),
('Marche santé',              'Promenade en groupe encadrée par un professionnel de santé.',      '2026-05-03', 'Parc de la Tête d\'Or - Lyon', 30),
('Séance yoga thérapeutique', 'Cours de yoga adapté aux personnes sous traitement médicamenteux.','2026-05-17', 'Studio Zen - Marseille',      15);

-- ------------------------------------------------------------
-- INSCRIPTION
-- ------------------------------------------------------------
INSERT INTO `INSCRIPTION` (`id_activite`, `nom_participant`, `prenom_participant`, `email`, `date_inscription`) VALUES
(1, 'Dupont',   'Marie',   'marie.dupont@email.fr',   '2026-03-15'),
(1, 'Martin',   'Pierre',  'pierre.martin@email.fr',  '2026-03-16'),
(1, 'Bernard',  'Sophie',  'sophie.bernard@email.fr', '2026-03-18'),
(2, 'Leroy',    'Lucas',   'lucas.leroy@email.fr',    '2026-03-20'),
(2, 'Moreau',   'Camille', 'camille.moreau@email.fr', '2026-03-21'),
(3, 'Petit',    'Julie',   'julie.petit@email.fr',    '2026-03-22'),
(3, 'Durand',   'Thomas',  'thomas.durand@email.fr',  '2026-03-23'),
(4, 'Leblanc',  'Emma',    'emma.leblanc@email.fr',   '2026-03-24'),
(4, 'Garnier',  'Nicolas', 'nicolas.garnier@email.fr','2026-03-25');
