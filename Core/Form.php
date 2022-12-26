<?php
namespace App\Core;

class Form
{
    public static function validate(array $form, array $champs)
    {
        // On parcourt les champs
        foreach($champs as $champ) {
            // Si le champ est absent 
            if (!isset($form[$champ])) {
                return false;
                // ou vide dans le formulaire
            } else if (empty($form[$champ])) {
                if ($form[$champ] !== '0') {
                    return false;
                }
            }
            $form[$champ] = strip_tags($form[$champ]);
        }
        return true;
    }

    public static function validateIfEmptyNull(array $form, array $champs)
    {
        // On parcourt les champs
        foreach($champs as $champ) {
            // Si le champ est absent dans le formulaire
            if (!isset($form[$champ])) {
                return false;
            } else if (empty($form[$champ])) {
                if ($form[$champ] !== '0') {
                    $form[$champ] = null;
                }
            }
            $form[$champ] = strip_tags($form[$champ]);
        }
        return true;
    }
}

?>