<?php
    namespace App\Models;

    use App\Core\Database;

    class Entity extends Database {
        protected $table;
        protected $idName = "";

        private $db;
        private $type = 'Entities';

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
         * Sélection d'un enregistrements suivant l'id
         * @param integer $id Id de l'enregistrement
         * @return array Tableau des enregistrements trouvés
         */
        public function findById(int $id)
        {
            // On exécute la requête
            return $this->requete("SELECT * FROM {$this->table} WHERE ". $this->idName ." = {$id}")->fetch();
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
                // INSERT INTO users (email, firstname, lastname) VALUES (?, ?, ?)
                if($valeur != null && !in_array($champ, ['db', 'table', 'idName', 'type'])) {
                    $champs[] = $champ;
                    $inter[] = "?";
                    $valeurs[] = $valeur;
                }
            }

            // On transforme le tableau "champs" en une chaine de caractères
            $liste_champs = implode(', ', $champs);
            $liste_inter = implode(', ', $inter);

            // On exécute la requête
            $this->requete("INSERT INTO {$this->table} ($liste_champs) VALUES ($liste_inter)", $valeurs);
            return (int) $this->db->lastInsertId($this->table);
        }

        /**
         * Mise à jour d'un enregistrement suivant un tableau de données
         * @return bool
         */
        public function update()
        {
            $champs = [];
            $valeurs = [];

            // On boucle pour éclater le tableau
            foreach($this as $champ => $valeur) {
                // UPDATE users SET email = ?, firstname = ?, lastname = ? WHERE id_users = ?
                if($valeur != null && !in_array($champ, ['db', 'table', 'idName', 'type'])){
                    $champs[] = "$champ = ?";
                    $valeurs[] = $valeur;
                }
            }
            $idName = $this->idName;
            $valeurs[] = $this->$idName;

            // On transforme le tableau "champs" en une chaine de caractères
            $liste_champs = implode(', ', $champs);

            // On exécute la requête
            return $this->requete('UPDATE '.$this->table.' SET '. $liste_champs.' WHERE '. $this->idName .' = ?', $valeurs);
        }

        /**
         * Suppression d'un enregistrement
         * @param int $id id de l'enregistrement à supprimer
         * @return bool 
         */
        public function delete(int $id) 
        {
            return $this->requete('DELETE FROM '.$this->table.' WHERE '. $this->idName .' = ?', [$id]);
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
        public function getIdName()
        {
                return $this->idName;
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