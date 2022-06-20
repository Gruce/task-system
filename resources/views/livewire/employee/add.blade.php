<div>

    <form wire:submit.prevent="save">
        <input type="text" wire:model.defer="employee.user.name">
        <input type="text" wire:model.defer="employee.user.email">
        <input type="text" wire:model.defer="employee.user.password">
        <input type="text" wire:model.defer="employee.user.gender">
        <input type="text" wire:model.defer="employee.user.phonenumber">
        <button type="submit">add</button>
    </form>
</div>
