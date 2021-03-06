#Message plugin by [Tomas Sjösten](http://tomassjosten.se)
-----------------------------
[![Build Status](https://travis-ci.org/TomasSjosten/Message.svg?branch=master)](https://travis-ci.org/TomasSjosten/Message)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/TomasSjosten/Message/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/TomasSjosten/Message/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/TomasSjosten/Message/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/TomasSjosten/Message/?branch=master)

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
  * Change Namespace in Message.php file
  * Load Message.php in CDIFactory
  * Create custom CDIFactory
```php
<?php

namespace -Your namespace-

use Anax\DI\CDIFactoryDefault;
use tomas\Message\Message;

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
?>
```

3. Change file "config_with_app.php"
  * Change to CDIFactory instead of default
  * Add $app->session();

4. index.php (or choosen router)
  * furthest down, under "$app->theme->render();" add "$app->message->getMessage()"


*Drop me a mail tomas.sjosten@gmail.com if you want to give me some feedback.*