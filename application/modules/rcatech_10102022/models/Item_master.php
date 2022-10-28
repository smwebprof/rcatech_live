<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'rcatech_item_master'; 
    } 

    public function addItem($data){
    if(empty($data))
      return FALSE;

    $result = array('item_name'=>$data['item_name'],'department_id'=>$data['department_id'],'nabcb_flag'=>$data['nabcb_flag'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>$data['is_active']);
    //print_r($result);exit;
    $this->db->insert('rcatech_item_master',$result);
    return $this->db->insert_id();

   }

   function getItemdata($id){ 

        //$querystring = "SELECT rim.*,rdm.name FROM rcatech_item_master rim left join rcatech_department_master rdm on rdm.id=rim.department_id where nabcb_flag = $id";
        $querystring = "SELECT rim.*,rdm.name FROM rcatech_item_master rim left join rcatech_department_master rdm on rdm.id=rim.department_id Where rim.is_active = 1 Order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getItemdataById($params){ 

        $querystring = "SELECT rim.*,rdm.name FROM rcatech_item_master rim left join rcatech_department_master rdm on rdm.id=rim.department_id Where rim.id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    public function updateItem($data){
    if(empty($data))
      return FALSE;

    $result = array('item_name'=>$data['item_name'],'department_id'=>$data['department_id'],'nabcb_flag'=>$data['nabcb_flag'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>$data['is_active']);
    //print_r($result);exit;
    $this->db->where('id', $data['id']);
    $this->db->limit(1);
    $this->db->update('rcatech_item_master',$result);
    return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }


   public function addItemSubType($data){
    if(empty($data))
      return FALSE;

    $result = array('subitem_name'=>$data['item_subtype_name'],'item_id'=>$data['item_id'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>$data['is_active']);
    //print_r($result);exit;
    $this->db->insert(' rcatech_item_subtype_master',$result);
    return $this->db->insert_id();

   }

   function getItemSubTypedata(){ 

        $querystring = "SELECT rism.*,rim.item_name FROM rcatech_item_subtype_master rism left join rcatech_item_master rim on rism.item_id=rim.id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    public function updateItemSubType($data){
    if(empty($data))
      return FALSE;

    $result = array('subitem_name'=>$data['subitem_name'],'item_id'=>$data['item_id'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>$data['is_active']);
    //print_r($result);exit;
    $this->db->where('id', $data['id']);
    $this->db->limit(1);
    $this->db->update('rcatech_item_subtype_master',$result);
    return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }


}
