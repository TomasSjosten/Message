#Message plugin by [Tomas Sjösten](http://tomassjosten.se)
-----------------------------

This is a simple Message plugin that will store message via Session and display it for a given interval.
Support for several message bubbles.

1. *Include*
  * message.js
  * message.css
  * Message.php
    * Include the file wherever you may want to start a message and also where you want to output message.

##Simple SET and GET
1. setMessage(_your message_)
  * accepts array only
  * ['type', 'msg']
    * Type either "ok" or "error"
    * Msg the wanted message to display

2. getMessage()
  *outputs the message


##Use with Anax-MVC
1. Js and Css files
  * message.js
    * put into webroot/js
    * include that JS-file in your Theme
  * message.css
    * put into webroot/css
    * include that CSS-file in your Theme

2. PHP file
  * Load Message.php in CDIFactory

####Create custom CDIFactory
´´´php
namespace ...;

use Anax\DI\CDIFactoryDefault;
use MyOwn\Message\Message;

class CDIFactory extends CDIFactoryDefault
{
    public function __construct()
    {
        parent::__construct();

        $this->set('message', function() {
            $message = new Message();
            return $message;
        });
    }
}
´´´

3. Index.php
  * furthest down, under "$app->theme->render();" add "$app->message->getMessage()"


*Drop me a mail tomas.sjosten@gmail.com if you want to give me some feedback.*