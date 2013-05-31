<?php
/**
 * User: Kir Melnikov
 * Date: 31.05.13
 * Time: 12:11
 */

class CeoLetterForm extends CFormModel {
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $body;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            // name, email, subject and body are required
            array('name, email, subject, phone, body', 'required', 'message'=>'Поле обязательно для заполнения'),
            // email has to be a valid email address
            array('email', 'email', 'message'=>'Вы ввели некорректный E-mail'),
            // verifyCode needs to be entered correctly
            //array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'name'=>'Как вас зовут?',
            'email'=>'Ваша почта',
            'phone'=>'Ваш телефон',
            'subject'=>'По какому вы вопросу?',
            'body'=>'Ваше сообщение:'
        );
    }

    public static function getSubjects() {
        return array('Жалоба', 'Благодарность', 'Предложение');
    }

    public function send() {
        $content = Yii::app()->getController()->widget('zii.widgets.CDetailView', array(
            'data'=>$this,
            'attributes'=>array(
                'name',             // title attribute (in plain text)
                'email',        // an attribute of the related object "owner"
                'phone',  // description attribute in HTML
                array(
                    'label'=>'Тема обращения',
                    'type'=>'raw',
                    'value'=>$this->getSubjectValue($this->subject)
                ),  // description attribute in HTML
                'body',  // description attribute in HTML
            ),
        ), true);
        $to = Yii::app()->getParams()->itemAt('adminEmail');
        $subject = 'Письмо Генеральному Директору';

        return mail($to, $subject, $content,'Content-type: text/html; charset=utf-8');
    }

    public function getSubjectValue($subject) {
        $subjects = $this::getSubjects();
        return $subjects[$subject];
    }
}