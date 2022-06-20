<div>
    @if(!empty($result))
        <p>Result: {{$result}}</p>
    @endif
<form wire:submit.prevent="submit">
    {{ $this->form }}

    <button type="submit">
        Submit
    </button>
</form>
</div>
