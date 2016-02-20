<?php

namespace tomas\Message;

class Message
{
    private $message = [];

    public function __construct()
    {
        // Save to object and free Session
        $this->message = (isset($_SESSION['message']) && $_SESSION['message'] != '') ? $_SESSION['message'] : null;
        unset($_SESSION['message']);
    }


    public function setMessage($thisMessage)
    {
        // Save new messages to session
        $_SESSION['message'][] = $thisMessage;
    }


    public function getMessage()
    {
        // Print messages
        if ($this->message) {
            $html = '<div id="messagebox">';
            foreach ($this->message as $msg)
            {
                $html .= '
                <div class="message '.htmlentities($msg["type"]).'">
                    <p>'.htmlentities($msg["msg"]).'</p>
                </div>';
            }
            $html .= '</div>';

            echo $html;
        }
    }
}