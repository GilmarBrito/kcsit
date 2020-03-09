<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AmountBalanceValidator implements Rule
{
    public $transaction_type;
    public $current_balance;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($transaction_type, $current_balance)
    {
        $this->transaction_type = $transaction_type;
        $this->current_balance = $current_balance;
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
        dd($attribute, $value, $this->transaction_type, $this->current_balance);
        if ($this->transaction_type == 'Withdraw' && $this->current_balance > $value) {
            echo 'nao valeu';
            return false;
        }

        return true;
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "When the transaction type is 'Withdraw', the amount has less then current balance ({$this->current_balance}) ";
    }
}
