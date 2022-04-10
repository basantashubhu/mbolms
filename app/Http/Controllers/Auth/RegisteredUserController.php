<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $loanTypes = $this->getLoanTypes();
        return view('auth.register', compact('loanTypes'));
    }

    private function getLoanTypes() {
        return Loan::query()->get();
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'digits_between:9,10'],
            'sex' => ['required'],
            'dob' => 'required|date',
        ]);

        $loanData = $request->validate([
            'loan_type' => 'required',
            'loan_terms' => 'required|integer',
            'amount' => 'required',
            'installment' => 'required',
        ]);

        /**@var User $user */
        $user = User::create(array_merge($data, [
            'password' => Hash::make($request->password),
        ]));
        $loan = Loan::query()->where('loan_type', $request->loan_type)->first();
        $user->loans()->attach($loan->id, $loanData);

        event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
