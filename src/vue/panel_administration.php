<?php
require_once 'header.php';
?>
<?php
// $NbrCol : le nombre de colonnes
// $NbrLigne : calcul automatique AVANT affichage
// -------------------------------------------------------
// (exemple)
$NbrCol = count(Recruteur::recuperation_nouveaux_inscrits());
$tableau = Recruteur::recuperation_nouveaux_inscrits();
// -------------------------------------------------------
// nombre de cellules à remplir
$NbreData = count($tableau);
// -------------------------------------------------------
// calcul du nombre de lignes
if (round($NbreData/$NbrCol)!=($NbreData/$NbrCol)) {
    $NbrLigne = round(($NbreData/$NbrCol)+0.5);
} else {
    $NbrLigne = $NbreData/$NbrCol;
}
// -------------------------------------------------------
// affichage
if ($NbreData != 0)
{
    $k = 0; // indice du tableau
    ?>
    <table border="1">
        <tbody>
        <?php	for ($i=1; $i<=$NbrLigne; $i++)
        { // ligne $i
            ?>		<tr>
            <?php		for ($j=1; $j<=$NbrCol; $j++)
            { // colonne $j
                if ($k<$NbreData) {
                    ?>			<td>
                        <?php			// -------------------------

                        echo $tableau[$k];
                        // -------------------------
                        ?>			</td>
                    <?php			$k++;
                } else {
                    ?>			<td>&nbsp;</td>
                <?php			}
            }
            ?>		</tr>
        <?php	}
        ?>
        </tbody>
    </table>
    <?php
} else { ?>
    Aucun nouveau inscrit
    <?php
}
?>

<?php
require_once 'footer.php';
?>
