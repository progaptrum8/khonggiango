<?php
namespace app\components;

use Yii;

class Common {

    static public function genViewMenu($menu,$selectedContext="", $level = 0, $return = ['html'=>'','active'=>0]) {
        $html= $return['html'];
        $active=$return['active'];
        $activeT=$return['active'];
        $i=0;
        $count=count($menu);
        foreach ($menu as $itemMenu) { 
            $htmlMenuCon = $return;
            if ($level == 0) {                
                if (array_key_exists("items", $itemMenu)) {
                    $htmlMenuCon = self::genViewMenu($itemMenu['items'], $selectedContext, $level + 1);
                    $active= $htmlMenuCon['active'];
                }
                if($active==1){
                    $html .= '<li class="treeview active">';
                    $activeT=1;
                }else{
                    $html .= '<li class="treeview">';
                }
                if($itemMenu['url'] == "/".$selectedContext){
                    $activeT=1;
                    $html .= '        <a href="' . $itemMenu['url'] . '" class="active">';
                }else{
                    $html .= '        <a href="' . $itemMenu['url'] . '">';
                }
                $html .= '        <i class="'.($itemMenu['class']!=""?$itemMenu['class']:"fa fa-circle-o").'"></i> <span>' . $itemMenu['label'] . '</span>';
                if (array_key_exists("items", $itemMenu) && count($itemMenu['items']) > 0) {
                    $html .= '        <i class="fa fa-fw fa-plus pull-right"></i>';
                }
                $html .= '    </a>';
                $html .= $htmlMenuCon['html'];
                $html .= '</li>';
            } else {
                if (array_key_exists("items", $itemMenu)) {
                    $htmlMenuCon = self::genViewMenu($itemMenu['items'], $selectedContext, $level + 1);
                    $active= $htmlMenuCon['active'];
                }
                if($i == 0){
                    $html .= '<ul class="treeview-menu">';
                }
                $i++;
                if($active == 1){
                    $html .= '<li class="active">';
                    $activeT=1;
                }else{
                    $html .= '<li>';
                }                
                if($itemMenu['url'] == "/".$selectedContext){
                    $activeT=1;
                    $html .= '        <a href="' . $itemMenu['url'] . '" class="active">';
                }else{
                    $html .= '        <a href="' . $itemMenu['url'] . '">';
                }
                $html .= '            <i class="'.($itemMenu['class']!=""?$itemMenu['class']:"fa fa-circle-o").'"></i>' . $itemMenu['label'];
                if (array_key_exists("items", $itemMenu) && count($itemMenu['items']) > 0) {
                    $html .= '            <i class="fa fa-fw fa-plus pull-right"></i>';
                }
                $html .= '        </a>';
                $html .= $htmlMenuCon['html'];
                $html .= '    </li>';
                if($i == $count){
                    $html .= '</ul>';
                }
            }
        }
        return ['html'=> $html,'active'=>$activeT];
    }
    
    /*
     * Returns an encrypted & utf8-encoded
     */
    static public function encryptOneTime($pure_string) {        
        $encrypted_string = md5(utf8_encode($pure_string).Yii::$app->session->getId());
        return $encrypted_string;
    }
    
    /*
     * Returns an encrypted & utf8-encoded
     */
    static public function checkEncryptOneTime($token, $pure_string) {
        $encrypted_string = md5(utf8_encode($pure_string).Yii::$app->session->getId());
        if($token == $encrypted_string){
            return true;
        }else{
            return false;
        }
    }
    
    /*
     * Returns an encrypted & utf8-encoded
     */
    static public function encrypt($pure_string, $encryption_key = 'Unitech@;') {
        $pure_string = $pure_string . md5(rand());
        $encrypted_string = openssl_encrypt(base64_encode(utf8_encode($pure_string)), "AES-128-ECB", $encryption_key);
        return $encrypted_string;
    }

    /*
     * Returns decrypted original string
     */
    static public function decrypt($encrypted_string, $encryption_key = 'Unitech@;') {
        $decrypted_string = base64_decode(trim(openssl_decrypt($encrypted_string, "AES-128-ECB", $encryption_key)));
        return substr($decrypted_string, 0, strlen($decrypted_string) - 32);
    }

    //chuyển từ datetime sang integer
    static public function datetimeToInt($date) {
        $result = Yii::$app->formatter->asDatetime($date, "php:d-m-Y");
        $splitResult = explode('-', $result);
        $number = (int) $splitResult[2] * 10000 + (int) $splitResult[1] * 100 + (int) $splitResult[0];

        return $number;
    }

    //chuyển chuỗi có dấu thành không có dấu
    static public function stripUnicode($str) {
        if (!$str) {
            return false;
        }
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'ð|đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Ð|Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return $str;
    }

    /**
     * Xoa tham so tren url
     * @param string $url
     * @param string $param
     */
    static public function removeParamUrl($url, $param) {
        $url = preg_replace('/([?&])' . $param . '=[^&]+(&|$)/', '$1', $url);
        $url = trim($url, '&');
        $url = trim($url, '?');
        return $url;
    }
    
    //chuyển từ datetime us sang vn datetime
    static public function datetimeUSToVNDatetime($date) {
        if($date =="" || $date==null){
            return "";
        }else{
            $dateTemp = explode(' ', trim($date));            
            return trim(self::dateUSToVNDate($dateTemp[0]).' '.$dateTemp[1]);
        }
    }
    
    //chuyển từ datetime vn sang us datetime
    static public function datetimeVNToUSDatetime($date) {
        if($date =="" || $date==null){
            return "";
        }else{
            $dateTemp = explode(' ', trim($date));            
            return trim(self::dateVNToUSDate($dateTemp[0]).' '.$dateTemp[1]);
        }
    }

    //chuyển từ date us sang vn date
    static public function dateUSToVNDate($date) {
        if($date =="" || $date==null){
            return "";
        }else{
            $datePart = explode(' ', trim($date));
            $dateTemp = explode('-', trim($datePart[0]));            
            $dateReturn = new \DateTime();
            if(!isset($dateTemp[0])||(int)$dateTemp[0]==0){
                $dateTemp[0]=date('Y');
            }
            if(!isset($dateTemp[1])||(int)$dateTemp[1]==0){
                $dateTemp[1]=date('m');
            }
            if(!isset($dateTemp[2])||(int)$dateTemp[2]==0){
                $dateTemp[2]=date('d');
            }
            $dateReturn->setDate($dateTemp[0], $dateTemp[1], $dateTemp[2]);
            return $dateReturn->format("d/m/Y");
        }
    }
    //chuyển từ date vn sang us date
    static public function dateVNToUSDate($date) {
        if($date =="" || $date==null){
            return "";
        }else{
            $datePart = explode(' ', trim($date));
            $dateTemp = explode('/', trim($datePart[0]));            
            $dateReturn = new \DateTime();
            if(!isset($dateTemp[0])||(int)$dateTemp[0]==0){
                $dateTemp[0]=date('d');
            }
            if(!isset($dateTemp[1])||(int)$dateTemp[1]==0){
                $dateTemp[1]=date('m');
            }
            if(!isset($dateTemp[2])||(int)$dateTemp[2]==0){
                $dateTemp[2]=date('Y');
            }
            $dateReturn->setDate($dateTemp[2], $dateTemp[1], $dateTemp[0]);
            return $dateReturn->format("Y-m-d");
        }
    }
    static public function is_array_multi($a) {
        $rv = array_filter($a,'is_array');
        if(count($rv)>0) {
            return true;
        }
        return false;
    }
    
    public static function buildTree($arraySource,$parentId="",$parentName="parentID",$returnArray=array()){
        foreach($arraySource as $itemSource){
            if($itemSource[$parentName] == $parentId){            
                $child = self::buildTree($arraySource,$itemSource['id'],$parentName);
                if($child){
                    $itemSource['children'] = $child;
                }
                array_push($returnArray, $itemSource);
            }
        }
        return $returnArray;
    }
    public static function buildTreeOrderNoLevel($arraySource,$parentId="",$parentName="parentID",$returnArray=array()){
        foreach($arraySource as $itemSource){
            if($itemSource[$parentName] == $parentId){            
                $child = self::buildTreeOrderNoLevel($arraySource,$itemSource['id'],$parentName);                
                array_push($returnArray, $itemSource);
                if($child){
                    foreach($child as $itemChild){
                        array_push($returnArray, $itemChild);
                    }
                }
            }
        }
        return $returnArray;
    }
    
    public static function reLineEndString($str){
        return trim(str_replace(array("\n", "\r"), ' ',$str));
    }
    public static function replaceStringFullText($str){
        $str =trim(str_replace(array("'", '"'),'',$str));
        return trim(str_replace(array("\n", "\r", "/", "-", "+"),' ',$str));
    }
}
