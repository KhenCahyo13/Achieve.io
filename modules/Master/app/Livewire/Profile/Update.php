<?php

namespace Modules\Master\Livewire\Profile;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Master\Models\Department;
use Modules\Master\Models\Lecturer;
use Modules\Master\Models\Student;
use Modules\Master\Models\StudyProgram;
use Modules\Master\Models\User;

class Update extends Component
{
    public Form $form;

    public function render()
    {
        $studyPrograms = StudyProgram::all();
        $departments = Department::all();

        return view('master::livewire.profile.update', compact('studyPrograms', 'departments'));
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $user = User::find(Auth::id());
            $user->update([
                'name' => $this->form->name,
                'email' => $this->form->email,
            ]);

            if (Auth::user()->hasRole('Student')) {
                Student::updateOrCreate([
                    'user_id' => Auth::id(),
                ], [
                    'study_program_id' => $this->form->placeId,
                    'nim' => $this->form->masterNumber,
                    'address' => $this->form->address,
                    'phone_number' => $this->form->phoneNumber,
                    'birth_date' => $this->form->birthDate,
                ]);
            } elseif (Auth::user()->hasRole('Lecturer')) {
                Lecturer::updateOrCreate([
                    'user_id' => Auth::id(),
                ], [
                    'department_id' => $this->form->placeId,
                    'nip' => $this->form->masterNumber,
                    'address' => $this->form->address,
                    'phone_number' => $this->form->phoneNumber,
                    'birth_date' => $this->form->birthDate,
                ]);
            }

            $this->dispatch('profile-updated', message: 'Profile updated successfully!');

            DB::commit();
        } catch (Exception $e) {
            Log::error('Error updating profile: '.$e->getMessage());
            DB::rollBack();
        }
    }

    #[On('profile-show-update-personal-information-modal')]
    public function setupForm()
    {
        $userWithDetails = null;

        if (Auth::user()->hasRole('Student')) {
            $userWithDetails = User::with('student', 'student.studyProgram')->find(Auth::id());
        } elseif (Auth::user()->hasRole('Lecturer')) {
            $userWithDetails = User::with('lecturer', 'lecturer.department')->find(Auth::id());
        }

        if ($userWithDetails) {
            $this->form->name = $userWithDetails->name;
            $this->form->email = $userWithDetails->email;

            if (Auth::user()->hasRole('Student')) {
                $this->form->masterNumber = $userWithDetails->student->nim ?? '';
                $this->form->placeId = $userWithDetails->student->study_program_id ?? '';
                $this->form->phoneNumber = $userWithDetails->student->phone_number ?? '';
                $this->form->address = $userWithDetails->student->address ?? '';
                $this->form->birthDate = $userWithDetails->student->birth_date ?? '';
            } elseif (Auth::user()->hasRole('Lecturer')) {
                $this->form->masterNumber = $userWithDetails->lecturer->nip ?? '';
                $this->form->placeId = $userWithDetails->lecturer->department_id ?? '';
                $this->form->phoneNumber = $userWithDetails->lecturer->phone_number ?? '';
                $this->form->address = $userWithDetails->lecturer->address ?? '';
                $this->form->birthDate = $userWithDetails->lecturer->birth_date ?? '';
            }
        }
    }
}
