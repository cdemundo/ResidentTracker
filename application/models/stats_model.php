<?php 

/**
* 
*/
class Stats_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function numbersByYear($yearStart, $yearEnd, $program_names=array())
	{
		/*SELECT COUNT(*), resident.program_name
		FROM courses_attended 
		JOIN resident on courses_attended.resident_id = resident.id 
		JOIN residency_program on resident.program_name = residency_program.program_name
		WHERE resident.program_name = "Albany Medical Center"
		OR resident.program_name = "Baylor College of Medicine"
		GROUP BY (resident.program_name, courses_attended.year_attended)*/
	}
}