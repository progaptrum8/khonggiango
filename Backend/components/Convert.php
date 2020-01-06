<?php
namespace app\components;
class Convert {

    public static $source = array("â", "ă", "ê", "ơ", "ô", "ư", "á", "à", "ả", "ã", "ạ", "ắ", "ằ", "ẳ", "ẵ", "ặ", "ấ", "ầ", "ẩ", "ẫ", "ậ", "đ", "é", "è", "ẻ", "ẽ", "ẹ", "ế", "ề", "ể", "ễ", "ệ", "í", "ì", "ỉ", "ĩ", "ị", "ó", "ò", "ỏ", "õ", "ọ", "ớ", "ờ", "ở", "ỡ", "ợ", "ố", "ồ", "ổ", "ỗ", "ộ", "ú", "ù", "ủ", "ũ", "ụ", "ứ", "ừ", "ử", "ữ", "ự", "ý", "ỳ", "ỷ", "ỹ", "ỵ", "Â", "Ă", "Ê", "Ơ", "Ô", "Ư", "Á", "À", "Ả", "Ã", "Ạ", "Ắ", "Ằ", "Ẳ", "Ẵ", "Ặ", "Ấ", "Ầ", "Ẩ", "Ẫ", "Ậ", "Đ", "É", "È", "Ẻ", "Ẽ", "Ẹ", "Ế", "Ề", "Ể", "Ễ", "Ệ", "Í", "Ì", "Ỉ", "Ĩ", "Ị", "Ó", "Ò", "Ỏ", "Õ", "Ọ", "Ớ", "Ờ", "Ở", "Ỡ", "Ợ", "Ố", "Ồ", "Ổ", "Ỗ", "Ộ", "Ú", "Ù", "Ủ", "Ũ", "Ụ", "Ứ", "Ừ", "Ử", "Ữ", "Ự", "Ý", "Ỳ", "Ỷ", "Ỹ", "Ỵ");
    public static $desc = array(
        array(
            'ỹ' => 'ỹ', 'Ỹ' => 'Ỹ', 'ỷ' => 'ỷ', 'Ỷ' => 'Ỷ', 'ỵ' => 'ỵ', 'Ỵ' => 'Ỵ', 'ỳ' => 'ỳ', 'Ỳ' => 'Ỳ', 'ự' => 'ự', 'Ự' => 'Ự', 'ữ' => 'ữ', 'Ữ' => 'Ữ', 'ử' => 'ử', 'Ử' => 'Ử', 'ừ' => 'ừ', 'Ừ' => 'Ừ', 'ứ' => 'ứ', 'Ứ' => 'Ứ', 'ủ' => 'ủ', 'Ủ' => 'Ủ', 'ụ' => 'ụ', 'Ụ' => 'Ụ', 'ợ' => 'ợ', 'Ợ' => 'Ợ', 'ỡ' => 'ỡ', 'Ỡ' => 'Ỡ', 'ở' => 'ở', 'Ở' => 'Ở', 'ờ' => 'ờ', 'Ờ' => 'Ờ', 'ớ' => 'ớ', 'Ớ' => 'Ớ', 'ộ' => 'ộ', 'Ộ' => 'Ộ', 'ỗ' => 'ỗ', 'Ỗ' => 'Ỗ', 'ổ' => 'ổ', 'Ổ' => 'Ổ', 'ồ' => 'ồ', 'Ồ' => 'Ồ', 'ố' => 'ố', 'Ố' => 'Ố', 'ỏ' => 'ỏ', 'Ỏ' => 'Ỏ', 'ọ' => 'ọ', 'Ọ' => 'Ọ', 'ị' => 'ị', 'Ị' => 'Ị', 'ỉ' => 'ỉ', 'Ỉ' => 'Ỉ', 'ệ' => 'ệ', 'Ệ' => 'Ệ', 'ễ' => 'ễ', 'Ễ' => 'Ễ', 'ể' => 'ể', 'Ể' => 'Ể', 'ề' => 'ề', 'Ề' => 'Ề', 'ế' => 'ế', 'Ế' => 'Ế', 'ẽ' => 'ẽ', 'Ẽ' => 'Ẽ', 'ẻ' => 'ẻ', 'Ẻ' => 'Ẻ', 'ẹ' => 'ẹ', 'Ẹ' => 'Ẹ', 'ặ' => 'ặ', 'Ặ' => 'Ặ', 'ẵ' => 'ẵ', 'Ẵ' => 'Ẵ', 'ẳ' => 'ẳ', 'Ẳ' => 'Ẳ', 'ằ' => 'ằ', 'Ằ' => 'Ằ', 'ắ' => 'ắ', 'Ắ' => 'Ắ', 'ậ' => 'ậ', 'Ậ' => 'Ậ', 'ẫ' => 'ẫ', 'Ẫ' => 'Ẫ', 'ẩ' => 'ẩ', 'Ẩ' => 'Ẩ', 'ầ' => 'ầ', 'Ầ' => 'Ầ', 'ấ' => 'ấ', 'Ấ' => 'Ấ', 'ả' => 'ả', 'Ả' => 'Ả', 'ạ' => 'ạ', 'Ạ' => 'Ạ', 'ư' => 'ư', 'Ư' => 'Ư', 'ơ' => 'ơ', 'Ơ' => 'Ơ', 'ũ' => 'ũ', 'Ũ' => 'Ũ', 'ĩ' => 'ĩ', 'Ĩ' => 'Ĩ', 'đ' => 'đ', 'Đ' => 'Đ', 'ă' => 'ă', 'Ă' => 'Ă', 'ý' => 'ý', 'ú' => 'ú', 'ù' => 'ù', 'õ' => 'õ', 'ô' => 'ô', 'ó' => 'ó', 'ò' => 'ò', 'í' => 'í', 'ì' => 'ì', 'ê' => 'ê', 'é' => 'é', 'è' => 'è', 'ã' => 'ã', 'â' => 'â', 'á' => 'á', 'à' => 'à', 'Ý' => 'Ý', 'Ú' => 'Ú', 'Ù' => 'Ù', 'Õ' => 'Õ', 'Ô' => 'Ô', 'Ó' => 'Ó', 'Ò' => 'Ò', 'Í' => 'Í', 'Ì' => 'Ì', 'Ê' => 'Ê', 'É' => 'É', 'È' => 'È', 'Ã' => 'Ã', 'Â' => 'Â', 'Á' => 'Á', 'À' => 'À',),
        array(
            'ỹ' => 'ü', 'Ỹ' => 'ü', 'ỷ' => 'û', 'Ỷ' => 'û', 'ỵ' => 'þ', 'Ỵ' => 'þ', 'ỳ' => 'ú', 'Ỳ' => 'ú', 'ự' => 'ù', 'Ự' => 'ù', 'ữ' => '÷', 'Ữ' => '÷', 'ử' => 'ö', 'Ử' => 'ö', 'ừ' => 'õ', 'Ừ' => 'õ', 'ứ' => 'ø', 'Ứ' => 'ø', 'ủ' => 'ñ', 'Ủ' => 'ñ', 'ụ' => 'ô', 'Ụ' => 'ô', 'ợ' => 'î', 'Ợ' => 'î', 'ỡ' => 'ì', 'Ỡ' => 'ì', 'ở' => 'ë', 'Ở' => 'ë', 'ờ' => 'ê', 'Ờ' => 'ê', 'ớ' => 'í', 'Ớ' => 'í', 'ộ' => 'é', 'Ộ' => 'é', 'ỗ' => 'ç', 'Ỗ' => 'ç', 'ổ' => 'æ', 'Ổ' => 'æ', 'ồ' => 'å', 'Ồ' => 'å', 'ố' => 'è', 'Ố' => 'è', 'ỏ' => 'á', 'Ỏ' => 'á', 'ọ' => 'ä', 'Ọ' => 'ä', 'ị' => 'Þ', 'Ị' => 'Þ', 'ỉ' => 'Ø', 'Ỉ' => 'Ø', 'ệ' => 'Ö', 'Ệ' => 'Ö', 'ễ' => 'Ô', 'Ễ' => 'Ô', 'ể' => 'Ó', 'Ể' => 'Ó', 'ề' => 'Ò', 'Ề' => 'Ò', 'ế' => 'Õ', 'Ế' => 'Õ', 'ẽ' => 'Ï', 'Ẽ' => 'Ï', 'ẻ' => 'Î', 'Ẻ' => 'Î', 'ẹ' => 'Ñ', 'Ẹ' => 'Ñ', 'ặ' => 'Æ', 'Ặ' => 'Æ', 'ẵ' => '½', 'Ẵ' => '½', 'ẳ' => '¼', 'Ẳ' => '¼', 'ằ' => '»', 'Ằ' => '»', 'ắ' => '¾', 'Ắ' => '¾', 'ậ' => 'Ë', 'Ậ' => 'Ë', 'ẫ' => 'É', 'Ẫ' => 'É', 'ẩ' => 'È', 'Ẩ' => 'È', 'ầ' => 'Ç', 'Ầ' => 'Ç', 'ấ' => 'Ê', 'Ấ' => 'Ê', 'ả' => '¶', 'Ả' => '¶', 'ạ' => '¹', 'Ạ' => '¹', 'ư' => '­', 'Ư' => '¦', 'ơ' => '¬', 'Ơ' => '¥', 'ũ' => 'ò', 'Ũ' => 'ò', 'ĩ' => 'Ü', 'Ĩ' => 'Ü', 'đ' => '®', 'Đ' => '§', 'ă' => '¨', 'Ă' => '¡', 'ý' => 'ý', 'ú' => 'ó', 'ù' => 'ï', 'õ' => 'â', 'ô' => '«', 'ó' => 'ã', 'ò' => 'ß', 'í' => 'Ý', 'ì' => '×', 'ê' => 'ª', 'é' => 'Ð', 'è' => 'Ì', 'ã' => '·', 'â' => '©', 'á' => '¸', 'à' => 'µ', 'Ý' => 'ý', 'Ú' => 'ó', 'Ù' => 'ï', 'Õ' => 'â', 'Ô' => '¤', 'Ó' => 'ã', 'Ò' => 'ß', 'Í' => 'Ý', 'Ì' => '×', 'Ê' => '£', 'É' => 'Ð', 'È' => 'Ì', 'Ã' => '·', 'Â' => '¢', 'Á' => '¸', 'À' => 'µ',),
        array(
            'ự' => 'öï', 'Ự' => 'ÖÏ', 'ữ' => 'öõ', 'Ữ' => 'ÖÕ', 'ử' => 'öû', 'Ử' => 'ÖÛ', 'ừ' => 'öø', 'Ừ' => 'ÖØ', 'ứ' => 'öù', 'Ứ' => 'ÖÙ', 'ợ' => 'ôï', 'Ợ' => 'ÔÏ', 'ỡ' => 'ôõ', 'Ỡ' => 'ÔÕ', 'ở' => 'ôû', 'Ở' => 'ÔÛ', 'ờ' => 'ôø', 'Ờ' => 'ÔØ', 'ớ' => 'ôù', 'Ớ' => 'ÔÙ', 'ỹ' => 'yõ', 'Ỹ' => 'YÕ', 'ỷ' => 'yû', 'Ỷ' => 'YÛ', 'ỳ' => 'yø', 'Ỳ' => 'YØ', 'ủ' => 'uû', 'Ủ' => 'UÛ', 'ụ' => 'uï', 'Ụ' => 'UÏ', 'ộ' => 'oä', 'Ộ' => 'OÄ', 'ỗ' => 'oã', 'Ỗ' => 'OÃ', 'ổ' => 'oå', 'Ổ' => 'OÅ', 'ồ' => 'oà', 'Ồ' => 'OÀ', 'ố' => 'oá', 'Ố' => 'OÁ', 'ỏ' => 'oû', 'Ỏ' => 'OÛ', 'ọ' => 'oï', 'Ọ' => 'OÏ', 'ệ' => 'eä', 'Ệ' => 'EÄ', 'ễ' => 'eã', 'Ễ' => 'EÃ', 'ể' => 'eå', 'Ể' => 'EÅ', 'ề' => 'eà', 'Ề' => 'EÀ', 'ế' => 'eá', 'Ế' => 'EÁ', 'ẽ' => 'eõ', 'Ẽ' => 'EÕ', 'ẻ' => 'eû', 'Ẻ' => 'EÛ', 'ẹ' => 'eï', 'Ẹ' => 'EÏ', 'ặ' => 'aë', 'Ặ' => 'AË', 'ẵ' => 'aü', 'Ẵ' => 'AÜ', 'ẳ' => 'aú', 'Ẳ' => 'AÚ', 'ằ' => 'aè', 'Ằ' => 'AÈ', 'ắ' => 'aé', 'Ắ' => 'AÉ', 'ậ' => 'aä', 'Ậ' => 'AÄ', 'ẫ' => 'aã', 'Ẫ' => 'AÃ', 'ẩ' => 'aå', 'Ẩ' => 'AÅ', 'ầ' => 'aà', 'Ầ' => 'AÀ', 'ấ' => 'aá', 'Ấ' => 'AÁ', 'ả' => 'aû', 'Ả' => 'AÛ', 'ạ' => 'aï', 'Ạ' => 'AÏ', 'ũ' => 'uõ', 'Ũ' => 'UÕ', 'ă' => 'aê', 'Ă' => 'AÊ', 'ý' => 'yù', 'ú' => 'uù', 'ù' => 'uø', 'õ' => 'oõ', 'ô' => 'oâ', 'ó' => 'où', 'ò' => 'oø', 'ê' => 'eâ', 'é' => 'eù', 'è' => 'eø', 'ã' => 'aõ', 'â' => 'aâ', 'á' => 'aù', 'à' => 'aø', 'Ý' => 'YÙ', 'Ú' => 'UÙ', 'Ù' => 'UØ', 'Õ' => 'OÕ', 'Ô' => 'OÂ', 'Ó' => 'OÙ', 'Ò' => 'OØ', 'Ê' => 'EÂ', 'É' => 'EÙ', 'È' => 'EØ', 'Ã' => 'AÕ', 'Â' => 'AÂ', 'Á' => 'AÙ', 'À' => 'AØ', 'ỵ' => 'î', 'Ỵ' => 'Î', 'ị' => 'ò', 'Ị' => 'Ò', 'ỉ' => 'æ', 'Ỉ' => 'Æ', 'ư' => 'ö', 'Ư' => 'Ö', 'ơ' => 'ô', 'Ơ' => 'Ô', 'ĩ' => 'ó', 'Ĩ' => 'Ó', 'đ' => 'ñ', 'Đ' => 'Ñ', 'í' => 'í', 'ì' => 'ì', 'Í' => 'Í', 'Ì' => 'Ì',),
        array(
            'ự' => 'ự', 'Ự' => 'Ự', 'ữ' => 'ữ', 'Ữ' => 'Ữ', 'ử' => 'ử', 'Ử' => 'Ử', 'ừ' => 'ừ', 'Ừ' => 'Ừ', 'ứ' => 'ứ', 'Ứ' => 'Ứ', 'ợ' => 'ợ', 'Ợ' => 'Ợ', 'ỡ' => 'ỡ', 'Ỡ' => 'Ỡ', 'ở' => 'ở', 'Ở' => 'Ở', 'ờ' => 'ờ', 'Ờ' => 'Ờ', 'ớ' => 'ớ', 'Ớ' => 'Ớ', 'ộ' => 'ộ', 'Ộ' => 'Ộ', 'ỗ' => 'ỗ', 'Ỗ' => 'Ỗ', 'ổ' => 'ổ', 'Ổ' => 'Ổ', 'ồ' => 'ồ', 'Ồ' => 'Ồ', 'ố' => 'ố', 'Ố' => 'Ố', 'ệ' => 'ệ', 'Ệ' => 'Ệ', 'ễ' => 'ễ', 'Ễ' => 'Ễ', 'ể' => 'ể', 'Ể' => 'Ể', 'ề' => 'ề', 'Ề' => 'Ề', 'ế' => 'ế', 'Ế' => 'Ế', 'ặ' => 'ặ', 'Ặ' => 'Ặ', 'ẵ' => 'ẵ', 'Ẵ' => 'Ẵ', 'ẳ' => 'ẳ', 'Ẳ' => 'Ẳ', 'ằ' => 'ằ', 'Ằ' => 'Ằ', 'ắ' => 'ắ', 'Ắ' => 'Ắ', 'ậ' => 'ậ', 'Ậ' => 'Ậ', 'ẫ' => 'ẫ', 'Ẫ' => 'Ẫ', 'ẩ' => 'ẩ', 'Ẩ' => 'Ẩ', 'ầ' => 'ầ', 'Ầ' => 'Ầ', 'ấ' => 'ấ', 'Ấ' => 'Ấ', 'ỹ' => 'ỹ', 'Ỹ' => 'Ỹ', 'ỷ' => 'ỷ', 'Ỷ' => 'Ỷ', 'ỵ' => 'ỵ', 'Ỵ' => 'Ỵ', 'ỳ' => 'ỳ', 'Ỳ' => 'Ỳ', 'ủ' => 'ủ', 'Ủ' => 'Ủ', 'ụ' => 'ụ', 'Ụ' => 'Ụ', 'ỏ' => 'ỏ', 'Ỏ' => 'Ỏ', 'ọ' => 'ọ', 'Ọ' => 'Ọ', 'ị' => 'ị', 'Ị' => 'Ị', 'ỉ' => 'ỉ', 'Ỉ' => 'Ỉ', 'ẽ' => 'ẽ', 'Ẽ' => 'Ẽ', 'ẻ' => 'ẻ', 'Ẻ' => 'Ẻ', 'ẹ' => 'ẹ', 'Ẹ' => 'Ẹ', 'ả' => 'ả', 'Ả' => 'Ả', 'ạ' => 'ạ', 'Ạ' => 'Ạ', 'ũ' => 'ũ', 'Ũ' => 'Ũ', 'ĩ' => 'ĩ', 'Ĩ' => 'Ĩ', 'ý' => 'ý', 'ú' => 'ú', 'ù' => 'ù', 'õ' => 'õ', 'ó' => 'ó', 'ò' => 'ò', 'í' => 'í', 'ì' => 'ì', 'é' => 'é', 'è' => 'è', 'ã' => 'ã', 'á' => 'á', 'à' => 'à', 'Ý' => 'Ý', 'Ú' => 'Ú', 'Ù' => 'Ù', 'Õ' => 'Õ', 'Ó' => 'Ó', 'Ò' => 'Ò', 'Í' => 'Í', 'Ì' => 'Ì', 'É' => 'É', 'È' => 'È', 'Ã' => 'Ã', 'Á' => 'Á', 'À' => 'À', 'ư' => 'ư', 'Ư' => 'Ư', 'ơ' => 'ơ', 'Ơ' => 'Ơ', 'đ' => 'đ', 'Đ' => 'Đ', 'ă' => 'ă', 'Ă' => 'Ă', 'ô' => 'ô', 'ê' => 'ê', 'â' => 'â', 'Ô' => 'Ô', 'Ê' => 'Ê', 'Â' => 'Â',),
        array(
            'ự' => 'u+.', 'Ự' => 'U+.', 'ữ' => 'u+~', 'Ữ' => 'U+~', 'ử' => 'u+?', 'Ử' => 'U+?', 'ừ' => 'u+`', 'Ừ' => 'U+`', 'ứ' => 'u+\'', 'Ứ' => 'U+\'', 'ợ' => 'o+.', 'Ợ' => 'O+.', 'ỡ' => 'o+~', 'Ỡ' => 'O+~', 'ở' => 'o+?', 'Ở' => 'O+?', 'ờ' => 'o+`', 'Ờ' => 'O+`', 'ớ' => 'o+\'', 'Ớ' => 'O+\'', 'ộ' => 'o^.', 'Ộ' => 'O^.', 'ỗ' => 'o^~', 'Ỗ' => 'O^~', 'ổ' => 'o^?', 'Ổ' => 'O^?', 'ồ' => 'o^`', 'Ồ' => 'O^`', 'ố' => 'o^\'', 'Ố' => 'O^\'', 'ệ' => 'e^.', 'Ệ' => 'E^.', 'ễ' => 'e^~', 'Ễ' => 'E^~', 'ể' => 'e^?', 'Ể' => 'E^?', 'ề' => 'e^`', 'Ề' => 'E^`', 'ế' => 'e^\'', 'Ế' => 'E^\'', 'ặ' => 'a(.', 'Ặ' => 'A(.', 'ẵ' => 'a(~', 'Ẵ' => 'A(~', 'ẳ' => 'a(?', 'Ẳ' => 'A(?', 'ằ' => 'a(`', 'Ằ' => 'A(`', 'ắ' => 'a(\'', 'Ắ' => 'A(\'', 'ậ' => 'a^.', 'Ậ' => 'A^.', 'ẫ' => 'a^~', 'Ẫ' => 'A^~', 'ẩ' => 'a^?', 'Ẩ' => 'A^?', 'ầ' => 'a^`', 'Ầ' => 'A^`', 'ấ' => 'a^\'', 'Ấ' => 'A^\'', 'ỹ' => 'y~', 'Ỹ' => 'Y~', 'ỷ' => 'y?', 'Ỷ' => 'Y?', 'ỵ' => 'y.', 'Ỵ' => 'Y.', 'ỳ' => 'y`', 'Ỳ' => 'Y`', 'ủ' => 'u?', 'Ủ' => 'U?', 'ụ' => 'u.', 'Ụ' => 'U.', 'ỏ' => 'o?', 'Ỏ' => 'O?', 'ọ' => 'o.', 'Ọ' => 'O.', 'ị' => 'i.', 'Ị' => 'I.', 'ỉ' => 'i?', 'Ỉ' => 'I?', 'ẽ' => 'e~', 'Ẽ' => 'E~', 'ẻ' => 'e?', 'Ẻ' => 'E?', 'ẹ' => 'e.', 'Ẹ' => 'E.', 'ả' => 'a?', 'Ả' => 'A?', 'ạ' => 'a.', 'Ạ' => 'A.', 'ư' => 'u+', 'Ư' => 'U+', 'ơ' => 'o+', 'Ơ' => 'O+', 'ũ' => 'u~', 'Ũ' => 'U~', 'ĩ' => 'i~', 'Ĩ' => 'I~', 'đ' => 'dd', 'Đ' => 'DD', 'ă' => 'a(', 'Ă' => 'A(', 'ý' => 'y\'', 'ú' => 'u\'', 'ù' => 'u`', 'õ' => 'o~', 'ô' => 'o^', 'ó' => 'o\'', 'ò' => 'o`', 'í' => 'i\'', 'ì' => 'i`', 'ê' => 'e^', 'é' => 'e\'', 'è' => 'e`', 'ã' => 'a~', 'â' => 'a^', 'á' => 'a\'', 'à' => 'a`', 'Ý' => 'Y\'', 'Ú' => 'U\'', 'Ù' => 'U`', 'Õ' => 'O~', 'Ô' => 'O^', 'Ó' => 'O\'', 'Ò' => 'O`', 'Í' => 'I\'', 'Ì' => 'I`', 'Ê' => 'E^', 'É' => 'E\'', 'È' => 'E`', 'Ã' => 'A~', 'Â' => 'A^', 'Á' => 'A\'', 'À' => 'A`',),
        array(
            'Ợ' => '”', 'Ở' => '—', 'Ờ' => '–', 'Ớ' => '•', 'Ộ' => '“', 'Ỗ' => '’', 'Ổ' => '‘', 'Ỏ' => '™', 'Ỉ' => '›', 'Ề' => '‹', 'Ẹ' => '‰', 'Ằ' => '‚', 'Ậ' => '‡', 'Ẩ' => '†', 'Ầ' => '…', 'Ấ' => '„', 'Ạ' => '€', 'ỹ' => 'Û', 'Ỹ' => 'Û', 'ỷ' => 'Ö', 'Ỷ' => 'Ö', 'ỵ' => 'Ü', 'Ỵ' => 'Ü', 'ỳ' => 'Ï', 'Ỳ' => 'Ÿ', 'ự' => 'ñ', 'Ự' => '¹', 'ữ' => 'æ', 'Ữ' => 'ÿ', 'ử' => 'Ø', 'Ử' => '¼', 'ừ' => '×', 'Ừ' => '»', 'ứ' => 'Ñ', 'Ứ' => 'º', 'ủ' => 'ü', 'Ủ' => 'œ', 'ụ' => 'ø', 'Ụ' => 'ž', 'ợ' => 'þ', 'ỡ' => 'Þ', 'Ỡ' => '³', 'ở' => '·', 'ờ' => '¶', 'ớ' => '¾', 'ộ' => 'µ', 'ỗ' => '²', 'ổ' => '±', 'ồ' => '°', 'Ồ' => '', 'ố' => '¯', 'Ố' => '', 'ỏ' => 'ö', 'ọ' => '÷', 'Ọ' => 'š', 'ị' => '¸', 'Ị' => '˜', 'ỉ' => 'ï', 'ệ' => '®', 'Ệ' => 'Ž', 'ễ' => '­', 'Ễ' => '', 'ể' => '¬', 'Ể' => 'Œ', 'ề' => '«', 'ế' => 'ª', 'Ế' => 'Š', 'ẽ' => '¨', 'Ẽ' => 'ˆ', 'ẻ' => 'ë', 'Ẻ' => 'Ë', 'ẹ' => '©', 'ặ' => '£', 'Ặ' => 'ƒ', 'ẵ' => 'Ç', 'Ẵ' => 'Ç', 'ẳ' => 'Æ', 'Ẳ' => 'Æ', 'ằ' => '¢', 'ắ' => '¡', 'Ắ' => '', 'ậ' => '§', 'ẫ' => 'ç', 'Ẫ' => 'ç', 'ẩ' => '¦', 'ầ' => '¥', 'ấ' => '¤', 'ả' => 'ä', 'Ả' => 'Ä', 'ạ' => 'Õ', 'ư' => 'ß', 'Ư' => '¿', 'ơ' => '½', 'Ơ' => '´', 'ũ' => 'û', 'Ũ' => '', 'ĩ' => 'î', 'Ĩ' => 'Î', 'đ' => 'ð', 'Đ' => 'Ð', 'ă' => 'å', 'Ă' => 'Å', 'ý' => 'ý', 'ú' => 'ú', 'ù' => 'ù', 'õ' => 'õ', 'ô' => 'ô', 'ó' => 'ó', 'ò' => 'ò', 'í' => 'í', 'ì' => 'ì', 'ê' => 'ê', 'é' => 'é', 'è' => 'è', 'ã' => 'ã', 'â' => 'â', 'á' => 'á', 'à' => 'à', 'Ý' => 'Ý', 'Ú' => 'Ú', 'Ù' => 'Ù', 'Õ' => 'õ', 'Ô' => 'Ô', 'Ó' => 'Ó', 'Ò' => 'Ò', 'Í' => 'Í', 'Ì' => 'Ì', 'Ê' => 'Ê', 'É' => 'É', 'È' => 'È', 'Ã' => 'Ã', 'Â' => 'Â', 'Á' => 'Á', 'À' => 'À',),
        array(
            'ỷ' => '›', 'ỗ' => '‡', 'Ỗ' => '™', 'Ồ' => '—', 'Ố' => '–', 'ọ' => '†', 'Ọ' => '†', 'Ễ' => '•', 'ể' => '‹', 'Ể' => '”', 'Ề' => '“', 'ế' => '‰', 'Ẩ' => '…', 'Ầ' => '„', 'Ã' => '‚', 'À' => '€', 'ỹ' => 'Ï', 'Ỹ' => '³', 'Ỷ' => 'ý', 'ỵ' => 'œ', 'Ỵ' => 'œ', 'ỳ' => 'ÿ', 'Ỳ' => '²', 'ự' => '¿', 'Ự' => '¿', 'ữ' => '»', 'Ữ' => '»', 'ử' => 'º', 'Ử' => '±', 'ừ' => 'Ø', 'Ừ' => '¯', 'ứ' => 'Ù', 'Ứ' => '­', 'ủ' => 'û', 'Ủ' => 'Ñ', 'ụ' => 'ø', 'Ụ' => 'ø', 'ợ' => '®', 'Ợ' => '®', 'ỡ' => '«', 'Ỡ' => '¦', 'ở' => 'ª', 'Ở' => 'Ÿ', 'ờ' => '©', 'Ờ' => 'ž', 'ớ' => '§', 'Ớ' => '', 'ộ' => '¶', 'Ộ' => '¶', 'ổ' => '°', 'Ổ' => '˜', 'ồ' => 'Ò', 'ố' => 'Ó', 'ỏ' => 'Õ', 'Ỏ' => '½', 'ị' => 'Î', 'Ị' => 'Î', 'ỉ' => 'Ì', 'Ỉ' => '·', 'ệ' => 'Œ', 'Ệ' => 'Œ', 'ễ' => 'Í', 'ề' => 'Š', 'Ế' => '', 'ẽ' => 'ë', 'Ẽ' => 'þ', 'ẻ' => 'È', 'Ẻ' => 'Þ', 'ẹ' => 'Ë', 'Ẹ' => 'Ë', 'ặ' => '¥', 'Ặ' => '¥', 'ẵ' => '¤', 'Ẵ' => 'ð', 'ẳ' => '£', 'Ẳ' => '', 'ằ' => '¢', 'Ằ' => 'Ž', 'ắ' => '¡', 'Ắ' => '', 'ậ' => 'Æ', 'Ậ' => 'Æ', 'ẫ' => 'Å', 'Ẫ' => 'Å', 'ẩ' => 'Ä', 'ầ' => 'À', 'ấ' => 'Ã', 'Ấ' => 'ƒ', 'ả' => 'ä', 'Ả' => '', 'ạ' => 'å', 'Ạ' => 'å', 'ư' => 'Ü', 'Ư' => 'Ð', 'ơ' => 'Ö', 'Ơ' => '÷', 'ũ' => 'Û', 'Ũ' => '¬', 'ĩ' => 'ï', 'Ĩ' => '¸', 'đ' => 'Ç', 'Đ' => 'ñ', 'ă' => 'æ', 'Ă' => 'ˆ', 'ý' => 'š', 'ú' => 'ú', 'ù' => 'ù', 'õ' => 'õ', 'ô' => 'ô', 'ó' => 'ó', 'ò' => 'ò', 'í' => 'í', 'ì' => 'ì', 'ê' => 'ê', 'é' => 'é', 'è' => 'è', 'ã' => 'ã', 'â' => 'â', 'á' => 'á', 'à' => 'à', 'Ý' => 'Ý', 'Ú' => 'Ú', 'Ù' => '¨', 'Õ' => '¾', 'Ô' => 'Ô', 'Ó' => '¹', 'Ò' => '¼', 'Í' => '´', 'Ì' => 'µ', 'Ê' => 'Ê', 'É' => 'É', 'È' => '×', 'Â' => 'Â', 'Á' => 'Á',),
        array(
            'ự' => 'ûå', 'Ự' => 'ÛÅ', 'ữ' => 'ûä', 'Ữ' => 'ÛÄ', 'ử' => 'ûã', 'Ử' => 'ÛÃ', 'ừ' => 'ûâ', 'Ừ' => 'ÛÂ', 'ứ' => 'ûá', 'Ứ' => 'ÛÁ', 'ợ' => 'úå', 'Ợ' => 'ÚÅ', 'ỡ' => 'úä', 'Ỡ' => 'ÚÄ', 'ở' => 'úã', 'Ở' => 'ÚÃ', 'ờ' => 'úâ', 'Ờ' => 'ÚÂ', 'ớ' => 'úá', 'Ớ' => 'ÚÁ', 'ộ' => 'öå', 'Ộ' => 'ÖÅ', 'ỗ' => 'öî', 'Ỗ' => 'ÖÎ', 'ổ' => 'öí', 'Ổ' => 'ÖÍ', 'ồ' => 'öì', 'Ồ' => 'ÖÌ', 'ố' => 'öë', 'Ố' => 'ÖË', 'ệ' => 'ïå', 'Ệ' => 'Ïå', 'ễ' => 'ïî', 'Ễ' => 'ÏÎ', 'ể' => 'ïí', 'Ể' => 'ÏÍ', 'ề' => 'ïì', 'Ề' => 'ÏÌ', 'ế' => 'ïë', 'Ế' => 'ÏË', 'ặ' => 'ùå', 'Ặ' => 'ÙÅ', 'ẵ' => 'ùé', 'Ẵ' => 'ÙÉ', 'ẳ' => 'ùè', 'Ẳ' => 'ÙÈ', 'ằ' => 'ùç', 'Ằ' => 'ÙÇ', 'ắ' => 'ùæ', 'Ắ' => 'ÙÆ', 'ậ' => 'êå', 'Ậ' => 'ÊÅ', 'ẫ' => 'êî', 'Ẫ' => 'ÊÎ', 'ẩ' => 'êí', 'Ẩ' => 'ÊÍ', 'ầ' => 'êì', 'Ầ' => 'ÊÌ', 'ấ' => 'êë', 'Ấ' => 'ÊË', 'ỹ' => 'yä', 'Ỹ' => 'YÄ', 'ỷ' => 'yã', 'Ỷ' => 'YÃ', 'ỵ' => 'yå', 'Ỵ' => 'YÅ', 'ỳ' => 'yâ', 'Ỳ' => 'YÂ', 'ủ' => 'uã', 'Ủ' => 'UÃ', 'ụ' => 'uå', 'Ụ' => 'UÅ', 'ỏ' => 'oã', 'Ỏ' => 'OÃ', 'ọ' => 'oå', 'Ọ' => 'OÅ', 'ẽ' => 'eä', 'Ẽ' => 'EÄ', 'ẻ' => 'eã', 'Ẻ' => 'EÃ', 'ẹ' => 'eå', 'Ẹ' => 'EÅ', 'ả' => 'aã', 'Ả' => 'AÃ', 'ạ' => 'aå', 'Ạ' => 'AÅ', 'ũ' => 'uä', 'Ũ' => 'UÄ', 'ý' => 'yá', 'ú' => 'uá', 'ù' => 'uâ', 'õ' => 'oä', 'ó' => 'oá', 'ò' => 'oâ', 'é' => 'eá', 'è' => 'eâ', 'ã' => 'aä', 'á' => 'aá', 'à' => 'aâ', 'Ý' => 'YÁ', 'Ú' => 'UÁ', 'Ù' => 'UÂ', 'Õ' => 'OÄ', 'Ó' => 'OÁ', 'Ò' => 'OÂ', 'É' => 'EÁ', 'È' => 'EÂ', 'Ã' => 'AÄ', 'Á' => 'AÁ', 'À' => 'AÂ', 'ị' => 'õ', 'Ị' => 'Õ', 'ỉ' => 'ó', 'Ỉ' => 'Ó', 'ư' => 'û', 'Ư' => 'Û', 'ơ' => 'ú', 'Ơ' => 'Ú', 'ĩ' => 'ô', 'Ĩ' => 'Ô', 'đ' => 'à', 'Đ' => 'À', 'ă' => 'ù', 'Ă' => 'Ù', 'ô' => 'ö', 'í' => 'ñ', 'ì' => 'ò', 'ê' => 'ï', 'â' => 'ê', 'Ô' => 'Ö', 'Í' => 'Ñ', 'Ì' => 'Ò', 'Ê' => 'Ï', 'Â' => 'Ê',),
        array(
            'Ủ' => '–', 'Ỏ' => '‘', 'Ọ' => '“', 'Ẻ' => '‡', 'Ẹ' => '‰', 'Ằ' => '›', 'Ả' => '‚', 'Ạ' => '„', 'Ũ' => '—', 'Ă' => '™', 'Ú' => '”', 'Ù' => '•', 'Õ' => '’', 'Ì' => '‹', 'É' => '…', 'È' => '†', 'Á' => '€', 'ỹ' => 'þ', 'ỷ' => 'ý', 'ỵ' => 'ÿ', 'Ỵ' => 'Ž', 'ỳ' => 'ü', 'ự' => 'ú', 'Ự' => '¼', 'ữ' => 'ù', 'Ữ' => '»', 'ử' => 'ø', 'Ử' => 'º', 'ừ' => '÷', 'Ừ' => '¹', 'ứ' => 'ö', 'Ứ' => '¸', 'ủ' => 'Ô', 'ụ' => 'Ö', 'Ụ' => '˜', 'ợ' => 'ô', 'Ợ' => '¶', 'ỡ' => 'ó', 'Ỡ' => 'µ', 'ở' => 'ò', 'Ở' => '´', 'ờ' => 'ñ', 'Ờ' => '³', 'ớ' => 'ð', 'Ớ' => '²', 'ộ' => 'î', 'Ộ' => '°', 'ỗ' => 'í', 'Ỗ' => '¯', 'ổ' => 'ì', 'Ổ' => '®', 'ồ' => 'ë', 'Ồ' => '­', 'ố' => 'ê', 'Ố' => '¬', 'ỏ' => 'Ï', 'ọ' => 'Ñ', 'ị' => 'Ì', 'Ị' => 'Ž', 'ỉ' => 'Ê', 'Ỉ' => 'Œ', 'ệ' => 'è', 'Ệ' => 'ª', 'ễ' => 'ç', 'Ễ' => '©', 'ể' => 'æ', 'Ể' => '¨', 'ề' => 'å', 'Ề' => '§', 'ế' => 'ä', 'Ế' => '¦', 'ẽ' => 'Æ', 'Ẽ' => 'ˆ', 'ẻ' => 'Å', 'ẹ' => 'Ç', 'ặ' => 'Ü', 'Ặ' => '˜', 'ẵ' => 'Û', 'Ẵ' => '', 'ẳ' => 'Ú', 'Ẳ' => 'œ', 'ằ' => 'Ù', 'ắ' => 'Ø', 'Ắ' => 'š', 'ậ' => 'â', 'Ậ' => '¤', 'ẫ' => 'á', 'Ẫ' => '£', 'ẩ' => 'à', 'Ẩ' => '¢', 'ầ' => 'ß', 'Ầ' => '¡', 'ấ' => 'Þ', 'ả' => 'À', 'ạ' => 'Â', 'ư' => 'õ', 'Ư' => '·', 'ơ' => 'ï', 'Ơ' => '±', 'ũ' => 'Õ', 'ĩ' => 'Ë', 'Ĩ' => '', 'đ' => '½', 'ă' => '×', 'ý' => 'û', 'ú' => 'Ò', 'ù' => 'Ó', 'õ' => 'Ð', 'ô' => 'é', 'ó' => 'Í', 'ò' => 'Î', 'í' => 'È', 'ì' => 'É', 'ê' => 'ã', 'é' => 'Ã', 'è' => 'Ä', 'ã' => 'Á', 'â' => 'Ý', 'á' => '¾', 'à' => '¿', 'Ô' => '«', 'Ó' => '', 'Ò' => '', 'Í' => 'Š', 'Ê' => '¥', 'Ã' => 'ƒ', 'Â' => 'Ÿ', 'À' => '', 'Ỹ' => '|', 'Ỷ' => '`', 'Ỳ' => '^', 'Ấ' => '~', 'Đ' => '}', 'Ý' => '{',),
        array(
            'ự' => 'æû', 'Ự' => 'ÆÛ', 'ữ' => 'æî', 'Ữ' => 'ÆÎ', 'ử' => 'æí', 'Ử' => 'ÆÍ', 'ừ' => 'æì', 'Ừ' => 'ÆÌ', 'ứ' => 'æï', 'Ứ' => 'ÆÏ', 'ợ' => 'åü', 'Ợ' => 'ÅÜ', 'ỡ' => 'åî', 'Ỡ' => 'ÅÎ', 'ở' => 'åí', 'Ở' => 'ÅÍ', 'ờ' => 'åì', 'Ờ' => 'ÅÌ', 'ớ' => 'åï', 'Ớ' => 'ÅÏ', 'ộ' => 'äü', 'Ộ' => 'ÄÜ', 'ỗ' => 'äù', 'Ỗ' => 'ÄÙ', 'ổ' => 'äø', 'Ổ' => 'ÄØ', 'ồ' => 'äö', 'Ồ' => 'ÄÖ', 'ố' => 'äú', 'Ố' => 'ÄÚ', 'ệ' => 'ãû', 'Ệ' => 'ÃÛ', 'ễ' => 'ãù', 'Ễ' => 'ÃÙ', 'ể' => 'ãø', 'Ể' => 'ÃØ', 'ề' => 'ãö', 'Ề' => 'ÃÖ', 'ế' => 'ãú', 'Ế' => 'ÃÚ', 'ặ' => 'àû', 'Ặ' => 'ÀÛ', 'ẵ' => 'àô', 'Ẵ' => 'ÀÔ', 'ẳ' => 'àó', 'Ẳ' => 'ÀÓ', 'ằ' => 'àò', 'Ằ' => 'ÀÒ', 'ắ' => 'àõ', 'Ắ' => 'ÀÕ', 'ậ' => 'áû', 'Ậ' => 'ÁÛ', 'ẫ' => 'áù', 'Ẫ' => 'ÁÙ', 'ẩ' => 'áø', 'Ẩ' => 'ÁØ', 'ầ' => 'áö', 'Ầ' => 'ÁÖ', 'ấ' => 'áú', 'Ấ' => 'ÁÚ', 'ỹ' => 'yî', 'Ỹ' => 'YÎ', 'ỷ' => 'yí', 'Ỷ' => 'YÍ', 'ỵ' => 'yñ', 'Ỵ' => 'YÑ', 'ỳ' => 'yì', 'Ỳ' => 'YÌ', 'ủ' => 'uí', 'Ủ' => 'UÍ', 'ụ' => 'uû', 'Ụ' => 'UÛ', 'ỏ' => 'oí', 'Ỏ' => 'OÍ', 'ọ' => 'oü', 'Ọ' => 'OÜ', 'ẽ' => 'eî', 'Ẽ' => 'EÎ', 'ẻ' => 'eí', 'Ẻ' => 'EÍ', 'ẹ' => 'eû', 'Ẹ' => 'EÛ', 'ả' => 'aí', 'Ả' => 'AÍ', 'ạ' => 'aû', 'Ạ' => 'AÛ', 'ũ' => 'uî', 'Ũ' => 'UÎ', 'ý' => 'yï', 'ú' => 'uï', 'ù' => 'uì', 'õ' => 'oî', 'ó' => 'oï', 'ò' => 'oì', 'é' => 'eï', 'è' => 'eì', 'ã' => 'aî', 'á' => 'aï', 'à' => 'aì', 'Ý' => 'YÏ', 'Ú' => 'UÏ', 'Ù' => 'UÌ', 'Õ' => 'OÎ', 'Ó' => 'OÏ', 'Ò' => 'OÌ', 'É' => 'EÏ', 'È' => 'EÌ', 'Ã' => 'AÎ', 'Á' => 'AÏ', 'À' => 'AÌ', 'ị' => 'ë', 'Ị' => 'Ë', 'ỉ' => 'è', 'Ỉ' => 'È', 'ư' => 'æ', 'Ư' => 'Æ', 'ơ' => 'å', 'Ơ' => 'Å', 'ĩ' => 'é', 'Ĩ' => 'É', 'đ' => 'â', 'Đ' => 'Â', 'ă' => 'à', 'Ă' => 'À', 'ô' => 'ä', 'í' => 'ê', 'ì' => 'ç', 'ê' => 'ã', 'â' => 'á', 'Ô' => 'Ä', 'Í' => 'Ê', 'Ì' => 'Ç', 'Ê' => 'Ã', 'Â' => 'Á',),
        array(
            'Ơ' => '›', 'Ă' => '–', 'Ê' => '™', 'Â' => '—', 'ỹ' => 'û', 'Ỹ' => 'û', 'ỷ' => 'ú', 'Ỷ' => 'ú', 'ỵ' => 'ÿ', 'Ỵ' => 'ÿ', 'ỳ' => 'ù', 'Ỳ' => 'ù', 'ự' => 'ø', 'Ự' => 'ø', 'ữ' => 'ö', 'Ữ' => 'ö', 'ử' => 'õ', 'Ử' => 'õ', 'ừ' => 'ô', 'Ừ' => 'ô', 'ứ' => '÷', 'Ứ' => '÷', 'ủ' => 'ï', 'Ủ' => 'ï', 'ụ' => 'ó', 'Ụ' => 'ó', 'ợ' => 'í', 'Ợ' => 'í', 'ỡ' => 'ë', 'Ỡ' => 'ë', 'ở' => 'ê', 'Ở' => 'ê', 'ờ' => 'é', 'Ờ' => 'é', 'ớ' => 'ì', 'Ớ' => 'ì', 'ộ' => 'è', 'Ộ' => 'è', 'ỗ' => 'æ', 'Ỗ' => 'æ', 'ổ' => 'å', 'Ổ' => 'å', 'ồ' => 'ä', 'Ồ' => 'ä', 'ố' => 'ç', 'Ố' => 'ç', 'ỏ' => 'à', 'Ỏ' => 'à', 'ọ' => 'ã', 'Ọ' => 'ã', 'ị' => 'Ü', 'Ị' => 'Ü', 'ỉ' => 'Ù', 'Ỉ' => 'Ù', 'ệ' => 'Ö', 'Ệ' => 'Ö', 'ễ' => 'Ô', 'Ễ' => 'Ô', 'ể' => 'Ó', 'Ể' => 'Ó', 'ề' => 'Ò', 'Ề' => 'Ò', 'ế' => 'Õ', 'Ế' => 'Õ', 'ẽ' => 'Î', 'Ẽ' => 'Î', 'ẻ' => 'Í', 'Ẻ' => 'Í', 'ẹ' => 'Ñ', 'Ẹ' => 'Ñ', 'ặ' => 'Æ', 'Ặ' => 'Æ', 'ẵ' => 'Ä', 'Ẵ' => 'Ä', 'ẳ' => 'Ã', 'Ẳ' => 'Ã', 'ằ' => 'Â', 'Ằ' => 'Â', 'ắ' => 'Å', 'Ắ' => 'Å', 'ậ' => 'Ë', 'Ậ' => 'Ë', 'ẫ' => 'É', 'Ẫ' => 'É', 'ẩ' => 'È', 'Ẩ' => 'È', 'ầ' => 'Ç', 'Ầ' => 'Ç', 'ấ' => 'Ê', 'Ấ' => 'Ê', 'ả' => '¶', 'Ả' => '¶', 'ạ' => 'Á', 'Ạ' => 'Á', 'ư' => '§', 'Ư' => 'œ', 'ơ' => '¥', 'ũ' => 'ñ', 'Ũ' => 'ñ', 'ĩ' => 'Ú', 'Ĩ' => 'Ú', 'đ' => '¢', 'Đ' => '˜', 'ă' => 'Ÿ', 'ý' => 'ü', 'ú' => 'ò', 'ù' => 'î', 'õ' => 'á', 'ô' => '¤', 'ó' => 'â', 'ò' => 'ß', 'í' => 'Û', 'ì' => 'Ø', 'ê' => '£', 'é' => 'Ï', 'è' => 'Ì', 'ã' => 'º', 'â' => '¡', 'á' => 'À', 'à' => 'ª', 'Ý' => 'ü', 'Ú' => 'ò', 'Ù' => 'î', 'Õ' => 'á', 'Ô' => 'š', 'Ó' => 'â', 'Ò' => 'ß', 'Í' => 'Û', 'Ì' => 'Ø', 'É' => 'Ï', 'È' => 'Ì', 'Ã' => 'º', 'Á' => 'À', 'À' => 'ª',),
        array(
            'ớ' => 'á»›', 'ộ' => 'á»™', 'ỗ' => 'á»—', 'Ỗ' => 'á»–', 'ổ' => 'á»•', 'Ổ' => 'á»”', 'ồ' => 'á»“', 'Ồ' => 'á»’', 'ố' => 'á»‘', 'ị' => 'á»‹', 'ỉ' => 'á»‰', 'ệ' => 'á»‡', 'Ệ' => 'á»†', 'ễ' => 'á»…', 'Ễ' => 'á»„', 'Ể' => 'á»‚', 'Ề' => 'á»€', 'ỹ' => 'á»¹', 'Ỹ' => 'á»¸', 'ỷ' => 'á»·', 'Ỷ' => 'á»¶', 'ỵ' => 'á»µ', 'Ỵ' => 'á»´', 'ỳ' => 'á»³', 'Ỳ' => 'á»²', 'ự' => 'á»±', 'Ự' => 'á»°', 'ữ' => 'á»¯', 'Ữ' => 'á»®', 'ử' => 'á»­', 'Ử' => 'á»¬', 'ừ' => 'á»«', 'Ừ' => 'á»ª', 'ứ' => 'á»©', 'Ứ' => 'á»¨', 'ủ' => 'á»§', 'Ủ' => 'á»¦', 'ụ' => 'á»¥', 'Ụ' => 'á»¤', 'ợ' => 'á»£', 'Ợ' => 'á»¢', 'ỡ' => 'á»¡', 'Ỡ' => 'á»', 'ở' => 'á»Ÿ', 'Ở' => 'á»ž', 'ờ' => 'á»', 'Ờ' => 'á»œ', 'Ớ' => 'á»š', 'Ộ' => 'á»˜', 'Ố' => 'á»', 'ỏ' => 'á»', 'Ỏ' => 'á»Ž', 'ọ' => 'á»', 'Ọ' => 'á»Œ', 'Ị' => 'á»Š', 'Ỉ' => 'á»ˆ', 'ể' => 'á»ƒ', 'ề' => 'á»', 'ế' => 'áº¿', 'Ế' => 'áº¾', 'ẽ' => 'áº½', 'Ẽ' => 'áº¼', 'ẻ' => 'áº»', 'Ẻ' => 'áºº', 'ẹ' => 'áº¹', 'Ẹ' => 'áº¸', 'ặ' => 'áº·', 'Ặ' => 'áº¶', 'ẵ' => 'áºµ', 'Ẵ' => 'áº´', 'ẳ' => 'áº³', 'Ẳ' => 'áº²', 'ằ' => 'áº±', 'Ằ' => 'áº°', 'ắ' => 'áº¯', 'Ắ' => 'áº®', 'ậ' => 'áº­', 'Ậ' => 'áº¬', 'ẫ' => 'áº«', 'Ẫ' => 'áºª', 'ẩ' => 'áº©', 'Ẩ' => 'áº¨', 'ầ' => 'áº§', 'Ầ' => 'áº¦', 'ấ' => 'áº¥', 'Ấ' => 'áº¤', 'ả' => 'áº£', 'Ả' => 'áº¢', 'ạ' => 'áº¡', 'Ạ' => 'áº', 'đ' => 'Ä‘', 'Ă' => 'Ä‚', 'Ù' => 'Ã™', 'Õ' => 'Ã•', 'Ô' => 'Ã”', 'Ó' => 'Ã“', 'Ò' => 'Ã’', 'É' => 'Ã‰', 'Â' => 'Ã‚', 'À' => 'Ã€', 'ư' => 'Æ°', 'Ư' => 'Æ¯', 'ơ' => 'Æ¡', 'Ơ' => 'Æ', 'ũ' => 'Å©', 'Ũ' => 'Å¨', 'ĩ' => 'Ä©', 'Ĩ' => 'Ä¨', 'Đ' => 'Ä', 'ă' => 'Äƒ', 'ý' => 'Ã½', 'ú' => 'Ãº', 'ù' => 'Ã¹', 'õ' => 'Ãµ', 'ô' => 'Ã´', 'ó' => 'Ã³', 'ò' => 'Ã²', 'í' => 'Ã­', 'ì' => 'Ã¬', 'ê' => 'Ãª', 'é' => 'Ã©', 'è' => 'Ã¨', 'ã' => 'Ã£', 'â' => 'Ã¢', 'á' => 'Ã¡', 'à' => 'Ã', 'Ý' => 'Ã', 'Ú' => 'Ãš', 'Í' => 'Ã', 'Ì' => 'ÃŒ', 'Ê' => 'ÃŠ', 'È' => 'Ãˆ', 'Ã' => 'Ãƒ', 'Á' => 'Ã',),
        array(
            'ỹ' => '&#7929;', 'Ỹ' => '&#7928;', 'ỷ' => '&#7927;', 'Ỷ' => '&#7926;', 'ỵ' => '&#7925;', 'Ỵ' => '&#7924;', 'ỳ' => '&#7923;', 'Ỳ' => '&#7922;', 'ự' => '&#7921;', 'Ự' => '&#7920;', 'ữ' => '&#7919;', 'Ữ' => '&#7918;', 'ử' => '&#7917;', 'Ử' => '&#7916;', 'ừ' => '&#7915;', 'Ừ' => '&#7914;', 'ứ' => '&#7913;', 'Ứ' => '&#7912;', 'ủ' => '&#7911;', 'Ủ' => '&#7910;', 'ụ' => '&#7909;', 'Ụ' => '&#7908;', 'ợ' => '&#7907;', 'Ợ' => '&#7906;', 'ỡ' => '&#7905;', 'Ỡ' => '&#7904;', 'ở' => '&#7903;', 'Ở' => '&#7902;', 'ờ' => '&#7901;', 'Ờ' => '&#7900;', 'ớ' => '&#7899;', 'Ớ' => '&#7898;', 'ộ' => '&#7897;', 'Ộ' => '&#7896;', 'ỗ' => '&#7895;', 'Ỗ' => '&#7894;', 'ổ' => '&#7893;', 'Ổ' => '&#7892;', 'ồ' => '&#7891;', 'Ồ' => '&#7890;', 'ố' => '&#7889;', 'Ố' => '&#7888;', 'ỏ' => '&#7887;', 'Ỏ' => '&#7886;', 'ọ' => '&#7885;', 'Ọ' => '&#7884;', 'ị' => '&#7883;', 'Ị' => '&#7882;', 'ỉ' => '&#7881;', 'Ỉ' => '&#7880;', 'ệ' => '&#7879;', 'Ệ' => '&#7878;', 'ễ' => '&#7877;', 'Ễ' => '&#7876;', 'ể' => '&#7875;', 'Ể' => '&#7874;', 'ề' => '&#7873;', 'Ề' => '&#7872;', 'ế' => '&#7871;', 'Ế' => '&#7870;', 'ẽ' => '&#7869;', 'Ẽ' => '&#7868;', 'ẻ' => '&#7867;', 'Ẻ' => '&#7866;', 'ẹ' => '&#7865;', 'Ẹ' => '&#7864;', 'ặ' => '&#7863;', 'Ặ' => '&#7862;', 'ẵ' => '&#7861;', 'Ẵ' => '&#7860;', 'ẳ' => '&#7859;', 'Ẳ' => '&#7858;', 'ằ' => '&#7857;', 'Ằ' => '&#7856;', 'ắ' => '&#7855;', 'Ắ' => '&#7854;', 'ậ' => '&#7853;', 'Ậ' => '&#7852;', 'ẫ' => '&#7851;', 'Ẫ' => '&#7850;', 'ẩ' => '&#7849;', 'Ẩ' => '&#7848;', 'ầ' => '&#7847;', 'Ầ' => '&#7846;', 'ấ' => '&#7845;', 'Ấ' => '&#7844;', 'ả' => '&#7843;', 'Ả' => '&#7842;', 'ạ' => '&#7841;', 'Ạ' => '&#7840;', 'ư' => '&#432;', 'Ư' => '&#431;', 'ơ' => '&#417;', 'Ơ' => '&#416;', 'ũ' => '&#361;', 'Ũ' => '&#360;', 'ĩ' => '&#297;', 'Ĩ' => '&#296;', 'đ' => '&#273;', 'Đ' => '&#272;', 'ă' => '&#259;', 'Ă' => '&#258;', 'ý' => '&#253;', 'ú' => '&#250;', 'ù' => '&#249;', 'õ' => '&#245;', 'ô' => '&#244;', 'ó' => '&#243;', 'ò' => '&#242;', 'í' => '&#237;', 'ì' => '&#236;', 'ê' => '&#234;', 'é' => '&#233;', 'è' => '&#232;', 'ã' => '&#227;', 'â' => '&#226;', 'á' => '&#225;', 'à' => '&#224;', 'Ý' => '&#221;', 'Ú' => '&#218;', 'Ù' => '&#217;', 'Õ' => '&#213;', 'Ô' => '&#212;', 'Ó' => '&#211;', 'Ò' => '&#210;', 'Í' => '&#205;', 'Ì' => '&#204;', 'Ê' => '&#202;', 'É' => '&#201;', 'È' => '&#200;', 'Ã' => '&#195;', 'Â' => '&#194;', 'Á' => '&#193;', 'À' => '&#192;',),
        array(
            'ỹ' => '&#x1EF9;', 'Ỹ' => '&#x1EF8;', 'ỷ' => '&#x1EF7;', 'Ỷ' => '&#x1EF6;', 'ỵ' => '&#x1EF5;', 'Ỵ' => '&#x1EF4;', 'ỳ' => '&#x1EF3;', 'Ỳ' => '&#x1EF2;', 'ự' => '&#x1EF1;', 'Ự' => '&#x1EF0;', 'ữ' => '&#x1EEF;', 'Ữ' => '&#x1EEE;', 'ử' => '&#x1EED;', 'Ử' => '&#x1EEC;', 'ừ' => '&#x1EEB;', 'Ừ' => '&#x1EEA;', 'ứ' => '&#x1EE9;', 'Ứ' => '&#x1EE8;', 'ủ' => '&#x1EE7;', 'Ủ' => '&#x1EE6;', 'ụ' => '&#x1EE5;', 'Ụ' => '&#x1EE4;', 'ợ' => '&#x1EE3;', 'Ợ' => '&#x1EE2;', 'ỡ' => '&#x1EE1;', 'Ỡ' => '&#x1EE0;', 'ở' => '&#x1EDF;', 'Ở' => '&#x1EDE;', 'ờ' => '&#x1EDD;', 'Ờ' => '&#x1EDC;', 'ớ' => '&#x1EDB;', 'Ớ' => '&#x1EDA;', 'ộ' => '&#x1ED9;', 'Ộ' => '&#x1ED8;', 'ỗ' => '&#x1ED7;', 'Ỗ' => '&#x1ED6;', 'ổ' => '&#x1ED5;', 'Ổ' => '&#x1ED4;', 'ồ' => '&#x1ED3;', 'Ồ' => '&#x1ED2;', 'ố' => '&#x1ED1;', 'Ố' => '&#x1ED0;', 'ỏ' => '&#x1ECF;', 'Ỏ' => '&#x1ECE;', 'ọ' => '&#x1ECD;', 'Ọ' => '&#x1ECC;', 'ị' => '&#x1ECB;', 'Ị' => '&#x1ECA;', 'ỉ' => '&#x1EC9;', 'Ỉ' => '&#x1EC8;', 'ệ' => '&#x1EC7;', 'Ệ' => '&#x1EC6;', 'ễ' => '&#x1EC5;', 'Ễ' => '&#x1EC4;', 'ể' => '&#x1EC3;', 'Ể' => '&#x1EC2;', 'ề' => '&#x1EC1;', 'Ề' => '&#x1EC0;', 'ế' => '&#x1EBF;', 'Ế' => '&#x1EBE;', 'ẽ' => '&#x1EBD;', 'Ẽ' => '&#x1EBC;', 'ẻ' => '&#x1EBB;', 'Ẻ' => '&#x1EBA;', 'ẹ' => '&#x1EB9;', 'Ẹ' => '&#x1EB8;', 'ặ' => '&#x1EB7;', 'Ặ' => '&#x1EB6;', 'ẵ' => '&#x1EB5;', 'Ẵ' => '&#x1EB4;', 'ẳ' => '&#x1EB3;', 'Ẳ' => '&#x1EB2;', 'ằ' => '&#x1EB1;', 'Ằ' => '&#x1EB0;', 'ắ' => '&#x1EAF;', 'Ắ' => '&#x1EAE;', 'ậ' => '&#x1EAD;', 'Ậ' => '&#x1EAC;', 'ẫ' => '&#x1EAB;', 'Ẫ' => '&#x1EAA;', 'ẩ' => '&#x1EA9;', 'Ẩ' => '&#x1EA8;', 'ầ' => '&#x1EA7;', 'Ầ' => '&#x1EA6;', 'ấ' => '&#x1EA5;', 'Ấ' => '&#x1EA4;', 'ả' => '&#x1EA3;', 'Ả' => '&#x1EA2;', 'ạ' => '&#x1EA1;', 'Ạ' => '&#x1EA0;', 'ư' => '&#x1B0;', 'Ư' => '&#x1AF;', 'ơ' => '&#x1A1;', 'Ơ' => '&#x1A0;', 'ũ' => '&#x169;', 'Ũ' => '&#x168;', 'ĩ' => '&#x129;', 'Ĩ' => '&#x128;', 'đ' => '&#x111;', 'Đ' => '&#x110;', 'ă' => '&#x103;', 'Ă' => '&#x102;', 'ý' => '&#xFD;', 'ú' => '&#xFA;', 'ù' => '&#xF9;', 'õ' => '&#xF5;', 'ô' => '&#xF4;', 'ó' => '&#xF3;', 'ò' => '&#xF2;', 'í' => '&#xED;', 'ì' => '&#xEC;', 'ê' => '&#xEA;', 'é' => '&#xE9;', 'è' => '&#xE8;', 'ã' => '&#xE3;', 'â' => '&#xE2;', 'á' => '&#xE1;', 'à' => '&#xE0;', 'Ý' => '&#xDD;', 'Ú' => '&#xDA;', 'Ù' => '&#xD9;', 'Õ' => '&#xD5;', 'Ô' => '&#xD4;', 'Ó' => '&#xD3;', 'Ò' => '&#xD2;', 'Í' => '&#xCD;', 'Ì' => '&#xCC;', 'Ê' => '&#xCA;', 'É' => '&#xC9;', 'È' => '&#xC8;', 'Ã' => '&#xC3;', 'Â' => '&#xC2;', 'Á' => '&#xC1;', 'À' => '&#xC0;',),
        array(
            'ỹ' => '\\x1EF9', 'Ỹ' => '\\x1EF8', 'ỷ' => '\\x1EF7', 'Ỷ' => '\\x1EF6', 'ỵ' => '\\x1EF5', 'Ỵ' => '\\x1EF4', 'ỳ' => '\\x1EF3', 'Ỳ' => '\\x1EF2', 'ự' => '\\x1EF1', 'Ự' => '\\x1EF0', 'ữ' => '\\x1EEF', 'Ữ' => '\\x1EEE', 'ử' => '\\x1EED', 'Ử' => '\\x1EEC', 'ừ' => '\\x1EEB', 'Ừ' => '\\x1EEA', 'ứ' => '\\x1EE9', 'Ứ' => '\\x1EE8', 'ủ' => '\\x1EE7', 'Ủ' => '\\x1EE6', 'ụ' => '\\x1EE5', 'Ụ' => '\\x1EE4', 'ợ' => '\\x1EE3', 'Ợ' => '\\x1EE2', 'ỡ' => '\\x1EE1', 'Ỡ' => '\\x1EE0', 'ở' => '\\x1EDF', 'Ở' => '\\x1EDE', 'ờ' => '\\x1EDD', 'Ờ' => '\\x1EDC', 'ớ' => '\\x1EDB', 'Ớ' => '\\x1EDA', 'ộ' => '\\x1ED9', 'Ộ' => '\\x1ED8', 'ỗ' => '\\x1ED7', 'Ỗ' => '\\x1ED6', 'ổ' => '\\x1ED5', 'Ổ' => '\\x1ED4', 'ồ' => '\\x1ED3', 'Ồ' => '\\x1ED2', 'ố' => '\\x1ED1', 'Ố' => '\\x1ED0', 'ỏ' => '\\x1ECF', 'Ỏ' => '\\x1ECE', 'ọ' => '\\x1ECD', 'Ọ' => '\\x1ECC', 'ị' => '\\x1ECB', 'Ị' => '\\x1ECA', 'ỉ' => '\\x1EC9', 'Ỉ' => '\\x1EC8', 'ệ' => '\\x1EC7', 'Ệ' => '\\x1EC6', 'ễ' => '\\x1EC5', 'Ễ' => '\\x1EC4', 'ể' => '\\x1EC3', 'Ể' => '\\x1EC2', 'ề' => '\\x1EC1', 'Ề' => '\\x1EC0', 'ế' => '\\x1EBF', 'Ế' => '\\x1EBE', 'ẽ' => '\\x1EBD', 'Ẽ' => '\\x1EBC', 'ẻ' => '\\x1EBB', 'Ẻ' => '\\x1EBA', 'ẹ' => '\\x1EB9', 'Ẹ' => '\\x1EB8', 'ặ' => '\\x1EB7', 'Ặ' => '\\x1EB6', 'ẵ' => '\\x1EB5', 'Ẵ' => '\\x1EB4', 'ẳ' => '\\x1EB3', 'Ẳ' => '\\x1EB2', 'ằ' => '\\x1EB1', 'Ằ' => '\\x1EB0', 'ắ' => '\\x1EAF', 'Ắ' => '\\x1EAE', 'ậ' => '\\x1EAD', 'Ậ' => '\\x1EAC', 'ẫ' => '\\x1EAB', 'Ẫ' => '\\x1EAA', 'ẩ' => '\\x1EA9', 'Ẩ' => '\\x1EA8', 'ầ' => '\\x1EA7', 'Ầ' => '\\x1EA6', 'ấ' => '\\x1EA5', 'Ấ' => '\\x1EA4', 'ả' => '\\x1EA3', 'Ả' => '\\x1EA2', 'ạ' => '\\x1EA1', 'Ạ' => '\\x1EA0', 'ư' => '\\x1B0', 'Ư' => '\\x1AF', 'ơ' => '\\x1A1', 'Ơ' => '\\x1A0', 'ũ' => '\\x169', 'Ũ' => '\\x168', 'ĩ' => '\\x129', 'Ĩ' => '\\x128', 'đ' => '\\x111', 'Đ' => '\\x110', 'ă' => '\\x103', 'Ă' => '\\x102', 'ý' => 'ý', 'ú' => 'ú', 'ù' => 'ù', 'õ' => 'õ', 'ô' => 'ô', 'ó' => 'ó', 'ò' => 'ò', 'í' => 'í', 'ì' => 'ì', 'ê' => 'ê', 'é' => 'é', 'è' => 'è', 'ã' => 'ã', 'â' => 'â', 'á' => 'á', 'à' => 'à', 'Ý' => 'Ý', 'Ú' => 'Ú', 'Ù' => 'Ù', 'Õ' => 'Õ', 'Ô' => 'Ô', 'Ó' => 'Ó', 'Ò' => 'Ò', 'Í' => 'Í', 'Ì' => 'Ì', 'Ê' => 'Ê', 'É' => 'É', 'È' => 'È', 'Ã' => 'Ã', 'Â' => 'Â', 'Á' => 'Á', 'À' => 'À',),
    );
    public static $detail = array("Unicode", "TCVN3", "VNI Windows", "Unicode Tổ hợp", "VIQR", "VISCII", "VPS", "BK HCM 2", "BK HCM 1", "Vietware X", "Vietware F", "UTF-8", "NCR decimal", "NCR Hex", "Unicode C string");

    public static function Detect($input) {
        $mark = 999999999;
        $detectcode = 0;
        //duyet tung bo source
        //echo count(Convert::$desc);
        for ($i = 0; $i < count(Convert::$desc); $i++) {
            $j = 0;
            $s = $input;
            foreach (Convert::$desc[$i] as $k => $v) {
                $s = str_replace($v, "", $s);
                if (strlen($s) < $mark) {
                    $detectcode = $i;
                    $mark = strlen($s);
                }
            }
        }
        return $detectcode;
    }

    public static function ConvertToUnicode($input) {
        $code = Convert::Detect(substr($input, 0, 255));

        if ($code == 0) {
            return $input;
        }

        $i = 0;
        foreach (Convert::$desc[$code] as $v) {
            $input = str_replace($v, "<~>" . $i . "<~>", $input);
            $i++;
        }
        $i = 0;
        foreach (Convert::$desc[$code] as $k => $v) {
            $input = str_replace("<~>" . $i . "<~>", $k, $input);
            $i++;
        }
        return $input;
    }

    // tools
    public static function cmp($a, $b) {
        if (strlen($a) == strlen($b)) {
            return 0;
        }
        return (strlen($a) < strlen($b)) ? 1 : -1;
    }

    public static function recreate() {
        for ($code = 0; $code < count(Convert::$desc); $code++) {

            //sort
            $source = Convert::$source;

            for ($i = 0; $i < count($source); $i++) {
                for ($j = $i; $j < count($source); $j++) {
                    //neu do dai bang nhau
                    if (strlen(Convert::$desc[$code][$i]) == strlen(Convert::$desc[$code][$j])) {
                        if (strcmp($source[$i], $source[$j]) < 0) {
                            $tmp = $source[$i];
                            $source[$i] = $source[$j];
                            $source[$j] = $tmp;
                            $tmp = Convert::$desc[$code][$i];
                            Convert::$desc[$code][$i] = Convert::$desc[$code][$j];
                            Convert::$desc[$code][$j] = $tmp;
                        }
                    } else {
                        if (strlen(Convert::$desc[$code][$i]) < strlen(Convert::$desc[$code][$j])) {
                            $tmp = $source[$i];
                            $source[$i] = $source[$j];
                            $source[$j] = $tmp;
                            $tmp = Convert::$desc[$code][$i];
                            Convert::$desc[$code][$i] = Convert::$desc[$code][$j];
                            Convert::$desc[$code][$j] = $tmp;
                        }
                    }
                }
            }
            //rebuild
            $rebuildarr = array();
            for ($i = 0; $i < count($source); $i++) {
                $rebuildarr[$source[$i]] = Convert::$desc[$code][$i];
            }
            var_export($rebuildarr);

            echo "<br>";
        }
    }
}