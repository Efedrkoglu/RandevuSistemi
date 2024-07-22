<?php
    class Hizmet {
        public $id;
        public $ad;
        public $aciklama;
        public $sure;
        public $fiyat;

        public function __construct($id, $ad, $aciklama, $sure, $fiyat) {
            $this->id = $id;
            $this->ad = $ad;
            $this->aciklama = $aciklama;
            $this->sure = $sure;
            $this->fiyat = $fiyat;
        }

        public function setAd($ad) {
            $this->ad = $ad;
        }

        public function setAciklama($aciklama) {
            $this->aciklama = $aciklama;
        }

        public function setSure($sure) {
            $this->sure = $sure;
        }

        public function setFiyat($fiyat) {
            $this->fiyat = $fiyat;
        }
    }
?>