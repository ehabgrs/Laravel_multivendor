<?php

namespace App\Repositories;

use App\Http\Interfaces\RepositoryInterface;

use Illuminate\Database\Eloquent\Model;

class Repository  implements RepositoryInterface
{
	protected $model;
	
	public function __construct(Model $model)
	{
		$this->model = $model;
	}
	
	public function index()
	{
		return $this->model->all();
	}
	
	
	public function store(array $data)
	{
		return $this->model->create($data)
	}
	
	public function edit($id)
	{
		return $this->model->find($id);
	}
	
	public function update(array $data, $id)
	{
		$record = $this->model->find($id);
		return $record->update($data);
	}
	
	
	public function delete($id)
	{
		return $this->model->destroy($id);
	}
	
	public function show($id)
	{
		return $this->model->find($id);
	}
	
	public function getModel()
	{
		return $this->model;
	}
	
	public function setModel(Model $model)
	{
		$this->model = $model;
		// return $this ??
	}
	
	//to get the realtions of the controller
	public function with($relations)
	{
		return $this->model->with($relations);
	}
}