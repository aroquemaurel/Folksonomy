select document.numeroD, titre, url, motCle, description 
from document 

-- Jointures de l'intégralité du modèle
left join decrit on decrit.numeroD = document.numeroD
left join terme on terme.numeroT = decrit.numeroT
left join utilisateur on utilisateur.idUtilisateur = decrit.idUtilisateur
left join sauvegarde on sauvegarde.idUtilisateur = utilisateur.idUtilisateur 
-- Selection de l'utilisateur
where utilisateur.idUtilisateur = &parametreIdUtilisateur
-- On joint également la table document
	and   document.numeroD = sauvegarde.numeroD
order by titre;
