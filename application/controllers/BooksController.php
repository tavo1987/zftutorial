<?php

class BooksController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction()
    {
        $books = new Model_Books();
        $this->view->books = $books->fetchAll();
    }

    public function addAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_BooksForm();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $requestData = $form->getValues();
                var_dump($requestData);
                exit;
                //return $this->_helper->redirector('index');
            }
        }

    }
}





