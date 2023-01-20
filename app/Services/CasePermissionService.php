<?php

namespace App\Services;

use App\Models\PetitionPetitioner;
use App\Models\PetitionLawyer;
use App\Models\StudentCasesAccess;
use Mail;
use Exception;

/**
 * 
 */
class CasePermissionService
{

	public static $unauthorizedMessage = "You dont have permission to this case";
	public static $unauthorizedCode = 401;

	function __construct()
	{
	}

	public static function userHasCasePermission($petition_id, $user)
	{
		$hasPermission = false;

		if ($user->hasRole('admin')) {
			return true;
		}

		if ($user->hasRole('client')) {
			$hasPermission = PetitionPetitioner::wherePetitionId($petition_id)->where('petitioner_id', $user->id)->exists();
		}

		if ($user->hasRole('lawyer')) {
			$hasPermission = PetitionLawyer::wherePetitionId($petition_id)->where('lawyer_id', $user->id)->exists();
		}

		if ($user->hasRole('student')) {
			$hasPermission = StudentCasesAccess::where("case_id", $petition_id)->where('user_id', $user->id)->exists();
		}
		return $hasPermission;
	}
}
