
<?php


if (isset($_POST['id_predmeta'])) {
    $id_predmeta = $_POST['id_predmeta'];
    $prijava = Prijava::getById($id_predmeta, $conn);
    

    if ($prijava) {
        $predmet = $prijava['predmet'];
        $katedra = $prijava['katedra'];
        $sala = $prijava['sala'];
        $datum = $prijava['datum'];
    } else {
        echo "Prijava sa ovim ID-jem nije pronađena.";
    }  
}


if (isset($_POST['submit']) && $_POST['submit'] == "izmeni" && isset($_POST['id_predmeta'])) {
    $id_predmeta = $_POST['id_predmeta'];
    $prijava = Prijava::getById($id_predmeta, $conn);


    if ($prijava) {
        $predmet = $_POST['predmet'] ?? $prijava['predmet'];
        $katedra = $_POST['katedra'] ?? $prijava['katedra'];
        $sala = $_POST['sala'] ?? $prijava['sala'];
        $datum = $_POST['datum'] ?? $prijava['datum'];

        $novaPrijava = new Prijava($id_predmeta, $predmet, $katedra, $sala, $datum);
        $result = Prijava::update($novaPrijava, $conn);
        header("Location: home.php");

    
    } else {
        echo "Prijava sa ovim ID-jem nije pronađena.";
    }

}

?>