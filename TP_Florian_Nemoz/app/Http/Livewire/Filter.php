<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use App\Models\User;

class Filter extends Component
{
	use WithPagination;

	public $searchTerm;
    public $currentPage = 1;

    public function render()
    {
    	$query = '%'.$this->searchTerm.'%';

    	return view('livewire.filter', [
    		'users' => User::where(function($sub_query){
    			$sub_query->where('first', 'like', '%'.$this->searchTerm.'%')
    			->orWhere('last', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('street', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('city', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('zip', 'like', '%'.$this->searchTerm.'%');
    		})->paginate(10)
    	]);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
}
