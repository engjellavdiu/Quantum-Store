<?php
class Product{
    protected $id;
    protected $emri;
    protected $pershkrimi;
    protected $sasia;
    protected $kategoria;
    protected $image;

    public function __construct($id,$emri,$pershkrimi,$sasia,$kategoria,$image){
        $this->id=$id;
        $this->emri=$emri;
        $this->pershkrimi=$pershkrimi;
        $this->sasia=$sasia;
        $this->kategoria=$kategoria;
        $this->image=$image;
    }

    public function getID(){
        return $this->id;
    }
    public function getEmri(){
        return $this->emri;
    }
    public function getPershkrimi(){
        return $this->pershkrimi;
    }
    public function getSasia(){
        return $this->sasia;
    }
    public function getKategoria(){
        return $this->kategoria;
    }
    public function getImage(){
        return $this->image;
    }
}