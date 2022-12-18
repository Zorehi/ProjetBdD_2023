<?php
namespace App\Core;

class Form
{
    public static function validate(array $form, array $champs)
    {
        // On parcourt les champs
        foreach($champs as $champ) {
            // Si le champ est absent ou vide dans le formulaire
            if (!isset($form[$champ])) {
                return false;
            } else if (empty($form[$champ])) {
                if ($form[$champ] === '0') {
                    break;
                }
                return false;
            }
            $form[$champ] = strip_tags($form[$champ]);
        }
        return true;
    }
}

?>