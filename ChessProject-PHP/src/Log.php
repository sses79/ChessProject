<?php

namespace LogicNow;

/**
 * Class to store and display a lot of information on the game
 */
class Log {


    private $messages;

    public function __construct() {
        $this->messages = array();
        $this->add('---------- Turn #1 ----------', 'game');
    }

    public function add($message, $type) {
        $this->messages[] = array(
            'content' => $message,
            'date'    => date('h:i:s'),
            'type'    => $type
        );
    }

    public function display($date = TRUE) {
        foreach ($this->messages as $message) {
            $string = PHP_EOL;
            if ($date) {
                $string .= '[' . $message['date'] . '] ';
            }
            $string .= '<' . $message['type'] . '> (' . $message['content'] . ')';
            echo $string;
        }
    }

    public function clear() {
        $this->messages = array();
    }
}