<?php

/**
 * This is a JSON Handler of Bálint's Tools
 *
 * @category bTools
 * @package  IO
 * @author   Bálint Horváth <balint@balint.business>
 * @license  Apache License Version 2.0 https://opensource.org/licenses/Apache-2.0
 */

namespace BalintHorvath\IO;

class JSONHandler
{
    
    private $sourceFiles;
    private $workingFile;
    private $workingData;
    
    public function __construct($JSONFile = null)
    {
        if (!is_null($JSONFile)){
            $this->workingFile = 0;
            $this->sourceFiles[$this->workingFile] = $JSONFile;
            $this->load();
        }
    }
    
    public function loadFile($sourceFile = null)
    {
        if (is_null($sourceFile)){
            $this->sourceFiles[] = $sourceFile;
            $this->workingFile = count($this->sourceFiles) - 1;
        } else if (is_numeric($sourceFile)){
            $this->workingFile = $sourceFile;
        }
        $this->workingData = json_decode($this->getFileContents($this->sourceFiles[$this->workingFile]));
    }
    
    public function loadString($sourceString = null) {
        
    }
    
    public function getFileContents($file) {
        return(file_get_contents($file));
    }
    
}
