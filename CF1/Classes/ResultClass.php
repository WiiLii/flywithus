<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultClass
 *
 * @author Zhi Cai
 */
class ResultClass {

    //put your code here

    private $eleV;
    private $eleC;
    private $fnLifeV;
    private $fnLifeC;
    private $tptV;
    private $tpcC;
    private $traV;
    private $traC;
    private $refAware;
    private $refFeed;
    private $totalC;
    private $totalEarth;

    public function getEleV() {
        return $this->eleV;
    }

    public function getEleC() {
        return $this->eleC;
    }

    public function getRefAware() {
        return $this->refAware;
    }

    public function getRefFeed() {
        return $this->refFeed;
    }

    public function setRefAware($refAware) {
        $this->refAware = $refAware;
        return $this;
    }

    public function setRefFeed($refFeed) {
        $this->refFeed = $refFeed;
        return $this;
    }

    public function getfnLifeV() {
        return $this->fnLifeV;
    }

    public function getfnLifeC() {
        return $this->fnLifeC;
    }

    public function getTptV() {
        return $this->tptV;
    }

    public function getTpcC() {
        return $this->tpcC;
    }

    public function getTraV() {
        return $this->traV;
    }

    public function getTraC() {
        return $this->traC;
    }

    public function getTotalC() {
        return $this->totalC;
    }

    public function getTotalEarth() {
        return $this->totalEarth;
    }
    
    public function setEleV($eleV) {
        $this->eleV = $eleV;
        return $this;
    }

    public function setEleC($eleC) {
        $this->eleC = $eleC;
        return $this;
    }

    public function setfnLifeV($fnLifeV) {
        $this->fnLifeV = $fnLifeV;
        return $this;
    }

    public function setfnLifeC($fnLifeC) {
        $this->fnLifeC = $fnLifeC;
        return $this;
    }

    public function setTptV($tptV) {
        $this->tptV = $tptV;
        return $this;
    }

    public function setTpcC($tpcC) {
        $this->tpcC = $tpcC;
        return $this;
    }

    public function setTraV($traV) {
        $this->traV = $traV;
        return $this;
    }

    public function setTraC($traC) {
        $this->traC = $traC;
        return $this;
    }

    public function setTotalC($totalC) {
        $this->totalC = $totalC;
        return $this;
    }

    public function setTotalEarth($totalEarth) {
        $this->totalEarth = $totalEarth;
        return $this;
    }

    private $totalCPresent;

    public function gettotalCPresent() {
        return $this->totalCPresent;
    }
    public function settotalCPresent($totalCPresent) {
        $this->totalCPresent = $totalCPresent;
        return $this;
    }

}