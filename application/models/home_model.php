<?php
class home_model extends CI_Model{

	public function get_unicorn_info()
	{
		 $quary = $this->db->get('unicorn');

            $all_info_array = [];
            if($quary->num_rows() == 0)
            {
                return array(
                    'all_info' => $all_info_array,
                    'count' => 0
                );
            }

            else
            {
                

                foreach ($quary->result() as $value) 
                {
                	
                  $this->db->where('id',$value->owner_id);
					$quary_user_info = $this->db->get('owner');
					$name = $quary_user_info->row(0)->name;


                    $single_ = array(
                            'unicorn_name' => $value->unicorn_name,
                            'unicorn_color'=>$value->unicorn_color,
                            'name' => $name
                        );
                    array_push($all_info_array,$single_);


                }
                return array(
                    'all_info' => $all_info_array,
                    'count' => $quary->num_rows()
                );
            }
	}


	public function get_owners()
	{
		$query = $this->db->get("owner"); 
        return $query->result(); 
	}


	public function add_unicorn($name,$color,$owner)
	{
			 $data = array(
        	'unicorn_name' => $name,
			'unicorn_color' => $color,
			'owner_id'=>$owner
		);

		$query=$this->db->insert('unicorn',$data);
          return true;
	}

}
?>