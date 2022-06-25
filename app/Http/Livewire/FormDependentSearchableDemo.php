<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\User;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Livewire\Component;
use Filament\Forms\Components\SpatieTagsInput;

class FormDependentSearchableDemo extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public bool $searchable = false;
    public $author;
    public $publisher;

    public function mount(Request $request)
    {
        if($request->query('searchable')) {
            $this->searchable = true;
        }
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\BelongsToSelect::make('author')
            ->relationship('author', 'name')
            ->reactive(),
            Forms\Components\BelongsToSelect::make('publisher')
            ->relationship('publisher', 'name')
            ->searchable($this->searchable)
            ->options(function($get){
                $author = $get('author');
                if(!$author){
                    info('publisher options has no author, returning all results');
                    return Publisher::all()->pluck('name', 'id');
                }
                $options = User::findOrFail($author)->publishers->pluck('name', 'id');
                info('publisher options has author', ['author' => $author, 'options' => $options]);
                return $options;
            })
        ];
    }

    protected function getFormModel(): string
    {
        return Book::class;
    }

    public function submit()
    {
        //noop
    }
    public function render()
    {
        return view('livewire.form-dependent-searchable-demo');
    }
}
