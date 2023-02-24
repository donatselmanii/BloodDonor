<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}

class kategoriaCRUDQyteti extends dbcon
{
    private $kategoriaID;
    private $emriKategoris;
    private $pershkrimiKategoris;
    private $dbConn;

    public function __construct($kategoriaID = '', $emriKategoris = '', $pershkrimiKategoris = '')
    {
        $this->kategoriaID = $kategoriaID;
        $this->emriKategoris = $emriKategoris;
        $this->pershkrimiKategoris = $pershkrimiKategoris;

        $this->dbcon = $this->connDB();
    }

    public function getKategoriaID()
    {
        return $this->kategoriaID;
    }

    public function setKategoriaID($kategoriaID)
    {
        $this->kategoriaID = $kategoriaID;
    }

    public function getEmriKategoris()
    {
        return $this->emriKategoris;
    }

    public function setEmriKategoris($emriKategoris)
    {
        $this->emriKategoris = $emriKategoris;
    }

    public function getPershkrimiKategoris()
    {
        return $this->pershkrimiKategoris;
    }

    public function setPershkrimiKategoris($pershkrimiKategoris)
    {
        $this->pershkrimiKategoris = $pershkrimiKategoris;
    }

    public function insertoKategorinLajmit()
    {
        try {
        $this->setEmriKategoris($_SESSION['emriKategoriseQyteti']);
            $this->setPershkrimiKategoris($_SESSION['pershkrimiKategoriseQyteti']);

            $sql = "INSERT INTO `kategoriaqytetit`(`emriKategoris`, `pershkrimiKategoris`) VALUES (?,?)";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->emriKategoris, $this->pershkrimiKategoris]);

            echo '<script>document.location="../admin/shtoKategorin.php"</script>';
            $_SESSION['katUShtua'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function perditesoKategorin()
    {
        try {
            $sql = "UPDATE `kategoriaqytetit` set `emriKategoris` = ?, `pershkrimiKategoris` = ? WHERE kategoriaID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->emriKategoris, $this->pershkrimiKategoris, $this->kategoriaID]);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function shfaqKategorinSipasID()
    {
        try {
            $sql = "SELECT * FROM kategoriaqytetit where kategoriaID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->kategoriaID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqKategorin()
    {
        try {
            $sql = "SELECT * FROM kategoriaqytetit";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqKategorinSelektim()
    {
        try {
            $kategorit = $this->shfaqKategorin();


            echo '<select class="dropdown1" name="kategoriaQyteti">
                <option value="Prishtine">Zgjedhni Kategorin</option>
            ';
            foreach ($kategorit as $kategoria) {
                echo '<option value="' . $kategoria['emriKategoris'] . '">' . $kategoria['emriKategoris'] . '</option>';
            }
            echo '</select>';

        } catch (Exception $e) {
            return $e->getMessage();
        }


    }

    public function fshijKategorinSipasID()
    {
        try {
            $sql = "DELETE FROM kategoriaqytetit WHERE kategoriaID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->kategoriaID]);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}



?>