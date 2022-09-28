<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;
use App\Scopes\CompanyScope;

class Setting extends Model
{
    use HasFactory;
    use Metable;
    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }

    public static function getSetting()
    {
        $request_domain = \Request::server('HTTP_REFERER');
        $setting = null;
        $user = request()->user();
        $allowed_domains = ["http://localhost:8080/", "https://elawfirmpk.com/"];

        if ($user && $user->company_id > 0) {
            //WHEN USER IS LOGGED IN, WE SIMPLY GET COMPANY OF USER
            $setting = Setting::withoutGlobalScopes()->where('company_id',$company->id)->first()->getMeta()->toArray();
        } else {

            //WHEN USER IS NOT LOGGED IN, NOW WE TRY TO GET SETTING BY DOMAIN

            if (in_array($request_domain, $allowed_domains)) {
                //IF LOCAL OR ELAWFIRM USER, COMPANY ID OF ELAWFIRM IS 1
                $company = Company::where('id', 1)->first();
            } else {
                //IF DOMAIN IS OTHER THAN ELAWFIRM, WE WILL TRY TO FIND OUT COMPANY ASSOCIATED WITH THIS DOMAIN
                $company = Company::where('domain', $request_domain)->first();
            }

            if ($company) {
                $setting = Setting::withoutGlobalScopes()->where('company_id',$company->id)->first()->getMeta()->toArray();
            }
        }
        return $setting;
    }

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->orderBy('id', 'desc');
    }
}
