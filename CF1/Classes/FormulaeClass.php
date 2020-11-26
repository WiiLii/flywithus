<?php

class FormulaeClass {
    //put your code here
    private $id;
    private $formulaeName;
    private $formulae;
    
    public function getId() {
        return $this->id;
    }

    public function getFormulae() {
        return $this->formulae;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFormulae($formulae) {
        $this->formulae = $formulae;
    }

    
    public function getFormulaeName() {
        return $this->formulaeName;
    }

    public function setFormulaeName($formulaeName) {
        $this->formulaeName = $formulaeName;
    }



    
}
