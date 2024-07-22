<?php
    class Randevu {
        public $id;
        public $musteri;
        public $calisan;
        public $hizmet;
        public $tarih;
        public $odemeyontemi;
        public $randevu_notu;

        public function __construct($id, Musteri $musteri, Calisan $calisan, Hizmet $hizmet, $tarih,
         OdemeYontemi $odemeyontemi, $randevu_notu)
        {
            $this->id = $id;
            $this->musteri = $musteri;
            $this->calisan = $calisan;
            $this->hizmet = $hizmet;
            $this->tarih = $tarih;
            $this->odemeyontemi = $odemeyontemi;
            $this->randevu_notu = $randevu_notu;
        }

        public function setMusteri(Musteri $musteri) {
            $this->musteri = $musteri;
        }

        public function setCalisan(Calisan $calisan) {
            $this->calisan = $calisan;
        }

        public function setHizmet(Hizmet $hizmet) {
            $this->hizmet = $hizmet;
        }

        public function setTarih($tarih) {
            $this->tarih = $tarih;
        }

        public function setOdemeYontemi(OdemeYontemi $odemeyontemi) {
            $this->odemeyontemi = $odemeyontemi;
        }

        public function setRandevuNotu($randevu_notu) {
            $this->randevu_notu = $randevu_notu;
        }
    }
?>