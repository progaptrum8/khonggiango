<?php

namespace app\components;

/**
 * Description of CommonUtil
 *
 * @author huytd
 */
class CommonUtil {    
    const FILE_AVATAR = 1; 
    const FILE_VANBAN = 2;
    const FILE_CMND = 3;
    
    const VANBAN_TRANGTHAI = [
        'CHO_BIEN_TAP'=>['value'=>0,'name'=>'Chờ biên tập','namelower'=>'chờ biên tập'],
        'CHO_BAN_HANH'=>['value'=>1,'name'=>'Chờ ban hành','namelower'=>'chờ ban hành'],
        'DA_BAN_HANH'=>['value'=>2,'name'=>'Đã ban hành','namelower'=>'đã ban hành']
    ];
    const VANBAN_PL_TRANGTHAI = [
        'TIEP_NHAN'=>['value'=>0,'name'=>'Tiếp nhận'],   
        'HUY_BAN_HANH'=>['value'=>1,'name'=>'Hủy ban hành'],
        'BAN_HANH'=>['value'=>2,'name'=>'Ban hành'],
        'CAP_NHAT'=>['value'=>3,'name'=>'Cập nhật']
    ];
}
