<?php

/**
* CSV Data Access
* This is just an example
* @author Arandi López <arandilopez.93@gmail.com>
*/
class CSVDataAccess
{

    function __construct()
    {
        $config = Config::getInstance();
        $this->file = $config->get('csv_path');
    }

    public function write( array $data)
    {
        $handle = fopen($this->file, 'a+');
        fputcsv($handle, $data);
        fclose($handle);    
    }

    public function read()
    {
        $handle = fopen($this->file, 'r+');
        $data = array();
        while (!feof($handle)) 
        {
            $cdata = fgetcsv($handle);
            if (!empty($cdata)) {
                array_push($data, $cdata);    
            }
        }
        fclose($handle);
        return $data;
    }
}