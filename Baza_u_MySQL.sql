CREATE TABLE `student-advisor`.`clan` (
  `idClan` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(20) NOT NULL,
  `prezime` VARCHAR(20) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `datumRodjenja` DATE NULL,
  `pol` CHAR(1) NULL,
  `godinaUpisa` YEAR NULL,
  `tip` CHAR(1) NULL DEFAULT 'c',
  `opis` VARCHAR(1024) NULL,
  `prosecnaOcena` FLOAT NULL DEFAULT 0,
  `brNeprocPoruka` INT NULL DEFAULT 0,
  PRIMARY KEY (`idClan`),
  UNIQUE INDEX `idClan_UNIQUE` (`idClan` ASC));
 
 CREATE TABLE `student-advisor`.`kurs` (
  `idkurs` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(20) NOT NULL,
  `opis` VARCHAR(1024) NULL,
  `prosecnaOcena` FLOAT NULL,
  `zanimljivost` INT NULL,
  `korisnost` INT NULL,
  `tezina` INT NULL,
  `preporuka` INT NULL,
  PRIMARY KEY (`idkurs`),
  UNIQUE INDEX `idkurs_UNIQUE` (`idkurs` ASC));
  
  CREATE TABLE `student-advisor`.`predavac` (
  `idPred` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(20) NOT NULL,
  `prezime` VARCHAR(20) NOT NULL,
  `email` VARCHAR(50) NULL,
  `katedra` VARCHAR(50) NULL,
  `godinaZaposlenja` YEAR NULL,
  `opis` VARCHAR(1024) NULL,
  PRIMARY KEY (`idPred`),
  UNIQUE INDEX `idPred_UNIQUE` (`idPred` ASC));

  CREATE TABLE `student-advisor`.`polozio` (
  `idClan` INT NOT NULL,
  `idKurs` INT NOT NULL,
  `ocena` INT NULL,
  `datum` DATE NULL,
  `zanimljivost` INT NULL,
  `korisnost` INT NULL,
  `tezina` INT NULL,
  `preporuka` INT NULL,
  PRIMARY KEY (`idClan`, `idKurs`),
  INDEX `Polozio_idKurs_idx` (`idKurs` ASC),
  CONSTRAINT `Polozio_idClan`
    FOREIGN KEY (`idClan`)
    REFERENCES `student-advisor`.`clan` (`idClan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Polozio_idKurs`
    FOREIGN KEY (`idKurs`)
    REFERENCES `student-advisor`.`kurs` (`idkurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	CREATE TABLE `student-advisor`.`komentar` (
  `idKom` INT NOT NULL AUTO_INCREMENT,
  `idClan` INT NOT NULL,
  `idKurs` INT NOT NULL,
  `tekst` VARCHAR(1024) NULL,
  `datum` DATE NULL,
  `brPodrzavanja` INT NULL,
  `brNepodrzavanja` INT NULL,
  PRIMARY KEY (`idKom`),
  UNIQUE INDEX `idKom_UNIQUE` (`idKom` ASC),
  INDEX `Komentar_idClan_idx` (`idClan` ASC),
  CONSTRAINT `Komentar_idClan`
    FOREIGN KEY (`idClan`)
    REFERENCES `student-advisor`.`clan` (`idClan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Komentar_idKurs`
    FOREIGN KEY (`idKom`)
    REFERENCES `student-advisor`.`kurs` (`idkurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	CREATE TABLE `student-advisor`.`podkomentar` (
  `idKom` INT NOT NULL,
  `redniBroj` INT NOT NULL,
  `idClan` INT NOT NULL,
  `tekst` VARCHAR(1024) NULL,
  `datum` DATE NULL,
  PRIMARY KEY (`idKom`, `redniBroj`),
  INDEX `Podkomentar_idClan_idx` (`idClan` ASC),
  CONSTRAINT `Podkomentar_idKom`
    FOREIGN KEY (`idKom`)
    REFERENCES `student-advisor`.`komentar` (`idKom`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `Podkomentar_idClan`
    FOREIGN KEY (`idClan`)
    REFERENCES `student-advisor`.`clan` (`idClan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	CREATE TABLE `student-advisor`.`poruka` (
  `idClan1` INT NOT NULL,
  `idClan2` INT NOT NULL,
  `datum` DATE NULL,
  `tekst` VARCHAR(1024) NULL,
  `procitana` TINYINT NULL,
  PRIMARY KEY (`idClan1`, `idClan2`),
  INDEX `Poruka_idClan2_idx` (`idClan2` ASC),
  CONSTRAINT `Poruka_idClan1`
    FOREIGN KEY (`idClan1`)
    REFERENCES `student-advisor`.`clan` (`idClan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Poruka_idClan2`
    FOREIGN KEY (`idClan2`)
    REFERENCES `student-advisor`.`clan` (`idClan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	CREATE TABLE `student-advisor`.`banovanje` (
  `idClan` INT NOT NULL,
  `datum` DATE NULL,
  `razlog` VARCHAR(1024) NULL,
  PRIMARY KEY (`idClan`),
  CONSTRAINT `Banovanje_idClan`
    FOREIGN KEY (`idClan`)
    REFERENCES `student-advisor`.`clan` (`idClan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	CREATE TABLE `student-advisor`.`unapredjivanje` (
  `idClan` INT NOT NULL,
  `tip` CHAR(1) NOT NULL,
  `opis` VARCHAR(1024) NULL,
  `trebaSaglasnost` CHAR(1) NOT NULL,
  PRIMARY KEY (`idClan`),
  CONSTRAINT `Unapredjivanje_idClan`
    FOREIGN KEY (`idClan`)
    REFERENCES `student-advisor`.`clan` (`idClan`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

	CREATE TABLE `student-advisor`.`podrzavanje` (
  `idClan` INT NOT NULL,
  `idKom` INT NOT NULL,
  `tip` CHAR(1) NULL,
  PRIMARY KEY (`idClan`, `idKom`),
  INDEX `Podrzavanje_idKom_idx` (`idKom` ASC),
  CONSTRAINT `Podrzavanje_idClan`
    FOREIGN KEY (`idClan`)
    REFERENCES `student-advisor`.`clan` (`idClan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Podrzavanje_idKom`
    FOREIGN KEY (`idKom`)
    REFERENCES `student-advisor`.`komentar` (`idKom`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	CREATE TABLE `student-advisor`.`predaje` (
  `idKurs` INT NOT NULL,
  `idPred` INT NOT NULL,
  `datumPoc` DATE NULL,
  PRIMARY KEY (`idKurs`, `idPred`),
  INDEX `Predaje_idPred_idx` (`idPred` ASC),
  CONSTRAINT `Predaje_idKurs`
    FOREIGN KEY (`idKurs`)
    REFERENCES `student-advisor`.`kurs` (`idkurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Predaje_idPred`
    FOREIGN KEY (`idPred`)
    REFERENCES `student-advisor`.`predavac` (`idPred`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

  