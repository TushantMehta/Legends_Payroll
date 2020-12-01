<?php

class FileService   {

    public static function readFile($fileName)  {

        
        try {
            
            //Get a file handle
            $fh = fopen($fileName, 'r' );
            if (!$fh)   {
                throw new Exception("Error! File not found.");
            }
            //Read contents
            
            $contents = fread($fh, filesize($fileName));

            $content = json_decode($contents);
            fclose($fh);

        } catch (Exception $fe) {
            echo $fe->getMessage();
        }

        return $content;
    }

    public static function writeFile($fileName, $contents)  {
        try {
            
            //Get a file handle
            $fh = fopen($fileName, 'w' );
            if (!$fh)   {
                throw new Exception("Error! File not found.");
            }
            //Read contents
            // $contents = fread($fh, filesize($fileName));
            fwrite($fh, $contents);

            //Close 
            fclose($fh);

        } catch (Exception $fe) {
            echo $fe->getMessage();
        }

    }
}