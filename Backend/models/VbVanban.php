<?php

namespace app\models;

use Yii;
use app\models\VbLoaivanban;
use app\models\DanhmucCoquan;
use app\models\VbLinhvucvanban;
use app\models\QlFiledinhkem;
use app\models\User;

/**
 * This is the model class for table "vb_vanban".
 *
 * @property integer $idVanBan
 * @property string $soKyHieu
 * @property string $trichYeu
 * @property integer $idLVB
 * @property integer $idLVVB
 * @property string $ngayBanHanh
 * @property integer $idCoQuan
 * @property string $nguoiKy
 * @property integer $isHoaToc
 * @property integer $trangThai
 * @property integer $isHetHieuLuc
 * @property string $fulltextSearch
 * @property integer $soKyHieuSo 
 */
class VbVanban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vb_vanban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['soKyHieu','soKyHieuSo', 'trichYeu', 'idLVB', 'ngayBanHanh', 'idCoQuan'], 'required'],
            [['soKyHieu'],'checkvanbantontai'],
            [['soKyHieu', 'trichYeu','nguoiKy','fulltextSearch'], 'string'],
            [['soKyHieuSo','idLVB', 'idLVVB', 'idCoQuan', 'isHoaToc','isHetHieuLuc', 'trangThai','idNguoiTiepNhan','isDeleted'], 'integer'],
            [['ngayBanHanh','ngayTiepNhan','ngayDuyet','ngayHieuLuc','ngayCapNhat'], 'safe'],
            [['idLVB'], 'in',
                'range' => VbLoaivanban::find()->select(['idLVB'])->column(),
                'message' => 'Loại văn bản không tồn tại.'],
            [['idCoQuan'], 'in',
                'range' => DanhmucCoquan::find()->select(['id'])->column(),
                'message' => 'Cơ quan không tồn tại.'],
        ];
    }
    //Check đặc biệt cho loại văn bản khác không có điều kiện hoặc
    public function checkvanbantontai(){
        $arrayWhere = [
            'isDeleted'=>0,
            'soKyHieu'=>$this->soKyHieu,
            'idLVB'=>$this->idLVB,
            'ngayBanHanh'=>$this->ngayBanHanh,
            'idCoQuan'=>$this->idCoQuan,
            'nguoiKy'=>$this->nguoiKy,
        ];
        $arr = explode("/", $this->soKyHieu);
        $arrayOrWhereCondition = [
            'isDeleted'=>0,
            'soKyHieuSo'=>(int)$this->soKyHieuSo,
            'YEAR(ngayBanHanh)' => (string)date('Y', strtotime($this->ngayBanHanh)),
            'idLVB'=>$this->idLVB,
            'idCoQuan'=>$this->idCoQuan,
            "substring(soKyHieu, 0, CHARINDEX('/',soKyHieu))"=>$arr[0]
        ];
        $loai = VbLoaivanban::findOne(['idLVB'=>$this->idLVB]); 
        if (!$this->isNewRecord) {
            $items = \app\models\VbVanban::find()
                    ->where($arrayWhere);
            if($loai->noCheckTheoNam != 1){
                $items->orWhere($arrayOrWhereCondition);
            }
            $dataitems=$items->andWhere('idVanBan <> '.$this->idVanBan)->all();
        } else {
            $items = \app\models\VbVanban::find()
                    ->where($arrayWhere);
            if($loai->noCheckTheoNam != 1){
                $items->orWhere($arrayOrWhereCondition);
            }
            $dataitems=$items->all();
        }
        if (count($dataitems) >0) {
            $this->addError('soKyHieu', 'Văn bản đã tồn tại.');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idVanBan' => 'Id Van Ban',
            'soKyHieu' => 'So Ky Hieu',
            'soKyHieuSo'=>'So Ky Hieu So',
            'trichYeu' => 'Trich Yeu',
            'idLVB' => 'Id Lvb',
            'idLVVB' => 'Id Lvvb',
            'ngayBanHanh' => 'Ngay Ban Hanh',
            'idCoQuan' => 'Id Co Quan',
            'nguoiKy' => 'Nguoi Ky',
            'isHoaToc' => 'Is Hoa Toc',
            'trangThai' => 'Trang Thai',
            'isHetHieuLuc' => 'Is Het Hieu Luc',
            'idNguoiTiepNhan'=>'Id Nguoi Tiep Nhan',
            'ngayTiepNhan'=>'Ngay Tiep Nhan',
            'ngayDuyet'=>'Ngay Duyet',
            'ngayHieuLuc'=>'Ngay Hieu Luc',
            'ngayCapNhat'=>'Ngay Cap Nhat',
            'isDeleted'=>'Is Deleted',            
            'fulltextSearch'=>'fulltext Search'
        ];
    }
    
    public function getLoaiVanBan(){
        return $this->hasOne(VbLoaivanban::className(), ['idLVB' => 'idLVB']);
    }    
    public function getCoQuan(){
        return $this->hasOne(DanhmucCoquan::className(), ['id' => 'idCoQuan']);
    }
    public function getLinhVucVanBan(){
        return $this->hasOne(VbLinhvucvanban::className(), ['idLV' => 'idLVVB']);
    }    
    public function getFileDinhKem(){
        return $this->hasMany(QlFiledinhkem::className(), ['idObject' => 'idVanBan'])->andOnCondition(['type'=> \app\components\CommonUtil::FILE_VANBAN]);
    }
    public function getNguoiTiepNhan(){
        return $this->hasOne(User::className(), ['id' => 'idNguoiTiepNhan']);
    }
}
