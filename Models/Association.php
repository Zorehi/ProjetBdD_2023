<?php
namespace App\Models;

use App\Core\Database;

class Association extends Database {
    protected $table;
    protected $idNames = [];

    private $db;
    private $type = 'Associations';

    /**
     * Sélection de tous les enregistrements d'une table
     * @return array Tableau des enregistrements trouvés
     */
    public function findAll()
    {
        return $this->requete('SELECT * FROM '.$this->table)->fetchAll();
    }

    /**
     * Sélection de plusieurs enregistrements suivant un tableau de critères
     * @param array $criteres Tableau de critères
     * @return array Tableau des enregistrements trouvés
     */
    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];

        // On boucle pour "éclater le tableau"
        foreach($criteres as $champ => $valeur) {
            $champs[] = "$champ = ?";
            $valeurs[]= $valeur;
        }

        // On transforme le tableau en chaîne de caractères séparée par des AND
        $liste_champs = implode(' AND ', $champs);

        // On exécute la requête
        return $this->requete("SELECT * FROM {$this->table} WHERE $liste_champs", $valeurs)->fetchAll();
    }

     /**
     * Sélection d'un enregistrements suivant l'id (puisque association clé primaire composé de plusieurs clés étrangère)
     * @param array $ids Clé primaire composé de plusieurs clés étrangère de l'enregistrement
     * @return array Tableau des enregistrements trouvés
     */
    public function findByIds(array $ids) {
        $champs = [];
        $valeurs = [];

        foreach ($ids as $champ => $valeur) {
            if (in_array($champ, $this->idNames)) {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }

        // On transforme le tableau "champs" en une chaine de caractères
        $liste_champs = implode(' AND ', $champs);

        return $this->requete("SELECT * FROM {$this->table} WHERE $liste_champs", $valeurs)->fetch();
    }

    /**
     * Insertion d'un enregistrement suivant un tableau de données
     * @return bool
     */
    public function create()
    {
        $champs = [];
        $inter = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach($this as $champ => $valeur) {
            // INSERT INTO annonces (titre, description, actif) VALUES (?, ?, ?)
            if($valeur != null && !in_array($champ, ['db', 'table', 'idName', 'idNames', 'type'])) {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }

        // On transforme le tableau "champs" en une chaine de caractères
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);

        // On exécute la requête
        return $this->requete('INSERT INTO '.$this->table.' ('. $liste_champs.') VALUES ('.$liste_inter.')', $valeurs);
    }

    /**
     * Mise à jour d'un enregistrement suivant un tableau de données
     *
     * @param array $id_valeurs Clé primaire composé de plusieurs clés étrangère de l'enregistrement
     * @return bool
     */
    public function update(array $id_valeurs)
    {
        $champs = [];
        $champsID = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach($this as $champ => $valeur) {
            // UPDATE annonces SET titre = ?, description = ?, actif = ? WHERE id= ?
            if($valeur != null && !in_array($champ, ['db', 'table', 'idName', 'idNames', 'type'])){
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }

        foreach ($id_valeurs as $champ => $valeur) {
            $champsID[] = "$champ = ?";
            $valeurs[] = $valeur;
        }
        

        // On transforme le tableau "champs" en une chaine de caractères
        $liste_champs = implode(', ', $champs);
        $liste_champsID = implode(' AND ', $champsID);

        // On exécute la requête
        return $this->requete("UPDATE {$this->table} SET $liste_champs WHERE $liste_champsID", $valeurs);
    }

    /**
     * Suppression d'un enregistrement
     * @param array $ids Clé primaire composé de plusieurs clés étrangère de l'enregistrement
     * @return bool 
     */
    public function delete(array $ids) 
    {
        $champs = [];
        $valeurs = [];

        foreach ($ids as $key => $valeur) {
            $champs[] = "{$this->getIdNames()[$key]} = ?";
            $valeurs[] = $valeur;
        }

        // On transforme le tableau "champs" en une chaine de caractères
        $liste_champs = implode(' AND ', $champs);

        return $this->requete("DELETE FROM {$this->table} WHERE $liste_champs", $valeurs);
    }

    /**
     * Execute une requete
     *
     * @param string $sql la requète sql au format string
     * @param array|null $attributs les valeurs à passer à la requète
     * @return object
     */
    public function requete(string $sql, array $attributs = null)
    {
        $this->db = Database::getInstance();

        if ($attributs !== null) {
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            return $this->db->query($sql);
        }
    }

    /**
     * Hydratation des données
     * @param array $donnees Tableau associatif des données
     * @return self Retourne l'objet hydraté
     */
    public function hydrate($donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * Get the value of idName
     */ 
    public function getIdNames()
    {
            return $this->idNames;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }
}
?>