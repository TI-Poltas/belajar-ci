<?php
class Penduduk_model extends CI_Model
{
    function get_penduduk()
    {
        $result = $this->db->get('penduduk');
        return $result;
    }

    function get_penduduk_nik($nik)
    {
        $query = $this->db->get_where('penduduk', array('nik' =>
        $nik));
        return $query;
    }

    public function create_data($data, $file)
    {
        $data = array_map('strtoupper', $data);
        $data['gol_darah'] = $data['gol_darah'] != 'UK' ? $data['gol_darah'] : '-';
        $data['foto'] = $this->_upload_file($data, $file);
        $this->db->insert('penduduk', $data);
        return $this->db->affected_rows();
    }

    public function delete_data($nik)
    {
        $foto = $this->get_penduduk_nik($nik);
        $this->db->where('nik', $nik);
        $this->db->delete('penduduk');
        return $this->db->affected_rows();
    }

    private function _upload_file($data, $file){
        $pas_foto = $file['pas_foto']['name'];
        if(!$pas_foto){
            return "assets/img/default.jpg";
        }else{
            $spltName = explode('.',$pas_foto);
            $ext = end($spltName);
            $config['upload_path']          = './assets/img';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10240; // 10MB
            $config['file_name']            = $data['nik'].'.'.$ext;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pas_foto')) {
                $file_name = $this->upload->data("file_name");
                return 'assets/img/'.$file_name;
            
            }else{
                echo $this->upload->display_errors('<p>', '</p>');
            }
        }
    }
}
