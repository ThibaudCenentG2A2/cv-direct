<?php
/**
 * Classe statique d'envoi de mails au format MIME 1.0
 * Gestion du texte et du format HTML
 */
class Courriel
{
    const EXPEDITEUR_PAR_DEFAUT = "contact@cv-direct.fr";

    /*
     * Fonction d'envoi de mails de récupération de mot de passe
     * @param $destinataire
     * @param string $expediteur

    public static function envoyerCourrielMotDePasseOublie($destinataire, $expediteur = self::EXPEDITEUR_PAR_DEFAUT)
    {
        $sujet = "CV-Direct : Mot de passe oublié";
        $contenuTexte = file_get_contents("../vue/emails/texte/mot_de_passe_oublie.txt");
    }*/



    /**
     * Fonction d'envoi de mails de récupération de mot de passe
     *
     * @param string $destinataire  Destinataire du message
     * @param string $expediteur    Expéditeur du message
     *
     * @return bool                 Retourne vrai si le mail a correctement été envoyé.
     */
    public static function envoyer_courriel_demande_disponibilite($destinataire, $expediteur = self::EXPEDITEUR_PAR_DEFAUT)
    {
        $sujet = "CV-Direct : un emploi vous correspond !";
        $contenu_texte = file_get_contents("../vues/emails/texte/courriel_demande_disponibilite.txt");
        $contenu_html = null;

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
        if(mail($destinataire, $sujet, $message, $header))
            return true;
        else
            return false;
    }
}