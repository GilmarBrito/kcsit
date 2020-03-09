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
        if ($this->transaction_type == 'Withdraw' && $value > $this->current_balance;) {
            return false;
        }

        if (!$this->source instanceof Source) {
            return false;
        }

        return $this->source->client()->validRepository(
            $value, $this->branch
        );
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
