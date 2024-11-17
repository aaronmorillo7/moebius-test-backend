<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function getUsers() {
        $users = User::all();

        return response()->json(["users" => $users ]);
    }

    public function createUser(Request $request) {
        try {
            $userData = $request->all();
            $userData['password'] = Hash::make($userData['password']);

            User::create($userData);

            return response()->json(["success" => true, "message" => "User has been created successfully." ]);
        } catch (Exception $error) {
            return response()->json(["success" => false, "message" => "User has not been created." ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateUser(Request $request) {
        try {
            $userData = $request->all();
            $userData['password'] = Hash::make($userData['password']);

            $user = User::find($request->route('id'));

            $user->update($userData);

            return response()->json(["success" => true, "message" => "User has been updated successfully." ]);
        } catch (Exception $error) {
            return response()->json(["success" => false, "message" => "User has not been updated." ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteUser(Request $request) {
        try {
            $user = User::find($request->route('id'));
            $user->delete();

            return response()->json(["success" => true, "message" => "User has been deleted successfully." ]);
        } catch (Exception $error) {
            return response()->json(["success" => false, "message" => "User has not been deleted." ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
