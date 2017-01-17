<?php require_once('email_header.php'); ?>

            <!-- Banner Start -->
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                <tr>
                    <td>
                        <table bgcolor="#fafafa" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse; margin-top: 3%;">
                            <tr>
                                <td>
                                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                        <tr>
                                            <td align="center" bgcolor="#ffffff">
                                                <p>Bonjour %PRENOM% %NOM%</p>
                                                <p>Vous avez fais la demande d'un nouveau mot de passe. Afin de pouvoir le modifier, merci de cliquer <a href="$URL%">ici</a>.</p>
                                                <p>Si vous n'êtes pas a l'origine de cette demande, veuillez ignorer cet e-mail.</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- Banner End -->

<?php require_once('email_footer.php') ?>