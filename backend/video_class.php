<?php

    class Passport
    {
        public
        $title,
        $anchor,
        $details,
        $link,
        $day,
        $month,
        $year;

        public function __construct($title, $anchor, $details, $link, $day, $month, $year)
        {
            $this->title = $title;
            $this->anchor = $anchor;
            $this->details = $details;
            $this->link = $link;
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
        }

        public function Upload()
        {
            if ($_POST['addNewVideo']) 
            {
                if($this->anchor ===""){
                    $error[] = "You did not supply the Author of the video";
                }
                if($this->details ===""){
                    $error[] = "You did not supply any detail for the video";
                }
                if($this->title ===""){
                    $error[] = "You did not supply the title of the video";
                }
                if($this->link ===""){
                    $error[] = "You did not supply the YouTube link to the video";
                }
    
                if (empty($error))
                {

                    $sql =   "
                      INSERT INTO message (title, sermon_by, type, details, link, day, month, year) 
                      VALUES(:title, :sermon_by, :type, :details, :link, :day, :month, :year)
                    ";

                    global $conn;
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':title', $this->title);
                    $stmt->bindValue(':sermon_by', $this->anchor);
                    $stmt->bindValue(':type', 'video');
                    $stmt->bindValue(':details', $this->details);
                    $stmt->bindValue(':link', $this->link);
                    $stmt->bindValue(':day', $this->day);
                    $stmt->bindValue(':month', $this->month);
                    $stmt->bindValue(':year', $this->year);

                    $result = $stmt->execute();

                    $count = $stmt->rowCount();
                    
                    if ($result===true && $count>0) 
                    {
                        $success = '<div class="col-sm-12 alert alert-success alert-dismissable">'.
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                        '<h6><i class="icon fa pe-7s-check"></i> Success</h6>'.
                                    '</div>';

                        echo $success;
                    }
                    else
                        {
                            echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                        '<h6><i class="icon fa pe-7s-attention"></i>Error adding the link, please try again later</h6>'.
                                    '</div>';
                        }
                }
                else 
                {
                    echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                                '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                '<h6><i class="icon fa pe-7s-attention"></i>'. "Failed to add because: <br>";
                                    $j = 0;
                                    for ($i=1; $i <= count($error); ++$i) { 
                                        echo $i . ". ". $error[$j]. "<br />";
                                        ++$j;
                                    }
                    echo        '</h6>'.
                            '</div>';
                }
            }
            else
            {
                echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                            '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                            '<h6><i class="icon fa pe-7s-attention"></i>Please fill all fields</h6>'.
                        '</div>';
            }

        }//End of the upload function
    }//End of the passport classs

?>