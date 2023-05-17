
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `administrateur` (
  `Prenom` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `administrateur` (`Prenom`, `Nom`, `Email`, `Motdepasse`) VALUES
('Matthieu', 'Gravejat', 'matthieu.gravejat@edu.ece.fr', 'Admin123'),
('Esteban', 'Martin Garcia', 'esteban.martingarcia@edu.ece.fr', 'Admin123'),
('Leopold', 'Thierry', 'leopold.thierry@edu.ece.fr', 'Admin123');
COMMIT;

