<?php
Class Donat extends CI_Model
{
 function getdonationdata()
 {
   $this -> db -> select('firstname, lastname, countrycode, city, email, phonenumber, jumlahuang');
   $this -> db -> from('donation');
   $query = $this -> db -> get();
     return $query->result();
 }
}
?>