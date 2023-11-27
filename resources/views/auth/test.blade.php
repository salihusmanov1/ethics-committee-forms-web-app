
<?php
use App\Models\User;

$userId = 1;
        $user = User::find($userId);


    if ($user) {
        echo $user->email, '<br>'; // Access the 'email' column value
         echo $user->password; // Access the 'password' column value
    // ... other column values as needed
        } else {
          echo "User not found.";
        }
