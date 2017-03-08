<?php
    require("../models/mysql.php");
    class item
    {
        public $imgSource, $name, $price, $college, $category, $sellDate, $seller, $collegeId, $categoryId;
        function __construct($data)
        {
            $this->imgSource   = $data[0];
            $this->name        = $data[1];
            $this->price       = $data[2];
            $this->collegeId   = $data[3];
            $this->categoryId  = $data[4];
            $this->sellDate    = $data[5];
            $this->seller      = $data[6];
            switch($this->collegeId)
            {
                case 0:
                    $this->college = "All";
                    break;
                case 31: 
                    $this->college = "Indian Institute of Technology, Delhi";
                    break;
                case 33:
                    $this->college = "Indian Institute of Technology, Guwahati";
                    break;
                case 12: 
                    $this->college = "Birla Institute of Technology and Science, Pilani";
                    break;
                case 78:
                    $this->college = "National Institute of Technology, Jaipur";
                    break;
                case 18: 
                    $this->college = "Delhi Technological University, New Delhi";
                    break;
                default:
                    $this->college = "None";
                    break;
            }
            switch($this->categoryId)
            {
                case 0:
                    $this->category = "All";
                    break;
                case 1:
                    $this->category = "Books";
					break;
            	case 2:
                    $this->category = "Clothing";
					break;
            	case 3:
                    $this->category = "Electronics";
					break;
            	case 4:
                    $this->category = "Furniture";
					break;
            	case 5:
                    $this->category = "Sports";
					break;
            	case 6:
                    $this->category = "Vehicle";
					break;
            	case 7:
                    $this->category = "Others";
					break;
				default:
				    $this->category = "None";
            }
        }
    }
    function get_items($parameters = array(0, 0))
    {
        $connection = connect("../models/config.json");
        if($parameters[0] == 0 && $parameters[1] == 0)
            $raw = mysqli_query($connection, "SELECT Image, Name, Price, College, Category, Selldate, Seller FROM Sales;");
        else if($parameters[1] != 0 && $parameters[0] == 0)
            $raw = mysqli_query($connection, "SELECT Image, Name, Price, College, Category, Selldate, Seller FROM Sales WHERE College =" . $parameters[1] . ";");
        else if($parameters[0] != 0 && $parameters[1] == 0)
            $raw = mysqli_query($connection, "SELECT Image, Name, Price, College, Category, Selldate, Seller FROM Sales WHERE Category =" . $parameters[0] . ";");
        else
            $raw = mysqli_query($connection, "SELECT Image, Name, Price, College, Category, Selldate, Seller FROM Sales " .
                "WHERE Category = " . $parameters[0] . " AND College = ". $parameters[1] . ";");
        while($row = mysqli_fetch_row($raw))
            $item[] = new item($row);
        mysqli_close($connection);
        if(!empty($item))
            return $item;
        else 
            return null;
    }
?>
