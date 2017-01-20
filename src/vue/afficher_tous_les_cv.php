<?php
    require_once 'vue/header.php';
    echo '<br/>';
    echo $reponse;
?>

    <?php
        echo '<br/> <br/>';
        foreach ($liste_cv_bd as $cv_a_afficher)
        {
    ?>
            <div class="image-box team-member style-2 shadow bordered light-gray-bg text-center" style="display: inline-block; width: 18%; margin-left: 20px;">
                <a href="../afficher_cv?numero=<?php echo $cv_a_afficher->get_id_cv()?>">
                    <img src="vue/images_site/cv.png">
                </a>
                <div class="body">
                    <h3 class="margin-clear" style="text-align: justify"> <?php echo $cv_a_afficher->__toString();?></h3>
                </div>
            </div>
    <?php
        }
    ?>

    <?php
        echo '<br/> <br/>';
        if($nbre_pages == 0)
        {
            echo '';
        }
        else
        {
            echo '<p align="center" style="bottom:0 position: absolute color:black;">Page : ';
            if($nbre_pages == 1)
            {
                echo ' <a href="../afficher_tous_les_cv?page='. $nbre_pages . '">' . $nbre_pages . '</a> ';
            }
            else if ($i == $nbre_pages)
            {

                if ($i > 1 && --$i != 1)
                {
                    echo ' <a href="../afficher_tous_les_cv?page=' . --$i . '"> Precedent </a> ';
                    echo '    ';
                    echo ' <a href="../afficher_tous_les_cv?page=1"> 1 </a> ';
                    echo '   ';
                    echo ' <a href="../afficher_tous_les_cv?page=' . $nbre_pages . '"> ' . $nbre_pages . '</a> ';
                }
                else
                {
                    echo ' <a href="../afficher_tous_les_cv?page=1"> 1 </a> ';
                    echo '   ';
                    echo ' <a href="../afficher_tous_les_cv?page=' . $nbre_pages . '"> ' . $nbre_pages . '</a> ';
                }

            }
            else
            {
                if ($i > 1)
                {
                    echo ' <a href="../afficher_tous_les_cv?page=' . --$i . '"> Precedent </a> ';
                    echo '    ';
                }
                echo ' <a href="../afficher_tous_les_cv?page=' . $i . '"> ' . $i . '</a> ';
                echo '  ';
                echo ' <a href="../afficher_tous_les_cv?page=' . $suivant . '"> ' . $suivant . '</a> ';
                if ($suivant != $nbre_pages)
                {
                    echo ' <a href="../afficher_tous_les_cv?page=' . $nbre_pages . '"> ' . $nbre_pages . '</a> ';
                    echo ' ... ';
                }
                echo '    ';
                echo ' <a href="../afficher_tous_les_cv?page=' . $suivant . '"> Suivant </a> ';
            }
            echo '</p>';
        }
    ?>

<?php
    require_once 'vue/footer.php';
?>
