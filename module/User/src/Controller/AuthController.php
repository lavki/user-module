<?php

namespace User\Controller;

use User\Form\LoginForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {
        // Create Form
        $form = new LoginForm();

        // if Form was submited
        if( $this->getRequest()->isPost() )
        {
            // fill the Form with Post data
            $form->setData( $this->params()->fromPost() );

            if( $form->isValid() )
            {
                $data = $form->getData();

                // will check later...
            }
        }

        return new ViewModel([
            'form' => $form,
        ]);
    }

    public function logoutAction()
    {

    }
}
