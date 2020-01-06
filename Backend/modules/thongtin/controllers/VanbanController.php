<?php
namespace app\modules\thongtin\controllers;
use app\components\BaseController;
use yii\data\Pagination;
use yii\data\Sort;
use yii\helpers\Url;
use app\models\VbVanban;
use app\components\CommonUtil;
use app\components\Common;
use app\models\VbLinhvucvanban;
use app\models\VbLoaivanban;
use app\models\DanhmucCoquan;
use app\models\VbVanbanProcesslog;
use app\models\QlFiledinhkem;
use app\components\Convert;
use app\models\User;
use Yii;

class VanbanController extends BaseController {

    public function actionIndex() {
        $idType = (int)trim(Yii::$app->request->get("idType"));
        $selectTypeDanhMuc = CommonUtil::VANBAN_TRANGTHAI['CHO_BIEN_TAP']['value'];
        if((int)$idType >=0 && (int)$idType <=2) {
            $selectTypeDanhMuc = $idType;
        }
        
        //Tìm kiếm
        $daXoa = (int)trim(Yii::$app->request->post("daXoa"));
        $stringCondition = " vb.trangThai= :idType  and vb.isDeleted = :isDeleted";
        $arrayCondition = array(
            ':idType'=>$selectTypeDanhMuc,
            ':isDeleted'=>((int) $daXoa == 1 ? 1 : 0)
        );
        
        $searchCoQuan = trim(Yii::$app->request->post("searchCoQuan"));
        $searchCoQuanId = (int)trim(Yii::$app->request->post("searchCoQuanId"));
        if((int)$searchCoQuanId > 0){
            $stringCondition .= " AND vb.idCoQuan = :searchCoQuanId";
            $arrayCondition[':searchCoQuanId'] = $searchCoQuanId;
        }
        
        $searchNguoiKy= Convert::ConvertToUnicode(trim(Yii::$app->request->post("searchNguoiKy")));
        $searchNguoiKyId = (int)trim(Yii::$app->request->post("searchNguoiKyId"));
        if($searchNguoiKy != null && $searchNguoiKy != ""){
            $stringCondition .= " AND vb.nguoiKy like :nguoiKylike ";
            $arrayCondition[':nguoiKylike'] = '%' . $searchNguoiKy . '%';
        }
        
        $search = Convert::ConvertToUnicode(trim(Yii::$app->request->post("search")));
        if ($search != null && $search != "") {
            //$stringCondition .= " AND (CONTAINS(vb.fulltextSearch,:fulltextSearch) or CONTAINS(vb.fulltextSearch,:fulltextSearchNonUni) )";
            $stringCondition .= " AND (CONTAINS(vb.fulltextSearch,:fulltextSearch))";
            $arrayCondition[':fulltextSearch'] = '"'.Common::replaceStringFullText($search).'"';
            //$arrayCondition[':fulltextSearchNonUni'] = '"'.Common::stripUnicode(Common::replaceStringFullText($search)).'"';
        }
        
        $searchSoKyHieu=Convert::ConvertToUnicode(trim(Yii::$app->request->post("searchSoKyHieu")));
        if ($searchSoKyHieu != null && $searchSoKyHieu != "") {
            $stringCondition .= " AND vb.soKyHieu like :soKyHieulike ";
            $arrayCondition[':soKyHieulike'] = '%' . $searchSoKyHieu . '%';
        }
        
        $idLVB=(int)trim(Yii::$app->request->post("idLVB"));
        $idLVB_name=trim(Yii::$app->request->post("idLVB_name"));
        if((int)$idLVB > 0){
            $stringCondition .= " AND vb.idLVB = :idLVB";
            $arrayCondition[':idLVB'] = $idLVB;
        }
        
        $idLVVB=(int)trim(Yii::$app->request->post("idLVVB"));
        if((int)$idLVVB > 0){
            $stringCondition .= " AND vb.idLVVB = :idLVVB";
            $arrayCondition[':idLVVB'] = $idLVVB;
        }
        
        $ngayHieuLucTu=trim(Yii::$app->request->post("ngayHieuLucTu"));
        $ngayHieuLucDen=trim(Yii::$app->request->post("ngayHieuLucDen"));
        if($ngayHieuLucTu != null && $ngayHieuLucTu != "" && $ngayHieuLucDen != null && $ngayHieuLucDen != ""){
            $stringCondition .= " AND vb.ngayHieuLuc BETWEEN :ngayHieuLucTu AND :ngayHieuLucDen";
            $arrayCondition[':ngayHieuLucTu']= Common::dateVNToUSDate($ngayHieuLucTu);
            $arrayCondition[':ngayHieuLucDen']=Common::dateVNToUSDate($ngayHieuLucDen);
        }elseif($ngayHieuLucTu != null && $ngayHieuLucTu != ""){
            $stringCondition .= " AND vb.ngayHieuLuc >= :ngayHieuLucTu ";
            $arrayCondition[':ngayHieuLucTu']=Common::dateVNToUSDate($ngayHieuLucTu);
        }elseif($ngayHieuLucDen != null && $ngayHieuLucDen != ""){
            $stringCondition .= " AND vb.ngayHieuLuc <= :ngayHieuLucDen";
            $arrayCondition[':ngayHieuLucDen']=Common::dateVNToUSDate($ngayHieuLucDen);
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
        
        $ngayBanHanhTu=trim(Yii::$app->request->post("ngayBanHanhTu"));
        $ngayBanHanhDen=trim(Yii::$app->request->post("ngayBanHanhDen"));
        if($ngayBanHanhTu != null && $ngayBanHanhTu != "" && $ngayBanHanhDen != null && $ngayBanHanhDen != ""){
            $stringCondition .= " AND vb.ngayBanHanh BETWEEN :ngayBanHanhTu AND :ngayBanHanhDen";
            $arrayCondition[':ngayBanHanhTu']= Common::dateVNToUSDate($ngayBanHanhTu);
            $arrayCondition[':ngayBanHanhDen']=Common::dateVNToUSDate($ngayBanHanhDen);
        }elseif($ngayBanHanhTu != null && $ngayBanHanhTu != ""){
            $stringCondition .= " AND vb.ngayBanHanh >= :ngayBanHanhTu ";
            $arrayCondition[':ngayBanHanhTu']=Common::dateVNToUSDate($ngayBanHanhTu);
        }elseif($ngayBanHanhDen != null && $ngayBanHanhDen != ""){
            $stringCondition .= " AND vb.ngayBanHanh <= :ngayBanHanhDen";
            $arrayCondition[':ngayBanHanhDen']=Common::dateVNToUSDate($ngayBanHanhDen);
        }
        
        $ngayTiepNhanTu=trim(Yii::$app->request->post("ngayTiepNhanTu"));
        $ngayTiepNhanDen=trim(Yii::$app->request->post("ngayTiepNhanDen"));
        if($ngayTiepNhanTu != null && $ngayTiepNhanTu != "" && $ngayTiepNhanDen != null && $ngayTiepNhanDen != ""){
            $stringCondition .= " AND CAST(vb.ngayTiepNhan AS DATE) BETWEEN :ngayTiepNhanTu AND :ngayTiepNhanDen";
            $arrayCondition[':ngayTiepNhanTu']=Common::dateVNToUSDate($ngayTiepNhanTu);
            $arrayCondition[':ngayTiepNhanDen']=Common::dateVNToUSDate($ngayTiepNhanDen);
        }elseif($ngayTiepNhanTu != null && $ngayTiepNhanTu != ""){
           $stringCondition .= " AND CAST(vb.ngayTiepNhan AS DATE) >= :ngayTiepNhanTu ";
            $arrayCondition[':ngayTiepNhanTu']=Common::dateVNToUSDate($ngayTiepNhanTu); 
        }elseif($ngayTiepNhanDen != null && $ngayTiepNhanDen != ""){
            $stringCondition .= " AND CAST(vb.ngayTiepNhan AS DATE) <= :ngayTiepNhanDen";
            $arrayCondition[':ngayTiepNhanDen']=Common::dateVNToUSDate($ngayTiepNhanDen);
        }
        $query = VbVanban::find()->alias('vb')->select(['vb.idVanBan'])
                ->join('LEFT JOIN','vb_vanban_processlog as log', 'log.idVanBan = vb.idVanBan')                
                ->where($stringCondition, $arrayCondition)
                ->groupBy(['vb.idVanBan','vb.ngayBanHanh']);
        
        //Sort
        $sort = new Sort([
            'attributes' => [
                'soKyHieu' => [
                    'default' => SORT_ASC,
                    'label' => 'Số ký hiệu',
                ],
                'ngayBanHanh' => [
                    'default' => SORT_DESC,
                    'label' => 'Ngày ban hành',
                ],
            ],
            'defaultOrder' => [
                'ngayBanHanh'=>SORT_DESC
            ]
        ]);
        //Phân trang
        $pageSize = Yii::$app->request->post("pageSize");
        $perPage = Yii::$app->request->get("per-page");        
        if( (int) $pageSize <= 0){
            if((int)$perPage >0){
                $pageSize = (int)$perPage;
            }else{
                $pageSize = 20;
            }
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $pageSize]);
        //Lấy dữ liệu
        $data = $query->offset($pages->offset)
                ->orderBy($sort->orders)
                ->limit($pages->limit)
                ->all();
        // echo $query->createCommand()->rawSql;exit;
        //Hiển thị
        $linhVucVanBan= VbLinhvucvanban::find()->where(['isDeleted'=>0,'isActive'=>1])->all();
        $loaiVanBan=VbLoaivanban::find()->alias('lvb')
                ->select('lvb.idLVB, lvb.name')
                ->join('LEFT JOIN','vb_nhom_loaivanban as nlvb', 'nlvb.idNLVB = lvb.idNLVB')
                ->where(['lvb.isDeleted'=>0,'lvb.isActive'=>1,'nlvb.isDeleted'=>0,'nlvb.isActive'=>1])
                
                ->all();
        $coQuan= DanhmucCoquan::find()
                ->select('id as idCQ, tenDonVi as name')
                ->where(['isDelete'=>0,'isActive'=>1,'isPhongBan'=>0])
                ->asArray()
                ->all();
        $nguoiKy= VbVanban::find()
                ->select('nguoiKy as idNguoiKy, nguoiKy as name')
                ->where(['isDeleted'=>0])                
                ->andWhere(['<>','nguoiKy', ""])
                ->andWhere(['not', ['nguoiKy' => null]])
                ->orderBy("nguoiKy ASC")
                ->groupBy('nguoiKy')
                ->asArray()
                ->all();
        return $this->render('index', [
                    'search' => $search,
                    'searchSoKyHieu'=>$searchSoKyHieu,
                    'idLVB'=>$idLVB,
                    'idLVB_name'=>$idLVB_name,
                    'idLVVB'=>$idLVVB,
                    'ngayBanHanhTu'=>$ngayBanHanhTu,
                    'ngayBanHanhDen'=>$ngayBanHanhDen,
                    'ngayTiepNhanTu'=>$ngayTiepNhanTu,
                    'ngayTiepNhanDen'=>$ngayTiepNhanDen,            
                    'ngayHieuLucTu'=>$ngayHieuLucTu,
                    'ngayHieuLucDen'=>$ngayHieuLucDen,
                    'ngayChinhSuaTu'=>$ngayChinhSuaTu,
                    'ngayChinhSuaDen'=>$ngayChinhSuaDen,
                    'searchCoQuan'=>$searchCoQuan,
                    'searchCoQuanId'=>$searchCoQuanId,
                    'searchNguoiKy'=>$searchNguoiKy,
                    'searchNguoiKyId'=>$searchNguoiKyId,
                    'daXoa'=>$daXoa,
            
                    'idType'=>$selectTypeDanhMuc,
                    'listTypes'=> CommonUtil::VANBAN_TRANGTHAI,
                    'pageSize' => $pageSize,
                    'data' => $data,
                    'pages' => $pages,
                    'sort' => $sort,
            
                    'linhVucVanBan'=>$linhVucVanBan,
                    'loaiVanBan'=>$loaiVanBan,
                    'coQuan'=>$coQuan,
                    'nguoiKy'=>$nguoiKy,
        ]);
    }    
    public function actionInput() {
        $item = new VbVanban();
        $id = (int)trim(Yii::$app->request->get("id"));        
        $linhVucVanBan= VbLinhvucvanban::find()->where(['isDeleted'=>0,'isActive'=>1])->all();
        $loaiVanBan=VbLoaivanban::find()->alias('lvb')
                ->select('lvb.idLVB, lvb.name')
                // ->join('LEFT JOIN','vb_nhom_loaivanban as nlvb', 'nlvb.idNLVB = lvb.idNLVB')
                ->where([
                    'lvb.isDeleted'=>0,
                    'lvb.isActive'=>1
                    // 'nlvb.isDeleted'=>0,
                    // 'nlvb.isActive'=>1
                ])->asArray()->all();
        $coQuan= DanhmucCoquan::find()
                ->select('id as idCQ, tenDonVi as name')
                ->where(['isDelete'=>0,'isActive'=>1,'isPhongBan'=>0])
                ->asArray()
                ->all();
        $nguoiKy= VbVanban::find()
                ->select('nguoiKy as idNguoiKy, nguoiKy as name')
                ->where(['isDeleted'=>0])                
                ->andWhere(['<>','nguoiKy', ""])
                ->andWhere(['not', ['nguoiKy' => null]])
                ->orderBy("nguoiKy ASC")
                ->groupBy('nguoiKy')
                ->asArray()
                ->all();
        
        if ((int) $id > 0) {
            $itemFind = VbVanban::findOne($id);
            if ($itemFind != null) {
                $item = $itemFind;
                $dataFileDinhKem = QlFiledinhkem::find()->where([
                    'idObject'=>$item->idVanBan, 
                    'type'=>CommonUtil::FILE_VANBAN
                ])->one();
                return $this->render('input', ['data' => $item,
                    'updateForm' => true,
                    'linhVucVanBan'=>$linhVucVanBan,
                    'loaiVanBan'=>$loaiVanBan,
                    'coQuan'=>$coQuan,
                    'nguoiKy'=>$nguoiKy,
                    'idFileObject'=>$item->idVanBan,
                    'dataFileDinhKem'=>$dataFileDinhKem
                ]);
            }
        }
        $idFileObject=self::getTempIdObject();
        $dataFileDinhKem = QlFiledinhkem::find()->where([
            'idObject'=>$idFileObject, 
            'type'=>CommonUtil::FILE_VANBAN
        ])->one();
        return $this->render('input', ['data' => $item,
            'updateForm' => false,
            'linhVucVanBan'=>$linhVucVanBan,
            'loaiVanBan'=>$loaiVanBan,
            'coQuan'=>$coQuan,
            'nguoiKy'=>$nguoiKy,
            'idFileObject'=>$idFileObject,
            'dataFileDinhKem'=>$dataFileDinhKem
        ]);
    }

    
    public function actionSave() {
        $id = trim(Yii::$app->request->post("id"));
        $idFileObject = trim(Yii::$app->request->post("idFileObject"));
        $soKyHieu = trim(Yii::$app->request->post("soKyHieu"));
        $trichYeu = trim(Yii::$app->request->post("trichYeu"));
        $idLVB = trim(Yii::$app->request->post("idLVB"));
        $idLVVB = trim(Yii::$app->request->post("idLVVB"));
        $idCoQuan = trim(Yii::$app->request->post("idCoQuan"));
        $ngayBanHanh = trim(Yii::$app->request->post("ngayBanHanh"));
        $ngayHieuLuc = trim(Yii::$app->request->post("ngayHieuLuc"));
        $idNguoiKy = trim(Yii::$app->request->post("idNguoiKy"));
        $idNguoiKy_name = trim(Yii::$app->request->post("idNguoiKy_name"));
        $isHoaToc = trim(Yii::$app->request->post("isHoaToc"));
        $isHetHieuLuc=trim(Yii::$app->request->post("isHetHieuLuc"));
        $item = new VbVanban();
        $userCreateName = Yii::$app->user->identity->fullname;
        $updateForm = false;
        if ((int) $id > 0) {
            $item = VbVanban::findOne($id);
            $updateForm = true;
        }else{
            $item->trangThai = CommonUtil::VANBAN_TRANGTHAI['CHO_BIEN_TAP']['value']; 
            $item->idNguoiTiepNhan= Yii::$app->user->identity->id;
            $item->ngayTiepNhan = date("Y-m-d H:i:s");            
        }
        $item->ngayCapNhat = date("Y-m-d H:i:s");
        $item->soKyHieu = $soKyHieu;
        $item->soKyHieuSo = (int)$soKyHieu;
        $item->trichYeu =$trichYeu;
        $item->idLVB = (int) $idLVB;
        $item->idLVVB =(int) $idLVVB;
        $item->ngayBanHanh = \app\components\Common::dateVNToUSDate($ngayBanHanh);
        $item->ngayHieuLuc = \app\components\Common::dateVNToUSDate($ngayHieuLuc);
        $item->idCoQuan = (int)$idCoQuan;
        $item->nguoiKy = Convert::ConvertToUnicode($idNguoiKy_name);
        $item->isHoaToc = ((int) $isHoaToc == 1 ? 1 : 0);
        $item->isHetHieuLuc = ((int) $isHetHieuLuc == 1 ? 1 : 0);        
        $item->fulltextSearch = Convert::ConvertToUnicode(Common::replaceStringFullText($soKyHieu))
                                ." ".Common::stripUnicode(Convert::ConvertToUnicode(Common::replaceStringFullText($soKyHieu)))
                                ." ".Convert::ConvertToUnicode($trichYeu)
                                ." ".Common::stripUnicode(Convert::ConvertToUnicode($trichYeu));
        $item->userCreateName = $userCreateName;
        if($item->validate()){
            $item->save();
            if ((int) $id >0) {
                $itemLog = new VbVanbanProcesslog();
                $itemLog->idVanBan = $item->idVanBan;
                $itemLog->idNguoiChuyen= Yii::$app->user->identity->id;
                $itemLog->ngayChuyen = date("Y-m-d H:i:s");
                $itemLog->noiDung = "";
                $itemLog->trangThai = CommonUtil::VANBAN_PL_TRANGTHAI['CAP_NHAT']['value'];
                $itemLog->save();
            }else{
                $itemLog = new VbVanbanProcesslog();
                $itemLog->idVanBan = $item->idVanBan;
                $itemLog->idNguoiChuyen= Yii::$app->user->identity->id;
                $itemLog->ngayChuyen = date("Y-m-d H:i:s");
                $itemLog->noiDung = "";
                $itemLog->trangThai = CommonUtil::VANBAN_PL_TRANGTHAI['TIEP_NHAN']['value'];
                $itemLog->save();
                //cập nhật $idFileObject
                $dataFiles = QlFiledinhkem::find()->where([
                    'idObject'=>$idFileObject, 
                    'type'=>CommonUtil::FILE_VANBAN
                ])->all();

                foreach($dataFiles as $file){
                    $file->idObject = $item->idVanBan;
                    $file->save();
                }
            }
            if($updateForm){
                Yii::$app->getSession()->setFlash('success', 'Tiếp nhận/Cập nhật văn bản thành công!');
                return $this->redirect(["/thongtin/vanban/index",'idType'=>$item->trangThai]);
            }else{
                Yii::$app->getSession()->setFlash('success', 'Tiếp nhận/Cập nhật văn bản thành công!');              
                unset($item->idVanBan);
                $idFileObject = self::getTempIdObject();
            }
        }else{
            $updateForm = true;
        }       
        $linhVucVanBan= VbLinhvucvanban::find()->where(['isDeleted'=>0,'isActive'=>1])->all();
        $loaiVanBan=VbLoaivanban::find()->alias('lvb')
            ->select('lvb.idLVB, lvb.name')
            ->join('LEFT JOIN','vb_nhom_loaivanban as nlvb', 'nlvb.idNLVB = lvb.idNLVB')
            ->where(['lvb.isDeleted'=>0,'lvb.isActive'=>1,'nlvb.isDeleted'=>0,'nlvb.isActive'=>1])
                ->asArray()
                ->all();
        $coQuan= DanhmucCoquan::find()
                ->select('id as idCQ, tenDonVi as name')
                ->where(['isDelete'=>0,'isActive'=>1,'isPhongBan'=>0])
                ->asArray()
                ->all();
        $nguoiKy= VbVanban::find()
                ->select('nguoiKy as idNguoiKy, nguoiKy as name')
                ->where(['isDeleted'=>0])
                ->andWhere(['<>','nguoiKy', ""])
                ->andWhere(['not', ['nguoiKy' => null]])
                ->orderBy("nguoiKy ASC")
                ->groupBy('nguoiKy')
                ->asArray()
                ->all();
        $dataFileDinhKem = QlFiledinhkem::find()->where([
            'idObject'=>$idFileObject, 
            'type'=>CommonUtil::FILE_VANBAN
        ])->one();
        return $this->render('input', [
            'data' => $item,
            'updateForm' => $updateForm,
            'linhVucVanBan'=>$linhVucVanBan,
            'loaiVanBan'=>$loaiVanBan,
            'coQuan'=>$coQuan,
            'nguoiKy'=>$nguoiKy,
            'idFileObject'=>$idFileObject,
            'dataFileDinhKem'=>$dataFileDinhKem
        ]);
    }

    public function actionDelete() {
        $idType = trim(Yii::$app->request->post("idType"));
        try {
            $idSelected = Yii::$app->request->post("idSelected");
            if(is_array($idSelected)){
                foreach ($idSelected as $id){
                    $item = VbVanban::findOne($id);
                    $item->isDeleted = "1";
                    $item->save(); 
                }
            }else{
                $item = VbVanban::findOne($idSelected);
                $item->isDeleted = "1";
                $item->save(); 
            }
        } catch (\yii\base\Exception $e) {
            Yii::$app->getSession()->setFlash('error', 'Xóa dữ liệu không thành công!');
            return $this->redirect(["/thongtin/vanban/index",'idType'=>$idType]);
        }
        Yii::$app->getSession()->setFlash('success', 'Xóa dữ liệu thành công!');
        return $this->redirect(["/thongtin/vanban/index",'idType'=>$idType]);
    }
    
    public function actionTabchitiet(){
        $id = Yii::$app->request->get("id");
        $data = VbVanban::findOne((int) $id);
        return $this->renderPartial('tab/tabchitiet', [
            'item' => $data
        ]);
    }
    public function actionTablichsu(){
        $id = Yii::$app->request->get("id");
        $data = VbVanbanProcesslog::find()->where(['idVanBan'=>(int) $id])->orderBy('ngayChuyen asc')->all();
        return $this->renderPartial('tab/tablichsu', [
            'listLichSu' => $data
        ]);
    }
    public function actionTabfiledinhkem(){
        $id = Yii::$app->request->get("id");
        $fileDinhKem = QlFiledinhkem::find()->where([
            'idObject'=>$id, 
            'type'=>CommonUtil::FILE_VANBAN
        ])->all();
        if((int)Yii::$app->request->get("simple",0) == 1){
            return $this->renderPartial('tab/tabfiledinhkemsimple', [
                'fileDinhKem' => $fileDinhKem,
                'idObject'=>$id,
                'simple'=>(int)Yii::$app->request->get("simple",0)
            ]);
        }else{
            return $this->renderPartial('tab/tabfiledinhkem', [
                'fileDinhKem' => $fileDinhKem,
                'idObject'=>$id,
                'simple'=>(int)Yii::$app->request->get("simple",0)
            ]);
        }
    }
    
    public function actionSavefiledinhkem() {
        $idObject = Yii::$app->request->post("idObject");
        $idDK=0;
        $modelFileDinhKem = new \app\models\QlFiledinhkem();
        $reultFile = $modelFileDinhKem->saveFile($idObject, CommonUtil::FILE_VANBAN, [], 'fileUpload', "", true);
        if (Common::is_array_multi($reultFile)) {
            //thêm nhiều file để biết kết quả từng file cần duyệt qua mảng.
        } else {
            if ($reultFile["codeStatus"] == 4 && $reultFile["status"] == true) {
                $idDK=$reultFile["idDK"];
                //Yii::$app->getSession()->setFlash('success', 'Thêm file thành công!');
            } else {
                //Yii::$app->getSession()->setFlash('error', 'Thêm file thất bại!');
            }
        }
        $return = "reloadTab('" . $idObject . "','" . \yii\helpers\Url::to([
            '/thongtin/vanban/tabfiledinhkem', 
            'id' => $idObject,
            'simple'=>(int)Yii::$app->request->post("simple",0)
        ]) . "','linkFileDinhKem');";
        if((int)Yii::$app->request->post("simple",0) ==1){
            if((int)$idDK>0){
                $dataFile = QlFiledinhkem::findOne(['idDK'=>$idDK]);
                $return.="viewerInFormPDF('".Url::to(['/thongtin/filedinhkem/download', 'maSo' => $dataFile->maSo],true)."');";
            }else{
                $return .="noneViewerInFormPDF();"; 
            }
        } 
        echo $return;
        exit;
    }

    public function actionDeletefiledinhkem() {
        $ids = Yii::$app->request->post("id");
        $dirFile = Yii::$app->params['pathFileCustom'];
        $idObject = Yii::$app->request->post("idObject");
        if (is_array($ids)) {
            foreach ($ids as $id) {
                $fileInfo = QlFiledinhkem::findOne(['idDK' => $id,'type'=> CommonUtil::FILE_VANBAN]);
                $path = $dirFile.$fileInfo['dirPath'];
                $checkExistFile = file_exists($path);

                if($checkExistFile == 1){
                   unlink($path);
                }
                
                $fileInfo->delete();

            }
        } else {
            $fileInfo = QlFiledinhkem::findOne(['idDK' => $ids,'type'=> CommonUtil::FILE_VANBAN]);
            $path = $dirFile.$fileInfo['dirPath'];
            $checkExistFile = file_exists($path);

            if($checkExistFile == 1){
               unlink($path);
            }
            
            $fileInfo->delete();
        }
        $simple = (int)Yii::$app->request->post("simple",0);
        $return = "reloadTab('" . $idObject . "','" . \yii\helpers\Url::to(['/thongtin/vanban/tabfiledinhkem', 'id' => $idObject,'simple'=>$simple]) . "','linkFileDinhKem');";
        if($simple ==1){
            $return .="noneViewerInFormPDF();";             
        }
        echo $return;
        exit;
    }
    
    public function actionChonbanhanhfiledinhkem() {
        $id = Yii::$app->request->post("id");
        $check = Yii::$app->request->post("check");
        if((int) $id >0){
            $item = QlFiledinhkem::findOne(['idDK' => $id,'type'=> CommonUtil::FILE_VANBAN]);
            $item->chonBanHanh = ($check =="true"? 1 : 0);
            $item->save();
        }
        exit;
    }
    
    private  function getTempIdObject(){
        $data = VbVanban::find()->select("IDENT_INCR('vb_vanban') as INDE")->asArray()->one();
        $min = QlFiledinhkem::find()->select("MIN(idObject) as INDE")->asArray()->one();
        $rowgen = -1*($data['INDE']+1);
        $rowmin = $min['INDE']-1;
        if($rowgen<=$rowmin){
            return $rowgen;
        }else{
            return $rowmin;
        }
    }
    
    private function capNhatTrangThaiVanBan($id,$trangThaiVanBan,$trangThaiLog){
        $item = VbVanban::findOne($id);
        if($trangThaiVanBan=="DA_BAN_HANH"){
            $item->ngayDuyet = date("Y-m-d H:i:s");
        }else{
            $item->ngayDuyet = null;
        }
        $item->trangThai=CommonUtil::VANBAN_TRANGTHAI[$trangThaiVanBan]['value'];   
        if($item->validate()){
            $item->save();
            $itemLog = new VbVanbanProcesslog();
            $itemLog->idVanBan = $item->idVanBan;
            $itemLog->idNguoiChuyen= Yii::$app->user->identity->id;
            $itemLog->ngayChuyen = date("Y-m-d H:i:s");
            $itemLog->noiDung = "";
            $itemLog->trangThai = CommonUtil::VANBAN_PL_TRANGTHAI[$trangThaiLog]['value'];
            $itemLog->save();                        
        }
    }
    
    public function actionBanhanhvanban() {
        $idType = trim(Yii::$app->request->post("idType"));
        try {
            $idSelected = Yii::$app->request->post("idSelected");
            if(is_array($idSelected)){
                foreach ($idSelected as $id){
                    self::capNhatTrangThaiVanBan($id,'DA_BAN_HANH','BAN_HANH'); 
                   // $this->sendNotificationApp($id);
                }
            }else{
                self::capNhatTrangThaiVanBan($idSelected,'DA_BAN_HANH','BAN_HANH');
                // $this->sendNotificationApp($idSelected);
            }
        } catch (\yii\base\Exception $e) {
            echo "alert('Ban hành văn bản không thành công');";
            exit;
        }
        //echo "alert('Ban hành văn bản thành công');";
        echo "window.location.href ='".Url::to(["/thongtin/vanban/index",'idType'=>$idType])."';";
        exit;
    }
    
    public function actionHuybanhanhvanban() {
        $idType = trim(Yii::$app->request->post("idType"));
        try {
            $idSelected = Yii::$app->request->post("idSelected");
            if(is_array($idSelected)){
                foreach ($idSelected as $id){
                    self::capNhatTrangThaiVanBan($id,'CHO_BAN_HANH','HUY_BAN_HANH');                    
                }
            }else{
                self::capNhatTrangThaiVanBan($idSelected,'CHO_BAN_HANH','HUY_BAN_HANH');                  
            }
        } catch (\yii\base\Exception $e) {
            echo "alert('Hủy ban hành văn bản không thành công');";
            exit;
        }
        //echo "alert('Hủy ban hành văn bản thành công');";
        echo "window.location.href ='".Url::to(["/thongtin/vanban/index",'idType'=>$idType])."';";
        exit;
    }
    
    public function actionUsehieuluc(){
        $id = (int)trim(Yii::$app->request->post("id"));
        $count = VbLoaivanban::findOne(['idLVB'=>$id,'useHieuLuc'=>1]);
        if(count($count)>0){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    
    public function actionGenfulltextsearchvanban(){        
        $count = \app\models\VbVanban::find()->count();
        return $this->render('genfulltextsearchvanban',[
            'count' => $count
        ]);
    }
    public function actionUpdatefulltextsearchvanban(){
        $offset = (int)Yii::$app->request->post("offset");        
        $item = \app\models\VbVanban::find()->offset($offset)->limit(1)->orderBy('idVanBan DESC')->one();
        $item->soKyHieuSo = (int)$item->soKyHieu;
        $item->nguoiKy = Convert::ConvertToUnicode($item->nguoiKy);
        $item->fulltextSearch =Convert::ConvertToUnicode(Common::replaceStringFullText($item->soKyHieu))
                            ." ".Common::stripUnicode(Convert::ConvertToUnicode(Common::replaceStringFullText($item->soKyHieu)))
                            ." ".Convert::ConvertToUnicode($item->trichYeu)
                            ." ".Common::stripUnicode(Convert::ConvertToUnicode($item->trichYeu));
        if($item->validate()){
            $item->save();
            echo "</br>Cập nhật văn bản: ".$item->idVanBan.": <font color='green'>Thành công!</font>";
        }else{
            echo "</br>Cập nhật văn bản: ".$item->idVanBan.": <font color='red'>Thất bại!</font>";
        }
        exit;
    }
    
    public function sendNotificationApp($id){
        $itemVanBan = \app\models\VbVanban::findOne($id);
        if((int)$itemVanBan->isHoaToc ==1){
           try{
                $listDevice = \app\models\AppControl::find()->all();
                foreach($listDevice as $itemDevice){
                    $itemDevice->badge_ios=0;
                    $itemDevice->badge_android=0;
                    $data['title'] = 'VBCĐĐH BÌNH THUẬN';
                    $data['message'] = $itemVanBan->loaiVanBan->name.' số '.$itemVanBan->soKyHieu.' của '.$itemVanBan->coQuan->tenDonVi;
                    $data['urlstamp'] = Yii::$app->params['host_hienthivanban'].Url::to(['/thongtin/vanban/detail','id'=>$itemVanBan->idVanBan]);
                    $data['type'] = 'FORM';
                    // push ANDROID
                    if (strtoupper($itemDevice['deviceType']) === 'ANDROID') {
                        // set badge
                        $data['badge'] = (int) $itemDevice['badge_android'] + 1;
                        // push notification
                        $this->pushToAndroid($itemDevice['deviceId'], $data);                                    
                        $itemDevice->badge_android=$data['badge'];
                        continue;
                    }
                    // push IOS
                    if (strtoupper($itemDevice['deviceType']) === 'IOS') {
                        // set badge
                        $data['badge'] = (int) $itemDevice['badge_ios'] + 1;
                        // push notification
                        $result = $this->pushToIOS($itemDevice['deviceId'], $data);
                        if (!$result) {
                            continue;
                        }
                        $itemDevice->badge_ios=$data['badge'];
                        continue;
                    }
                    $itemDevice->save();
                }
           }catch (Exception $e) {}
        }
    }
    
    public function pushToAndroid($deviceToken, $data) {
        try {
            // get config
            $config = Yii::$app->params['device']['android'];
            // init data
            $data['timestamp'] = date('Y-m-d H:i:s');
            $fields = [
                'to' => $deviceToken,
                'data' => $data,
            ];
            // Set POST variables
            $url = $config['url'];
            $authKey = $config['auth_key'];
            $headers = array(
                'Authorization: key=' . $authKey,
                'Content-Type: application/json'
            );
            // Open connection
            $ch = curl_init();
            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            // Execute post
            $result = curl_exec($ch);
            $result = json_decode($result);
            if ($result->failure === 1) {
                return false;
            }
            // Close connection
            curl_close($ch);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function pushToIOS($deviceToken, $data) {
        try {
            // get config
            $config = Yii::$app->params['device']['ios'];
            $passphrase = $config['passphrase'];
            $cert = $config['cert'];
            // open stream_socket
            $ctx = stream_context_create();
            stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
            stream_context_set_option($ctx, 'ssl', 'local_cert', $cert);
            stream_context_set_option($ctx, 'ssl', 'cafile', $cert);
            stream_context_set_option($ctx, 'ssl', 'verify_peer', false);
            stream_context_set_option($ctx, 'ssl', 'verify_peer_name', false);
            // call socket client
            // Sandbox using when: app was build to app store or plug device directly to machine
            //$fp = stream_socket_client( 'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
            // Using for diawe link
            $fp = stream_socket_client($config['url'], $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
            if (!$fp) {
                return false;
            }
            // init request data
            $body['aps'] = array(
                'alert' => $data['message'],
                'sound' => 'default',
                'url' => $data['urlstamp'],
                'badge' => $data['badge']
            );
            $payload = json_encode($body);
            $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
            fwrite($fp, $msg, strlen($msg));
            stream_set_blocking($fp, 0);
            // Close the connection to the server
            fclose($fp);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}