<?php

            require_once $_SERVER['DOCUMENT_ROOT'].'/session_start.php';
            $page_title = 'Risky Jobs Search';
            require_once $_SERVER['DOCUMENT_ROOT'].'/Header.php';
            echo '<img src="riskyjobs_title.gif" alt="Risky Jobs" />';
            echo '<img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />';
           
            
             if (!isset($_SESSION['user_id'])) {
                    echo '<p>Please <a href="../userlogin.php">log in</a> to access this page.</p>';
                    exit();
                }   
                else {
                    echo('<p>You are logged in as ' . $_SESSION['user'] . '. <a href="../logout.php">Log out</a>.</p>');
                }
                
                    function build_query($user_search, $sort) {
                        
                      $search_query = "SELECT * FROM riskyjobs";
                      $clean_search = str_replace(',', ' ', $user_search);
                      $search_words = explode(' ', $clean_search);
                      $final_search_words = array();
                      if (count($search_words) > 0) {
                        foreach ($search_words as $word) {
                          if (!empty($word)) {
                            $final_search_words[] = $word;
                          }
                        }
                      }

                      
                      $where_list = array();
                      if (count($final_search_words) > 0) {
                        foreach($final_search_words as $word) {
                          $where_list[] = "description LIKE '%$word%'";
                        }
                      }
                      $where_clause = implode(' OR ', $where_list);

                      
                      if (!empty($where_clause)) {
                        $search_query .= " WHERE $where_clause";
                      }

                      
                      switch ($sort) {
                      
                      case 1:
                        $search_query .= " ORDER BY title";
                        break;
                      
                      case 2:
                        $search_query .= " ORDER BY title DESC";
                        break;
                      
                      case 3:
                        $search_query .= " ORDER BY state";
                        break;
                      
                      case 4:
                        $search_query .= " ORDER BY state DESC";
                        break;
                      
                      case 5:
                        $search_query .= " ORDER BY date_posted";
                        break;
                      
                      case 6:
                        $search_query .= " ORDER BY date_posted DESC";
                        break;
                      case 7:
                        $search_query .= " ORDER BY description";
                        break;
                      case 8:
                        $search_query .= " ORDER BY description DESC";
                        break;
                      default:
                        
                      }

                      return $search_query;
                    }


                    function generate_sort_links($user_search, $sort) {
                      $sort_links = '';

                      switch ($sort) {
                      case 1:
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=2">Job Title</a></td>';
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=7">Description</a></td>';  
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">State</a></td>';
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
                        break;
                      case 3:
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Job Title</a></td>';
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=7">Description</a></td>';  
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=4">State</a></td>';
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
                        break;
                      case 5:
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Job Title</a></td>';
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=7">Description</a></td>';  
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">State</a></td>';
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=6">Date Posted</a></td>';
                        break;
                      case 7:
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Job Title</a></td>';
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=8">Description</a></td>';  
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">State</a></td>';
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
                        break;
                      default:
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Job Title</a></td>';
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=7">Description</a></td>';  
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">State</a></td>';
                        $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
                      }

                      return $sort_links;
                    }

                    
                    function generate_page_links($user_search, $sort, $cur_page, $num_pages) {
                      $page_links = '';

                      // If this page is not the first page, generate the "previous" link
                      if ($cur_page > 1) {
                        $page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=' . $sort . '&page=' . ($cur_page - 1) . '"><-</a> ';
                      }
                      else {
                        $page_links .= '<- ';
                      }

                      
                      for ($i = 1; $i <= $num_pages; $i++) {
                        if ($cur_page == $i) {
                          $page_links .= ' ' . $i;
                        }
                        else {
                          $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=' . $sort . '&page=' . $i . '"> ' . $i . '</a>';
                        }
                      }

                      
                      if ($cur_page < $num_pages) {
                        $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=' . $sort . '&page=' . ($cur_page + 1) . '">-></a>';
                      }
                      else {
                        $page_links .= ' ->';
                      }

                      return $page_links;
                    }

                    
                    $sort = $_GET['sort'];
                    $user_search = $_GET['usersearch'];
                    $cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $results_per_page = 3;  // number of results per page
                    $skip = (($cur_page - 1) * $results_per_page);

                    
                    echo '<table border="0" cellpadding="2">';

                    
                    echo '<tr class="heading">';
                    echo generate_sort_links($user_search, $sort);
                    echo '</tr>';

                    
                    require_once '../appvars.php';
                    $dbc = mysqli_connect(DB_HOST, DB_USER,DB_USER_PASSWORD, DB_HOST_DATA);

                    // Query to get the total results 
                    $query = build_query($user_search, $sort);
                    $result = mysqli_query($dbc, $query);
                    $total = mysqli_num_rows($result);
                    $num_pages = ceil($total / $results_per_page);

                    
                    $query =  $query . " LIMIT $skip, $results_per_page";
                    $result = mysqli_query($dbc, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      echo '<tr class="results">';
                      echo '<td valign="top" width="20%">' . $row['title'] . '</td>';
                      echo '<td valign="top" width="50%">' . substr($row['description'], 0, 100) . '...</td>';
                      echo '<td valign="top" width="10%">' . $row['state'] . '</td>';
                      echo '<td valign="top" width="20%">' . substr($row['date_posted'], 0, 10) . '</td>';
                      echo '</tr>';
                    } 
                    echo '</table>';

                    
                    if ($num_pages > 1) {
                      echo generate_page_links($user_search, $sort, $cur_page, $num_pages);
                    }

                    mysqli_close($dbc)
?>
