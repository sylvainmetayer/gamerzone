<?php

class CitationManager
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add($citation)
    {
    }

    public function countCitations()
    {
        $sql = 'SELECT COUNT(cit_num) as nbCitations FROM citation';
        $requete = $this->db->query($sql);
        $requete = $requete->fetch(PDO::FETCH_ASSOC);

        return $requete['nbCitations'];
    }

    public function listerCitations()
    {
        $listCitations = array();

        $sql = 'SELECT per_nom, cit_libelle, cit_date, AVG(vot_valeur)
            FROM citation c JOIN personne p ON c.per_num=p.per_num JOIN vote v ON c.cit_num=v.cit_num
            WHERE c.cit_valide=1 AND c.cit_date_valide IS NOT NULL';
        $requete = $this->db->query($sql);

        while ($citation = $requete->fetch(PDO::FETCH_OBJ)) {
            $listCitation[] = new Citation($citation);
        }

        return $listCitations;
        $requete->closeCursor();
    }
}
