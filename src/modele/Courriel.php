<?php
/**
 * Classe statique d'envoi de mails au format MIME 1.0
 * Gestion du texte et du format HTML
 */
class Courriel
{
    const EXPEDITEUR_PAR_DEFAUT = "CV-Direct <cv-direct@alwaysdata.net>";

    /**
     * Fonction d'envoi de mails de recuperation de mot de passe
     * @param String $destinataire  Destinataire du message
     * @param String $utilisateur   Nom et prenom de l'utilisateur
     * @param String $expediteur    Expediteur du message
     * 
     * @return bool                 Retourne vrai si le mail a correctement ete envoye.
     */
    public static function envoyer_courriel_mot_de_passe_oublie($destinataire, $utilisateur, $token, $expediteur = self::EXPEDITEUR_PAR_DEFAUT)
    {
        $sujet = "Demande nouveau mot de passe";
        $url = 'http://cv-direct.alwaysdata.net/truc-'.$token;

        $contenu_texte = file_get_contents("../vue/emails/texte/mot_de_passe_oublie.txt");
        $contenu_texte = str_replace("%UTILISATEUR%", $utilisateur, $contenu_texte);
        $contenu_texte = str_replace("%URL%", $url, $contenu_texte);

        $contenu_html = file_get_contents("http://cv-direct.alwaysdata.net/vue/html/email_oubli_mdp.php");
        $contenu_html = str_replace("%UTILISATEUR%", $utilisateur, $contenu_html);
        $contenu_html = str_replace("%URL%", $url, $contenu_html);

        return self::envoyer_courriel($destinataire, $sujet, $contenu_texte, $contenu_html, $expediteur);
    }



    /**
     * Fonction d'envoi de mails de recuperation de mot de passe
     *
     * @param string $destinataire  Destinataire du message
     * @param string $expediteur    Expediteur du message
     *
     * @return bool                 Retourne vrai si le mail a correctement ete envoye.
     */
    public static function envoyer_courriel_demande_disponibilite($destinataire, $utilisateur, $expediteur = self::EXPEDITEUR_PAR_DEFAUT)
    {
        $sujet = $utilisateur . ", un emploi vous correspond !";

        $contenu_texte = file_get_contents("../vue/emails/texte/courriel_demande_disponibilite.txt");
        $contenu_texte = str_replace("%USER%", $utilisateur, $contenu_texte);

        $contenu_html = file_get_contents("http://cv-direct.alwaysdata.net/vue/emails/html/courriel_demande_disponibilite.php");
        $contenu_html = str_replace("%USER%", $utilisateur, $contenu_html);

        return self::envoyer_courriel($destinataire, $sujet, $contenu_texte, $contenu_html, $expediteur);
    }



    /**
     * Fonction générale d'envoi de mails au format MIME 1.0
     *
     * @param string $destinataire      Destinataire du message
     * @param string $sujet             Expéditeur du message
     * @param string $contenu_texte     Contenu du format texte (norme MIME 1.0)
     * @param string $contenu_HTML      Contenu du format HTML (norme MIME 1.0)
     * @param string $expediteur        Expéditeur du message, EXPEDITEUR_PAR_DEFAUT si non-renseigné
     * @return bool
     */
    private static function envoyer_courriel($destinataire, $sujet, $contenu_texte, $contenu_HTML, $expediteur = self::EXPEDITEUR_PAR_DEFAUT)
    {
        //Génération du séparateur pour le format MIME
        $limite = md5(uniqid (rand()));

        // Création de l'en-tête du mail
        $header = "From: ". $expediteur ."\n";
        $header .= "MIME-Version: 1.0\n";
        $header .= "Content-Type: multipart/alternative; boundary=\"". $limite ."\"";

        // Création du message du mail
        $message = "--" . $limite . "\n";
        $message .= "Content-Type: text/plain\n";
        $message .= $contenu_texte;
        $message .= "\n\n--" . $limite . "\n";
        $message .= "Content-Type: text/html;\n";
        $message .= "charset=\"utf-8\";\n";
        $message .= $contenu_HTML;
        $message .= "\n--" . $limite . "--";

        // Envoi du courriel
        return mail($destinataire, $sujet, $message, $header);
    }
}