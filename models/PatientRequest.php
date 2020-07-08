<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient_request".
 *
 * @property int $Request_Id
 * @property int $Patient_Id
 * @property string $RequestTime
 * @property int $Request_Status
 * @property string $Request_Type
 * @property float $Estimated_score
 * @property int $Estimated_Level
 *
 * @property HospitalSession[] $hospitalSessions
 * @property RegisteredPatientAccount $patient
 * @property PatientScreening[] $patientScreenings
 * @property PatientSensorsData[] $patientSensorsDatas
 * @property RequestRespond[] $requestResponds
 */
class PatientRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kacst.patient_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Request_Id','Patient_Id', 'RequestTime', 'Request_Status', 'Request_Type', 'Estimated_score', 'Estimated_Level'], 'required'],
            [['Patient_Id', 'Request_Status', 'Estimated_Level'], 'integer'],
            [['RequestTime'], 'safe'],
            [['Request_Type'], 'string'],
            [['Estimated_score'], 'number'],
            [['Request_Id'],'unique'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Request_Id' => 'Request ID',
            'Patient_Id' => 'Patient ID',
            'RequestTime' => 'Request Time',
            'Request_Status' => 'Request Status',
            'Request_Type' => 'Request Type',
            //'Estimated_score' => 'Estimated Score',
            //'Estimated_Level' => 'Estimated Level',
        ];
    }

    /**
     * Gets query for [[HospitalSessions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalSessions()
    {
        return $this->hasMany(HospitalSession::className(), ['Request_Id' => 'Request_Id']);
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(RegisteredPatientAccount::className(), ['Patient_Id' => 'Patient_Id']);
    }

    /**
     * Gets query for [[PatientScreenings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientScreenings()
    {
        return $this->hasMany(PatientScreening::className(), ['Request_Id' => 'Request_Id']);
    }

    /**
     * Gets query for [[PatientSensorsDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientSensorsDatas()
    {
        return $this->hasMany(PatientSensorsData::className(), ['Request_Id' => 'Request_Id']);
    }

    /**
     * Gets query for [[RequestResponds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestResponds()
    {
        return $this->hasMany(RequestRespond::className(), ['Request_ID' => 'Request_Id']);
    }
}
