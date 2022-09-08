<?php

namespace App\Http\Interfaces;

interface RepositoryInterface
{
	public function index();
	
	public function store(array $data);
	
	public function edit($id);
	
	public function update(array $data, $id);
	
	public function delete($id);
	
	public function show($id);
}