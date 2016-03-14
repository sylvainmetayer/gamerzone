<?php

class ArticleManager
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get($idArticle)
    {
        $sql = 'SELECT a.idArticle, a.nom, nomCategorie, a.idCategorie FROM article a JOIN categorie c on a.idCategorie=c.idCategorie WHERE a.idArticle = :id;';
        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id', $idArticle);

        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_OBJ);

        return new Article($resultat);
    }

    public function getAllArticlesByCategorie($idCategorie)
    {
        $sql = 'SELECT a.idArticle, a.nom, nomCategorie, a.idCategorie FROM article a JOIN categorie c on a.idCategorie=c.idCategorie WHERE a.idCategorie = :id;';
        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id', $idCategorie);

        $requete->execute();

        while ($resultat = $requete->fetch(PDO::FETCH_OBJ)) {
            $articles[] = new Article($resultat);
        }

        return $articles;
    }
}
