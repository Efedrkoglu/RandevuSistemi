<?php 
    class Calisan {
        public $id;
        public $isim;
        public $email;
        public $calisma_baslangic;
        public $calisma_bitis;
        public $maas;
        public $ise_giris_tarihi;
        public $tel_no;

        public function __construct($id, $isim, $email, $calisma_baslangic, $calisma_bitis, $maas, $ise_giris_tarihi, $tel_no) {
            $this->id = $id;
            $this->isim = $isim;
            $this->email = $email;
            $this->calisma_baslangic = $calisma_baslangic;
            $this->calisma_bitis = $calisma_bitis;
            $this->maas = $maas;
            $this->ise_giris_tarihi = $ise_giris_tarihi;
            $this->tel_no = $tel_no;
        }

        public function setIsim($isim) {
            $this->isim = $isim;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setCalismaBaslangic($calisma_baslangic) {
            $this->calisma_baslangic = $calisma_baslangic;
        }

        public function setCalismaBitis($calisma_bitis) {
            $this->calisma_bitis = $calisma_bitis;
        }

        public function setMaas($maas) {
            $this->maas = $maas;
        }

        public function setTelNo($tel_no) {
            $this->tel_no = $tel_no;
        }

        public function setIseGirisTarihi($ise_giris_tarihi) {
            $this->ise_giris_tarihi = $ise_giris_tarihi;
        }
    }
?>