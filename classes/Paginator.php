<?php

/**
*	Paginator
*
* Data for selecting a page records
**/

class Paginator
{
	/**
	* Number of records to return
	* @var integer
	**/
	public $limit;

	/**
	* Number of records to skip before the page
	* @var integer
	**/
	public $offset;

	/**
	* Previous Page Number
	* @var integer
	**/
	public $previous;

	/**
	* Next Page Number
	* @var integer
	**/
	public $next;

	/**
	*	Constructor
	*
	* @param integer $page Page number
	*	@param integer $records_per_page Number of records per page
	*
	* @return void
	**/
	public function __construct($page, $records_per_page, $total_records)
	{
		$this->limit = $records_per_page;

		// so that no other value than integer could be passed in the url ?page=
		$page = filter_var($page, FILTER_VALIDATE_INT,[		// filter our the validations in ?page=
			'options' => [
				'default' => 1,		// if any string value is placed(?page=abc) it returns ?page=1
				'min_range' => 1 // so that ?page=-1 cannot happen
			]
		]);

		if($page > 1) {
			$this->previous = $page - 1;
		}

		$total_pages = ceil($total_records / $records_per_page);

		if ($page < $total_pages) {
			$this->next = $page + 1;
		}

		$this->offset = $records_per_page * ($page - 1);
	}
}
