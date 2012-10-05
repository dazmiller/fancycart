<?php
class ControllerCommonMaintenance extends Controller {
    public function index() {
        if ($this->config->get('config_maintenance')) {
			$route = '';
			
			if (isset($this->request->get['route'])) {
				$part = explode('/', $this->request->get['route']);
				
				if (isset($part[0])) {
					$route .= $part[0];
				}			
			}
			
			// Show site if logged in as admin
			$this->load->library('user');
			
			$this->user = new User($this->registry);
	
			if (($route != 'payment') && !$this->user->isLogged()) {
				return $this->forward('common/maintenance/info');
			}						
        }
    }
		
	public function info() {
        $this->load->language('common/maintenance');

                            if($this->config->get('config_maintenance_message')) {
								$v=html_entity_decode($this->config->get('config_maintenance_message'), ENT_QUOTES, 'UTF-8');
								$v = str_replace(array("\r", "\n"), '', $v);  
                                $this->data['maintenance_message'] =$v;
                            } else {
                                $this->data['maintenance_message'] = "";
                            }


							if($this->config->get('config_maintenance_dialog_width')) {  
                                $this->data['maintenance_dialog_width'] =$this->config->get('config_maintenance_dialog_width');
                            } else {
                                $this->data['maintenance_dialog_width'] = 500;
                            }

							if($this->config->get('config_maintenance_dialog_height')) {  
                                $this->data['maintenance_dialog_height'] =$this->config->get('config_maintenance_dialog_height');
                            } else {
                                $this->data['maintenance_dialog_height'] = 200;
                            }
							


							
                        
        
        $this->document->setTitle($this->language->get('heading_title'));
        
        $this->data['heading_title'] = $this->language->get('heading_title');
                
        $this->document->breadcrumbs = array();

        $this->document->breadcrumbs[] = array(
            'text'      => $this->language->get('text_maintenance'),
			'href'      => $this->url->link('common/maintenance'),
            'separator' => false
        ); 
        
        $this->data['message'] = $this->language->get('text_message');
      
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/maintenance.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/common/maintenance.tpl';
        } else {
            $this->template = 'default/template/common/maintenance.tpl';
        }
		
		$this->children = array(
'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
            'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'
		);
		
		$this->response->setOutput($this->render());
    }
}
?>