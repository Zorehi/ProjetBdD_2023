# ProjetBdD_2023
 
Pour ajouter le virtualhost il faut ajouter le chemin racine du repository

### Exemple de chemin d'installation

    C:\wamp64\www\ProjetBdD_2023

## Utilisation de la fonction mail PHP

Pour que vous puissiez envoyer des mails si vous êtes en local, il faut télécharger [fake sendmail](https://github.com/sendmail-tls1-2/main/blob/master/Sendmail_v33_TLS1_2.zip) et le mettre dans un dossier `sendmail` dans le répertoire de WAMP.

Ensuite il faudra modifier dans le fichier `sendmail.ini`

    smtp_server=le nom de domaine smtp du serveur de votre adresse mail
    smtp_port=le port du serveur de votre adresse mail
    auth_username=votre adresse mail
    auth_password=votre mot de passe

### Voici une liste de fournisseurs d'adresse mail avec leurs paramètres smtp

|FOURNISSEUR|SMTP|
|--:|:--:|
|**Bouygues**|smtp.bbox.fr (587)|
|**Free**|smtp.free.fr (465)|
|**Google**|smtp.gmail.com (587)|
|**Laposte**|smtp.laposte.net (465)|
|**Orange**|smtp.orange.fr (465)|
|**Outlook**|smtp-mail.outlook.com (587)|
|**OVH**|ssl0.ovh.net (465)|
|**SFR**|smtp.sfr.fr (465)|
|**Yahoo**|smtp.mail.yahoo.com (587)|

### Attention

Pour Google il faut avoir une double authentification et créer un mot de passe d'application à renseigner dans auth_password et pas votre mot de passe.

Ensuite modifier le fichier `php.ini` pour changer le `sendmail_path` vers l'exécutable `sendmail.exe`

### Exemple

    sendmail_path ="C:\wamp64\sendmail\sendmail.exe"

### Et voilà tout devrait être fonctionnel maintenant `Enjoy!!!`   