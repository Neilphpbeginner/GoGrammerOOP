<?php
session_start();
            if (!isset($_SESSION['user_id'])) {
                if (isset($_COOKIE['user']) && isset($_COOKIE['user_id'])){
                    $_SESSION['user']   =   $_COOKIE['user'];
                    $_SESSION['user_id']   =   $_COOKIE['user_id'];
                }
            }
            
          
            
  ?>

