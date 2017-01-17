SELECT UPPER(abonnement.nom) AS 'NOM', prenom, prix FROM abonnement, fiche_personne WHERE prix > 42 ORDER BY abonnement.nom ASC, fiche_personne.prenom ASC;
