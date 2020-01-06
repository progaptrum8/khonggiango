<?php
use app\components\Common;
use app\components\CommonUtil;
use app\models\VbVanban;
?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<style>
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
@page
	{margin:.75in .7in .75in .7in;
	mso-header-margin:.3in;
	mso-footer-margin:.3in;}
-->
tr
	{mso-height-source:auto;}
col
	{mso-width-source:auto;}
br
	{mso-data-placement:same-cell;}
.style0
	{mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	mso-background-source:auto;
	mso-pattern:auto;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:Normal;
	mso-style-id:0;}
td
	{mso-style-parent:style0;
	padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:none;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:locked visible;
	white-space:nowrap;
	mso-rotate:0;}
.xl65
	{mso-style-parent:style0;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;}
.xl66
	{mso-style-parent:style0;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:"Short Date";}
.xl67
	{mso-style-parent:style0;
	font-weight:700;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl68
	{mso-style-parent:style0;
	font-weight:700;
	mso-number-format:"Short Date";
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl69
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl70
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl71
	{mso-style-parent:style0;
	mso-number-format:"Short Date";
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl72
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl73
	{mso-style-parent:style0;
	font-style:italic;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl74
	{mso-style-parent:style0;
	font-weight:700;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl75
	{mso-style-parent:style0;
	font-weight:700;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid black;
	border-left:.5pt solid windowtext;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl76
	{mso-style-parent:style0;
	font-weight:700;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl77
	{mso-style-parent:style0;
	font-weight:700;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}
.xl78
	{mso-style-parent:style0;
	font-weight:700;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid black;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#CCCCCC;
	mso-pattern:black none;
	white-space:normal;}

</style>
</head>

<body link=blue vlink=purple class=xl65>

<table border=0 cellpadding=0 cellspacing=0 width=1249 style='border-collapse:
 collapse;table-layout:fixed;width:938pt'>
 <col class=xl65 width=64 style='width:48pt'>
 <col class=xl65 width=116 style='mso-width-source:userset;mso-width-alt:4242;
 width:87pt'>
 <col class=xl65 width=174 style='mso-width-source:userset;mso-width-alt:6363;
 width:131pt'>
 <col class=xl66 width=91 style='mso-width-source:userset;mso-width-alt:3328;
 width:68pt'>
 <col class=xl65 width=278 style='mso-width-source:userset;mso-width-alt:10166;
 width:209pt'>
 <col class=xl66 width=109 style='mso-width-source:userset;mso-width-alt:3986;
 width:82pt'>
 <col class=xl65 width=127 style='mso-width-source:userset;mso-width-alt:4644;
 width:95pt'>
 <col class=xl66 width=68 style='mso-width-source:userset;mso-width-alt:2486;
 width:51pt'>
 <col class=xl65 width=117 style='mso-width-source:userset;mso-width-alt:4278;
 width:88pt'>
 <col class=xl65 width=105 style='mso-width-source:userset;mso-width-alt:3840;
 width:79pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl65 width=64 style='height:15.0pt;width:48pt'></td>
  <td class=xl65 width=116 style='width:87pt'></td>
  <td class=xl65 width=174 style='width:131pt'></td>
  <td class=xl66 width=91 style='width:68pt'></td>
  <td class=xl65 width=278 style='width:209pt'></td>
  <td class=xl66 width=109 style='width:82pt'></td>
  <td class=xl65 width=127 style='width:95pt'></td>
  <td class=xl66 width=68 style='width:51pt'></td>
  <td class=xl65 width=117 style='width:88pt'></td>
  <td class=xl65 width=105 style='width:79pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl65 style='height:15.0pt'></td>
  <td class=xl65></td>
  <td class=xl65></td>
  <td class=xl66></td>
  <td class=xl65></td>
  <td class=xl66></td>
  <td class=xl65></td>
  <td class=xl66></td>
  <td class=xl65></td>
  <td class=xl65></td>
 </tr>
 <tr height=27 style='height:20.25pt'>
  <td colspan=10 height=27 class=xl72 style='height:20.25pt'>BÁO CÁO THỐNG KÊ
  THEO CƠ QUAN BAN HÀNH</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=10 height=20 class=xl73 style='height:15.0pt'>(Từ ngày <?=$tuNgay?> đến ngày <?=$denNgay?>)</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl65 style='height:15.0pt'></td>
  <td class=xl65></td>
  <td class=xl65></td>
  <td class=xl66></td>
  <td class=xl65></td>
  <td class=xl66></td>
  <td class=xl65></td>
  <td class=xl66></td>
  <td class=xl65></td>
  <td class=xl65></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td rowspan=2 height=60 class=xl74 width=64 style='border-bottom:.5pt solid black;
  height:45.0pt;width:48pt'>STT</td>
  <td colspan=9 class=xl77 width=1185 style='border-right:.5pt solid black;
  border-left:none;width:890pt'>Văn bản</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl67 width=116 style='height:30.0pt;width:87pt'>Số ký
  hiệu</td>
  <td class=xl67 width=174 style='width:131pt'>Cơ quan ban hành</td>
  <td class=xl68 width=91 style='width:68pt'>Ngày ban hành</td>
  <td class=xl67 width=278 style='width:209pt'>Trích yếu nội dung</td>
  <td class=xl68 width=109 style='width:82pt'>Ngày hiệu lực</td>
  <td class=xl67 width=127 style='width:95pt'>Người ký</td>
  <td class=xl68 width=68 style='width:51pt'>Ngày duyệt</td>
  <td class=xl67 width=117 style='width:88pt'>Người tiếp nhận</td>
  <td class=xl67 width=105 style='width:79pt'>Trạng thái</td>
 </tr>
     <?php
$i=1;
foreach($data as $item){
    $item = VbVanban::findOne($item);
?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl69 width=64 style='height:15.0pt;width:48pt'><?=$i++?></td>
  <td class=xl70 width=116 style='width:87pt'><?=$item->soKyHieu?></td>
  <td class=xl70 width=174 style='width:131pt'><?=$item->coQuan->tenDonVi?></td>
  <td class=xl71 width=91 style='width:68pt'><?= Common::dateUSToVNDate($item->ngayBanHanh)?></td>
  <td class=xl70 width=278 style='width:209pt'><?=Common::reLineEndString($item->trichYeu)?></td>
  <td class=xl71 width=109 style='width:82pt'><?= Common::dateUSToVNDate($item->ngayHieuLuc)?></td>
  <td class=xl70 width=127 style='width:95pt'><?=$item->nguoiKy?></td>
  <td class=xl71 width=68 style='width:51pt'><?=Common::dateUSToVNDate($item->ngayDuyet)?></td>
  <td class=xl70 width=117 style='width:88pt'><?=$item->nguoiTiepNhan->fullname?></td>
  <td class=xl70 width=105 style='width:79pt'>
    <?php
    if($item->isDeleted !=1){
    if($item->trangThai == CommonUtil::VANBAN_TRANGTHAI['CHO_BIEN_TAP']['value']){
        echo CommonUtil::VANBAN_TRANGTHAI['CHO_BIEN_TAP']['name'];
    }
    if($item->trangThai == CommonUtil::VANBAN_TRANGTHAI['CHO_BAN_HANH']['value']){
        echo CommonUtil::VANBAN_TRANGTHAI['CHO_BAN_HANH']['name'];
    }
    if($item->trangThai == CommonUtil::VANBAN_TRANGTHAI['DA_BAN_HANH']['value']){
        echo CommonUtil::VANBAN_TRANGTHAI['DA_BAN_HANH']['name'];
    }
    }else{
        echo "Đã xóa";
    }
    ?>
  </td>
 </tr>
     <?php
   }
   ?>
</table>

</body>

</html>
