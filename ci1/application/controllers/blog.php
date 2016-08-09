<?php  defined('BASEPATH') OR exit('No direct script access allowed');
		class Blog extends  CI_Controller{
			public function __construct(){
				parent::__construct();
				$this->load->model('blog_model');
				
			}
			public function index(){
				
				$rs=$this->blog_model->get_article();
				
				$arr['blog']=$rs;
				
				$this->load->view('index.php',$arr);
			}
			public function update(){
				$id=$this->uri->segment(3);
				// var_dump($id);
				// die();
				$result=$this->blog_model->update_attr($id); 
				$arr['up']=$result;
				$this->load->view('update.php',$arr);
				
			}
			public function do_update(){
				// var_dump(123424);
				// die();
				$title=$this->input->post('title');
				$con=$this->input->post('con');
				$hid=$this->input->post('hid');
				
				$this->load->model('blog_model');
				$result=$this->blog_model->update_id($hid,$title,$con);
				if($result){
					// var_dump($result);
					// die();
					redirect('blog/index');
				}
				
			}
			public function del(){
				//$id=$this->input->get('id');
				//echo $id;
				$id=$this->uri->segment(3);
				$this->load->model('blog_model');
				$result=$this->blog_model->del_attr($id); 	
				if(result){
					//redirect('blog/ndex');
					$this->index();
				}else{
					echo '删除失败';
				}
			}
			public function add(){
				//echo '123';
				$this->load->view('add_blog.php');
				// $sql="select * from blog where 1 order by blogid desc";

			}
			public function add_b(){
				$time=date('Y').'-'.date('m').'-'.date('d');
				$title=$this->input->post('title');
				$con=$this->input->post('con');
				
				$result=$this->blog_model->insert($title,$con,$time);
				if($result){
					redirect('blog/index');
				}else{
					echo '<script>alert("添加失败")</script>';
				}
			}
			
		}
	

?>