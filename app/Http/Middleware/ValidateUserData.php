<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ValidateUserData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $request->validate([
                'first_name' => 'string|max:255',
                'last_name' => 'string|max:255',
                'email' => $request->isMethod('post') ? 'required|string|email|unique:users|max:255' : 'required|string|email|max:255',
                'password' => 'required|string|max:255',
                'address' => 'string|max:255',
                'phone' => 'string|max:255',
                'phone_2' => 'string|max:255',
                'postal_code' => 'string|max:255',
                'birth_date' => 'date|date_format:d/m/Y|max:255',
                'gender' => 'string|in:M,F|max:1',
            ]);

            return $next($request);
        } catch(ValidationException $exception) {
            $response = response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $exception->errors(),
            ], Response::HTTP_BAD_REQUEST);

            throw new HttpResponseException($response);
        }

    }
}
