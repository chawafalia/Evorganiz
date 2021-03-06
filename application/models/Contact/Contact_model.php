<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model{


    protected $table ='Contact';

    public function __construct() {
       parent::__construct();
    } 


    public function getAllContacts($idUser) {
        
       $result = $this->db->select()
                       ->from($this->table)
                       ->where('idUser', $idUser)
                       ->get()
                       ->result();

       return $result;
    }


    public function getAllContactsNotInvited($guests, $idUser) {

       $result = $this->db->select()
                       ->from($this->table)
                       ->where('idUser', $idUser)
                       ->where_not_in('idContact', $guests)
                       ->get()
                       ->result();

       return $result;
    }


     public function insert($data){
        
        $this->db->set('lastnameContact', $data['lastnameContact'])
                 ->set('firstnameContact', $data['firstnameContact'])
                 ->set('telContact', $data['telContact'])
                 ->set('streetContact', $data['streetContact'])
                 ->set('zipCodeContact', $data['zipCodeContact'])
                 ->set('townContact', $data['townContact'])
                 ->set('idUser', $data['idUser'])
                 ->insert($this->table);
    }


    public function update($data){

        $this->db->where('idContact', $data['idContact'])
                 ->update($this->table, $data);
    }


    public function delete($id){
        
        $this->db->where('idContact', $id)
                  ->delete($this->table);
    }

}
?>
