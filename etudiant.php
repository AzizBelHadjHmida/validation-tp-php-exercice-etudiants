    <?php
    session_start();



    if (!isset($_SESSION['visites'])) {
        $_SESSION['visites'] = 1;
        $messageVisite = "Bienvenue à notre plateforme ";
    } else {
        $_SESSION['visites']++;
        $n = $_SESSION['visites'];
    
        $messageVisite = "Merci pour votre fidélité <br> c est votre {$n}ieme visite.";
    }
    class Etudiant
    {
        public string $nom;
        public array $notes = [];
        public function __construct(string $nom, array $notes)
        {
            $this->nom = $nom;
            $this->notes = $notes;
        }
        public  function admis(float $note)
        {
            if ($note >= 10) {
                return true;
            } else {
                return false;
            }
        }
        public function getColor(float $note)
        {
            if ($this->admis($note) == true) {
                if ($note == 10) {
                    return "#FFC085";
                } else {
                    return "#88D4BC";
                }
            } else {
                return "#FF8FA0";
            }
        }
        public  function moyenne()
        {
            $moy = 0;
            for ($i = 0; $i < count($this->notes); $i++) {
                $moy += $this->notes[$i];
            }
            $moy /= count($this->notes);
            return $moy;
        }
        public function afficherInfos()
        { ?>
            <div class="container text-center">
                <table class="table  table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->nom ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->notes as $note) {
                            $color = $this->getColor($note);
                            if ($note == 10) {
                                $className = "table-warning";
                            } elseif ($note > 10) {
                                $className = "table-success";
                            } else {
                                $className = "table-danger";
                            }
                        ?>
                            <tr>
                                <td class=<?= $className ?>><?= $note ?></td>
                            </tr>
                        <?php }
                        $moy = $this->moyenne(); ?>
                        <tr>
                            <td class="table-primary">votre moyenne est:<?= $moy ?></td>
                        </tr>
                <?php }

        } 
        
$etudiantData = $_SESSION['etudiant'];
$etudiant = new Etudiant($etudiantData['nom'], $etudiantData['notes']);
        
        ?>
                    </tbody>
                </table>
            </div>


            <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Informations Étudiant</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body style="font-family:Arial; padding:20px;">
    <h2>Résultat de l'étudiant</h2>
    <p style="background-color:#e9ecef; padding:10px;"><?php echo $messageVisite; ?></p>

    <?php $etudiant->afficherInfos(); ?>

    <form method="get" action="login.php">
        <button type="submit" name="reset" value="1">Réinitialiser</button>
    </form>
</body>
</html>
