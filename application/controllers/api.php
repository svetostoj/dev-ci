<?php
class Api extends CI_Controller {

    public function create_todo() {
        // $this->_require_login();

        // $this->form_validation->set_rules('content', 'Content', 'required|max_length[255]');
        // if ($this->form_validation->run() == false) {
        //     $this->output->set_output(json_encode([
        //         'result' => 0,
        //         'error' => $this->form_validation->error_array()
        //     ]));
        //     return false;
        // }

        $result = $this->db->insert('todo', [
            'content' => $this->input->post('content'),
            'user_id' => $this->session->userdata('user_id')
        ]);

        if ($result) {
            $this->output->set_output(json_encode([
                'result' => 1
            ]));

            return false;
        }
        $this->output->set_output(json_encode([
            'result' => 0,
            'error' => 'Could not insert  record'
        ]));
    }

}