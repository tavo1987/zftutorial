<?php

class Admin_Model_BookMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Admin_Model_DbTable_Book');
        }
        return $this->_dbTable;
    }

    public function save(Admin_Model_Book $book)
    {
        $data = array(
            'title'   => $book->getTitle(),
            'author' => $book->getAuthor(),
            'created' => date('Y-m-d H:i:s'),
        );

        if (null === ($id = $book->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Admin_Model_Book $book)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $book->setId($row->id)
            ->setTitle($row->title)
            ->setAuthor($row->author)
            ->setCreated($row->created);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $book = new Admin_Model_Book();
            $book->setId($row->id)
                ->setTitle($row->title)
                ->setAuthor($row->author)
                ->setCreated($row->created);
            $entries[] = $book;
        }
        return $entries;
    }
}

