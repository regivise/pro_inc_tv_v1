<?php
class FormSanitizer{


    
    
    public static function sanitizeFormString($inputText){
        $inputText= strip_tags($inputText);
        $inputText =str_replace(" ", "",$inputText);
        $inputText = strtolower($inputText);
        $inputText =ucfirst($inputText);
    
        
        return $inputText;
    }
    public static function sanitizeFormUserName($inputText){
        $inputText= strip_tags($inputText);
        $inputText =str_replace(" ", "",$inputText);
       
        
        return $inputText;
    }
    public static function sanitizeFormPassword($inputText){
        $inputText= strip_tags($inputText);
      
       
        return $inputText;
    }
    public static function sanitizeFormEmail($inputText){
        $inputText= strip_tags($inputText);
      
       
        return $inputText;
    }
    public static function sanitizeFormEmail2($inputText){
        $inputText= strip_tags($inputText);
      
       
        return $inputText;
    }
    public static function sanitizeFormPassword2($inputText){
        $inputText= strip_tags($inputText);
      
       
        return $inputText;
    }
}
?>