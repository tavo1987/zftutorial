<?php

class Admin_Form_BookForm extends Zend_Form
{
    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement('text', 'title', array(
            'class' => 'p-3 rounded mb-4 block',
            'label'      => 'Book Title',
            'required'   => true,
            'filters'    => array('StringTrim'),
        ));

        // Add the comment element
        $this->addElement('text', 'author', array(
            'class' => 'px-6 py-3 rounded block',
            'label'      => 'Book Author:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
            )
        ));


        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'class' => 'p-3 rounded bg-indigo text-white',
            'label'    => 'Save Book',
        ));

        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }

}

