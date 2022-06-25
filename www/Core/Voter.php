<?php 
namespace App\Core;

interface Voter
{
    public function canVote(string $perm ,$object = null) : bool; 

    public function vote (User $user, string $permission, $subject = null) : bool; 

}
