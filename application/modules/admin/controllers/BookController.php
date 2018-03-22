<?php

class Admin_BookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        $request = $this->getRequest();
        $form    = new Admin_Form_BookForm();
        $this->view->form = $form;
        $this->view->headTitle('Add new Book', 'PREPEND');

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $requestData = $form->getValues();
                var_dump($requestData);
                exit;
                //return $this->_helper->redirector('index');
            }
        }
    }

    public function editAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }


}







