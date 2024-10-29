<?php 

/**
 * 
 */
class BDTASKCHATBOT_Departmentsmappings{
  
 protected static $departmentmap;


public static function bdtaskchatbot_process_department_map_data($departmentmap=null){
      self::$departmentmap = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_department_map_id_sanitize_name(self::$departmentmap) ;
       self::$departmentmap = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_department_map_table(  self::$departmentmap );
      self::$departmentmap = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_add_department_map_data(  self::$departmentmap ); 

      return self::$departmentmap;
     
        
  }
   public static function  bdtaskchatbot_process_department_map_update_data($departmentmap = null ){
      self::$departmentmap = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_department_map_ids_sanitize(self::$departmentmap) ;
      self::$departmentmap = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_department_map_id_sanitize_name(self::$departmentmap) ; 


      self::$departmentmap = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_department_map_table(  self::$departmentmap );
      self::$departmentmap = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_update_department_map(  self::$departmentmap );  
      return self::$departmentmap;
   }


  public static function  bdtaskchatbot_process_department_map_select_data($departmentmap = null ){
    self::$departmentmap = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_department_map_table(self::$departmentmap );
    self::$departmentmap = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_select_department_map(self::$departmentmap );  
    return self::$departmentmap;
 }
 public static function bdtaskchatbot_department_map_ids_sanitize($departmentmap=null){
            $departmentmap['add']['id'] = intval( $_POST['id']  ); 
            return $departmentmap;

 }

 public static function bdtaskchatbot_department_map_id_sanitize_name($departmentmap=null){
          
            $departmentmap['add']['user_id'] =intval( $_POST['user_id']); 
            $departmentmap['add']['department_id'] =intval( $_POST['department_id']); 
            return $departmentmap;
 } 

 public static function bdtaskchatbot_department_map_table($departmentmap=null){
       global $wpdb ;
       $departmentmap['table'] = $wpdb->prefix .'bdtaskchatboard_department_mapping';
        return $departmentmap;
 }
  public static function bdtaskchatbot_add_department_map_data($departmentmap){

              global $wpdb ;
              $add_new_department = $wpdb->insert( 
                           $departmentmap['table'], 
                           array(                  
                            'id' => '',     
                            'user_id' =>  $departmentmap['add']['user_id'],     
                            'department_id' =>$departmentmap['add']['department_id'],     
                          )
             );

      $departmentmap['action_status'] = ($add_new_department)? 'no_error_data_save_successfully' : 'something_is_error';
      return  $departmentmap ; 
  }


  public static function  bdtaskchatbot_update_department_map($departmentmap){
         global $wpdb ;   
                   $update_category['asjdlfkasdf']= $wpdb->update( 
                          $departmentmap['table'], 
                           array(               
                            'user_id' =>  $departmentmap['add']['user_id'],     
                            'department_id' =>$departmentmap['add']['department_id'],     

                          ),
                          array( 'id' =>$departmentmap['add']['id']) ,  // where clause(s)
                          array( '%s') , // column & new value type.
                          array( '%d' ) // where clause(s) format types
                        ); 

        $departmentmap['action_status'] = ($update_category)? 'no_error_data_update_successfully' : 'something_is_error';
        return  $departmentmap ; 

   }

    public static function  bdtaskchatbot_department_map_delete($id = ''){
          global $wpdb;  
          $delete_data=array();
         $table_name = $wpdb->prefix .'bdtaskchatboard_department_mapping';;         
         $delete = $wpdb->delete($table_name, array( 'id' => $id ) );

        $delete_data['action_status'] = ($delete)? 'no_error_data_delete_successfully' : 'something_is_error';
          return  $delete_data;
                 
   }

  public static function  bdtaskchatbot_select_department_map( $departmentmap = null){ 
  global $wpdb ;         
         $table_map = $departmentmap['table'];    
         $tbl_department = $wpdb->prefix .'bdtaskchatboard_department';  
         $tbl_wp_users = $wpdb->prefix .'users';       
         $departmentmap['query']['select_all']="SELECT $table_map.*, $tbl_wp_users.user_nicename,  $tbl_department.department_name
            FROM $table_map 
            INNER JOIN $tbl_wp_users ON $tbl_wp_users.ID = $table_map.user_id 
            INNER JOIN  $tbl_department ON  $tbl_department.department_id = $table_map.department_id";
          return  $departmentmap ;                            
  }


}