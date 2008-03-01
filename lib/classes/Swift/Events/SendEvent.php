<?php

/*
 SendEvent class in Swift Mailer.
 
 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
 */

//@require 'Swift/Events/EventObject.php';

/**
 * Generated when a message is being sent.
 * @package Swift
 * @subpackage Events
 * @author Chris Corbyn
 */
class Swift_Events_SendEvent extends Swift_Events_EventObject
{
  
  /** Sending has yet to occur */
  const RESULT_PENDING = 0x0001;
  
  /** Sending was successful */
  const RESULT_SUCCESS = 0x0010;
  
  /** Sending worked, but there were some failures */
  const RESULT_TENTATIVE = 0x0100;
  
  /** Sending failed */
  const RESULT_FAILED = 0x1000;
  
  /**
   * The Message being sent.
   * @var Swift_Mime_Message
   */
  public $message;
  
  /**
   * The Transport used in sending.
   * @var Swift_Transport
   */
  public $transport;
  
  /**
   * Any recipients which failed after sending.
   * @var string[]
   */
  public $failedRecipients = array();
  
  /**
   * The overall result as a bitmask from the class constants.
   * @var int
   */
  public $result = self::RESULT_PENDING;
  
  /**
   * Get the Transport used to send the Message.
   * @return Swift_Transport
   */
  public function getTransport()
  {
    return $this->transport;
  }
  
  /**
   * Get the Message being sent.
   * @return Swift_Mime_Message
   */
  public function getMessage()
  {
    return $this->message;
  }
  
  /**
   * Get an recipient addresses which were not accepted for delivery.
   * @return string[]
   */
  public function getFailedRecipients()
  {
    return $this->failedRecipients;
  }
  
  /**
   * Get the result of this Event.
   * The return value is a bitmask from
   * {@link RESULT_PENDING, RESULT_SUCCESS, RESULT_TENTATIVE, RESULT_FAILED}
   * @return int
   */
  public function getResult()
  {
    return $this->result;
  }
  
  /**
   * Create a clean clone.
   */
  public function __clone()
  {
    parent::__clone();
    $this->message = null;
    $this->transport = null;
    $this->failedRecipients = array();
    $this->result = self::RESULT_PENDING;
  }
  
}