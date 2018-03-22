<?php

class Admin_BookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $books = new Admin_Model_BookMapper();
        $this->view->books = $books->fetchAll();
    }

    public function addAction()
    {
        $request = $this->getRequest();
        $form    = new Admin_Form_BookForm();
        $this->view->form = $form;
        $this->view->headTitle('Add new Book', 'PREPEND');

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $requestData = (object) $form->getValues();
                $book = new Admin_Model_Book();
                $book->setTitle($requestData->title);
                $book->setAuthor($requestData->author);

                $bookMapper = new Admin_Model_BookMapper();
                $bookMapper->save($book);
                return $this->_helper->redirector('index');
            }
        }
    }

    public function editAction()
    {
        // action body
    }

    public function deleteAction()
    {
        $bookMapper = new Admin_Model_BookMapper();
        $bookMapper->delete($this->getRequest()->book_id);

        $this->_helper->flashMessenger->setNamespace('success')->addMessage('Book deleted!');
        return $this->_helper->redirector('index');
    }
}







