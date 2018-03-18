<?php

namespace User\Form;

use Zend\Form\Form;

class AddForm extends Form
{
    public function __construct()
    {
        parent::__construct('add-form' );

        $this->setAttribute( 'method', 'POST' );
    }
}
