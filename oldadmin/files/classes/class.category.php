<?php
	class Category extends DataBase
	{
		var $ID;
		var $Data;
		var $Products;
		var $Categories;
		
		public function __construct($ID=0)
		{
			$this->ID = $ID;
			$this->Connect();
			$this->setData($this->ID);
		}


		/********* SETTERS *********/

		public function setData($ID)
		{
			$this->Data = $this->fetchAssoc("category","*","category_id=".$ID);
			$this->Data = $this->Data[0];
		}

		/********* GETTERS *********/
		public function getData()
		{
			return $this->Data;
		}

		public function getProducts()
		{
			if(!$this->Products)
				$this->Products = $this->fetchAssoc("product","*","product_id IN (SELECT product_id FROM relation_product_category WHERE category_id=".$this->ID.")");
			return $this->Products;
		}

		public function countProducts()
		{
			return count($this->getProducts());
		}

		public function insertProducts()
		{
			return $this->countProducts()<1? "Sin Productos Asociados" : $this->countProducts();
		}

		public function getParent($ID=0)
		{
			if($ID==0)
			{
				return "Categoría Principal";
			}else{
				$Category = $this->fetchAssoc("category","title","category_id=".$ID);
				return $Category[0]['title'];
			}
		}

		public function getCategories()
		{
			if(!$this->Categories)
				$this->Categories = $this->fetchAssoc("category","*","parent_id=".$this->ID);
			return $this->Categories;
		}

		public function countCategories()
		{
			return count($this->getCategories());
		}

		public function insertDependencies()
		{
			if($this->countCategories()<1) 
			{
				return "";
			}else{
				foreach($this->getCategories() as $Category)
				{
					$Dependecies .= $Dependecies? ", ".$Category['title']:$Category['title'];
				}
				return $Dependecies;
			}
		}
	}

?>