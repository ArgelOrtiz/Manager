<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Private_Controller {
	
	public function index()
	{
		$this->load_view('profile/profile');
	}
	public function webpage($slug)
	{
		$sections = [];
		
		//cargar el webpage referidop
		$this->load->model('admin/webpage');
		$webpage = $this->webpage->get_all('',"slug = '$slug' and kind = 2");
		
		if(!empty($webpage))
		{
			//cargar la sección referida en el webpage
			$webpage_id = $webpage[0]['id'];
			$this->load->model('admin/page_section');
			$sections =  $this->page_section->get_all('',"webpage_id = '$webpage_id'");
		}
		//cargar los page_items de esa seccion
		$this->load->model('admin/page_item');		
		foreach($sections as &$section)
		{
			$page_section_id = $section['id'];
			$section['page_items'] = $this->page_item->get_all('',"page_section_id = $page_section_id");
// 			$section['page_items'] = [];
		}
		$data ['sections'] = $sections;
		$this->load_view('webpage',$data);
	}


}
