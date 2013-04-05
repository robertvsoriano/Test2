<?php

class GuestbookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        
        //fetchRow --> regresa un elemento de la base de datos
        //fetchAll --> regresa todos los elementos de la base de datos
        
        //invocacion $x->parametro;
        
        $guestbook = new Application_Model_DbTable_Guestbook();
        //$x=$guestbook->fetchRow("id=2"); 
        $this->view->entries = $guestbook->fetchAll();
        
        
        //$x->comment="hello"; --->modifica solo en la aplicacion el elemento hasta guardarlo en la base de datos
        //$x->save(); --->guarda mi elemento
    }
    
    public function signAction()
    {
        $request = $this->getRequest();
        $form = new Application_Form_Guestbook();
        
        if($this->getRequest()->isPost())
        {
            if($form->isValid($request->getPost()))
            {
                $comment = new Application_Form_Guestbook($form->getValues());
                $mapper = new Application_Model_GuestbookMapper();
                $mapper->save($comment);
                return $this->helper->redirector('index');
            }
        }
        
        $this->view->form=$form;
    }


}

