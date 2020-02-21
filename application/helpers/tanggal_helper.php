<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertMysqlDate')) {
    
    /**
     * Convert Indonesian type of date format into sql format
     * 
     * @param String  $date
     * @return String
     */
    function convertMysqlDate($date) {
        $date = str_replace('/', '-', $date);
        $result = $date;
        if(!empty($date)) {
            $arr = explode('-', $date);
            if(checkdate($arr[1], $arr[0], $arr[2])) {
                $result = "$arr[2]-$arr[1]-$arr[0]";
            }
        }
        return $result;
    }
}    

if (!function_exists('convertMysqlDateTime')) {
    
    /**
     * Convert Indonesian type of datetime format into sql format
     * 
     * @param String  $datetime
     * @return String
     */
    function convertMysqlDateTime($datetime) {
        $datetime = str_replace('/', '-', $datetime);
        $result = $datetime;
        if(!empty($datetime)) {
            $arrDt = explode(' ', trim($datetime));
            $arr = explode('-', $arrDt[0]);
            $year = substr($arr[2], 0, 4);
            $time = substr($arr[2], -5);
            if(checkdate($arr[1], $arr[0], $year)) {
                $result = "$year-$arr[1]-$arr[0] $arrDt[1]";
            }
        }
        return $result;
    }
}

if (!function_exists('convertIndonesianDate')) {
    
    /**
     * Convert MySQL type of date format into indonesian format
     * 
     * @param String  $date
     * @return String
     */
    function convertIndonesianDate($date) {
        $date = str_replace('/', '-', $date);
        $result = $date;
        if(!empty($date)) {
            $arr = explode('-', $date);
            if(checkdate($arr[1], $arr[2], $arr[0])) {
                $result = "$arr[2]-$arr[1]-$arr[0]";
            }
        }
        return $result;
    }
}    

if (!function_exists('ConvertDate')) {
    
    function ConvertDate($StrDate, $StrFormat, $ResultFormat) {
        /*
         * 	Fungsi untuk menconvert format Tanggal
         */
        $StrFormat = strtoupper($StrFormat);
        switch ($StrFormat) {
            case "MM/DD/YYYY" : list($Month, $Day, $Year) = explode("/", $StrDate);
                break;
            case "DD/MM/YYYY" : list($Day, $Month, $Year) = explode("/", $StrDate);
                break;
            case "YYYY/MM/DD" : list($Year, $Month, $Day) = explode("/", $StrDate);
                break;
            case "MM-DD-YYYY" : list($Month, $Day, $Year) = explode("-", $StrDate);
                break;
            case "DD-MM-YYYY" : list($Day, $Month, $Year) = explode("-", $StrDate);
                break;
            case "YYYY-MM-DD" : list($Year, $Month, $Day) = explode("-", $StrDate);
                break;
        }//End switch
        $ResultFormat = strtoupper($ResultFormat);
        switch ($ResultFormat) {
            case "MM-DD-YYYY" : $StrResult = $Month . "-" . $Day . "-" . $Year;
                break;
            case "DD-MM-YYYY" : $StrResult = $Day . "-" . $Month . "-" . $Year;
                break;
            case "YYYY-MM-DD" : $StrResult = $Year . "-" . $Month . "-" . $Day;
                break;
            case "MM/DD/YYYY" : $StrResult = $Month . "/" . $Day . "/" . $Year;
                break;
            case "DD/MM/YYYY" : $StrResult = $Day . "/" . $Month . "/" . $Year;
                break;
            case "YYYY/MM/DD" : $StrResult = $Year . "/" . $Month . "/" . $Day;
                break;
        }//End switch
        return $StrResult;
    }
}

/*
 * End of file : tanggal_helper.php
 * File location : ./application/helper/tanggal_helper.php
 */
