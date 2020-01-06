<?php
namespace app\modules\baocao\controllers;
use app\components\BaseController;
use yii\data\Pagination;
use app\models\VbVanban;
use app\components\CommonUtil;
use app\components\Common;
use app\models\VbLoaivanban;
use app\models\DanhmucCoquan;
use Yii;

class BaocaothongkeController extends BaseController
{
    public function actionIndex()
    {
        $loaiVanBan=VbLoaivanban::find()->alias('lvb')
                    ->select('lvb.idLVB, lvb.name')
                    ->join('LEFT JOIN','vb_nhom_loaivanban as nlvb', 'nlvb.idNLVB = lvb.idNLVB')
                    ->where(['lvb.isDeleted'=>0,'lvb.isActive'=>1,'nlvb.isDeleted'=>0,'nlvb.isActive'=>1])
                    ->all();
        $coQuan= DanhmucCoquan::find()
                ->where(['isDelete'=>0,'isActive'=>1,'isPhongBan'=>0])
                ->all();
        return $this->render('index',[
            'listCoQuan'=>$coQuan,
            'listLVB'=>$loaiVanBan
        ]);
    }
    public function actionShowview()
    {
        $isExcel = (int)trim(Yii::$app->request->post("isExcel"));
        $isPrint = (int)trim(Yii::$app->request->post("isPrint"));
        
        $tuNgayRaw = trim(Yii::$app->request->post("tungay"));
        $denNgayRaw = trim(Yii::$app->request->post("denngay"));
        $selectCoQuan = Yii::$app->request->post("selectCoQuan",[]);
        $selectLoaiVanBan = Yii::$app->request->post("selectLoaiVanBan",[]);
        $daXoa = trim(Yii::$app->request->post("daXoa"));
        $tuNgay=$tuNgayRaw;
        if($tuNgay!=""){
            $tuNgay = Common::dateVNToUSDate($tuNgay);
        }else{
            $tuNgay = date("Y-m-d");
            $tuNgayRaw=date("d/m/Y");
        }
        $denNgay=$denNgayRaw;
        if($denNgay!=""){
            $denNgay = Common::dateVNToUSDate($denNgay);
        }else{
            $denNgay = date("Y-m-d");
            $denNgayRaw=date("d/m/Y");
        }
        $stringCondition = " vb.ngayBanHanh BETWEEN :tuNgay AND :denNgay and vb.isDeleted = :isDeleted";
        $arrayCondition = array(
            ':tuNgay'=>$tuNgay,
            ':denNgay'=>$denNgay,
            ':isDeleted'=>((int) $daXoa == 1 ? 1 : 0)
        );
        if( count($selectLoaiVanBan)>0 && !in_array(0,$selectLoaiVanBan)){
            $stringCondition .= " AND vb.idLVB IN (".implode(",",$selectLoaiVanBan).")";
        }
        if(count($selectCoQuan)>0 && !in_array(0,$selectCoQuan)){
            $stringCondition .= " AND vb.idCoQuan IN (".implode(",",$selectCoQuan).")";
        }
                
        $ngayChinhSuaTu=trim(Yii::$app->request->post("ngayChinhSuaTu"));
        $ngayChinhSuaDen=trim(Yii::$app->request->post("ngayChinhSuaDen"));
        if($ngayChinhSuaTu != null && $ngayChinhSuaTu != "" && $ngayChinhSuaDen != null && $ngayChinhSuaDen != ""){
            $stringCondition .= " AND CAST(log.ngayChuyen AS DATE) BETWEEN :ngayChinhSuaTu AND :ngayChinhSuaDen";
            $arrayCondition[':ngayChinhSuaTu']= Common::dateVNToUSDate($ngayChinhSuaTu);
            $arrayCondition[':ngayChinhSuaDen']=Common::dateVNToUSDate($ngayChinhSuaDen);
        }elseif($ngayChinhSuaTu != null && $ngayChinhSuaTu != ""){
            $stringCondition .= " AND CAST(log.ngayChuyen AS DATE) >= :ngayChinhSuaTu ";
            $arrayCondition[':ngayChinhSuaTu']=Common::dateVNToUSDate($ngayChinhSuaTu);
        }elseif($ngayChinhSuaDen != null && $ngayChinhSuaDen != ""){
            $stringCondition .= " AND CAST(log.ngayChuyen AS DATE) <= :ngayChinhSuaDen";
            $arrayCondition[':ngayChinhSuaDen']=Common::dateVNToUSDate($ngayChinhSuaDen);
        }
        
        $query = VbVanban::find()->alias('vb')->select(['vb.idVanBan'])
                ->join('LEFT JOIN','vb_vanban_processlog as log', 'log.idVanBan = vb.idVanBan')
                ->where($stringCondition, $arrayCondition)
                ->groupBy(['vb.idVanBan','vb.ngayBanHanh']);      
        //Phân trang
        $pageSize = Yii::$app->request->post("pageSize");
        $perPage = Yii::$app->request->get("per-page");        
        if( (int) $pageSize <= 0){
            if((int)$perPage >0){
                $pageSize = (int)$perPage;
            }else{
                $pageSize = 40;
            }
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $pageSize]);
        
        $countBienTap = clone $countQuery;
        $countBienTap->andWhere(['in', 'vb.trangThai', array(
            CommonUtil::VANBAN_TRANGTHAI['CHO_BIEN_TAP']['value'],
            CommonUtil::VANBAN_TRANGTHAI['CHO_BAN_HANH']['value']
        )]);
        $countBanHanh = clone $countQuery;
        $countBanHanh->andWhere(['vb.trangThai'=>CommonUtil::VANBAN_TRANGTHAI['DA_BAN_HANH']['value']]);
        if($isExcel == 1){
            header('Content-Disposition: attachment; filename="baocaotonghop.xls"' );
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Content-type:application/vnd.ms-excel");
            $data = $query->all();
            return $this->renderPartial('excel',[
                'data' => $data,
                'tuNgay'=>$tuNgayRaw,
                'denNgay'=>$denNgayRaw,
                'ngayChinhSuaTu'=>$ngayChinhSuaTu,
                'ngayChinhSuaDen'=>$ngayChinhSuaDen,
                'daXoa'=>((int) $daXoa == 1 ? 1 : 0),
                'countDaTiepNhan'=>$countQuery->count(),
                'countBienTap'=>$countBienTap->count(),
                'countBanHanh'=>$countBanHanh->count()
            ]);
        }
        if($isPrint == 1){
            $data = $query->all();
            return $this->renderPartial('print',['data' => $data]);
        }else{            
            //Lấy dữ liệu
            $data = $query->offset($pages->offset)
                    ->orderBy('vb.ngayBanHanh ASC')
                    ->limit($pages->limit)
                    ->all();
            return $this->renderPartial('show',[                
                'pageSize' => $pageSize,
                'data' => $data,
                'pages' => $pages,
                'tuNgay'=>$tuNgayRaw,
                'denNgay'=>$denNgayRaw,
                'ngayChinhSuaTu'=>$ngayChinhSuaTu,
                'ngayChinhSuaDen'=>$ngayChinhSuaDen,
                'daXoa'=>((int) $daXoa == 1 ? 1 : 0),
                'selectCoQuan'=>$selectCoQuan,
                'selectLoaiVanBan'=>$selectLoaiVanBan,
                'countDaTiepNhan'=>$countQuery->count(),
                'countBienTap'=>$countBienTap->count(),
                'countBanHanh'=>$countBanHanh->count()
            ]);
        }
    }
}
