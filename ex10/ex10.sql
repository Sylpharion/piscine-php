SELECT `titre` AS 'Titre', `resum` AS 'Resume', `annee_prod` AS 'annee_prod' from `film` INNER JOIN `genre` WHERE  genre.id_genre = 25 AND genre.id_genre = film.id_genre;
