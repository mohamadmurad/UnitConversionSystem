<div>

    <form>
        <div class="input-group mb-3">
            <input type="number" class="form-control" wire:model="superValue"
            >

            <select wire:model="super" wire:change="changeSuper">
                @foreach($superUnits as $super)
                    <option value="{{$super->id}}">{{$super->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <input type="number" wire:model="subValue" class="form-control"
            >

            <select wire:model="sub" wire:change="changeSub">
                @foreach($subUnits as $sub)
                    <option value="{{$sub->id}}">{{$sub->name}}</option>
                @endforeach
            </select>
        </div>
    </form>

</div>
