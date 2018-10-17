-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema projet_bernardiere
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projet_bernardiere
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projet_bernardiere` DEFAULT CHARACTER SET utf8 ;
USE `projet_bernardiere` ;

-- -----------------------------------------------------
-- Table `projet_bernardiere`.`CATEGORIES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_bernardiere`.`CATEGORIES` (
  `idCATEGORIES` INT NOT NULL AUTO_INCREMENT,
  `categoryProduct` VARCHAR(45) NULL,
  PRIMARY KEY (`idCATEGORIES`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projet_bernardiere`.`PRODUITS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projet_bernardiere`.`PRODUITS` (
  `idProduits` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(255) NOT NULL,
  `descriptionProduct` TEXT NOT NULL,
  `dateDebut` DATE NULL,
  `dateFin` DATE NULL,
  `CATEGORIES_idCATEGORIES` INT NOT NULL,
  `imageProduit` VARCHAR(255) NOT NULL,
  `sourceArticle` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProduits`, `CATEGORIES_idCATEGORIES`),
  INDEX `fk_PRODUITS_CATEGORIES_idx` (`CATEGORIES_idCATEGORIES` ASC),
  CONSTRAINT `fk_PRODUITS_CATEGORIES`
    FOREIGN KEY (`CATEGORIES_idCATEGORIES`)
    REFERENCES `projet_bernardiere`.`CATEGORIES` (`idCATEGORIES`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `projet_bernardiere`.`CATEGORIES`
-- -----------------------------------------------------
START TRANSACTION;
USE `projet_bernardiere`;
INSERT INTO `projet_bernardiere`.`CATEGORIES` (`idCATEGORIES`, `categoryProduct`) VALUES (1, 'Fruit');
INSERT INTO `projet_bernardiere`.`CATEGORIES` (`idCATEGORIES`, `categoryProduct`) VALUES (2, 'Legume');
INSERT INTO `projet_bernardiere`.`CATEGORIES` (`idCATEGORIES`, `categoryProduct`) VALUES (3, 'Fleur');
INSERT INTO `projet_bernardiere`.`CATEGORIES` (`idCATEGORIES`, `categoryProduct`) VALUES (4, 'Aromate');

COMMIT;


-- -----------------------------------------------------
-- Data for table `projet_bernardiere`.`PRODUITS`
-- -----------------------------------------------------
START TRANSACTION;
USE `projet_bernardiere`;
INSERT INTO `projet_bernardiere`.`PRODUITS` (`idProduits`, `Name`, `descriptionProduct`, `dateDebut`, `dateFin`, `CATEGORIES_idCATEGORIES`, `imageProduit`, `sourceArticle`) VALUES (1, 'Fraise Remontante', 'Les fraises se développent à partir du réceptacle charnu des fleurs. Ce sont donc des faux fruits. De forme ovoïde oblongues plus ou moins arrondies, elles sont de couleur rouge ou jaune blanchâtre selon les variétés, Au sens botanique du terme, les « vrais » fruits des fraisiers sont en fait les akènes, ces petits grains secs disposés régulièrement dans des alvéoles plus ou moins profondes sur les fraises. Ils sont de couleur verte à brune, et renferment chacun soit un ovule (non fécondé), soit une graine (ovule fécondé) qui contient elle-même un germe. Le corps charnu des fraises formé à partir du réceptacle floral (induvie hypertrophié sous l\'effet des auxines) est consommée avec ou sans les akènes. Ce sont les akènes qui produisent une hormone permettant au faux-fruit de grossir. Le poids des fraises et des akènes est lié au cultivar, mais aussi au mode de pollinisation. Les pollinisations croisées produisent des fraises et des akènes plus grosses que les autofécondations. Les abeilles en butinant favorisent les pollinisations croisées, plus que l\'action du vent ou que l\'auto-pollinisation. Elles permettent d\'obtenir des fruits plus gros et plus fermes.', 'Juin', 'Octobre', , 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Closeup_of_a_strawberry.jpg/220px-Closeup_of_a_strawberry.jpg', DEFAULT);
INSERT INTO `projet_bernardiere`.`PRODUITS` (`idProduits`, `Name`, `descriptionProduct`, `dateDebut`, `dateFin`, `CATEGORIES_idCATEGORIES`, `imageProduit`, `sourceArticle`) VALUES (2, 'Petit Pois', 'Les petits pois, pois de jardins, ou pois potagers (Pisum sativum subsp. sativum var. sativum, autonyme de Pisum sativum L.) sont les jeunes graines vertes de variétés cultivées du pois, récoltées après leur développement dans les gousses et avant leur maturité3. Lorsque ces graines sont récoltées à leur maturité, elles sont appelées pois cassés. Les petits pois sont consommés comme légumes frais. Ils sont plus énergétiques (81 cal/100 g) que la majorité des légumes verts. Ils sont aussi intéressants pour leur apport en sucres solubles, en lysine et en fibres, composées en majorité d\'hémicelluloses lorsqu\'ils sont jeunes. Les petits pois sont aussi une bonne source de vitamine C (acide ascorbique) avec 25 mg/100 g. Leur consommation s\'est étendue tout au long de l\'année grâce aux techniques de conservation modernes (appertisation, surgélation). L\'expression « petits pois » désigne aussi, par métonymie, les gousses, ou cosses, qui enferment les graines, ainsi que les plantes qui les produisent.', 'Juin', 'Juillet', , 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Peas.jpg/220px-Peas.jpg', DEFAULT);
INSERT INTO `projet_bernardiere`.`PRODUITS` (`idProduits`, `Name`, `descriptionProduct`, `dateDebut`, `dateFin`, `CATEGORIES_idCATEGORIES`, `imageProduit`, `sourceArticle`) VALUES (3, 'Tomate', 'Le plant de tomates (Solanum lycopersicum L.) est une espèce de plantes herbacées du genre solanum de la famille des Solanacées, originaire du nord-ouest de l\'Amérique du Sud1, largement cultivée pour son fruit. Le terme désigne aussi ce fruit charnu. La tomate se consomme comme un légume-fruit, crue ou cuite. Elle est devenue un élément incontournable de la gastronomie dans de nombreux pays, et tout particulièrement dans le bassin méditerranéen.\n\nL\'espèce compte quelques variétés botaniques, dont la « tomate-cerise » et plusieurs milliers de variétés cultivées (cultivars identifiés par des appellations ou des marques commerciales).\n\nLa plante est cultivée en plein champ ou sous abri par les agriculteurs et les horticulteurs sous presque toutes les latitudes, sur une superficie d\'environ trois millions d\'hectares. La tomate a donné lieu au développement d\'une importante industrie de transformation, pour la fabrication de concentré, de sauce tomate, notamment de sauce ketchup, de jus de légumes et de conserves.', 'Juillet', 'Novembre', , 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Tomatoes_plain_and_sliced.jpg/290px-Tomatoes_plain_and_sliced.jpg', DEFAULT);

COMMIT;

