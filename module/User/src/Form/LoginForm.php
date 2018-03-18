<?php

namespace User\Form;

use Zend\Filter\HtmlEntities;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Form\Element\Button;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Csrf;
use Zend\Form\Element\Email;
use Zend\Form\Element\Password;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Validator\EmailAddress;
use Zend\Validator\Hostname;
use Zend\Validator\InArray;
use Zend\Validator\StringLength;

class LoginForm extends Form
{
    public function __construct()
    {
        parent::__construct('login-form' );

        $this->setAttribute( 'method', 'POST' );

        $this->addElements();

        $this->addInputFilter();
    }

    private function addElements()
    {
        $this->add([
            'type'       => Email::class,
            'name'       => 'email-address',
            'attributes' => [
                'id'          => 'email',
                'placeholder' => 'email@example.com',
            ],
            'options'   => [
                'label' => 'Email Address:',
            ],
        ]);

        $this->add([
            'type' => Password::class,
            'name' => 'password',
            'attribute' => [
                'id'          => 'password',
                'placeholder' => '*******',
            ],
            'options'   => [
                'label' => 'Password:'
            ],
        ]);

        $this->add([
            'type' => Checkbox::class,
            'name' => 'remember-me',
            'attributes' => [
                'id' => 'remember-me',
            ],
            'options'    => [
                'label' => 'Remember Me:',
            ],
        ]);

        $this->add([
            'type' => Csrf::class,
            'name' => 'scrf',
            'options' => [
                'csrf_options' => [
                    'timeout' => 600,
                ],
            ],
        ]);

        $this->add([
            'type' => Button::class,
            'name' => 'Login',
            'attributes' => [
                'type'  => 'submit',
                'value' => 'Login',
                'class' => 'btn btn-primary btn-sm',
            ],
        ]);
    }

    private function addInputFilter()
    {
        $filter = new InputFilter();

        $this->setInputFilter($filter);

        $filter->add([
            'name'       => 'email-address',
            'required'   => true,
            'filters'    => [
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => EmailAddress::class,
                    'options' => [
                        'allow'      => Hostname::ALLOW_DNS,
                        'useMxCheck' => false,
                    ],
                ],
            ],
        ]);

        $filter->add([
            'name'       => 'password',
            'required'   => true,
            'filters'    => [
                ['name' => StringTrim::class],
                ['name' => StripTags::class],
                ['name' => HtmlEntities::class],

            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'min' => 5,
                        'max' => 30,
                    ],
                ],
            ],
        ]);

        $filter->add([
            'name'       => 'remember-me',
            'required'   => false,
            'filters'    => [],
            'validators' => [
                [
                    'name' => InArray::class,
                    'options' => [
                        'haystack' => [0, 1],
                    ],
                ],
            ],
        ]);
    }
}
