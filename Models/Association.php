<?php
namespace App\Models;

use App\Models\Model as ModelsModel;

class Association extends ModelsModel {
    
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
     * Mise à jour d'un enregistrement suivant un tableau de données
     * @return bool
     */
    public function update()
    {
        $champs = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach($this as $champ => $valeur) {
            // UPDATE annonces SET titre = ?, description = ?, actif = ? WHERE id= ?
            if($valeur !== null && $champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != "champs"){
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
}
?>