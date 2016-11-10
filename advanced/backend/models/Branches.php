<?php

namespace backend\models;

use Yii;
use \himiklab\yii2\recaptcha\RecaptchaVali;
/**
 * This is the model class for table "branches".
 *
 * @property integer $branch_id
 * @property string $branch_name
 * @property string $branch_address
 * @property string $branch_created_date
 * @property string $branch_status
 * @property integer $companies_company_id
 *
 * @property Companies $companiesCompany
 * @property Departments[] $departments
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $reCapthca;
    
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_name', /*'branch_address',*/ 'branch_created_date', /*'branch_status',*/ 'companies_company_id'], 'required'],
            [['companies_company_id'], 'integer'],
            [['branch_created_date'], 'safe'],
            [['branch_status'], 'string'],
            [['branch_name'], 'unique'],                        
            [['branch_status'], 'required','when' => function($model){
                return(!empty($model->branch_address)) ? true : false;
            }, 'whenClient' => "function(){"
                    . "if($('#branch_address').val() == undefined){"
                    .       "false;"
                    .       "alert('Agrega branch status ');"
                    . "} else{"
                    .       "true;"                    
                    . "}"
                . "}"
            ],
            [['branch_name'], 'string', 'max' => 100],                            
            [['branch_address'], 'string', 'max' => 255],
            [['companies_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['companies_company_id' => 'companies_id']],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'branch_name' => 'Branch Name',
            'branch_address' => 'Branch Address',
            'branch_created_date' => 'Branch Created Date',
            'branch_status' => 'Branch Status',
            'companies_company_id' => 'Companies Company ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCompany()
    {
        return $this->hasOne(Companies::className(), ['companies_id' => 'companies_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['branches_branch_id' => 'branch_id']);
    }
}
