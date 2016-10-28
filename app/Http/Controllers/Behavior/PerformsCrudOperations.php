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
        $this->repository->model()->create($this->repository->request()->all());

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
        $resource = $this->repository->find($id);

        if (! $resource) {
            return $this->responder->notFound()->send();
        }

        $resource->update($this->repository->request()->all());

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
        $resource = $this->repository->find($id);

        if (! $resource) {
            return $this->responder->notFound()->send();
        }

        $resource->delete();

        return $this->responder->deleted()->send();
    }
}
