<?php
// requête API :
function callAPI($method, $query, $data)
{
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $query);
   switch ($method) {
      case "POST":
         curl_setopt($ch, CURLOPT_URL, $query);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
         break;
      case "PUT":
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         break;
      case "PATCH":
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         break;
      case "DELETE":
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
         break;
      default:
         if ($data) {
               $url = sprintf("%s?%s", $query, http_build_query($data));
         }
   }

   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($ch);
   curl_close($ch);

   return $response;
}
