<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryClass
 *
 * @author Zhi Cai
 */
class CategoryClass {

    //put your code here

    private $categoryID;
    private $categoryName;
    private $colorScheme;
    private $questionCount;

    public function getCategoryID() {
        return $this->categoryID;
    }

    public function getCategoryName() {
        return $this->categoryName;
    }

    public function getColorScheme() {
        return $this->colorScheme;
    }

    public function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }

    public function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
    }

    public function setColorScheme($colorScheme) {
        $this->colorScheme = $colorScheme;
    }

    public function getQuestionCount() {
        return $this->questionCount;
    }

    public function setQuestionCount($questionCount) {
        $this->questionCount = $questionCount;
        return $this;
    }

}
