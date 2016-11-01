<?php

namespace App\Http\Controllers\Behavior;

trait PerformsCrudOperations
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', $this->repository->modelName());

        $resources = $this->repository->filter()->get();

        return $this->responder->ok()->withData($this->repository->cast($resources))->send();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->authorize('create', $this->repository->modelName());

        $this->validate(request(), $this->repository->storeRules());

        $this->repository->store();

        return $this->responder->created()->send();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', $this->repository->modelName());

        $resource = $this->repository->find($id);

        if (! $resource) {
            return $this->responder->notFound()->send();
        }

        return $this->responder->ok()->withData($this->repository->cast($resource))->send();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->authorize('update', $this->repository->modelName());

        $this->validate(request(), $this->repository->updateRules());

        $resource = $this->repository->find($id);

        if (! $resource) {
            return $this->responder->notFound()->send();
        }

        $resource->update(request()->all());

        return $this->responder->accepted()->send();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', $this->repository->modelName());

        $resource = $this->repository->find($id);

        if (! $resource) {
            return $this->responder->notFound()->send();
        }

        $resource->delete();

        return $this->responder->deleted()->send();
    }
}
