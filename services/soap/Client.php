<?php
namespace app\services\soap;

use SoapClient;
use SoapFault;
use SoapHeader;

use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Soap client yii2
 */
class Client extends Component
{
    public $url;
    public $login;
    public $password;
    public $options = [];

    private $_client;
    private $_guid;
    private $_header;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->url === null) {
            throw new InvalidConfigException('The "url" property must be set.');
        }

        if ($this->login === null) {
            throw new InvalidConfigException('The "login" property must be set.');
        }

        if ($this->password === null) {
            throw new InvalidConfigException('The "password" property must be set.');
        }

        try {
            // Создание SOAP-клиента по WSDL-документу
            $this->_client = new SoapClient($this->url, $this->options);

            // получаем идентификатор сессии
            $this->_guid = $this->_client->Login($this->login, $this->password);
            
            // создаем хэдер
            $this->_header = new SoapHeader('NAMESPACE', 'authenticate', $this->_guid);

            $this->_client->__setSoapHeaders($this->_header);
        } catch (SoapFault $e) {
            throw new Exception($e->getMessage(), (int) $e->getCode(), $e);
        }
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws Exception
     */
    public function __call($name, $arguments)
    {
        try {
            return call_user_func_array([$this->_client, $name], $arguments);
        } catch (SoapFault $e) {
            throw new Exception($e->getMessage(), (int) $e->getCode(), $e);
        }
    }
}