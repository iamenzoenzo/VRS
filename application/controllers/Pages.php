<?php
class Pages extends CI_Controller {
  public function __construct()
  {
          parent::__construct();
          $this->load->helper('url_helper');
  }

  public function view($page = 'home')
  {

    if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
    {
            // Whoops, we don't have a page for that!
            show_404();
    }
    $data['title'] = ucfirst($page);
    $this->load->view('templates/header', $data);
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer', $data);
  }

  public function estimate($carId=0)
  {
    $data['title'] = 'Rent Estimate';
    $data['driverpay'] = $this->Setting_model->get_settings(null,'Driver_Per_Day');
    $data['SelectedCarId']=$carId;
    $data['cars'] = $this->Car_model->get_cars();
    $this->load->view('templates/header', $data);
    $this->load->view('pages/estimate',$data);
    $this->load->view('templates/footer', $data);
  }

  public function contact()
  {
    $data['title'] = 'Contact Us';
    $data['address'] = $this->Setting_model->get_settings(null,'address');
    $data['email'] = $this->Setting_model->get_settings(null,'Email Address');
    $data['phone'] = $this->Setting_model->get_settings(null,'telephone');
    $data['mobile'] = $this->Setting_model->get_settings(null,'mobile phone');
    $this->load->view('templates/header', $data);
    $this->load->view('pages/contact',$data);
    $this->load->view('templates/footer', $data);
  }

}
