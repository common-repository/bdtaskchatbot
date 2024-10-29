<?php
 /**
   *@param  bdtaskchatbot_department 
   *@since  1.0.0
   */  
class BDTASKCHATBOT_Departments{

   /**
   *@var protected. 
   *@since 1.0.0
   */ 
   protected static $department;
 
  /**
   *@param  bdtaskcrm_process_department_data($department)/// To Add department. 
   *@since  1.2.0
   *@return $department (array) .
   */  
   public static function  bdtaskchatbot_process_department_data($department = null ){
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_department_name_sanitize() ;
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_department_table(  self::$department );
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_add_department(  self::$department );  
      return self::$department;
   }



  /**
   *@param  bdtaskchatbot_process_department_update_data($department)/// To Update department. 
   *@since  1.2.0
   *@return $department (array) .
   */  

   public static function  bdtaskchatbot_process_department_update_data($department = null ){
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_department_id_sanitize() ;
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_department_name_sanitize( self::$department ) ;
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_department_table(  self::$department );
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_update_department(  self::$department );  
      return self::$department;
   }


  /**
   *@param  bdtaskchatbot_process_department_delete_data($department)/// To Delete department. 
   *@since  1.2.0
   *@return $department (array).
   */  

   public static function  bdtaskchatbot_process_department_delete_data($department = null ){
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_department_id_sanitize() ;
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_department_table(  self::$department );
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_delete_department(  self::$department );  
      return self::$department;
   }


   /**
   *@param  bdtaskchatbot_process_department_select_data($department)/// To Select department. 
   *@since  1.2.0
   *@return $department (array) .
   */  

   public static function  bdtaskchatbot_process_department_select_data($department = null ){
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_department_table(self::$department );
      self::$department = BDTASKCHATBOT_Departments::bdtaskchatbot_select_department(self::$department );  
      return self::$department;
   }

  

   /**
   *@param  bdtaskchatbot_department_id_sanitize($department). 
   *@since  1.2.0
   *@return department id .
   */  
   public static function  bdtaskchatbot_department_id_sanitize($department = null ){   
      $department['add']['department_id'] = intval( $_POST['department_id']  );
      return $department;
   }



  /**
   *@param  bdtaskchatbot_department_name_sanitize($department). 
   *@since  1.2.0
   *@return department name .
   */  
   public static function  bdtaskchatbot_department_name_sanitize($department = null ){ 

      $department['add']['department_name'] = sanitize_text_field($_POST['department_name']);
      return $department;


   }



  /**
   *@param  bdtaskchatbot_department_table($department). 
   *@since  1.2.0
   *@return table name .
   */  
   public static function  bdtaskchatbot_department_table($department){
      global $wpdb ; 

      $department['table'] = $wpdb->prefix .'bdtaskchatboard_department';
       
      return $department;     
   }



  /**
   *@param  bdtaskchatbot_add_department($department). 
   *@since  1.2.0
   *@return status .
   */  

   public static function  bdtaskchatbot_add_department($department){
       global $wpdb ;
       if(!empty($department['add']['department_name'])):
              $add_new_department = $wpdb->insert( 
                           $department['table'], 
                           array(                  
                            'department_id' => '',
                            'department_name'=> $department['add']['department_name'],            
                            'is_active'=>'1',      
                            'created_by'=>get_current_user_id(),      
                            'create_date'=> date("Y/m/d"),       

                          )
             );
      $department['action_status'] = ($add_new_department)? 'no_error_data_save_successfully' : 'something_is_error';
       endif;
      return  $department ; 
   }

   /**
   *@param  bdtaskchatbot_update_department($department). 
   *@since  1.2.0
   *@return status .
   */  
  public static function  bdtaskchatbot_update_department($department){
         global $wpdb ;   
        if(!empty($department['add']['department_name'])):         
         $update_department = $wpdb->update( 
                          $department['table'], 
                          array( 
                            'department_name'=> $department['add']['department_name'],            
                            'is_active'=>'1',      
                            'created_by'=>get_current_user_id(),      
                            'create_date'=> date("Y/m/d"),
                          ), 
                          array( 'department_id' => $department['add']['department_id'] ) ,  // where clause(s)
                          array( '%s') , // column & new value type.
                          array( '%d' ) // where clause(s) format types  
                        ); 

        $department['action_status'] = ($update_department)? 'no_error_data_update_successfully' : 'something_is_error';
        endif;
        return  $department ; 

   }


 
   /**
   *@param  bdtaskchatbot_delete_department($department). 
   *@since  1.2.0
   *@return status.
   */  
  public static function  bdtaskchatbot_delete_department($department){

         global $wpdb ;        
         $delete = $wpdb->delete( 
                        $department['table'],   // table name 
                        array( 'department_id' => $department['add']['department_id'] ),  // where clause 
                        array( '%d' )      // where clause data type (int)
                    );    
        $department['action_status'] = ($delete)? 'delete_successfully' : 'something_is_error';
        return  $department ;
   }






  /**
   *@param  bdtaskchatbot_select_department($department = null). 
   *@since  1.2.0
   *@return query.
   */  
  public static function  bdtaskchatbot_select_department( $department = null){     
          $table_name = $department['table'];    
          $department['query']['select_all']  = "SELECT * FROM  $table_name  WHERE 1 ORDER BY department_id DESC ";    
          return  $department ;                         
  }


    public static function  bdtaskchatbot_active_and_deactive($id = '', $status='' ){
         
          global $wpdb;  

          $table_name = $wpdb->prefix.'bdtaskchatboard_department';         

          $action = $wpdb->update($table_name , array('is_active' => $status) , array('department_id' => $id) );
          return ;
                 
   }
















}