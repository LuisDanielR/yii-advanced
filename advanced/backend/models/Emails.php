<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property integer $id_emails
 * @property string $receiver_name
 * @property string $receiver_email
 * @property string $content
 * @property string $attachment
 * @property string $subject
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receiver_name', 'receiver_email'], 'required'],
            [['content'], 'string'],
            [['receiver_name'], 'string', 'max' => 50],
            [['receiver_email'], 'string', 'max' => 200],
            [['attachment', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_emails' => 'Id Emails',
            'receiver_name' => 'Receiver Name',
            'receiver_email' => 'Receiver Email',
            'content' => 'Content',
            'attachment' => 'Attachment',
            'subject' => 'Subject',
        ];
    }
}
