<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    function __destruct() {
        $this->model = null;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function show($id)
    {
        return $this->model->query()->findOrFail($id);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }
    
    public function simpleJoin($leftTable, $rightTable, $leftTableId, $rightTableFKId)
    {
        $result = DB::table($leftTable)
        ->join($rightTable, $leftTable . '.'. $leftTableId, '=', $rightTable . '.' . $rightTableFKId)
        ->select($leftTable . '.*', $rightTable . '.*')
        ->get();
        return $result;
    }
}
