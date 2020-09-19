<?php


namespace App\Modules\Auth\Validators;

use App\Exceptions\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class AuthRequest
 * @package App\Modules\Auth\Requests
 */
class AuthValidator
{
    /**
     * @var Request
     */
    private $request;

    /**
     * AuthRequest constructor.
     * @param Request $request
     * @throws ValidationException
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->validate();
    }

    public function validate()
    {
        $validator = Validator::make($this->data(), $this->rules());
        if($validator->fails()) {
            throw new ValidationException($validator->errors());
        }
    }

    /**
     * @return string[]
     */
    private function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email|max:255',
            'password' => 'required|string|min:6'
        ];
    }

    /**
     * @return string[]
     */
    private function data(): array
    {
        return $this->request->all();
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}
