<?php

class csession
{

    public function __construct()
    {
        session_start();
    }

    public function getSessionVar($var)
    {
        if (isset($_SESSION[$var])) {
            return $_SESSION[$var];
        }
    }
                                            // $som = new csession();
    public function setSessionVar($var)  // $som->setSessionVar(['aantal', 3 ]);
    {
        $_SESSION[$var[0]] = $var[1];    // $_SESSION['aantal'] = 3;
        return true;
    }

    public function emptySession()
    {
        session_unset();  // empty session.
    }

    public function destroySession()
    {
        session_destroy();  // destroy session.
    }
}