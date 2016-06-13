<?php
require_once './Database/Database.php';
require_once './config/DatabaseInformation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Samples
 *
 * @author Jakob
 */
class Samples 
{
    private $database = null;
    private $samplesTheme = array();
    private $samplesLinks = array();
    private $samplesRelations = array();
    private $themesId = array();
    public function __construct()
    {
        $this->database = new DB\Database(DBInfo\DbHost, DBInfo\DbUser, DBInfo\DbPassword, DBInfo\DbName);
        $this->addSamplesLinks();
        $this->addSamplesTheme();
    }
    public function createSamples()
    {
        foreach($this->samplesTheme as $sampleTheme)
        {
            $value = $this->database->setData($sampleTheme);
            if($value === FALSE)
                return FALSE;
            else
                $this->themesId[] = $value;
        }
        foreach($this->samplesLinks as $sampleLink)
        {
            $value = $this->database->setData($sampleLink[0]);
            if($value === FALSE)
                return FALSE;
            else
            {
                foreach($sampleLink[1] as $sampleLinkId)
                {
                    $query = 'insert into Relation(link, theme) values(' . $value . ',' . $this->themesId[$sampleLinkId] . ');'; //(Links id dann Theme id
                    $returnval = $this->database->setData($query);
                    if($returnval === FALSE)
                        return FALSE;
                }
            }
        }
        return TRUE;
    }
    public function addSamplesTheme()
    {
        $this->samplesTheme[] = 'insert into theme(theme) values("Programmieren");';
        $this->samplesTheme[] = 'insert into theme(theme) values("C/C++");';
        $this->samplesTheme[] = 'insert into theme(theme) values("Spiele");';
        $this->samplesTheme[] = 'insert into theme(theme) values("Assembler");';
    }
    public function addSamplesLinks()
    {
        $this->samplesLinks[] = ['insert into Links(link) values("www.proggen.org");', [0, 1]];
        $this->samplesLinks[] = ['insert into Links(link) values("assembler.hpfsc.de");', [0, 3]];
        $this->samplesLinks[] = ['insert into Links(link) values("www.cossacks3.com");', [2]];
    }
}
