<?php
if (isset($_GET['l'])) {
    $maq = $_GET['l'];
} else {
    $maq = "Fiches-maquillage";
}

function allFiches($nomAtelier, $db) {
    $fiche = Model::load("FicheM");
    $d = array(
        "table" => "fiches,ateliers",
        "conditions" => "atelier_id=id_atelier AND nom_atelier=\"$nomAtelier\""
    );
    $fiche = $fiche->find($d, $db);
    return $fiche;
}

function allphoto($atelier, $db) {

    $photoFiches = Model::load("ImageM");
    $d = array(
        "table" => "ateliers,images",
        "conditions" => "ateliers_id=id_atelier AND index_fiche=1 AND nom_atelier=\"$atelier\"",
        "order" => "id_images ASC"
    );
    $photoFiches = $photoFiches->find($d, $db);
    return $photoFiches;
}

function photoFiche($fiche, $db) {
    $photoFiche = Model::load("ImageM");
    $d = array(
        "table" => "images,fiches",
        "conditions" => "id_fiche=fiches_id AND fiches.titre=\"$fiche\" AND index_fiche=1"
    );
    $photoFiche = $photoFiche->find($d, $db);
    return $photoFiche;
}

$ficheMaquillage = allFiches($maq, $db);
if (empty($ficheMaquillage[0])) {
    header("Location:pro.html");
}
$phot = allphoto($maq, $db);

if (isset($_GET['r']) && $_GET['r'] == 'pdf') {
    if (isset($_GET['s']) && is_numeric($_GET['s'])) {
        $model = Model::load("ImageM");
        $d = array(
            "conditions" => "id_images = " . $_GET['s'],
        );
        $carte = $model->find($d, $db);
      //  echo $carte[0]->getEmplacements();
        if (!isset($carte)) {
            header('location: Atelier-Cartes-d-invitation.html');
        }
    } else {
        header('location: Atelier-Cartes-d-invitation.html');
    }
    ob_start();
    ?>
    <style>
        table{
            width:100%;
        }
        .tab{
            border:1px solid black;
            border-collapse: collapse;

        }
        .tab td{
            border: 1px solid black;
            height: 25px;
            padding-left: 5px
        }
        .center{
            text-align: center;

        }
    </style>
    <page backtop='3mm' backleft='5mm' backright='10mm' backbottom='3mm'>
        <table>
            <tr>
                <td style="width:50%"><img src="./webroot/image/<?php echo $carte[0]->getEmplacements(); ?>" style="width:100%"/></td>
                <td style="width:50%"><img src="./webroot/image/<?php echo $carte[0]->getEmplacements(); ?>" style="width:100%"/></td>
            </tr>
            <tr>
                <td style="width:50%" class="test"><img src="./webroot/image/<?php echo $carte[0]->getEmplacements(); ?>" style="width:100%"/></td>
                <td style="width:50%"><img src="./webroot/image/<?php echo $carte[0]->getEmplacements(); ?>" style="width:100%"/></td>
            </tr>
        </table>
    </page>
<?php
    $content = ob_get_clean();
    $chemin = './webroot/image/'.$carte[0]->getEmplacements();
    $chemin = substr($chemin,0,-4);
    // convert in PDF
    require_once('./bin/html2pdf_v4.03/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'A4', 'fr');
       // $html2pdf->setModeDebug();
       // $html2pdf->setTestIsImage(false);
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content);
        $html2pdf->Output($chemin.'.pdf','F');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
     $nom='carte-invitation';
                     $fichier = $chemin.'.pdf'; // le fichier en question 
                     header('Content-type: application/pdf');
                     header('Content-Disposition:attachment; filename="'.$nom.'.pdf"');
                     readfile($fichier);
}
?>
    