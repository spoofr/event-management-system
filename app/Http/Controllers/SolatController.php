<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolatController extends Controller
{
    public function index()
    {
        return view('solat.index');
    }
    
    public function api($zon)
    {
        // if (isset($_GET['zon'])) {
            $kodzon = $zon; # store get parameter in variable
            $xmlurl = "http://www2.e-solat.gov.my/xml/today/index.php?zon=".$kodzon; # url of JAKIM eSolat XML data
            
            # fetch xml file (from JAKIM website)
        # parse xml data into object
        $data = simplexml_load_file($xmlurl);
            
        # access xml data, get name of zone, trim object
        $namazon = trim($data->channel[0]->link);
        $tarikhmasa = trim($data->channel[0]->children('dc', true)->date); # use children() to access tag with colon (:)
            
        # create associative array to store waktu solat
        $arrwaktu = array();
        
        # iterate through the "item" tag in the xml, access, and store into array
        foreach ($data->channel[0]->item as $item) {
            # access data and trims object, to store as string
                $solat = "waktu_" . strtolower(trim($item->title)); # append "waktu_" to the lowercase string. ex: "waktu_subuh"
                $waktu = trim($item->description);
                
            # store into associative array
            $arrwaktu[$solat] = $waktu;
        }
        
        # add kod_zon, nama_zon, and tarikh_masa to the array
        $arrwaktu["kod_zon"] = $kodzon;
        $arrwaktu["nama_zon"] = $namazon;
        $arrwaktu["tarikh_masa"] = $tarikhmasa;
        
        # display data in json format
        return json_encode($arrwaktu);
        // }
    }
}
