<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
        ];
    }

    public static function getAllVenueOwners($limit, $offset)
    {
        $sql = "SELECT
                    usr.*, CONCAT(usr.firstname, ' ', usr.lastname) as fullname, vn.name as venuename, vn.location
                FROM 
                    user usr
                LEFT JOIN 
                    user_venues uvn ON usr.id = uvn.userId
                LEFT JOIN
                    venues vn ON uvn.venueId = vn.id
                WHERE
                    usr.role = 'venueowner'
                ORDER BY 
                    usr.created_date
                LIMIT :limit OFFSET :offset 
                ";

        $command = Yii::$app->db->createCommand($sql);
        $command->bindValues([':limit' => $limit, ':offset' => $offset]);

        $data = $command->queryAll();

        return $data;
    }

    public static function getTotalRecordsAllVenueOwners()
    {
        $sql = "SELECT
                    COUNT(*) as totalRecords
                FROM 
                    user usr
                WHERE
                    usr.role = 'venueowner'
                ";

        $command = Yii::$app->db->createCommand($sql);
       
        $data = $command->query()->read();

        return $data['totalRecords'];
    }

    public static function updateUserStatus($userId, $status)
    {
        $sql = "UPDATE 
                    user
                SET 
                    status = :status
                WHERE
                    id = :userId
                ";

        $command = Yii::$app->db->createCommand($sql);
        $command->bindValues([':status' => $status, ':userId' => $userId]);
       
        $data = $command->execute();

        return $data;
    }
}