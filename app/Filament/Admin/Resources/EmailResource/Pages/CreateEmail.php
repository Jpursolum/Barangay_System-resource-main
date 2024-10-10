<?php

namespace App\Filament\Admin\Resources\EmailResource\Pages;

use App\Filament\Admin\Resources\EmailResource;
use App\Mail\SendEmailToUsers;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;

class CreateEmail extends CreateRecord
{
    protected static string $resource = EmailResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        // Create the email record
        $emailRecord = parent::handleRecordCreation($data);

        // Send the email to selected users
        $userEmails = User::whereIn('id', $data['users'])->pluck('email');

        foreach ($userEmails as $email) {
            Mail::to($email)->send(new SendEmailToUsers($emailRecord->title, $emailRecord->body));
        }

        return $emailRecord;
    }
}
