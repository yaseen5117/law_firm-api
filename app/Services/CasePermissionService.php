<?php

namespace App\Services;

use App\Models\PetitionPetitioner;
use App\Models\PetitionLawyer;
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

		return $hasPermission;
	}
}
