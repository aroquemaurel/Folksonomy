<?php
function removeDatabase() {
	mysql_query('drop table if exists document') or die(mysql_error());
	mysql_query('drop table if exists terme') or die(mysql_error());
	mysql_query('drop table if exists decrit') or die(mysql_error());
	mysql_query('drop table if exists utilisateur') or die(mysql_error());
	mysql_query('drop table if exists sauvegarde') or die(mysql_error());
}

function createDatabase() {
	mysql_query('
		CREATE TABLE IF NOT EXISTS `decrit` (
			  `numeroD` varchar(150) NOT NULL,
			    `numeroT` varchar(150) NOT NULL,
				`idUtilisateur` int(11) NOT NULL,
				  PRIMARY KEY (`numeroD`,`numeroT`, `idUtilisateur`)
			  ) ENGINE=MyISAM DEFAULT CHARSET=latin1');

	mysql_query('CREATE TABLE IF NOT EXISTS `document` (
		  `numeroD` varchar(150) NOT NULL,
		    `titre` varchar(255) NOT NULL,
			  `url` varchar(255) NOT NULL,
			    PRIMARY KEY (`numeroD`)
			) ENGINE=MyISAM DEFAULT CHARSET=latin1');

	mysql_query('CREATE TABLE IF NOT EXISTS `terme` (
		  `numeroT` varchar(150) NOT NULL,
		    `motCle` varchar(255) NOT NULL,
			  PRIMARY KEY (`numeroT`)
		  ) ENGINE=MyISAM DEFAULT CHARSET=latin1');

	mysql_query('CREATE TABLE IF NOT EXISTS `sauvegarde` (
		  `numeroD` varchar(150) NOT NULL,
		    `idUtilisateur` int(11) NOT NULL,
			`description` text NULL,
			  PRIMARY KEY (`idUtilisateur`, `numeroD`)
		  ) ENGINE=MyISAM DEFAULT CHARSET=latin1') or die(mysql_error());

	mysql_query('CREATE TABLE IF NOT EXISTS `utilisateur` (
		  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
		    `pseudo` varchar(255) NOT NULL,
		    `mdp` varchar(255) NOT NULL,
		    `adresseMail` varchar(255) NOT NULL,
			  PRIMARY KEY (`idUtilisateur`)
		  ) ENGINE=MyISAM DEFAULT CHARSET=latin1') or die(mysql_error()); 

	mysql_query('ALTER TABLE decrit ADD CONSTRAINT FOREIGN KEY(numeroD) REFERENCES document(numeroD)') or die(mysql_error());
	mysql_query('ALTER TABLE decrit ADD CONSTRAINT FOREIGN KEY(numeroT) REFERENCES terme(numeroT)') or die(mysql_error());
	mysql_query('ALTER TABLE decrit ADD CONSTRAINT FOREIGN KEY(idUtilisateur) REFERENCES utilisateur(idUtilisateur)') or die(mysql_error());
	mysql_query('ALTER TABLE sauvegarde ADD CONSTRAINT FOREIGN KEY(idUtilisateur) REFERENCES utilisateur(idUtilisateur)') or die(mysql_error());
	mysql_query('ALTER TABLE sauvegarde ADD CONSTRAINT FOREIGN KEY(numeroD) REFERENCES document(numeroD)') or die (mysql_error());
}
