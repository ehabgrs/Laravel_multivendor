<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Test implements Rule
{
	private $manage_stock;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($manage_stock)
    {
        $this->manage_stock = $manage_stock;
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
		//$value is the value of the quantity where we used the rule
        if($this->manage_stock == 1 && $value == null){
			return false;
		} else {
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
        return 'The validation error message.';
    }
}
