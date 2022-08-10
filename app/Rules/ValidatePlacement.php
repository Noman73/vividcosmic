<?php

namespace App\Rules;
use DB;
use Illuminate\Contracts\Validation\Rule;

class ValidatePlacement implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $count=DB::table('fusers')->select('id')->where('placement_id',$value)->get();
        // dd($value,count($count));
        if(count($count)>=2){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'this placement user already completed';
    }
}
