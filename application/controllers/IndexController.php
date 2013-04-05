<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        // 
        //instancia de la tabla
        $Guestbook = new Application_Model_DbTable_Guestbook();
        
        $rows = $Guestbook->fetchAll();
        echo "<pre>";
          print_r($rows->toArray()); //print_ da la informacion a $rows || toarray muestra en arreglo
        echo "</pre>";
    }

    public function guestbookAction()
    {
        // action body
    }


}



