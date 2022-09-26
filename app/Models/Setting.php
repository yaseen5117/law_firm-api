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
        info("Request domain $request_domain");
        //logged in User
        $user = request()->user();

        if ($user && $user->company_id > 0) {

            $setting = Setting::find($user->company_id)->getMeta()->toArray();
        } else {

            $allowed_domains = ["http://localhost:8080/", "https://elawfirmpk.com/"];

            if (in_array($request_domain, $allowed_domains)) {
                $company = Company::where('id', 1)->first();
            } else {
                $company = Company::where('domain', $request_domain)->first();
            }

            if (!$company) {
                return response([
                    "error" => "domain is unauthorized"
                ], 401);
            }

            $setting = Setting::withoutGlobalScopes()->find($company->id)->getMeta()->toArray();
        }
        return $setting;
    }

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->orderBy('id', 'desc');
    }
}
