 <?php defined('BASEPATH') OR exit('No direct script access allowed');
 		class User_model extends CI_Model{
 			public function insert($name,$pass){
 				//$sql="insert into user(userid,name,pass) values(null,'$name','$pass')";
				//$query=$this->db->query($sql);
				//用qb方法写sql
				$data=array('name'=>$name,'pass'=>$pass,);
				$query=$this->db->insert('user',$data);
				
				return $query;
 			}
			public function get_name_by_pass($name,$pass){
				//$sql="select * from user where name='$name' and pass='$pass'";
				$data=array('name'=>$name,'pass'=>$pass,);
				$query=$this->db->get_where('user',$data);
				return $query->row(); 	
				
			}
			
 		}
 
 
 ?> 