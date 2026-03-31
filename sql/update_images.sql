-- ============================================================
-- Mise à jour des images médicaments
-- À exécuter dans phpMyAdmin
-- ============================================================

USE `pharmacie`;

UPDATE `MEDICAMENT` SET `image` = 'https://images.pexels.com/photos/159211/headache-pain-pills-medication-159211.jpeg?w=400'
WHERE `nom` = 'Paracétamol';

UPDATE `MEDICAMENT` SET `image` = 'https://images.pexels.com/photos/3683098/pexels-photo-3683098.jpeg?w=400'
WHERE `nom` = 'Ibuprofène';

UPDATE `MEDICAMENT` SET `image` = 'https://images.pexels.com/photos/593451/pexels-photo-593451.jpeg?w=400'
WHERE `nom` = 'Amoxicilline';

UPDATE `MEDICAMENT` SET `image` = 'https://images.pexels.com/photos/208512/pexels-photo-208512.jpeg?w=400'
WHERE `nom` = 'Oméprazole';

UPDATE `MEDICAMENT` SET `image` = 'https://images.pexels.com/photos/360622/pexels-photo-360622.jpeg?w=400'
WHERE `nom` = 'Aspirine';
