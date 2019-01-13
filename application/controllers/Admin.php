<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/14/17
 * Time: 4:29 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function add_rehabber()
    {
        if ($this->input->is_ajax_request()) {
            $data['states'] = $this->db->get('states');
            $this->load->view('admin_add_rehabber', $data);
        } else {
            show_404();
        }
    }

    public function addRehabber()
    {
        if ($this->input->is_ajax_request()) {
            $date = date("Y-m-d H:i:s");

            //$firstName = $this->input->post('first');
            //$lastName = $this->input->post('last');
            //echo "NAME: " . $firstName . "Last " . $lastName;

            $formData = array(
                'rehabber_first_name' => ucwords(strtolower($this->input->post('first'))),
                'rehabber_last_name' => ucwords(strtolower($this->input->post('last'))),
                'rehabber_street' => $this->input->post('street'),
                'rehabber_city' => ucwords(strtolower($this->input->post('city'))),
                'rehabber_state' => $this->input->post('state'),
                'rehabber_zip' => $this->input->post('zip'),
                'rehabber_phone' => preg_replace('/\D+/', '', $this->input->post('phone')),
                'rehabber_email' => strtolower($this->input->post('email')),
                'rehabber_license' => $this->input->post('isLicensed'),
                'rehabber_volunteer' => $this->input->post('isVolunteer'),
                'rehabber_active' => $this->input->post('isActive'),
                'rehabber_county' => $this->input->post('county'),
                'rehabber_notes' => $this->input->post('notes'),
                'rehabber_affiliate' => $this->input->post('affiliate'),
                'created_date' => $date
            );
            $where = array('rehabber_first_name' => $formData['rehabber_first_name'], 'rehabber_last_name' => $formData['rehabber_last_name']);
            $query = $this->db->get_where('rehabber', $where);
            if ($query->num_rows() == 0) {
                $this->db->insert('rehabber', $formData);
                $num_inserts = $this->db->affected_rows();
                if ($num_inserts > 0) {
                    $result = "success";
                } else {
                    $result = "failure";
                }
            } else {
                $result = "duplicate";
            }
            echo json_encode($result);
        } else {
            show_404();
        }
    }

    public function getCounty()
    {
        if ($this->input->is_ajax_request()) {
            $state = $this->input->post('stateID');
            $stateQuery = $this->db->get_where('states', array('state_id' => $state));
            $stateResult = $stateQuery->row();

            $query = $this->db->get_where('counties', array('county_state' => $stateResult->state_id));
            $result = $query->result_array();
            echo json_encode(array('result' => $result));
        } else {
            show_404();
        }
    }

    public function updateUser()
    {
        if ($this->input->is_ajax_request()) {
            $data['users'] = $this->ion_auth->users()->result();
            $groups = $this->db->get('groups');
            $data['groups'] = $groups->result_array();
            $this->load->view('admin/admin_update_user', $data);
        } else {
            show_404();
        }
    }
    public function manageUsers()
    {
        if ($this->input->is_ajax_request()) {
            //$data['users'] = $this->ion_auth->users()->result();
            $select = "id,CONCAT(first_name,' ',last_name) as name";
            $data['users'] = $this->Users->get($select);
            $this->load->view('admin/user_manager', $data);
        } else {
            show_404();
        }
    }

    public function userDetail()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $select = "id,username,password,email,created_on,last_login,active,first_name,last_name,phone";
            $result = $this->Users->get($select, array('id' => $id));
        }
        else {
            show_404();
        }
        echo json_encode($result->result_array());
    }
}
?>