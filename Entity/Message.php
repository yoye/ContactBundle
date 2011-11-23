<?php

namespace Yoye\Bundle\ContactBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Message
{
    
    /**
     * @Assert\NotBlank()
     * 
     * @var string
     */
    public $name;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * 
     * @var string
     */
    public $email;
    
    /**
     * @Assert\NotBlank()
     * 
     * @var string
     */
    public $message;
}