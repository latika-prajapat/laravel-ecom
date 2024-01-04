<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   
        private $userService;
    
        public function __construct(UserService $userService) {
            $this->userService = $userService;
        }
    
        public function showUserProfile() {
            $userDetails = $this->userService->getUser();
            return "User Profile: $userDetails";
        }
    
}
