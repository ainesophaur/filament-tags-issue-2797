<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Forms\Components\SpatieTagsInput;

class FormTagsDemo extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public User $user;
    public $name;
    public $tags;
    public $result = '';

    public function mount()
    {
        $this->user = User::firstOrFail();
        $this->form->fill([
            'name' => $this->user->name,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name'),
            SpatieTagsInput::make('tags')->type('support'),
        ];
    }

    protected function getFormModel(): User
    {
        return $this->user;
    }

    public function submit()
    {
        if($this->user->update($this->form->getState())){
            $this->result = 'Updated';
        } else {
            $this->result = 'Update failed';
        }
    }
    public function render()
    {
        return view('livewire.form-tags-demo');
    }
}
