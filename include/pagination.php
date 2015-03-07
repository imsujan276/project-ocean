				<?php 
				//	$sql = $item->viewall(); 
					$rs_result = $item->viewall();  //run the query

					// How many adjacent pages should be shown on each side?
					$adjacents = 3;

					$total_records = mysql_num_rows($rs_result);  //count number of records
					$total_pages = ceil($total_records / $num_rec_per_page); //number of pages

					/* Setup page vars for display. */
					if($page == 0)
						$page=1;

					$prev=$page-1;
					$next=$page+1;
					$total_pages = ceil($total_records / $num_rec_per_page); 
					$lpm1=$total_pages-1;   //last page - 1 

					$pagination="";
					if($total_pages > 1) {
						$pagination.= "<div class='pagination'>";

						//previous button
						if( $page > 1 )
							$pagination.="<a href=\"$targetpage?page=$prev\"> Previous </a>";
						else
							$pagination.= "<span class=\"disabled\"> previous</span>";

						//pages
						if ($total_pages < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
						{	
							for ($counter = 1; $counter <= $total_pages; $counter++)
							{
								if ($counter == $page)
									$pagination.= "<span class=\"current\">$counter</span>";
								else
									$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
							}
						}
						elseif($total_pages > 5 + ($adjacents * 2))	//enough pages to hide some
						{
							//close to beginning; only hide later pages
							if($page < 1 + ($adjacents * 2))		
							{
								for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
								{
									if ($counter == $page)
										$pagination.= "<span class=\"current\">$counter</span>";
									else
										$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
								}
								$pagination.= "...";
								$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
								$pagination.= "<a href=\"$targetpage?page=$total_pages\">$total_pages</a>";		
							}
							//in middle; hide some front and some back
							elseif($total_pages - ($adjacents * 2) > $page && $page > ($adjacents * 2))
							{
								$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
								$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
								$pagination.= "...";
								for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
								{
									if ($counter == $page)
										$pagination.= "<span class=\"current\">$counter</span>";
									else
										$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
								}
								$pagination.= "...";
								$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
								$pagination.= "<a href=\"$targetpage?page=$total_pages\">$total_pages</a>";		
							}
							//close to end; only hide early pages
							else
							{
								$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
								$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
								$pagination.= "...";
								for ($counter = $total_pages - (2 + ($adjacents * 2)); $counter <= $total_pages; $counter++)
								{
									if ($counter == $page)
										$pagination.= "<span class=\"current\">$counter</span>";
									else
										$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
								}
							}
						}
						
						//next button
						if ($page < $counter - 1) 
							$pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
						else
							$pagination.= "<span class=\"disabled\">next</span>";
						$pagination.= "</div>\n";		
					}
				?>