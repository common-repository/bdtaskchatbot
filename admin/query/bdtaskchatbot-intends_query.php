<?php
 /**
   *@param  bdtaskchatbot_order 
   *@since  1.0.0
   */  
class BDTASKCHATBOT_Intents{


   /**
   *@var protected. 
   *@since 1.0.0
   */ 
   protected static $intents;

   
   /**
   *@param  bdtaskchatbot_process_order_data($order)/// To Add order. 
   *@since  1.0.0
   *@return $order (array) .
   */  
   public static function  bdtaskchatbot_process_intent_data($intents = null ){

      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_intent_name_sanitize() ;
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_intent_table(  self::$intents );
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_add_intent(  self::$intents );  
       return self::$intents;

     
   }

  /**
   *@param  bdtaskchatbot_process_intent_update_data($intents)/// To Update intent. 
   *@since  1.0.0
   *@return $intents (array) .
   */  

   public static function  bdtaskchatbot_process_intent_update_data($intents = null ){
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_intent_id_sanitize() ;
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_intent_name_sanitize( self::$intents ) ;
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_intent_table(  self::$intents );
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_update_intent(  self::$intents );  
      return self::$intents;




   }


  /**
   *@param  bdtaskchatbot_process_intent_delete_data($intents)/// To Delete intent. 
   *@since  1.0.0
   *@return $intents (array).
   */  

   public static function  bdtaskchatbot_process_intent_delete_data($intents = null ){
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_intent_id_sanitize() ;
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_intent_table(  self::$intents );
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_delete_intent(  self::$intents );  
      return self::$intents;
   }   

   /**
   *@param  bdtaskchatbot_process_intent_select_data($intents)/// To Select intent. 
   *@since  1.0.0
   *@return $intents (array) .
   */  

   public static function  bdtaskchatbot_process_intent_select_data($intents = null ){
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_intent_table(self::$intents );
      self::$intents = BDTASKCHATBOT_Intents::bdtaskchatbot_select_intent(self::$intents );  
      return self::$intents;
   }

  

   /**
   *@param  bdtaskchatbot_intent_id_sanitize($intents). 
   *@since  1.0.0
   *@return intent id .
   */  
   public static function  bdtaskchatbot_intent_id_sanitize($intents = null ){   
       $intents['add']['intent_id'] = intval( $_POST['intent_id']  );
      return $intents;
   }

  /**
   *@param  bdtaskchatbot_intent_name_sanitize($intents). 
   *@since  1.0.0
   *@return intent name .
   */  
   public static function  bdtaskchatbot_intent_name_sanitize($intents = null ){ 


         
      $intents['add']['intent_id'] = sanitize_text_field($_POST['intent_id']  );
      $intents['add']['department_id'] = sanitize_text_field( $_POST['department_id']  );
      $intents['add']['intent_name'] = sanitize_text_field( $_POST['intent_name']);
      $intents['add']['status'] = sanitize_text_field( $_POST['status']  );
      $intents['add']['created_by'] = sanitize_text_field( $_POST['created_by'] );
      $intents['add']['created_date'] = sanitize_text_field( $_POST['created_date']);
      if(isset($_POST['train_phrase']) && !empty($_POST['train_phrase'])):
      $intents['add']['train_phrase']=array_map( 'sanitize_text_field',$_POST['train_phrase'] );

      endif;
      if(isset($_POST['response_name']) && !empty($_POST['response_name'])):
      $intents['add']['response_name']=array_map( 'sanitize_text_field',$_POST['response_name']); 
      endif;
       return $intents;

   }
  /**
   *@param  bdtaskchatbot_intent_table($intents). 
   *@since  1.0.0
   *@return table name .
   */  
   public static function  bdtaskchatbot_intent_table($intents){
      global $wpdb ; 
      $intents['intents'] = $wpdb->prefix .'bdtaskchatboard_intents'; 
      $intents['answer'] = $wpdb->prefix .'bdtaskchatboard_answer_bank'; 
      $intents['question'] = $wpdb->prefix .'bdtaskchatboard_question_bank'; 
      return $intents;     
   }
  /**
   *@param  bdtaskchatbot_add_intent($intents). 
   *@since  1.0.0
   *@return status .
   */  
   public static function  bdtaskchatbot_add_intent($intents){

            global $wpdb ; 

          
             $add_new_intent = $wpdb->insert( 
                            $intents['intents'], 
                           array(                  
                            'intent_id' => '',
                            'department_id'=> $intents['add']['department_id'],      
                            'intent_name'=>$intents['add']['intent_name'],      
                            'intent_type'=>$intents['add']['status'],      
                            'created_by'=>'',      
                            'created_date'=>date("Y-m-d")     
                          )
              );
         $lastInsertId = $wpdb->insert_id;


         $aa=count($intents['add']['train_phrase']);
      
          for($i=0;$i<$aa;$i++) {
          $add_new_order = $wpdb->insert( 
                     $intents['question'], 
                     array(                  
                      'question_id' => '',
                      'question_text'=> $intents['add']['train_phrase'][$i],      
                      'intent_id' =>$lastInsertId,
                      'department_id'=> $intents['add']['department_id'],          
                    )
               );
          }
         
       $response_name=count($intents['add']['response_name']);

          for($i=0;$i<$response_name;$i++) {
          $add_new_order = $wpdb->insert( 
                     $intents['answer'], 
                     array(                  
                      'answer_id' => '',
                      'answer_text'=> $intents['add']['response_name'][$i],      
                      'intent_id' =>$lastInsertId,
                      'department_id'=> $intents['add']['department_id'],          
                    )
               );
          }



      $intents['action_status'] = ($add_new_order)? 'no_error_data_save_successfully' : 'something_is_error';
      return  $intents ; 
   }

   public static function bdtaskchatbot_update_intent($intents){

            global $wpdb ; 
           $update_intent  = $wpdb->delete( 
                        $intents['answer'],   // table name 
                        array( 'intent_id' =>$intents['add']['intent_id'] ),  // where clause 
                        array( '%d' )      // where clause data type (int)
            ); 
           $update_intent  = $wpdb->delete( 
                      $intents['question'],   // table name 
                      array( 'intent_id' => $intents['add']['intent_id'] ),  // where clause 
                      array( '%d' )      // where clause data type (int)
          ); 
                  

         $update_intent  = $wpdb->update( 
                        $intents['intents'], 
                       array(                  
                        'department_id'=> $intents['add']['department_id'],      
                        'intent_name'=>$intents['add']['intent_name'],      
                        'intent_type'=>$intents['add']['status'],      
                        'created_by'=>'',      
                        'created_date'=>date("Y-m-d")     
                      ),
                      array( 'intent_id' => $intents['add']['intent_id']) // where clause(s)
                        
          );

         $aa=count($intents['add']['train_phrase']);
      
          for($i=0;$i<$aa;$i++) {
          $update_intent  = $wpdb->insert( 
                     $intents['question'], 
                     array(                  
                      'question_id' => '',
                      'question_text'=> $intents['add']['train_phrase'][$i],      
                      'intent_id' =>$intents['add']['intent_id'],
                      'department_id'=> $intents['add']['department_id'],          
                    )
               );
          }
         
       $response_name=count($intents['add']['response_name']);

          for($i=0;$i<$response_name;$i++) {
          $update_intent  = $wpdb->insert( 
                     $intents['answer'], 
                     array(                  
                      'answer_id' => '',
                      'answer_text'=> $intents['add']['response_name'][$i],      
                      'intent_id' =>$intents['add']['intent_id'],
                      'department_id'=> $intents['add']['department_id'],          
                    )
               );
          }

      $intents['action_status'] = ($update_intent)? 'no_error_data_update_successfully' : 'something_is_error';
       return  $intents ; 

   }




   public static function  bdtaskchatbot_department_map_delete($id = ''){
          global $wpdb;  
         $delete_data=array(); 
         $intents= $wpdb->prefix .'bdtaskchatboard_intents'; 
         $delete = $wpdb->delete($intents, array( 'intent_id' => $id ) );
         $delete_data['action_status'] = ($delete)? 'no_error_data_delete_successfully' : 'something_is_error';
          return  $delete_data;
                 
   }



 }/*  / class bdtaskchatbot_intent */