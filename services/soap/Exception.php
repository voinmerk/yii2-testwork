<?php
namespace app\services\soap;

/**
 * Class Exception
 */
class Exception extends \yii\base\Exception
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'SOAP Client Exception';
    }
}