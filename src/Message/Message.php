<?php

namespace Tosj\Message;

class Message
{
    private $message = null;
    private $test;

    public function __construct($test = false)
    {
        $this->test = $test;

        // Save to object and free Sessions
        if (session_status() === PHP_SESSION_ACTIVE) {
            $this->message = (isset($_SESSION['message']) && $_SESSION['message']) ? $_SESSION['message'] : null;
            unset($_SESSION['message']);
        }
    }


    public function setMessage($thisMessage)
    {
        if ($this->test) {
            $this->message[] = $thisMessage;
        } else {
            // Save new messages to session
            $_SESSION['message'][] = $thisMessage;
        }
    }


    public function getMessage()
    {
        $html = null;
        // Print messages
        if ($this->message && $this->message !== '') {
            $html = '<div id="messagebox">';
            foreach ($this->message as $msg)
            {
                $html .= '
                <div class="message '.htmlentities($msg["type"]).'">
                    <p>'.htmlentities($msg["msg"]).'</p>
                </div>';
            }
            $html .= '</div>';
        }
        return $html;
    }
}
