<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;
class ValidatePosition implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $p;
    public function __construct($placement)
    {
        $this->p=$placement;
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
        if($value==null){
            return true;
        }
        $count=DB::table('fusers')->select('position')->where('position',$value)->where('placement_id',$this->p)->get();
        if(count($count)>0){
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
        return 'This Position already Exist';
    }
}
