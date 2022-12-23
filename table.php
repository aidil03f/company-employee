<?php
class Table 
{
    function previewTable()
    {
        $str = "<table border='1' cellpadding='10' cellspacing='0'>";
            for ($baris = 1; $baris <= 8; $baris++) {
                $str .= "<tr>";
                for ($kolom = 1; $kolom <= 8; $kolom++) {
                    switch ($baris) {
                        case 1:
                            if(
                                (($baris+$kolom-1) == 1)|| 
                                (($baris+$kolom-1) == 2)|| 
                                (($baris+$kolom-1) == 5)|| 
                                (($baris+$kolom-1) == 7)
                                )
                            {
                                $str .= "<td style='background-color:black;color:white'>".($baris+$kolom-1)."</td>";
                            }else {
                                $str .= "<td>".($baris+$kolom -1)."</td>";
                            }
                            break;
                        case 2:
                            if(
                                (($baris+$kolom+6) == 10)|| 
                                (($baris+$kolom+6) == 11)|| 
                                (($baris+$kolom+6) == 13)|| 
                                (($baris+$kolom+6) == 14)
                                )
                            {
                                $str .= "<td style='background-color:black;color:white'>".($baris+$kolom+6)."</td>";
                            }else {
                                $str .= "<td>".($baris+$kolom+6)."</td>";
                            }
                            break;
                        case 3:
                            if(
                                (($baris+$kolom+13) == 17)|| 
                                (($baris+$kolom+13) == 19)|| 
                                (($baris+$kolom+13) == 22)|| 
                                (($baris+$kolom+13) == 23)
                                )
                            {
                                $str .= "<td style='background-color:black;color:white'>".($baris+$kolom+13)."</td>";
                            }else {
                                $str .= "<td>".($baris+$kolom+13)."</td>";
                            }
                            break;
                        case 4:
                            if(
                                (($baris+$kolom+20) == 25)|| 
                                (($baris+$kolom+20) == 26)|| 
                                (($baris+$kolom+20) == 29)|| 
                                (($baris+$kolom+20) == 31)
                                )
                            {
                                $str .= "<td style='background-color:black;color:white'>".($baris+$kolom+20)."</td>";
                            }else {
                                $str .= "<td>".($baris+$kolom+20)."</td>";
                            }
                            break;
                        case 5:
                            if(
                                (($baris+$kolom+27) == 34)|| 
                                (($baris+$kolom+27) == 35)|| 
                                (($baris+$kolom+27) == 37)|| 
                                (($baris+$kolom+27) == 38)
                                )
                            {
                                $str .= "<td style='background-color:black;color:white'>".($baris+$kolom+27)."</td>";
                            }else {
                                $str .= "<td>".($baris+$kolom+27)."</td>";
                            }
                            break;
                        case 6:
                            if(
                                (($baris+$kolom+34) == 41)|| 
                                (($baris+$kolom+34) == 43)|| 
                                (($baris+$kolom+34) == 46)|| 
                                (($baris+$kolom+34) == 47)
                                )
                            {
                                $str .= "<td style='background-color:black;color:white'>".($baris+$kolom+34)."</td>";
                            }else {
                                $str .= "<td>".($baris+$kolom+34)."</td>";
                            }
                            break;
                        case 7:
                            if(
                                (($baris+$kolom+41) == 49)|| 
                                (($baris+$kolom+41) == 50)|| 
                                (($baris+$kolom+41) == 53)|| 
                                (($baris+$kolom+41) == 55)
                                )
                            {
                                $str .= "<td style='background-color:black;color:white'>".($baris+$kolom+41)."</td>";
                            }else {
                                $str .= "<td>".($baris+$kolom+41)."</td>";
                            }
                            break;
                        case 8:
                            if(
                                (($baris+$kolom+48) == 58)|| 
                                (($baris+$kolom+48) == 59)|| 
                                (($baris+$kolom+48) == 61)|| 
                                (($baris+$kolom+48) == 62)
                                )
                            {
                                $str .= "<td style='background-color:black;color:white'>".($baris+$kolom+48)."</td>";
                            }else {
                                $str .= "<td>".($baris+$kolom+48)."</td>";
                            }
                            break;
                        default:
                            $str .= "<td>".$baris."</td>";
                            break;
                    }
                }
                $str .= "</tr>";
            }
            $str .= "</table>";
            return $str;
    }
    function enkripsi(string $values)
    {
        $collect = [
            'D' => 'E',
            'F' => 'D',
            'H' => 'K',
            'K' => 'G',
            'N' => 'S',
            'Q' => 'K',
        ];
        $arr = str_split($values);
        $str = '';
        foreach($arr as $a){
            foreach($collect as $key => $c){
                $str .= $key == $a ? $c :'';
            }
        }
        return $str;
    }
    function cari(string $values)
    {
        $collect = [['f', 'g', 'h', 'i'],['j', 'k', 'p', 'q'],['r', 's', 't', 'u']];
        $str = '';
        foreach($collect as $a){
            $str .= implode('',$a);
        }
        $x = [];
        foreach(str_split($str) as $a){
            foreach(str_split($values) as $b){
                if($a == $b){
                    array_push($x,$b);
                }
            }
        }
        return strlen(implode('',$x)) == strlen($values) ? true : false;
    }
}
$test = new Table;
print_r($test->previewTable());
print_r($test->enkripsi('DFHKNQ'));
echo "<pre>";
var_dump($test->cari('fghi'));

?>