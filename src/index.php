<?php
session_start();

if (!$_SESSION["started"]) {
   $_SESSION["started"] = true;
   $_SESSION["hash1"] = false;
   $_SESSION["hash2"] = false;
   $_SESSION["hash3"] = false;
   $_SESSION["hash4"] = false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $hash = $_POST["hash"];
   $text = $_POST["flag"];
   $hashn = $_POST["hashn"];

   if ($hash == hash("sha256", $text) || $hash == hash("sha1", $text) || $hash == hash("md5", $text)) {
      switch($hashn) {
      case 1:
         $_SESSION["hash1"] = true;
         break;
      case 2:
         $_SESSION["hash2"] = true;
         break;
      case 3:
         $_SESSION["hash3"] = true;
         break;
      case 4:
         $_SESSION["hash4"] = true;
         break;
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title></title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <header>
         <div id="logo-box">
            <svg id="hash-icon" fill="#000000" height="200px" width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490 490" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M64.333,490h58.401l33.878-137.69h122.259L245.39,490h58.401l33.878-137.69h119.92v-48.162h-108.24l29.2-117.324h79.04 v-48.162H390.23L424.108,0H365.31l-33.878,138.661H208.79L242.668,0h-58.415l-33.864,138.661H32.411v48.162h106.298l-28.818,117.324 h-77.48v48.162h65.8L64.333,490z M197.11,186.824h122.642l-29.2,117.324H168.292L197.11,186.824z"></path> </g></svg>
            <h1>Letder - Hashlab</h1>
         </div>
         <span id="version">
            version 1.0
         </span>
      </header> 
      <div id="intro">
         <h2>Letder's hashlab</h2>
         <p>Submit the text that can generate the following hashes, tools like hashcat are recommended you must identify the hash algorithm used to geneSubmit the text that can generate the following hashes, tools like hashcat are recommended you must identify the hash algorithm used to generate the hash.</p>
      </div>
      <div class="hash_flag">
         <!--passwd-->
         <form action="index.php" method="post">
            <h2>Hash1: [30274c47903bd1bac7633bbf09743149ebab805f]</h2>
            <input type="hidden" name="hash" value="30274c47903bd1bac7633bbf09743149ebab805f">
            <input type="hidden" name="hashn" value="1">
            <input type="text" name="flag" placeholder="Flag">
            <input type="submit" value="Check">
            <?php if ($_SESSION["hash1"] == true) {
               echo "<p style='color: #00ff21'>Correct</p>";
            } ?>
         </form>
      </div>
      <div class="hash_flag">
         <!--easy-->
         <form action="index.php" method="post">
            <h2>Hash2: [48bb6e862e54f2a795ffc4e541caed4d]</h2>
            <input type="hidden" name="hash" value="48bb6e862e54f2a795ffc4e541caed4d">
            <input type="hidden" name="hashn" value="2">
            <input type="text" name="flag" placeholder="Flag">
            <input type="submit" value="Check">
            <?php if ($_SESSION["hash2"] == true) {
               echo "<p style='color: #00ff21'>Correct</p>";
            } ?>
         </form>
      </div>
      <div class="hash_flag">
         <form action="index.php" method="post">
            <!--cracked-->
            <h2>Hash3: [615b26545c0f17635b6f0d0d70c0c8d5c9405881c00f972627a26bf129be51bb]</h2>
            <input type="hidden" name="hash" value="615b26545c0f17635b6f0d0d70c0c8d5c9405881c00f972627a26bf129be51bb">
            <input type="hidden" name="hashn" value="3">
            <input type="text" name="flag" placeholder="Flag">
            <input type="submit" value="Check">
            <?php if ($_SESSION["hash3"] == true) {
               echo "<p style='color: #00ff21'>Correct</p>";
            } ?>
         </form>
      </div>
      <div class="hash_flag">
         <!--saltedhash-->
         <form action="index.php" method="post">
            <h2>Hash4: [ed91a1955e7e7ab5ab760f21dcb0f58c91d47214330dc9e00cb9339ebc3b0c2f]</h2>
            <input type="hidden" name="hash" value="ed91a1955e7e7ab5ab760f21dcb0f58c91d47214330dc9e00cb9339ebc3b0c2f">
            <input type="hidden" name="hashn" value="4">
            <input type="text" name="flag" placeholder="Flag">
            <input type="submit" value="Check">
            <p>salt: hashlab_salt_b89111a14c1a0f63244cccceb1da3e65</p>
            <?php if ($_SESSION["hash4"] == true) {
               echo "<p style='color: #00ff21'>Correct</p>";
            } ?>
         </form>
      </div>
   </body>
</html>
