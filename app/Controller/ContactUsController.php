<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ContactUsController extends AppController{

	var $name = 'ContactUs';
	var $uses = array('Cmspage','ContactUs');
	var $helpers = array('Html', 'Form', 'Captcha');
	public $components = array('Captcha'=>array('field'=>'security_code', 'mlabel' => '<p>Respuesta simple matemática</p>'));//'Captcha'

	public function beforeFilter() {
		$this->Auth->allow();
	}

	function captcha()	{
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha'); //load it
        }
        $this->Captcha->create();
    }


	public function index() {

		if (!empty($this->request->data)) {
			$this->ContactUs->setCaptcha('security_code', $this->Captcha->getCode('ContactUs.security_code')); //getting from component and passing to model to make proper validation check
            $this->ContactUs->set($this->request->data);
            if($this->ContactUs->validates())	{
                $Email = new CakeEmail();
				$Email->template('contact_us_admin', 'default')
				    ->emailFormat('html')
				    ->to('info@icargobox.com')
				    ->subject('LMS.com - Contact Us')
				    ->viewVars(
					    	array(
								'fname'   => $this->request->data['ContactUs']['fname'],
								'lname'   => $this->request->data['ContactUs']['lname'],
								'email'   => $this->request->data['ContactUs']['email'],
								'phone'   => $this->request->data['ContactUs']['phone'],
								'enquiry' => $this->request->data['ContactUs']['enquiry']
					    	)
				    	)
				    ->from('sender@icargobox.com')
				    ->helpers(array('Html', 'Text'))
				    ->send();
                $this->Session->setFlash('Thank you for contacting us. We will be back to you soon.', 'frontend_success');
                return $this->redirect(array('action' => 'index'));
            }	else	{ //or
                $this->Session->setFlash('Data Validation Failure', 'frontend_error');
                //pr($this->ContactUs->validationErrors);
                //something do something else
            }
		}

		$contact_us = $this->Cmspage->findByIdAndStatus( 6, 1 );
		if (!$contact_us) {
	        throw new NotFoundException("The page, you are looking for is not available at this moment.");
	    }
		$this->set(compact('contact_us'));
		$this->set('title_for_layout', $contact_us['Cmspage']['meta_title'] );
		$this->set('meta_key', $contact_us['Cmspage']['meta_keyword'] );
		$this->set('meta_desc', $contact_us['Cmspage']['meta_desc'] );

	}
}