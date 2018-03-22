<?php

class Library_BooksController extends Zend_Controller_Action
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
        $books = new Library_Model_Books();
        $this->view->books = $books->fetchAll();
    }
}





