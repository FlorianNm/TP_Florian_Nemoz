<div>
    <div class="container">
	    <div class="row">
	        <div class="col-md-12">	            
	            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />
	            <table class="table table-bordered" style="margin: 10px 0 10px 0;">
	                <tr>
	                    <th>First</th>
	                    <th>Last</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>Zip</th>
	                </tr>
	                @foreach($users as $user)
	                <tr>
	                    <td>
	                        {{ $user->first }}
	                    </td>
	                    <td>
	                        {{ $user->last }}
	                    </td>
                        <td>
	                        {{ $user->street }}
	                    </td>
                        <td>
	                        {{ $user->city }}
	                    </td>
                        <td>
	                        {{ $user->zip }}
	                    </td>
	                </tr>
	                @endforeach
	            </table>
	            {{ $users->links('livewire.livewire-pagination') }}
	        </div>
	    </div>
	</div>
</div>
