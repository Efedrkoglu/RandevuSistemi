<?php
    class OdemeYontemi {
        public $id;
        public $ad;

        public function __construct($id, $ad) {
            $this->id = $id;
            $this->ad = $ad;
        }

        public function setAd($ad) {
            $this->ad = $ad;
        }
    }
?>