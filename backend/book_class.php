<?php

    class Passport
    {
        public
        $image_name,
        $image_ext,
        $path,
        $pdf,
        $ext2,
        $path2,
        $title,
        $pages,
        $details,
        $price,
        $volume;

        public function __construct($name, $ext, $path, $pdf, $ext2, $path2, $title, $pages, $details, $price, $volume)
        {
            $this->image_name = $name;
            $this->image_ext = $ext;
            $this->path = $path;
            $this->pdf = $pdf;
            $this->ext2 = $ext2;
            $this->path2 = $path2;
            $this->title = $title;
            $this->pages = $pages;
            $this->details = $details;
            $this->price = $price;
            $this->volume = $volume;
        }

        public function Upload()
        {

            $error = array();
            $image_format = array('jpeg','jpg','png');

            $pdf_format = array('pdf','doc','docx','text');

            if ($_FILES['book_cover'] && $_FILES['book_pdf']) 
            {
                $files = $_FILES['book_cover'];
                //setting variables for the passport object
                $temp_name = $files['tmp_name'];
                $image_size = $files['size'];

                $book_pdf = $_FILES['book_pdf'];
                $temp_name2 = $book_pdf['tmp_name'];
                $pdf_size = $book_pdf['size'];
                //End of variable setting


                if (in_array($this->image_ext, $image_format)===false) {
                    $error[] = "The format, $this->image_ext, is not allowed <br> The permitted image formats are: jpeg, jpg and png";
                }

                if (in_array($this->ext2, $pdf_format)===false) {
                    $error[] = "The audio format, $this->ext2, is not allowed <br> The permitted audio formats are: pdf, doc, docx and text";
                }
    
                if ($image_size > 20971520) {
                    $error[] = "The image size is too large, please upload an image of 10mb or less";
                }

                if ($pdf_size > 62914560) {
                    $error[] = "The document size is too large, please upload find a way to compress it to 30mb or less";
                }

                if($this->pages ===""){
                    $pages = "";
                }

                if($this->price ===""){
                    $error[] = "You did not supply the price of the book";
                }

                if($this->volume ===""){
                    $error[] = "You did not supply the what volume the book is";
                }

                if($this->details ===""){
                    $error[] = "You did not supply any detail for the book";
                }
                if($this->title ===""){
                    $error[] = "You did not supply the title of the book";
                }
    
                if (empty($error))
                {

                    $sql =  "
                                INSERT INTO books (book_title, page_count, price, book_description, volume, ext, ext2) 
                                VALUES(:title, :pages, :price, :details, :volume, :ext, :ext2)
                            ";

                    global $conn;
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':title', $this->title);
                    $stmt->bindValue(':pages', $this->pages);
                    $stmt->bindValue(':details', $this->details);
                    $stmt->bindValue(':price', $this->price);
                    $stmt->bindValue(':volume', $this->volume);
                    $stmt->bindValue(':ext', $this->image_ext);
                    $stmt->bindValue(':ext2', $this->ext2);

                    $result = $stmt->execute();

                    $count = $stmt->rowCount();
                    
                    if ($result===true && $count>0) 
                    {
                        $book_image_uploaded = move_uploaded_file($temp_name, $this->path);

                        $book_pdf_uploaded = move_uploaded_file($temp_name2, $this->path2);
    
                        if ($book_image_uploaded===true && $book_pdf_uploaded===true)
                        {
                            $success = '<div class="col-sm-12 alert alert-success alert-dismissable">'.
                                            '<button aria-hidden="true" data-dismiss="alert" class="close" price="button">×</button>'.
                                            '<h6><i class="icon fa pe-7s-check"></i> Success</h6>'.
                                        '</div>';

                            echo $success;
                        }
                        else
                        {
                            echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" price="button">×</button>'.
                                        '<h6><i class="icon fa pe-7s-attention"></i>Error uploading the book, please try again later</h6>'.
                                    '</div>';
                        }
                    }
                    else
                        {
                            echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" price="button">×</button>'.
                                        '<h6><i class="icon fa pe-7s-attention"></i>Error uploading the book, please try again later</h6>'.
                                    '</div>';
                        }
                }
                else 
                {
                    echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                                '<button aria-hidden="true" data-dismiss="alert" class="close" price="button">×</button>'.
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
                            '<button aria-hidden="true" data-dismiss="alert" class="close" price="button">×</button>'.
                            '<h6><i class="icon fa pe-7s-attention"></i>Please ensure that you use choose picture and document file to be uploaded!</h6>'.
                        '</div>';
            }

        }//End of the upload function
    }//End of the passport classs

?>