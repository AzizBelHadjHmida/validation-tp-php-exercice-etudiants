    <?php
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
        public function afficher_notes()
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
        } ?>
                    </tbody>
                </table>
            </div>


            <?php
            $e1 = new Etudiant("aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]);
            $e2 = new Etudiant("skander", [15, 9, 8, 16]);
            $e1->afficher_notes();
            $e2->afficher_notes();
            ?>