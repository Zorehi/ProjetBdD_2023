<?php
namespace App\Core;

class Form
{
    public static function validate(array $form, array $champs)
    {
        // On parcourt les champs
        foreach($champs as $champ) {
            // Si le champ est absent ou vide dans le formulaire
            if (!isset($form[$champ]) || empty($form[$champ])) {
                // On sort en retournant false
                return false;
            }
        }
        return true;
    }
}

?>